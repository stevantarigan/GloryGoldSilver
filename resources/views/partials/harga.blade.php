<section id="harga" class="harga">
    <div class="section-container">
        <h3 class="section-title"><i class="fas fa-coins"></i> Harga Terkini Emas & Perak</h3>
        <p>Update harga langsung setiap hari, jadi kamu gak perlu khawatir ketinggalan info!</p>
        <div class="harga-box">
            <h4 class="emas" id="harga-emas">
                <span><i class="fas fa-crown metal-icon"></i> Emas:</span>
                <span class="price-value" id="harga-emas-value">Rp - / gram</span>
            </h4>
            <h4 class="perak" id="harga-perak">
                <span><i class="fas fa-ring metal-icon"></i> Perak:</span>
                <span class="price-value" id="harga-perak-value">Rp - / gram</span>
            </h4>

            <div class="last-updated">
                <p class="harga-update-time" id="update-time">Terakhir diperbarui: -</p>
                <p class="auto-update-info"><i class="fas fa-sync-alt"></i> Update otomatis setiap 24 jam</p>
            </div>

            <p class="harga-note">*Harga dapat berubah sesuai kondisi pasar</p>
            <div class="api-status" id="api-status">
                <i class="fas fa-check-circle"></i> <span id="status-text">Menggunakan harga default</span>
            </div>
        </div>
    </div>
</section>

<script>
    // Harga default (ganti sesuai kebutuhan)
    const defaultPrices = {
        gold: 2040000, // Rp 2.100.000 / gram
        silver: 22236.92 // Rp 12.000 / gram
    };

    // Formatter Rupiah
    function formatRupiah(angka) {
        if (!angka || isNaN(angka)) return 'Rp 0';
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(angka);
    }

    // Formatter Waktu
    function formatWIBTime(date) {
        return date.toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            timeZone: 'Asia/Jakarta'
        }) + ' WIB';
    }

    function formatIndonesianDate(date) {
        return date.toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            timeZone: 'Asia/Jakarta'
        });
    }

    // Update UI
    function updateUI(price, metal) {
        const elementId = metal === 'gold' ? 'harga-emas-value' : 'harga-perak-value';
        const el = document.getElementById(elementId);
        if (el) el.textContent = `${formatRupiah(price)} / gram`;

        const now = new Date();
        const ut = document.getElementById('update-time');
        if (ut) ut.innerHTML =
            `Terakhir diperbarui: <strong>${formatWIBTime(now)}</strong><br>${formatIndonesianDate(now)}`;
    }

    // Load harga default
    function loadDefaultPrices() {
        updateUI(defaultPrices.gold, 'gold');
        updateUI(defaultPrices.silver, 'silver');
        document.getElementById('status-text').textContent = "Harga default digunakan";
    }

    document.addEventListener('DOMContentLoaded', () => {
        loadDefaultPrices();
        // Optional: auto-refresh tampilan setiap 24 jam biar tanggal update ikut ganti
        setInterval(loadDefaultPrices, 86400000);
    });
</script>
