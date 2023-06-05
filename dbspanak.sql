-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 04:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbspanak`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Farish', 'admin_rish', 'rishfore01'),
(2, 'joe', 'admin_joe', 'tajoek08'),
(3, 'Rama', 'admin_Rama', 'perbandingan03'),
(4, 'Karmila', 'admin_Mila007', 'alimaa93'),
(5, 'Luna', 'admin_Luna54', 'lulanaa83');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aturan`
--

CREATE TABLE `tb_aturan` (
  `kode_aturan` varchar(10) NOT NULL,
  `list_gejala` varchar(255) NOT NULL,
  `kode_penyakit` int(11) NOT NULL,
  `penyakit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_aturan`
--

INSERT INTO `tb_aturan` (`kode_aturan`, `list_gejala`, `kode_penyakit`, `penyakit`) VALUES
('1', 'Mual - Pusing - Kembung - Nyeri Uluhati', 1, 'Maag'),
('2', 'Pusing - BAB lebih dari 3x sehari - Dehidrasi - Lemas', 2, 'Diare'),
('3', 'Pusing - Nyeri Di Perut - Nafsu Makan Berkurang - Terdapat Cacing Saat BAB', 3, 'Cacingan'),
('4', 'Nyeri Di Perut - Sulit BAB - BAB Berdarah - Perut Terasa Kenyang', 4, 'Sembelit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diagnosa`
--

CREATE TABLE `tb_diagnosa` (
  `kode_diagnosa` int(11) NOT NULL,
  `kode_penyakit` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `penanganan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_diagnosa`
--

INSERT INTO `tb_diagnosa` (`kode_diagnosa`, `kode_penyakit`, `keterangan`, `penanganan`) VALUES
(344005879, 1, 'pasien merasa mual, pusing, dan ehehehhe', 'Kurangi makanan berlemak. Makan secara teratur Hindari stress Kurangi makanan pedas'),
(1334006642, 1, 'Pasien mengalami mual disertai pusing selama 2 hari, kemudian 1 hari terakhir pasien juga mengalami kembung dan nyeri uluhati', 'Kurangi makanan berlemak. Makan secara teratur Hindari stress Kurangi makanan pedas'),
(1808626689, 2, 'mual banget', 'minum obat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `kode_gejala` int(11) NOT NULL,
  `gejala` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`kode_gejala`, `gejala`, `keterangan`) VALUES
(1, 'Mual', 'Mual adalah mekanisme pertahanan diri yang menyebabkan suatu sensasi tidak nyaman di perut dan membuat seseorang merasa ingin muntah. Perut yang terasa mual juga kadang menyebabkan seseorang untuk memuntahkan isi perutnya. Mual bisa disebabkan oleh beragam hal, seperti mabuk laut, sedang merasa stres atau gugup, keracunan makanan, atau penggunaan obat-obatan tertentu yang bisa menimbulkan mual sebagai efek sampingnya.'),
(2, 'Pusing', 'Pusing adalah sensasi seperti melayang, berputar, kliyengan, atau merasa akan pingsan. Pusing bisa dialami oleh siapa saja dan sensasi yang dirasakan dapat berbeda antara satu orang dengan orang yang lain.'),
(3, 'Kembung', 'Perut kembung adalah kondisi di mana perut mengalami penumpukan gas sehingga menyebabkan rasa tidak nyaman.     Normalnya, ketika Anda sedang makan, minum ataupun menelan air liur akan ada sedikit udara yang ikut masuk dalam tubuh, khususnya pada sistem pencernaan.     Namun, ketika jumlah udara tersebut terlalu banyak akan menimbulkan penumpukan gas dalam lambung.      Nah, kondisi itulah yang sering kali membuat perut menjadi kembung dan terasa tidak nyaman.     Ketika di dalam tubuh terlalu banyak gas, maka tubuh akan melakukan berbagai cara untuk mengeluarkannya. Bisa dengan cara buang gas hingga muntah'),
(4, 'Nyeri Uluhati', 'Nyeri ulu hati merupakan kondisi berupa rasa sakit pada bagian tengah atas perut yang disertai dengan sensasi panas,  mual, serta perut kembung. Nyeri pada ulu hati ini bisa disebabkan oleh beberapa kondisi medis, seperti sindrom dispepsia,  pankreatitis, irritable bowel syndrome, tukak lambung, hingga kanker lambung.'),
(5, 'BAB lebih dari 3x Sehari', 'Menurut kebiasaan orang normal dan kesehatan, dalam keadaan normal, jumlah buang air besar dalam sehari paling baik adalah 1 atau 2 kali.  Ini memastikan bahwa limbah, racun, dan limbah metaboslisme di usus akan dikeluarkan dalam waktu singkat.  Jika jumlah buang air besar terlalu banyak, lebih dari 3 kali buang air besar yang menunjukkan gejala konstipasi, maka hal itu perlu dikondisikan.  Kemudian, jumlah air besar hingga belasan kali bisa dipastikan bahwa Anda menderita diare, yang memerlukan pemeriksaan dan perawatan tepat waktu.'),
(6, 'Dehidrasi', 'Dehidrasi adalah kondisi ketika cairan tubuh yang hilang lebih banyak daripada yang dikonsumsi. Kondisi ini dapat menyebabkan tubuh tidak berfungsi secara normal.'),
(7, 'Lemas', 'Lemas adalah kondisi ketika tubuh terasa tidak berenergi. Selain karena kelelahan, kondisi kesehatan tertentu juga bisa menyebabkan badan terasa lemas. Selain itu, penggunaan obat-obatan dan masalah mental juga bisa menjadi penyebab di balik badan lemas.'),
(8, 'Nyeri Di Perut', 'Sakit perut atas umumnya terjadi akibat gangguan saluran pencernaan bagian atas, seperti kerongkongan, lambung, ginjal, hati, empedu, dan usus halus. Sementara sakit perut bawah biasanya disebabkan oleh gangguan saluran pencernaan bagian bawah, seperti usus besar, rektum, dan anus.'),
(9, 'Nafsu Makan Berkurang', 'Nafsu makan berkurang umumnya disebabkan oleh faktor psikologis, seperti stres atau depresi. Saat stres, tubuh memberi sinyal seakan sedang dalam bahaya. Otak kemudian melepaskan hormon adrenalin yang membuat jantung berdetak lebih cepat dan pencernaan melambat. Hal inilah yang membuat nafsu makan berkurang.'),
(10, 'Terdapat Cacing Saat BAB', 'Saat BAB mengalami cacing yang keluar bersama feses. Bisa jadi Anda mengalami cacingan. Cacingan disebabkan oleh infeksi parasit.'),
(12, 'BAB Berdarah', 'Buang air besar (BAB) berdarah merupakan kondisi di mana munculnya darah yang keluar melalui anus baik bersamaan dengan feses ataupun tidak.'),
(13, 'Perut Terasa Kenyang', 'Kekenyangan di awal makan disebut juga dengan kekenyangan dini (early satiety). Kondisi ini juga bisa ditandai dengan perasaan mual atau ingin muntah selama makan. Kekenyangan dini lebih sering dialami oleh wanita dibanding pria.'),
(14, 'BAB Berwarna Hitam', 'Kekenyangan di awal makan disebut juga dengan kekenyangan dini (early satiety). Kondisi ini juga bisa ditandai dengan perasaan mual atau ingin muntah selama makan. Kekenyangan dini lebih sering dialami oleh wanita dibanding pria.'),
(15, 'Muntah Darah', 'Muntah darah adalah kondisi ketika terdapat darah di dalam muntah. Muntah darah bisa berwarna hitam kecokelatan seperti kopi atau merah segar.  Warna darah pada muntah darah tergantung lamanya darah tercampur dengan asam lambung. Jika perdarahan baru saja terjadi, maka darah akan berwarna merah segar.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pakar`
--

CREATE TABLE `tb_pakar` (
  `id_pakar` int(11) NOT NULL,
  `nama_pakar` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pakar`
--

INSERT INTO `tb_pakar` (`id_pakar`, `nama_pakar`, `spesialis`) VALUES
(1, 'Dr. Ahmad Purwantono, SpPD-KGEH', 'Penyakit  Dalam Gastroenterologi-Hepatologi'),
(2, 'Dr. Kevin Permata, SpPD-KGEH', 'Penyakit  Dalam Gastroenterologi-Hepatologi'),
(3, 'Dr. Elenor Putri, SpPD-KGEH', 'Penyakit  Dalam Gastroenterologi-Hepatologi'),
(4, 'Dr. Syihab Fayumi, SpA', 'Spesialis Anak'),
(5, 'Dr. Rahmad Irwan, SpPD-KGEH', 'Penyakit  Dalam Gastroenterologi-Hepatologi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nama`, `jenis_kelamin`, `alamat`, `no_hp`, `username`, `password`) VALUES
(1, 'Fikar', 'Laki-Laki', 'Malang', '089653218791', 'fikar_tomorrow10', 'tomorifor02'),
(2, 'Sandi', 'Laki-Laki', 'Malang', '081349019287', 'sandi_cold03', 'playtime04'),
(4, 'Norziani', 'Perempuan', 'Surabaya', '081246327890', 'norziani_leane01', 'rumahhijau03'),
(5, 'Lala', 'Perempuan', 'Malang', '081253679001', 'tingky_lala092', 'dipsylalapoo02'),
(6, 'Kepin', 'Laki-Laki', 'Malang', '089654321873', 'kepin_pratama03', 'diamondinstar13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `kode_penyakit` int(11) NOT NULL,
  `penyakit` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`kode_penyakit`, `penyakit`, `keterangan`) VALUES
(1, 'Maag', 'Sakit maag adalah rasa tidak nyaman di perut, seperti perut terasa penuh, rasa panas di perut bagian atas, serta perut kembung. Kondisi ini merupakan gejala penyakit di lambung, seperti tukak lambung atau gastritis.  Sakit maag atau dispepsia merupakan keluhan yang sangat umum terjadi dan biasanya bersifat ringan. Keluhan ini bisa muncul selama makan, setelah makan, atau ketika terlambat makan.'),
(2, 'Diare', 'Diare adalah penyakit yang membuat penderitanya menjadi sering buang air besar dengan kondisi tinja yang encer atau berair. Diare umumnya terjadi akibat mengonsumsi makanan dan minuman yang terkontaminasi virus, bakteri, atau parasit.'),
(3, 'Cacingan', 'Cacingan merupakan penyakit yang disebabkan oleh cacing parasit karena faktor lingkungan atau makanan yang kurang terjaga kebersihannya. Cacingan sering kali muncul dengan gejala nyeri perut, diare, rasa gatal di anus, mual, dan muntah.'),
(4, 'Sembelit', 'Konstipasi atau sembelit adalah salah satu gangguan pencernaan yang sebenarnya sudah sangat umum dialami setiap orang.      Kondisi ini disebabkan oleh penurunan aktivitas usus. Gejala sembelit umumnya diawali dengan keluhan susah BAB.     Kondisi yang dikategorikan dalam sembelit adalah ketika seseorang BAB dengan frekuensi kurang dari 3 kali seminggu.      Namun, hal ini  belum cukup untuk dijadikan acuan diagnosis karena frekuensi buang air besar untuk setiap orang akan berbeda.'),
(5, 'Gastritis', 'Gastritis adalah peradangan pada dinding lambung yang ditandai dengan nyeri di ulu hati atau lambung. Jika dibiarkan, gastritis bisa berlangsung bertahun-tahun dan menyebabkan komplikasi serius, seperti tukak lambung.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_report`
--

CREATE TABLE `tb_report` (
  `id_report` varchar(255) NOT NULL,
  `id_pakar` int(11) NOT NULL,
  `nama_pakar` varchar(255) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode_diagnosa` int(11) NOT NULL,
  `kode_aturan` varchar(255) NOT NULL,
  `list_gejala` varchar(255) NOT NULL,
  `kode_penyakit` int(11) NOT NULL,
  `penyakit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_report`
--

INSERT INTO `tb_report` (`id_report`, `id_pakar`, `nama_pakar`, `id_pasien`, `nama`, `kode_diagnosa`, `kode_aturan`, `list_gejala`, `kode_penyakit`, `penyakit`) VALUES
('1842145613', 1, 'Dr. Ahmad Purwantono, SpPD-KGEH', 1, 'Fikar', 1808626689, '1', 'Mual - Pusing - Kembung - Nyeri Uluhati', 1, 'Maag'),
('1868130407', 3, 'Dr. Elenor Putri, SpPD-KGEH', 5, 'Lala', 1334006642, '1', 'Mual - Pusing - Kembung - Nyeri Uluhati', 1, 'Maag');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_aturan`
--
ALTER TABLE `tb_aturan`
  ADD PRIMARY KEY (`kode_aturan`),
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indexes for table `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  ADD PRIMARY KEY (`kode_diagnosa`),
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `tb_pakar`
--
ALTER TABLE `tb_pakar`
  ADD PRIMARY KEY (`id_pakar`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `kode_diagnosa` (`kode_diagnosa`),
  ADD KEY `kode_penyakit` (`kode_penyakit`),
  ADD KEY `id_pakar` (`id_pakar`),
  ADD KEY `kode_aturan` (`kode_aturan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_aturan`
--
ALTER TABLE `tb_aturan`
  ADD CONSTRAINT `tb_aturan_ibfk_2` FOREIGN KEY (`kode_penyakit`) REFERENCES `tb_penyakit` (`kode_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  ADD CONSTRAINT `tb_diagnosa_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `tb_penyakit` (`kode_penyakit`);

--
-- Constraints for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD CONSTRAINT `tb_report_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `tb_penyakit` (`kode_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_report_ibfk_2` FOREIGN KEY (`kode_aturan`) REFERENCES `tb_aturan` (`kode_aturan`),
  ADD CONSTRAINT `tb_report_ibfk_3` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_report_ibfk_4` FOREIGN KEY (`kode_diagnosa`) REFERENCES `tb_diagnosa` (`kode_diagnosa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_report_ibfk_5` FOREIGN KEY (`id_pakar`) REFERENCES `tb_pakar` (`id_pakar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
