<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Tips Investasi Emas Bagi Pemula',
                'slug' => Str::slug('Tips Investasi Emas Bagi Pemula'),
                'content' => "Emas merupakan salah satu instrumen investasi yang paling populer karena sifatnya yang stabil dan cenderung naik dalam jangka panjang. Bagi pemula, ada beberapa hal penting yang perlu diperhatikan sebelum mulai berinvestasi emas:\n\n1. Tentukan tujuan investasi Anda, apakah untuk jangka pendek, menengah, atau panjang.\n2. Pilih jenis emas yang tepat, seperti emas batangan (lebih stabil) atau perhiasan emas (punya nilai estetika).\n3. Belilah emas dari toko atau lembaga resmi yang terpercaya untuk menghindari penipuan.\n4. Sisihkan dana secara rutin, misalnya membeli emas sedikit demi sedikit agar portofolio bertambah.\n5. Jangan lupa untuk memperhatikan biaya penyimpanan serta keaslian sertifikat emas.\n\nDengan mengikuti langkah-langkah ini, pemula bisa memulai perjalanan investasi emas dengan lebih percaya diri dan terhindar dari kesalahan yang merugikan.",
                'thumbnail' => 'articles/investasi-emas.jpg',
                'author' => 'Admin Glory Gold',
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Mengapa Harga Emas Selalu Naik?',
                'slug' => Str::slug('Mengapa Harga Emas Selalu Naik?'),
                'content' => "Harga emas dikenal selalu mengalami kenaikan dari waktu ke waktu, meskipun dalam jangka pendek bisa mengalami fluktuasi. Ada beberapa faktor utama yang menyebabkan harga emas cenderung naik:\n\n1. Inflasi: Saat nilai mata uang melemah, emas sering dipilih sebagai lindung nilai (hedging).\n2. Permintaan global: Emas selalu dibutuhkan untuk perhiasan, industri, hingga cadangan bank sentral.\n3. Keterbatasan pasokan: Emas adalah sumber daya alam terbatas, sehingga semakin lama semakin berharga.\n4. Ketidakpastian ekonomi dan politik: Krisis global biasanya mendorong masyarakat beralih ke emas.\n\nKarena alasan inilah, banyak investor menjadikan emas sebagai aset aman (safe haven) untuk menjaga nilai kekayaan mereka.",
                'thumbnail' => 'articles/harga-emas.jpg',
                'author' => 'Jonathan',
                'published_at' => Carbon::now()->subDays(4),
            ],
            [
                'title' => 'Perbandingan Investasi Emas dan Perak',
                'slug' => Str::slug('Perbandingan Investasi Emas dan Perak'),
                'content' => "Emas dan perak sama-sama logam mulia yang sering dijadikan pilihan investasi. Namun, keduanya memiliki perbedaan yang perlu dipahami investor:\n\n1. **Nilai Stabil:** Emas lebih stabil dibandingkan perak, sehingga lebih cocok untuk investasi jangka panjang.\n2. **Harga Relatif:** Harga perak jauh lebih murah, sehingga bisa menjadi pilihan bagi pemula dengan modal kecil.\n3. **Volatilitas:** Perak lebih fluktuatif, sehingga potensi keuntungan besar tetapi risiko juga lebih tinggi.\n4. **Permintaan Industri:** Perak banyak digunakan dalam industri elektronik, medis, dan energi surya, membuat harganya dipengaruhi faktor industri.\n\nKesimpulannya, emas lebih cocok bagi investor konservatif, sedangkan perak bisa menjadi alternatif diversifikasi bagi investor yang siap menghadapi risiko lebih tinggi.",
                'thumbnail' => 'articles/emas-vs-perak.jpg',
                'author' => 'Praisley',
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'title' => 'Cara Menyimpan Emas yang Aman',
                'slug' => Str::slug('Cara Menyimpan Emas yang Aman'),
                'content' => "Memiliki emas berarti juga harus tahu cara menyimpannya agar aman dari pencurian maupun kerusakan. Berikut beberapa cara yang bisa dilakukan:\n\n1. **Gunakan Brankas:** Simpan emas di brankas pribadi yang tahan api dan sulit dibobol.\n2. **Simpan di Safe Deposit Box Bank:** Lebih aman karena dijaga pihak bank, meski ada biaya tahunan.\n3. **Pisahkan Tempat Simpan:** Jangan simpan semua emas di satu tempat untuk mengurangi risiko kehilangan total.\n4. **Gunakan Asuransi:** Pertimbangkan untuk mengasuransikan emas bernilai tinggi.\n5. **Hindari Menyimpan di Tempat Terlalu Mudah Diketahui:** Jangan simpan emas di laci atau tempat umum di rumah.\n\nDengan cara penyimpanan yang tepat, emas bisa tetap aman sekaligus menjaga nilainya sebagai aset berharga.",
                'thumbnail' => 'articles/penyimpanan-emas.jpg',
                'author' => 'Stevan',
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Prospek Investasi Emas di Tahun 2025',
                'slug' => Str::slug('Prospek Investasi Emas di Tahun 2025'),
                'content' => "Tahun 2025 diprediksi menjadi periode menarik bagi pasar emas. Beberapa analis memperkirakan harga emas akan terus mengalami kenaikan karena:\n\n1. **Ketidakpastian Ekonomi Global:** Konflik geopolitik dan perlambatan ekonomi dunia membuat emas semakin diminati.\n2. **Inflasi yang Masih Tinggi:** Kenaikan harga barang mendorong masyarakat mencari aset yang nilainya stabil.\n3. **Kebijakan Bank Sentral:** Banyak bank sentral dunia meningkatkan cadangan emasnya.\n4. **Permintaan Masyarakat:** Tren investasi logam mulia semakin populer di kalangan anak muda.\n\nJika faktor-faktor ini berlanjut, emas bisa menjadi salah satu instrumen investasi paling menjanjikan di tahun 2025. Namun, investor tetap perlu bijak dengan melakukan diversifikasi portofolio.",
                'thumbnail' => 'articles/prospek-emas-2025.jpg',
                'author' => 'Admin Glory Gold',
                'published_at' => Carbon::now()->subDay(),
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
