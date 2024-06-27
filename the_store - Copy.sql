-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 03:45 PM
-- Server version: 8.1.0
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `the_store`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_products` (`pr_id` VARCHAR(255))   BEGIN
    DELETE FROM cart_detail WHERE products_id = pr_id;
    DELETE FROM detail_transactions WHERE products_id = pr_id;
    DELETE FROM products WHERE id = pr_id;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `show_total_user_transaction` (`acc_id` VARCHAR(225)) RETURNS INT  BEGIN
    DECLARE total INT;
    SET total = (SELECT COUNT(id) FROM transactions WHERE account_id = acc_id GROUP BY account_id);
    RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('Admin','User','Owner') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile_pic` varchar(225) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `name`, `email`, `password`, `role`, `profile_pic`, `phone`) VALUES
('ADM655e1cfdb8607', 'owner', 'Owner', 'owner@owner.com', '$2y$10$sGUhiI.I39/WDxOrnNzqx.SGfsItfK8apcpTZXvh3hf05zYoXz43G', 'Owner', 'yes.jpeg', '081249193834'),
('ADM655e2126b4857', 'admin1', 'admin1', 'admin1@gmail.com', '$2y$10$sILIFVlRlD6HSIv4kGp6peUMxyx7sD26FBw2xInDZuTvFy7Ec4CNu', 'Admin', 'profile.png', '01212'),
('ADM655e21f1a1225', 'admin2', 'Admin2', 'admin2@gmail.com', '$2y$10$.Op4sFyV1dNwzmqzkY9/B.K7aVlTLKnye68Y7UO2GqBuDxwCdTcPO', 'Admin', 'profile.png', '12321214'),
('USR655614034a115', 'ndrn', 'Nurdin', 'email@gmail.com', '$2y$10$R3bFW51Iv4yNNiJSzJf5z.BFDbJq7xuupdSJ9tytgyxtmBpL/mL9a', 'User', 'WhatsApp Image 2023-11-10 at 22.49.28 (2).jpeg', '081549193833'),
('USR65685b0a112f5', 'elon_musk', 'Elon Musk', 'elon_musk@gmail.com', '$2y$10$XDNSIFvPv9BYdoiURwUe5uh0u808Jrb.IEmmGqkgMJnaq7EX8Ec.G', 'User', 'profile.png', '81539394993');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(225) NOT NULL,
  `account_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` varchar(225) NOT NULL,
  `cart_id` varchar(225) NOT NULL,
  `products_id` varchar(225) NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `cart_detail`
--
DELIMITER $$
CREATE TRIGGER `delete_cart` AFTER DELETE ON `cart_detail` FOR EACH ROW BEGIN
    DELETE FROM cart WHERE id = OLD.cart_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transactions`
--

CREATE TABLE `detail_transactions` (
  `id` varchar(225) NOT NULL,
  `transaction_id` varchar(225) NOT NULL,
  `products_id` varchar(225) NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detail_transactions`
--

