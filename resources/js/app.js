/**
 * Zytrixon V2 — Interaction Design & Motion Engine
 * =============================================================================
 * Progressive enhancement only. All content is visible and functional without JS.
 * Built for editorial confidence, kinetic rhythm, and 60fps performance.
 * Respects prefers-reduced-motion across all modules.
 * =============================================================================
 */

const isReducedMotion = () => window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const isFinePointer = () => window.matchMedia('(hover: hover) and (pointer: fine)').matches;

/**
 * 1. CINEMATIC REVEAL & SOFT POPUP SYSTEM
 * High-performance IntersectionObserver orchestrating line-by-line masked reveals,
 * soft popups, curtain clips, blur fades, image zoom settling, and staggered emergence.
 */
function initRevealSystem() {
    const targets = document.querySelectorAll(
        '.reveal, .reveal-line, .reveal-fade-up, .reveal-image, .reveal-stagger, .reveal-soft-pop, .reveal-scale, .reveal-clip, .reveal-left, .reveal-right'
    );

    if (!targets.length) return;

    if (isReducedMotion()) {
        targets.forEach((el) => {
            el.classList.add('is-visible');
            el.querySelectorAll('.reveal-line, .reveal-fade-up, .reveal-image, .reveal-soft-pop, .reveal-scale, .reveal-clip').forEach((child) => {
                child.classList.add('is-visible');
            });
        });
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    el.classList.add('is-visible');

                    // Trigger nested reveal items
                    el.querySelectorAll('.reveal-line, .reveal-fade-up, .reveal-image, .reveal-soft-pop, .reveal-scale, .reveal-clip, .reveal-left, .reveal-right').forEach((child) => {
                        child.classList.add('is-visible');
                    });

                    // Trigger any counter tickers inside this revealed section
                    el.querySelectorAll('[data-counter-target]').forEach((counterEl) => {
                        animateCounter(counterEl);
                    });

                    observer.unobserve(el);
                }
            });
        },
        {
            threshold: 0.08,
            rootMargin: '0px 0px -40px 0px',
        }
    );

    targets.forEach((el) => observer.observe(el));
}

/**
 * 2. DUAL-MODE PRECISION CURSOR ENGINE (Desktop Fine Pointer Only)
 * Smooth lerp interpolation for dot + ring with interactive scale and theme detection.
 */
function initPrecisionCursor() {
    if (isReducedMotion() || !isFinePointer()) return;

    const dot = document.getElementById('cursor-dot');
    const ring = document.getElementById('cursor-ring');
    if (!dot || !ring) return;

    let mouseX = -100;
    let mouseY = -100;
    let dotX = -100;
    let dotY = -100;
    let ringX = -100;
    let ringY = -100;
    let isVisible = false;
    let rafId = null;

    function renderCursor() {
        if (!isVisible) return;

        // Smooth physics-based interpolation
        dotX += (mouseX - dotX) * 0.48;
        dotY += (mouseY - dotY) * 0.48;
        ringX += (mouseX - ringX) * 0.16;
        ringY += (mouseY - ringY) * 0.16;

        dot.style.transform = `translate3d(${dotX.toFixed(1)}px, ${dotY.toFixed(1)}px, 0) translate(-50%, -50%)`;
        ring.style.transform = `translate3d(${ringX.toFixed(1)}px, ${ringY.toFixed(1)}px, 0) translate(-50%, -50%)`;

        rafId = window.requestAnimationFrame(renderCursor);
    }

    window.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;

        if (!isVisible) {
            isVisible = true;
            dotX = mouseX;
            dotY = mouseY;
            ringX = mouseX;
            ringY = mouseY;
            dot.style.opacity = '1';
            ring.style.opacity = '1';
            if (!rafId) rafId = window.requestAnimationFrame(renderCursor);
        }

        // Check if cursor is over a dark container or site is in dark mode
        const target = e.target;
        const isDarkTheme = document.documentElement.classList.contains('dark');
        const isOverDark = isDarkTheme || (target && (
            target.closest('.bg-[#0E0F12]') ||
            target.closest('.bg-[#0A0A0B]') ||
            target.closest('.bg-neutral-900') ||
            target.closest('footer') ||
            target.closest('[data-theme="dark"]')
        ));

        dot.classList.toggle('is-dark', !!isOverDark);
        ring.classList.toggle('is-dark', !!isOverDark);

        // Check if hovering over interactive elements
        const isInteractive = target && (
            target.closest('a') ||
            target.closest('button') ||
            target.closest('.service-split-row') ||
            target.closest('.process-step-trigger') ||
            target.closest('.btn-magnetic') ||
            target.closest('[role="button"]') ||
            target.closest('input') ||
            target.closest('textarea')
        );

        ring.classList.toggle('is-hover', !!isInteractive);
    }, { passive: true });

    document.addEventListener('mouseleave', () => {
        isVisible = false;
        dot.style.opacity = '0';
        ring.style.opacity = '0';
        if (rafId) {
            window.cancelAnimationFrame(rafId);
            rafId = null;
        }
    });
}

