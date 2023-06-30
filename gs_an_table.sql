-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 6 月 30 日 09:33
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `place` varchar(64) NOT NULL,
  `address` varchar(128) NOT NULL,
  `color` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `place`, `address`, `color`) VALUES
(256, 'よしおマンション', '札幌駅', '#ff0000'),
(257, 'クレープよしお', '新札幌駅', '#0000ff'),
(258, 'よしお湯', '琴似駅', '#ffff00'),
(259, 'よーしおジム', '八軒東中', '#ffa500'),
(260, '', '', ''),
(261, 'よしおマンション', '札幌駅', '#ff0000'),
(262, 'クレープよしお', '新札幌駅', '#0000ff'),
(263, 'よしお湯', '琴似駅', '#ffff00'),
(264, 'よーしおジム', '八軒東中', '#ffa500'),
(265, '', '', ''),
(266, 'よしおマンション', '札幌駅', '#ff0000'),
(267, 'クレープよしお', '新札幌駅', '#0000ff'),
(268, 'よしお湯', '琴似駅', '#ffff00'),
(269, 'よーしおジム', '八軒東中', '#ffa500'),
(270, '', '', ''),
(271, 'よしおマンション', '札幌駅', '#ff0000'),
(272, 'クレープよしお', '新札幌駅', '#0000ff'),
(273, 'よしお湯', '琴似駅', '#ffff00'),
(274, 'よーしおジム', '八軒東中', '#ffa500'),
(275, '', '<script>alert(\'アラートのメッセージ\')</script>', ''),
(276, 'よしおマンション', '札幌駅', '#ff0000'),
(277, 'クレープよしお', '新札幌駅', '#0000ff'),
(278, 'よしお湯', '琴似駅', '#ffff00'),
(279, 'よーしおジム', '八軒東中', '#ffa500'),
(280, '', '<script>alert(\'アラートのメッセージ\')</script>', ''),
(281, 'よしおマンション', '札幌駅', '#ff0000'),
(282, 'クレープよしお', '新札幌駅', '#0000ff'),
(283, 'よしお湯', '琴似駅', '#ffff00'),
(284, 'よーしおジム', '琴似駅', '#ffa500'),
(285, '', '', ''),
(286, 'よしおマンション', '倶知安駅', '#008000'),
(287, 'クレープよしお', '旭川駅', '#ffa500'),
(288, 'よしお湯', '琴似駅', '#ffff00'),
(289, 'よーしおジム', '琴似駅', '#ffa500'),
(290, '', '', ''),
(291, 'よしおマンション', '札幌市中央区北5条東3丁目', '#ff0000'),
(292, '', '積丹町', ''),
(293, '', '小樽市', ''),
(294, '', '洞爺湖町', ''),
(295, '', '余市町', ''),
(296, 'よしおマンション', '札幌市中央区北5条東3丁目', '#ff0000'),
(297, 'クレープよしお', '小樽築港', '#008000'),
(298, '', '', ''),
(299, '', '', ''),
(300, '', '', ''),
(301, 'よしおマンション', '札幌市中央区北5条東3丁目', '#ff0000'),
(302, 'クレープよしお', '小樽築港', '#008000'),
(303, 'よしお寿司', 'EZOHUB', ''),
(304, '', '', ''),
(305, '', '', ''),
(306, 'よしおマンション', '札幌市中央区北5条東3丁目', '#ff0000'),
(307, 'クレープよしお', '小樽築港', '#008000'),
(308, '食事どころよしお', '札幌市中央区北8条東5丁目', '#008000'),
(309, '', '', ''),
(310, '', '', ''),
(311, 'よしおマンション', '札幌市中央区北5条東3丁目', '#ff0000'),
(312, 'クレープよしお', '小樽築港', '#008000'),
(313, '食事どころよしお', '札幌市中央区北8条東5丁目', '#008000'),
(314, 'よしおの館', '桑園駅', '#0000ff'),
(315, 'よしお湯', '北１２条駅', '#ffff00');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;