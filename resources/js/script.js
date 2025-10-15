
    // ===================================
    // GLOBAL UTILITY FUNCTIONS
    // ===================================

    // Util: elemen
    const $ = (sel, parent = document) => parent.querySelector(sel)
    const $$ = (sel, parent = document) => Array.from(parent.querySelectorAll(sel))

    // Set tahun dinamis di footer
    $('#year').textContent = new Date().getFullYear()


    // ===================================
    // SIDEBAR & NAVIGASI MOBILE
    // ===================================

    // Dapatkan elemen yang diperlukan
    const burgerBtn = document.getElementById('burgerBtn');
    const sidebar = document.getElementById('sidebar');

    // Tambahkan event listener untuk tombol burger
    burgerBtn.addEventListener('click', () => {
      // Toggle class untuk menampilkan/menyembunyikan sidebar
      sidebar.classList.toggle('-translate-x-full');

      // Cek apakah sidebar terbuka
      if (sidebar.classList.contains('-translate-x-full')) {
        // Jika sidebar tertutup, tampilkan tombol burger
        burgerBtn.style.display = 'block';
      } else {
        // Jika sidebar terbuka, sembunyikan tombol burger
        burgerBtn.style.display = 'none';
      }
    });

    // Tambahkan event listener untuk memantau transisi sidebar
    sidebar.addEventListener('transitionend', () => {
      // Logika hanya berjalan di layar mobile (ukuran di bawah 768px)
      if (window.innerWidth < 768) {
        if (sidebar.classList.contains('-translate-x-full')) {
          // Jika sidebar sudah selesai ditutup, pastikan tombol burger muncul
          burgerBtn.style.display = 'block';
        } else {
          // Jika sidebar sudah selesai dibuka, pastikan tombol burger hilang
          burgerBtn.style.display = 'none';
        }
      }
    });

    // Event listener untuk menutup sidebar saat klik di luar area
    window.addEventListener('click', (e) => {
      // Logika hanya berlaku untuk layar mobile
      if (window.innerWidth < 768 && !sidebar.contains(e.target) && !burgerBtn.contains(e.target)) {
        // Tambahkan class untuk menutup sidebar
        sidebar.classList.add('-translate-x-full');
      }
    });

    // Event listener untuk mengatur tampilan saat ukuran layar berubah
    window.addEventListener('resize', () => {
      // Jika layar > 768px (desktop), sembunyikan tombol burger
      if (window.innerWidth >= 768) {
        burgerBtn.style.display = 'none';
        // Pastikan sidebar terbuka di desktop
        sidebar.classList.remove('-translate-x-full');
      } else {
        // Jika layar < 768px (mobile)
        if (sidebar.classList.contains('-translate-x-full')) {
          // Jika sidebar tertutup, tampilkan tombol burger
          burgerBtn.style.display = 'block';
        } else {
          // Jika sidebar terbuka, sembunyikan tombol burger
          burgerBtn.style.display = 'none';
        }
      }
    });

    // Nav aktif saat scroll dengan GSAP
    const sections = ['home', 'about', 'projects', 'skills', 'contact', 'gallery'].map(id => ({
      id,
      el: document.getElementById(id)
    }))
    const navLinks = $$('.nav-link')

    const activateNav = (id) => {
      navLinks.forEach(a => a.classList.remove('bg-white/5', 'ring-white/10'))
      const link = navLinks.find(a => a.getAttribute('href') === `#${id}`)
      if (link) link.classList.add('bg-white/5', 'ring-white/10')
    }

    // ===================================
    // GSAP ANIMATIONS
    // ===================================

    gsap.registerPlugin(ScrollTrigger)

    // Reveal anim tiap section
    sections.forEach(({
      el,
      id
    }) => {
      gsap.from(el, {
        opacity: 0,
        y: 30,
        duration: 0.6,
        ease: 'power2.out',
        scrollTrigger: {
          trigger: el,
          start: 'top 75%',
          onEnter: () => activateNav(id),
          onEnterBack: () => activateNav(id)
        }
      })
    })

    // Hover parallax pada card galeri (tipis)
    $$('#gallery img').forEach(img => {
      img.addEventListener('mousemove', (e) => {
        const r = img.getBoundingClientRect()
        const dx = (e.clientX - (r.left + r.width / 2)) / r.width
        const dy = (e.clientY - (r.top + r.height / 2)) / r.height
        img.style.transform = `translateY(-2px) rotateX(${dy * -2}deg) rotateY(${dx * 2}deg)`
      })
      img.addEventListener('mouseleave', () => img.style.transform = 'translateY(0) rotateX(0) rotateY(0)')
      img.style.transition = 'transform .2s ease'
    })

    // Smooth scroll untuk anchor nav
    navLinks.forEach(a => a.addEventListener('click', (e) => {
      // default behavior ok karena html {scroll-behavior:smooth}
      // berikan efek klik halus
      gsap.to(window, {
        duration: .4,
        scrollTo: a.getAttribute('href')
      })
    }))

   
    window.addEventListener('load', () => {
        const slider = document.getElementById('imageSlider');
        const images = slider.querySelectorAll('img');
        let currentImageIndex = 0;

        function startSlider() {
            setInterval(() => {
                // Sembunyikan foto saat ini
                images[currentImageIndex].classList.remove('opacity-100');
                images[currentImageIndex].classList.add('opacity-0');

                // Pindah ke foto berikutnya
                currentImageIndex = (currentImageIndex + 1) % images.length;

                // Tampilkan foto berikutnya
                images[currentImageIndex].classList.remove('opacity-0');
                images[currentImageIndex].classList.add('opacity-100');
            }, 2000); // Ganti gambar setiap 5 detik
        }

        startSlider();
    });

    