/**
 * 3. MAGNETIC BUTTON SLIDERS & INTERACTION PHYSICS
 * Desktop fine-pointer only. Dynamic coordinate tracking for slider glow + spring recoil.
 */
function initMagneticButtons() {
    if (isReducedMotion() || !isFinePointer()) return;

    const magneticElements = document.querySelectorAll('.btn-magnetic, [data-magnetic]');

    magneticElements.forEach((el) => {
        const isPrimary = el.classList.contains('btn-magnetic-primary') || el.classList.contains('bg-[#0F1012]') || el.classList.contains('bg-neutral-900') || el.classList.contains('dark:bg-[#18191E]');
        const maxDist = isPrimary ? 16 : 10;
        const icon = el.querySelector('.btn-magnetic-icon, svg');

        let isHovered = false;

        el.addEventListener('mouseenter', () => {
            isHovered = true;
        });

        el.addEventListener('mousemove', (e) => {
            if (!isHovered) return;
            const rect = el.getBoundingClientRect();
            const relX = e.clientX - (rect.left + rect.width / 2);
            const relY = e.clientY - (rect.top + rect.height / 2);

            // Set coordinates for button slider glow sheen
            const mouseXPct = ((e.clientX - rect.left) / rect.width) * 100;
            const mouseYPct = ((e.clientY - rect.top) / rect.height) * 100;
            el.style.setProperty('--mouse-x', `${mouseXPct.toFixed(1)}%`);
            el.style.setProperty('--mouse-y', `${mouseYPct.toFixed(1)}%`);

            const dist = Math.hypot(relX, relY);
            const factor = Math.min(dist * 0.24, maxDist) / (dist || 1);
            const transX = relX * factor;
            const transY = relY * factor;

            el.style.transform = `translate3d(${transX.toFixed(1)}px, ${transY.toFixed(1)}px, 0)`;

            if (icon) {
                const iconFactor = factor * 1.6;
                icon.style.transform = `translate3d(${(relX * iconFactor).toFixed(1)}px, ${(relY * iconFactor).toFixed(1)}px, 0)`;
            }
        });

        el.addEventListener('mouseleave', () => {
            isHovered = false;
            el.style.transform = '';
            if (icon) icon.style.transform = '';
        });
    });
}

/**
 * 4. HEADER SCROLL DYNAMICS
 */
function initHeaderScroll() {
    const header = document.getElementById('site-header');
    if (!header) return;

    let ticking = false;

    function updateHeader() {
        const scrolled = window.scrollY > 24;
        header.classList.toggle('is-scrolled', scrolled);
        header.classList.toggle('is-top', !scrolled);
        ticking = false;
    }

    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(updateHeader);
            ticking = true;
        }
    }, { passive: true });

    updateHeader();
}

/**
 * 5. FLOATING PROJECT CURSOR BADGE
 */
