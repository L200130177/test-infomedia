-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 18 Jan 2022 pada 16.24
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infomedia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_privilege`
--

CREATE TABLE `t_privilege` (
  `id_privilege` int(11) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_privilege`
--

INSERT INTO `t_privilege` (`id_privilege`, `desc`, `last_update`) VALUES
(1, 'user_access', '2022-01-16 06:54:41'),
(2, 'role_access', '2022-01-16 06:54:41'),
(3, 'privilege_access', '2022-01-16 06:55:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_role`
--

CREATE TABLE `t_role` (
  `id_role` int(11) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_role`
--

INSERT INTO `t_role` (`id_role`, `desc`, `last_update`) VALUES
(1, 'admin', '2022-01-16 06:53:13'),
(2, 'user', '2022-01-16 06:53:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_role_privilege`
--

CREATE TABLE `t_role_privilege` (
  `id_role_privilege` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_role_privilege`
--

INSERT INTO `t_role_privilege` (`id_role_privilege`, `role_id`, `privilege_id`, `last_update`) VALUES
(1, 1, 1, '2022-01-16 06:55:30'),
(2, 1, 2, '2022-01-16 06:55:30'),
(3, 1, 3, '2022-01-16 06:55:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `password`, `role_id`, `last_update`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '2022-01-16 06:54:23'),
(2, 'user', '12dea96fec20593566ab75692c9949596833adc9', 2, '2022-01-16 06:54:23'),
(13, 'arif', 'bb6113797d13f9451665a7591e5943986f546dfa', 1, '2022-01-18 07:23:40'),
(17, 'asd', 'f10e2821bbbea527ea02200352313bc059445190', 1, '2022-01-18 12:58:43'),
(18, 'dsa', 'e908389d4bbf30e8dc72dc47cdf6b45d89e8b2a0', 2, '2022-01-18 13:12:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_privilege`
--
ALTER TABLE `t_privilege`
  ADD PRIMARY KEY (`id_privilege`);

--
-- Indeks untuk tabel `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `t_role_privilege`
--
ALTER TABLE `t_role_privilege`
  ADD PRIMARY KEY (`id_role_privilege`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_privilege`
--
ALTER TABLE `t_privilege`
  MODIFY `id_privilege` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_role_privilege`
--
ALTER TABLE `t_role_privilege`
  MODIFY `id_role_privilege` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
