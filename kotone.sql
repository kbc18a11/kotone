-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 
-- サーバのバージョン： 10.4.8-MariaDB
-- PHP のバージョン: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kotone`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `house`
--

CREATE TABLE `house` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `money` varchar(255) NOT NULL,
  `judge` varchar(255) NOT NULL,
  `choice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `houses`
--

CREATE TABLE `houses` (
  `id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `money` varchar(255) NOT NULL,
  `judge` varchar(255) NOT NULL,
  `choice` varchar(255) NOT NULL,
  `flg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `houses`
--

INSERT INTO `houses` (`id`, `userid`, `item`, `money`, `judge`, `choice`, `flg`) VALUES
(230, 53, '食費', '1000', '1', '2021年02月20', '0'),
(231, 53, 'おこづかい', '100', '2', '2021年02月20', '1'),
(232, 53, '医療費', '3000', '1', '2021年02月20', '0'),
(233, 53, '食費', '1000', '1', '2021年02月13', '0'),
(234, 53, 'おこづかい', '2000', '2', '2021年02月13', '0'),
(235, 53, '水道代', '1000', '1', '2021年02月26', '0'),
(236, 53, '食費', '1000', '1', '2021年02月19', '0'),
(237, 53, '食費', '1000', '1', '2021年02月20', '0'),
(238, 53, '食費', '1000', '1', '2021年02月24', '0'),
(239, 53, '食費', '1000', '1', '2021年02月19', '1'),
(240, 53, '交際費', '1000', '1', '2021年02月19', '1'),
(241, 53, 'おこづかい', '1500', '2', '2021年02月19', '1'),
(242, 53, '医療費', '2000', '1', '2021年02月20', '1'),
(243, 53, '美容費', '4000', '1', '2021年02月20', '1'),
(244, 53, '給料', '20000', '2', '2021年02月20', '1'),
(245, 53, '医療費', '50000', '1', '2021年02月20', '1'),
(246, 53, '食費', '1000', '1', '2021年02月18', '0'),
(247, 53, '医療費', '2000', '1', '2021年02月12', '0');

-- --------------------------------------------------------

--
-- テーブルの構造 `mission`
--

CREATE TABLE `mission` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `judge` tinyint(5) NOT NULL,
  `goal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `mission`
--

INSERT INTO `mission` (`id`, `userid`, `type`, `no`, `judge`, `goal`) VALUES
(28, 53, 'day', 'goal1', 0, '腹筋30回'),
(29, 53, 'day', 'goal2', 1, '10km走る'),
(30, 53, 'day', 'goal3', 0, '食材の買い出し'),
(31, 53, 'day', 'goal5', 0, ''),
(32, 53, 'day', 'goal4', 1, '車の洗車'),
(33, 53, 'month', 'goal6', 0, '300km走る'),
(34, 53, 'month', 'goal8', 0, ''),
(35, 53, 'month', 'goal10', 0, ''),
(36, 53, 'month', 'goal7', 0, ''),
(37, 53, 'month', 'goal9', 0, ''),
(38, 53, 'year', 'goal12', 0, ''),
(39, 53, 'year', 'goal14', 0, ''),
(40, 53, 'year', 'goal11', 0, '50万円貯金する'),
(41, 53, 'year', 'goal13', 0, ''),
(42, 53, 'year', 'goal15', 0, '');

-- --------------------------------------------------------

--
-- テーブルの構造 `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `houseid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `itemprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `starttime` varchar(255) NOT NULL,
  `endtime` varchar(255) NOT NULL,
  `contents` varchar(255) NOT NULL,
  `flg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `schedule`
--

INSERT INTO `schedule` (`id`, `userid`, `date`, `year`, `month`, `day`, `starttime`, `endtime`, `contents`, `flg`) VALUES
(38, 53, '2021-02-01', '2021', '02', '01', '18:00', '20:00', '友達と焼肉', '0'),
(39, 53, '2021-02-02', '2021', '02', '02', '09:00', '18:00', '日帰り旅行', '0');

-- --------------------------------------------------------

--
-- テーブルの構造 `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `judge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `name`, `mail`, `password`, `reset`, `text`) VALUES
(52, 'a', 'kbc18a06@stu.kawahara.ac.jp', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pet', 'ぽち'),
(53, 'こんにちは', 'kbc18a06@stu.k', '683ee255f1ca66be11148819896f8f560e126539', 'pet', 'ごん'),
(54, 'inu', 'kbc18c06@stu.kawahara.ac.jp', '683ee255f1ca66be11148819896f8f560e126539', 'pet', 'j'),
(55, 'erer', 'kbc18a06@stu.kb', '683ee255f1ca66be11148819896f8f560e126539', 'pet', 'goma'),
(56, 'まりお', 'mario', 'b01e9da15ba25ee1f9aa58e1ea0d4bb75f039d33', 'pet', 'puru-to'),
(57, 'ルイージ', 'ruirui', '683ee255f1ca66be11148819896f8f560e126539', 'pet', 'pag');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- テーブルのインデックス `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `houses_ibfk_1` (`userid`);

--
-- テーブルのインデックス `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`) USING BTREE;

--
-- テーブルのインデックス `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `typeid` (`typeid`),
  ADD KEY `houseid` (`houseid`);

--
-- テーブルのインデックス `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- テーブルのインデックス `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- テーブルのAUTO_INCREMENT `mission`
--
ALTER TABLE `mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- テーブルのAUTO_INCREMENT `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- テーブルのAUTO_INCREMENT `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- テーブルの制約 `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `houses_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- テーブルの制約 `mission`
--
ALTER TABLE `mission`
  ADD CONSTRAINT `mission_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- テーブルの制約 `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `price_ibfk_2` FOREIGN KEY (`typeid`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `price_ibfk_3` FOREIGN KEY (`houseid`) REFERENCES `house` (`id`);

--
-- テーブルの制約 `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- テーブルの制約 `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