function initProjectCursor() {
    if (isReducedMotion() || !isFinePointer()) return;

    const projectTriggers = document.querySelectorAll('[data-project-cursor]');
    if (!projectTriggers.length) return;

    let cursor = document.getElementById('project-cursor-pill');
    if (!cursor) {
        cursor = document.createElement('div');
        cursor.id = 'project-cursor-pill';
        cursor.className = 'project-cursor-pill';
        cursor.textContent = 'VIEW CASE';
        document.body.appendChild(cursor);
    }

    let mouseX = -100;
    let mouseY = -100;
    let targetX = -100;
    let targetY = -100;
    let isTracking = false;
    let rafId = null;

    function renderCursor() {
        if (!isTracking) return;
        mouseX += (targetX - mouseX) * 0.22;
        mouseY += (targetY - mouseY) * 0.22;
        cursor.style.left = `${mouseX.toFixed(1)}px`;
        cursor.style.top = `${mouseY.toFixed(1)}px`;
        rafId = window.requestAnimationFrame(renderCursor);
    }

    window.addEventListener('mousemove', (e) => {
        targetX = e.clientX;
        targetY = e.clientY;
        if (!isTracking) {
            mouseX = targetX;
            mouseY = targetY;
        }
    }, { passive: true });

    projectTriggers.forEach((trigger) => {
        trigger.addEventListener('mouseenter', () => {
            const label = trigger.getAttribute('data-project-cursor-text') || 'VIEW CASE';
            cursor.textContent = label;
            cursor.classList.add('is-active');
            isTracking = true;
            if (!rafId) rafId = window.requestAnimationFrame(renderCursor);
        });

        trigger.addEventListener('mouseleave', () => {
            cursor.classList.remove('is-active');
            isTracking = false;
            if (rafId) {
                window.cancelAnimationFrame(rafId);
                rafId = null;
            }
        });
    });
}

/**
 * 6. HERO ARCHITECTURAL VISUAL PARALLAX
 */
function initHeroParallax() {
    if (isReducedMotion() || !isFinePointer()) return;

    const hero = document.getElementById('hero-section');
    const visual = document.getElementById('hero-visual-slice');
    if (!hero || !visual) return;

    hero.addEventListener('mousemove', (e) => {
        const rect = hero.getBoundingClientRect();
        const xPercent = (e.clientX - rect.left) / rect.width - 0.5;
        const yPercent = (e.clientY - rect.top) / rect.height - 0.5;

        const moveX = (xPercent * -8).toFixed(1);
        const moveY = (yPercent * -6).toFixed(1);

        visual.style.transform = `translate3d(${moveX}px, ${moveY}px, 0)`;
    });

    hero.addEventListener('mouseleave', () => {
        visual.style.transform = '';
    });
}

/**
 * 7. INTERACTIVE SPLIT SERVICES SHOWCASE
 * Hover/click driven visual stage switcher matching active service row.
 */
function initSplitServices() {
    const showcase = document.getElementById('services-split-showcase');
    if (!showcase) return;

    const rows = showcase.querySelectorAll('.service-split-row');
    const visuals = showcase.querySelectorAll('.service-stage-visual');
    const categoryLabel = document.getElementById('active-service-category');

    if (!rows.length || !visuals.length) return;

    function activateService(index) {
        rows.forEach((row, i) => {
            row.classList.toggle('is-active', i === index);
        });

        visuals.forEach((vis, i) => {
            vis.classList.toggle('is-active', i === index);
        });

        if (categoryLabel && rows[index]) {
            const cat = rows[index].getAttribute('data-service-tag');
            if (cat) categoryLabel.textContent = cat;
        }
    }

    rows.forEach((row, i) => {
        row.addEventListener('mouseenter', () => activateService(i));
        row.addEventListener('focus', () => activateService(i));
        row.addEventListener('click', () => activateService(i));
    });

    // Default activate first service
    activateService(0);
}

/**
 * 8. EDITORIAL HORIZONTAL PROCESS TIMELINE
 * Step selection with animated progress bar and detailed stage presentation.
 */