INSERT INTO `detail_transactions` (`id`, `transaction_id`, `products_id`, `quantity`) VALUES
('DORD66376f1e17af5', 'ORD66376f1e15b06', 'PR663625f48b0cd', 1),
('DORD66376f1e1a5a2', 'ORD66376f1e15b06', 'PR66362648743cd', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` float NOT NULL,
  `quantity` int NOT NULL,
  `description` text NOT NULL,
  `images` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `description`, `images`) VALUES
('PR663625f48b0cd', 'Heuvel Tribe T-Shirt Jorey Black', 85000, 232, 'HEUVEL TRIBE ORIGINAL T-SHIRT\r\nSize chart ada di slide terakhir gambar\r\n\r\nMaterial\r\n- Bahan cotton combed 30s\r\n- Sablon Plastisol\r\n- Kualitas jahitan terbaik\r\n-------------------------------------------\r\nPengiriman\r\nSenin - Sabtu : 16.00 WIB\r\nMinggu : Tidak ada pengiriman\r\n-------------------------------------------\r\nJangan tanyakan stock, semua yang ada di etalase ready.\r\n-------------------------------------------\r\nNotes :\r\n- Tidak dapat ganti size atau artikel ketika pesanan sudah kami diproses (kecuali ada konfirmasi dari Admin langsung)\r\n- Mohon untuk mengisi Nama Jelas, Alamat lengkap No rumah, RT, RW, Kec. Kab/Kota, patokan rumah dan No HP yang dapat dihubungi. Apabila pesanan sudah kami proses Alamat dan No HP tidak dapat di rubah.\r\n- Tidak menerima penukaran barang/pengembalian dana (kecuali kesalahan dari kami)\r\n- Untuk pengajuan komplain pesanan max 3 hari setelah paket diterima disertakan unboxing paket', 'sg-11134201-7rcda-lrfeh0l9j60vdf.jpeg'),
('PR66362648743cd', 'Heuvel Tribe T-Shirt To See Blue', 85000, 218, 'HEUVEL TRIBE ORIGINAL T-SHIRT\r\nSize chart ada di slide terakhir gambar\r\n\r\nMaterial\r\n- Bahan cotton combed 30s\r\n- Sablon Plastisol\r\n- Kualitas jahitan terbaik\r\n-------------------------------------------\r\nPengiriman\r\nSenin - Sabtu : 16.00 WIB\r\nMinggu : Tidak ada pengiriman\r\n-------------------------------------------\r\nJangan tanyakan stock, semua yang ada di etalase ready.\r\n-------------------------------------------\r\nNotes :\r\n- Tidak dapat ganti size atau artikel ketika pesanan sudah kami diproses (kecuali ada konfirmasi dari Admin langsung)\r\n- Mohon untuk mengisi Nama Jelas, Alamat lengkap No rumah, RT, RW, Kec. Kab/Kota, patokan rumah dan No HP yang dapat dihubungi. Apabila pesanan sudah kami proses Alamat dan No HP tidak dapat di rubah.\r\n- Tidak menerima penukaran barang/pengembalian dana (kecuali kesalahan dari kami)\r\n- Untuk pengajuan komplain pesanan max 3 hari setelah paket diterima disertakan unboxing paket', 'Heuvel Tribe T-Shirt To See Blue.png'),
('PR663626bdcfb23', 'Heuvel Tribe Hoodie Distro Anders Caramel', 185800, 445, 'Heuvel Tribe Hoodie Distro Anders Caramel', 'Heuvel Tribe Hoodie Distro Anders Caramel.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(225) NOT NULL,
  `account_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `account_id`) VALUES
('655e230784b5a', 'ADM655e1cfdb8607'),
('656319d430aed', 'ADM655e1cfdb8607'),
('6568528bcaf76', 'ADM655e1cfdb8607'),
('6568d061e3930', 'ADM655e1cfdb8607'),
('6568f02aaa384', 'ADM655e1cfdb8607'),
('65685b170263d', 'USR65685b0a112f5');

-- --------------------------------------------------------

