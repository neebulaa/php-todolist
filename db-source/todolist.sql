-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 04:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `cookie_id`
--

CREATE TABLE `cookie_id` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cookie_id`
--

INSERT INTO `cookie_id` (`id`, `user_id`) VALUES
(1, 5),
(2, 6),
(3, 7),
(4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `list-tugas`
--

CREATE TABLE `list-tugas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` varchar(500) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `due` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list-tugas`
--

INSERT INTO `list-tugas` (`id`, `user_id`, `title`, `description`, `subject`, `due`) VALUES
(21, 1, 'Kerjakan Thumbnail', 'Buat Thumbnail Design', 'Informatika', '1650578400'),
(22, 1, 'Tugas Main', 'bukan main mmain dengan saya', 'Belajar Sendiri', '1648335600'),
(23, 1, 'Coba', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit illo perferendis repellat fugiat sunt nostrum fugit, laudantium deserunt ipsam provident tenetur rear repudiandae quas enim aut, quaerat veniam molestias eius ipsum fuga officiis mollitia sapiente omnis molestiae ut? Rem dignissimos quaerat quia ullam vel animi aliquid porro sapiente corrupti eum minima dicta delectus libero sint sunt quod eligendi voluptas error aperiam dolorem, voluptatibus nisi velit facilis illo? Itaque fuga, vol', 'COba Tes', '1648076400'),
(24, 2, 'Belajar Database', 'Belaajr sama yor', 'SPY X FAMILY', '1651442400'),
(28, 2, 'BOTAHAN', 'AYO BERMAIN', 'BERMAIN', '1651960800'),
(29, 5, 'Random', 'Random bgt', 'Randomjuga', '1657404000'),
(30, 5, 'raefoiawejr', 'awerfawergbea etgawebrar agwerfv', 'aew rawfetv ', '1654984800'),
(31, 6, 'edwin', 'edwin', 'edwin', '1654725600'),
(32, 7, 'Random', 'Radawerawerv awe awer awe', 'ewarcawec', '1646521200'),
(33, 8, 'Tugas MTK', 'kejakan je', 'MTK', '1674169200'),
(34, 8, 'Tugas PKM', 'fdfewfew', 'PKN', '1673910000'),
(35, 5, 'Testtests', 'This is a new test', 'Test', '1705446000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(5, 'edwin', 'edwinhendly17@gmail.com', '$2y$10$j0spkFF6eN8DyPsz/DWvPuTslQusy51mjJb.EszwKnzIbK37fB6BO'),
(6, 'random', 'random@gmail.com', '$2y$10$yECvWRAPUFMp5CFGN6.RRuWks/wI1M/nhBiRtEsvy1lVh/5WyeTTK'),
(7, 'edwine1', 'edwine1@gmail.com', '$2y$10$KV.0kZATM6hDIqZg6rRVs..Gqt0ctGY2sls.f9wXcNQUC498iUx0m'),
(8, 'edwin gans', 'edwin.001@ski.sch.id', '$2y$10$sI.Mopft/7s.AGJzlQGcueOajulo5xtEfEyRtajyEXUVEUYvXSece');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cookie_id`
--
ALTER TABLE `cookie_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list-tugas`
--
ALTER TABLE `list-tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cookie_id`
--
ALTER TABLE `cookie_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `list-tugas`
--
ALTER TABLE `list-tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
