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
