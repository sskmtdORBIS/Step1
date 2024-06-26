-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 4 月 18 日 12:49
-- サーバのバージョン： 10.4.18-MariaDB
-- PHP のバージョン: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `inventory`
--
CREATE DATABASE IF NOT EXISTS `inventory` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `inventory`;

-- --------------------------------------------------------

--
-- テーブルの構造 `brand`
--

CREATE TABLE `brand` (
  `id` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `country` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `brand`
--

INSERT INTO `brand` (`id`, `name`, `country`) VALUES
('ADD', 'アドデス', 'ドイツ'),
('FIS', 'ファインスカイ', '日本'),
('UDN', 'ウディナ', 'イタリア'),
('UTG', 'ウルトラゲート', 'アメリカ');

-- --------------------------------------------------------

--
-- テーブルの構造 `goods`
--

CREATE TABLE `goods` (
  `id` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `size` varchar(20) DEFAULT NULL,
  `brand` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `goods`
--

INSERT INTO `goods` (`id`, `name`, `size`, `brand`) VALUES
('A12', 'ドライソックス', 'S', 'FIS'),
('A13', 'ドライソックス', 'M', 'FIS'),
('A301', '速乾タオルF', '40×80', 'FIS'),
('B21', 'ボディボトル', '500ml', 'UDN'),
('B33', 'FastZack20', 'S/M', 'ADD'),
('D05', 'トレイルスパッツUT', 'M', 'UTG');

-- --------------------------------------------------------

--
-- テーブルの構造 `stock`
--

CREATE TABLE `stock` (
  `goods_id` varchar(10) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `stock`
--

INSERT INTO `stock` (`goods_id`, `quantity`) VALUES
('A12', 12),
('A13', 10),
('A301', 16),
('B21', 18),
('B33', 0),
('D05', 4);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand`);

--
-- テーブルのインデックス `stock`
--
ALTER TABLE `stock`
  ADD UNIQUE KEY `goods_id_index` (`goods_id`);

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `brand_id` FOREIGN KEY (`brand`) REFERENCES `brand` (`id`);

--
-- テーブルの制約 `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `goods_id` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
