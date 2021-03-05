-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-03-04 21:50:06
-- 伺服器版本： 10.4.17-MariaDB
-- PHP 版本： 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `suckcathouse`
--
CREATE DATABASE IF NOT EXISTS `suckcathouse` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `suckcathouse`;

-- --------------------------------------------------------

--
-- 資料表結構 `cats`
--

CREATE TABLE `cats` (
  `catID` int(50) NOT NULL,
  `catName` varchar(100) DEFAULT NULL,
  `breed` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `furColor` varchar(50) DEFAULT NULL,
  `pawColor` varchar(50) DEFAULT NULL,
  `catDesc` varchar(2000) DEFAULT NULL,
  `coverImgPath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `cats`
--

INSERT INTO `cats` (`catID`, `catName`, `breed`, `sex`, `furColor`, `pawColor`, `catDesc`, `coverImgPath`) VALUES
(1, 'Aurora', '布偶貓', '母', '冷豔灰<br>淡奶油黃<br>吹雪白', '薔薇粉', 'Aurora was born on October 25th 2013. She live\'s in Stockholm, the capital of Sweden, together with her human mother and father and kitty brother Prince Phillip', './img/theCats/Aurora/Aurora_001.jpg'),
(2, 'Grumpy', '米克斯', '母', '不爽棕<br>不爽白', '不爽黑', '我很不爽', './img/theCats/Grumpy/Grumpy_008.jpg'),
(3, 'Nala', '虎斑暹羅貓', '母', '呆萌灰', '可愛黑', 'The story of one kitten, Nala, starts off at a home where the owners could no longer take care of the cats and kittens because there were too many. Nala was then taken away to the shelter where she was separated from her original family. Sadly we don’t know what happened to the rest of the cats or kittens, but when adopted, Nala was the only one left.', './img/theCats/Nala/Nala_004.jpg'),
(4, 'Hosico', '蘇格蘭貓', '公', '棉花糖橘', '幸福粉', 'Hosico is a gold scottish cat, boy. He was born on August 4, 2014 in Russia. ‘Hosico’ translated from Japanese means ‘star child’. His ascent to success in Instagram he began from his childhood, when he was a little kitten. Now he is admired by people from all over the world.', './img/theCats/Hosico/Hosico_002.jpg'),
(5, 'Messi', '美洲貓', '公', '黏人橘', '大大黑', 'Месси настоящий друг! И поможет, и поддержит, и поговорит😁❤️ . Messi is a true friend! And help, and support, and talk😁❤️', './img/theCats/Messi/Messi_004.jpg'),
(6, 'Venus', '米克斯', '母', '對稱黑<br>對稱橘', '點點黑<br>點點粉', 'Venus the Two Face Cat. 0% Photoshopped, 100% Born This Way!', './img/theCats/Venus/Venus_011.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pw` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`memberID`, `email`, `pw`, `name`, `tel`, `address`) VALUES
(2, 'blackdarkwitch@gmail.com', 'darkdarkdark', '黑暗女巫', '0487654321', '沉默小鎮領主的房子'),
(7, 'test2@gmail.com', 'test2', '測試先生2', 'gk4g42u04cj84-4', ''),
(8, 'tester3@gmail.com', 'tester3', 'tester3', '0012345678', 'tester center'),
(9, 'cat@gmail.com', 'cat', 'cat', '12345678', '沉默小鎮貓窩'),
(10, 'dog@gmail.com', '$2y$10$AlnYOdNfUzN5HssFQ96myeWP5gyD4SRKHsW6jbyHc7Gfi85ObfIpq', 'dog', 'dog', 'dog'),
(11, 'bigcentersky@gmail.com', '$2y$10$mVf9wgq2Gyfn4cGsq2BNLedMoNq2e71yq06fLEeF1imdWh.gpuOOa', '大中天', '0012345678', '沉默小鎮比較大的門');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `recipient` varchar(100) DEFAULT NULL,
  `reTel` varchar(100) DEFAULT NULL,
  `reAddress` varchar(100) DEFAULT NULL,
  `orderInfo` varchar(5000) NOT NULL,
  `payable` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `caceClosed` varchar(10) DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`orderID`, `memberID`, `recipient`, `reTel`, `reAddress`, `orderInfo`, `payable`, `name`, `caceClosed`) VALUES
