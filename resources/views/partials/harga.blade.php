<section id="harga" class="harga">
        <div class="section-container">
            <h3 class="section-title"><i class="fas fa-coins"></i> Harga Terkini Emas & Perak</h3>
            <p>Update harga langsung setiap hari, jadi kamu gak perlu khawatir ketinggalan info!</p>
            <div class="harga-box">
                <h4 class="emas" id="harga-emas">
                    <span><i class="fas fa-crown metal-icon"></i> Emas:</span>
                    <span class="price-value" id="harga-emas-value">Rp 1.050.000 / gram</span>
                </h4>
                <h4 class="perak" id="harga-perak">
                    <span><i class="fas fa-ring metal-icon"></i> Perak:</span>
                    <span class="price-value" id="harga-perak-value">Rp 12.000 / gram</span>
                </h4>
                
                <div class="last-updated">
                    <p class="harga-update-time" id="update-time">Terakhir diperbarui: -</p>
                    <p class="auto-update-info"><i class="fas fa-sync-alt"></i> Update otomatis setiap 1 menit</p>
                </div>
                
                <p class="harga-note">*Harga dapat berubah sesuai kondisi pasar</p>
                <div class="api-status" id="api-status">
<<<<<<< Updated upstream
                <i class="fas fa-sync-alt fa-spin"></i> <span id="status-text">Memperbarui harga...</span>
=======
                    <i class="fas fa-sync-alt fa-spin"></i> <span id="status-text">Memperbarui harga...</span>
                </div>
