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
      this.classList.toggle('active');
    });
  }

  // Animasi elemen saat scroll dengan Intersection Observer
  const animatedElements = document.querySelectorAll('.produk-card, .harga-box, .tentang-container, .kontak-container, .hero-content, .section-title');

  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        if (entry.target.classList.contains('section-title')) {
          entry.target.style.animation = 'titleReveal 1.2s ease-out forwards';
        } else if (entry.target.classList.contains('hero-content')) {
          entry.target.style.animation = 'heroEntrance 1.5s ease-out forwards';
        } else {
          entry.target.style.animation = 'fadeUpIn 0.8s ease-out forwards';
          // Stagger animation untuk grid items
          if (entry.target.parentElement.classList.contains('produk-grid')) {
            const index = Array.from(entry.target.parentElement.children).indexOf(entry.target);
            entry.target.style.animationDelay = `${index * 0.2}s`;
          }
        }
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  animatedElements.forEach(el => {
    observer.observe(el);
  });

  // Animasi untuk tombol
  const buttons = document.querySelectorAll('.btn-gold, .kontak-btn');
  buttons.forEach(button => {
    button.addEventListener('mouseenter', function () {
      this.style.animation = 'pulse 1s infinite, buttonShine 2s infinite';
    });

    button.addEventListener('mouseleave', function () {
      this.style.animation = 'none';
    });
  });

  // Animasi counter untuk harga
  const hargaBox = document.querySelector('.harga-box');
  if (hargaBox) {
    const emasElement = hargaBox.querySelector('.emas');
    const perakElement = hargaBox.querySelector('.perak');

    if (emasElement && perakElement) {
      // Simulasi perubahan harga (bisa diganti dengan data real)
      setInterval(() => {
        animateValueChange(emasElement, 1050000, 1050000 + Math.floor(Math.random() * 50000) - 25000);
        animateValueChange(perakElement, 12000, 12000 + Math.floor(Math.random() * 2000) - 1000);
      }, 30000); // Update setiap 30 detik
    }
  }

  // Parallax effect untuk hero section
  window.addEventListener('scroll', function () {
    const scrolled = window.pageYOffset;
    const hero = document.querySelector('.hero');
    if (hero) {
      hero.style.backgroundPositionY = -(scrolled * 0.5) + 'px';
    }
  });

  // Typing effect untuk hero text (jika diinginkan)
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

    // Uncomment line below to enable typing effect
    // setTimeout(typeWriter, 1000);
  }
});

// Fungsi untuk animasi perubahan nilai
function animateValueChange(element, start, end) {
  const duration = 2000;
  const range = end - start;
  const increment = end > start ? 1 : -1;
  const stepTime = Math.abs(Math.floor(duration / range));
  let current = start;

  const timer = setInterval(function () {
    current += increment;
    if (element.classList.contains('emas')) {
      element.textContent = `Emas: Rp ${formatNumber(current)} / gram`;
    } else {
      element.textContent = `Perak: Rp ${formatNumber(current)} / gram`;
    }

    if (current === end) {
      clearInterval(timer);
    }
  }, stepTime);
}

// Format number dengan separator
function formatNumber(num) {
  return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Efek partikel emas (optional)
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

// Jalankan efek partikel setelah halaman dimuat
window.addEventListener('load', function () {
  createGoldParticles();
});