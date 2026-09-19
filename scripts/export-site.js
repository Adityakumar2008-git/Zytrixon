import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';
import { execSync } from 'node:child_process';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const rootDir = path.resolve(__dirname, '..');
const distDir = path.join(rootDir, 'dist');
const publicDir = path.join(rootDir, 'public');

console.log('🚀 Running Netlify static build pipeline...');

// 1. Check if PHP is available
let hasPhp = false;
try {
    execSync('php -v', { stdio: 'ignore' });
    hasPhp = true;
} catch {
    hasPhp = false;
}

if (hasPhp) {
    console.log('📦 PHP runtime detected. Executing php artisan export:static...');
    try {
        execSync('php artisan export:static', { stdio: 'inherit', cwd: rootDir });
        console.log('✅ PHP static export finished successfully.');
        process.exit(0);
    } catch (err) {
        console.warn('⚠️ php artisan export:static encountered an error. Falling back to asset sync...', err.message);
    }
} else {
    console.log('ℹ️ PHP runtime not available in container. Using pre-generated dist and syncing latest assets...');
}

// Ensure dist directory exists
if (!fs.existsSync(distDir)) {
    fs.mkdirSync(distDir, { recursive: true });
}

// Helper to copy directory recursively
function copyDirSync(src, dest) {
    if (!fs.existsSync(src)) return;
    fs.mkdirSync(dest, { recursive: true });
    const entries = fs.readdirSync(src, { withFileTypes: true });
    for (const entry of entries) {
        const srcPath = path.join(src, entry.name);
        const destPath = path.join(dest, entry.name);
        if (entry.isDirectory()) {
            copyDirSync(srcPath, destPath);
        } else {
            fs.copyFileSync(srcPath, destPath);
        }
    }
}

// 2. Sync build assets (CSS, JS, fonts, manifest)
copyDirSync(path.join(publicDir, 'build'), path.join(distDir, 'build'));
console.log('✓ Synced public/build -> dist/build');

// 3. Sync images
copyDirSync(path.join(publicDir, 'images'), path.join(distDir, 'images'));
console.log('✓ Synced public/images -> dist/images');

// 4. Sync root files
for (const file of ['favicon.ico', 'robots.txt']) {
    const src = path.join(publicDir, file);
    if (fs.existsSync(src)) {
        fs.copyFileSync(src, path.join(distDir, file));
    }
}

// 5. Update Vite asset links in all HTML files if manifest exists
const manifestPath = path.join(publicDir, 'build', 'manifest.json');
if (fs.existsSync(manifestPath)) {
    try {
        const manifest = JSON.parse(fs.readFileSync(manifestPath, 'utf8'));
        const cssFile = manifest['resources/css/app.css']?.file;
        const jsFile = manifest['resources/js/app.js']?.file;

        if (cssFile && jsFile) {
            function updateHtmlFiles(dir) {
                const entries = fs.readdirSync(dir, { withFileTypes: true });
                for (const entry of entries) {
                    const fullPath = path.join(dir, entry.name);
                    if (entry.isDirectory()) {
                        updateHtmlFiles(fullPath);
                    } else if (entry.name.endsWith('.html')) {
                        let content = fs.readFileSync(fullPath, 'utf8');
                        // Replace CSS and JS links with newest build hashes
                        content = content.replace(/\/build\/assets\/app-[^"']+\.css/g, `/build/${cssFile}`);
                        content = content.replace(/\/build\/assets\/app-[^"']+\.js/g, `/build/${jsFile}`);
                        fs.writeFileSync(fullPath, content, 'utf8');
                    }
                }
            }
            updateHtmlFiles(distDir);
            console.log(`✓ Updated asset hashes in dist HTML files (CSS: ${cssFile}, JS: ${jsFile})`);
        }
    } catch (e) {
        console.warn('Could not update manifest hashes:', e.message);
    }
}

console.log('✨ Netlify static export complete! Ready to serve from dist/.');
