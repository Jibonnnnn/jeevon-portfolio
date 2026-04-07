import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

    // Hamburger Menu
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');

    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            if (hamburgerIcon) {
                hamburgerIcon.classList.toggle('fa-bars');
                hamburgerIcon.classList.toggle('fa-xmark');
            }
        });
    }

    // Dark Mode Toggle
    const darkToggle = document.getElementById('dark-toggle');
    if (darkToggle) {
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && prefersDark)) {
            document.documentElement.classList.add('dark');
        }

        darkToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
        });
    }
});