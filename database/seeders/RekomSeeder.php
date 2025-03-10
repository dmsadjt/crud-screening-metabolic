<?php

namespace Database\Seeders;

use App\Models\Rekomendasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'diagnosis_id' => 2,
                'category' => 'Manajemen Stres',
                'recommendation' => 'Hindari begadang dan perbaiki kualitas tidur.'
            ],
            [
                'diagnosis_id' => 2,
                'category' => 'Manajemen Stres',
                'recommendation' => 'Lakukan teknik relaksasi seperti pernapasan dalam atau meditasi.'
            ],
            [
                'diagnosis_id' => 2,
                'category' => 'Aktivitas Fisik',
                'recommendation' => 'Kurangi waktu duduk atau rebahan terlalu lama.'
            ],
            [
                'diagnosis_id' => 2,
                'category' => 'Aktivitas Fisik',
                'recommendation' => 'Lakukan aktivitas fisik ringan hingga sedang minimal 30 menit per hari (jalan cepat, yoga, atau bersepeda ringan).'
            ],
            [
                'diagnosis_id' => 2,
                'category' => 'Pola Makan Sehat',
                'recommendation' => 'Perbanyak protein sehat seperti ikan, tahu, tempe, dan kacang-kacangan.'
            ],
            [
                'diagnosis_id' => 2,
                'category' => 'Pola Makan Sehat',
                'recommendation' => 'Tingkatkan konsumsi serat dari sayur, buah, dan biji-bijian utuh.'
            ],
            [
                'diagnosis_id' => 2,
                'category' => 'Pola Makan Sehat',
                'recommendation' => 'Kurangi konsumsi gula tambahan, garam, dan lemak jenuh.'
            ],
            [
                'diagnosis_id' => 2,
                'category' => 'Pemeriksaan Kesehatan Rutin',
                'recommendation' => 'Pantau tekanan darah, gula darah, dan lingkar perut setiap 3-6 bulan.'
            ],
            [
                'diagnosis_id' => 2,
                'category' => 'Pemeriksaan Kesehatan Rutin',
                'recommendation' => 'Konsultasikan dengan tenaga kesehatan jika ada gejala yang memburuk.'
            ],
            [
                'diagnosis_id' => 2,
                'category' => 'Diversifikasi TOGA',
                'recommendation' => 'Jahe (Zingiber officinale): Dapat dikonsumsi dalam teh atau campuran makanan untuk meningkatkan sensitivitas insulin.'
            ],
            [
                'diagnosis_id' => 2,
                'category' => 'Diversifikasi TOGA',
                'recommendation' => 'Daun kelor (Moringa oleifera): Dikonsumsi sebagai sayur atau teh untuk membantu mengontrol tekanan darah dan gula darah.'
            ],
            [
                'diagnosis_id' => 2,
                'category' => 'Pola Makan Sehat Berbasis TOGA',
                'recommendation' => 'Konsumsi jahe dan temulawak sebagai antiinflamasi alami yang membantu meningkatkan metabolisme dan mengontrol gula darah.'
            ],
            [
                'diagnosis_id' => 2,
                'category' => 'Pola Makan Sehat Berbasis TOGA',
                'recommendation' => 'Teh daun kelor sebagai sumber antioksidan tinggi yang dapat membantu mengontrol tekanan darah dan kolesterol.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Pola Makan Ketat',
                'recommendation' => 'Terapkan diet DASH atau Mediterania untuk menurunkan risiko hipertensi dan diabetes.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Pola Makan Ketat',
                'recommendation' => 'Batasi konsumsi nasi putih, tepung olahan, serta makanan olahan tinggi garam dan lemak.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Pola Makan Ketat',
                'recommendation' => 'Konsumsi makanan tinggi kalium dan magnesium untuk membantu tekanan darah.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Olahraga Teratur',
                'recommendation' => 'Lakukan olahraga aerobik (berjalan cepat, berenang, bersepeda) minimal 150 menit/minggu.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Olahraga Teratur',
                'recommendation' => 'Tambahkan latihan kekuatan untuk meningkatkan metabolisme dan massa otot.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Manajemen Berat Badan',
                'recommendation' => 'Targetkan penurunan berat badan sekitar 5-10% dalam 6 bulan jika mengalami obesitas.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Manajemen Berat Badan',
                'recommendation' => 'Hindari pola makan ekstrem dan diet ketat yang tidak berkelanjutan.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Pantauan Medis Ketat',
                'recommendation' => 'Periksa tekanan darah, gula darah, dan profil lipid setiap 1-3 bulan.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Pantauan Medis Ketat',
                'recommendation' => 'Konsultasi dengan dokter atau ahli gizi untuk intervensi yang lebih spesifik.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Pengelolaan Stres dan Tidur',
                'recommendation' => 'Pastikan tidur cukup (6-8 jam) dan hindari kebiasaan begadang.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Pengelolaan Stres dan Tidur',
                'recommendation' => 'Lakukan aktivitas relaksasi seperti olahraga ringan, mendengarkan musik, atau menulis jurnal.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Diversifikasi TOGA',
                'recommendation' => 'Pare (Momordica charantia): Dapat dikonsumsi sebagai jus atau sayur untuk membantu menurunkan kadar gula darah.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Diversifikasi TOGA',
                'recommendation' => 'Kayu manis (Cinnamomum verum): Dapat ditambahkan ke dalam teh atau makanan untuk membantu mengatur kadar gula darah.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Pola Makan Ketat Berbasis TOGA',
                'recommendation' => 'Rutin konsumsi pare yang dapat membantu menurunkan kadar gula darah.'
            ],
            [
                'diagnosis_id' => 3,
                'category' => 'Pola Makan Ketat Berbasis TOGA',
                'recommendation' => 'Kurma dan kayu manis sebagai pemanis alami yang lebih sehat dibandingkan gula pasir.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Diet Ketat dan Pengelolaan Gula Darah',
                'recommendation' => 'Batasi asupan karbohidrat sederhana dan pilih makanan dengan indeks glikemik rendah.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Diet Ketat dan Pengelolaan Gula Darah',
                'recommendation' => 'Kontrol porsi makan dan atur jadwal makan yang teratur.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Diet Ketat dan Pengelolaan Gula Darah',
                'recommendation' => 'Hindari makanan tinggi garam dan lemak jenuh untuk mengurangi risiko hipertensi dan penyakit jantung.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Latihan Fisik Terarah',
                'recommendation' => 'Konsultasikan dengan dokter atau fisioterapis untuk memilih olahraga yang aman.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Latihan Fisik Terarah',
                'recommendation' => 'Jika memiliki keterbatasan fisik, fokus pada latihan ringan seperti senam atau jalan kaki dalam durasi pendek tetapi sering.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Terapi Obat Jika Diperlukan',
                'recommendation' => 'Jika tekanan darah atau gula darah tinggi tidak terkendali, dokter mungkin meresepkan obat antihipertensi, statin, atau metformin.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Terapi Obat Jika Diperlukan',
                'recommendation' => 'Ikuti anjuran dosis dan jangan menghentikan obat tanpa persetujuan dokter.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Pemantauan Medis Rutin',
                'recommendation' => 'Periksa kesehatan lebih sering (setiap bulan atau sesuai anjuran dokter).'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Pemantauan Medis Rutin',
                'recommendation' => 'Jika mengalami komplikasi seperti nyeri dada atau sesak napas, segera konsultasikan ke fasilitas kesehatan.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Dukungan Psikososial',
                'recommendation' => 'Bergabung dengan komunitas atau program kesehatan untuk mendapatkan dukungan moral.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Dukungan Psikososial',
                'recommendation' => 'Hindari stres berlebihan yang bisa memperburuk kondisi sindrom metabolik.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Diversifikasi TOGA',
                'recommendation' => 'Daun sambiloto (Andrographis paniculata): Bisa dikonsumsi sebagai kapsul herbal atau teh untuk membantu menurunkan kadar gula darah.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Diversifikasi TOGA',
                'recommendation' => 'Bawang putih (Allium sativum): Dapat dikonsumsi mentah atau dalam masakan untuk menurunkan tekanan darah dan kadar kolesterol.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Diet Ketat dan Pengelolaan Gula Darah Berbasis TOGA',
                'recommendation' => 'Daun sambiloto untuk membantu menurunkan kadar gula darah dan sebagai antiinflamasi alami.'
            ],
            [
                'diagnosis_id' => 4,
                'category' => 'Diet Ketat dan Pengelolaan Gula Darah Berbasis TOGA',
                'recommendation' => 'Rutin konsumsi bawang putih untuk menurunkan tekanan darah dan kadar kolesterol.'
            ]
        ];

        foreach ($data as $item) {
            Rekomendasi::insert($item);
        }
    }
}
