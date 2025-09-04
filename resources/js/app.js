// Header scroll effect
window.addEventListener('scroll', function () {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const nav = document.querySelector('header nav');

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function () {
            nav.classList.toggle('active');
        });
    }

    // Animasi elemen saat scroll
    const animatedElements = document.querySelectorAll('.produk-card, .harga-box, .tentang-container, .kontak-container');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    animatedElements.forEach(el => {
        observer.observe(el);
    });

    // Animasi untuk tombol
    const buttons = document.querySelectorAll('.btn-gold, .kontak-btn');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function () {
            this.style.animation = 'pulse 1s infinite';
        });

        button.addEventListener('mouseleave', function () {
            this.style.animation = 'none';
        });
    });
});