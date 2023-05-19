-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2023 pada 12.55
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_berita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_about`
--

CREATE TABLE `tb_about` (
  `id` int(11) NOT NULL,
  `about_content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_about`
--

INSERT INTO `tb_about` (`id`, `about_content`) VALUES
(2, 'Selamat datang di halaman About kami. Kami adalah perusahaan yang bergerak di bidang teknologi informasi. Kami menyediakan solusi teknologi yang inovatif dan berkualitas tinggi untuk memenuhi kebutuhan bisnis Anda. Dengan tim ahli yang berpengalaman, kami siap memberikan layanan terbaik kepada Anda. Kami fokus pada kepuasan pelanggan dan memberikan solusi yang tepat guna untuk membantu Anda mencapai tujuan bisnis Anda. Terima kasih atas kepercayaan Anda kepada kami.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id` int(11) NOT NULL,
  `judul_artikel` varchar(100) DEFAULT NULL,
  `content_artikel` longtext DEFAULT NULL,
  `cover` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `slug` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_artikel`
--

INSERT INTO `tb_artikel` (`id`, `judul_artikel`, `content_artikel`, `cover`, `user_id`, `created_time`, `id_kategori`, `slug`) VALUES
(6, 'Jeruk', 'Jeruk (bahasa Inggris: orange) adalah buah dari spesies citrus dalam famili Rutaceae. Ini mengacu pada Citrus sinensis[1] yang juga disebut jeruk manis dan Citrus aurantium yang disebut jeruk pahit. Jeruk manis bereproduksi secara aseksual (apomiksis melalui nucellar embryony), yaitu melalui sistem cangkok, okulasi atau stek, dan varietas jeruk manis muncul melalui mutasi.', 'TIRTO-shutterstock_115590688_ratio-16x9.jpeg', 1, '2023-05-08 01:27:54', 7, NULL),
(7, 'Semangka', 'Semangka (juga dikenal sebagai tembikai[1] atau mendikai[1]) (Citrullus lanatus, suku ketimun-ketimunan atau Cucurbitaceae) adalah tanaman merambat yang berasal dari daerah setengah gurun di Afrika bagian selatan.[2] Tanaman ini masih sekerabat dengan labu-labuan (Cucurbitaceae), melon (Cucumis melo), dan ketimun (Cucumis sativus). Semangka biasa dipanen buahnya untuk dimakan segar atau dibuat jus. Biji semangka yang dikeringkan dan disangrai juga dapat dimakan isinya (kotiledon) sebagai kua', 'Watermeloen.jpg', 1, '2023-05-08 01:27:43', 7, NULL),
(62, 'asd23', 'asd', 'upload_20230518150109_Jellyfish.jpg', 1, '2023-05-18 15:01:49', 7, NULL),
(63, 'Asuransi CAR: Jenis, Kelebihan, Cara Klaim, hingga Premi', 'Asuransi CAR (Central Asia Raya), juga dikenal sebagai CAR Life Insurance, adalah salah satu perusahaan asuransi terpercaya di Indonesia. Mereka menawarkan berbagai jenis polis asuransi jiwa dan kesehatan untuk memenuhi kebutuhan nasabah mereka. Berikut adalah penjelasan singkat tentang beberapa jenis polis yang ditawarkan oleh CAR Life Insurance:\r\n\r\nAsuransi Kesehatan:\r\nAsuransi Prevensia Pro Ultimate: Memberikan perlindungan kesehatan hingga Rp1,5 miliar per tahun dengan manfaat utama rawat inap dan pembedahan.\r\nAsuransi Prevensia Care Ultimate: Memberikan manfaat pertanggungan tanpa batas maksimal tahunan, termasuk jaminan perawatan kesehatan, manfaat medical check-up, dan lainnya.\r\nFamily Prevensia CARe: Memberikan jaminan biaya rawat inap, pembedahan, dan rawat jalan bagi tertanggung dan keluarga, dengan tambahan bonus no claim jika tidak ada klaim selama 12 bulan berturut-turut.\r\nCARina: Memberikan perlindungan optimal saat tertanggung harus rawat inap, termasuk santunan meninggal dunia.\r\nAsuransi Jiwa:\r\nWhole Life: Memberikan jaminan masa depan keuangan bagi keluarga dengan pembayaran uang pertanggungan jika tertanggung meninggal dunia atau tetap hidup sampai akhir masa pertanggungan.\r\nWhole Life Eksekutif: Memberikan jaminan proteksi hingga usia 80 tahun dengan pembayaran dana tahapan pada usia 60, 70, dan 80 tahun, serta manfaat tambahan lainnya.\r\nProtecta Raya: Memberikan perlindungan akibat kecelakaan, termasuk ganti rugi dan biaya pengobatan.\r\nUnit Link: Produk asuransi yang juga berfungsi sebagai investasi, menggabungkan proteksi dan potensi keuntungan dari program investasi.\r\nEksekutif Rupiah: Memberikan jaminan investasi dana dengan kepastian bunga pertahun selama 6 tahun, disertai dengan perlindungan jiwa.\r\nDana CARity 20: Memberikan perlindungan dengan kombinasi asuransi jiwa berjangka, asuransi kecelakaan, cacat tetap, dan manfaat bertahap setelah pertanggungan berakhir.\r\nCARLegacy: Asuransi kombinasi antara proteksi, tabungan, dan warisan untuk memenuhi kebutuhan perlindungan dan keuangan keluarga di masa depan.\r\nAsuransi Pendidikan:\r\nBeasiswa Ananda: Memberikan dana pendidikan jika tertanggung tetap hidup hingga akhir masa pertanggungan, serta manfaat lainnya jika tertanggung meninggal dunia dalam masa pertanggungan.\r\nSelain itu, CAR Life Insurance juga memiliki produk asuransi individu, asuransi grup, dan produk bancassurance yang ditawarkan kepada karyawan, badan usaha, atau perkumpulan.', 'upload_20230518154417_Asuransi-CAR-Jenis-Kelebihan-Cara-Klaim-hingga-Premi-360x240.jpg', 1, '2023-05-19 09:09:41', 5, NULL),
(65, 'Perkembangan Terkini dalam Teknologi: Masa Depan yang Menjanjikan', 'Teknologi terus berkembang dengan pesat dan memiliki dampak yang signifikan pada kehidupan kita. Inovasi baru dan perubahan dalam bidang teknologi membuka pintu bagi kemajuan yang tak terbatas. Dalam artikel ini, kami akan menjelajahi beberapa perkembangan terkini dalam teknologi yang menjanjikan masa depan yang cerah bagi manusia.\r\n\r\nKecerdasan Buatan (AI) dan Pembelajaran Mesin (Machine Learning):\r\nKecerdasan Buatan dan Pembelajaran Mesin telah menjadi fokus utama dalam perkembangan teknologi saat ini. AI memungkinkan komputer untuk belajar dan mengambil keputusan secara mandiri, sedangkan Machine Learning memungkinkan sistem untuk belajar dari data dan meningkatkan kinerjanya seiring waktu. Teknologi ini telah digunakan dalam berbagai bidang, termasuk otomasi industri, pengenalan wajah, asisten virtual, dan diagnosis medis yang lebih akurat.\r\n\r\nInternet of Things (IoT):\r\nInternet of Things merujuk pada jaringan perangkat fisik yang terhubung melalui internet, memungkinkan pertukaran data dan interaksi antara perangkat tersebut. Dalam beberapa tahun terakhir, IoT telah berkembang pesat dan menjadi bagian integral dari kehidupan sehari-hari. Contohnya adalah rumah pintar yang memungkinkan pengendalian lampu, suhu, dan keamanan melalui smartphone, serta kendaraan pintar yang dapat berkomunikasi satu sama lain untuk meningkatkan keselamatan dan efisiensi di jalan raya.\r\n\r\nTeknologi Blockchain:\r\nBlockchain adalah teknologi yang memungkinkan penyimpanan dan pertukaran data yang aman dan transparan. Ini telah mengubah cara kita melakukan transaksi finansial dan dapat digunakan dalam berbagai bidang lain seperti rantai pasokan, logistik, dan sektor energi. Blockchain menghilangkan kebutuhan akan perantara dan memastikan integritas data, sehingga mengurangi biaya dan meningkatkan keamanan.\r\n\r\nRealitas Virtual (VR) dan Augmented Reality (AR):\r\nRealitas Virtual dan Augmented Reality menggabungkan dunia nyata dengan elemen-elemen virtual, menciptakan pengalaman yang mendalam dan imersif. VR digunakan dalam permainan, simulasi pelatihan, dan industri hiburan, sementara AR telah diterapkan dalam sektor pendidikan, desain produk, dan sektor kesehatan. Kedua teknologi ini terus berevolusi dan memiliki potensi besar dalam meningkatkan cara kita berinteraksi dengan dunia di sekitar kita.\r\n\r\nEnergi Terbarukan dan Penghematan Energi:\r\nDalam upaya menghadapi perubahan iklim dan keterbatasan sumber daya, pengembangan teknologi energi terbarukan menjadi sangat penting. Solusi seperti panel surya, turbin angin, dan baterai penyimpanan energi telah memainkan peran utama dalam mempercepat transisi ke energi bersih. Selain itu, teknologi penghematan energi seperti sensor cerdas dan sistem manajemen energi telah membantu mengoptimalkan pengguna', 'upload_20230519090359_digitaltech.jpg', 1, '2023-05-19 09:03:59', 4, NULL),
(66, 'Pentingnya keberlanjutan lingkungan', 'Tentu! Berikut ini adalah artikel tentang pentingnya keberlanjutan lingkungan:\r\n\r\nJudul: Keberlanjutan Lingkungan: Memelihara Bumi untuk Masa Depan yang Lebih Baik\r\n\r\nPengantar:\r\nKeberlanjutan lingkungan menjadi semakin penting di era modern ini. Dalam upaya untuk melindungi planet kita dan menciptakan masa depan yang lebih baik, perlunya tindakan berkelanjutan dalam pengelolaan sumber daya dan perlindungan lingkungan menjadi sangat mendesak. Dalam artikel ini, kita akan menjelajahi pentingnya keberlanjutan lingkungan dan bagaimana upaya kecil kita dapat memiliki dampak besar terhadap Bumi.\r\n\r\n1. Pelestarian Sumber Daya Alam:\r\nKeberlanjutan lingkungan melibatkan pelestarian sumber daya alam yang terbatas. Sumber daya seperti air, udara bersih, hutan, dan keanekaragaman hayati semakin terancam oleh eksploitasi manusia yang berlebihan. Dengan mengelola sumber daya ini secara bijaksana, kita dapat memastikan ketersediaan jangka panjang bagi generasi mendatang.\r\n\r\n2. Pengurangan Emisi Karbon:\r\nPerubahan iklim menjadi salah satu tantangan terbesar kita saat ini. Emisi gas rumah kaca yang dihasilkan oleh aktivitas manusia, terutama dari pembakaran bahan bakar fosil, menyebabkan pemanasan global dan dampak yang merugikan bagi ekosistem. Keberlanjutan lingkungan melibatkan pengurangan emisi karbon dengan mengadopsi energi terbarukan, transportasi ramah lingkungan, dan praktik bisnis yang berkelanjutan.\r\n\r\n3. Peningkatan Penggunaan Energi Terbarukan:\r\nSumber energi terbarukan seperti tenaga surya, tenaga angin, dan biomassa menawarkan solusi yang berkelanjutan dalam memenuhi kebutuhan energi global. Mengadopsi teknologi energi terbarukan dan mempromosikan penggunaannya dapat mengurangi ketergantungan kita pada bahan bakar fosil yang terbatas dan mengurangi dampak negatif terhadap lingkungan.\r\n\r\n4. Pengurangan Limbah dan Daur Ulang:\r\nPengelolaan limbah yang efisien adalah bagian penting dari keberlanjutan lingkungan. Mengurangi, mendaur ulang, dan membuang limbah dengan benar adalah cara untuk meminimalkan dampak negatif terhadap ekosistem. Praktik seperti pengurangan penggunaan plastik sekali pakai, pemilihan produk ramah lingkungan, dan mendaur ulang limbah dapat membantu kita menciptakan lingkungan yang lebih bersih dan lebih sehat.\r\n\r\n5. Pendidikan dan Kesadaran Lingkungan:\r\nPendidikan dan kesadaran lingkungan adalah fondasi untuk mencapai keberlanjutan lingkungan. Melalui pendidikan yang tepat, kita dapat menyadari pentingnya perlindungan lingkungan, memahami konsekuensi dari tindakan kita, dan mengadopsi perubahan gaya hidup yang lebih berkelanjutan. Dengan membagikan pengetahuan dan mengajarkan generasi mendatang tentang kebut\r\n\r\nuhan mendesak ini, kita dapat memastikan bahwa upaya keberlanjutan lingkungan berlanjut di masa depan.\r\n\r\nKesimpulan:\r\nKeberlanjutan lingkungan adalah tanggung jawab bersama kita untuk menjaga planet kita agar tetap subur dan lestari. Melalui tindakan yang berkelanjutan, kita dapat menciptakan masa depan yang lebih baik bagi generasi mendatang. Dengan pelestarian sumber daya alam, pengurangan emisi karbon, penggunaan energi terbarukan, pengelolaan limbah yang efisien, dan pendidikan lingkungan, kita dapat membangun dunia yang lebih berkelanjutan dan harmonis.', 'upload_20230519090634_digitaltech.jpg', 1, '2023-05-19 09:06:34', 4, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `judul_berita` varchar(100) DEFAULT NULL,
  `content_berita` longtext DEFAULT NULL,
  `cover` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `slug` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `judul_berita`, `content_berita`, `cover`, `user_id`, `created_time`, `id_kategori`, `slug`) VALUES
(14, 'Pemerintah Luncurkan Program Subsidi Pendidikan untuk Masyarakat Berpenghasilan Rendah', 'Pemerintah telah mengumumkan peluncuran program subsidi pendidikan yang bertujuan untuk membantu masyarakat berpenghasilan rendah dalam mengakses pendidikan yang berkualitas. Program ini diharapkan dapat mengurangi beban biaya pendidikan dan meningkatkan aksesibilitas bagi keluarga dengan keterbatasan finansial.', 'upload_20230519124646_IMG_0005.JPG', 1, '2023-05-19 12:46:46', 9, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL,
  `slug` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama_kategori`, `slug`) VALUES
(4, 'Wisata', NULL),
(5, 'Kuliner', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_berita`
--

CREATE TABLE `tb_kategori_berita` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL,
  `slug` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori_berita`
--

INSERT INTO `tb_kategori_berita` (`id`, `nama_kategori`, `slug`) VALUES
(8, 'berita1', NULL),
(9, 'berita4', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `nama_menu`, `url`) VALUES
(1, 'Beranda', NULL),
(2, 'Artikel', NULL),
(13, 'Berita', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_operator` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `nama_operator`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Rifki Maulana');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori_berita`
--
ALTER TABLE `tb_kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_berita`
--
ALTER TABLE `tb_kategori_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
