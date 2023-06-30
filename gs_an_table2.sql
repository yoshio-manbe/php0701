-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 6 月 30 日 09:34
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
-- テーブルの構造 `gs_an_table2`
--

CREATE TABLE `gs_an_table2` (
  `id` int(12) NOT NULL,
  `state` varchar(128) NOT NULL,
  `month` varchar(128) NOT NULL,
  `name` varchar(64) NOT NULL,
  `address` varchar(64) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `gs_an_table2`
--

INSERT INTO `gs_an_table2` (`id`, `state`, `month`, `name`, `address`, `date`) VALUES
(26, '北海道', '7', 'あびら夏！うまかまつり', '安平町', '1−２'),
(27, '北海道', '7', '美国神社例大祭', '積丹町', '4−６'),
(28, '北海道', '7', 'おたる潮まつり', '小樽市', '28−３０'),
(29, '北海道', '7', 'サマーフェスタ2023 in 洞爺湖', '洞爺湖町', '２２'),
(30, '北海道', '7', '北海ソーランまつり', '余市町', '１');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_an_table2`
--
ALTER TABLE `gs_an_table2`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_an_table2`
--
ALTER TABLE `gs_an_table2`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