function initProcessTimeline() {
    const timeline = document.getElementById('process-timeline');
    if (!timeline) return;

    const steps = timeline.querySelectorAll('.process-step-trigger');
    const progressBar = timeline.querySelector('.process-progress-line');
    const detailPanels = timeline.querySelectorAll('.process-detail-panel');

    if (!steps.length) return;

    function setStep(index) {
        steps.forEach((step, i) => {
            step.classList.toggle('is-active', i === index);
        });

        if (detailPanels.length) {
            detailPanels.forEach((panel, i) => {
                panel.classList.toggle('is-active', i === index);
                panel.classList.toggle('hidden', i !== index);
            });
        }

        if (progressBar) {
            const percentage = ((index + 1) / steps.length) * 100;
            progressBar.style.width = `${percentage}%`;
        }
    }

    steps.forEach((step, i) => {
        step.addEventListener('click', () => setStep(i));
    });

    setStep(0);
}

/**
 * 9. SIGNATURE WORK STORYTELLING SYSTEM
 * Pinned interactive showcases with smooth cross-fade, slide counter, and keyboard controls.
 */
function initWorkStorytelling() {
    const container = document.getElementById('work-story-showcase');
    if (!container) return;

    const panels = container.querySelectorAll('.work-story-panel');
    const visualItems = container.querySelectorAll('.work-visual-item');
    const indicator = document.getElementById('work-slide-indicator');
    const prevBtn = document.getElementById('work-prev-btn');
    const nextBtn = document.getElementById('work-next-btn');

    if (!panels.length) return;

    let currentIndex = 0;
    const total = panels.length;

    function goToSlide(index) {
        currentIndex = (index + total) % total;

        panels.forEach((panel, i) => {
            panel.classList.toggle('is-active', i === currentIndex);
        });

        visualItems.forEach((visual, i) => {
            visual.classList.toggle('is-active', i === currentIndex);
            visual.classList.toggle('hidden', i !== currentIndex);
        });

        if (indicator) {
            const formatted = String(currentIndex + 1).padStart(2, '0');
            const totalFormatted = String(total).padStart(2, '0');
            indicator.textContent = `${formatted} / ${totalFormatted}`;
        }
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => goToSlide(currentIndex - 1));
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => goToSlide(currentIndex + 1));
    }

    // Keyboard navigation when focused within work section
    container.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') {
            e.preventDefault();
            goToSlide(currentIndex + 1);
        } else if (e.key === 'ArrowLeft') {
            e.preventDefault();
            goToSlide(currentIndex - 1);
        }
    });

    goToSlide(0);
}

/**
 * 10. THEME TOGGLE ENGINE (DARK / LIGHT MODE)
 * Smoothly toggles .dark class on root element, updates localStorage, and notifies listeners.
 */
function initThemeToggle() {
    const toggleButtons = document.querySelectorAll('#theme-toggle-btn, .theme-toggle-trigger');
    if (!toggleButtons.length) return;

    function applyTheme(isDark) {
        document.documentElement.classList.toggle('dark', isDark);
        try {
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        } catch (e) {}

        // Re-evaluate cursor colors if cursor elements exist
        const dot = document.getElementById('cursor-dot');
        const ring = document.getElementById('cursor-ring');
        if (dot && ring) {
            dot.classList.toggle('is-dark', isDark);
            ring.classList.toggle('is-dark', isDark);
        }
    }

    toggleButtons.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const currentlyDark = document.documentElement.classList.contains('dark');
            applyTheme(!currentlyDark);
        });
    });

    // Listen to cross-tab storage changes
    window.addEventListener('storage', (e) => {
        if (e.key === 'theme') {
            applyTheme(e.newValue === 'dark');
        }
    });
}

/**
 * 11. 3D CARD PERSPECTIVE TILT & SPECULAR LIQUID GLOW
 * Dynamic 3D physical tilt for cards with moving specular reflection.
 */
