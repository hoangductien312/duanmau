-- Cơ sở dữ liệu: `web2041`
--

CREATE DATABASE IF NOT EXISTS `web2041` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `web2041`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`id`, `name`) VALUES
(1, 'Điện thoại'),
(2, 'Laptop'),
(3, 'Máy tính bảng'),
(4, 'Phụ kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_category` (`id_category`),
  CONSTRAINT `fk_products_category` FOREIGN KEY (`id_category`) REFERENCES `categorys` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `image`, `description`, `id_category`) VALUES
(1, 'iPhone 15 Pro Max', 34990000.00, 50, 'products/iphone15.jpg', 'Điện thoại iPhone mới nhất của Apple', 1),
(2, 'MacBook Pro M3', 39990000.00, 30, 'products/macbook.jpg', 'Laptop hiệu năng cao từ Apple', 2);
