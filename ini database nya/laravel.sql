-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2024 pada 14.38
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `abouts`
--

INSERT INTO `abouts` (`id`, `keterangan`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Pekpok Coffee terletak di Jl. Kp. Selang Cau, Gg Asem, Kec. Cibitung, Bekasi, Jawa Barat. Kami menyediakan berbagai macam Makanan dan Minuman. Kedai Kopi kekinian rumahan jauh dari jalanan = tenang, berdiri Agustus 2019.', '12.jpg', '2024-09-16 00:16:17', '2024-09-16 06:51:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_cares`
--

CREATE TABLE `customer_cares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer_cares`
--

INSERT INTO `customer_cares` (`id`, `nama`, `email`, `subjek`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'Dhata Eka', 'lainkali275@gmail.com', 'Sucong', 'Menurut saya terlalu manis', '2024-09-16 00:19:44', '2024-09-16 00:19:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`kategori`)),
  `harga` varchar(255) DEFAULT NULL,
  `harga_before` varchar(255) DEFAULT NULL,
  `harga_after` varchar(255) DEFAULT NULL,
  `promo` tinyint(1) NOT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `nama`, `kategori`, `harga`, `harga_before`, `harga_after`, `promo`, `masa_berlaku`, `keterangan`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Kentang Goreng', '[\"0\",\"2\"]', '18000', NULL, NULL, 0, NULL, 'Cemilan enak', 'Kentang Goreng.jpg', '2024-09-15 22:56:01', '2024-09-15 23:05:39'),
(2, 'Dimsum', '[\"0\",\"2\"]', '25000', NULL, NULL, 0, NULL, 'Selagi hangat dipadukan dengan teh sangat enak', 'Dimsum.jpg', '2024-09-15 22:58:58', '2024-09-15 23:05:15'),
(3, 'Churros', '[\"0\"]', '20000', NULL, NULL, 0, NULL, 'Kue yang dipadukan dengan coklat cocok untuk teman ngopi mu', 'Churros.jpg', '2024-09-15 23:01:42', '2024-09-15 23:01:42'),
(4, 'Cireng', '[\"0\"]', '20000', NULL, NULL, 0, NULL, 'Cemilan lezat dengan perpaduan aci dan tepung', 'Cireng.jpg', '2024-09-15 23:02:38', '2024-09-15 23:02:38'),
(5, 'Sosis Sopel', '[\"0\",\"2\"]', '20000', NULL, NULL, 0, NULL, 'Cemilan sosis pedas lezat', 'Sosis Sopel.jpg', '2024-09-15 23:04:54', '2024-09-15 23:04:54'),
(6, 'Cafe Latte Ice', '[\"1\"]', '22000', NULL, NULL, 0, NULL, 'Perpaduan kopi latte dengan susu', 'Cafe Latte Ice.jpg', '2024-09-15 23:08:08', '2024-09-15 23:08:08'),
(7, 'Es Kopi dari rumah', '[\"1\",\"2\"]', '22000', NULL, NULL, 0, NULL, 'Perpaduan antara brown sugar, kopi, dan susu', 'Eskopi dari rumah.jpg', '2024-09-15 23:11:46', '2024-09-15 23:11:46'),
(8, 'Gugus Mangga', '[\"1\",\"2\"]', '22000', NULL, NULL, 0, NULL, 'Perpaduan antara mango powder dengan susu full cream', 'Gugus Mangga.jpg', '2024-09-15 23:18:52', '2024-09-15 23:18:52'),
(9, 'Kukiy Coffee', '[\"1\",\"2\"]', '22000', NULL, NULL, 0, NULL, 'Perpaduan antara Kopi, Kue Cookies dan susu full cream', 'Kukiy Coffee.jpg', '2024-09-15 23:21:12', '2024-09-15 23:21:12'),
(10, 'Matcha Latte', '[\"1\"]', '22000', NULL, NULL, 0, NULL, 'Perpaduan antara Matcha, Latte, dan susu full cream', 'Matcha Latte.jpg', '2024-09-15 23:22:40', '2024-09-15 23:22:40'),
(11, 'Red Chamomile', '[\"1\"]', '22000', NULL, NULL, 0, NULL, 'Perpaduan antara teh bunga dengan susu full cream', 'Red Chamomile.jpg', '2024-09-15 23:26:04', '2024-09-15 23:26:04'),
(12, 'Red Velvet Latte', '[\"1\"]', '22000', NULL, NULL, 0, NULL, 'Perpaduan antara red velvet, latte, dan susu full cream', 'Red Velvet Latte.jpg', '2024-09-15 23:26:58', '2024-09-15 23:26:58'),
(13, 'Sijamabu', '[\"1\"]', '22000', NULL, NULL, 0, NULL, 'Minuman dengan warna lucu dan rasa yang lembut dengan rasa Coco Pandan yang lebih creamy pasti bakal ketagihan', 'Sijamabu.jpg', '2024-09-15 23:29:29', '2024-09-15 23:29:29'),
(14, 'Solemidu', '[\"1\"]', '22000', NULL, NULL, 0, NULL, 'Minuman soda di campur dengan lemon dan manis dari madu bikin seger', 'Solemidu.jpg', '2024-09-15 23:30:32', '2024-09-15 23:30:32'),
(15, 'Sucong', '[\"1\",\"2\"]', '22000', NULL, NULL, 0, NULL, 'Minuman dengan perpaduan pandan dengan susu full cream', 'Sucong.jpg', '2024-09-15 23:32:22', '2024-09-15 23:32:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_10_094555_create_menus_table', 1),
(6, '2024_05_12_061156_create_abouts_table', 1),
(7, '2024_05_12_083045_create_testimonis_table', 1),
(8, '2024_05_12_091121_create_customer_cares_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `testimonis`
--

CREATE TABLE `testimonis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'user.png',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `gambar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@test.com', NULL, '$2y$10$2iNiMmXMWeCLgyIXWK4p8.Tt2PZrMb5LpKgTSvKlaJNZMYZHOyK6O', 'user.png', NULL, '2024-09-15 08:45:15', '2024-09-15 08:45:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer_cares`
--
ALTER TABLE `customer_cares`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `customer_cares`
--
ALTER TABLE `customer_cares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