function initCardTilt3D() {
    if (isReducedMotion() || !isFinePointer()) return;

    const cards = document.querySelectorAll(
        '.frosted-glass-card, .process-card, .service-split-row, .card-tilt-3d, .hover-lift'
    );

    cards.forEach((card) => {
        // Ensure card has shine overlay
        if (!card.querySelector('.card-shine-overlay')) {
            const shine = document.createElement('div');
            shine.className = 'card-shine-overlay';
            card.appendChild(shine);
        }

        let isHovered = false;

        card.addEventListener('mouseenter', () => {
            isHovered = true;
        });

        card.addEventListener('mousemove', (e) => {
            if (!isHovered) return;
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = ((y - centerY) / centerY) * -5.5;
            const rotateY = ((x - centerX) / centerX) * 5.5;

            card.style.transform = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) translateY(-5px)`;
            card.style.setProperty('--shine-x', `${(x / rect.width) * 100}%`);
            card.style.setProperty('--shine-y', `${(y / rect.height) * 100}%`);
        });

        card.addEventListener('mouseleave', () => {
            isHovered = false;
            card.style.transform = '';
        });
    });
}

/**
 * 12. TOP KINETIC SCROLL PROGRESS BAR
 */
function initScrollProgress() {
    const progressBar = document.getElementById('scroll-progress');
    if (!progressBar) return;

    let ticking = false;

    function update() {
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const progress = docHeight > 0 ? (window.scrollY / docHeight) * 100 : 0;
        progressBar.style.width = `${progress.toFixed(2)}%`;
        ticking = false;
    }

    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(update);
            ticking = true;
        }
    }, { passive: true });

    update();
}

/**
 * 13. DYNAMIC METRIC COUNTER TICKER
 */
function animateCounter(el) {
    if (el.dataset.counterDone) return;
    el.dataset.counterDone = 'true';

    const raw = el.textContent.trim();
    const match = raw.match(/(\d+)/);
    if (!match) return;

    const targetVal = parseInt(match[1], 10);
    const prefix = raw.slice(0, match.index);
    const suffix = raw.slice(match.index + match[1].length);

    let start = 0;
    const duration = 1200;
    const startTime = performance.now();

    function updateCounter(now) {
        const elapsed = now - startTime;
        const progress = Math.min(elapsed / duration, 1);
        // Easing: easeOutExpo
        const ease = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
        const current = Math.round(start + (targetVal - start) * ease);

        el.textContent = `${prefix}${current}${suffix}`;

        if (progress < 1) {
            requestAnimationFrame(updateCounter);
        } else {
            el.textContent = raw;
        }
    }

    requestAnimationFrame(updateCounter);
}

function initCounterTickers() {
    if (isReducedMotion()) return;

    const metricNumbers = document.querySelectorAll(
        '#about .font-mono.font-black, [data-counter]'
    );

    metricNumbers.forEach((numEl) => {
        if (!numEl.hasAttribute('data-counter-target')) {
            numEl.setAttribute('data-counter-target', 'true');
        }
    });
}

/**
 * 14. SOFT POPUP LIVE STATUS PILL
 */
function initLiveStatusPill() {
    const pill = document.getElementById('live-status-pill');
    const dismissBtn = document.getElementById('dismiss-status-pill');

    if (!pill) return;

    if (dismissBtn) {
        dismissBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            pill.style.transition = 'opacity 0.3s ease, transform 0.35s cubic-bezier(0.16, 1, 0.3, 1)';
            pill.style.opacity = '0';
            pill.style.transform = 'translateY(20px) scale(0.9)';
            setTimeout(() => pill.remove(), 400);
        });
    }
}

/**
 * Global Initialization on DOMContentLoaded
 */
document.addEventListener('DOMContentLoaded', () => {
    initThemeToggle();
    initRevealSystem();
    initPrecisionCursor();
    initMagneticButtons();
    initHeaderScroll();
    initProjectCursor();
    initHeroParallax();
    initSplitServices();
    initProcessTimeline();
    initWorkStorytelling();
    initCardTilt3D();
    initScrollProgress();
    initCounterTickers();
    initLiveStatusPill();
});