>>>>>>> Stashed changes
            </div>
            </div>
        </div>
    </section>

    <script>
    // Konfigurasi API - GANTI DENGAN API KEY ANDA
    const GOLD_API_KEY = '{{ env("GOLD_API_KEY", "goldapi-altc8usmfahycrd-io") }}';
    const CACHE_DURATION = 60000; // 1 menit cache

    // Harga default jika API tidak tersedia
    const defaultPrices = {
        gold: 1050000   ,
        silver: 12000
    };

    // Format angka ke Rupiah
    function formatRupiah(angka) {
        if (isNaN(angka) || angka === null) return 'Rp 0';
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(angka);
    }

    // Format waktu menjadi HH:MM:SS WIB
    function formatWIBTime(date) {
        return date.toLocaleTimeString('id-ID', { 
            hour: '2-digit', 
            minute: '2-digit', 
            second: '2-digit',
            timeZone: 'Asia/Jakarta'
        }) + ' WIB';
    }

    // Format tanggal Indonesia
    function formatIndonesianDate(date) {
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            timeZone: 'Asia/Jakarta'
        };
        return date.toLocaleDateString('id-ID', options);
    }

    // Tampilkan status
    function showStatus(message, isError = false) {
        const statusEl = document.getElementById('api-status');
        const statusText = document.getElementById('status-text');
        if (statusEl && statusText) {
            statusEl.style.display = 'block';
            statusText.innerHTML = message;
            
            if (isError) {
                statusEl.innerHTML = `<i class="fas fa-exclamation-triangle"></i> ${message}`;
                statusEl.style.background = 'rgba(255, 107, 107, 0.1)';
                statusEl.style.color = '#ff6b6b';
                statusEl.style.borderColor = '#ff6b6b';
            } else {
                statusEl.innerHTML = `<i class="fas fa-sync-alt fa-spin"></i> ${message}`;
                statusEl.style.background = 'rgba(26, 26, 26, 0.8)';
                statusEl.style.color = '#f8f8f8';
                statusEl.style.borderColor = 'var(--gold-primary)';
            }
        }
    }

    // Sembunyikan status
    function hideStatus() {
        const statusEl = document.getElementById('api-status');
        if (statusEl) {
            statusEl.style.display = 'none';
        }
    }

    // Update UI dengan harga baru
    function updateUI(price, metal) {
        const elementId = metal === 'gold' ? 'harga-emas-value' : 'harga-perak-value';
        const element = document.getElementById(elementId);
        if (element) {
            // Animasi perubahan harga
            element.classList.add('pulse');
            setTimeout(() => {
                element.textContent = `${formatRupiah(price)} / gram`;
                element.classList.remove('pulse');
            }, 500);
        }
        
        // Update waktu
        const now = new Date();
        const timeElement = document.getElementById('update-time');
        if (timeElement) {
            timeElement.innerHTML = `Terakhir diperbarui: <strong>${formatWIBTime(now)}</strong><br>${formatIndonesianDate(now)}`;
        }
    }

    // Simpan harga ke cache
    function saveToCache(price, metal) {
        try {
            const cacheData = {
                price: price,
                timestamp: new Date().getTime(),
                metal: metal
            };
            localStorage.setItem(`${metal}PriceData`, JSON.stringify(cacheData));
        } catch (e) {
            console.error('Error saving to cache:', e);
        }
    }

    // Ambil harga dari cache
    function getFromCache(metal) {
        try {
            const cachedData = localStorage.getItem(`${metal}PriceData`);
            if (cachedData) {
                const { price, timestamp } = JSON.parse(cachedData);
                const currentTime = new Date().getTime();
                
                // Gunakan cache jika masih valid (kurang dari 1 menit)
                if (currentTime - timestamp < CACHE_DURATION) {
                    return price;
                }
            }
        } catch (e) {
            console.error('Error reading from cache:', e);
        }
        return null;
    }

    // Fungsi untuk mendapatkan harga dari API
    async function fetchMetalPrice(metal, currency = 'IDR') {
        const metalCode = metal === 'gold' ? 'XAU' : 'XAG';
        
        // Coba gunakan cache terlebih dahulu
        const cachedPrice = getFromCache(metal);
        if (cachedPrice) {
            return cachedPrice;
        }
        
        try {
            showStatus('Mengambil data harga terkini...');

            const response = await fetch(`https://www.goldapi.io/api/${metalCode}/${currency}`, {
                headers: {
                    'x-access-token': GOLD_API_KEY,
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            
            if (data && data.price) {
                // Konversi dari ounce ke gram (1 ounce = 31.1035 gram)
                const pricePerGram = data.price / 31.1035;
                saveToCache(pricePerGram, metal);
                return pricePerGram;
            } else {
                throw new Error('Format respons tidak valid');
            }
        } catch (error) {
            console.error(`Error fetching ${metal} price:`, error);
            
            // Coba gunakan cache sebagai fallback
            const cachedPrice = getFromCache(metal);
            if (cachedPrice) {
                showStatus(`Menggunakan data cache karena error: ${error.message}`, true);
                return cachedPrice;
            }
            
            // Jika cache tidak ada, gunakan harga default
            showStatus(`Menggunakan harga default karena error: ${error.message}`, true);
            return defaultPrices[metal];
        } finally {
            setTimeout(hideStatus, 3000);
        }
    }

    // Fungsi utama untuk memuat semua harga
    async function loadAllPrices() {
        try {
            // Ambil harga emas dan perak secara paralel
            const [goldPrice, silverPrice] = await Promise.all([
                fetchMetalPrice('gold'),
                fetchMetalPrice('silver')
            ]);

            // Update UI
            updateUI(goldPrice, 'gold');
            updateUI(silverPrice, 'silver');
            
        } catch (error) {
            console.error('Error loading prices:', error);
            showStatus('Gagal memuat harga terkini. Menampilkan harga cache.', true);
        }
    }

    // Inisialisasi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        // Tampilkan harga dari cache terlebih dahulu (jika ada)
        const cachedGoldPrice = getFromCache('gold');
        const cachedSilverPrice = getFromCache('silver');
        
        if (cachedGoldPrice) updateUI(cachedGoldPrice, 'gold');
        if (cachedSilverPrice) updateUI(cachedSilverPrice, 'silver');
        
        // Muat harga terbaru dari API
        loadAllPrices();
        
        // Set interval untuk update otomatis setiap menit
        setInterval(loadAllPrices, 60000);
        
        // Tambahkan juga event listener untuk manual refresh
        const hargaBox = document.querySelector('.harga-box');
        if (hargaBox) {
            hargaBox.addEventListener('click', function() {
                showStatus('Memperbarui harga...');
                loadAllPrices();
            });
        }
    });

    // Fallback untuk harga default jika API key tidak valid
    if (GOLD_API_KEY.includes('abc123') || GOLD_API_KEY.includes('your-key-here')) {
        console.warn('API key belum dikonfigurasi. Silakan daftar di goldapi.io dan ganti API key.');
        showStatus('API key belum dikonfigurasi. Silakan hubungi administrator.', true);
    }
    </script>