(1, 2, '黑暗女巫', '0487654321', '沉默小鎮領主的房子', '', '', '', 'FALSE'),
(2, 2, '暗女巫', '0444556677', '沉默小鎮更暗的屋子', '測試', '測試', '', 'FALSE'),
(3, 2, '暗女巫', '0444556677', '沉默小鎮更暗的屋子', '測試', '測試', '黑暗女巫', 'FALSE'),
(4, 11, '大中天', '0012345678', '沉默小鎮比較大的門', '{\"3\":\"{\"productID\":\"3\",\"price\":\"1500\",\"quantity\":\"3\",\"subtotal\":4500}\",\"1\":\"{\"productID\":\"1\",\"price\":\"1000\",\"quantity\":\"4\",\"subtotal\":4000}\",\"6\":\"{\"productID\":\"6\",\"price\":\"2500\",\"quantity\":\"1\",\"subtotal\":2500}\",\"4\":\"{\"productID\":\"4\",\"price\":\"1000\",\"quantity\":\"8\",\"subtotal\":8000}\"}', '19000', '大中天', 'FALSE');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `pNum` varchar(100) DEFAULT NULL,
  `pName` varchar(100) DEFAULT NULL,
  `pDesc` varchar(100) DEFAULT NULL,
  `actor` varchar(100) DEFAULT NULL,
  `sup` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `imgPath` varchar(255) DEFAULT NULL,
  `imgSamplePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`productID`, `pNum`, `pName`, `pDesc`, `actor`, `sup`, `price`, `imgPath`, `imgSamplePath`) VALUES
(1, 'NYAN-004', '特選乱れ猫撫で狂い弐拾連発', 'SONイチオシの猫シリ－ズ初の一般向けリリースされたこの１本を見ないで何を見る？\r\nそれぞれ毛色の違う猫たちのしなやかにくねる体は必見！', '素猫多数', 'SoftNyanko', '1000', './img/SoftNyanko/cover/NYAN-004.jpg', './img/SoftNyanko/cover_sample/s_NYAN-004.jpg'),
(2, 'NYAN-005', ' 	\r\nろり＆ぷちNONSTOPやり放題２４時間', 'ろり～た＆ぷちにゃんたちの比類なき乱れっぷりをご堪能あれ！\r\n齧られて爪を立てられ、抱き締めて…！\r\n幼い魅力満載の子の１本！！', '仔にゃんこたち', 'SoftNyanko', '1500', './img/SoftNyanko/cover/NYAN-005.jpg', './img/SoftNyanko/cover_sample/s_NYAN-005.jpg'),
(3, 'NYAN-006', 'ザ・肉球', '肉球フェチ垂涎のこの１本！\r\n家猫の柔らかい肉球、外猫の硬い肉球…！！\r\n色とりどりの肉球の森へようこそ！', '匿名肉球', 'SoftNyanko', '1500', './img/SoftNyanko/cover/NYAN-006.jpg', './img/SoftNyanko/cover_sample/s_NYAN-006.jpg'),
(4, 'NYAN-007', '媚態箱入猫', '気付くとそこに収まる猫。\r\n狭苦しく、息苦しいそれをあえて楽しむ！\r\nもう、箱無しでは生きていけない…！快楽を忘れられない猫たちのあられもない姿をあなたに！！', '箱猫多数', 'SoftNyanko', '1000', './img/SoftNyanko/cover/NYAN-007.jpg', './img/SoftNyanko/cover_sample/s_NYAN-007.jpg'),
(5, 'NYAN-008', 'ねこすぷれっ仔大集合♥', '猫は猫らしく！\r\nだけど、あなたにだけこっそり見せてあげる…！\r\nキュートな姿があなたを捕らえて離さない！！\r\nでも！\r\n嫌がる仔に無理矢理するのは虐待です。\r\nOK仔にだけしましょうね。', 'ねこすぷれっ仔多数', 'SoftNyanko', '1000', './img/SoftNyanko/cover/NYAN-008.jpg', './img/SoftNyanko/cover_sample/s_NYAN-008.jpg'),
(6, 'NYAN-009', '魅惑の夫人　やよい', '魅惑のまなざし、そそるその体…！\r\nやよい様の全てを詰め込んだこの１本！！\r\n高貴な香りを漂わせて、いま、あなたの前に。', 'やよい夫人', 'SoftNyanko', '2500', './img/SoftNyanko/cover/NYAN-009.jpg', './img/SoftNyanko/cover_sample/s_NYAN-009.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `reservation`
--

CREATE TABLE `reservation` (
  `revID` int(11) NOT NULL,
  `catID` int(50) NOT NULL,
  `service` varchar(50) DEFAULT NULL,
  `ps` varchar(1000) DEFAULT NULL,
  `memberID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `reservation`
--

INSERT INTO `reservation` (`revID`, `catID`, `service`, `ps`, `memberID`, `name`) VALUES
(1, 2, NULL, NULL, 7, '黑暗女巫'),
(6, 1, '吸貓', '請告訴我們您有多愛吸貓', 2, '大中天'),
(7, 1, '吸貓', '第三次測試', 2, '2'),
(8, 1, '吸貓', '第四次', 2, '黑暗女巫'),
(10, 5, '肉球踏踏', '第五次', 7, '測試先生2'),
(11, 4, '肉球踏踏', '第六次測試', 7, '測試先生2');

-- --------------------------------------------------------

--
-- 資料表結構 `tteesstt`
--

CREATE TABLE `tteesstt` (
  `tteessttID` int(11) NOT NULL,
  `memberID` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`catID`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `memberID` (`memberID`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- 資料表索引 `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`revID`),
  ADD KEY `catID` (`catID`),
  ADD KEY `memberID` (`memberID`);

--
-- 資料表索引 `tteesstt`
--
ALTER TABLE `tteesstt`
  ADD PRIMARY KEY (`tteessttID`),
  ADD KEY `memberID` (`memberID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cats`
--
ALTER TABLE `cats`
  MODIFY `catID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reservation`
--
ALTER TABLE `reservation`
  MODIFY `revID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `tteesstt`
--
ALTER TABLE `tteesstt`
  MODIFY `tteessttID` int(11) NOT NULL AUTO_INCREMENT;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `members` (`memberID`);

--
-- 資料表的限制式 `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `cats` (`catID`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `members` (`memberID`);

--
-- 資料表的限制式 `tteesstt`
--
ALTER TABLE `tteesstt`
  ADD CONSTRAINT `tteesstt_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `members` (`memberID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