--
-- Stand-in structure for view `show_all_transaction_details_by_acc`
-- (See below for the actual view)
--
CREATE TABLE `show_all_transaction_details_by_acc` (
`tr_id` varchar(225)
,`account_id` varchar(225)
,`total_price` float
,`transaction_time` timestamp
,`payment_confirm` varchar(255)
,`status` enum('Menunggu','Diproses','Selesai','Ditolak')
,`user_name` varchar(225)
,`email` varchar(225)
,`dtr_id` varchar(225)
,`quantity` int
,`products_id` varchar(225)
,`products_name` varchar(225)
,`price` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `show_cart_details`
-- (See below for the actual view)
--
CREATE TABLE `show_cart_details` (
`cart_id` varchar(225)
,`account_id` varchar(225)
,`account_name` varchar(225)
,`cart_detail_id` varchar(225)
,`products_id` varchar(225)
,`quantity` int
,`products_name` varchar(225)
,`price` float
,`images` varchar(225)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `show_transaction_details`
-- (See below for the actual view)
--
CREATE TABLE `show_transaction_details` (
`tr_id` varchar(225)
,`account_id` varchar(225)
,`total_price` float
,`transaction_time` timestamp
,`status` enum('Menunggu','Diproses','Selesai','Ditolak')
,`user_name` varchar(225)
,`email` varchar(225)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `show_transaction_details_by_acc`
-- (See below for the actual view)
--
CREATE TABLE `show_transaction_details_by_acc` (
`tr_id` varchar(225)
,`account_id` varchar(225)
,`total_price` float
,`transaction_time` timestamp
,`user_name` varchar(225)
,`email` varchar(225)
,`dtr_id` varchar(225)
,`quantity` int
,`products_id` varchar(225)
,`products_name` varchar(225)
);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(225) NOT NULL,
  `account_id` varchar(225) NOT NULL,
  `total_price` float NOT NULL,
  `transaction_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_confirm` varchar(255) NOT NULL,
  `status` enum('Menunggu','Diproses','Selesai','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `account_id`, `total_price`, `transaction_time`, `payment_confirm`, `status`) VALUES
('ORD66376f1e15b06', 'USR65685b0a112f5', 340000, '2024-05-05 11:35:58', 'pprxteam_423778080_894003029396028_2645342562720704852_n.jpg', 'Diproses');

-- --------------------------------------------------------

--
-- Structure for view `show_all_transaction_details_by_acc`
--
DROP TABLE IF EXISTS `show_all_transaction_details_by_acc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `show_all_transaction_details_by_acc`  AS SELECT `tr`.`id` AS `tr_id`, `tr`.`account_id` AS `account_id`, `tr`.`total_price` AS `total_price`, `tr`.`transaction_time` AS `transaction_time`, `tr`.`payment_confirm` AS `payment_confirm`, `tr`.`status` AS `status`, `ac`.`name` AS `user_name`, `ac`.`email` AS `email`, `dtr`.`id` AS `dtr_id`, `dtr`.`quantity` AS `quantity`, `dtr`.`products_id` AS `products_id`, `pr`.`name` AS `products_name`, `pr`.`price` AS `price` FROM (((`detail_transactions` `dtr` join `transactions` `tr` on((`dtr`.`transaction_id` = `tr`.`id`))) join `account` `ac` on((`ac`.`id` = `tr`.`account_id`))) join `products` `pr` on((`dtr`.`products_id` = `pr`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `show_cart_details`
--
DROP TABLE IF EXISTS `show_cart_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `show_cart_details`  AS SELECT `ct`.`id` AS `cart_id`, `ct`.`account_id` AS `account_id`, `ac`.`name` AS `account_name`, `cd`.`id` AS `cart_detail_id`, `cd`.`products_id` AS `products_id`, `cd`.`quantity` AS `quantity`, `pr`.`name` AS `products_name`, `pr`.`price` AS `price`, `pr`.`images` AS `images` FROM (((`cart` `ct` join `account` `ac` on((`ct`.`account_id` = `ac`.`id`))) join `cart_detail` `cd` on((`ct`.`id` = `cd`.`cart_id`))) join `products` `pr` on((`cd`.`products_id` = `pr`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `show_transaction_details`
--
DROP TABLE IF EXISTS `show_transaction_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `show_transaction_details`  AS SELECT `tr`.`id` AS `tr_id`, `tr`.`account_id` AS `account_id`, `tr`.`total_price` AS `total_price`, `tr`.`transaction_time` AS `transaction_time`, `tr`.`status` AS `status`, `ac`.`name` AS `user_name`, `ac`.`email` AS `email` FROM (((`detail_transactions` `dtr` join `transactions` `tr` on((`dtr`.`transaction_id` = `tr`.`id`))) join `account` `ac` on((`ac`.`id` = `tr`.`account_id`))) join `products` `pr` on((`dtr`.`products_id` = `pr`.`id`))) GROUP BY `tr`.`id` ORDER BY `tr`.`transaction_time` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `show_transaction_details_by_acc`
--
DROP TABLE IF EXISTS `show_transaction_details_by_acc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `show_transaction_details_by_acc`  AS SELECT `tr`.`id` AS `tr_id`, `tr`.`account_id` AS `account_id`, `tr`.`total_price` AS `total_price`, `tr`.`transaction_time` AS `transaction_time`, `ac`.`name` AS `user_name`, `ac`.`email` AS `email`, `dtr`.`id` AS `dtr_id`, `dtr`.`quantity` AS `quantity`, `dtr`.`products_id` AS `products_id`, `pr`.`name` AS `products_name` FROM (((`detail_transactions` `dtr` join `transactions` `tr` on((`dtr`.`transaction_id` = `tr`.`id`))) join `account` `ac` on((`ac`.`id` = `tr`.`account_id`))) join `products` `pr` on((`dtr`.`products_id` = `pr`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_email` (`email`),
  ADD UNIQUE KEY `UNIQUE_phone` (`phone`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cart_account_id` (`account_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cart_detail_cart_id` (`cart_id`),
  ADD KEY `FK_cart_detail_products_id` (`products_id`);

--
-- Indexes for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_detail_transactions_id` (`transaction_id`),
  ADD KEY `FK_detail_products_id` (`products_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sessions_account_id` (`account_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_transactions_account_id` (`account_id`),
  ADD KEY `INDEX_transaction_time` (`transaction_time`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_cart_account_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `FK_cart_detail_cart_id` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `FK_cart_detail_products_id` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD CONSTRAINT `FK_detail_products_id` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_detail_transactions_id` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `FK_sessions_account_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `FK_transactions_account_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
