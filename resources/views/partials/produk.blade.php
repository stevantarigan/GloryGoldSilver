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
        <i class="fas fa-sync-alt fa-spin"></i> <span id="status-text">Memperbarui harga...</span>
      </div>
    </div>
  </div>
</section>

<script>
// Ubah jadi 24 jam
const CACHE_DURATION = 86400000; // 24 jam dalam ms
const defaultPrices = {
  gold: 2100000,
  silver: 12000
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

// Status API
function showStatus(message, isError = false) {
  const statusEl = document.getElementById('api-status');
  if (!statusEl) return;
  statusEl.style.display = 'block';
  const statusTextEl = document.getElementById('status-text');
  statusTextEl.textContent = message;
  statusEl.style.color = isError ? '#ff6b6b' : '#f8f8f8';
}

// Update UI
function updateUI(price, metal) {
  const elementId = metal === 'gold' ? 'harga-emas-value' : 'harga-perak-value';
  const el = document.getElementById(elementId);
  if (el) el.textContent = `${formatRupiah(price)} / gram`;

  const now = new Date();
  const ut = document.getElementById('update-time');
  if (ut) ut.innerHTML = `Terakhir diperbarui: <strong>${formatWIBTime(now)}</strong><br>${formatIndonesianDate(now)}`;
}

// Cache
function saveToCache(price, metal) {
  localStorage.setItem(`${metal}PriceData`, JSON.stringify({ price, timestamp: Date.now() }));
}
function getFromCache(metal) {
  const s = localStorage.getItem(`${metal}PriceData`);
  if (!s) return null;
  try {
    const obj = JSON.parse(s);
    if (Date.now() - obj.timestamp < CACHE_DURATION) return obj.price;
  } catch(e) { }
  return null;
}

// Fetch Harga Emas (contoh Pluang / fallback default)
async function fetchGoldPrice() {
  try {
    showStatus('Mengambil harga dari API...');
    const resp = await fetch('https://api.pluang.com/asset/gold/pricing'); // pastikan endpoint benar
    if (!resp.ok) throw new Error('Resp not OK');
    const obj = await resp.json();
    const sellPricePerGram = obj.data?.sell || defaultPrices.gold;
    return sellPricePerGram;
  } catch (err) {
    console.error('Error fetch', err);
    showStatus('Gagal ambil API, pakai cache/default', true);
    return getFromCache('gold') || defaultPrices.gold;
  }
}

// Main Load
async function loadAllPrices() {
  const gold = await fetchGoldPrice();
  const silver = defaultPrices.silver; // sementara fix
  saveToCache(gold, 'gold');
  saveToCache(silver, 'silver');
  updateUI(gold, 'gold');
  updateUI(silver, 'silver');
}

document.addEventListener('DOMContentLoaded', () => {
  const cGold = getFromCache('gold');
  const cSilver = getFromCache('silver');
  if (cGold) updateUI(cGold, 'gold');
  if (cSilver) updateUI(cSilver, 'silver');

  loadAllPrices();
  setInterval(loadAllPrices, CACHE_DURATION); // update tiap 24 jam
});
</script>
