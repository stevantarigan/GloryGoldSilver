// Header scroll effect
window.addEventListener('scroll', function () {
  const header = document.querySelector('header');
  if (window.scrollY > 50) {
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
});

// Jalankan setelah DOM siap
document.addEventListener('DOMContentLoaded', function () {

  // ===== Mobile menu toggle =====
  const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
  const nav = document.querySelector('header nav');

  if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', function () {
      nav.classList.toggle('active');
      this.classList.toggle('active');
    });
  }

  // ===== Animasi setiap section saat scroll =====
  const animatedElements = document.querySelectorAll('.produk-card, .harga-box, .tentang-container, .kontak-container, .hero-content, .section-title');

  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;

        if (el.classList.contains('section-title')) {
          el.style.animation = 'titleReveal 1.2s ease-out forwards';
        } else if (el.classList.contains('hero-content')) {
          el.style.animation = 'heroEntrance 1.5s ease-out forwards';
        } else {
          el.style.animation = 'fadeUpIn 0.8s ease-out forwards';
          // Stagger untuk grid
          if (el.parentElement.classList.contains('produk-grid')) {
            const index = Array.from(el.parentElement.children).indexOf(el);
            el.style.animationDelay = `${index * 0.2}s`;
          }
        }

        observer.unobserve(el);
      }
    });
  }, observerOptions);

  animatedElements.forEach(el => observer.observe(el));

  // ===== Animasi tombol =====
  const buttons = document.querySelectorAll('.btn-gold, .kontak-btn');
  buttons.forEach(button => {
    button.addEventListener('mouseenter', function () {
      this.style.animation = 'pulse 1s infinite, buttonShine 2s infinite';
    });
    button.addEventListener('mouseleave', function () {
      this.style.animation = 'none';
    });
  });

  // ===== Animasi counter harga =====
  const hargaBoxes = document.querySelectorAll('.harga-box');
  hargaBoxes.forEach(hargaBox => {
    const emasEl = hargaBox.querySelector('.emas');
    const perakEl = hargaBox.querySelector('.perak');

    if (emasEl && perakEl) {
      setInterval(() => {
        animateValueChange(emasEl, 1050000, 1050000 + Math.floor(Math.random() * 50000) - 25000);
        animateValueChange(perakEl, 12000, 12000 + Math.floor(Math.random() * 2000) - 1000);
      }, 30000);
    }
  });

  // ===== Parallax hero =====
  const hero = document.querySelector('.hero');
  if (hero) {
    window.addEventListener('scroll', function () {
      hero.style.backgroundPositionY = -(window.pageYOffset * 0.5) + 'px';
    });
  }

  // ===== Typing effect (opsional) =====
  const heroText = document.querySelector('.hero-content h2');
  if (heroText) {
    const originalText = heroText.textContent;
    heroText.textContent = '';
    let i = 0;

    function typeWriter() {
      if (i < originalText.length) {
        heroText.textContent += originalText.charAt(i);
        i++;
        setTimeout(typeWriter, 100);
      }
    }

    // Uncomment untuk aktifkan
    // setTimeout(typeWriter, 1000);
  }

  // ===== Partikel emas di hero =====
  createGoldParticles();
});

// ===== Fungsi Helper =====
function animateValueChange(element, start, end) {
  const duration = 2000;
  const range = end - start;
  const increment = end > start ? 1 : -1;
  const stepTime = Math.abs(Math.floor(duration / range));
  let current = start;

  const timer = setInterval(() => {
    current += increment;

    if (element.classList.contains('emas')) {
      element.textContent = `Emas: Rp ${formatNumber(current)} / gram`;
    } else {
      element.textContent = `Perak: Rp ${formatNumber(current)} / gram`;
    }

    if (current === end) clearInterval(timer);
  }, stepTime);
}

