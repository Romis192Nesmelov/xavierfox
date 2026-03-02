/**
 * Xavier Fox Communications - Main JavaScript
 * IT-база знаний от студента для студента
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all modules
    initMobileMenu();
    initSmoothScroll();
    initActiveNavigation();
    initScrollAnimations();
});

/**
 * Mobile Menu Toggle
 */
function initMobileMenu() {
    const menuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileNav = document.getElementById('mobile-nav');

    if (!menuToggle || !mobileNav) return;

    menuToggle.addEventListener('click', function() {
        const isExpanded = this.getAttribute('aria-expanded') === 'true';

        this.setAttribute('aria-expanded', !isExpanded);
        mobileNav.hidden = isExpanded;

        // Prevent body scroll when menu is open
        document.body.style.overflow = isExpanded ? '' : 'hidden';
    });

    // Close menu when clicking on a link
    const mobileLinks = mobileNav.querySelectorAll('a');
    mobileLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            menuToggle.setAttribute('aria-expanded', 'false');
            mobileNav.hidden = true;
            document.body.style.overflow = '';
        });
    });

    // Close menu when pressing Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !mobileNav.hidden) {
            menuToggle.setAttribute('aria-expanded', 'false');
            mobileNav.hidden = true;
            document.body.style.overflow = '';
            menuToggle.focus();
        }
    });
}

/**
 * Smooth Scroll for Anchor Links
 */
function initSmoothScroll() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');

    anchorLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');

            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                e.preventDefault();

                const headerHeight = document.querySelector('.header').offsetHeight;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight - 20;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });

                // Update URL without jumping
                history.pushState(null, null, targetId);

                // Set focus for accessibility
                targetElement.setAttribute('tabindex', '-1');
                targetElement.focus({ preventScroll: true });
            }
        });
    });
}

/**
 * Active Navigation Highlighting
 */
function initActiveNavigation() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link, .mobile-nav-link');

    if (sections.length === 0 || navLinks.length === 0) return;

    const observerOptions = {
        root: null,
        rootMargin: '-50% 0px -50% 0px',
        threshold: 0
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                const sectionId = entry.target.getAttribute('id');

                navLinks.forEach(function(link) {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + sectionId) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }, observerOptions);

    sections.forEach(function(section) {
        observer.observe(section);
    });
}

/**
 * Scroll Animations
 */
function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('.article-card, .article-section');

    if (animatedElements.length === 0) return;

    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -50px 0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    animatedElements.forEach(function(element, index) {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
        element.style.transitionDelay = (index % 3 * 0.1) + 's';

        observer.observe(element);
    });

    // Add CSS class for visible elements
    const style = document.createElement('style');
    style.textContent = `
        .is-visible {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    `;
    document.head.appendChild(style);
}

/**
 * Copy Code Functionality
 */
function initCodeCopy() {
    const codeBlocks = document.querySelectorAll('pre code');

    codeBlocks.forEach(function(codeBlock) {
        const pre = codeBlock.parentElement;
        const button = document.createElement('button');

        button.className = 'copy-code-btn';
        button.textContent = 'Копировать';
        button.setAttribute('aria-label', 'Копировать код в буфер обмена');

        button.addEventListener('click', function() {
            const code = codeBlock.textContent;

            navigator.clipboard.writeText(code).then(function() {
                button.textContent = 'Скопировано!';
                button.classList.add('copied');

                setTimeout(function() {
                    button.textContent = 'Копировать';
                    button.classList.remove('copied');
                }, 2000);
            }).catch(function() {
                button.textContent = 'Ошибка';

                setTimeout(function() {
                    button.textContent = 'Копировать';
                }, 2000);
            });
        });

        pre.style.position = 'relative';
        pre.appendChild(button);
    });

    // Add styles for copy button
    const style = document.createElement('style');
    style.textContent = `
        .copy-code-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 6px 12px;
            background-color: var(--color-red);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.2s ease, background-color 0.2s ease;
        }

        pre:hover .copy-code-btn {
            opacity: 1;
        }

        .copy-code-btn:hover {
            background-color: var(--color-red-dark);
        }

        .copy-code-btn.copied {
            background-color: #28a745;
        }

        @media (max-width: 768px) {
            .copy-code-btn {
                opacity: 1;
                padding: 4px 8px;
                font-size: 11px;
            }
        }
    `;
    document.head.appendChild(style);
}

// Initialize code copy on article pages
if (document.querySelector('pre code')) {
    document.addEventListener('DOMContentLoaded', initCodeCopy);
}

/**
 * Reading Progress Indicator (for article pages)
 */
function initReadingProgress() {
    const article = document.querySelector('.article');

    if (!article) return;

    const progressBar = document.createElement('div');
    progressBar.className = 'reading-progress';
    progressBar.setAttribute('role', 'progressbar');
    progressBar.setAttribute('aria-label', 'Прогресс чтения статьи');
    progressBar.setAttribute('aria-valuemin', '0');
    progressBar.setAttribute('aria-valuemax', '100');
    progressBar.setAttribute('aria-valuenow', '0');

    document.body.appendChild(progressBar);

    const style = document.createElement('style');
    style.textContent = `
        .reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background-color: var(--color-red);
            z-index: 1001;
            transition: width 0.1s ease;
        }
    `;
    document.head.appendChild(style);

    window.addEventListener('scroll', function() {
        const articleRect = article.getBoundingClientRect();
        const articleHeight = article.offsetHeight;
        const windowHeight = window.innerHeight;

        let progress = 0;

        if (articleRect.top <= 0) {
            progress = Math.min(100, Math.abs(articleRect.top) / (articleHeight - windowHeight) * 100);
        }

        progressBar.style.width = progress + '%';
        progressBar.setAttribute('aria-valuenow', Math.round(progress));
    });
}

// Initialize reading progress on article pages
if (document.querySelector('.article')) {
    document.addEventListener('DOMContentLoaded', initReadingProgress);
}

/**
 * External Links Handler
 */
// document.addEventListener('DOMContentLoaded', function() {
//     const externalLinks = document.querySelectorAll('a[href^="http"]');
//
//     externalLinks.forEach(function(link) {
//         if (!link.hasAttribute('target')) {
//             link.setAttribute('target', '_blank');
//             link.setAttribute('rel', 'noopener noreferrer');
//         }
//     });
// });

/**
 * Keyboard Navigation Enhancement
 */
document.addEventListener('keydown', function(e) {
    // Press '?' to show keyboard shortcuts
    if (e.key === '?' && !e.ctrlKey && !e.metaKey) {
        const activeElement = document.activeElement;
        if (activeElement.tagName !== 'INPUT' && activeElement.tagName !== 'TEXTAREA') {
            e.preventDefault();
            showKeyboardShortcuts();
        }
    }
});

function showKeyboardShortcuts() {
    const shortcuts = [
        { key: '?', description: 'Показать горячие клавиши' },
        { key: 'Esc', description: 'Закрыть меню / диалог' },
        { key: '↑ / ↓', description: 'Прокрутка страницы' }
    ];

    // Simple console output for now
    console.log('=== Xavier Fox Communications - Горячие клавиши ===');
    shortcuts.forEach(function(shortcut) {
        console.log(shortcut.key + ' - ' + shortcut.description);
    });
}

// Service Worker Registration (for PWA capabilities)
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        // Uncomment when service worker is implemented
        // navigator.serviceWorker.register('/sw.js');
    });
}
