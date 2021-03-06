-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 08, 2022 lúc 04:10 PM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web3014`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_category` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `code_category`) VALUES
(1, 'MacBook', 'Laptop'),
(2, 'ASUS', 'Laptop'),
(3, 'Lenovo', 'Laptop'),
(4, 'MSI', 'Laptop'),
(5, 'DELL', 'Laptop'),
(6, 'HP', 'Laptop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_info` json NOT NULL,
  `order` json NOT NULL,
  `account` json NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Đang Xử Lý',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id_order`, `user_id`, `order_info`, `order`, `account`, `status`, `create_at`) VALUES
(1, 1, '{\"name\": \"Pham Tan Thang\", \"ward\": \"Xã Cán Tỷ\", \"email\": \"\", \"phone\": \"0935365022\", \"address\": \"so 22, duong so 1, bao an, dien quang\", \"delivery\": \"Giao hàng tiêu chuẩn\", \"district\": \"Huyện Quản Bạ\", \"province\": \"Tỉnh Hà Giang\"}', '{\"1\": {\"id\": \"1\", \"name\": \"Apple Macbook Pro 14” (MKGR3SA/A) (Apple M1 Pro/16GB RAM/512GB SSD/14.2 inch/Mac OS/Bạc) (2021)\", \"image\": \"2dbc9e52f4ccd9bb5a085e04c69c2a51793a45e1.jpg\", \"price\": \"52599000.00\", \"quantity\": 1}}', '[{\"id\": 1, \"name\": \"Thang\", \"role\": 1, \"image\": \"male.png\", \"gender\": \"Nam\", \"password\": \"202cb962ac59075b964b07152d234b70\", \"username\": \"thang123\"}]', 'Đang Xử Lý', '2022-07-08 15:43:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL COMMENT 'ID Product',
  `category` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_product`, `category`, `name`, `price`, `image`, `detail`) VALUES
(1, 1, 'Apple Macbook Pro 14” (MKGR3SA/A) (Apple M1 Pro/16GB RAM/512GB SSD/14.2 inch/Mac OS/Bạc) (2021)', '52599000.00', '2dbc9e52f4ccd9bb5a085e04c69c2a51793a45e1.jpg', '<ul><li>CPU: Apple M1 Pro</li><li>RAM: 16GB</li><li>Ổ cứng: 512GB SSD</li><li>VGA: M1</li><li>Màn hình: 14.2 inch Retina</li><li>Bàn phím: có đèn led</li><li>HĐH: Mac OS</li><li>Màu: Bạc</li></ul>'),
(2, 1, 'Apple Macbook Pro 13 Touchbar (MYD82SA/A) (Apple M1/8GB RAM/256GB SSD/13.3 inch IPS/Mac OS/Xám) (NEW)', '32989000.00', 'b591ffac5cccf4053fe2222ee4f9ae08cf5096c9.png', '&#60;ul&#62;&#60;li&#62;CPU: Apple M1&#60;/li&#62;&#60;li&#62;RAM: 8GB&#60;/li&#62;&#60;li&#62;Ổ cứng: 256GB SSD&#60;/li&#62;&#60;li&#62;VGA: Onboard&#60;/li&#62;&#60;li&#62;Màn hình: 13.3 inch Retina IPS&#60;/li&#62;&#60;li&#62;HĐH: Mac OS&#60;/li&#62;&#60;li&#62;Màu: Xám&#60;/li&#62;&#60;/ul&#62;'),
(3, 1, 'Apple Macbook Pro 13 Touchbar (Z11D000E5) (Apple M1/16GB RAM/256GB SSD/13.3 inch IPS/Mac OS/Bạc)', '37499000.00', '6d197587fd68f510e84d91006a89999b26931225.png', '&#60;ul&#62;&#60;li&#62;CPU: Apple M1&#60;/li&#62;&#60;li&#62;RAM: 16GB&#60;/li&#62;&#60;li&#62;Ổ cứng: 256GB SSD&#60;/li&#62;&#60;li&#62;VGA: Onboard&#60;/li&#62;&#60;li&#62;Màn hình: 13.3 inch Retina IPS&#60;/li&#62;&#60;li&#62;HĐH: Mac OS&#60;/li&#62;&#60;li&#62;Màu: Bạc&#60;/li&#62;&#60;/ul&#62;'),
(4, 1, 'Apple Macbook Air 13 (MGN93SA/A) (Apple M1/8GB RAM/256GB SSD/13.3 inch IPS/Mac OS/Bạc) (NEW)', '24999000.00', '2408fcdafbfaa53ba2e14e929be42236588eb768.png', '&#60;ul&#62;&#60;li&#62;CPU: Apple M1&#60;/li&#62;&#60;li&#62;RAM: 8GB&#60;/li&#62;&#60;li&#62;Ổ cứng: 256GB SSD&#60;/li&#62;&#60;li&#62;VGA: Onboard&#60;/li&#62;&#60;li&#62;Màn hình: 13.3 inch Retina IPS&#60;/li&#62;&#60;li&#62;HĐH: Mac OS&#60;/li&#62;&#60;li&#62;Màu: Bạc&#60;/li&#62;&#60;/ul&#62;'),
(5, 1, 'Apple Macbook Air 13 (Z12B000B) (Apple M1/16GB RAM/512GB SSD/13.3 inch IPS/Mac OS/Vàng)', '37359000.00', '49abcb977e5a4da0ea1673d17a1bca4619cc765b.png', '&#60;ul&#62;&#60;li&#62;CPU: Apple M1&#60;/li&#62;&#60;li&#62;RAM: 16GB&#60;/li&#62;&#60;li&#62;Ổ cứng: 512GB SSD&#60;/li&#62;&#60;li&#62;VGA: Onboard&#60;/li&#62;&#60;li&#62;Màn hình: 13.3 inch Retina IPS&#60;/li&#62;&#60;li&#62;HĐH: Mac OS&#60;/li&#62;&#60;li&#62;Màu: Vàng&#60;/li&#62;&#60;/ul&#62;'),
(6, 1, 'Apple Macbook Pro 13 Touchbar (MWP82) (i5 2.0Ghz/16GB RAM/1TB SSD/13.3inch IPS/Mac OS/Bạc) (2020)', '54529000.00', '4c2cabe2ce409916274fba1013d1c942bdd13227.jpg', '&#60;ul&#62;&#60;li&#62;CPU: Intel Core i5 2.0Ghz&#60;/li&#62;&#60;li&#62;RAM: 16GB&#60;/li&#62;&#60;li&#62;Ổ cứng: 1TB SSD&#60;/li&#62;&#60;li&#62;VGA: Onboard&#60;/li&#62;&#60;li&#62;Màn hình: 13.3 inch FHD&#60;/li&#62;&#60;li&#62;Bàn phím: có đèn led&#60;/li&#62;&#60;li&#62;HĐH: Mac OS&#60;/li&#62;&#60;li&#62;Màu: Bạc&#60;/li&#62;&#60;/ul&#62;'),
(11, 2, 'Laptop Asus Vivobook Pro 14X OLED M7400QC-KM013W (R5 5600H/16GB RAM/512GB SSD/14 Oled 2.8K/RTX3050 4GB/Win11/Đen)', '27999000.00', 'dc9da0539617004cd611c9ea3cb68cd133141972.jpg', '&#60;ul&#62;&#60;li&#62;CPU: AMD R5 5600H&#60;/li&#62;&#60;li&#62;RAM: 16GB&#60;/li&#62;&#60;li&#62;Ổ cứng: 512GB SSD&#60;/li&#62;&#60;li&#62;VGA: RTX3050 4GB&#60;/li&#62;&#60;li&#62;Màn hình: 14 Oled 2.8K&#60;/li&#62;&#60;li&#62;HĐH: Win 11&#60;/li&#62;&#60;li&#62;Màu: Đen&#60;/li&#62;&#60;/ul&#62;'),
(12, 2, 'Laptop Asus Gaming ROG Strix G15 G513QC-HN015T (Ryzen 7 5800H/8GB RAM/512GB SSD/15.6 FHD 144hz/RTX 3050 4GB/Win10/Xám)', '27999000.00', '96ebaf62f050fe704cc8f384f457b7c998da172e.png', '&#60;ul&#62;&#60;li&#62;CPU: AMD Ryzen 7 5800H&#60;/li&#62;&#60;li&#62;RAM: 8GB(trống 1 khe tram)&#60;/li&#62;&#60;li&#62;Ổ cứng: 512GB SSD (trống 1 khe M.2 NVMe™)&#60;/li&#62;&#60;li&#62;VGA: RTX 3050 4GB&#60;/li&#62;&#60;li&#62;Màn hình: 15.6 inch FHD 144hz&#60;/li&#62;&#60;li&#62;Bàn phím: có đèn led&#60;/li&#62;&#60;li&#62;HĐH: Win 10&#60;/li&#62;&#60;li&#62;Màu: xám&#60;/li&#62;&#60;/ul&#62;'),
(15, 3, 'Laptop Lenovo Legion 5 15ITH6H (82JH002WVN) (i7 11800H/16GB RAM/512GB SSD/15.6 FHD 165hz/RTX 3060 6G/Win11/Trắng)', '38999000.00', '6e50e28117bb6a322fe116de42c48215f0b6abe3.jpg', '&#60;ul&#62;&#60;li&#62;CPU: Intel Core i7 11800H&#60;/li&#62;&#60;li&#62;RAM: 16GB&#60;/li&#62;&#60;li&#62;Ổ cứng: 512GB SSD&#60;/li&#62;&#60;li&#62;VGA: Nvidia RTX 3050 4G&#60;/li&#62;&#60;li&#62;Màn hình: 15.6 FHD 165hz&#60;/li&#62;&#60;li&#62;HĐH: Win 11&#60;/li&#62;&#60;li&#62;Màu: Trắng&#60;/li&#62;&#60;/ul&#62;'),
(16, 3, 'Laptop Lenovo IdeaPad Slim 5 Pro 16ACH6 (82L50097VN) (R5 5600H/8GB RAM/512GB SSD/16 WQXGA 120Hz/GTX 1650 4GB/Win11/Xám)', '23999000.00', 'cd8688b40c58d2291786c9118eb75354988abddd.jpg', '&#60;ul&#62;&#60;li&#62;CPU: AMD R5 5600H&#60;/li&#62;&#60;li&#62;RAM: 8GB&#60;/li&#62;&#60;li&#62;Ổ cứng: 512GB SSD&#60;/li&#62;&#60;li&#62;VGA: NVIDIA GTX 1650 4GB&#60;/li&#62;&#60;li&#62;Màn hình: 16&#34; WQXGA 120Hz&#60;/li&#62;&#60;li&#62;HĐH: Win 11&#60;/li&#62;&#60;li&#62;Màu: Xám&#60;/li&#62;&#60;/ul&#62;'),
(17, 3, 'Laptop Lenovo Legion 7 16ACHG6 (82N600NSVN) (R9 5900HX/32GB RAM/1TB SSD/16 WQXGA 165hz/RTX3080 16GB/Win11/Xám)', '73999000.00', 'b96eb8fd4353530c6b29968bbe0f771e4eb8f702.jpg', '&#60;ul&#62;&#60;li&#62;CPU: AMD R9 5900HX&#60;/li&#62;&#60;li&#62;RAM: 32GB&#60;/li&#62;&#60;li&#62;Ổ cứng: 1TB SSD&#60;/li&#62;&#60;li&#62;VGA: Nvidia RTX3080 16GB&#60;/li&#62;&#60;li&#62;Màn hình: 16 WQXGA 165hz&#60;/li&#62;&#60;li&#62;HĐH: Win 11&#60;/li&#62;&#60;li&#62;Màu: Xám&#60;/li&#62;&#60;/ul&#62;'),
(18, 4, 'Laptop MSI Creator M16 (A12UC-291VN) (i7 12700H 16GB RAM/512GB SSD/RTX3050 4G/16.0 inch QHD/Win 10/Đen) (2021)', '35999000.00', '002784ea28c92ee7d2ec7cce9b674783d5776808.jpg', '&#60;ul&#62;&#60;li&#62;CPU: Intel Core i7 12700H&#60;/li&#62;&#60;li&#62;RAM: 16GB&#60;/li&#62;&#60;li&#62;Ổ cứng: 512GB SSD&#60;/li&#62;&#60;li&#62;VGA: NVIDIA RTX3050 4G&#60;/li&#62;&#60;li&#62;Màn hình: 16.0 inch QHD&#60;/li&#62;&#60;li&#62;Bàn phím: có đèn nền&#60;/li&#62;&#60;li&#62;HĐH: Win 10&#60;/li&#62;&#60;li&#62;Màu: Đen&#60;/li&#62;&#60;/ul&#62;');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `relative_image_product`
--

CREATE TABLE `relative_image_product` (
  `id_relative` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `relative_image_product`
--

INSERT INTO `relative_image_product` (`id_relative`, `product_id`, `image`) VALUES
(6, 2, '39833f91ffcc4767e89260d379341e4d11c86067.png'),
(7, 2, '3dbc6ff8725c3f966504ccca52e9172aa5109e88.png'),
(8, 2, '4ed73ffae7d4ff18dad798189c525bca26a03c0f.png'),
(9, 2, 'ff411e4c13c0c6f89ecd3b21aa396f2d93289f78.png'),
(10, 2, 'b591ffac5cccf4053fe2222ee4f9ae08cf5096c9.png'),
(11, 3, '8cfc511ad3f9c04296980e71a74a8cfd2aacb8db.png'),
(12, 3, '272f07c9566b68049f7295f79e435338f520c12e.png'),
(13, 3, '214ebc419ef689df8b04b6844f81b3d26b7b1bca.png'),
(14, 3, '23231cf7a6d30f673e46bb36fc596e071cfe7965.png'),
(15, 3, '9bb887bd15401a7389d6356625398fe8ebb839c4.png'),
(16, 3, '6d197587fd68f510e84d91006a89999b26931225.png'),
(17, 4, 'fd828a202917e51c22feaa13159f5a1f25d5b921.png'),
(18, 4, '106b6a5687d3ffe5943518b65189a9631ebb6e33.png'),
(19, 4, '74c6c5c4f1aa2a053cb2a76908d5e02895a7928e.png'),
(20, 4, '2408fcdafbfaa53ba2e14e929be42236588eb768.png'),
(21, 5, '2b07ad8d7372fbbeb2837782e731e3d4256e7c53.png'),
(22, 5, '07206159931e6561c4124076db934ef0c3d129de.png'),
(23, 5, '42963ec982b4513991bd3e84b7b36a4d5a4a747e.png'),
(24, 5, '49abcb977e5a4da0ea1673d17a1bca4619cc765b.png'),
(25, 6, '369b4360c52569ddb38985f4b04133e063ba7dbc.jpg'),
(26, 6, '913cba3611fb885768516fc74b03226a6f195207.jpg'),
(27, 6, '8995906afb972413b4c886d3d6e2e4051d40a377.jpg'),
(28, 6, 'c4fcdae97e50f0d3ce5761a88b86aa2aa6084019.jpg'),
(29, 6, 'b6de844a27834fa07846802094941dea230341fd.jpg'),
(30, 6, '4c2cabe2ce409916274fba1013d1c942bdd13227.jpg'),
(33, 11, 'b8e98cd80d11af031266ede578b7dfa0abf114ca.jpg'),
(34, 11, 'e6763074c36d749be87baa59d36443115a15d902.jpg'),
(35, 11, '5f40da04afcb72692e279e926fbf9eed9353974a.jpg'),
(36, 11, '895cb91d3ab3f848f16269a65fe66e771a5500dd.jpg'),
(37, 11, 'dc9da0539617004cd611c9ea3cb68cd133141972.jpg'),
(41, 12, '9af229a1582d10156019bae9009ddb95b5cff28a.png'),
(42, 12, '733241792ca14377c5e190607e059bc45f06aeb9.png'),
(43, 12, '15f1ab62a2f82abcc3280a2cdffcf1c29fa2758c.png'),
(44, 12, '77266a7807abc55178162e876625bc793a1f6dce.png'),
(45, 12, '96ebaf62f050fe704cc8f384f457b7c998da172e.png'),
(51, 15, '8e68202eb56e02e434077491f8cb688876d1a80c.jpg'),
(52, 15, 'e40a6648a10315feb32104cfb812d072039b91f9.jpg'),
(53, 15, '69fc15e394c36320d98d08fc22ee6717fb652334.jpg'),
(54, 15, 'd711117164358475a990590fbf9a95a2f1b0061e.jpg'),
(55, 15, '8ace8d7108d7c1862f6b63b20c2d4355c2ffaaf8.jpg'),
(56, 16, 'c6900464600d24af8fe2523e5cef043e18ded722.jpg'),
(57, 16, 'a1f15d751b4e9476d27cb35ace1264a814ff1e3d.jpg'),
(58, 16, 'e0c5b42800c2c2061b043bf3c0a077741a5ccae6.jpg'),
(59, 16, '39d7516007c556c99aea543f9c9918acdbf2952a.jpg'),
(60, 16, 'cd8688b40c58d2291786c9118eb75354988abddd.jpg'),
(61, 17, '85ca94b8d11e90424f0efb3661cdc9818ca619a2.jpg'),
(62, 17, '074a993f8687f1b4bd5050c6b6ed4d7616a12aaa.jpg'),
(63, 17, '99c3f026ac15400b4198d1641171382514538326.jpg'),
(64, 17, 'b9980610c4063600802e117f168af7461e8709ef.jpg'),
(65, 17, '849889f58049617dbc7b896ebdc11673a7e41f89.jpg'),
(66, 17, 'fe75cafa6be11563537ae263ef540aee35c7430b.jpg'),
(67, 18, 'c822768ed00d7ff86c7eae655b3115554eb4e1d9.jpg'),
(68, 18, '64ce1a6f6ecde6fe0b13742f28188994e6d2c028.jpg'),
(69, 18, '1198c4e0020466b922cfd05cf922e4db0ca96731.jpg'),
(70, 18, '1f8f83f995b1ec07b6792d9e62755c9913e98a9c.jpg'),
(71, 18, 'f8622349079bd1d17be1d1f1535e9a020f01d3c2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Default: 0\r\nAdmin: 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `name`, `username`, `password`, `gender`, `image`, `role`) VALUES
(1, 'Thang', 'thang123', '202cb962ac59075b964b07152d234b70', 'Nam', 'male.png', 1),
(2, 'Pham Tan Thang', 'thang12333', '2cfd4560539f887a5e420412b370b361', 'Nam', 'male.png', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `FK_ID_KH` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `FK_Category` (`category`);

--
-- Chỉ mục cho bảng `relative_image_product`
--
ALTER TABLE `relative_image_product`
  ADD PRIMARY KEY (`id_relative`),
  ADD KEY `FK_Product_Image` (`product_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Product', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `relative_image_product`
--
ALTER TABLE `relative_image_product`
  MODIFY `id_relative` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_ID_KH` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_Category` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`);

--
-- Các ràng buộc cho bảng `relative_image_product`
--
ALTER TABLE `relative_image_product`
  ADD CONSTRAINT `FK_Product_Image` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