function formatNumber(num) {
  return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function createGoldParticles() {
  const heroSection = document.querySelector('.hero');
  if (!heroSection) return;

  for (let i = 0; i < 20; i++) {
    const particle = document.createElement('div');
    particle.classList.add('gold-particle');
    particle.style.left = Math.random() * 100 + 'vw';
    particle.style.animationDuration = (Math.random() * 5 + 5) + 's';
    particle.style.animationDelay = (Math.random() * 5) + 's';
    heroSection.appendChild(particle);
  }
}
// Smooth scroll untuk semua anchor link
const navLinks = document.querySelectorAll('header nav a[href^="#"]');

navLinks.forEach(link => {
  link.addEventListener('click', function (e) {
    e.preventDefault(); // cegah default jump

    const targetId = this.getAttribute('href').substring(1);
    const targetSection = document.getElementById(targetId);

    if (targetSection) {
      window.scrollTo({
        top: targetSection.offsetTop - 70, // offset untuk header fixed
        behavior: 'smooth'
      });
    }
  });
});
// Enhanced mobile menu functionality
document.addEventListener('DOMContentLoaded', function () {
  const menuBtn = document.querySelector('.mobile-menu-btn');
  const nav = document.querySelector('header nav');
  const navItems = document.querySelectorAll('.nav-item');

  if (menuBtn) {
    menuBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      nav.classList.toggle('active');
      menuBtn.classList.toggle('active');
    });
  }

  // Enhanced dropdown functionality for mobile
  navItems.forEach(item => {
    const link = item.querySelector('a');

    if (link && item.querySelector('.dropdown')) {
      link.addEventListener('click', function (e) {
        if (window.innerWidth <= 768) {
          e.preventDefault();
          item.classList.toggle('active');

          // Close other dropdowns
          navItems.forEach(otherItem => {
            if (otherItem !== item && otherItem.classList.contains('active')) {
              otherItem.classList.remove('active');
            }
          });
        }
      });
    }
  });

  // Close menu when clicking outside
  document.addEventListener('click', function (e) {
    if (nav.classList.contains('active') &&
      !e.target.closest('header nav') &&
      !e.target.closest('.mobile-menu-btn')) {
      nav.classList.remove('active');
      menuBtn.classList.remove('active');

      // Close all dropdowns
      navItems.forEach(item => {
        item.classList.remove('active');
      });
    }
  });

  // Back to top button
  const backToTopBtn = document.createElement('div');
  backToTopBtn.className = 'back-to-top';
  backToTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
  document.body.appendChild(backToTopBtn);

  backToTopBtn.addEventListener('click', function () {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('scroll', function () {
    if (window.pageYOffset > 300) {
      backToTopBtn.classList.add('visible');
    } else {
      backToTopBtn.classList.remove('visible');
    }
  });

  // Improved touch feedback for buttons
  const buttons = document.querySelectorAll('.btn-gold, .btn-silver1, .btn-maroon, .artikel-link');

  buttons.forEach(button => {
    button.addEventListener('touchstart', function () {
      this.classList.add('active');
    }, { passive: true });

    button.addEventListener('touchend', function () {
      this.classList.remove('active');
    }, { passive: true });
  });

  // Prevent default on touch events for smoother scrolling
  document.addEventListener('touchmove', function (e) {
    if (e.target.tagName !== 'TEXTAREA' &&
      e.target.tagName !== 'INPUT') {
      e.preventDefault();
    }
  }, { passive: false });

  // Improved price box interaction
  const hargaBox = document.querySelector('.harga-box');
  if (hargaBox) {
    hargaBox.addEventListener('touchstart', function () {
      this.style.transform = 'scale(0.98)';
    }, { passive: true });

    hargaBox.addEventListener('touchend', function () {
      this.style.transform = '';
    }, { passive: true });
  }

  // Lazy loading for images
  if ('IntersectionObserver' in window) {
    const lazyImages = document.querySelectorAll('img');

    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src || img.src;
          img.classList.remove('lazy');
          imageObserver.unobserve(img);
        }
      });
    });

    lazyImages.forEach(img => {
      if (!img.src) {
        img.dataset.src = img.getAttribute('data-src') || img.src;
        img.src = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1 1"%3E%3C/svg%3E';
        img.classList.add('lazy');
        imageObserver.observe(img);
      }
    });
  }
});
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