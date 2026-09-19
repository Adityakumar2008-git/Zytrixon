/**
 * Zytrixon V2 — Main JavaScript
 * =============================================================================
 * Progressive enhancement only. Content is visible without JavaScript.
 * Per ADR-001: JS is not required for basic content consumption.
 * =============================================================================
 */

/**
 * Section Reveal — IntersectionObserver-based reveal animation
 * Per docs/05-motion-system.md: CSS-first, lightweight, no heavy runtime.
 */
function initSectionReveal() {
    const reveals = document.querySelectorAll('.reveal');

    if (!reveals.length) return;

    // Respect reduced motion
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (prefersReducedMotion) {
        reveals.forEach((el) => el.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.1,
            rootMargin: '0px 0px -40px 0px',
        }
    );

    reveals.forEach((el) => observer.observe(el));
}

/**
 * Mobile Navigation — Toggle, focus trap, escape handling
 * Per docs/09-accessibility.md: keyboard navigation, aria-expanded, focus management
 */
function initMobileNav() {
    const trigger = document.getElementById('mobile-nav-trigger');
    const nav = document.getElementById('mobile-nav');
    const overlay = document.getElementById('mobile-nav-overlay');

    if (!trigger || !nav) return;

    const focusableSelector = 'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])';
    let previousFocus = null;

    function open() {
        previousFocus = document.activeElement;
        nav.classList.add('is-open');
        overlay?.classList.add('is-visible');
        trigger.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';

        // Focus first focusable element in nav
        const firstFocusable = nav.querySelector(focusableSelector);
        if (firstFocusable) firstFocusable.focus();
    }

    function close() {
        nav.classList.remove('is-open');
        overlay?.classList.remove('is-visible');
        trigger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';

        // Restore focus
        if (previousFocus) previousFocus.focus();
    }

    function isOpen() {
        return trigger.getAttribute('aria-expanded') === 'true';
    }

    trigger.addEventListener('click', () => {
        isOpen() ? close() : open();
    });

    overlay?.addEventListener('click', close);

    // Escape key closes nav
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isOpen()) {
            close();
        }
    });

    // Focus trapping within mobile nav
    nav.addEventListener('keydown', (e) => {
        if (e.key !== 'Tab' || !isOpen()) return;

        const focusableElements = nav.querySelectorAll(focusableSelector);
        const first = focusableElements[0];
        const last = focusableElements[focusableElements.length - 1];

        if (e.shiftKey && document.activeElement === first) {
            e.preventDefault();
            last.focus();
        } else if (!e.shiftKey && document.activeElement === last) {
            e.preventDefault();
            first.focus();
        }
    });
}

/**
 * Initialize on DOM ready
 */
document.addEventListener('DOMContentLoaded', () => {
    initSectionReveal();
    initMobileNav();
});
