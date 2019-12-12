-- MySQL dump 10.17  Distrib 10.3.21-MariaDB, for Linux (x86_64)
    --

    -- Host: localhost    Database: cosmetic_test
    -- ------------------------------------------------------
    -- Server version	10.3.21-MariaDB
    /*!40101
SET
    @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
    /*!40101
SET
    @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
    /*!40101
SET
    @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
    /*!40101
SET NAMES
    utf8mb4 */;
    /*!40103
SET
    @OLD_TIME_ZONE = @@TIME_ZONE */;
    /*!40103
SET
    TIME_ZONE = '+00:00' */;
    /*!40014
SET
    @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS,
    FOREIGN_KEY_CHECKS = 0 */;
    /*!40101
SET
    @OLD_SQL_MODE = @@SQL_MODE,
    SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
    /*!40111
SET
    @OLD_SQL_NOTES = @@SQL_NOTES,
    SQL_NOTES = 0 */;
    --

    -- Dumping data for table `accounts`
    --

LOCK TABLES
    `accounts` WRITE;
    /*!40000
ALTER TABLE
    `accounts` DISABLE KEYS */;
INSERT INTO `accounts`
VALUES(
    1,
    1,
    'Lượng Nguyễn',
    '336447114',
    'N09B2-Thành Thái - Dịch Vọng - Cầu Giấy - HN',
    '2019-12-09 17:05:30',
    '2019-12-09 17:05:30'
),(
    2,
    2,
    'Lượng Nguyễn',
    '0336447114',
    'Thái Bình',
    '2019-12-11 04:40:24',
    '2019-12-11 04:40:24'
),(
    5,
    NULL,
    'Nguyễn Đại Lượng',
    '0336447114',
    'N09B2-Thành Thái - Dịch Vọng - Cầu Giấy - HN',
    '2019-11-30 04:44:56',
    '2019-11-30 04:44:56'
),(
    6,
    NULL,
    'Tuan',
    '09889310500',
    'Lê Đức Thọ',
    '2019-11-30 23:48:02',
    '2019-11-30 23:48:02'
),(
    7,
    4,
    'Nguyễn Anh Tuấn',
    '09889310500',
    'Lê Đức Thọ',
    '2019-11-30 23:52:54',
    '2019-11-30 23:53:59'
),(
    8,
    NULL,
    'thuan',
    '0123456789',
    'thuan',
    '2019-12-01 00:32:44',
    '2019-12-01 00:32:44'
),(
    9,
    5,
    'Huynh Huynh',
    NULL,
    NULL,
    NULL,
    NULL
),(
    10,
    NULL,
    'Nguyễn Lượng',
    NULL,
    NULL,
    NULL,
    NULL
),(
    11,
    NULL,
    'Nguyễn Lượng',
    NULL,
    NULL,
    NULL,
    '2019-12-05 05:52:10'
),(
    12,
    NULL,
    'Llalalal',
    NULL,
    NULL,
    NULL,
    NULL
),(
    13,
    NULL,
    'Nguyễn Tét',
    NULL,
    NULL,
    NULL,
    NULL
),(
    14,
    NULL,
    'Nguyễn Tét',
    '0336447114',
    'N09B2-Thành Thái - Dịch Vọng - Cầu Giấy - HN',
    '2019-12-05 15:09:29',
    '2019-12-05 15:09:29'
),(
    15,
    NULL,
    'Nguyễn Tét',
    '0336447114',
    'N09B2-Thành Thái - Dịch Vọng - Cầu Giấy - HN',
    '2019-12-05 15:10:21',
    '2019-12-05 15:10:21'
),(
    16,
    NULL,
    'Lượng Nguyễn',
    NULL,
    NULL,
    NULL,
    NULL
),(
    17,
    11,
    'Nguyễn Lượng',
    '0336447114',
    'N09B2-Thành Thái - Dịch Vọng - Cầu Giấy - HN',
    '2019-12-06 17:19:02',
    '2019-12-06 17:19:02'
),(
    18,
    NULL,
    '123123',
    NULL,
    NULL,
    NULL,
    NULL
),(
    19,
    NULL,
    'Phương Khanh',
    '0815815525',
    'Hạ Đình-Thanh Xuân',
    '2019-12-08 15:43:13',
    '2019-12-08 15:43:13'
),(
    20,
    13,
    'Alaia Geller',
    NULL,
    NULL,
    NULL,
    NULL
),(
    21,
    NULL,
    'Nguyễn Văn Tét',
    '0336447114',
    'N09B2-Thành Thái - Dịch Vọng - Cầu Giấy - HN',
    '2019-12-09 13:51:07',
    '2019-12-09 13:51:07'
);
/*!40000
ALTER TABLE
    `accounts` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `attribute`
    --

LOCK TABLES
    `attribute` WRITE;
    /*!40000
ALTER TABLE
    `attribute` DISABLE KEYS */;
INSERT INTO `attribute`
VALUES(
    1,
    'Khối lượng',
    'khoi-luong',
    '2019-11-18 16:38:27',
    '2019-11-18 16:38:27'
),(
    2,
    'Dung tích',
    'dung-tich',
    '2019-11-18 16:38:38',
    '2019-11-18 16:38:38'
);
/*!40000
ALTER TABLE
    `attribute` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `attribute_value`
    --

LOCK TABLES
    `attribute_value` WRITE;
    /*!40000
ALTER TABLE
    `attribute_value` DISABLE KEYS */;
INSERT INTO `attribute_value`
VALUES(
    1,
    2,
    '100ml',
    '100ml',
    NULL,
    '2019-11-18 16:38:49',
    '2019-11-18 16:38:49'
),(
    2,
    2,
    '200ml',
    '200ml',
    NULL,
    '2019-11-18 16:38:54',
    '2019-11-18 16:38:54'
),(
    3,
    1,
    '100g',
    '100g',
    NULL,
    '2019-11-18 16:39:05',
    '2019-11-18 16:39:05'
),(
    4,
    1,
    '200g',
    '200g',
    NULL,
    '2019-11-18 16:39:10',
    '2019-11-18 16:39:10'
);
/*!40000
ALTER TABLE
    `attribute_value` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `categories`
    --

LOCK TABLES
    `categories` WRITE;
    /*!40000
ALTER TABLE
    `categories` DISABLE KEYS */;
INSERT INTO `categories`
VALUES(
    1,
    'Combo - Quà tặng',
    'combo-qua-tang',
    0,
    NULL,
    '2019-11-20 14:32:04',
    '2019-11-20 14:32:04'
),(
    2,
    'Combo ohui',
    'combo-ohui',
    1,
    NULL,
    '2019-11-20 14:32:43',
    '2019-11-20 14:32:43'
),(
    3,
    'Mỹ phẩm Ohui',
    'my-pham-ohui',
    0,
    NULL,
    '2019-11-20 14:33:07',
    '2019-11-20 14:33:07'
),(
    4,
    'Bộ Ohui Mini',
    'bo-ohui-mini',
    3,
    NULL,
    '2019-11-20 14:33:33',
    '2019-11-20 14:33:33'
),(
    5,
    'Ohui Chăm Sóc Da',
    'ohui-cham-soc-da',
    3,
    NULL,
    '2019-11-20 14:33:49',
    '2019-11-20 14:33:49'
),(
    6,
    'Ohui Chống Lão Hóa',
    'ohui-chong-lao-hoa',
    3,
    NULL,
    '2019-11-20 14:34:05',
    '2019-11-20 14:34:05'
),(
    7,
    'Ohui Chống Nắng',
    'ohui-chong-nang',
    3,
    NULL,
    '2019-11-20 14:34:28',
    '2019-11-20 14:34:28'
),(
    8,
    'Ohui Trang Điểm',
    'ohui-trang-diem',
    3,
    NULL,
    '2019-12-08 12:34:45',
    '2019-12-08 12:34:45'
);
/*!40000
ALTER TABLE
    `categories` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `comments`
    --

LOCK TABLES
    `comments` WRITE;
    /*!40000
ALTER TABLE
    `comments` DISABLE KEYS */;
INSERT INTO `comments`
VALUES(
    7,
    47,
    1,
    5,
    'adqưeqưed',
    1,
    '2019-12-10 10:05:20',
    NULL
),(
    8,
    47,
    1,
    5,
    'qưeqưeqưe',
    1,
    '2019-12-10 10:05:25',
    NULL
),(
    9,
    47,
    1,
    5,
    'wqeqưeqưe',
    1,
    '2019-12-10 10:05:32',
    NULL
),(
    10,
    31,
    1,
    2,
    'Mua đii',
    1,
    '2019-12-10 15:23:57',
    NULL
),(
    11,
    31,
    1,
    5,
    'abc',
    1,
    '2019-12-10 15:28:31',
    NULL
),(
    12,
    19,
    1,
    3,
    '213',
    1,
    '2019-12-10 16:27:53',
    NULL
),(
    13,
    41,
    2,
    5,
    'abc',
    1,
    '2019-12-10 16:36:36',
    NULL
);
/*!40000
ALTER TABLE
    `comments` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `discounts`
    --

LOCK TABLES
    `discounts` WRITE;
    /*!40000
ALTER TABLE
    `discounts` DISABLE KEYS */;
INSERT INTO `discounts`
VALUES(
    2,
    'Cosmetic20000k',
    'Giảm giá 20000k cho đơn hàng',
    20000,
    'total',
    '2019-11-27',
    0,
    NULL,
    '2019-11-22 17:27:49'
),(
    4,
    'Cosmetic50000k',
    'Giảm giá 50000k cho đơn hàng',
    20000,
    'total',
    '2019-12-19',
    0,
    '2019-11-28 15:53:49',
    NULL
),(
    6,
    'ohuivietnam',
    'Mã giảm giá 10% tổng giá trị đơn hàng',
    10,
    'percent',
    '2019-12-31',
    0,
    '2019-12-08 15:02:58',
    NULL
);
/*!40000
ALTER TABLE
    `discounts` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `earn_points`
    --

LOCK TABLES
    `earn_points` WRITE;
    /*!40000
ALTER TABLE
    `earn_points` DISABLE KEYS */;
    /*!40000
ALTER TABLE
    `earn_points` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `galleries`
    --

LOCK TABLES
    `galleries` WRITE;
    /*!40000
ALTER TABLE
    `galleries` DISABLE KEYS */;
INSERT INTO `galleries`
VALUES(
    1,
    1,
    '/userfiles/images/Combo-20-g%C3%B3i-Kem-d%C6%B0%E1%BB%A1ng-tr%E1%BA%AFng-20-g%C3%B3i-Tinh-ch%E1%BA%A5t-d%C6%B0%E1%BB%A1ng-tr%E1%BA%AFng-Ohui-Extreme-White.png',
    '2019-11-20 14:41:34',
    NULL
),(
    8,
    38,
    '/userfiles/images/kem-chong-lao-hoa-ohui-prime-advancer-ampoule-capture-cream-1-min.jpg',
    '2019-12-08 15:41:50',
    NULL
),(
    9,
    46,
    '/userfiles/images/Tinh-Ch%E1%BA%A5t-Ch%E1%BB%91ng-L%C3%A3o-H%C3%B3a-Ohui-Prime-Advancer-Ampoule-Serum_.png',
    '2019-12-08 16:16:18',
    NULL
),(
    10,
    47,
    '/userfiles/images/Set-nuoc-hoa-hong-sua-duong-chong-lao-hoa-Ohui.jpg',
    '2019-12-08 16:28:00',
    NULL
);
/*!40000
ALTER TABLE
    `galleries` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `get_reward`
    --

LOCK TABLES
    `get_reward` WRITE;
    /*!40000
ALTER TABLE
    `get_reward` DISABLE KEYS */;
INSERT INTO `get_reward`
VALUES(
    1,
    'Giảm giá 5% cho đơn hàng',
    500,
    5,
    'percent',
    NULL,
    NULL
),(
    2,
    'Giảm giá 50000 VNĐ',
    500,
    50000,
    'total',
    NULL,
    NULL
),(
    4,
    'Giảm giá 10% cho đơn hàng',
    750,
    10,
    'percent',
    NULL,
    NULL
),(
    5,
    'Giảm giá 20% cho đơn hàng',
    1000,
    20,
    'percent',
    NULL,
    NULL
),(
    6,
    'Giảm giá 10000 VNĐ cho đơn hàng',
    800,
    100000,
    'total',
    NULL,
    NULL
),(
    7,
    'Giảm giá 20000k cho đơn hàng',
    300,
    20000,
    'total',
    NULL,
    NULL
);
/*!40000
ALTER TABLE
    `get_reward` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `history_reward`
    --

LOCK TABLES
    `history_reward` WRITE;
    /*!40000
ALTER TABLE
    `history_reward` DISABLE KEYS */;
INSERT INTO `history_reward`
VALUES(
    1,
    1,
    -500,
    'Đổi Giảm giá 5% cho đơn hàng',
    1,
    '2019-11-22 17:21:33',
    NULL
),(
    2,
    1,
    -500,
    'Đổi Giảm giá 50000 VNĐ',
    1,
    '2019-11-22 17:21:38',
    NULL
),(
    3,
    2,
    500,
    'Nhập mã giới thiệu',
    1,
    '2019-11-23 02:42:05',
    NULL
),(
    4,
    1,
    500,
    'Giới thiệu thành viên',
    1,
    '2019-11-23 02:42:05',
    NULL
),(
    5,
    2,
    -500,
    'Đổi Giảm giá 5% cho đơn hàng',
    1,
    '2019-11-23 02:42:12',
    NULL
),(
    6,
    1,
    -500,
    'Đổi Giảm giá 5% cho đơn hàng',
    1,
    '2019-11-23 09:41:25',
    NULL
),(
    7,
    1,
    -500,
    'Đổi Giảm giá 50000 VNĐ',
    1,
    '2019-11-23 09:42:20',
    NULL
),(
    8,
    1,
    96,
    'Hoàn thành đơn hàng mã số 7Ec85iEfTP45MY2',
    1,
    NULL,
    NULL
),(
    9,
    2,
    96,
    'Hoàn thành đơn hàng mã số 7Ec85iEfTP45MY2',
    1,
    '2019-12-08 14:48:53',
    NULL
),(
    10,
    2,
    48,
    'Hoàn thành đơn hàng mã số 5P2pcue4hj6iLNz',
    1,
    '2019-12-08 14:49:47',
    NULL
),(
    11,
    1,
    95,
    'Hoàn thành đơn hàng mã số A4uGNK5B9JZLI7X',
    1,
    '2019-12-09 17:05:51',
    NULL
);
/*!40000
ALTER TABLE
    `history_reward` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `migrations`
    --

LOCK TABLES
    `migrations` WRITE;
    /*!40000
ALTER TABLE
    `migrations` DISABLE KEYS */;
INSERT INTO `migrations`
VALUES(
    1,
    '2014_10_12_000000_create_users_table',
    1
),(
    2,
    '2014_10_12_100000_create_password_resets_table',
    1
),(
    3,
    '2015_10_12_000000_create_accounts_table',
    1
),(
    4,
    '2019_10_24_162937_create_categories_table',
    1
),(
    5,
    '2019_10_24_162940_create_products_table',
    1
),(
    6,
    '2019_10_24_164207_create_comments_table',
    1
),(
    7,
    '2019_10_24_164225_create_discounts_table',
    1
),(
    8,
    '2019_10_24_164301_create_galleries_table',
    1
),(
    9,
    '2019_10_24_164334_create_history_reward_table',
    1
),(
    10,
    '2019_10_24_164356_create_options_table',
    1
),(
    11,
    '2019_10_24_164360_create_vouchers_table',
    1
),(
    13,
    '2019_10_24_164438_create_pages_table',
    1
),(
    14,
    '2019_10_24_164451_create_posts_table',
    1
),(
    15,
    '2019_10_24_164555_create_products_categories_table',
    1
),(
    16,
    '2019_10_24_164803_create_wishlists_table',
    1
),(
    17,
    '2019_10_29_152159_create_earn_points_table',
    1
),(
    18,
    '2019_10_29_152212_create_get_reward_table',
    1
),(
    20,
    '2019_11_10_004900_create_attribute_table',
    1
),(
    21,
    '2019_11_10_004928_create_attribute_value_table',
    1
),(
    22,
    '2019_11_14_171541_add_sale_to_products_table',
    1
),(
    23,
    '2019_11_17_191346_create_product_attribute',
    1
),(
    25,
    '2019_10_24_164366_create_orders_table',
    2
),(
    27,
    '2019_12_24_164411_create_order_details_table',
    3
),(
    28,
    '2019_12_06_203655_create_status_table',
    4
);
/*!40000
ALTER TABLE
    `migrations` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `options`
    --

LOCK TABLES
    `options` WRITE;
    /*!40000
ALTER TABLE
    `options` DISABLE KEYS */;
INSERT INTO `options`
VALUES(
    1,
    'Điểm thưởng khi nhập mã giới thiệu',
    'point_introduce',
    '500',
    NULL,
    NULL
),(
    2,
    'Email admin',
    'email_admin',
    'luongnd2286@gmail.com',
    NULL,
    NULL
),(
    3,
    'Điểm thưởng khi mua đơn hàng',
    'point_bonus',
    '10000',
    NULL,
    NULL
),(
    12,
    'Logo',
    'logo',
    'http://cosmetic.linhlatin.com/userfiles/images/logo%20d%E1%BB%B1%20%C3%A1n%20web2.png',
    '2019-12-08 13:51:07',
    '2019-12-09 16:46:15'
),(
    15,
    'slide',
    'slide',
    '[{\"title\":\"M\\u1ef9 ph\\u1ea9m ch\\u00ednh h\\u00e3ng gi\\u00e1 t\\u1ed1t\",\"content\":\"<p>Summer Offer<br \\/>\\r\\n2019 Collection<\\/p>\",\"link\":\"#\",\"image\":\"https:\\/\\/bizweb.dktcdn.net\\/100\\/341\\/018\\/themes\\/714660\\/assets\\/banner2a.jpg\"}]',
    '2019-12-08 14:47:40',
    '2019-12-08 16:08:05'
),(
    16,
    'menu',
    'menu',
    '[{\"title\":\"Trang chủ\",\"slug\":\":home:\"},{\"title\":\"Sản phẩm\",\"slug\":\"shop\",\"children\":[{\"title\":\"Mặt\",\"slug\":\"danh-muc/mat\",\"children\":[{\"title\":\"Phấn nền\",\"slug\":\"danh-muc/phan-nen\"},{\"title\":\"Phấn trang điểm\",\"slug\":\"danh-muc/phan-trang-diem\"},{\"title\":\"Son lỳ\",\"slug\":\"danh-muc/son-ly\"}]},{\"title\":\"Môi\",\"slug\":\"danh-muc/moi\",\"children\":[{\"title\":\"Son dưỡng\",\"slug\":\"danh-muc/son-duong\"},{\"title\":\"Son thỏi\",\"slug\":\"danh-muc/son-thoi\"},{\"title\":\"Son lỳ\",\"slug\":\"danh-muc/son-ly\"}]}]},{\"title\":\"Tin tức\",\"slug\":\"tin-tuc/khong-the-chu-quan-truoc-4-loi-skincare-khien-da-ban-cu-heo-hon-xam-xit-suot-ca-ngay-dong-lanh-leo\"}]',
    '2019-12-10 19:31:11',
    '2019-12-11 07:47:40'
),(
    18,
    'intro_service',
    'intro_service',
    '{\"1\":{\"title\":\"qqqqq\",\"des\":\"qqqqqqq\",\"icon\":\"http:\\/\\/cosmetic.linhlatin.com\\/userfiles\\/images\\/icon\\/support-2.png\"},\"2\":{\"title\":\"qqqqqqqq\",\"des\":\"qqqqqqq\",\"icon\":\"http:\\/\\/cosmetic.linhlatin.com\\/userfiles\\/images\\/icon\\/support-2.png\"},\"3\":{\"title\":\"qqqqqq\",\"des\":\"qqqqqqq\",\"icon\":\"http:\\/\\/cosmetic.linhlatin.com\\/userfiles\\/images\\/icon\\/support-2.png\"},\"4\":{\"title\":\"qqqqqq\",\"des\":\"qqqqqq\",\"icon\":\"http:\\/\\/cosmetic.linhlatin.com\\/userfiles\\/images\\/icon\\/support-2.png\"}}',
    '2019-12-11 10:39:32',
    '2019-12-11 10:41:32'
);
/*!40000
ALTER TABLE
    `options` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `order_details`
    --

LOCK TABLES
    `order_details` WRITE;
    /*!40000
ALTER TABLE
    `order_details` DISABLE KEYS */;
INSERT INTO `order_details`
VALUES(22, 22, 30, 0, 1060000.00, 2, NULL, NULL),(23, 22, 37, 0, 770000.00, 1, NULL, NULL),(25, 25, 47, 0, 1950000.00, 1, NULL, NULL),(26, 26, 31, 0, 950000.00, 1, NULL, NULL),(27, 27, 25, 0, 690000.00, 1, NULL, NULL);
/*!40000
ALTER TABLE
    `order_details` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `orders`
    --

LOCK TABLES
    `orders` WRITE;
    /*!40000
ALTER TABLE
    `orders` DISABLE KEYS */;
INSERT INTO `orders`
VALUES(
    22,
    '057oQ1dk7dtGZtZ',
    2,
    NULL,
    2,
    -1,
    NULL,
    NULL,
    1830000,
    1,
    '2019-12-08 15:48:05',
    '2019-12-08 15:48:05'
),(
    25,
    'P4FAASi79IGU8Ih',
    21,
    NULL,
    2,
    -1,
    NULL,
    NULL,
    1950000,
    4,
    '2019-12-09 13:51:07',
    '2019-12-09 17:06:00'
),(
    26,
    'A4uGNK5B9JZLI7X',
    1,
    NULL,
    2,
    -1,
    NULL,
    NULL,
    950000,
    4,
    '2019-12-09 17:05:30',
    '2019-12-09 17:05:50'
),(
    27,
    'Rz4RMv4CP0bhO0X',
    2,
    NULL,
    2,
    -1,
    NULL,
    NULL,
    690000,
    1,
    '2019-12-11 04:40:24',
    '2019-12-11 04:40:24'
);
/*!40000
ALTER TABLE
    `orders` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `pages`
    --

LOCK TABLES
    `pages` WRITE;
    /*!40000
ALTER TABLE
    `pages` DISABLE KEYS */;
    /*!40000
ALTER TABLE
    `pages` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `password_resets`
    --

LOCK TABLES
    `password_resets` WRITE;
    /*!40000
ALTER TABLE
    `password_resets` DISABLE KEYS */;
    /*!40000
ALTER TABLE
    `password_resets` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `posts`
    --

LOCK TABLES
    `posts` WRITE;
    /*!40000
ALTER TABLE
    `posts` DISABLE KEYS */;
INSERT INTO `posts`
VALUES(
    1,
    'Không thể chủ quan trước 4 lỗi skincare khiến da bạn cứ héo hon, xám xịt suốt cả ngày Đông lạnh lẽo',
    'khong-the-chu-quan-truoc-4-loi-skincare-khien-da-ban-cu-heo-hon-xam-xit-suot-ca-ngay-dong-lanh-leo',
    'Trong quá trình skincare, các nàng sẽ khó tránh khỏi những sai lầm khiến da xấu đi, thay vì trở nên đẹp hơn nhờ sự chăm sóc siêng năng, bền bỉ.',
    '<p>Trong qu&aacute; tr&igrave;nh skincare, c&aacute;c n&agrave;ng sẽ kh&oacute; tr&aacute;nh khỏi những sai lầm khiến da xấu đi, thay v&igrave; trở n&ecirc;n đẹp hơn nhờ sự chăm s&oacute;c si&ecirc;ng năng, bền bỉ. Điều quan trọng l&agrave;, c&aacute;c n&agrave;ng cần nhận biết v&agrave; r&uacute;t kinh nghiệm sau những lỗi lầm ấy để c&ocirc;ng sức skincare được đền đ&aacute;p bằng một l&agrave;n da khỏe mạnh, tươi s&aacute;ng, kh&ocirc;ng tỳ vết. Sang đến m&ugrave;a lạnh, chị em nhớ tr&aacute;nh 4 lỗi skincare dưới đ&acirc;y để l&agrave;n da kh&ocirc;ng trở n&ecirc;n kh&ocirc; căng, x&aacute;m xịt ch&aacute;n đời nh&eacute;!</p>\r\n\r\n<p><strong>1. D&ugrave;ng sữa rửa mặt c&oacute; t&iacute;nh tẩy rửa mạnh</strong></p>\r\n\r\n<p>Một trong những nguy&ecirc;n nh&acirc;n h&agrave;ng đầu g&acirc;y kh&ocirc; da, ch&iacute;nh l&agrave; lọ sữa rửa mặt của bạn. H&atilde;y cẩn thận với những sản phẩm chứa nhiều x&agrave; ph&ograve;ng, ch&uacute;ng sẽ rửa tr&ocirc;i lớp dầu tự nhi&ecirc;n v&agrave; khiến da kh&ocirc; hơn. Sữa rửa mặt trị mụn cũng l&agrave; m&oacute;n skincare bạn n&ecirc;n c&acirc;n nhắc trước khi d&ugrave;ng, bởi theo b&aacute;c sĩ Papantoniou tại New York:&nbsp;<em>&quot;Những sản phẩm c&oacute; chức năng trị mụn thường g&acirc;y kh&ocirc; da&quot;</em>. Thay v&agrave;o đ&oacute;, sữa rửa mặt dịu nhẹ, để lại cảm gi&aacute;c ẩm mượt sau khi d&ugrave;ng mới l&agrave; lựa chọn l&yacute; tưởng cho l&agrave;n da trong cả m&ugrave;a Đ&ocirc;ng lẫn m&ugrave;a H&egrave;.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-1-1575298547299960607382.jpg\" target=\"_blank\"><img alt=\"Không thể chủ quan trước 4 lỗi skincare khiến da bạn cứ héo hon, xám xịt suốt cả ngày Đông lạnh lẽo - Ảnh 1.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-1-1575298547299960607382.jpg\" /></a></p>\r\n\r\n<p><strong>2. D&ugrave;ng nước n&oacute;ng để rửa mặt</strong></p>\r\n\r\n<p>V&agrave;o m&ugrave;a lạnh, ch&uacute;ng ta thường c&oacute; xu hướng d&ugrave;ng nước n&oacute;ng để tắm v&agrave; l&agrave;m sạch da mặt nhưng b&aacute;c sĩ Papantoniou khẳng định lu&ocirc;n:&nbsp;<em>&quot;Nhiệt độ nước qu&aacute; cao sẽ l&agrave;m mất đi lớp dầu tự nhi&ecirc;n v&agrave; dẫn đến t&igrave;nh trạng da kh&ocirc; tr&oacute;c&quot;</em>. Điều tốt nhất bạn n&ecirc;n l&agrave;m ch&iacute;nh l&agrave; rửa mặt bằng nước &acirc;m ấm th&ocirc;i, v&agrave; độ ẩm của l&agrave;n da sẽ kh&ocirc;ng bị thất tho&aacute;t nghi&ecirc;m trọng.</p>\r\n\r\n<p><strong>3. B&ocirc;i c&aacute;c sản phẩm skincare sai thứ tự</strong></p>\r\n\r\n<p>Nếu bạn nhầm lẫn thứ tự b&ocirc;i c&aacute;c sản phẩm skincare, layer loại c&oacute; kết cấu đặc trước loại mỏng nhẹ, l&agrave;n da sẽ chẳng được ch&uacute;t lợi lộc n&agrave;o từ qu&aacute; tr&igrave;nh skincare, tr&aacute;i lại c&ograve;n dẫn đến t&igrave;nh trạng kh&ocirc; da hoặc b&iacute;t tắc lỗ ch&acirc;n l&ocirc;ng&hellip; H&atilde;y layer c&aacute;c m&oacute;n skincare theo thứ tự từ mỏng đến d&agrave;y, cụ thể: toner, essence, serum, kem dưỡng ẩm&hellip; V&agrave; theo c&aacute;c b&aacute;c sĩ, bạn n&ecirc;n kết lại bằng một lớp dầu dưỡng để độ ẩm được kh&oacute;a chặt, l&agrave;n da căng mọng được duy tr&igrave; trong khoảng thời gian l&acirc;u hơn:&nbsp;<em>&quot;Dầu nụ tầm xu&acirc;n hoặc dầu dừa c&oacute; thể tạo một lớp m&agrave;ng kh&oacute;a ẩm ki&ecirc;n cố cho l&agrave;n da, ch&uacute;ng th&iacute;ch hợp để d&ugrave;ng v&agrave;o ban đ&ecirc;m, đặc biệt l&agrave; v&agrave;o m&ugrave;a đ&ocirc;ng&quot;,&nbsp;</em>theo b&aacute;c sĩ Papantoniou.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-2-15752985502451857910254.jpg\" target=\"_blank\"><img alt=\"Không thể chủ quan trước 4 lỗi skincare khiến da bạn cứ héo hon, xám xịt suốt cả ngày Đông lạnh lẽo - Ảnh 3.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-2-15752985502451857910254.jpg\" /></a></p>\r\n\r\n<p><strong>4. Bạn d&ugrave;ng sản phẩm tẩy da chết vật l&yacute; (dạng hạt)</strong></p>\r\n\r\n<p>Sản phẩm tẩy da chết vật l&yacute; chứa c&aacute;c hạt nhỏ dễ g&acirc;y xước x&aacute;t, tổn thương, k&iacute;ch ứng v&agrave; kh&ocirc; da, đặc biệt l&agrave; đối với da nhạy cảm v&agrave; kh&ocirc; m&atilde;n t&iacute;nh. B&aacute;c sĩ Papantoniou khuy&ecirc;n bạn n&ecirc;n d&ugrave;ng sản phẩm tẩy da chết h&oacute;a học chứa AHA/BHA, ch&uacute;ng nhẹ nh&agrave;ng v&agrave; kh&ocirc;ng khiến da bị tổn thương nếu bạn d&ugrave;ng với tần suất hợp l&yacute; (khoảng 2 &ndash; 3 lần/tuần).</p>',
    'http://ohuivietnam.tk/userfiles/images/image-35-370x208.jpg',
    1,
    '2019-11-20 16:27:04',
    '2019-12-11 03:53:36'
),(
    2,
    '5 loại kem dưỡng ẩm bạn nên tránh kẻo đẩy làn da vào cảnh xuống cấp trầm trọng',
    '5-loai-kem-duong-am-ban-nen-tranh-keo-day-lan-da-vao-canh-xuong-cap-tram-trong',
    'Để bảo toàn nhan sắc thì chị em nên “né” 5 loại kem dưỡng ẩm sau đây.',
    '<p>Theo lẽ thường t&igrave;nh, chăm chỉ thoa kem dưỡng ẩm sẽ gi&uacute;p l&agrave;n da của bạn lu&ocirc;n khỏe đẹp, ẩm mềm v&agrave; mướt m&aacute;t, chấp hết mọi điều kiện thời tiết khắc nghiệt. Tuy vậy, vẫn c&oacute; một số loại kem dưỡng ẩm kh&ocirc;ng l&agrave;m tr&ograve;n nhiệm vụ, khiến da bạn xấu hơn, thậm ch&iacute; l&agrave; hại sức khỏe; bạn n&ecirc;n nhận diện ngay để bảo to&agrave;n l&agrave;n da của m&igrave;nh nh&eacute;!</p>\r\n\r\n<p><strong>1. Kem dưỡng chứa dầu kho&aacute;ng</strong></p>\r\n\r\n<p>Chất h&oacute;a dầu n&agrave;y thường xuất hiện trong c&aacute;c sản phẩm skincare, đặc biệt l&agrave; kem dưỡng ẩm. Tuy nhi&ecirc;n, dầu kho&aacute;ng lại ch&iacute;nh l&agrave; một trong những nguy&ecirc;n nh&acirc;n h&agrave;ng đầu g&acirc;y b&iacute;t tắc lỗ ch&acirc;n l&ocirc;ng, khiến da nổi mụn v&agrave; gặp nhiều vấn đề kh&aacute;c. Hiện tại, tr&ecirc;n thị trường c&oacute; rất nhiều c&aacute;c loại kem dưỡng ẩm kh&ocirc;ng chứa dầu (oil-free), nếu da dễ nổi mụn th&igrave; đ&oacute; mới ch&iacute;nh l&agrave; sự lựa chọn s&aacute;ng suốt cho l&agrave;n da của bạn.</p>\r\n\r\n<p><img alt=\"\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/5/photo-1-15755538724611241813082.jpg\" style=\"height:775px; width:620px\" /></p>\r\n\r\n<p><strong>2. Kem dưỡng chứa paraben</strong></p>\r\n\r\n<p>Paraben l&agrave; một chất kh&aacute;ng khuẩn, kh&aacute;ng nấm v&agrave; được sử dụng trong mỹ phẩm để bảo quản sản phẩm tốt hơn. Nhưng đ&acirc;y lại l&agrave; chất v&ocirc; c&ugrave;ng nguy hại bởi theo chuy&ecirc;n gia Tamerri Ater tại Los Angeles:&nbsp;<em>&quot;Chất bảo quản g&acirc;y tranh c&atilde;i n&agrave;y c&oacute; li&ecirc;n quan đến bệnh ung thư v&uacute;&quot;</em>.</p>\r\n\r\n<p><em>&quot;C&aacute;ch đơn giản nhất để nhận diện sự tồn tại của paraben trong kem dưỡng, ch&iacute;nh l&agrave; xem kỹ bảng th&agrave;nh phần, nếu c&oacute; suffix paraben ở gần cuối; hay những c&aacute;i t&ecirc;n như methylparaben, ethylparaben, propylparaben, butylparaben th&igrave; bạn n&ecirc;n tr&aacute;nh&quot;</em>.</p>\r\n\r\n<p><img alt=\"\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/5/photo-1-15755538756751029102614.jpg\" style=\"height:775px; width:620px\" /></p>\r\n\r\n<p><strong>3. Kem dưỡng chứa cyclic silicone</strong></p>\r\n\r\n<p><em>&quot;Silicone tạo độ mượt cho sản phẩm skincare, gi&uacute;p da bạn trở n&ecirc;n mềm mịn như lụa sau khi b&ocirc;i v&agrave; th&agrave;nh phần n&agrave;y thường được t&igrave;m thấy trong kem dưỡng ẩm high-end&quot;</em>, theo chuy&ecirc;n gia Ater.&nbsp;<em>&quot;Kh&ocirc;ng phải loại silicone n&agrave;o cũng xấu nhưng tốt nhất l&agrave; bạn n&ecirc;n tr&aacute;nh th&agrave;nh phần cyclic silicone bởi n&oacute; kh&ocirc;ng tốt cho sức khỏe v&agrave; m&ocirc;i trường&quot;</em>. B&ecirc;n cạnh đ&oacute;, silicone cũng l&agrave; một trong những th&agrave;nh phần g&acirc;y b&iacute;t tắc lỗ ch&acirc;n l&ocirc;ng, khiến da nổi mụn t&ugrave;m lum.</p>\r\n\r\n<p><img alt=\"\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/5/photo-2-1575553875679720547400.jpg\" style=\"height:708px; width:620px\" /></p>\r\n\r\n<p><strong>4. Kem dưỡng chứa chất tạo m&agrave;u</strong></p>\r\n\r\n<p><em>&quot;Chất tạo m&agrave;u nh&acirc;n tạo thường được th&ecirc;m v&agrave;o c&aacute;c sản phẩm skincare để tạo hiệu ứng đẹp mắt nhưng ch&uacute;ng thực ra chẳng được t&iacute;ch sự g&igrave;. Thậm ch&iacute;, th&agrave;nh phần n&agrave;y c&ograve;n khiến da bị k&iacute;ch ứng&quot;</em>, theo chuy&ecirc;n gia Alter.</p>\r\n\r\n<p><img alt=\"\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/5/photo-3-15755538756821152185004.jpg\" style=\"height:465px; width:620px\" /></p>\r\n\r\n<p><strong>5. Kem dưỡng chứa hương liệu nh&acirc;n tạo</strong></p>\r\n\r\n<p>B&aacute;c sĩ da liễu cũng thường khuy&ecirc;n c&aacute;c chị em n&ecirc;n tr&aacute;nh xa kem dưỡng chứa hương liệu nh&acirc;n tạo, l&yacute; do l&agrave; bởi ch&uacute;ng dễ g&acirc;y k&iacute;ch ứng, ngứa ng&aacute;y cho l&agrave;n da v&agrave; trong trường hợp bạn chưa biết, da dẻ thường xuy&ecirc;n bị k&iacute;ch ứng sẽ l&atilde;o h&oacute;a cực nhanh. Tốt nhất, bạn h&atilde;y chọn kem dưỡng kh&ocirc;ng m&ugrave;i hoặc c&oacute; hương thơm ho&agrave;n to&agrave;n tự nhi&ecirc;n nh&eacute;!</p>\r\n\r\n<p>&nbsp;</p>',
    'http://ohuivietnam.tk/userfiles/images/image-7-760x428.jpg',
    1,
    '2019-12-08 12:18:30',
    '2019-12-11 03:53:14'
),(
    3,
    '7 sản phẩm chăm da luôn trong tình trạng bán \"đắt như tôm tươi\", ai dùng xong cũng khen nức nở',
    '7-san-pham-cham-da-luon-trong-tinh-trang-ban-dat-nhu-tom-tuoi-ai-dung-xong-cung-khen-nuc-no',
    'Chuyên trang Byrdie đã đưa ra danh sách những món skincare được săn lùng nhiều nhất trên Amazon, nếu muốn da đẹp mà không tốn nhiều tiền thì chị em không nên \"ngó lơ\".',
    '<p><strong>1. Bio Oil Multiuse Skincare Oil (Khoảng 440.000 VNĐ/200ml)</strong></p>\r\n\r\n<p>Trong danh s&aacute;ch n&agrave;y, Bio Oil được v&iacute; l&agrave; anh h&ugrave;ng chăm s&oacute;c da v&agrave; lu&ocirc;n lọt top những sản phẩm b&aacute;n chạy nhất tr&ecirc;n Amazon trong cả một thập kỷ. Dầu dưỡng của Bio Oil xử l&yacute; &ecirc;m đẹp nhiều vấn đề về da, bao gồm nếp nhăn, th&acirc;m n&aacute;m, rạn da v&agrave; hơn thế nữa.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/7/photo-1-15756517678261012197916.jpg\" target=\"_blank\"><img alt=\"7 sản phẩm chăm da luôn trong tình trạng bán đắt như tôm tươi, ai dùng xong cũng khen nức nở - Ảnh 1.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/7/photo-1-15756517678261012197916.jpg\" /></a></p>\r\n\r\n<p><strong>2. Hada Labo Hadalabo Gokujun Hyaluronic Lotion (Khoảng 185.000 VNĐ)</strong></p>\r\n\r\n<p>Lọ lotion n&agrave;y đang l&agrave; xu hướng mua sắm tr&ecirc;n Amazon. Sản phẩm lỏng nhẹ v&agrave; đỉnh hơn toner ở khả năng cấp ẩm v&agrave; l&agrave;m mềm da. Lọ lotion cũng thấm rất nhanh v&agrave; l&agrave; một bước đệm ho&agrave;n hảo cho kem dưỡng, gi&uacute;p da dẻ ẩm mọng gấp bội phần trong m&ugrave;a lạnh.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/7/photo-1-15756517711941824730919.jpg\" target=\"_blank\"><img alt=\"7 sản phẩm chăm da luôn trong tình trạng bán đắt như tôm tươi, ai dùng xong cũng khen nức nở - Ảnh 2.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/7/photo-1-15756517711941824730919.jpg\" /></a></p>\r\n\r\n<p><strong>3. TruSkin Vitamin C Serum (Khoảng 445.000 VNĐ)</strong></p>\r\n\r\n<p>Đ&acirc;y ch&iacute;nh l&agrave; một trong những lọ serum b&aacute;n chạy nhất tr&ecirc;n Amazon, n&oacute; chứa đến 20% vitamin C gi&uacute;p k&iacute;ch th&iacute;ch da sản sinh collagen, ngăn chặn v&agrave; giảm thiểu những biểu hiện l&atilde;o h&oacute;a đồng thời n&acirc;ng t&ocirc;ng, l&agrave;m đều m&agrave;u da cực tốt. Tuy nhi&ecirc;n, bạn n&ecirc;n thử phản ứng của sản phẩm l&ecirc;n da trước rồi mới quyết định d&ugrave;ng hay kh&ocirc;ng, bởi lọ serum n&agrave;y kh&aacute; &quot;nặng đ&ocirc;&quot;.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/7/photo-2-15756517711961762024770.jpg\" target=\"_blank\"><img alt=\"7 sản phẩm chăm da luôn trong tình trạng bán đắt như tôm tươi, ai dùng xong cũng khen nức nở - Ảnh 3.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/7/photo-2-15756517711961762024770.jpg\" /></a></p>\r\n\r\n<p><strong>4. CeraVe Foaming Facial Cleanser (Khoảng 484.000 VNĐ/355ml)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nếu bạn muốn t&igrave;m kiếm một lọ sữa rửa mặt dịu nhẹ, dung t&iacute;ch si&ecirc;u to, gi&aacute; ổn th&igrave; đừng bỏ qua đại diện của CeraVe. C&ocirc;ng thức của lọ sữa rửa mặt chứa c&aacute;c loại ceramide kh&aacute;c nhau gi&uacute;p sửa chữa lớp m&agrave;ng bảo vệ, cấp cứu l&agrave;n da kh&ocirc; căng, k&iacute;ch ứng đồng thời l&agrave;m sạch da cực tốt.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/7/photo-3-1575651771197741199831.jpg\" target=\"_blank\"><img alt=\"7 sản phẩm chăm da luôn trong tình trạng bán đắt như tôm tươi, ai dùng xong cũng khen nức nở - Ảnh 4.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/7/photo-3-1575651771197741199831.jpg\" /></a></p>\r\n\r\n<p><strong>5. Cosmedica Pure Hyaluronic Acid Serum (Khoảng 370.000 VNĐ)</strong></p>\r\n\r\n<p>Lọ serum n&agrave;y h&agrave;m chứa 100% Hyaluronic Acid. Vậy n&ecirc;n sản phẩm cung cấp một lượng độ ẩm si&ecirc;u dồi d&agrave;o v&agrave; gi&uacute;p bơm căng l&agrave;n da. H&atilde;y thoa một lớp serum vừa đủ l&ecirc;n l&agrave;n da ẩm, massage theo chuyển động tr&ograve;n rồi bao phủ bằng một lớp kem dưỡng kh&oacute;a ẩm, bạn sẽ c&oacute; được l&agrave;n da mướt m&aacute;t v&agrave; mềm như lụa.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/7/photo-4-1575651771198531712652.jpg\" target=\"_blank\"><img alt=\"7 sản phẩm chăm da luôn trong tình trạng bán đắt như tôm tươi, ai dùng xong cũng khen nức nở - Ảnh 5.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/7/photo-4-1575651771198531712652.jpg\" /></a></p>\r\n\r\n<p><strong>6. LilyAna Naturals Rosehip &amp; Hibiscus Eye Cream (Khoảng 486.000 VNĐ)</strong></p>\r\n\r\n<p>Với c&ocirc;ng thức kh&ocirc;ng paraben, phẩm m&agrave;u hay hương liệu nh&acirc;n tạo, lọ kem mắt được đ&aacute;nh gi&aacute; l&agrave; v&ocirc; c&ugrave;ng th&acirc;n thiện với l&agrave;n da. Sau một thời gian chăm chỉ d&ugrave;ng, kết quả tốt đẹp bạn nhận được từ sản phẩm ch&iacute;nh l&agrave; v&ugrave;ng da quanh mắt tươi s&aacute;ng, săn chắc, đủ ẩm v&agrave; kh&ocirc;ng lo l&atilde;o h&oacute;a nhờ những th&agrave;nh phần như: vitamin E, C, bụp giấm, dầu nụ tầm xu&acirc;n.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/7/photo-5-1575651771198753354123.jpg\" target=\"_blank\"><img alt=\"7 sản phẩm chăm da luôn trong tình trạng bán đắt như tôm tươi, ai dùng xong cũng khen nức nở - Ảnh 6.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/7/photo-5-1575651771198753354123.jpg\" /></a></p>\r\n\r\n<p><strong>7. Thayers Witch Hazel With Rose Petal (Khoảng 290.000 VNĐ/355ml)</strong></p>\r\n\r\n<p>Lọ toner n&agrave;y kh&ocirc;ng chứa cồn, cực kỳ dịu d&agrave;ng với l&agrave;n da, đ&atilde; vậy c&ograve;n chứa nước hoa hồng c&ugrave;ng l&ocirc; hội gi&uacute;p cấp ẩm tuyệt vời. Gi&aacute; của lọ toner cũng rất &quot;hạt dẻ&quot; n&ecirc;n chị em c&ograve;n chờ g&igrave; m&agrave; kh&ocirc;ng cập nhật cho gia t&agrave;i đồ dưỡng da?</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/7/photo-6-1575651771199498271397.jpg\" target=\"_blank\"><img alt=\"7 sản phẩm chăm da luôn trong tình trạng bán đắt như tôm tươi, ai dùng xong cũng khen nức nở - Ảnh 7.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/7/photo-6-1575651771199498271397.jpg\" /></a></p>',
    'http://ohuivietnam.tk/userfiles/images/image-5-760x428.jpg',
    1,
    '2019-12-08 12:50:48',
    '2019-12-11 03:52:49'
),(
    4,
    'Trời rét đậm môi chỉ trực khô nứt, đây là 5 thỏi son tint Hàn siêu mềm môi mà lại bền màu từ sáng tới chiều xứng đáng để bạn khuân về',
    'troi-ret-dam-moi-chi-truc-kho-nut-day-la-5-thoi-son-tint-han-sieu-mem-moi-ma-lai-ben-mau-tu-sang-toi-chieu-xung-dang-de-ban-khuan-ve',
    'Dù son lì có mê li đến đâu thì cũng không thể “đánh bại” hoàn toàn son tint về khoản mềm môi mà vẫn lâu trôi.',
    '<p>M&ugrave;a đ&ocirc;ng đến rồi v&agrave; bạn n&ecirc;n tạm thời gạt qua một b&ecirc;n những thỏi son l&igrave;, si&ecirc;u l&igrave; đi th&ocirc;i bởi ch&uacute;ng sẽ khiến m&ocirc;i bạn kh&ocirc; như ng&oacute;i, da m&ocirc;i dễ bong ra từng mảng v&agrave;o cuối ng&agrave;y. Thay v&agrave;o đ&oacute;, những thỏi son tint hơi b&oacute;ng nhẹ lại trở th&agrave;nh lựa chọn s&aacute;ng suốt, đ&uacute;ng đắn hơn. Ch&uacute;ng sẽ gi&uacute;p m&ocirc;i bạn căng mọng, mềm mại m&agrave; vẫn giữ được lớp m&agrave;u tươi tắn. Dưới đ&acirc;y l&agrave; những thỏi son H&agrave;n Quốc xịt đ&eacute;t mới toanh m&agrave; bạn n&ecirc;n sở hữu &iacute;t nhất v&agrave;i em mới thoả l&ograve;ng.</p>\r\n\r\n<p><strong>3CE Glaze Lip Tint (gi&aacute; gốc: 294.000 VNĐ)</strong></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/3ceofficial734201691644650713118057978731841829144248n-1575301206725680324259.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 1.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/3ceofficial734201691644650713118057978731841829144248n-1575301206725680324259.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/realisshoyunyun7308951124448517657381344351629253115849625n-15753014252452136767889.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 1.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/realisshoyunyun7308951124448517657381344351629253115849625n-15753014252452136767889.jpg\" /></a></p>\r\n\r\n<p>Nếu so với d&ograve;ng son &quot;chị em&quot; chung nh&agrave; l&agrave; Cloud Lip Tint th&igrave; 7 thỏi son Glaze Lip Tint c&oacute; phần l&eacute;p vế hơn về thiết kế bởi vẻ ngo&agrave;i đơn giản, kh&ocirc;ng sang chảnh bằng. Tuy nhi&ecirc;n, về chất son v&agrave; khả năng dưỡng m&ocirc;i th&igrave; &quot;em n&agrave;y&quot; lại kh&ocirc;ng thể xem thường. Theo như h&atilde;ng giới thiệu, son cho lớp m&agrave;u đều đẹp, khi thoa sẽ c&oacute; lớp oil bao phủ l&ecirc;n m&ocirc;i c&oacute; c&ocirc;ng dụng dưỡng ẩm, ph&ugrave; hợp với những ng&agrave;y trời đ&ocirc;ng lạnh gi&aacute;. V&igrave; l&agrave; son tint n&ecirc;n son sẽ để lại lớp stain m&agrave;u nhẹ nh&agrave;ng, bạn kh&ocirc;ng cần &quot;xoắn&quot; v&igrave; kể cả khi ăn uống, son cũng kh&ocirc;ng tr&ocirc;i tuột đi đ&acirc;u.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/giphy-15753017704311458462217.gif\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 2.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/giphy-15753017704311458462217.gif\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/giphy-1-1575301770429505912203.gif\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 2.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/giphy-1-1575301770429505912203.gif\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/lilac836727871535426229329856749059643437679368191n-1575301425244428192340.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 3.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/lilac836727871535426229329856749059643437679368191n-1575301425244428192340.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/allabout3ce734753839383180365455963705917247516765478n-1575301206729401915503.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 3.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/allabout3ce734753839383180365455963705917247516765478n-1575301206729401915503.jpg\" /></a></p>\r\n\r\n<p><strong>Romand Glasting Water Tint (gi&aacute; gốc: 254.000 VNĐ)</strong></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/colortailor7221752224972229239327034214063357696760293n-1575302736798893378919.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 4.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/colortailor7221752224972229239327034214063357696760293n-1575302736798893378919.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/motdsudal7464952325388474630178301844757112405751048n-15753027368051510818925.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 4.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/motdsudal7464952325388474630178301844757112405751048n-15753027368051510818925.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/maeilbeauty735217755490136392706932075049693981787351n-1575302736803229061213.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 4.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/maeilbeauty735217755490136392706932075049693981787351n-1575302736803229061213.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/cossaturn754431701016564246162766893639370446691759n-15753027368022128427362.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 4.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/cossaturn754431701016564246162766893639370446691759n-15753027368022128427362.jpg\" /></a></p>\r\n\r\n<p>Vừa ra mắt mới đ&acirc;y nhưng Glasting Water Tint nhanh ch&oacute;ng trở th&agrave;nh thỏi son hot hit được c&aacute;c qu&yacute; c&ocirc; &quot;săn đ&oacute;n&quot; nồng nhiệt. Bởi mức gi&aacute; phải chăng m&agrave; chất lượng, m&agrave;u son th&igrave; xuất sắc kh&ocirc;ng cần chỉnh điểm n&agrave;o. Với độ b&oacute;ng c&oacute; thể điều chỉnh dễ d&agrave;ng, chồng c&agrave;ng nhiều lớp b&oacute;ng c&agrave;ng r&otilde;, v&agrave; ngược lại, n&ecirc;n những n&agrave;ng n&agrave;o th&iacute;ch son b&oacute;ng vừa phải, thoa một lớp th&ocirc;i l&agrave; đ&atilde; xinh xẻo rồi! Điểm cộng cho d&ograve;ng son tint của nh&agrave; Romand ch&iacute;nh l&agrave; l&acirc;u tr&ocirc;i, son c&oacute; m&agrave;u g&igrave; sẽ cho lớp stain m&agrave;u đ&oacute;, sau lớp son b&oacute;ng gi&uacute;p m&ocirc;i căng mọng l&agrave; lớp son l&igrave; ho&agrave;n hảo tr&ecirc;n m&ocirc;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>GIF</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Peripera Ink Tint Serum (gi&aacute; khoảng: 190.000 VNĐ)</strong></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/periperaofficial720895224545681452564957928228903810487355n-1575303660072445217532.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 7.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/periperaofficial720895224545681452564957928228903810487355n-1575303660072445217532.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/clubclioofficial789744061495287963046398415702743777197417n-15753036600681123090742.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 7.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/clubclioofficial789744061495287963046398415702743777197417n-15753036600681123090742.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/clubclioofficial7466796531577974376287526505898083040759915n-15753036600671779683634.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 7.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/clubclioofficial7466796531577974376287526505898083040759915n-15753036600671779683634.jpg\" /></a></p>\r\n\r\n<p>Th&ecirc;m một d&ograve;ng son dưỡng m&ocirc;i chuẩn chỉnh, gi&aacute; hợp l&yacute; v&agrave;o m&ugrave;a đ&ocirc;ng m&agrave; bạn n&ecirc;n c&acirc;n nhắc qua ch&iacute;nh l&agrave; Peripera Ink Tint Serum. Vẫn với thiết kế lọ mực mini quen thuộc nhưng &quot;em n&oacute;&quot; được h&atilde;ng bổ sung th&agrave;nh phần dưỡng m&ocirc;i, tăng cường độ ẩm, giữ cho m&ocirc;i lu&ocirc;n mềm mịn, căng mướt sau nhiều giờ. 5 m&agrave;u son của d&ograve;ng Ink Tink Serum hầu như kh&ocirc;ng k&eacute;n da v&agrave; bạn c&oacute; thể diện xinh m&agrave; chẳng cần makeup cầu k&igrave;.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/sobbi947731693301767421433820384069015528108342349n-15753036600701099068461.jpg\" target=\"_blank\"><img alt=\"Trời rét đậm môi chỉ trực khô nứt, đây là 5 thỏi son tint Hàn siêu mềm môi mà lại bền màu từ sáng tới chiều xứng đáng để bạn khuân về - Ảnh 8.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/sobbi947731693301767421433820384069015528108342349n-15753036600701099068461.jpg\" /></a></p>\r\n\r\n<p><strong>Keep In Touch Mood MLBB Velvet Tint (gi&aacute; gốc: 212.000 VNĐ)</strong></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/keepintouchglobal702251731389259174728882953529881670560136n-1575305512165611628648.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 9.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/keepintouchglobal702251731389259174728882953529881670560136n-1575305512165611628648.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/keepintouchglobal703461117657203672210823659164534180149442n-15753055121682063544604.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 9.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/keepintouchglobal703461117657203672210823659164534180149442n-15753055121682063544604.jpg\" /></a></p>\r\n\r\n<p>Dựa tr&ecirc;n phong c&aacute;ch MLBB chủ đạo, những thỏi son tint của Keep In Touch dễ d&agrave;ng &quot;đốn ng&atilde;&quot; t&iacute;n đồ m&ecirc; son nhờ m&agrave;u son tự nhi&ecirc;n, hợp nhiều t&ocirc;ng da v&agrave; để mặt mộc đ&aacute;nh vẫn long lanh, cuốn h&uacute;t như thường. Chất son tint lai velvet n&ecirc;n son c&oacute; kết cấu xốp đặc hơn, tuy nhi&ecirc;n m&agrave;u son l&ecirc;n m&ocirc;i vẫn dễ t&aacute;n v&agrave; tạo hiệu ứng loang m&agrave;u cực đẹp.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/giphy-2-15753056143471639155844.gif\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 10.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/giphy-2-15753056143471639155844.gif\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/anh-chup-man-hinh-2019-12-02-luc-235016-1575305519982846716247.png\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 10.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/anh-chup-man-hinh-2019-12-02-luc-235016-1575305519982846716247.png\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/keepintouchglobal6956559910931366642155237752290594956848586n-1575305512167828415365.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 10.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/keepintouchglobal6956559910931366642155237752290594956848586n-1575305512167828415365.jpg\" /></a></p>\r\n\r\n<p><strong>Hanskin Glam Moloon Lip Tint Syrup (gi&aacute; gốc: 313.000 VNĐ)</strong></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/3/hjchbj619535901626178047765707078974189910215646n-1575306629538791826099.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 11.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/3/hjchbj619535901626178047765707078974189910215646n-1575306629538791826099.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/3/inyoung916445664324371516796407608299031444747372923n-15753066295391356654746.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 11.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/3/inyoung916445664324371516796407608299031444747372923n-15753066295391356654746.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/3/maeilbeauty659278224100484065240821803819921903133286n-15753066295401676734717.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 11.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/3/maeilbeauty659278224100484065240821803819921903133286n-15753066295401676734717.jpg\" /></a></p>\r\n\r\n<p>Diện mạo đơn giản, tinh tế của d&ograve;ng son nhiều dưỡng Glam Moloon Lip Tint Syrup c&oacute; thể sẽ khiến kh&ocirc;ng &iacute;t c&ocirc; g&aacute;i xi&ecirc;u l&ograve;ng. Bộ 5 m&agrave;u son m&agrave; h&atilde;ng mỹ phẩm Hanskin mang đến cũng chẳng k&eacute;n t&ocirc;ng da với m&agrave;u cam, hồng v&agrave; m&agrave;u đỏ quả sung chủ đạo. Nhờ c&oacute; lớp b&oacute;ng nhẹ tr&ecirc;n bề mặt m&agrave; son khiến m&ocirc;i căng mướt, mịn m&agrave;ng hơn, ph&ugrave; hợp diện trong những ng&agrave;y thời tiết se lạnh.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/3/maeilbeauty625478374016579873704647413421531156024202n-1575306657395578588147.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 12.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/3/maeilbeauty625478374016579873704647413421531156024202n-1575306657395578588147.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/3/cocomidnight657357383379061104951176387230018569876801n-1575306629536260270386.jpg\"><img alt=\"Trời r&amp;#233;t đậm m&amp;#244;i chỉ trực kh&amp;#244; nứt, đ&amp;#226;y l&amp;#224; 5 thỏi son tint H&amp;#224;n si&amp;#234;u mềm m&amp;#244;i m&amp;#224; lại bền m&amp;#224;u từ s&amp;#225;ng tới chiều xứng đ&amp;#225;ng để bạn khu&amp;#226;n về - Ảnh 12.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/3/cocomidnight657357383379061104951176387230018569876801n-1575306629536260270386.jpg\" /></a></p>',
    'http://ohuivietnam.tk/userfiles/images/image-4-760x428.jpg',
    1,
    '2019-12-08 12:59:38',
    '2019-12-11 03:52:13'
),(
    5,
    'Để trông trẻ trung hơn cả \"phi công\" kém 9 tuổi, Trần Kiều Ân luôn chú trọng đến 3 bước dưỡng da',
    'de-trong-tre-trung-hon-ca-phi-cong-kem-9-tuoi-tran-kieu-an-luon-chu-trong-den-3-buoc-duong-da',
    'Trong đó bước đầu tiên là bước mà nhiều chị em thường làm qua loa cho xong.',
    '<p>Năm nay vừa tr&ograve;n 40 tuổi nhưng &quot;Đ&ocirc;ng Phương Bất Bại&quot; Trần Kiều &Acirc;n vẫn sở hữu nhan sắc trẻ trung, l&agrave;n da căng mịn đến g&aacute;i đ&ocirc;i mươi cũng phải ghen tị. B&ecirc;n cạnh yếu tố di truyền th&igrave; chu tr&igrave;nh chăm s&oacute;c da h&agrave;ng ng&agrave;y cũng v&ocirc; c&ugrave;ng quan trọng để nữ diễn vi&ecirc;n &quot;hack tuổi&quot; đỉnh cao như vậy.</p>\r\n\r\n<p>Ngỡ rằng người nổi tiếng như Trần Kiều &Acirc;n sẽ chăm da cầu kỳ lắm, đi spa như cơm bữa. Nhưng trong thực tế c&ocirc; thường chỉ tự chăm s&oacute;c da tại nh&agrave; v&agrave; đặc biệt ch&uacute; &yacute; v&agrave;o 3 bước dưỡng sau để da dẻ lu&ocirc;n ho&agrave;n hảo.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-1-15752740739371575594037.jpg\" target=\"_blank\"><img alt=\"Để trông trẻ trung hơn cả phi công kém 9 tuổi, Trần Kiều Ân luôn chú trọng đến 3 bước dưỡng da sau - Ảnh 1.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-1-15752740739371575594037.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-1-1575274076514496084550.jpg\" target=\"_blank\"><img alt=\"Để trông trẻ trung hơn cả phi công kém 9 tuổi, Trần Kiều Ân luôn chú trọng đến 3 bước dưỡng da sau - Ảnh 2.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-1-1575274076514496084550.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-2-15752740765171671581118.jpg\" target=\"_blank\"><img alt=\"Để trông trẻ trung hơn cả phi công kém 9 tuổi, Trần Kiều Ân luôn chú trọng đến 3 bước dưỡng da sau - Ảnh 3.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-2-15752740765171671581118.jpg\" /></a></p>\r\n\r\n<p>Trần Kiều &Acirc;n sở hữu nhan sắc c&ograve;n trẻ trung hơn cả bạn trai thiếu gia k&eacute;m 9 tuổi.</p>\r\n\r\n<h3>1. Tẩy trang kỹ lưỡng</h3>\r\n\r\n<p>L&agrave; một diễn vi&ecirc;n thường xuy&ecirc;n trang điểm đậm, Trần Kiều &Acirc;n cũng v&ocirc; c&ugrave;ng ch&uacute; trọng v&agrave;o việc tẩy trang cho da. Nhiều người thường chỉ tẩy trang qua loa cho xong nhưng Trần Kiều &Acirc;n lại rất cầu kỳ trong bước n&agrave;y. C&ocirc; cho rằng chỉ khi tẩy trang sạch th&igrave; da mới c&oacute; thể hấp thụ to&agrave;n bộ dưỡng chất từ những bước skincare sau đ&oacute;. C&ocirc; lưu &yacute; chọn sản phẩm tẩy trang dịu nhẹ dạng sữa, vừa tẩy trang vừa massage nhẹ nh&agrave;ng tr&ecirc;n da để gi&uacute;p l&agrave;m sạch s&acirc;u lại k&iacute;ch th&iacute;ch m&aacute;u lưu th&ocirc;ng.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-3-15752740765201780278483.jpeg\"><img alt=\"Để tr&amp;#244;ng trẻ trung hơn cả &amp;quot;phi c&amp;#244;ng&amp;quot; k&amp;#233;m 9 tuổi, Trần Kiều &amp;#194;n lu&amp;#244;n ch&amp;#250; trọng đến 3 bước dưỡng da sau - Ảnh 4.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/photo-3-15752740765201780278483.jpeg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-4-1575274076526616180949.jpg\"><img alt=\"Để tr&amp;#244;ng trẻ trung hơn cả &amp;quot;phi c&amp;#244;ng&amp;quot; k&amp;#233;m 9 tuổi, Trần Kiều &amp;#194;n lu&amp;#244;n ch&amp;#250; trọng đến 3 bước dưỡng da sau - Ảnh 4.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/2/photo-4-1575274076526616180949.jpg\" /></a></p>\r\n\r\n<h3>2. Dưỡng ẩm, đắp mặt nạ</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trong b&agrave;i phỏng vấn với tờ Vogue Mini Trung Quốc, Trần Kiều &Acirc;n từng chia sẻ bước dưỡng da trọng điểm của c&ocirc; l&agrave;: Dưỡng ẩm. C&ocirc; vốn c&oacute; l&agrave;n da kh&aacute; mẫn cảm, &iacute;t khi d&ugrave;ng c&aacute;c sản phẩm dưỡng trắng m&agrave; lại cực kỳ ch&uacute; trọng v&agrave;o việc dưỡng ẩm để da ngậm nước, căng mọng như tr&aacute;i ch&iacute;n, đồng thời giảm thiểu sự h&igrave;nh th&agrave;nh nếp nhăn. B&ecirc;n cạnh việc d&ugrave;ng serum, kem dưỡng, c&ocirc; c&ograve;n hay đắp mặt nạ để qua đ&ecirc;m.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-5-15752740765281630334024.jpg\" target=\"_blank\"><img alt=\"Để trông trẻ trung hơn cả phi công kém 9 tuổi, Trần Kiều Ân luôn chú trọng đến 3 bước dưỡng da sau - Ảnh 5.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-5-15752740765281630334024.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-6-157527407653494068800.jpg\" target=\"_blank\"><img alt=\"Để trông trẻ trung hơn cả phi công kém 9 tuổi, Trần Kiều Ân luôn chú trọng đến 3 bước dưỡng da sau - Ảnh 6.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-6-157527407653494068800.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-7-15752740765421630218477.jpg\" target=\"_blank\"><img alt=\"Để trông trẻ trung hơn cả phi công kém 9 tuổi, Trần Kiều Ân luôn chú trọng đến 3 bước dưỡng da sau - Ảnh 7.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-7-15752740765421630218477.jpg\" /></a></p>\r\n\r\n<h3>3. Chăm s&oacute;c mắt</h3>\r\n\r\n<p>Mắt ch&iacute;nh l&agrave; bộ phận dễ bộc lộ nhược điểm tuổi t&aacute;c của nhiều c&ocirc; n&agrave;ng. Vốn sở hữu đ&ocirc;i mắt to tr&ograve;n ấn tượng n&ecirc;n Trần Kiều &Acirc;n cũng đặc biệt ch&uacute; trọng việc dưỡng v&ugrave;ng mắt. Sau c&aacute;c bước dưỡng da th&ocirc;ng thường, Trần Kiều &Acirc;n sẽ d&ugrave;ng th&ecirc;m một ch&uacute;t kem mắt kết hợp th&ecirc;m c&aacute;c động t&aacute;c massage để k&iacute;ch th&iacute;ch m&aacute;u lưu th&ocirc;ng. Ngo&agrave;i ra, đ&ocirc;i khi c&ocirc; c&ograve;n đắp mặt nạ mắt để giữ v&ugrave;ng da n&agrave;y lu&ocirc;n căng mọng, hạn chế nếp nhăn, quầng th&acirc;m.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-8-1575274076544758394146.jpg\" target=\"_blank\"><img alt=\"Để trông trẻ trung hơn cả phi công kém 9 tuổi, Trần Kiều Ân luôn chú trọng đến 3 bước dưỡng da sau - Ảnh 8.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-8-1575274076544758394146.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-9-1575274076551893211748.jpg\" target=\"_blank\"><img alt=\"Để trông trẻ trung hơn cả phi công kém 9 tuổi, Trần Kiều Ân luôn chú trọng đến 3 bước dưỡng da sau - Ảnh 9.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-9-1575274076551893211748.jpg\" /></a></p>',
    'http://ohuivietnam.tk/userfiles/images/foody-upload-api-foody-mobile-my-pham-jpg-180410151618.jpg',
    1,
    '2019-12-08 13:09:32',
    '2019-12-11 03:51:42'
),(
    6,
    'Nếu da quá nhạy cảm để dùng Retinol, bạn có thể chống lão hóa chậm-nhưng-chắc bằng thành phần \"họ hàng\" của em nó',
    'neu-da-qua-nhay-cam-de-dung-retinol-ban-co-the-chong-lao-hoa-cham-nhung-chac-bang-thanh-phan-ho-hang-cua-em-no',
    'Đây là 1 sự thay thế nhẹ nhàng hơn nhiều.',
    '<p>Nhắc đến c&aacute;c sản phẩm chống l&atilde;o h&oacute;a, chị em sẽ nghĩ ngay đến những lọ serum, kem dưỡng c&oacute; chứa th&agrave;nh phần thần th&aacute;nh mang t&ecirc;n Retinol (một dạng của Retinoid). Đ&uacute;ng, th&agrave;nh phần n&agrave;y c&oacute; khả năng trẻ h&oacute;a l&agrave;n da rất kỳ diệu; tuy nhi&ecirc;n, ngo&agrave;i Retinol th&igrave; c&oacute; 1 th&agrave;nh phần kh&aacute;c mang t&ecirc;n Retinyl Palmitate cũng c&oacute; t&aacute;c dụng chống l&atilde;o h&oacute;a hiệu quả kh&ocirc;ng k&eacute;m, chưa hết, th&agrave;nh phần n&agrave;y &iacute;t g&acirc;y k&iacute;ch ứng da như Retinol, ph&ugrave; hợp với người c&oacute; l&agrave;n da nhạy cảm nhất.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/28/square1-15749362694521146317418.jpg\" target=\"_blank\"><img alt=\"Nếu da quá nhạy cảm để dùng Retinol, bạn có thể chống lão hóa chậm-nhưng-chắc bằng thành phần họ hàng của em nó - Ảnh 1.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/28/square1-15749362694521146317418.jpg\" /></a></p>\r\n\r\n<p><strong>Retinyl Palmitate l&agrave; g&igrave;?&nbsp;</strong></p>\r\n\r\n<p>Đ&acirc;y l&agrave; một chất Retinoid kh&ocirc;ng cần k&ecirc; đơn, thậm ch&iacute; c&ograve;n &iacute;t g&acirc;y bong tr&oacute;c v&agrave; k&iacute;ch ứng hơn Retinol. C&oacute; thể xem đ&acirc;y l&agrave; loại Retinoid yếu nhất.</p>\r\n\r\n<p><strong>Retinyl Palmitate c&oacute; t&aacute;c dụng g&igrave;?&nbsp;</strong></p>\r\n\r\n<p>Được liệt v&agrave;o th&agrave;nh phần tẩy tế b&agrave;o chết, Retinyl Palmitate gi&uacute;p th&uacute;c đẩy sự thay đổi tế b&agrave;o da, cải thiện m&agrave;u da, k&iacute;ch th&iacute;ch sản xuất collagen, gi&uacute;p l&agrave;m th&ocirc;ng tho&aacute;ng lỗ ch&acirc;n l&ocirc;ng, l&agrave;m chậm qu&aacute; tr&igrave;nh h&igrave;nh th&agrave;nh nếp nhăn.</p>\r\n\r\n<p><strong>N&ecirc;n l&agrave; kh&ocirc;ng n&ecirc;n kết hợp c&ugrave;ng th&agrave;nh phần n&agrave;o?&nbsp;</strong></p>\r\n\r\n<p>V&igrave; Retinyl Palmitate c&oacute; đặc t&iacute;nh tẩy tế b&agrave;o chết, n&ecirc;n tr&aacute;nh kết hợp n&oacute; với c&aacute;c chất tẩy da chết h&oacute;a học kh&aacute;c, chẳng hạn như Glycolic hoặc Axit Salicylic, cũng như một số sản phẩm tẩy da chết c&oacute; chứa hạt. N&ecirc;n kết hợp n&oacute; một loại kem dưỡng ẩm đơn giản v&agrave;o buổi tối. Quan trọng nhất l&agrave; phải d&ugrave;ng kem chống nắng h&agrave;ng ng&agrave;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>C&aacute;c sản phẩm tốt nhất với Retinyl Palmitate m&agrave; bạn c&oacute; thể tham khảo:&nbsp;</strong></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-1-157525798431386051139.jpg\" target=\"_blank\"><img alt=\"Nếu da quá nhạy cảm để dùng Retinol, bạn có thể chống lão hóa chậm-nhưng-chắc bằng thành phần họ hàng của em nó - Ảnh 2.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-1-157525798431386051139.jpg\" /></a></p>\r\n\r\n<p>Seacret Milk and Honey Body Lotion - Gi&aacute; gốc khoảng 400.000 VNĐ: Kh&ocirc;ng chỉ chứa Retinyl Palmitate, sản phẩm dưỡng thể n&agrave;y c&ograve;n c&oacute; chiết xuất dầu bơ v&agrave; chiết xuất hoa c&uacute;c gi&uacute;p da ẩm mượt. Ngo&agrave;i ra th&agrave;nh phần cũng kh&ocirc;ng chứa paraben v&agrave; chất g&acirc;y dị ứng, chất kem đặc v&agrave; thấm kh&aacute; nhanh.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-1-15752579902781352385690.jpg\" target=\"_blank\"><img alt=\"Nếu da quá nhạy cảm để dùng Retinol, bạn có thể chống lão hóa chậm-nhưng-chắc bằng thành phần họ hàng của em nó - Ảnh 3.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-1-15752579902781352385690.jpg\" /></a></p>\r\n\r\n<p>Elizabeth Arden Advanced Ceramide Capsules Daily Youth Restoring Serum - Gi&aacute; gốc khoảng 1,8 triệu VNĐ: Ngo&agrave;i th&agrave;nh phần Retinyl Palmitate, mỗi vi&ecirc;n nang c&ograve;n chứa hỗn hợp Ceramide 1, 3, 6, hỗn hợp axit b&eacute;o, chiết xuất hoa tr&agrave; Nhật Bản v&agrave; nhiều th&agrave;nh phần dưỡng chất c&oacute; khả năng nhanh ch&oacute;ng l&agrave;m săn chắc da, giảm c&aacute;c dấu hiệu của l&atilde;o h&oacute;a như nếp nhăn, đường nhăn, da thiếu đ&agrave;n hồi, da kh&ocirc;, sạm m&agrave;u&hellip; gi&uacute;p da tươi trẻ v&agrave; s&aacute;ng khỏe hơn.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-2-15752579902801450120917.png\" target=\"_blank\"><img alt=\"Nếu da quá nhạy cảm để dùng Retinol, bạn có thể chống lão hóa chậm-nhưng-chắc bằng thành phần họ hàng của em nó - Ảnh 4.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-2-15752579902801450120917.png\" /></a></p>\r\n\r\n<p>DermE Anti-Wrinkle Renewal Cream - Gi&aacute; gốc khoảng 270.000 VNĐ: Hũ kem gi&agrave;u chất chống oxy h&oacute;a bởi c&oacute; chứa vitamin E, chất Allantoin l&agrave;m dịu da, chất Panthenol v&agrave; c&aacute;c loại tinh dầu.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-3-1575257990280991938221.jpg\" target=\"_blank\"><img alt=\"Nếu da quá nhạy cảm để dùng Retinol, bạn có thể chống lão hóa chậm-nhưng-chắc bằng thành phần họ hàng của em nó - Ảnh 5.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-3-1575257990280991938221.jpg\" /></a></p>\r\n\r\n<p>Pestle &amp; Mortar Superstar Retinoid Night Oil - Gi&aacute; gốc khoảng 2,2 triệu VNĐ: Nếu bạn muốn chống l&atilde;o h&oacute;a triệt để, h&atilde;y thử loại dầu n&agrave;y kết hợp c&ugrave;ng 1 sản phẩm kh&aacute;c c&oacute; chứa Retinoid để tối đa h&oacute;a hiệu quả thu nhỏ lỗ ch&acirc;n l&ocirc;ng, giảm nếp nhăn. C&ocirc;ng thức l&agrave; sự pha trộn của một số loại dầu hữu cơ &eacute;p lạnh, gi&uacute;p da thẩm thấu nhanh c&aacute;c dưỡng chất.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-4-15752579902811045166072.jpg\" target=\"_blank\"><img alt=\"Nếu da quá nhạy cảm để dùng Retinol, bạn có thể chống lão hóa chậm-nhưng-chắc bằng thành phần họ hàng của em nó - Ảnh 6.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-4-15752579902811045166072.jpg\" /></a></p>\r\n\r\n<p>Retrouve Revitalizing Eye Concentrate - Gi&aacute; gốc khoảng 5,8 triệu VNĐ: Th&agrave;nh phần gồm Squalane, chiết xuất Morinda Citrofolia, Retinyl Palmitate v&agrave; Vitamin E. Lọ kem mắt n&agrave;y sẽ cho bạn đ&ocirc;i mắt kh&ocirc;ng bọng hay nếp nhăn.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-5-1575257990281596649120.jpg\" target=\"_blank\"><img alt=\"Nếu da quá nhạy cảm để dùng Retinol, bạn có thể chống lão hóa chậm-nhưng-chắc bằng thành phần họ hàng của em nó - Ảnh 7.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-5-1575257990281596649120.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/2/photo-6-15752579902821123984815.jpg\" target=\"_blank\"><img alt=\"Nếu da quá nhạy cảm để dùng Retinol, bạn có thể chống lão hóa chậm-nhưng-chắc bằng thành phần họ hàng của em nó - Ảnh 8.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/2/photo-6-15752579902821123984815.jpg\" /></a></p>\r\n\r\n<p>Shani Darden Texture Reform Gentle Resurfacing Serum - Gi&aacute; gốc khoảng 2,3 triệu VNĐ. Đ&acirc;y l&agrave; chai serum được hầu hết c&aacute;c BTV của Byrdie đ&aacute;nh gi&aacute; cao. Chất serum lỏng nhẹ, thấm nhanh c&ugrave;ng với đ&oacute; l&agrave; khả năng gi&uacute;p da căng b&oacute;ng đỉnh cao.</p>',
    'http://ohuivietnam.tk/userfiles/images/chup-anh-dep-cho-mau-quang-cao-my-pham.jpg',
    1,
    '2019-12-08 13:13:20',
    '2019-12-11 03:51:01'
),(
    7,
    '7 hũ mặt nạ xử mụn đầu đen cực kỳ “okelah”: Xem xong bạn sẽ muốn múc ít nhất một em',
    '7-hu-mat-na-xu-mun-dau-den-cuc-ky-“okelah”-xem-xong-ban-se-muon-muc-it-nhat-mot-em',
    'Những sản phẩm mặt nạ trị mụn đầu đen dưới đây chính là cứu tinh nhan sắc cho bạn đấy.',
    '<p>Mụn đầu đen tuy kh&ocirc;ng đ&aacute;ng gh&eacute;t bằng mụn sưng đỏ, nhưng c&oacute; ch&uacute;ng tr&ecirc;n mặt, đặc biệt l&agrave; tr&ecirc;n mũi th&igrave; nhất định chẳng dễ chịu g&igrave;. Tất nhi&ecirc;n, bạn c&oacute; thể che phủ ch&uacute;ng bằng v&agrave;i lớp cushion, kem che khuyết điểm &quot;ph&eacute;p thuật&quot; nhưng rồi khi lớp makeup xỉn m&agrave;u hoặc l&uacute;c tẩy trang v&agrave;o cuối ng&agrave;y, bạn vẫn phải đối diện với đ&aacute;m mụn đầu đen k&eacute;m xinh như thường lệ. Thế n&ecirc;n, c&aacute;ch tốt nhất vẫn l&agrave; trị mụn đầu đen cho l&agrave;nh v&agrave; dưới đ&acirc;y l&agrave; c&aacute;c sản phẩm mặt nạ sẽ gi&uacute;p bạn l&agrave;m điều đ&oacute;.</p>\r\n\r\n<p><strong>1. Mặt nạ trị mụn đầu đen từ thi&ecirc;n nhi&ecirc;n tốt nhất: Tata Harper Purifying Pore &amp; Blackhead Detox Mask (gi&aacute; gốc: 1.666.000 VNĐ)</strong></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/1/dtx0562quoteimage-15751925667401742157640.jpg\"><img alt=\"7 hũ mặt nạ “xử” mụn đầu đen okelah phết: Ít nhất bạn cũng phải “múc” liền một em - Ảnh 1.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/1/dtx0562quoteimage-15751925667401742157640.jpg\" /></a></p>\r\n\r\n<p>Với thiết kế dạng hũ m&agrave;u xanh mướt mắt, xinh xẻo, lọ mặt nạ của Tata Harper r&otilde; r&agrave;ng đ&atilde; đốn tim c&aacute;c n&agrave;ng kh&ocirc;ng &iacute;t. Tuy nhi&ecirc;n, &quot;em n&oacute;&quot; c&ograve;n được y&ecirc;u th&iacute;ch hơn nhờ c&ocirc;ng thức 100% tự nhi&ecirc;n, l&agrave;m mịn da hiệu quả. C&aacute;ch d&ugrave;ng l&agrave; h&atilde;y thoa một lớp d&agrave;y tr&ecirc;n da sạch v&agrave; để trong 20 ph&uacute;t. Th&agrave;nh phần đất s&eacute;t trắng sẽ hấp thụ dầu thừa, trong khi enzyme đu đủ hỗ trợ thu nhỏ lỗ ch&acirc;n l&ocirc;ng. Cuối c&ugrave;ng, khi gỡ lớp mặt nạ ra, bạn sẽ thấy những sợi b&atilde; nhờn, mụn đầu đen cũng đi theo nốt.</p>\r\n\r\n<p><strong>2. Mặt nạ/sữa rửa mặt trị mụn tốt nhất: Neutrogena Clear Pore Facial Cleanser/Mask (gi&aacute; gốc: 155.000 VNĐ)</strong></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/1/b43e3dad7ed5a57e4263d0e3cdd9cdb4-1575192566736720541059.jpg\"><img alt=\"7 hũ mặt nạ “xử” mụn đầu đen okelah phết: Ít nhất bạn cũng phải “múc” liền một em - Ảnh 2.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/1/b43e3dad7ed5a57e4263d0e3cdd9cdb4-1575192566736720541059.jpg\" /></a></p>\r\n\r\n<p>Nếu kinh ph&iacute; c&oacute; hạn v&agrave; muốn trị gọn ghẽ mụn đầu đen? H&atilde;y t&igrave;m đến với Neutrogena Clear Pore Facial Cleanser/Mask bởi ch&uacute;ng c&oacute; gi&aacute; v&ocirc; c&ugrave;ng &quot;hạt dẻ&quot; nhưng chất lượng lại tuyệt vời &ocirc;ng mặt trời. Sản phẩm được t&iacute;ch hợp 2 chức năng, vừa l&agrave;m mặt nạ vừa l&agrave;m sạch da, đặc biệt hữu hiệu trong việc trị mụn đầu đen, mụn trứng c&aacute;. Tuy c&oacute; gi&aacute; &quot;b&egrave;o bọt&quot; nhưng em n&oacute; lại được nhiều b&aacute;c sĩ da liễu đ&aacute;nh gi&aacute; cao. Với c&aacute;ch d&ugrave;ng như mặt nạ, bạn sẽ cần đắp 2-3 lần/tuần, để kh&ocirc; trong 10 ph&uacute;t v&agrave; rửa lại với nước sạch.</p>\r\n\r\n<p><strong>3. Mặt nạ trị mụn đầu đen tốt nhất: Dermalogica Blackhead Clearing Fizz Mask (gi&aacute; gốc: 486.000 VNĐ)</strong></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/1/fizzy21024x1024-15751925667411463657654.png\"><img alt=\"7 hũ mặt nạ “xử” mụn đầu đen okelah phết: Ít nhất bạn cũng phải “múc” liền một em - Ảnh 3.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/1/fizzy21024x1024-15751925667411463657654.png\" /></a></p>\r\n\r\n<p>Đừng lo lắng nếu bạn đ&atilde; thử qua nhiều loại m&agrave; vẫn chưa trị dứt điểm mụn đầu đen. C&oacute; khả năng cao l&agrave; bạn chưa d&ugrave;ng đ&uacute;ng sản phẩm. Ấy thế n&ecirc;n mặt nạ trị mụn đầu đen từ Dermalogica n&agrave;y sẽ khiến lũ mụn đầu đen của bạn phải &quot;bốc hơi&quot; nhanh ch&oacute;ng nhờ c&ocirc;ng thức lưu huỳnh v&agrave; đất s&eacute;t l&agrave;m th&ocirc;ng tho&aacute;ng lỗ ch&acirc;n l&ocirc;ng, hấp thụ b&atilde; nhờn, lấy đi mụn đầu đen &quot;kh&oacute; ở&quot;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>4. Mặt nạ drugstore tốt nhất: Burt&#39;s Bees Detoxifying Clay Face Mask (gi&aacute; gốc: 81.000 VNĐ)</strong></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/1/568main-15751925667352042437881.jpg\"><img alt=\"7 hũ mặt nạ xử mụn đầu đen cực kỳ “okelah”: Xem xong bạn sẽ muốn m&amp;#250;c &amp;#237;t nhất một em - Ảnh 4.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/1/568main-15751925667352042437881.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/1/mp-1-157519256674397812149.jpg\"><img alt=\"7 hũ mặt nạ xử mụn đầu đen cực kỳ “okelah”: Xem xong bạn sẽ muốn m&amp;#250;c &amp;#237;t nhất một em - Ảnh 4.\" src=\"https://kenh14cdn.com/thumb_w/660/2019/12/1/mp-1-157519256674397812149.jpg\" /></a></p>\r\n\r\n<p>Chưa cần biết đến chất lượng ra sao nhưng với mức gi&aacute; rẻ &quot;đi&ecirc;n cuồng&quot; thế n&agrave;y, mặt nạ trị mụn đầu đen của Burt&#39;s Bees hẳn đều khiến c&aacute;c n&agrave;ng x&ocirc;n xao muốn thử. Ch&uacute;ng l&agrave; sự kết hợp của than gi&uacute;p l&agrave;m sạch mụn đầu đen v&agrave; dầu acai gi&agrave;u chất chống oxy ho&aacute;, mang đến l&agrave;n da mịn m&agrave;ng, ngậm nước v&agrave; đặc biệt l&agrave; kh&ocirc;ng c&ograve;n mụn đầu đen.</p>\r\n\r\n<p><strong>5. Mặt nạ tốt nhất cho mụn đầu đen v&agrave; mụn trứng c&aacute;: Murad Pore Extractor Pomegranate Mask (gi&aacute; gốc: 902.000 VNĐ)</strong></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/1/bc1e2feac4596354dcd37c9430f6682b-15751925667371375339933.jpg\"><img alt=\"7 hũ mặt nạ “xử” mụn đầu đen okelah phết: Ít nhất bạn cũng phải “múc” liền một em - Ảnh 5.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/1/bc1e2feac4596354dcd37c9430f6682b-15751925667371375339933.jpg\" /></a></p>\r\n\r\n<p>X&eacute;t về mức gi&aacute; th&igrave; đ&acirc;y quả l&agrave; một hũ mặt nạ hi-end, kh&ocirc;ng d&agrave;nh cho nhiều người. D&ugrave; vậy, với những t&iacute;n đồ skincare &quot;chịu chơi&quot; th&igrave; sản phẩm n&agrave;y vẫn lọt v&agrave;o tầm ngắm. Với th&agrave;nh phần đất s&eacute;t từ tro n&uacute;i lửa, &quot;em n&oacute;&quot; gi&uacute;p giải quyết t&igrave;nh trạng tắc nghẽn lỗ ch&acirc;n l&ocirc;ng, cuốn đi mụn đầu đen một c&aacute;ch nhẹ nh&agrave;ng. Ngo&agrave;i ra, chiết xuất hạt lựu gi&uacute;p da s&aacute;ng hơn, lỗ ch&acirc;n l&ocirc;ng se kh&iacute;t, tr&agrave; xanh c&oacute; c&ocirc;ng dụng l&agrave;m sạch da, ph&ugrave; hợp cho những ai c&oacute; l&agrave;n da mụn.</p>\r\n\r\n<p><strong>6. Mặt nạ trị mụn đầu đen tốt nhất cho da kh&ocirc;: Volition Beauty Detoxifying Silt Gelee Mask (gi&aacute; gốc: 1.388.000 VNĐ)</strong></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/1/2a-15465084487231973245912-15751925667331263204181.jpg\" target=\"_blank\"><img alt=\"7 hũ mặt nạ “xử” mụn đầu đen okelah phết: Ít nhất bạn cũng phải “múc” liền một em - Ảnh 6.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/1/2a-15465084487231973245912-15751925667331263204181.jpg\" /></a></p>\r\n\r\n<p>Được giới thiệu l&agrave; loại mặt nạ gi&uacute;p loại bỏ mụn đầu đen nhưng đồng thời cũng cung cấp độ ẩm gi&uacute;p da sạch, mịn mướt, Volition Beauty Detoxifying Silt Gelee Mask hứa hẹn sẽ l&agrave; m&oacute;n skincare đ&aacute;ng sắm cho những t&iacute;n đồ skincare vương giả, đặc biệt l&agrave; những ai c&oacute; l&agrave;n da kh&ocirc;. B&ecirc;n cạnh th&agrave;nh phần b&ugrave;n đen gi&agrave;u chất kho&aacute;ng, em n&agrave;y c&ograve;n c&oacute; th&agrave;nh phần dầu jojoba, dầu squalane củng cố h&agrave;ng r&agrave;o bảo vệ da.</p>\r\n\r\n<p><strong>7. Mặt nạ trị mụn tốt nhất cho da dầu: Skinfood Egg White Pore Mask (gi&aacute; gốc: 243.000 VNĐ)</strong></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/12/1/anh-chup-man-hinh-2019-12-01-luc-163455-15751929061926845568.png\" target=\"_blank\"><img alt=\"7 hũ mặt nạ “xử” mụn đầu đen okelah phết: Ít nhất bạn cũng phải “múc” liền một em - Ảnh 7.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/12/1/anh-chup-man-hinh-2019-12-01-luc-163455-15751929061926845568.png\" /></a></p>\r\n\r\n<p>Sản phẩm trị mụn đầu đen d&agrave;nh ri&ecirc;ng cho da dầu, lỗ ch&acirc;n l&ocirc;ng to ch&iacute;nh l&agrave; Skinfood Egg White Pore Mask. Với chiết xuất từ lofng trắng trứng gi&agrave;u arbutin, th&ecirc;m v&agrave;o đ&oacute; l&agrave; chiết xuất cam thảo, hoa c&uacute;c gi&uacute;p chống vi&ecirc;m, l&agrave;m sạch lỗ ch&acirc;n l&ocirc;ng v&agrave; giảm mụn đầu đen đ&aacute;ng kể. Hũ mặt nạ H&agrave;n Quốc c&ograve;n được giới thiệu l&agrave; l&agrave;m da săn chắc, đ&agrave;n hồi hơn.</p>\r\n\r\n<p><em>Nguồn: Cosmopolitan</em></p>',
    'http://ohuivietnam.tk/userfiles/images/befunky-collage-3-15735744550282034233020-crop-15735744665401949485193.jpg',
    1,
    '2019-12-08 13:15:02',
    '2019-12-11 03:50:32'
),(
    8,
    'Thói quen làm đẹp tai hại của nhiều beauty blogger khiến mỹ phẩm tiền triệu cũng mất hết tác dụng',
    'thoi-quen-lam-dep-tai-hai-cua-nhieu-beauty-blogger-khien-my-pham-tien-trieu-cung-mat-het-tac-dung',
    'Mua mỹ phẩm tiền triệu mà lại mắc phải sai lầm này thì cũng phí hoài.',
    '<p>Nhiều chị em thường c&oacute; th&oacute;i quen để mỹ phẩm như toner, serum, đồ trang điểm hay nước hoa trong ph&ograve;ng tắm v&igrave; tiện dụng, sau khi rửa mặt c&oacute; thể sử dụng lu&ocirc;n. Nhưng thực tế đ&acirc;y lại l&agrave; th&oacute;i quen tai hại khiến sản phẩm nhanh bị biến chất, kh&ocirc;ng c&ograve;n hiệu quả.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/30/photo-1-15751326312832136645130.jpg\" target=\"_blank\"><img alt=\"Thói quen làm đẹp tai hại của nhiều beauty blogger khiến mỹ phẩm tiền triệu cũng mất hết tác dụng - Ảnh 1.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/30/photo-1-15751326312832136645130.jpg\" /></a></p>\r\n\r\n<p>Điều n&agrave;y l&agrave; bởi trong ph&ograve;ng tắm vốn kh&aacute; k&iacute;n hơi, ẩm ướt khiến vi khuẩn c&oacute; điều kiện ph&aacute;t triển mạnh. Ch&iacute;nh v&igrave; lẽ đ&oacute; khi để mỹ phẩm trong nh&agrave; vệ sinh cũng đồng nghĩa với việc bạn đ&atilde; tạo điều kiện để vi khuẩn x&acirc;m nhập v&agrave;o mỹ phẩm dễ d&agrave;ng hơn, khiến sản phẩm kh&ocirc;ng c&ograve;n hiệu quả.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ngo&agrave;i ra, hơi nước n&oacute;ng khi bạn tắm rửa c&agrave;ng gi&uacute;p vi khuẩn sinh s&ocirc;i nảy nở nhanh hơn đồng thời khiến sản phẩm bị biến chất, mất m&ugrave;i hương m&agrave;u sắc v&agrave; giảm chất lượng.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/30/photo-1-1575132634597717949268.jpg\" target=\"_blank\"><img alt=\"Thói quen làm đẹp tai hại của nhiều beauty blogger khiến mỹ phẩm tiền triệu cũng mất hết tác dụng - Ảnh 2.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/30/photo-1-1575132634597717949268.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/30/photo-2-15751326345991654215487.jpg\" target=\"_blank\"><img alt=\"Thói quen làm đẹp tai hại của nhiều beauty blogger khiến mỹ phẩm tiền triệu cũng mất hết tác dụng - Ảnh 3.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/30/photo-2-15751326345991654215487.jpg\" /></a></p>\r\n\r\n<p>Do đ&oacute;, bạn n&ecirc;n bỏ th&oacute;i quen để mỹ phẩm trong nh&agrave; vệ sinh. Th&ocirc;ng thường bạn n&ecirc;n để mỹ phẩm ở nơi kh&ocirc; r&aacute;o, r&acirc;m m&aacute;t tr&aacute;nh &aacute;nh nắng chiếu trực tiếp. Một số c&ocirc; n&agrave;ng c&oacute; điều kiện hơn th&igrave; c&oacute; thể để mỹ phẩm trong tủ lạnh mini gi&uacute;p bảo quản sản phẩm được l&acirc;u hơn; đặc biệt những sản phẩm serum vitamin C, dầu dưỡng, sản phẩm kh&ocirc;ng chứa chất bảo quản th&igrave; c&agrave;ng n&ecirc;n để trong ngăn m&aacute;t tủ lạnh.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/30/photo-3-15751326346021690804027.jpg\" target=\"_blank\"><img alt=\"Thói quen làm đẹp tai hại của nhiều beauty blogger khiến mỹ phẩm tiền triệu cũng mất hết tác dụng - Ảnh 4.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/30/photo-3-15751326346021690804027.jpg\" /></a></p>\r\n\r\n<p>Để mỹ phẩm trong nh&agrave; vệ sinh, cạnh bồn rửa mặt - th&oacute;i quen tai hại m&agrave; nhiều c&ocirc; n&agrave;ng xinh đẹp, s&agrave;nh điệu cũng mắc phải.</p>',
    'http://ohuivietnam.tk/userfiles/images/befunky-collage-2-15733980754561649467456-crop-1573398089690431728210.jpg',
    1,
    '2019-12-08 13:16:31',
    '2019-12-11 03:50:01'
),(
    9,
    '59 tuổi mà da dẻ hồng hào không một nếp nhăn: Bí kíp của bà là mỗi ngày thay một tuýp sữa rửa mặt, có loại chỉ dùng 1 lần/tuần',
    '59-tuoi-ma-da-de-hong-hao-khong-mot-nep-nhan-bi-kip-cua-ba-la-moi-ngay-thay-mot-tuyp-sua-rua-mat-co-loai-chi-dung-1-lantuan',
    'Trong nhà tắm của bà có tới hơn 10 lọ sữa rửa mặt để dùng đan xen nhau và sau đây là một vài sản phẩm nổi bật.',
    '<p>L&agrave;n da trắng hồng tươi trẻ lu&ocirc;n l&agrave; niềm ước ao của chị em phụ nữ. Nhất l&agrave; với những người đ&atilde; bước v&agrave;o tuổi l&atilde;o h&oacute;a. Thường th&igrave; chỉ cần bước qua tuổi 30 l&agrave; l&agrave;n da của bạn đ&atilde; xuất hiện nếp nhăn, vết ch&acirc;n chim đu&ocirc;i mắt, kh&oacute;e miệng... hay bắt đầu c&oacute; những dấu vết th&acirc;m n&aacute;m; thế nhưng khi ngắm nh&igrave;n l&agrave;n da của b&agrave; Lily th&igrave; ai nấy đều phải ngỡ ng&agrave;ng.</p>\r\n\r\n<p>Năm nay b&agrave; đ&atilde; 59 tuổi - độ tuổi m&agrave; l&agrave;n da sẽ chảy xệ, nhăn nheo nhưng kh&ocirc;ng hề, l&agrave;n da của b&agrave; hồng h&agrave;o tươi trẻ đến bất ngờ. V&agrave; nếu kh&ocirc;ng n&oacute;i th&igrave; chắc chắn nh&igrave;n l&agrave;n da n&agrave;y kh&ocirc;ng ai c&oacute; thể đo&aacute;n ch&iacute;nh x&aacute;c độ tuổi thực tế của b&agrave;.</p>\r\n\r\n<p>B&agrave; Lily c&oacute; một k&ecirc;nh Youtube ri&ecirc;ng l&agrave; Gadgetlily với gần 100 ngh&igrave;n người theo d&otilde;i, ngo&agrave;i chia sẻ cuộc sống h&agrave;ng ng&agrave;y của m&igrave;nh th&igrave; b&agrave; c&ograve;n chia sẻ b&iacute; quyết chăm s&oacute;c da. D&ugrave; đ&atilde; v&agrave;o tuổi lục tuần nhưng b&agrave; Lily vẫn chăm ch&uacute;t l&agrave;n da cẩn thận tỉ mẩn từng bước một, v&agrave; với b&agrave; bước skin care quyết định độ mịn m&agrave;ng tươi trẻ cho l&agrave;n da ch&iacute;nh l&agrave; bước l&agrave;m sạch da mỗi ng&agrave;y.</p>\r\n\r\n<p><strong>GIF</strong>.</p>\r\n\r\n<p>Cận cảnh l&agrave;n da căng mịn ở tuổi 59 của b&agrave; Lily.</p>\r\n\r\n<p><strong>Mỗi ng&agrave;y thay một loại sữa rửa mặt, kh&ocirc;ng ngại thử nghiệm c&aacute;c d&ograve;ng l&agrave;m sạch mới</strong></p>\r\n\r\n<p>Nhiều người thường ngại việc thay đổi c&aacute;c d&ograve;ng mỹ phẩm skincare cho m&igrave;nh v&igrave; sợ k&iacute;ch ứng da nhưng theo như Lily, sữa rửa mặt l&agrave;m sạch v&agrave; cũng kh&ocirc;ng đọng lại tr&ecirc;n da qu&aacute; l&acirc;u n&ecirc;n bạn ho&agrave;n to&agrave;n c&oacute; thể thay đổi nhiều sản phẩm kh&aacute;c nhau. Thậm ch&iacute; b&agrave; c&ograve;n thay đổi sửa rửa mặt mỗi ng&agrave;y. Trong nh&agrave; tắm của b&agrave; c&oacute; tới 10 lọ sữa rửa mặt d&ugrave;ng đan xen nhau, nhưng trong đoạn clip n&agrave;y b&agrave; chỉ chia sẻ một v&agrave;i sản phẩm m&agrave; b&agrave; y&ecirc;u th&iacute;ch nhất.</p>\r\n\r\n<p><strong>GIF</strong>.</p>\r\n\r\n<p><strong>D&ugrave;ng đến hơn chục loại sữa rửa mặt v&agrave; đ&acirc;y l&agrave; những d&ograve;ng b&agrave; ưng &yacute; nhất</strong></p>\r\n\r\n<p><strong><em>* Perfect Whip Forming Cleanser Senka (khaorng 100.000 VNĐ)</em></strong></p>\r\n\r\n<p>Hai tu&yacute;p sữa rửa mặt m&agrave;u xanh v&agrave; hồng của Perfect Whip Senka l&agrave; hai sản phẩm chủ lực của t&ocirc;i.&nbsp;<em>&quot;T&ocirc;i d&ugrave;ng sản phẩm n&agrave;y thường xuy&ecirc;n nhất trong tất cả c&aacute;c sản phẩm l&agrave;m sạch từng thử nghiệm. C&aacute;c bạn c&oacute; thể t&igrave;m mua tại tất cả c&aacute;c si&ecirc;u thị b&igrave;nh d&acirc;n của Nhật&quot;</em>&nbsp;- b&agrave; chia sẻ.</p>\r\n\r\n<p>Gi&aacute; cả b&igrave;nh d&acirc;n m&agrave; hiệu quả l&agrave;m sạch th&igrave; tối ưu, thậm ch&iacute; sản phẩm c&ograve;n hợp cả với những l&agrave;n da nhạy cảm nhất. Tu&yacute;p m&agrave;u xanh th&igrave; dưỡng trắng da, trong khi m&agrave;u hồng th&ecirc;m collagen chống l&atilde;o h&oacute;a, cả hai đều c&oacute; chất kem l&ecirc;n nhiều bọt, khi d&ugrave;ng cảm gi&aacute;c l&agrave;n da mềm mịn hơn hẳn b&igrave;nh thường.</p>\r\n\r\n<p><strong>GIF</strong>.</p>\r\n\r\n<p>Ph&aacute;i đẹp Nhật thường tin d&ugrave;ng những sản phẩm sữa rửa mặt tạo bọt, đ&aacute;nh đều bọt trước rồi mới thoa l&ecirc;n mặt để hạn chế sự tiếp x&uacute;c của b&agrave;n tay l&ecirc;n da mỗi khi rửa mặt.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/29/photo-3-15750142856641033078113.jpg\" target=\"_blank\"><img alt=\"59 tuổi mà da dẻ hồng hào không một nếp nhăn: Bí kíp của bà là mỗi ngày thay một tuýp sữa rửa mặt, có loại chỉ dùng 1 lần/tuần - Ảnh 4.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/29/photo-3-15750142856641033078113.jpg\" /></a></p>\r\n\r\n<p>Shiseido Fitit Perfect Whip Cleansing Foam.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/29/photo-4-15750142856732146808765.png\" target=\"_blank\"><img alt=\"59 tuổi mà da dẻ hồng hào không một nếp nhăn: Bí kíp của bà là mỗi ngày thay một tuýp sữa rửa mặt, có loại chỉ dùng 1 lần/tuần - Ảnh 5.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/29/photo-4-15750142856732146808765.png\" /></a></p>\r\n\r\n<p>Perfect Whip with Collagen Foaming Cleanser Pink.</p>\r\n\r\n<p><em><strong>* Sulwhasoo Gentle Cleansing (khoảng 1,5 triệu đồng)</strong></em></p>\r\n\r\n<p><em>&quot;Với những bạn g&aacute;i c&ograve;n trẻ v&agrave; thường xuy&ecirc;n trang điểm th&igrave; n&ecirc;n l&agrave;m sạch k&eacute;p với bước d&ugrave;ng dầu tẩy trang v&agrave; sữa rửa mặt, nhưng với l&agrave;n da đ&atilde; ở tuổi 59 của t&ocirc;i, chỉ khi n&agrave;o t&ocirc;i trang điểm nhiều th&igrave; mới l&agrave;m sạch k&eacute;p. V&agrave; bộ đ&ocirc;i m&agrave; t&ocirc;i chọn để l&agrave;m sạch da những l&uacute;c thế n&agrave;y l&agrave; cặp sữa rửa mặt v&agrave; dầu tẩy trang&nbsp;Sulwhasoo Gentle Cleansing&quot;</em>. - b&agrave; Lily chia sẻ.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/29/photo-5-15750142856782043834873.jpg\" target=\"_blank\"><img alt=\"59 tuổi mà da dẻ hồng hào không một nếp nhăn: Bí kíp của bà là mỗi ngày thay một tuýp sữa rửa mặt, có loại chỉ dùng 1 lần/tuần - Ảnh 6.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/29/photo-5-15750142856782043834873.jpg\" /></a></p>\r\n\r\n<p>Sulwhasoo Gentle Cleansing Oil chiết xuất thảo mộc tự nhi&ecirc;n n&ecirc;n hương thơm cũng dịu nhẹ, hiệu quả tẩy trang kh&aacute; sạch, d&ugrave;ng được cả với v&ugrave;ng da quanh mắt m&agrave; kh&ocirc;ng c&oacute; cảm gi&aacute;c bị x&oacute;t.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/29/photo-6-15750142856841434679996.jpg\" target=\"_blank\"><img alt=\"59 tuổi mà da dẻ hồng hào không một nếp nhăn: Bí kíp của bà là mỗi ngày thay một tuýp sữa rửa mặt, có loại chỉ dùng 1 lần/tuần - Ảnh 7.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/29/photo-6-15750142856841434679996.jpg\" /></a></p>\r\n\r\n<p>Sản phẩm Sulwhasoo Gentle Cleansing Foam gi&uacute;p l&agrave;n da sạch s&acirc;u, căng mướt m&agrave; kh&ocirc;ng hề bị kh&ocirc; sau bước l&agrave;m sạch.</p>\r\n\r\n<p><strong><em>*&nbsp;Shiseido White Lucent Foam Cleanser (khoảng 1 triệu đồng)</em></strong></p>\r\n\r\n<p>&quot;<em>Thật sự th&igrave; sữa rửa mặt sẽ kh&ocirc;ng ở tr&ecirc;n da qu&aacute; l&acirc;u n&ecirc;n hiệu quả l&agrave;m trắng chắc kh&ocirc;ng mấy r&otilde; r&agrave;ng nhưng t&ocirc;i rất th&iacute;ch cảm gi&aacute;c kh&ocirc; tho&aacute;ng, m&aacute;t l&agrave;nh của d&ograve;ng sữa rửa mặt n&agrave;y. Bọt l&ecirc;n d&agrave;y v&agrave; đặc n&ecirc;n c&oacute; thể l&agrave;m sạch tỉ mỉ từng lỗ ch&acirc;n l&ocirc;ng tr&ecirc;n mặt</em>&quot;.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/29/photo-7-15750142856892048011120.jpg\" target=\"_blank\"><img alt=\"59 tuổi mà da dẻ hồng hào không một nếp nhăn: Bí kíp của bà là mỗi ngày thay một tuýp sữa rửa mặt, có loại chỉ dùng 1 lần/tuần - Ảnh 8.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/29/photo-7-15750142856892048011120.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/29/photo-8-15750142856941305529900.jpg\" target=\"_blank\"><img alt=\"59 tuổi mà da dẻ hồng hào không một nếp nhăn: Bí kíp của bà là mỗi ngày thay một tuýp sữa rửa mặt, có loại chỉ dùng 1 lần/tuần - Ảnh 9.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/29/photo-8-15750142856941305529900.jpg\" /></a></p>\r\n\r\n<p><em><strong>* Murad Age-Reform AHA/BHA Exfoliating Cleanser (khoảng 2,1 triệu đồng)</strong></em></p>\r\n\r\n<p><em>&quot;Kh&ocirc;ng thể thiếu trong c&ocirc;ng đoạn l&agrave;m sạch da mặt của t&ocirc;i, đ&oacute; l&agrave; sữa rửa mặt ki&ecirc;m tẩy da chết với th&agrave;nh phần AHA/ BHA của Murad. Sản phẩm vừa l&agrave;m sạch bụi bẩn, vừa tẩy da chết nhẹ nh&agrave;ng k&iacute;ch th&iacute;ch tế b&agrave;o mới ph&aacute;t triển nhưng t&ocirc;i kh&ocirc;ng d&ugrave;ng thường xuy&ecirc;n m&agrave; một tuần d&ugrave;ng 1-2 lần đan xen c&ugrave;ng c&aacute;c d&ograve;ng l&agrave;m sạch kh&aacute;c&quot;</em>.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/29/photo-9-1575014285701174022360.jpg\" target=\"_blank\"><img alt=\"59 tuổi mà da dẻ hồng hào không một nếp nhăn: Bí kíp của bà là mỗi ngày thay một tuýp sữa rửa mặt, có loại chỉ dùng 1 lần/tuần - Ảnh 10.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/29/photo-9-1575014285701174022360.jpg\" /></a></p>\r\n\r\n<p>Murad Age-Reform AHA/BHA Exfoliating Cleanser c&oacute; hạt jojoba n&ecirc;n ngay cả khi d&ugrave;ng cho l&agrave;n da l&atilde;o h&oacute;a tuổi 59 vẫn rất nhẹ nh&agrave;ng, mềm mại chứ kh&ocirc;ng đỏ r&aacute;t như nhiều d&ograve;ng tẩy da chết kh&aacute;c.</p>\r\n\r\n<p><strong><em>* Kanebo Suisai Beauty Clear Powder (khoảng 450.000 VNĐ)</em></strong></p>\r\n\r\n<p><em>&quot;Ngo&agrave;i những d&ograve;ng sữa rửa mặt ở tr&ecirc;n th&igrave; t&ocirc;i cũng d&ugrave;ng bột rửa mặt Kanebo Suisai Beauty Clear Powder. Ch&uacute;ng l&agrave; bột rửa mặt n&ecirc;n c&oacute; thể l&agrave;m sạch s&acirc;u m&agrave; rất an to&agrave;n cho da nhờ chiết xuất từ c&aacute;m gạo. Sản phẩm c&ograve;n c&oacute; khả năng kiềm dầu cho da, nhưng với l&agrave;n da tuổi 59 của t&ocirc;i th&igrave; t&ocirc;i chỉ d&ugrave;ng 1 lần th&ocirc;i bởi da th&ocirc;i kh&ocirc;ng tiết nhiều dầu như thời c&ograve;n trẻ nữa. Nếu bạn g&aacute;i n&agrave;o da dầu th&igrave; sản phẩm n&agrave;y rất hợp&quot;</em>.</p>\r\n\r\n<p><strong>GIF</strong>.</p>\r\n\r\n<p><strong><em>*&nbsp;Momo Uru Hada Peach Powder Face Wash (khoảng 200.000 VNĐ)</em></strong></p>\r\n\r\n<p><strong>GIF</strong>.</p>\r\n\r\n<p>Sản phẩm n&agrave;y cũng tương tự nhưng chiết xuất tinh dầu hoa hồng gi&uacute;p da trắng mịn hơn. Bột rửa mặt của Momo Uru Hada c&ograve;n gi&uacute;p loại bỏ mụn đầu đen tr&ecirc;n mũi kh&aacute; hiệu quả.</p>',
    'http://ohuivietnam.tk/userfiles/images/4.jpg',
    1,
    '2019-12-08 13:18:33',
    '2019-12-11 03:46:08'
),(
    10,
    'Đừng nói ai biết 3 cách dùng kem dưỡng ẩm sau, bởi da bạn sẽ mọng mướt long lanh hơn người ta gấp 10 lần nếu áp dụng',
    'dung-noi-ai-biet-3-cach-dung-kem-duong-am-sau-boi-da-ban-se-mong-muot-long-lanh-hon-nguoi-ta-gap-10-lan-neu-ap-dung',
    'Mùa đông, muốn da đẹp bất chấp thì phải xài chiêu khi dùng kem dưỡng ẩm thôi các nàng ạ!',
    '<p>C&oacute; thể n&oacute;i rằng v&agrave;o m&ugrave;a đ&ocirc;ng, da đẹp v&agrave; mướt m&aacute;t hay kh&ocirc;ng phụ thuộc rất nhiều v&agrave;o bước dưỡng ẩm. Tuy nhi&ecirc;n đối với nhiều n&agrave;ng, chỉ thoa kem dưỡng đ&ocirc;i khi chẳng mang đến kết quả như mong muốn. V&agrave; nếu cũng dưỡng ẩm chăm chỉ nhưng da kh&ocirc;ng đẹp căng, lấp l&aacute;nh hơn người ta, bạn h&atilde;y ghim 3 c&aacute;ch b&ocirc;i kem dưỡng dưới đ&acirc;y; đảm bảo, l&agrave;n da mướt m&aacute;t sẽ nằm trong tầm tay.</p>\r\n\r\n<p><strong>1. B&ocirc;i chồng 2 loại kem dưỡng ẩm</strong></p>\r\n\r\n<p>Chỉ cần bạn l&agrave;m đ&uacute;ng c&aacute;ch, sự kết hợp của 2 loại kem dưỡng sẽ cung cấp độ ẩm cực kỳ lợi hại cho l&agrave;n da. Cụ thể l&agrave; thế n&agrave;y, bạn h&atilde;y thoa một lớp kem dưỡng c&oacute; kết cấu mỏng nhẹ (n&ecirc;n tận dụng lu&ocirc;n lọ kem dưỡng d&ugrave;ng cho m&ugrave;a h&egrave;), sau đ&oacute; b&ocirc;i chồng một lớp kem dưỡng đậm đặc hơn. Như thế, l&agrave;n da sẽ được thẩm thấu trọn vẹn tinh hoa của hai lọ kem dưỡng, từ đ&oacute; da th&ecirc;m khỏe v&agrave; ẩm mọng suốt cả ng&agrave;y d&agrave;i. Tuyệt chi&ecirc;u n&agrave;y sẽ l&agrave; cứu c&aacute;nh tuyệt vời cho những n&agrave;ng da kh&ocirc;.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/28/photo-1-1574948186771505026081.jpg\" target=\"_blank\"><img alt=\"Đừng nói ai biết 3 cách dùng kem dưỡng ẩm sau, bởi da bạn sẽ mọng mướt long lanh hơn người ta gấp 10 lần nếu áp dụng - Ảnh 1.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/28/photo-1-1574948186771505026081.jpg\" /></a></p>\r\n\r\n<p><strong>2. D&ugrave;ng th&ecirc;m essence v&agrave; serum trước kem dưỡng</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>V&agrave;o m&ugrave;a đ&ocirc;ng, một trong những si&ecirc;u b&iacute; k&iacute;p g&aacute;i H&agrave;n hay &aacute;p dụng để c&oacute; được l&agrave;n da căng mọng như phủ mật ong, ch&iacute;nh l&agrave; b&ocirc;i chồng nhiều lớp sản phẩm kh&aacute;c nhau.</p>\r\n\r\n<p>Sau khi đ&atilde; l&agrave;m sạch ho&agrave;n hảo rồi thoa toner để dưỡng ẩm v&agrave; c&acirc;n bằng da cấp tốc, bạn h&atilde;y thoa th&ecirc;m một lớp essence, sau đ&oacute; đến serum v&agrave; kết lại bằng kem dưỡng. Sự kết hợp của nhiều lớp skincare từ mỏng đến d&agrave;y sẽ cung cấp độ ẩm dồi d&agrave;o hơn cho l&agrave;n da, đồng thời tạo một lớp h&agrave;ng r&agrave;o để da duy tr&igrave; được vẻ căng mọng, mướt m&aacute;t như tr&aacute;i ch&iacute;n được l&acirc;u hơn.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2019/11/28/photo-1-1574948190744559326207.jpg\" target=\"_blank\"><img alt=\"Đừng nói ai biết 3 cách dùng kem dưỡng ẩm sau, bởi da bạn sẽ mọng mướt long lanh hơn người ta gấp 10 lần nếu áp dụng - Ảnh 2.\" src=\"https://kenh14cdn.com/thumb_w/620/2019/11/28/photo-1-1574948190744559326207.jpg\" /></a></p>\r\n\r\n<p><strong>3. Mix serum vitamin C với kem dưỡng</strong></p>\r\n\r\n<p>Vitamin C rất hữu dụng trong khoản l&agrave;m mịn l&agrave;n da sần s&ugrave;i, bong tr&oacute;c, đồng thời n&acirc;ng da s&aacute;ng hồng, rạng rỡ th&ecirc;m v&agrave;i t&ocirc;ng. Trong khi đ&oacute;, th&agrave;nh phần Hyaluronic Acid nổi tiếng với khả năng cấp ẩm, bơm căng l&agrave;n da. V&agrave; khi kết hợp serum vitamin C với kem dưỡng chứa Hyaluronic Acid, bạn sẽ phải bất ngờ với l&agrave;n da mềm mịn, căng mướt v&agrave; &oacute;ng ả như lụa của m&igrave;nh. Bật m&iacute; th&ecirc;m, bộ đ&ocirc;i n&agrave;y c&ograve;n chống l&atilde;o h&oacute;a cực tốt bởi vitamin C c&oacute; khả năng ngăn chặn sự tấn c&ocirc;ng của gốc tự do, c&ograve;n HA th&igrave; gi&uacute;p da th&ecirc;m săn khỏe, khiến c&aacute;c nếp nhăn bị lu mờ.</p>',
    'http://ohuivietnam.tk/userfiles/images/1(1).jpg',
    1,
    '2019-12-08 13:25:28',
    '2019-12-11 03:48:45'
);
/*!40000
ALTER TABLE
    `posts` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `product_attribute`
    --

LOCK TABLES
    `product_attribute` WRITE;
    /*!40000
ALTER TABLE
    `product_attribute` DISABLE KEYS */;
INSERT INTO `product_attribute`
VALUES(
    1,
    NULL,
    1,
    1,
    3,
    1,
    200000.00,
    189999.00,
    NULL,
    '2019-11-20 14:41:34',
    NULL
),(
    2,
    NULL,
    1,
    1,
    4,
    1,
    400000.00,
    370000.00,
    NULL,
    '2019-11-20 14:41:34',
    NULL
),(
    3,
    NULL,
    3,
    2,
    1,
    1,
    30000.00,
    20000.00,
    NULL,
    '2019-11-20 14:51:09',
    NULL
),(
    4,
    NULL,
    3,
    2,
    2,
    1,
    500000.00,
    400000.00,
    NULL,
    '2019-11-20 14:51:09',
    NULL
);
/*!40000
ALTER TABLE
    `product_attribute` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `product_category`
    --

LOCK TABLES
    `product_category` WRITE;
    /*!40000
ALTER TABLE
    `product_category` DISABLE KEYS */;
INSERT INTO `product_category`
VALUES(1, 1, 2, NULL, NULL),(2, 3, 2, NULL, NULL),(16, 17, 2, NULL, NULL),(17, 18, 5, NULL, NULL),(18, 19, 4, NULL, NULL),(19, 19, 8, NULL, NULL),(20, 20, 4, NULL, NULL),(21, 20, 6, NULL, NULL),(24, 23, 4, NULL, NULL),(25, 23, 6, NULL, NULL),(26, 24, 4, NULL, NULL),(27, 24, 6, NULL, NULL),(28, 25, 5, NULL, NULL),(29, 26, 5, NULL, NULL),(30, 27, 5, NULL, NULL),(31, 28, 5, NULL, NULL),(32, 29, 7, NULL, NULL),(33, 30, 7, NULL, NULL),(34, 31, 7, NULL, NULL),(35, 32, 8, NULL, NULL),(36, 33, 8, NULL, NULL),(37, 34, 8, NULL, NULL),(38, 35, 8, NULL, NULL),(39, 36, 8, NULL, NULL),(40, 37, 8, NULL, NULL),(41, 38, 6, NULL, NULL),(42, 39, 6, NULL, NULL),(44, 41, 6, NULL, NULL),(45, 42, 6, NULL, NULL),(46, 43, 6, NULL, NULL),(47, 44, 4, NULL, NULL),(48, 44, 6, NULL, NULL),(49, 45, 2, NULL, NULL),(50, 45, 6, NULL, NULL),(51, 46, 6, NULL, NULL),(52, 47, 6, NULL, NULL);
/*!40000
ALTER TABLE
    `product_category` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `products`
    --

LOCK TABLES
    `products` WRITE;
    /*!40000
ALTER TABLE
    `products` DISABLE KEYS */;
INSERT INTO `products`
VALUES(
    1,
    'Combo 20 gói Kem dưỡng trắng & 20 gói Tinh chất dưỡng trắng Ohui Extreme White',
    'combo-20-goi-kem-duong-trang-20-goi-tinh-chat-duong-trang-ohui-extreme-white',
    '/userfiles/images/Combo-20-g%C3%B3i-Kem-d%C6%B0%E1%BB%A1ng-tr%E1%BA%AFng-20-g%C3%B3i-Tinh-ch%E1%BA%A5t-d%C6%B0%E1%BB%A1ng-tr%E1%BA%AFng-Ohui-Extreme-White.png',
    -1,
    '<h2>M&ocirc; tả</h2>\n\n<p><strong>Kem dưỡng trắng da Ohui Extreme White Cream​</strong></p>\n\n<p>Kem dưỡng trắng với th&agrave;nh phần Snow Vitamin được chiết xuất c&ocirc; đặc, dưỡng trắng, s&aacute;ng da từ b&ecirc;n trong, cho thấy hiệu quả kh&aacute;c biệt từng ng&agrave;y.</p>\n\n<p>Ohui Extreme White Cream chứa th&agrave;nh phần chiết xuất từ Hoa thủy ti&ecirc;n trắng c&oacute; t&aacute;c dụng dưỡng trắng, trị n&aacute;m, t&agrave;n nhang, l&agrave;m mờ c&aacute;c sắc tố da sạm m&agrave;u.</p>\n\n<p><strong>Tinh chất dưỡng trắng da Ohui Extreme White Serum​</strong></p>\n\n<p>Tinh chất dưỡng trắng da v&agrave; chống l&atilde;o h&oacute;a. Ohui Extreme White Serum Snow vitamin. L&agrave; d&ograve;ng sản phẩm l&agrave;m trắng da kh&ocirc;ng g&acirc;y k&iacute;ch ứng gi&uacute;p cải thiện l&agrave;n da tối m&agrave;u trở n&ecirc;n s&aacute;ng trong.</p>\n\n<p>Tinh chất dưỡng trắng OHUI Snow Whitening Vitamins được chiết xuất c&ocirc; đặc v&agrave; chống l&atilde;o h&oacute;a cho da, l&agrave; th&agrave;nh phần ch&iacute;nh gi&uacute;p da trắng tự nhi&ecirc;n. Thẩm thấu s&acirc;u b&ecirc;n trong cho l&agrave;n da trắng s&aacute;ng rạng rỡ.</p>\n\n<p>Sản phẩm mới OHUI Extreme White Snow Vitamin chứa th&agrave;nh phần Vitamin nấm tuyết h&agrave;m lượng cao, hấp thụ nhanh ch&oacute;ng, dưỡng trắng, trị n&aacute;m v&agrave; ngăn l&atilde;o h&oacute;a, gi&uacute;p bạn t&igrave;m lại l&agrave;n da trắng s&aacute;ng trẻ trung rạng ngời.</p>',
    NULL,
    380000.00,
    290000.00,
    1,
    '2019-11-20 14:41:34',
    '2019-11-20 14:41:34'
),(
    3,
    'Sản phẩm mới OHUI Extreme White Snow Vitamin01',
    'san-pham-moi-ohui-extreme-white-snow-vitamin01',
    '/userfiles/images/set-dau-goi-xa-ohui-min.jpg',
    -1,
    '<h2>M&ocirc; tả</h2>\n\n<p>Set dầu gội v&agrave; dầu xả Ohui Clear Science Hair Care gi&uacute;p nu&ocirc;i dưỡng t&oacute;c chắc khỏe &oacute;ng mượt, phục hồi sự mượt m&agrave; cho t&oacute;c kh&ocirc;, dầu gội Ohui gi&uacute;p giữ nếp t&oacute;c uống v&agrave; dưỡng t&oacute;c nhuộm, nu&ocirc;i dưỡng t&oacute;c từ ch&acirc;n đến ngọn, cho t&oacute;c chắc khỏe v&agrave; ngăn rụng t&oacute;c.</p>\n\n<p>Set gồm</p>\n\n<ul>\n	<li>Dầu gội Ohui Shampoo 400ml + 20ml:&nbsp;Dầu gội l&agrave;m sạch g&agrave;u nu&ocirc;i dưỡng t&oacute;c chắc khỏe, gi&uacute;p chăm s&oacute;c, cải thiện m&aacute;i t&oacute;c v&agrave; da đầu bị tổn thương với c&ocirc;ng thức mang t&iacute;nh axit yếu. Đồng thời, sản phẩm gi&uacute;p duy tr&igrave; m&agrave;u sắc l&acirc;u v&agrave; giảm thiểu tối đa sự bay m&agrave;u sau khi nhuộm, gi&uacute;p cải thiện độ b&oacute;ng cho t&oacute;c hư tổn.</li>\n	<li>Dầu xả Ohui Conditioner 400ml + 20ml:&nbsp;Dầu xả gi&uacute;p t&oacute;c mềm su&ocirc;n mượt, phục hồi t&oacute;c yếu tổn thương, cải thiện độ b&oacute;ng mượt cho t&oacute;c, gi&uacute;p t&oacute;c kh&ocirc; v&agrave; dễ g&atilde;y trở l&ecirc;n mềm mượt hơn.</li>\n</ul>',
    NULL,
    1000000.00,
    900000.00,
    1,
    '2019-11-20 14:51:09',
    '2019-11-20 14:51:09'
),(
    17,
    'Set Dầu Gội Và Dầu Xả Ohui Clear Science Hair Care Special Set 400ml',
    'set-dau-goi-va-dau-xa-ohui-clear-science-hair-care-special-set-400ml',
    '/userfiles/images/set-dau-goi-xa-ohui-min(1).jpg',
    1,
    '<p>Set dầu gội v&agrave; dầu xả Ohui Clear Science Hair Care gi&uacute;p nu&ocirc;i dưỡng t&oacute;c chắc khỏe &oacute;ng mượt, phục hồi sự mượt m&agrave; cho t&oacute;c kh&ocirc;, dầu gội Ohui gi&uacute;p giữ nếp t&oacute;c uống v&agrave; dưỡng t&oacute;c nhuộm, nu&ocirc;i dưỡng t&oacute;c từ ch&acirc;n đến ngọn, cho t&oacute;c chắc khỏe v&agrave; ngăn rụng t&oacute;c.</p>',
    '<p>Set dầu gội v&agrave; dầu xả Ohui Clear Science Hair Care gi&uacute;p nu&ocirc;i dưỡng t&oacute;c chắc khỏe &oacute;ng mượt, phục hồi sự mượt m&agrave; cho t&oacute;c kh&ocirc;, dầu gội Ohui gi&uacute;p giữ nếp t&oacute;c uống v&agrave; dưỡng t&oacute;c nhuộm, nu&ocirc;i dưỡng t&oacute;c từ ch&acirc;n đến ngọn, cho t&oacute;c chắc khỏe v&agrave; ngăn rụng t&oacute;c.</p>\n\n<p><strong>Set gồm</strong></p>\n\n<p>Dầu gội Ohui Shampoo 400ml + 20ml:&nbsp;Dầu gội l&agrave;m sạch g&agrave;u nu&ocirc;i dưỡng t&oacute;c chắc khỏe, gi&uacute;p chăm s&oacute;c, cải thiện m&aacute;i t&oacute;c v&agrave; da đầu bị tổn thương với c&ocirc;ng thức mang t&iacute;nh axit yếu. Đồng thời, sản phẩm gi&uacute;p duy tr&igrave; m&agrave;u sắc l&acirc;u v&agrave; giảm thiểu tối đa sự bay m&agrave;u sau khi nhuộm, gi&uacute;p cải thiện độ b&oacute;ng cho t&oacute;c hư tổn.</p>\n\n<p>Dầu xả Ohui Conditioner 400ml + 20ml:&nbsp;Dầu xả gi&uacute;p t&oacute;c mềm su&ocirc;n mượt, phục hồi t&oacute;c yếu tổn thương, cải thiện độ b&oacute;ng mượt cho t&oacute;c, gi&uacute;p t&oacute;c kh&ocirc; v&agrave; dễ g&atilde;y trở l&ecirc;n mềm mượt hơn.</p>',
    950.00,
    NULL,
    1,
    '2019-12-08 12:23:05',
    '2019-12-08 12:23:05'
),(
    18,
    'Kem Massage Tạo Độ Ẩm Ohui Tender Massage Cream 230ml',
    'kem-massage-tao-do-am-ohui-tender-massage-cream-230ml',
    '/userfiles/images/Ohui-Tender-Massage-Cream.png',
    1,
    '<p>Mang đến hiệu quả l&agrave;m sạch s&acirc;u, dễ d&agrave;ng ngay khi thoa kem l&ecirc;n da. Gi&uacute;p loại bỏ lớp trang điểm cứng đầu, bụi bẩn v&agrave; b&atilde; nhờn t&iacute;ch tụ tr&ecirc;n da m&agrave; kh&ocirc;ng g&acirc;y k&iacute;ch ứng da</p>',
    '<p>M&ocirc; tả</p>\n\n<p>Chi tiết kem massage tạo độ ẩm cho da Ohui Tender Masage Cream<br />\nCung cấp độ ẩm, dinh dưỡng v&agrave; sinh kh&iacute; cho l&agrave;n da. Sản phẩm massage gi&uacute;p tăng cường lưu th&ocirc;ng v&agrave; tuần ho&agrave;n m&aacute;u, oxy tr&ecirc;n da, gi&uacute;p loại bỏ lớp tế b&agrave;o chết v&agrave; b&atilde; nhờn, tăng hiệu quả hấp thụ dinh dưỡng. Ngăn ngừa nếp nhăn, Chống l&atilde;o h&oacute;a da. L&agrave;m s&aacute;ng mịn, trẻ h&oacute;a l&agrave;n da. Th&uacute;c đẩy qu&aacute; tr&igrave;nh sản sinh Collagen &amp;amp; Elastin tăng độ đ&agrave;n hồi cho da.<br />\nC&ocirc;ng dụng</p>\n\n<p>Mang đến một l&agrave;n da khỏe mạnh v&agrave; đầy sinh kh&iacute;.</p>\n\n<p>Đem lại cảm gi&aacute;c sạch m&aacute;t, với th&agrave;nh phần nước mơ cho hiệu quả l&agrave;m sạch sừng gi&agrave;, loại bỏ l&oacute;p sừng v&agrave; ổn định chu kỳ da.<br />\nSự kh&aacute;c biệt ngay lần đầu ti&ecirc;n sử dụng cảm gi&aacute;c mềm mại như tơ khi tiếp x&uacute;c với da.<br />\nChiết xuất từ ba loại thảo mộc l&agrave; nước hoa b&aacute;ch hợp, nước hoa c&uacute;c v&agrave; nước mơ.<br />\nD&ograve;ng Sản phẩm l&agrave;m sạch với th&agrave;nh phần Endorpin thật vực giải tỏa mệt mỏi t&iacute;ch tụ trong ng&agrave;y<br />\nBạn sẽ cảm nhận được hiệu quả mịn m&agrave;ng nhờ dầu Oliu c&ugrave;ng hiệu quả l&agrave;m sạch tận sau s&acirc;u trong da một c&aacute;ch thuần khiết.<br />\n<br />\nC&aacute;ch sử dụng<br />\n<br />\nSử dụng 1 &ndash; 2 lần một tuần. Sau khi đ&atilde; massage vừa đủ rồi d&ugrave;ng khăn giấy lau nhẹ.<br />\nBuổi tối sau khi rửa mặt v&agrave; chỉnh đốn nếp da bằng nước hoa hồng, lấy 1 lượng khoảng bằng quả nho thoa đều l&ecirc;n to&agrave;n mặt, massage nhẹ nh&agrave;ng từ v&ugrave;ng giữa mặt ra ngo&agrave;i từ 3 &ndash; 5 ph&uacute;t.<br />\nTác dụng có th&ecirc;̉ thay đ&ocirc;̉i tùy theo tình trạng cơ địa của m&ocirc;̃i người.</p>',
    740.00,
    NULL,
    1,
    '2019-12-08 13:06:46',
    '2019-12-08 13:06:46'
),(
    19,
    'Bảng Son Ohui Đặc Biệt 10 Màu Tươi Tắn, Trẻ Trung, Thời Trang',
    'bang-son-ohui-dac-biet-10-mau-tuoi-tan-tre-trung-thoi-trang',
    '/userfiles/images/bang-son-ohui-dac-biet-10-mau-tuoi-moi-tre-trung-thoi-trang.png',
    1,
    '<p>Bảng son với 10 m&agrave;u c&oacute; độ chống l&atilde;o h&oacute;a cao với hiệu quả bảo vệ v&agrave; bổ sung độ ẩm cho đ&ocirc;i m&ocirc;i dễ bị kh&ocirc; trong suốt cả ng&agrave;y, gi&uacute;p thể hiện m&agrave;u sắc đ&ocirc;i m&ocirc;i b&oacute;ng mượt tự nhi&ecirc;n.</p>',
    '<p>Bảng Son Ohui Đặc Biệt 10 M&agrave;u Tươi Tắn, Trẻ Trung, Thời Trang</p>\n\n<p>Bảng son với 10 m&agrave;u c&oacute; độ chống l&atilde;o h&oacute;a cao với hiệu quả bảo vệ v&agrave; bổ sung độ ẩm cho đ&ocirc;i m&ocirc;i dễ bị kh&ocirc; trong suốt cả ng&agrave;y, gi&uacute;p thể hiện m&agrave;u sắc đ&ocirc;i m&ocirc;i b&oacute;ng mượt tự nhi&ecirc;n. Son thiết kế m&agrave;u sắc tươi mới v&agrave; cấu tr&uacute;c dưỡng ẩm cho cảm gi&aacute;c mềm mượt, quyến rũ. Bảng son với những gam m&agrave;u v&agrave; xu hướng trang điểm đang được y&ecirc;u th&iacute;ch nhất, gi&uacute;p cho việc trang điểm trở n&ecirc;n dễ d&agrave;ng hơn bao giờ hết.</p>',
    470.00,
    NULL,
    1,
    '2019-12-08 13:25:03',
    '2019-12-08 13:25:03'
),(
    20,
    'Bộ Chống Lão Hóa Ohui Age Recovery Miniature Kit 5pcs',
    'bo-chong-lao-hoa-ohui-age-recovery-miniature-kit-5pcs',
    '/userfiles/images/Ohui-Mini-Age-Recovery-Baby-Collagen-Miniature-Kit.jpg',
    1,
    '<p>Tiếp nối sự th&agrave;nh c&ocirc;ng v&agrave; hiệu quả của c&aacute;c d&ograve;ng sản phẩm chống l&atilde;o h&oacute;a trước, Ohui cho ra đời sản phẩm Baby collagen mới với đặc t&iacute;nh cung cấp lượng collagen cho da gấp nhiều lần sản phẩm baby collagen cũ, bảo vệ lượng collagen tự nhi&ecirc;n c&oacute; trong da tốt hơn gi&uacute;p da tăng cường độ đ&agrave;n hồi, săn chắc v&agrave; hiệu quả x&oacute;a nếp nhăn tối ưu, cho bạn l&agrave;n da mịn m&agrave;ng, tươi trẻ.</p>',
    '<p>M&ocirc; tả</p>\n\n<p>Bộ Chống L&atilde;o H&oacute;a Ohui Age Recovery Miniature Kit 5pcs<br />\nOhui Age Recovery Baby Collagen Miniature Kit l&agrave; d&ograve;ng sản phẩm chống nhăn, chống l&atilde;o h&oacute;a OHUI được bổ sung baby collagen &ndash; loại collagen được t&igrave;m thấy trong da trẻ em, gi&uacute;p t&aacute;i sinh l&agrave;n da, tăng độ đ&agrave;n hồi v&agrave; l&agrave;m săn chắc da. Cho bạn l&agrave;n da mềm mịn như da em b&eacute;.<br />\n&ldquo;Baby Collagen&rdquo; &ndash; chứa trong tất cả c&aacute;c sản phẩm của Age Recovery &ndash; l&agrave; nghi&ecirc;n cứu độc quyền thuộc sở hữu của h&atilde;ng mỹ phẩm OHUI.<br />\n&ldquo;Baby Collagen&rdquo; c&oacute; rất nhiều trong da cơ thể ch&uacute;ng ta khi c&ograve;n b&eacute;, c&ograve;n trẻ nhưng khi c&agrave;ng lớn l&ecirc;n theo thời gian th&igrave; lượng collagen n&agrave;y sẽ giảm dần v&agrave; mất đi &ndash; khiến da xuất hiện c&aacute;c nếp nhăn, chảy xệ v&agrave; kh&ocirc;ng c&ograve;n sự đ&agrave;n hồi săn chắc.</p>\n\n<p>C&ocirc;ng dụng</p>\n\n<p>Cung cấp bổ sung lại lượng Baby Collagen đ&atilde; bị mất đi, l&agrave;m giảm sự xuất hiện c&aacute;c nếp nhăn.<br />\nGiúp l&agrave;n da t&aacute;i sinh l&agrave;n da,v&agrave; phục hồi độ đ&agrave;n hồi cho da, l&agrave;m săn chắc da.<br />\nCho bạn l&agrave;n da mềm mịn như da em bé.<br />\nCung cấp độ ẩm cho da, gi&uacute;p cho da khỏe mạnh, mềm mại, mịn m&agrave;ng v&agrave; trẻ trung.<br />\nĐặc trị chống nhăn, chống l&atilde;o h&oacute;a.</p>\n\n<p>B&ocirc;̣ Dưỡng Ohui Age Recovery Baby Collagen Miniature Kit bao g&ocirc;̀m 5 sản ph&acirc;̉m nhỏ<br />\nNước hoa hồng Age Recovery Skin Softener 20ml</p>\n\n<p>Nước hoa hồng dưỡng da ẩm mịn v&agrave; mềm mại, gi&uacute;p kh&ocirc;i phục, trẻ h&oacute;a l&agrave;n da, ngăn ngừa nếp nhăn.<br />\nSau khi rửa mặt sạch bằng sửa rửa mặt, đ&ecirc;̉ mặt tự kh&ocirc; sau đó l&acirc;́y m&ocirc;̣t lượng vừa đủ nước hoa h&ocirc;̀ng th&acirc;́m vào b&ocirc;ng t&acirc;̉y trang hoặc lòng bàn tay thoa đ&ecirc;̀u khắp mặt, v&ocirc;̃ nhẹ cho dưỡng ch&acirc;́t th&acirc;́m s&acirc;u vào da.</p>\n\n<p>Tinh chất Age Recovery Essence 3ml</p>\n\n<p>Gi&uacute;p chăm s&oacute;c sự mềm mại , săn chắc v&agrave; x&oacute;a nếp nhăn cực kỳ hiệu quả.<br />\nTinh ch&acirc;́t dưỡng gi&uacute;p khởi động c&aacute;c cấp độ của Baby Collagen nhằm l&agrave;m cho l&agrave;n da mềm mại, đầy đặn v&agrave; đ&agrave;n hồi như da em b&eacute;.<br />\nC&aacute;ch d&ugrave;ng: sau khi d&ugrave;ng nước hoa hồng, bơm 1 lượng nhỏ ra l&ograve;ng b&agrave;n tay, ch&agrave; x&aacute;t 2 l&ograve;ng b&agrave;n tay v&agrave;o nhau để tạo kh&iacute; ấm rồi vỗ đều l&ecirc;n khắp mặt, matxa nhẹ nh&agrave;ng theo cấu tạo da.</p>\n\n<p>Sữa dưỡng da chống nhăn Age Recovery Emulsion 20ml</p>\n\n<p>Đ&acirc;y l&agrave; bước cần thiết trong chăm s&oacute;c l&agrave;n da, ở dạng sữa chứ ko phải dạng nước như c&aacute;c loại toner kh&aacute;c, c&oacute; chứa c&aacute;c chất dinh dưỡng cần thiết để x&acirc;y dựng nền tảng da vững chắc v&agrave; l&agrave;m giảm sự xuất hiện của c&aacute;c nếp nhăn.<br />\nCung cấp dưỡng chất c&ocirc; đặc v&agrave; độ ẩm cần thiết nhất cho da.&lt;br&gt;<br />\nSử dụng đều đặn h&agrave;ng ng&agrave;y v&agrave;o c&aacute;c buổi s&aacute;ng v&agrave; tối, sau khi thoa nước hoa h&ocirc;̀ng, l&acirc;́y m&ocirc;̣t lượng l&ecirc;n lòng bàn tay, v&ocirc;̃ nhẹ sữa dưỡng l&ecirc;n khắp mặt.</p>\n\n<p>Kem dưỡng v&ugrave;ng mắt Age Recovery Eye Cream 5ml</p>\n\n<p>Tăng cường sự đ&agrave;n hồi của c&aacute;c v&ugrave;ng cơ mắt gi&uacute;p bạn che dấu đi sự l&atilde;o h&oacute;a l&agrave;n da của m&igrave;nh do t&aacute;c động từ thời gian, tuổi t&aacute;c.<br />\nSản phẩm chứa collagen tu&yacute;p 3 cho l&agrave;n da mềm mịn, săn chắc, căng tr&agrave;n sức sống.&lt;br&gt;<br />\nSau bước sữa dưỡng, l&acirc;́y m&ocirc;̣t lượng bằng hạt đ&acirc;̣u, nhắm mắt lại thoa đ&ecirc;̀u sản ph&acirc;̉m l&ecirc;n vùng mí mắt xung quanh mắt, tránh k đ&ecirc;̉ vào mắt.</p>\n\n<p>Kem dưỡng da Age Recovery Cream 7ml</p>\n\n<p>Bổ sung độ ẩm, tăng cường độ b&oacute;ng mượt, cải thiện sắc tố da.<br />\nCải thiện nếp nhăn , tăng độ đ&agrave;n hồi, se kh&iacute;t lỗ ch&acirc;n l&ocirc;ng.<br />\nBước cu&ocirc;́i cùng, l&acirc;́y m&ocirc;̣t lượng vừa đủ thoa đ&ecirc;̀u l&ecirc;n mặt, massge nhẹ nhàng cho kem th&acirc;́m vào da.</p>\n\n<p>Hướng d&acirc;̃n sử dụng:</p>\n\n<p>Nước hoa hồng (Skin) &mdash;-&amp;gt; tinh chất dưỡng (serum) &mdash;-&amp;gt; sữa dưỡng (lotion) &mdash;&amp;gt; Kem dưỡng mắt (eye cream) &mdash;&amp;gt; kem dưỡng da (cream).<br />\nLấy một lượng sản phẩm vừa đủ, thoa v&agrave; vỗ nhẹ nh&agrave;ng khắp v&ugrave;ng mặt, v&ugrave;ng cổ cho kem thẩm thấu v&agrave;o da.</p>',
    550.00,
    NULL,
    1,
    '2019-12-08 13:34:31',
    '2019-12-08 13:34:31'
),(
    23,
    'Bộ Dưỡng Da, Chống Lão Hóa Ohui Mini Prime Advancer 3pcs',
    'bo-duong-da-chong-lao-hoa-ohui-mini-prime-advancer-3pcs',
    '/userfiles/images/Bo-duong-da-chong-lao-hoa-Ohui-Mini-Prime-Advancer-3pcs1-min.jpg',
    1,
    '<p>D&ograve;ng sản phẩm Ohui Prime Advancer c&oacute; t&aacute;c dụng chống l&atilde;o h&oacute;a, chống nhăn, gi&uacute;p da săn chắc căng b&oacute;ng, mịn m&agrave;ng như da em b&eacute;. Sản phẩm thẩm thấu s&acirc;u v&agrave;o 3 lớp biểu b&igrave;, th&acirc;n b&igrave; v&agrave; hạ b&igrave; để nu&ocirc;i dưỡng da từ gốc cho bạn một l&agrave;n da khỏe v&agrave; đẹp tự nhi&ecirc;n một c&aacute;ch bền vững, mang lại l&agrave;n da trắng s&aacute;ng, khỏe mạnh v&agrave; căng mọng.</p>',
    '<p><strong>Bộ Dưỡng Da, Chống L&atilde;o H&oacute;a Ohui Mini Prime Advancer 3pcs</strong></p>\n\n<p><strong>-&nbsp;</strong>D&ograve;ng sản phẩm Ohui Prime Advancer c&oacute; t&aacute;c dụng chống l&atilde;o h&oacute;a, chống nhăn, gi&uacute;p da săn chắc căng b&oacute;ng, mịn m&agrave;ng như da em b&eacute;. Sản phẩm thẩm thấu s&acirc;u v&agrave;o 3 lớp biểu b&igrave;, th&acirc;n b&igrave; v&agrave; hạ b&igrave; để nu&ocirc;i dưỡng da từ gốc cho bạn một l&agrave;n da khỏe v&agrave; đẹp tự nhi&ecirc;n một c&aacute;ch bền vững, mang lại l&agrave;n da trắng s&aacute;ng, khỏe mạnh v&agrave; căng mọng.</p>\n\n<p><strong>-&nbsp;</strong>Bộ sản phẩm gi&uacute;p cho phần cốt l&otilde;i của da lu&ocirc;n được vững chắc. Đồng thời, nu&ocirc;i dưỡng từ s&acirc;u b&ecirc;n trong tăng cường khả năng bảo vệ da, giữ da lu&ocirc;n tươi trẻ, khỏe mạnh trước c&aacute;c t&aacute;c động c&oacute; hại như stress, tia cực t&iacute;m UV hay kh&oacute;i bụi, m&ocirc;i trường &ocirc; nhiễm b&ecirc;n ngo&agrave;i.</p>\n\n<p><strong>C&ocirc;ng dụng sản phẩm mang lại:</strong></p>\n\n<p><strong>-&nbsp;</strong>L&agrave;m mềm v&agrave; trắng da</p>\n\n<p>-&nbsp;Chống l&atilde;o h&oacute;a, l&agrave;m trẻ h&oacute;a da</p>\n\n<p>-&nbsp;L&agrave;m săn chắc v&agrave; tăng độ đ&agrave;n hồi cho da</p>\n\n<p>-&nbsp;Phục hồi da sau tổn thương, bảo vệ da khỏi c&aacute;c t&aacute;c nh&acirc;n c&oacute; hại</p>\n\n<p>-&nbsp;Giữ ẩm cho da, ngăn ngừa sự mất nước, kh&ocirc; da</p>\n\n<p>-&nbsp;Se kh&iacute;t lỗ ch&acirc;n l&ocirc;ng, gi&uacute;p da căng b&oacute;ng mịn m&agrave;ng</p>\n\n<p><strong>Bộ sản phẩm bao gồm: </strong></p>\n\n<p><strong>-&nbsp;</strong>Nước hoa hồng l&agrave;m s&aacute;ng da 20ml</p>\n\n<p>-&nbsp;Sữa dưỡng l&agrave;m mềm mịn da 20ml</p>\n\n<p>-&nbsp;Kem dưỡng 7ml</p>\n\n<p><strong>Hướng dẫn sử dụng:</strong></p>\n\n<p><strong>-&nbsp;</strong>Ban ng&agrave;y: Nước hoa hồng &gt; Sữa dưỡng</p>\n\n<p>-&nbsp;Ban đ&ecirc;m: Nước hoa hồng &gt; Sữa dưỡng &gt; Kem dưỡng</p>',
    480000.00,
    NULL,
    1,
    '2019-12-08 13:45:29',
    '2019-12-08 13:45:29'
),(
    24,
    'Bộ Dưỡng Da, Chống Lão Hóa Ohui Mini Prime Advancer Set 5pcs',
    'bo-duong-da-chong-lao-hoa-ohui-mini-prime-advancer-set-5pcs',
    '/userfiles/images/Bo-Duong-Da-Chong-Lao-Hoa-Ohui-Mini-Prime-Advancer-Set-5pcs-min.png',
    1,
    '<p>D&ograve;ng sản phẩm Ohui Prime Advancer c&oacute; t&aacute;c dụng chống l&atilde;o h&oacute;a, chống nhăn, gi&uacute;p da săn chắc căng b&oacute;ng, mịn m&agrave;ng. Sản phẩm thẩm thấu s&acirc;u v&agrave;o 3 lớp biểu b&igrave;, th&acirc;n b&igrave; v&agrave; hạ b&igrave; để nu&ocirc;i dưỡng da từ gốc cho bạn một l&agrave;n da khỏe v&agrave; đẹp tự nhi&ecirc;n một c&aacute;ch bền vững, mang lại l&agrave;n da trắng s&aacute;ng, khỏe mạnh v&agrave; căng mọng.</p>',
    '<p><strong>Bộ Dưỡng Da, Chống L&atilde;o H&oacute;a Ohui Mini Prime Advancer 3pcs</strong></p>\n\n<p><strong>-&nbsp;</strong>D&ograve;ng sản phẩm Ohui Prime Advancer c&oacute; t&aacute;c dụng chống l&atilde;o h&oacute;a, chống nhăn, gi&uacute;p da săn chắc căng b&oacute;ng, mịn m&agrave;ng.</p>\n\n<p>-&nbsp;Sản phẩm thẩm thấu s&acirc;u v&agrave;o 3 lớp biểu b&igrave;, th&acirc;n b&igrave; v&agrave; hạ b&igrave; để nu&ocirc;i dưỡng da từ gốc cho bạn một l&agrave;n da khỏe v&agrave; đẹp tự nhi&ecirc;n một c&aacute;ch bền vững, mang lại l&agrave;n da trắng s&aacute;ng, khỏe mạnh v&agrave; căng mọng.</p>\n\n<p><strong>-&nbsp;</strong>Bộ sản phẩm gi&uacute;p cho phần cốt l&otilde;i của da lu&ocirc;n được vững chắc. Đồng thời, nu&ocirc;i dưỡng từ s&acirc;u b&ecirc;n trong tăng cường khả năng bảo vệ da, giữ da lu&ocirc;n tươi trẻ, khỏe mạnh trước c&aacute;c t&aacute;c động c&oacute; hại như stress, tia cực t&iacute;m UV hay kh&oacute;i bụi, m&ocirc;i trường &ocirc; nhiễm b&ecirc;n ngo&agrave;i.</p>\n\n<p><strong>C&ocirc;ng dụng sản phẩm mang lại:</strong></p>\n\n<p><strong>-&nbsp;</strong>L&agrave;m mềm v&agrave; trắng da</p>\n\n<p>-&nbsp;Chống l&atilde;o h&oacute;a, l&agrave;m trẻ h&oacute;a da</p>\n\n<p>-&nbsp;L&agrave;m săn chắc v&agrave; tăng độ đ&agrave;n hồi cho da</p>\n\n<p>-&nbsp;Phục hồi da sau tổn thương, bảo vệ da khỏi c&aacute;c t&aacute;c nh&acirc;n c&oacute; hại</p>\n\n<p>-&nbsp;Giữ ẩm cho da, ngăn ngừa sự mất nước, kh&ocirc; da</p>\n\n<p>-&nbsp;Se kh&iacute;t lỗ ch&acirc;n l&ocirc;ng, gi&uacute;p da căng b&oacute;ng mịn m&agrave;ng</p>\n\n<p><strong>Bộ sản phẩm bao gồm:</strong></p>\n\n<p><strong>-&nbsp;</strong>Nước hoa hồng l&agrave;m s&aacute;ng da 20ml</p>\n\n<p>-&nbsp;Sữa dưỡng l&agrave;m mềm mịn da 20ml</p>\n\n<p>-&nbsp;Kem dưỡng 7ml</p>\n\n<p>-&nbsp;Kem dưỡng v&ugrave;ng mắt 7ml</p>\n\n<p>-&nbsp;Tinh chất chống l&atilde;o h&oacute;a 5ml</p>\n\n<p><strong>Hướng dẫn sử dụng:</strong></p>\n\n<p><strong>-&nbsp;</strong>Ban ng&agrave;y: Nước hoa hồng &gt; Sữa dưỡng</p>\n\n<p>-&nbsp;Ban đ&ecirc;m: Nước hoa hồng &gt; Sữa dưỡng &gt; Kem dưỡng</p>',
    550012.00,
    NULL,
    1,
    '2019-12-08 13:51:03',
    '2019-12-08 13:51:03'
),(
    25,
    'Kem Tẩy Tế Bào Chết Ohui Clear Science Soft Peeling 150ml',
    'kem-tay-te-bao-chet-ohui-clear-science-soft-peeling-150ml',
    '/userfiles/images/9919-1939316.jpg',
    1,
    '<p>Kỳ tế b&agrave;o da chết&nbsp;Ohui&nbsp;Clear Science Soft Peeling&nbsp;l&agrave; d&ograve;ng sản phẩm gi&uacute;p loại bỏ ho&agrave;n to&agrave;n da chết nhằm đem lại cho bạn một l&agrave;n da khỏe v&agrave; trắng s&aacute;ng. Ngo&agrave;i ra n&oacute; c&ograve;n c&oacute; t&aacute;c dụng ngăn chặn bụi bẩn v&agrave; b&atilde; nhờn b&aacute;m tr&ecirc;n da. Được chiết xuất từ thi&ecirc;n nhi&ecirc;n v&igrave; vậy sản phẩm kh&ocirc;ng g&acirc;y k&iacute;ch ứng da cho người sử dụng.</p>',
    '<p><strong>Tẩy tế b&agrave;o da chết Ohui Clear Science Soft Peeling 150ml</strong></p>\n\n<p>Tẩy da chết l&agrave;m sạch của ohui, gi&uacute;p l&agrave;m sạch da, cho da khỏe, đẹp ngăn chặn bụi bẩn v&agrave; b&atilde; nhờn. Sản phẩm tẩy tế b&agrave;o chết mượt m&agrave; như gommage. &Iacute;t khả năng g&acirc;y dị ứng bởi c&aacute;ch thức ch&agrave; sạch được trộn lẫn giữa enzyme vi&ecirc;n nang v&agrave; chiết xuất rong biển. Loại bỏ tế b&agrave;o da chết cũ v&agrave; tạo ra lớp da trong suốt v&agrave; mịn.</p>\n\n<p><strong>T&aacute;c dụng đồng thời hai bước:</strong></p>\n\n<p><strong>-&nbsp;</strong>Những hạt kỳ mềm mịn vỡ ra rồi len lỏi v&agrave; s&acirc;u trong lỗ ch&acirc;n l&ocirc;ng để l&agrave;m sạch b&atilde; nhờn.</p>\n\n<p>-&nbsp;Những hạt cứng gi&uacute;p l&agrave;m sạch lớp sừng gi&agrave; b&aacute;m chặt tr&ecirc;n da.</p>\n\n<p>-&nbsp;Gel cung cấp độ ẩm cho da,cho nếp da rạng rỡ v&agrave; s&aacute;ng trong.-L&agrave;m sạch lớp sừng gi&agrave; chết an to&agrave;n với da nhờ c&aacute;c hạt c&aacute;t thảo dược.</p>\n\n<p><strong>Hướng dẫn sử dụng:</strong></p>\n\n<p><strong>-&nbsp;</strong>Sau khi rửa mặt, lau kh&ocirc; bạn sử dụng lượng vừa phải thoa tr&ecirc;n khu&ocirc;n mặt như vẽ v&ograve;ng tr&ograve;n nhẹ nh&agrave;ng tr&aacute;nh v&ugrave;ng mắt v&agrave; m&ocirc;i.</p>\n\n<p>-&nbsp;Thoa đều hết to&agrave;n mặt rồi d&ugrave;ng tay massage nhẹ nh&agrave;ng theo chiều cấu tạo da từ 1 đến 2 ph&uacute;t rồi rửa sạch lại với nước ấm.</p>\n\n<p>-&nbsp;Sử dụng 1-2 lần/tuần cho tất cả loại da.</p>',
    690000.00,
    NULL,
    1,
    '2019-12-08 13:56:39',
    '2019-12-08 13:56:39'
),(
    26,
    'Khăn Giấy Ướt Ohui Clear Science Tender Cleansing Sheet 100c',
    'khan-giay-uot-ohui-clear-science-tender-cleansing-sheet-100c',
    '/userfiles/images/Ohui-Clear-Science-Tender-Cleansing-Sheet.png',
    1,
    '<p>Khăn ướt tẩy trang gi&uacute;p l&agrave;m sạch lớp trang điểm nhanh ch&oacute;ng v&agrave; tiện lợi. Tiết kiệm thời gian v&agrave; vệ sinh sạch sẽ cho l&agrave;n da.</p>',
    '<p><strong>Khăn Giấy Ướt Ohui Clear Science Tender Cleansing Sheet:</strong></p>\n\n<p>Trang điểm từ l&acirc;u đ&atilde; trở th&agrave;nh th&oacute;i quen hằng ng&agrave;y của mỗi c&ocirc; g&aacute;i. Kh&ocirc;ng những t&ocirc;n vinh vẻ đẹp m&agrave; c&ograve;n che đi những khuyết điểm. Tuy nhi&ecirc;n, v&agrave;o cuối ng&agrave;y nhiều người chỉ rửa mặt qua loa m&agrave; bỏ qua bước tẩy trang. Điều n&agrave;y v&ocirc; t&igrave;nh l&agrave;m da tổn thương. Cụ thể, lớp trang điểm c&ograve;n s&oacute;t lại sẽ kết hợp với b&atilde; dầu v&agrave; bụi bẩn. Tấn c&ocirc;ng cấu tr&uacute;c tế b&agrave;o da, từ đ&oacute; l&agrave;m giảm sản sinh collagen. L&agrave;m lớp biểu b&igrave; tr&ecirc;n c&ugrave;ng mất đi t&iacute;nh đ&agrave;n hồi, tạo điều kiện cho sự h&igrave;nh th&agrave;nh nếp nhăn. Khăn ướt tẩy trang gi&uacute;p l&agrave;m sạch lớp trang điểm nhanh ch&oacute;ng v&agrave; tiện lợi. Tiết kiệm thời gian v&agrave; vệ sinh sạch sẽ cho l&agrave;n da</p>\n\n<p><strong>C&ocirc;ng dụng Khăn Ướt Tẩy Trang Ohui Tender Cleansing Sheet:</strong></p>\n\n<p><strong>-&nbsp;</strong>Khăn tẩy trang dạng tờ nhanh ch&oacute;ng, tiện lợi dễ mang theo.</p>\n\n<p>-&nbsp;Rất hữu &iacute;ch khi muốn chỉnh sửa lớp trang điểm.</p>\n\n<p>-&nbsp;Mang lại sự ẩm mịn v&agrave; mềm mại cho da.</p>\n\n<p><strong>C&aacute;ch sử dụng Khăn Ướt Tẩy Trang Ohui Tender Cleansing Sheet:</strong></p>\n\n<p><strong>-&nbsp;</strong>Lấy một tờ khăn ướt tẩy trang lau v&ugrave;ng trang điểm trước rồi đến v&ugrave;ng chữ U v&agrave; chữ T.</p>\n\n<p>&nbsp;</p>',
    950000.00,
    460000.00,
    1,
    '2019-12-08 14:02:50',
    '2019-12-08 14:02:50'
),(
    27,
    'Sữa Tẩy Trang Ohui Tender Cleansing Emulsion Washable 50ml',
    'sua-tay-trang-ohui-tender-cleansing-emulsion-washable-50ml',
    '/userfiles/images/Ohui-Tender-Cleansing-Emulsion-Washable.png',
    1,
    '<p>D&ograve;ng sản phẩm loại bỏ trang điểm kh&aacute; hiệu quả hiện nay. Ngo&agrave;i t&iacute;nh năng tẩy trang n&oacute; c&ograve;n gi&uacute;p loại bỏ c&aacute;c tế b&agrave;o chết, b&atilde; nhờn gi&uacute;p đem lại cho bạn một l&agrave;n da mềm mịn tự nhi&ecirc;n nhất.</p>',
    '<p><strong>Sữa Tẩy Trang Ohui Tender Cleansing Emulsion Washable</strong></p>\n\n<p>-&nbsp;Sữa tẩy trang Tender Cleamsing Emulsion dạng sữa l&agrave;m sạch lớp sừng gi&agrave;, loại bỏ tế b&agrave;o chết, gi&uacute;p da mềm mịn, tự nhi&ecirc;n. &Ecirc;m dịu với mọi loại da. Sữa tẩy trang c&oacute; thể rửa lại với nước. Đem lại cảm gi&aacute;c sạch m&aacute;t ,cho hiệu quả l&agrave;m sạch sừng gi&agrave;, chỉnh đốn lớp sừng v&agrave; ổn định chu kỳ thay da. Sản phẩm gi&uacute;p l&agrave;m sạch b&atilde; nhờn v&agrave; lớp trang điểm m&agrave; kh&ocirc;ng l&agrave;m tổn thương lớp m&agrave;ng bảo vệ da v&agrave; đem lại cảm gi&aacute;c sảng kho&aacute;i cho l&agrave;n da.</p>\n\n<p>-&nbsp;Với thiết kế chai nhựa m&agrave;u trắng kết hợp nắp xanh da trời. Ohui Ohui Tender Cleansing Emulsion Washable cho cảm gi&aacute;c gần gủi với thi&ecirc;n nhi&ecirc;n. Nhưng cũng kh&ocirc;ng k&eacute;m phần sang trọng.</p>\n\n<p><strong>C&ocirc;ng dụng&nbsp;:</strong></p>\n\n<p><strong>-&nbsp;</strong>Sữa tẩy trang dễ d&agrave;ng ho&agrave; tan lớp trang điểm, chất nhờn tr&ecirc;n bề mặt da. Mang lại cảm gi&aacute;c tươi m&aacute;t v&agrave; sạch khoẻ cho da.</p>\n\n<p>-&nbsp;Loại bỏ lớp sừng gi&agrave;, sừng chết, b&atilde; nhờn, b&igrave;nh thường h&oacute;a lớp sừng, mang lại l&agrave;n da tươi s&aacute;ng.</p>\n\n<p><strong>Hướng dẫn sử dụng:</strong></p>\n\n<p><strong>-&nbsp;</strong>Lấy một lượng Sữa tẩy trang vừa đủ, thoa đều l&ecirc;n da mặt. Massage nhẹ nh&agrave;ng tr&ecirc;n da để l&agrave;m sạch lớp trang điểm, bụi bẩn v&agrave; b&atilde; nhờn. Sau đ&oacute; rửa sạch mặt với sữa rửa mặt v&agrave; nước.</p>',
    700000.00,
    400000.00,
    1,
    '2019-12-08 14:07:57',
    '2019-12-08 14:07:57'
),(
    28,
    'Mặt Nạ Dạng Kỳ Ohui Tender Facial Scrub 100ml',
    'mat-na-dang-ky-ohui-tender-facial-scrub-100ml',
    '/userfiles/images/Ohui-Tender-Facial-Scrub.png',
    1,
    '<p>Mặt nạ dạng kỳ l&agrave;m sạch nhẹ nh&agrave;ng lớp sừng gi&agrave; chết tr&ecirc;n da một c&aacute;ch dịu nhẹ, mang lại l&agrave;n da s&aacute;ng mượt m&agrave;.</p>',
    '<p><strong>Mặt Nạ Dạng Kỳ Ohui Tender Facial Scrub</strong></p>\n\n<p>Sản phẩm dạng kỳ &iacute;t k&iacute;ch ứng với c&aacute;c hạt kỳ vừa l&agrave;m sạch bụi bẩn tận s&acirc;u trong lỗ ch&acirc;n l&ocirc;ng v&agrave; giữa c&aacute;c nếp da, vừa loại bỏ sừng gi&agrave; t&iacute;ch tụ, chăm s&oacute;c lớp sừng tr&ecirc;n da một c&aacute;ch hiệu quả.</p>\n\n<p><strong>Hướng dẫn sử dụng:</strong></p>\n\n<p><strong>-&nbsp;</strong>Mỗi tuần 1 &ndash; 2 lần, sau khi l&agrave;m sạch, lau kh&ocirc; mặt, lấy ra một lượng sản phẩm thoa đều l&ecirc;n to&agrave;n mặt, tr&aacute;nh thoa v&agrave;o v&ugrave;ng mắt v&agrave; miệng, d&ugrave;ng tay xoa v&agrave; ấn nhẹ theo h&igrave;nh tr&ograve;n trong 1 &ndash; 2 ph&uacute;t.</p>\n\n<p>-&nbsp;Sau khi l&agrave;m sạch sừng v&agrave; bụi bẩn, rửa lại với nước ấm.</p>',
    780000.00,
    NULL,
    1,
    '2019-12-08 14:11:28',
    '2019-12-08 14:11:28'
),(
    29,
    'Chống Nắng Dạng Thỏi Ohui Sun Protection Sun Stick 19gr',
    'chong-nang-dang-thoi-ohui-sun-protection-sun-stick-19gr',
    '/userfiles/images/Ohui-Sun-Protection-Sun-Stick.jpg',
    1,
    '<p>Sản phẩm dạng thỏi son rất tiện lợi cho bạn khi sử dụng. N&oacute; c&oacute; t&aacute;c dụng chống nắng ngăn ngừa c&aacute;c tia cực t&iacute;m g&acirc;y ảnh hưởng trực tiếp tới l&agrave;n da của bạn. Ngo&agrave;i ra n&oacute; c&ograve;n ngăn ngừa sự l&atilde;o h&oacute;a của da, kh&ocirc; da bổ sung c&aacute;c chất cần thiết gi&uacute;p da của bạn lu&ocirc;n s&aacute;ng mịn v&agrave; khỏe mạnh.</p>',
    '<p><strong>Kem Chống Nắng Dạng Thỏi Ohui Sun Protection Sun Stick SPF50+/PA+++</strong>l&agrave; sản phẩm dạng thỏi son rất tiện lợi cho bạn khi sử dụng. N&oacute; c&oacute; t&aacute;c dụng chống nắng ngăn ngừa c&aacute;c tia cực t&iacute;m g&acirc;y ảnh hưởng trực tiếp tới l&agrave;n da của bạn. Ngo&agrave;i ra n&oacute; c&ograve;n ngăn ngừa sự l&atilde;o h&oacute;a của da, kh&ocirc; da bổ sung c&aacute;c chất cần thiết gi&uacute;p da của bạn lu&ocirc;n s&aacute;ng mịn v&agrave; khỏe mạnh.</p>\n\n<p><strong>C&ocirc;ng dụng của Sun protection sun stick SPF 50+, PA+++</strong></p>\n\n<p><strong>-&nbsp;</strong>Sản phẩm được chiết xuất từ thi&ecirc;n nhi&ecirc;n v&igrave; thế kh&ocirc;ng hề g&acirc;y k&iacute;ch ứng da</p>\n\n<p>-&nbsp;Chỉ số chống nắng SPF 50+ ở mức cao gi&uacute;p da bạn ngăn ngừa c&aacute;c tia cực t&iacute;m trong nhiều giờ</p>\n\n<p>-&nbsp;Ngo&agrave;i ra n&oacute; c&ograve;n c&oacute; t&aacute;c dụng l&agrave;m mờ c&aacute;c vết th&acirc;m, n&aacute;m trong thời gian ngắn</p>\n\n<p>-&nbsp;Lu&ocirc;n duy tr&igrave; dộ ẩm cho da, kiểm so&aacute;t được to&agrave;n bộ lượng b&atilde; nhờn gi&uacute;p bạn lu&ocirc;n cảm thấy thoải m&aacute;i v&agrave; tự tin khi sở hữu một l&agrave;n da tươi mới.</p>\n\n<p><strong>Hướng dẫn sử dụng:</strong></p>\n\n<p><strong>-&nbsp;</strong>Thoa một lượng vừa đủ ra tay sau đ&oacute; thoa đều l&ecirc;n to&agrave;n bộ v&ugrave;ng da trước khi bạn ra nắng.</p>',
    750000.00,
    NULL,
    1,
    '2019-12-08 14:15:37',
    '2019-12-08 14:15:37'
),(
    30,
    'Kem Chống Nắng Ohui Perfect Sun Pro Black 50ml',
    'kem-chong-nang-ohui-perfect-sun-pro-black-50ml',
    '/userfiles/images/Ohui-Perfect-Sun-Pro-Black.png',
    1,
    '<p>Ohui Perfect Sun Black d&agrave;nh cho những l&agrave;n da tối m&agrave;u cần l&agrave;m s&aacute;ng. Với chỉ số chống nắng cực cao l&agrave; SPF 50+, loại trừ c&aacute;c dấu hiệu th&acirc;m n&aacute;m, sạm đen. Đồng thời chống lại tia cực t&iacute;m x&acirc;m hại đến da, giảm thiểu nguy cơ bị ung thư da.</p>',
    '<p><strong>Kem Chống Nắng Ohui Perfect Sun Pro Black</strong></p>\n\n<p>Sản phẩm nằm trong bộ Ohui Perfect Sun Black, set chống nắng của Ohui<br />\nOhui Perfect Sun Black d&agrave;nh cho những l&agrave;n da tối m&agrave;u cần l&agrave;m s&aacute;ng. Với chỉ số chống nắng cực cao l&agrave; SPF 50+, loại trừ c&aacute;c dấu hiệu th&acirc;m n&aacute;m, sạm đen. Đồng thời chống lại tia cực t&iacute;m x&acirc;m hại đến da, giảm thiểu nguy cơ bị ung thư da.<br />\nThiết kế của kem chống nắng Ohui Perfect Sun Black<br />\nNh&igrave;n chung, thiết kế kh&aacute; đơn giản, kh&ocirc;ng lấp l&aacute;nh như c&aacute;c sản phẩm cao cấp đến từ Ohui. Tu&yacute;t vỏ nhựa trắng c&ugrave;ng nắp v&agrave;ng, tạo n&ecirc;n sự h&agrave;i h&ograve;a cho sản phẩm. Cảm gi&aacute;c cầm nắm rất chắc tay, c&ugrave;ng với miệng chai nhỏ, rất tiện lợi khi lấy kem.<br />\nV&igrave; đ&acirc;y l&agrave; loại kem chống nắng d&agrave;nh cho c&aacute;c l&agrave;n da tối m&agrave;u, n&ecirc;n kem c&oacute; m&agrave;u trắng, nhũ nhẹ. Khi t&aacute;n l&ecirc;n da th&igrave; hơi ng&atilde; hồng, ẩm mịn. Nhanh ch&oacute;ng thấm v&agrave;o c&aacute;c tế b&agrave;o, mang lại hiệu quả tuyệt với.<br />\nChiết suất từ c&aacute;c th&agrave;nh phần thảo dược thi&ecirc;n nhi&ecirc;n nguy&ecirc;n chất, kem chống nắng cho m&ugrave;i thơm kh&aacute; nồng.</p>\n\n<p><strong>C&ocirc;ng dụng của Ohui Perfect Sun Black:</strong></p>\n\n<p><strong>-&nbsp;</strong>Với chỉ số chống nắng vượt trội SPF50+/PA+++, bảo vệ da dưới &aacute;nh nắng gay gắt cả một ng&agrave;y d&agrave;i. Đồng thời tăng cường sức đề kh&aacute;ng, chống lại c&aacute;c dấu hiệu l&atilde;o h&oacute;a cho da.</p>\n\n<p>-&nbsp;Duy tr&igrave; độ ẩm, c&acirc;n bằng lượng dầu tr&ecirc;n da, giữ l&agrave;n da kh&ocirc; tho&aacute;ng, thoải m&aacute;i. Ngo&agrave;i ra, c&oacute; thể sử dụng kem chống nắng như kem l&oacute;t trang điểm.</p>\n\n<p><strong>Hướng dẫn sử dụng:</strong></p>\n\n<p><strong>-&nbsp;</strong>Sử dụng kem trong c&aacute;c hoạt động tiếp x&uacute;c với &aacute;nh nắng mặt trời.</p>\n\n<p>-&nbsp;Lấy một lượng vừa đủ, thoa đều l&ecirc;n mặt. Đặc biệt l&agrave; c&aacute;c v&ugrave;ng thường xuy&ecirc;n tiếp x&uacute;c với nắng như tr&aacute;n, mũi, g&ograve; m&aacute;.</p>\n\n<p>-&nbsp;Thoa trước khi ra nắng 20 ph&uacute;t để kem thấm v&agrave;o da.</p>',
    830000.00,
    530000.00,
    1,
    '2019-12-08 14:20:43',
    '2019-12-08 14:20:43'
),(
    31,
    'Phấn Phủ Chống Nắng Ohui Perfect Sun Powder 20gr',
    'phan-phu-chong-nang-ohui-perfect-sun-powder-20gr',
    '/userfiles/images/Ohui-Sun-Science-Powder-Sunblock-EX.png',
    1,
    '<p>D&ograve;ng sản phẩm phấn phủ trang điểm vừa c&oacute; t&aacute;c dụng chống nắng nhờ v&agrave;o c&aacute;c th&agrave;nh phần hạt phấn si&ecirc;u mịn gi&uacute;p tạo cho bạn một l&agrave;n da đẹp tự nhi&ecirc;n. Với những bạn thuộc da dầu đều c&oacute; thể sử dụng được.</p>',
    '<p><strong>Phấn Phủ Chống Nắng Ohui Perfect Sun Powder SPF50+/PA+++</strong></p>\n\n<p>L&agrave; d&ograve;ng sản phẩm phấn phủ trang điểm vừa c&oacute; t&aacute;c dụng chống nắng nhờ v&agrave;o c&aacute;c th&agrave;nh phần hạt phấn si&ecirc;u mịn gi&uacute;p tạo cho bạn một l&agrave;n da đẹp tự nhi&ecirc;n. Với những bạn thuộc da dầu đều c&oacute; thể sử dụng được. Đ&acirc;y l&agrave; sản phẩm ohui chống nắng hiệu quả với c&aacute;c chỉ số chống nắng cao gi&uacute;p da của bạn tr&aacute;nh khỏi c&aacute;c t&aacute;c nh&acirc;n g&acirc;y hại của m&ocirc;i trường.</p>\n\n<p><strong>C&ocirc;ng dụng của Sun science powder sunblock EX SPF50+/ PA+++:</strong></p>\n\n<p><strong>-&nbsp;</strong>Sử dụng được cho những l&agrave;n da nhạy cảm nhờ c&aacute;c tinh chất được chiết xuất từ thi&ecirc;n nhi&ecirc;n kh&ocirc;ng g&acirc;y k&iacute;ch ứng cho da.</p>\n\n<p>-&nbsp;Chỉ số chống nắng cao SPF 50+</p>\n\n<p>-&nbsp;Điều tiết nhờ cho những loại da nhờn v&agrave; da hỗn hợp hiệu quả</p>\n\n<p><strong>Hướng dẫn sử dụng:</strong></p>\n\n<p><strong>-&nbsp;</strong>Sau khi bạn sử dụng phấn nền trang điểm, lấy một lượng vừa đủ thấm v&agrave;o b&ocirc;ng v&agrave; thoa đều l&ecirc;n v&ugrave;ng da cần chống nắng.</p>',
    1100000.00,
    950000.00,
    1,
    '2019-12-08 14:28:43',
    '2019-12-08 14:28:43'
),(
    32,
    'Chì Kẻ Mày Tông Màu Tự Nhiên Ohui Eye Brow Pencil 0,25gr',
    'chi-ke-may-tong-mau-tu-nhien-ohui-eye-brow-pencil-025gr',
    '/userfiles/images/Ohui-Eyebrow-Pencil.png',
    1,
    '<p>Kẻ ch&acirc;n m&agrave;y OHUI EyeBrow&nbsp;c&oacute; khả năng b&aacute;m bền vượt trội, sắc m&agrave;u đa dạng, gi&uacute;p thể hiện đ&ocirc;i ch&acirc;n m&agrave;y thật tự nhi&ecirc;n v&agrave; đều đặn,&nbsp;thật tinh tế v&agrave; ho&agrave;n hảo. Sản phẩm chứa những hạt m&agrave;u si&ecirc;u mịn giữ cho vẻ đẹp kh&ocirc;ng phai suốt cả ng&agrave;y.</p>',
    '<p><strong>Ch&igrave; Kẻ Ch&acirc;n M&agrave;y Ohui Eyebrow Pencil</strong></p>\n\n<p><strong>-&nbsp;</strong>Kẻ ch&acirc;n m&agrave;y OHUI EyeBrow c&oacute; khả năng b&aacute;m bền vượt trội, sắc m&agrave;u đa dạng, gi&uacute;p thể hiện đ&ocirc;i ch&acirc;n m&agrave;y thật tự nhi&ecirc;n v&agrave; đều đặn, thật tinh tế v&agrave; ho&agrave;n hảo. Sản phẩm chứa những hạt m&agrave;u si&ecirc;u mịn giữ cho vẻ đẹp kh&ocirc;ng phai suốt cả ng&agrave;y.</p>\n\n<p>-&nbsp;Kẻ ch&acirc;n m&agrave;y OHUI EyeBrow l&agrave; sản phẩm ch&igrave; kẻ v&agrave; tạo d&aacute;ng ch&acirc;n m&agrave;y với thiết kế với 2 đầu tiện dụng: 1 đầu l&agrave; ch&igrave; kẻ, 1 đầu l&agrave; cọ chải l&ocirc;ng m&agrave;y, gi&uacute;p bạn khai th&aacute;c nhiều t&iacute;nh năng hơn c&aacute;c sản phẩm th&ocirc;ng thường thấy tr&ecirc;n thị trường..</p>\n\n<p><strong>Hướng dẫn sử dụng:</strong></p>\n\n<p><strong>-&nbsp;</strong>Bước 1: D&ugrave;ng đầu cọ kẻ l&ocirc;ng m&agrave;y, kẻ men theo đường từ đầu l&ocirc;ng m&agrave;y cho đến đỉnh m&agrave;y khoảng 2/3 ch&acirc;n m&agrave;y</p>\n\n<p>-&nbsp;Bước 2: Từ đỉnh l&ocirc;ng m&agrave;y tiếp tục kẻ cho đến hết ch&acirc;n m&agrave;y (1/3 c&ograve;n lại)</p>\n\n<p>-&nbsp;Bước 3: D&ugrave;ng b&uacute;t ch&igrave; n&acirc;u kẻ d&agrave;i lại từ đầu ch&acirc;n l&ocirc;ng m&agrave;y cho đến cuối ch&acirc;n m&agrave;y. Để ch&acirc;n m&agrave;y được đẹp v&agrave; tự nhi&ecirc;n bạn n&ecirc;n kết hợp d&ugrave;ng th&ecirc;m bột t&aacute;n ch&acirc;n m&agrave;y để dặm th&ecirc;m nh&eacute;.</p>\n\n<p>-&nbsp;Bước 4: D&ugrave;ng đầu chuốt l&ocirc;ng m&agrave;y chuốt từ từ đều theo chiều l&ocirc;ng m&agrave;y để t&ocirc;ng m&agrave;y kẻ được đều đặn v&agrave; tự nhi&ecirc;n hơn.</p>',
    400000.00,
    NULL,
    1,
    '2019-12-08 14:32:14',
    '2019-12-08 14:32:14'
),(
    33,
    'Kẻ Viền Mắt Nước Ohui Liquid Eyeliner 5ml',
    'ke-vien-mat-nuoc-ohui-liquid-eyeliner-5ml',
    '/userfiles/images/Ohui-Liquid-Eyeliner.jpg',
    1,
    '<p>Viền mắt nước Ohui Liquid eyeliner cho đường viền sắc n&eacute;t, gọn g&agrave;ng v&agrave; tinh tế. Sản phẩm dễ d&agrave;ng&nbsp;tạo ra những đường kẻ sắc n&eacute;t theo &yacute; muốn v&agrave; sở th&iacute;ch.Cho đ&ocirc;i mắt những đường n&eacute;t mềm mại, uyển chuyển v&agrave; tinh tế.</p>',
    '<p><strong>Viền Mắt Nước Ohui Liquid Eyeliner</strong></p>\n\n<p>Viền mắt nước Ohui Liquid eyeliner cho đường viền sắc n&eacute;t, gọn g&agrave;ng v&agrave; tinh tế. Sản phẩm dễ d&agrave;ng tạo ra những đường kẻ sắc n&eacute;t theo &yacute; muốn v&agrave; sở th&iacute;ch.Cho đ&ocirc;i mắt những đường n&eacute;t mềm mại, uyển chuyển v&agrave; tinh tế.</p>\n\n<p><strong>Đặc điểm viền mắt nước Ohui Liquid Eyeliner</strong></p>\n\n<p>Sản phẩm được thiết kế dạng thỏi, với sự kết hợp bắt mắt giữa 2 m&agrave;u trắng v&agrave; t&iacute;m. Tạo cảm gi&aacute;c h&agrave;i h&ograve;a nhưng kh&ocirc;ng k&eacute;m phần sang trọng. Ngo&agrave;i b&uacute;t kẻ mềm v&agrave; nhọn, tạo sự ch&iacute;nh x&aacute;c v&agrave; sắc n&eacute;t khi sử dụng sản phẩm</p>\n\n<p><strong>C&ocirc;ng dụng viền mắt nước Ohui Liquid Eyeliner</strong></p>\n\n<p><strong>-&nbsp;</strong>Tạo d&aacute;ng chuẩn cho đ&ocirc;i mắt</p>\n\n<p>-&nbsp;L&agrave;m d&agrave;i đu&ocirc;i mi mắt</p>\n\n<p>-&nbsp;Nhấn mạnh r&otilde; đường mi mắt</p>\n\n<p>-&nbsp;C&oacute; thể sửa những khuyết điểm của h&igrave;nh d&aacute;ng đ&ocirc;i mắt</p>\n\n<p>-&nbsp;L&agrave;m d&agrave;y đ&ocirc;i mi mắt</p>\n\n<p>-&nbsp;Tạo chiều s&acirc;u cho đ&ocirc;i mắt</p>\n\n<p><strong>Hướng dẫn sử dụng:</strong></p>\n\n<p><strong>-&nbsp;</strong>T&igrave;m cho khuỷu tay m&igrave;nh một th&agrave;nh b&agrave;n chắc chắn l&agrave;m gi&aacute; đỡ.</p>\n\n<p>-&nbsp;Bắt đầu bằng việc chọn điểm kẻ ở giữa đường m&eacute;p l&ocirc;ng mi h&agrave;ng tr&ecirc;n.</p>\n\n<p>-&nbsp;D&ugrave;ng tay k&eacute;o nhẹ v&ugrave;ng da gần đu&ocirc;i mắt cho mi mắt căng d&agrave;i th&agrave;nh đường thẳng</p>',
    600000.00,
    NULL,
    1,
    '2019-12-08 14:36:49',
    '2019-12-08 14:36:49'
),(
    34,
    'Kem Lót Trang Điểm Ohui Second Skin Green Base 40ml',
    'kem-lot-trang-diem-ohui-second-skin-green-base-40ml',
    '/userfiles/images/Ohui-Second-Skin-Green-Base.jpg',
    1,
    '<p>Kem lót Ohui Second Skin (Green Base &amp;&amp; Sheer Base)&nbsp;l&agrave; bước chuẩn bị đầu ti&ecirc;n trong trang điểm, cho bạn một l&agrave;n da đẹp. Với chỉ số chống nắng l&ecirc;n đến SPF20 PA++, c&ugrave;ng khả năng b&aacute;m d&iacute;nh gi&uacute;p kem c&oacute; thể che khuyết điểm v&agrave; độ bền của lớp trang điểm. Cho bạn c&oacute; một ng&agrave;y d&agrave;i năng động.</p>',
    '<p><strong>Kem L&oacute;t Trang Điểm Ohui Second Skin&nbsp;Green Base</strong></p>\n\n<p><strong>-&nbsp;</strong>Kem l&oacute;t trang điểm chứa si&ecirc;u ph&acirc;n tử ngọc trai. Hiệu chỉnh t&ocirc;ng da, mang lại sắc da tỏa s&aacute;ng, rạng rỡ.</p>\n\n<p>-&nbsp;Đặc biệt sản phẩm c&ograve;n l&agrave;m trắng, cải thiện nếp nhăn. C&oacute; thể d&ugrave;ng như highlighter &ndash; tạo khu&ocirc;n (d&ugrave;ng cho trang điểm chuy&ecirc;n nghiệp) để t&ocirc; điểm th&ecirc;m lớp da s&aacute;ng hồng rực rỡ.</p>\n\n<p><strong>Đặc điểm Kem L&oacute;t Trang Điểm Ohui Second Skin&nbsp;Green Base</strong></p>\n\n<p><strong>-&nbsp;</strong>Sản phẩm được đ&oacute;ng g&oacute;i trong chiếc hộp đen huyền b&iacute; v&agrave; sang trọng.</p>\n\n<p>-&nbsp;Thuộc v&agrave;o dạng ống tu&yacute;p nhựa. Kh&aacute; giống với c&aacute;c d&ograve;ng chống nắng của Ohui.</p>\n\n<p>-&nbsp;Chủ đạo l&agrave; m&agrave;u hồng phấn c&ugrave;ng nắp đen nổi bật thương hiệu OHUI.</p>\n\n<p>-&nbsp;Kem lót trang đi&ecirc;̉m Ohui Second Skin&nbsp;Green Base SPF20/PA++ dạng Primer.</p>\n\n<p>-&nbsp;Giúp hi&ecirc;̣u chỉnh sắc đỏ và khuy&ecirc;́t đi&ecirc;̉m tr&ecirc;n da. Cho lớp n&ecirc;̀n sáng mịn trong su&ocirc;́t 12 giờ.</p>\n\n<p>-&nbsp;Kem lót trang đi&ecirc;̉m Ohui Second Skin&nbsp;Green Base với th&agrave;nh phần SPF20/PA++ rất cao.</p>\n\n<p>-&nbsp;Bảo v&ecirc;̣ làn da tránh khỏi tác hại từ tia tử ngoại của &aacute;nh nắng mặt trời.</p>\n\n<p>&nbsp;</p>',
    990000.00,
    NULL,
    1,
    '2019-12-08 14:45:00',
    '2019-12-08 14:45:00'
),(
    35,
    'Set Phấn nước & Son Ohui x Asiana Airlines Phiên bản giới hạn 2018',
    'set-phan-nuoc-son-ohui-x-asiana-airlines-phien-ban-gioi-han-2018',
    '/userfiles/images/Set-Ph%E1%BA%A5n-n%C6%B0%E1%BB%9Bc-Son-Ohui-x-Asiana-Airlines-Phi%C3%AAn-b%E1%BA%A3n-gi%E1%BB%9Bi-h%E1%BA%A1n-2018.png',
    1,
    '<p>Phấn nước Ohui x asiana airlines&nbsp;l&agrave; sự kết hợp giữa kem l&oacute;t v&agrave; kem nền tạo n&ecirc;n một lớp trang điểm mỏng mịn, tự nhi&ecirc;n.&nbsp;Chỉ số chống nắng tuyệt vời SPF50 PA+++ bảo vệ da trước t&aacute;c động của m&ocirc;i trường v&agrave; tia cực t&iacute;m. B&ecirc;n cạnh đ&oacute; Son Ohui nữ t&iacute;nh, trẻ trung, bổ sung collagen v&agrave; tinh chất dưỡng ẩm gi&uacute;p m&ocirc;i mềm mại, mịn m&agrave;ng, v&agrave; căng mọng, kh&ocirc;ng bị th&acirc;m m&ocirc;i, l&atilde;o h&oacute;a.</p>',
    '<p><strong>Phấn nước Ohui x Asiana Airlines</strong></p>\n\n<p><strong>-&nbsp;</strong>Phấn Ohui x asiana airlines l&agrave; sự kết hợp giữa kem l&oacute;t v&agrave; kem nền tạo n&ecirc;n một lớp trang điểm mỏng mịn, tự nhi&ecirc;n.</p>\n\n<p>-&nbsp;Cung cấp độ ẩm cho da, gi&uacute;p da căng mướt mịn m&agrave;ng, ngăn ngừa kh&ocirc; da v&agrave; dưỡng trắng hiệu quả.</p>\n\n<p>-&nbsp;Chỉ số chống nắng tuyệt vời, tương đương với kem chống nắng chuy&ecirc;n nghiệp SPF50 PA+++, bảo vệ da trước t&aacute;c động của m&ocirc;i trường v&agrave; tia cực t&iacute;m.</p>\n\n<p>-&nbsp;Khả năng kiềm dầu tốt v&agrave; giữ lớp trang điểm suốt cả ng&agrave;y kh&ocirc;ng bị xuống m&agrave;u, tho&aacute;ng da v&agrave; kh&ocirc;ng hề g&acirc;y b&iacute;t lỗ ch&acirc;n l&ocirc;ng.</p>\n\n<p>-&nbsp;B&ecirc;n cạnh đ&oacute;, phấn c&ograve;n chứa nhiều tinh chất gi&uacute;p nu&ocirc;i dưỡng l&agrave;n da khỏe mạnh, trắng hồng, gi&uacute;p da đ&agrave;n hồi, săn chắc th&iacute;ch hợp sử dụng h&agrave;ng ng&agrave;y.</p>\n\n<p><strong>Đặc điểm Phấn nước Ohui</strong></p>\n\n<p><strong>-&nbsp;</strong>Lấy thiết kế chủ đạo từ hoa hồng với m&agrave;u hồng nhẹ vừa dễ thương lại ngọt ng&agrave;o, kết hợp viền v&agrave;ng tinh tế v&ocirc; c&ugrave;ng bắt mắt, sang trọng.</p>\n\n<p>-&nbsp;Khi thoa phấn l&ecirc;n mặt, cảm gi&aacute;c đầu ti&ecirc;n l&agrave; v&ocirc; c&ugrave;ng nhẹ dịu, m&aacute;t lạnh, chất kem mỏng thẩm thấu ho&agrave;n to&agrave;n để lại một lớp mỏng trong suốt, da căng mịn v&agrave; b&oacute;ng mướt ngay tức th&igrave;.</p>\n\n<p>-&nbsp;Che phủ tối đa c&aacute;c khuyết điểm tr&ecirc;n mặt như sạm, n&aacute;m, t&agrave;n nhang, vết th&acirc;m mụn,&hellip;</p>\n\n<p>-&nbsp;Hương thơm nhẹ nh&agrave;ng v&agrave; dễ chịu</p>\n\n<p>-&nbsp;Sử dụng được cho nhiều loại da, ngay cả da dầu v&agrave; da hỗn hợp</p>\n\n<p><strong>Son Ohui mini Rouge Real</strong></p>\n\n<p>-&nbsp;Son m&agrave;u hồng nữ t&iacute;nh, trẻ trung, ph&ugrave; hợp với những c&ocirc; n&agrave;ng da trắng.</p>\n\n<p>-&nbsp;Son c&ograve;n bổ sung collagen v&agrave; tinh chất dưỡng ẩm gi&uacute;p m&ocirc;i mềm mại, mịn m&agrave;ng, v&agrave; căng mọng, kh&ocirc;ng bị th&acirc;m m&ocirc;i, l&atilde;o h&oacute;a.</p>\n\n<p><strong>Hướng dẫn sử dụng</strong></p>\n\n<p><strong>-&nbsp;</strong>Sử dụng phấn nước Ohui sau khi da mặt đ&atilde; được l&agrave;m sạch.</p>\n\n<p>-&nbsp;D&ugrave;ng b&ocirc;ng nhấn v&agrave;o l&otilde;i kem rồi nhẹ nh&agrave;ng dặm đều l&ecirc;n mặt để tạo th&agrave;nh một lớp che phủ ho&agrave;n hảo.</p>\n\n<p>-&nbsp;Đối với v&ugrave;ng da c&oacute; khuyết điểm như vết sẹo, th&acirc;m, mụn&hellip; bạn n&ecirc;n sử dụng 1 lượng phấn lớn hơn để tăng khả năng che phủ.</p>',
    1050000.00,
    920000.00,
    1,
    '2019-12-08 14:51:24',
    '2019-12-08 14:51:24'
),(
    36,
    'Son Dưỡng Môi Ohui Lip Tint Balm 5gr',
    'son-duong-moi-ohui-lip-tint-balm-5gr',
    '/userfiles/images/Ohui-Lip-Tint-Balm.jpg',
    1,
    '<p>Son dưỡng m&ocirc;i cao cấp đến từ Ohui, kh&ocirc;ng những cho đ&ocirc;i m&ocirc;i b&oacute;ng mịn tự nhi&ecirc;n m&agrave; c&ograve;n cung cấp dưỡng ẩm cho l&agrave;n m&ocirc;i. Mang đ&ocirc;i m&ocirc;i ngọt ng&agrave;o, quyến rũ trở về với bạn.</p>',
    '<p><strong>Son Dưỡng M&ocirc;i Ohui Lip Tint Balm</strong></p>\n\n<p>Thỏi son, từ l&acirc;u đ&atilde; trở th&agrave;nh phụ kiện kh&ocirc;ng thể thiếu trong h&agrave;nh trang của c&aacute;c c&ocirc; g&aacute;i. Kh&ocirc;ng những thiết kế hay m&agrave;u son phải đẹp m&agrave; c&ograve;n phải chăm s&oacute;c được l&agrave;n da m&ocirc;i. Hiểu được điều đ&oacute;, Ohui đ&atilde; cho ra đời Son dưỡng m&ocirc;i Lip Tint Balm. Ngo&agrave;i thiết kế đẹp, m&agrave;u son b&oacute;ng mịn tự nhi&ecirc;n, m&agrave; c&ograve;n bổ sung chất dưỡng ẩm cải thiện l&agrave;n m&ocirc;i.</p>\n\n<p><strong>Đặc điểm Son dưỡng m&ocirc;i Ohui Lip Tint Balm</strong></p>\n\n<p><strong>-&nbsp;</strong>C&acirc;y son dạng thỏi tr&ograve;n, th&acirc;n kim loại rất chắc chắn. M&agrave;u xanh t&iacute;m c&ugrave;ng viền d&agrave;i m&agrave;u đen tạo n&ecirc;n vẻ huyền b&iacute; của thỏi son. OHUI cũng kh&ocirc;ng qu&ecirc;n gắn t&ecirc;n m&igrave;nh nổi bần bật tr&ecirc;n th&acirc;n son.</p>\n\n<p>-&nbsp;Chỉ cần xoay nhẹ, đơn giản l&agrave; c&oacute; thể bật nắp thỏi son. Đường viền đen nối tiếp chạy dọc khung kim loại trắng b&ecirc;n trong nh&igrave;n rất bắt mắt. Kết hợp với m&agrave;u son, tất cả tạo n&ecirc;n vẻ đẹp ngọt ng&agrave;o của Lip Tint Balm.</p>\n\n<p>-&nbsp;Lip Tint Balm c&oacute; m&ugrave;i rất dễ chịu c&ugrave;ng với chất son mịn. Độ b&aacute;m của son rất tốt, cả ng&agrave;y d&agrave;i hoạt động, ăn uống. Thỏi son d&agrave;i cũng l&agrave; một ưu điểm nữa, sử dụng kh&aacute; l&acirc;u mới hết c&acirc;y son.</p>\n\n<p><strong>C&ocirc;ng dụng Son dưỡng m&ocirc;i Ohui Lip Tint Balm</strong></p>\n\n<p><strong>-&nbsp;</strong>Với c&aacute;c th&agrave;nh phần ch&iacute;nh được chiết xuất từ thi&ecirc;n nhi&ecirc;n. Chất son th&acirc;n thiện với đa số c&aacute;c loại m&ocirc;i.</p>\n\n<p>-&nbsp;C&ugrave;ng với đ&oacute; Lip Tint Balm được bổ sung c&aacute;c dưỡng chất đặc biệt. Tăng cường độ ẩm cho da gấp hai lần sản phẩm b&igrave;nh thường. Sẽ kh&ocirc;ng c&ograve;n kh&ocirc; r&aacute;p hay c&aacute;c hiện tượng như nứt,mẻ. Đ&ocirc;i m&ocirc;i sẽ trở n&ecirc;n ấm mịn v&agrave; b&oacute;ng mượt tự nhi&ecirc;n suốt cả ng&agrave;y.</p>\n\n<p>-&nbsp;Đồng thời với chỉ số SPF 10 chống nắng, chống tia tử ngoại ngăn ngừa ung thư da. Bảo vệ l&agrave;n da khỏi c&aacute;c t&aacute;c nh&acirc;n g&acirc;y hại từ m&ocirc;i trường.</p>\n\n<p>-&nbsp;Chất son mịn, c&oacute; độ b&oacute;ng nhất định khi son tạo sự nhẹ nh&agrave;ng v&agrave; quyến rũ cho đ&ocirc;i m&ocirc;i.</p>\n\n<p><strong>Hướng dẫn sử dụng Ohui Lip Tint Balm</strong></p>\n\n<p><strong>-&nbsp;</strong>Xoay thỏi son vừa đủ, thoa đều l&ecirc;n m&ocirc;i. Sử dụng bất cứ l&uacute;c n&agrave;o khi cảm thấy kh&ocirc; m&ocirc;i.</p>\n\n<p>-&nbsp;Nhẹ nh&agrave;ng xoay ngược thỏi son trở lại v&agrave; đậy nắp k&iacute;n sau mỗi lần sử dụng.</p>\n\n<p>-&nbsp;Bảo quản ở nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng mặt trời trực tiếp.</p>',
    650000.00,
    NULL,
    1,
    '2019-12-08 14:58:04',
    '2019-12-08 14:58:04'
),(
    37,
    'Son Môi Thời Thượng Ohui Rouge Real Lipstick 2017 3,5gr',
    'son-moi-thoi-thuong-ohui-rouge-real-lipstick-2017-35gr',
    '/userfiles/images/ohui-rouge-real-lipstick-2017.jpg',
    1,
    '<p>Son m&ocirc;i Ohui Rouge Real Lipstick&nbsp;bổ sung v&agrave; duy tr&igrave; độ ẩm l&ecirc;n đến 6h li&ecirc;n tục. Đồng thời, trẻ h&oacute;a v&agrave; cải thiện l&agrave;n da m&ocirc;i. Mang lại sự ẩm mịn, mềm mại cho l&agrave;n da m&ocirc;i.</p>',
    '<p><strong>Son M&ocirc;i Ohui Rouge Real Lipstick</strong></p>\n\n<p>L&agrave; một trong những d&ograve;ng hot trend của Ohui. M&agrave;u sắc trẻ trung, phản xạ &aacute;nh s&aacute;ng, khả năng dưỡng ẩm, duy tr&igrave; m&agrave;u li&ecirc;n tục. Tất cả c&aacute;c chức năng cần thiết được t&iacute;ch hợp trong một c&acirc;y son cao cấp Ohui Rouge Real Lipstick.</p>\n\n<p><strong>Đặc điểm Son m&ocirc;i Ohui Rouge Real Lipstick</strong></p>\n\n<p><strong>-&nbsp;</strong>C&acirc;y son m&ocirc;i cao cấp được thiết kế dạng thỏi vu&ocirc;ng chắc chắn. V&otilde; son m&agrave;u đen huyền, tạo cảm gi&aacute;c thần b&iacute; huyền ảo, cuốn h&uacute;t.</p>\n\n<p>-&nbsp;Kh&ocirc;ng giống như thiết kế b&ecirc;n ngo&agrave;i, thỏi son b&ecirc;n trong dạng thỏi tr&ograve;n. M&agrave;u đen huyền l&agrave;m bật l&ecirc;n m&agrave;u son ch&iacute;nh của thỏi son. Ch&iacute;nh sự pha trộn của m&agrave;u sắc tạo n&ecirc;n vẻ đẹp ngọt ng&agrave;o, hấp dẫn của c&acirc;y son.</p>\n\n<p>-&nbsp;Rouge Real Lipstick c&oacute; m&ugrave;i thơm tương tự như tinh chất cao cấp Ohui Cell Power No1 Essence. Rất nhẹ nh&agrave;ng, dịu d&agrave;ng. Chất son ẩm mịn v&agrave; dễ chịu khi son l&ecirc;n m&ocirc;i.</p>\n\n<p><strong>C&ocirc;ng dụng Son m&ocirc;i Ohui Rouge Real Lipstick</strong></p>\n\n<p><strong>-&nbsp;</strong>Điểm vượt trội nhất của Rouge Real Lipstick đ&oacute; l&agrave; khả năng phản xạ &aacute;nh s&aacute;ng. Th&agrave;nh phần ngọc trai trong chất son l&agrave;m tăng sắc tố phản quang. M&agrave;u sắc c&agrave;ng trở n&ecirc;n rực rỡ, tạo n&ecirc;n sự quyến rũ cho đ&ocirc;i m&ocirc;i.</p>\n\n<p>-&nbsp;Sự kết hợp độc quyền của Ceramide thực vật v&agrave; th&agrave;nh phần của tinh chất dưỡng da Ohui Cell Power No.1. Chất son c&oacute; khả năng bổ sung v&agrave; duy tr&igrave; độ ẩm l&ecirc;n đến 6h li&ecirc;n tục. Đồng thời, trẻ h&oacute;a v&agrave; cải thiện l&agrave;n da m&ocirc;i. Mang lại sự ẩm mịn, mềm mại cho l&agrave;n da m&ocirc;i.</p>\n\n<p>-&nbsp;Khả năng d&agrave;n trải mềm mượt, lấp đầy m&agrave;u sắc đến từng điểm nhỏ. Ho&agrave;n thiện việc trang điểm chỉ trong 3 gi&acirc;y.</p>\n\n<p><strong>Hướng dẫn sử dụng Son M&ocirc;i Ohui Rouge Real Lipstick</strong></p>\n\n<p><strong>-&nbsp;</strong>D&ugrave;ng cọ hoặc thoa thỏi son trực tiếp l&ecirc;n m&ocirc;i. T&ocirc; từ giữa ra hai b&ecirc;n, bặm nhẹ m&ocirc;i để chất son tan đều ra. Sử dụng bất cứ l&uacute;c n&agrave;o khi cảm thấy kh&ocirc; m&ocirc;i. Đậy nắp k&iacute;n sau mỗi lần sử dụng.</p>\n\n<p>-&nbsp;Bảo quản ở nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng mặt trời trực tiếp.</p>',
    770000.00,
    NULL,
    1,
    '2019-12-08 15:02:28',
    '2019-12-08 15:02:28'
),(
    38,
    'Kem Chống Lão Hóa Ohui Prime Advancer Ampoule Capture Cream',
    'kem-chong-lao-hoa-ohui-prime-advancer-ampoule-capture-cream',
    '/userfiles/images/kem-chong-lao-hoa-ohui-prime-advancer-ampoule-capture-cream-min.jpg',
    1,
    '<p>Kem chống l&atilde;o h&oacute;a Ohui Prime Advancer Ampoule Capture Cream c&oacute; t&aacute;c dụng chống l&atilde;o h&oacute;a, chống nhăn, gi&uacute;p da săn chắc căng b&oacute;ng trắng s&aacute;ng mịn m&agrave;ng như da em b&eacute;. Tinh chất thẩm thấu s&acirc;u v&agrave;o 3 lớp biểu b&igrave;, th&acirc;n b&igrave; v&agrave; hạ b&igrave; để nu&ocirc;i dưỡng da từ gốc cho bạn l&agrave;n da khỏe, đẹp tự nhi&ecirc;n một c&aacute;ch bền vững.</p>',
    '<p>Kem chống l&atilde;o h&oacute;a Ohui Prime Advancer Ampoule Capture Cream giữ cho phần cốt l&otilde;i của da lu&ocirc;n được vững chắc. Đồng thời, nu&ocirc;i dưỡng từ s&acirc;u b&ecirc;n trong tăng cường khả năng bảo vệ da, giữ da lu&ocirc;n tươi trẻ, khỏe mạnh trước c&aacute;c t&aacute;c động c&oacute; hại như stress, tia cực t&iacute;m UV hay kh&oacute;i bụi, m&ocirc;i trường &ocirc; nhiễm b&ecirc;n ngo&agrave;i.</p>\n\n<p>Kem dưỡng chống l&atilde;o h&oacute;a, chống nhăn, gi&uacute;p da săn chắc căng b&oacute;ng trắng s&aacute;ng mịn m&agrave;ng như da em b&eacute;, thẩm thấu s&acirc;u v&agrave;o 3 lớp biểu b&igrave;, th&acirc;n b&igrave; v&agrave; hạ b&igrave; nu&ocirc;i dưỡng da từ gốc cho bạn l&agrave;n da khỏe v&agrave; đẹp tự nhi&ecirc;n một c&aacute;ch bền vững.</p>\n\n<p><strong>C&ocirc;ng dụng kem chống l&atilde;o h&oacute;a Ohui Prime Advancer Ampoule Capture Cream</strong></p>\n\n<p><strong>-&nbsp;</strong>L&agrave;m mềm, dưỡng ẩm v&agrave; trắng da</p>\n\n<p>-&nbsp;Trẻ ho&aacute; da, chống l&atilde;o ho&aacute;</p>\n\n<p>-&nbsp;L&agrave;m săn chắc da</p>\n\n<p>-&nbsp;Phục hồi da sau tổn thương</p>\n\n<p>- Giữ ẩm cho da</p>\n\n<p>-&nbsp;Ngăn ngừa mụn</p>\n\n<p><strong>Hướng dẫn sử dụng kem chống l&atilde;o h&oacute;a Ohui&nbsp;Prime Advancer Ampoule Capture Cream</strong></p>\n\n<p>-&nbsp;Sau khi rửa mặt sạch, sử dụng nước hoa hồng c&acirc;n bằng da, lấy một lượng vừa đủ tinh chất dưỡng thoa đều l&ecirc;n mặt vỗ nhẹ để cho serum c&oacute; thể thẩm thấu v&agrave;o b&ecirc;n trong da một c&aacute;ch tốt nhất, trước khi b&ocirc;i kem dưỡng ẩm.</p>\n\n<p>-&nbsp;Sản phẩm ph&ugrave; hợp với mọi loại da, kể cả l&agrave;n da yếu v&agrave; nhạy cảm nhất.</p>\n\n<p><strong>Combo 10 g&oacute;i = 80.000đ</strong></p>',
    100000.00,
    80000.00,
    1,
    '2019-12-08 15:41:50',
    '2019-12-08 15:41:50'
),(
    39,
    'Nước Hoa Hồng Chống Lão Hóa Ohui Age Recovery Skin Softener 150ml',
    'nuoc-hoa-hong-chong-lao-hoa-ohui-age-recovery-skin-softener-150ml',
    '/userfiles/images/Ohui-Age-Recovery-Skin-Softener.png',
    1,
    '<p>Nước hoa hồng chống l&atilde;o h&oacute;a Ohui Age Recovery Skin Softenner&nbsp;dạng sữa đậm đặc, kết cấu như tinh chất, gi&agrave;u th&agrave;nh phần dưỡng chất thiết yếu gi&uacute;p chăm s&oacute;c nền tảng l&agrave;n da v&agrave; cải thiện nếp nhăn. gi&uacute;p l&agrave;m sạch s&acirc;u cho da.</p>',
    '<p>Nước hoa hồng chống l&atilde;o h&oacute;a cải thiện nếp nhăn Ohui Age Recovery Skin Softenner<br />\nD&ograve;ng sản phẩm Age Recovery được sản xuất nhằm chăm s&oacute;c đặc biệt cho d&ograve;ng da cần được chống l&atilde;o h&oacute;a v&agrave; giữ cho l&agrave;n da trẻ trung v&agrave; săn chắc hơn.<br />\nNước hoa hồng Ohui Age Recovery Skin Softenner dạng sữa đậm đặc, kết cấu như tinh chất, gi&agrave;u th&agrave;nh phần dưỡng chất thiết yếu gi&uacute;p chăm s&oacute;c nền tảng l&agrave;n da v&agrave; cải thiện nếp nhăn, gi&uacute;p l&agrave;m sạch s&acirc;u cho da.<br />\nCung cấp bổ sung lại lượng Baby Collagen đ&atilde; bị mất đi, l&agrave;m giảm sự xuất hiện c&aacute;c nếp nhăn v&agrave; tăng cường độ đ&agrave;n hồi cho da. Cung cấp độ ẩm cho da, gi&uacute;p cho da khỏe mạnh, mềm mại, mịn m&agrave;ng v&agrave; trẻ trung.<br />\n<br />\n<strong>Baby Collagen:</strong> chứa trong tất cả c&aacute;c sản phẩm của Age Recovery &ndash; l&agrave; nghi&ecirc;n cứu độc quyền thuộc sở hữu của h&atilde;ng mỹ phẩm OHUI.<br />\n<strong>Baby Collagen:</strong> c&oacute; rất nhiều trong da cơ thể ch&uacute;ng ta khi c&ograve;n b&eacute;, c&ograve;n trẻ nhưng khi c&agrave;ng lớn l&ecirc;n theo thời gian th&igrave; lượng collagen n&agrave;y sẽ giảm dần v&agrave; mất đi &ndash; khiến da xuất hiện c&aacute;c nếp nhăn, chảy xệ v&agrave; kh&ocirc;ng c&ograve;n sự đ&agrave;n hồi săn chắc.</p>\n\n<p><strong>Hướng dẫn sử dụng</strong><br />\n<br />\nLấy một lượng nhỏ vừa đủ sản phẩm, nhẹ nh&agrave;ng thoa đều từ trong ra ngo&agrave;i tr&ecirc;n bề mặt da để sản phẩm được hấp thụ tối ưu.<br />\n&nbsp;</p>',
    1100000.00,
    NULL,
    1,
    '2019-12-08 15:46:52',
    '2019-12-08 15:46:52'
),(
    41,
    'Kem Dưỡng Mắt Chống Lão Hóa Ohui Age Recovery Eye Cream',
    'kem-duong-mat-chong-lao-hoa-ohui-age-recovery-eye-cream',
    '/userfiles/images/Ohui-Age-Recovery-Eye-Cream.png',
    1,
    '<p>Kem dưỡng mắt chống l&atilde;o h&oacute;a Ohui Age Recovery Eye Cream (20ml &amp;&amp; 50ml) c&oacute; t&aacute;c dụng giảm nếp nhăn v&agrave; th&acirc;m quầng quanh v&ugrave;ng mắt. Cung cấp độ ẩm cao để phục hồi độ đ&agrave;n hồi cho những v&ugrave;ng da bị ch&ugrave;ng.V&ugrave;ng da quanh mắt sẽ mềm mại hơn, mượt m&agrave; hơn v&agrave; trẻ hơn.</p>',
    '<p><strong>Kem Dưỡng Mắt Chống L&atilde;o H&oacute;a Ohui Age Recovery Eye Cream</strong></p>\n\n<p><strong>-&nbsp;</strong>Khi được sinh ra, ch&uacute;ng ta c&oacute; một nguồn collagen lớn. Da của ch&uacute;ng ta mềm mại, mịn m&agrave;ng, hồng h&agrave;o v&agrave; đ&agrave;n hồi tốt &ndash; nhờ v&agrave;o collagen c&oacute; trong lớp hạ b&igrave;.Cơ thể ch&uacute;ng ta ngưng sản xuất collagen từ khoảng 25 tuổi. Sau đ&oacute; khoảng 30 tuổi, lượng collagen bắt đầu suy giảm, v&agrave; c&aacute;c nếp nhắn bắt đầu xuất hiện tr&ecirc;n khu&ocirc;n mặt ch&uacute;ng ta. Sau 30 tuổi, mức giảm collagen l&agrave; 1 &ndash; 2% mỗi năm.Ở tuổi 40, ch&uacute;ng ta mất khoảng 10 &ndash; 20% collagen v&agrave; cứ thể da ch&uacute;ng ta sẽ xuất hiện c&aacute;c dấu hiệu l&atilde;o h&oacute;a nhiều hơn.V&ugrave;ng da quanh mắt l&agrave; v&ugrave;ng da mỏng manh nhất n&ecirc;n c&oacute; xu hướng dễ bị nhăn, bọng mắt, th&acirc;m quầng.Kem dưỡng mắt Ohui Age Recovery Eye Cream c&oacute; chứa Baby collagen tương tự collagen v&ugrave;ng mắt. C&oacute; t&aacute;c dụng giảm nếp nhăn v&agrave; th&acirc;m quầng quanh v&ugrave;ng mắt. Cung cấp độ ẩm cao để phục hồi độ đ&agrave;n hồi cho những v&ugrave;ng da bị ch&ugrave;ng.V&ugrave;ng da quanh mắt sẽ mềm mại hơn, mượt m&agrave; hơn v&agrave; trẻ hơn.</p>\n\n<p><strong>Hướng dẫn sử dụng&nbsp;</strong></p>\n\n<p>-&nbsp;Sau khi sử dụng sửa dưỡng, lấy một lượng vừa đủ bằng ng&oacute;n &aacute;p &uacute;t.</p>\n\n<p>-&nbsp;Chờ một ch&uacute;t cho kem hơi tan ra bằng nhiệt độ của ng&oacute;n tay.</p>\n\n<p>-&nbsp;Nhẹ nh&agrave;ng chấm l&ecirc;n v&ugrave;ng da quanh mắt để kem thẩm thấu.</p>',
    1900000.00,
    NULL,
    1,
    '2019-12-08 15:54:44',
    '2019-12-08 15:54:44'
),(
    42,
    'Tinh Chất Cải Thiện Nếp Nhăn Chống Lão Hóa Ohui Age Recovery Essence 45ml',
    'tinh-chat-cai-thien-nep-nhan-chong-lao-hoa-ohui-age-recovery-essence-45ml',
    '/userfiles/images/Ohui-Age-Recovery-Skin-Softener.png',
    1,
    '<p>Sản phẩm n&agrave;y l&agrave; một tinh chất gi&uacute;p hồi phục l&agrave;n da trẻ trung v&agrave; săn chắc bằng c&aacute;ch l&agrave;m đầy collagen trẻ giảm đi c&ugrave;ng với những năm tiếp theo. N&oacute; c&oacute; chứa th&agrave;nh phần collagen giống như l&agrave; da của ch&uacute;ng ta, v&igrave; vậy n&oacute; d&iacute;nh chặt v&agrave;o da của ch&uacute;ng ta khi ứng dụng. N&oacute; c&oacute; chức năng cao nhưng nhẹ, kh&ocirc;ng d&agrave;y, th&iacute;ch hợp để sử dụng suốt bốn m&ugrave;a chống l&atilde;o h&oacute;a.</p>',
    '<p><strong>Tinh Chất Cải Thiện Nếp Nhăn chống l&atilde;o h&oacute;a Ohui Age Recovery Essence</strong></p>\n\n<p>-&nbsp;Khi được sinh ra, ch&uacute;ng ta c&oacute; một nguồn collagen lớn. Da của ch&uacute;ng ta mềm mại, mịn m&agrave;ng, hồng h&agrave;o v&agrave; đ&agrave;n hồi tốt &ndash; nhờ v&agrave;o collagen c&oacute; trong lớp hạ b&igrave;.</p>\n\n<p>-&nbsp;Cơ thể ch&uacute;ng ta ngưng sản xuất collagen từ khoảng 25 tuổi. Sau đ&oacute; khoảng 30 tuổi, lượng collagen bắt đầu suy giảm, v&agrave; c&aacute;c nếp nhắn bắt đầu xuất hiện tr&ecirc;n khu&ocirc;n mặt ch&uacute;ng ta. Sau 30 tuổi, mức giảm collagen l&agrave; 1 &ndash; 2% mỗi năm.</p>\n\n<p>-&nbsp;Ở tuổi 40, ch&uacute;ng ta mất khoảng 10 &ndash; 20% collagen v&agrave; cứ thể da ch&uacute;ng ta sẽ xuất hiện c&aacute;c dấu hiệu l&atilde;o h&oacute;a nhiều hơn.</p>\n\n<p>-&nbsp;Tinh chất Ohui Age Recovery Essence thuộc d&ograve;ng sản phẩm chống l&atilde;o h&oacute;a của Ohui. C&ocirc;ng nghệ Baby collagen m&agrave; Ohui &aacute;p dụng trong d&ograve;ng sản phẩm đặc biệt n&agrave;y sẽ gi&uacute;p cải thiện v&agrave; ngăn ngừa c&aacute;c dấu hiệu l&atilde;o h&oacute;a tr&ecirc;n da. Cung cấp độ ẩm, gi&uacute;p da khỏe mạnh, phục hồi độ đ&agrave;n hồi v&agrave; săn chắc như da em b&eacute;. Sản phẩm bổ sung một lượng Baby collagen giống như collagen trong da, v&igrave; vậy collagen sẽ được bổ sung ngay khi sử dụng.</p>\n\n<p>-&nbsp;Chai sử dụng đầu bơm. Mặc d&ugrave; l&agrave; tinh chất c&oacute; nhiều dinh dưỡng nhưng dung dịch rất mềm mịn v&agrave; thẩm thấu nhanh. Cho cảm gi&aacute;c mượt m&agrave;, l&aacute;ng mịn ngay khi vừa sử dụng.</p>\n\n<p><strong>Hướng dẫn sử dụng</strong></p>\n\n<p><strong>-&nbsp;</strong>Nhấn đầu bơm 2 lần để lấy một lượng sản phẩm v&agrave;o l&ograve;ng b&agrave;n tay.</p>\n\n<p><strong>-&nbsp;</strong>Thoa đều l&ecirc;n to&agrave;n bộ mặt theo chiều kết cấu da. Vỗ nhẹ bằng 2 tay v&agrave; m&aacute;t xa để tinh chất thẩm thấu v&agrave;o da.2</p>',
    2500000.00,
    NULL,
    1,
    '2019-12-08 15:58:32',
    '2019-12-08 15:58:32'
),(
    43,
    'Sữa Dưỡng Chống Lão Hóa Cải Thiện Nếp Nhăn Ohui Age Recovery Emulsion 130ml',
    'sua-duong-chong-lao-hoa-cai-thien-nep-nhan-ohui-age-recovery-emulsion-130ml',
    '/userfiles/images/Ohui-Age-Recovery-Skin-Softener.png',
    1,
    '<p>Sữa dưỡng c&oacute; t&iacute;nh năng cải thiện nếp nhăn da với c&aacute;c th&agrave;nh phần th&acirc;n thiện với da với baby collagen v&agrave; axit b&eacute;o tạo n&ecirc;n kết cấu sản phẩm mềm mại v&agrave; ẩm mượt vượt bậc, ngay khi thoa, nhiệt độ của l&agrave;n da sẽ gi&uacute;p sản phẩm tản chảy nhẹ nh&agrave;ng tr&ecirc;n da, cung cấp c&aacute;c th&agrave;nh phần dưỡng chất thiết yếu nhằm tạo điều kiện tối ưu nhất cho da v&agrave; ngăn ngừa l&atilde;o ho&aacute;.</p>',
    '<p>Nước hoa hồng chống l&atilde;o h&oacute;a cải thiện nếp nhăn Ohui Age Recovery Skin Softenner<br />\nD&ograve;ng sản phẩm Age Recovery được sản xuất nhằm chăm s&oacute;c đặc biệt cho d&ograve;ng da cần được chống l&atilde;o h&oacute;a v&agrave; giữ cho l&agrave;n da trẻ trung v&agrave; săn chắc hơn.<br />\nNước hoa hồng Ohui Age Recovery Skin Softenner dạng sữa đậm đặc, kết cấu như tinh chất, gi&agrave;u th&agrave;nh phần dưỡng chất thiết yếu gi&uacute;p chăm s&oacute;c nền tảng l&agrave;n da v&agrave; cải thiện nếp nhăn, gi&uacute;p l&agrave;m sạch s&acirc;u cho da.<br />\nCung cấp bổ sung lại lượng Baby Collagen đ&atilde; bị mất đi, l&agrave;m giảm sự xuất hiện c&aacute;c nếp nhăn v&agrave; tăng cường độ đ&agrave;n hồi cho da. Cung cấp độ ẩm cho da, gi&uacute;p cho da khỏe mạnh, mềm mại, mịn m&agrave;ng v&agrave; trẻ trung.<br />\n<br />\n<strong>Baby Collagen:</strong>&nbsp;chứa trong tất cả c&aacute;c sản phẩm của Age Recovery &ndash; l&agrave; nghi&ecirc;n cứu độc quyền thuộc sở hữu của h&atilde;ng mỹ phẩm OHUI.<br />\n<strong>Baby Collagen:</strong>&nbsp;c&oacute; rất nhiều trong da cơ thể ch&uacute;ng ta khi c&ograve;n b&eacute;, c&ograve;n trẻ nhưng khi c&agrave;ng lớn l&ecirc;n theo thời gian th&igrave; lượng collagen n&agrave;y sẽ giảm dần v&agrave; mất đi &ndash; khiến da xuất hiện c&aacute;c nếp nhăn, chảy xệ v&agrave; kh&ocirc;ng c&ograve;n sự đ&agrave;n hồi săn chắc.</p>\n\n<p><strong>Hướng dẫn sử dụng</strong><br />\n<br />\nLấy một lượng nhỏ vừa đủ sản phẩm, nhẹ nh&agrave;ng thoa đều từ trong ra ngo&agrave;i tr&ecirc;n bề mặt da để sản phẩm được hấp thụ tối ưu.</p>',
    1400000.00,
    NULL,
    1,
    '2019-12-08 16:00:54',
    '2019-12-08 16:00:54'
),(
    44,
    'Set kem dưỡng chống lão hóa Ohui Age Recovery Cream',
    'set-kem-duong-chong-lao-hoa-ohui-age-recovery-cream',
    '/userfiles/images/Set-kem-d%C6%B0%E1%BB%A1ng-ch%E1%BB%91ng-l%C3%A3o-h%C3%B3a-Ohui-Age-Recovery.jpg',
    1,
    '<p>Set kem dưỡng chống l&atilde;o h&oacute;a Ohui Age Recovery Cream với 3 chức năng ch&iacute;nh l&agrave; chống nhăn, gi&uacute;p săn chắc l&agrave;n da v&agrave; n&acirc;ng cơ chống chảy sệ.</p>',
    '<p><strong>Set kem dưỡng chống l&atilde;o h&oacute;a Ohui Age Recovery Cream với Baby Collagen&trade;</strong></p>\n\n<p>Bộ sản phẩm với 3 chức năng ch&iacute;nh l&agrave; chống nhăn, gi&uacute;p săn chắc l&agrave;n da v&agrave; n&acirc;ng cơ chống chảy sệ.</p>\n\n<p>Ohui Age Recovery &aacute;p dụng c&ocirc;ng nghệ baby colagen&trade; l&agrave; d&ograve;ng sản phẩm chống l&atilde;o h&oacute;a đặc biệt giữ cho da trẻ trung v&agrave; săn chắc hơn bằng c&aacute;ch bổ sung collagen baby cho da đ&atilde; bị mất đi trong qu&aacute; tr&igrave;nh l&atilde;o h&oacute;a</p>\n\n<p><strong>Bộ sản phẩm đặc biệt gồm</strong></p>\n\n<p><strong>-&nbsp;</strong>Age Recovery Cream 50ml: Kem dưỡng c&ocirc; đặc gi&uacute;p cải thiện nếp nhăn</p>\n\n<p>-&nbsp;Age Recovery Essential Skin Softener 20ml: Nước hoa hồng dưỡng da ẩm mịn v&agrave; ngăn ngừa nếp nhăn</p>\n\n<p>-&nbsp;Age Recovery Essential Emulsion 20ml: Sữa dưỡng cung cấp ẩm ngăn ngừa l&atilde;o h&oacute;a da</p>\n\n<p>-&nbsp;Age Recovery Eye Cream 5ml: Kem dưỡng chăm s&oacute;c nếp nhăn v&ugrave;ng mắt</p>\n\n<p>-&nbsp;Age Recovery Essence 20ml: Tinh chất baby collagen gi&uacute;p ngăn ngừa l&agrave;n da l&atilde;o h&oacute;a v&agrave; cải thiện c&aacute;c tế b&agrave;o bị nhăn</p>\n\n<p>-&nbsp;Extreme White Foam 40ml: Sữa rửa mặt dưỡng trắng da.</p>',
    2300000.00,
    NULL,
    1,
    '2019-12-08 16:05:45',
    '2019-12-08 16:05:45'
),(
    45,
    'Tinh Chất Chống Lão Hóa Ohui Prime Advancer Ampoule Serum 50ml',
    'tinh-chat-chong-lao-hoa-ohui-prime-advancer-ampoule-serum-50ml',
    '/userfiles/images/Tinh-Ch%E1%BA%A5t-Ch%E1%BB%91ng-L%C3%A3o-H%C3%B3a-Ohui-Prime-Advancer-Ampoule-Serum-50ml-2.png',
    1,
    '<p>Tinh Chất Chống L&atilde;o H&oacute;a Ohui Prime Advancer Ampoule Serum c&oacute; t&aacute;c dụng&nbsp;chống l&atilde;o h&oacute;a, chống nhăn, gi&uacute;p da săn chắc căng b&oacute;ng trắng s&aacute;ng mịn m&agrave;ng như da em b&eacute;. Tinh chất thẩm thấu s&acirc;u v&agrave;o 3 lớp biểu b&igrave;, th&acirc;n b&igrave; v&agrave; hạ b&igrave; để nu&ocirc;i dưỡng da từ gốc cho bạn một l&agrave;n da khỏe v&agrave; đẹp tự nhi&ecirc;n một c&aacute;ch bền vững.</p>',
    '<p>Tinh Chất Chống L&atilde;o H&oacute;a Ohui Prime Advancer Ampoule Serum c&oacute; t&aacute;c dụng chống l&atilde;o h&oacute;a, chống nhăn, gi&uacute;p da săn chắc căng b&oacute;ng trắng s&aacute;ng mịn m&agrave;ng như da em b&eacute;. Tinh chất thẩm thấu s&acirc;u v&agrave;o 3 lớp biểu b&igrave;, th&acirc;n b&igrave; v&agrave; hạ b&igrave; để nu&ocirc;i dưỡng da từ gốc cho bạn một l&agrave;n da khỏe v&agrave; đẹp tự nhi&ecirc;n một c&aacute;ch bền vững.</p>\n\n<p><strong>C&ocirc;ng dụng Tinh Chất Chống L&atilde;o H&oacute;a Ohui Prime Advancer Ampoule Serum</strong></p>\n\n<p><strong>-&nbsp;</strong>L&agrave;m mềm v&agrave; trắng da</p>\n\n<p>-&nbsp;Chống l&atilde;o h&oacute;a, l&agrave;m trẻ h&oacute;a da</p>\n\n<p>-&nbsp;L&agrave;m săn chắc da</p>\n\n<p>-&nbsp;Phục hồi da sau tổn thương</p>\n\n<p>- Giữ ẩm cho da</p>\n\n<p><strong>Bộ sản phẩm Tinh Chất Chống L&atilde;o H&oacute;a Ohui Prime Advancer Ampoule Serum bao gồm </strong></p>\n\n<p><strong>-&nbsp;</strong>Tinh chất chống l&atilde;o h&oacute;a: 50ml</p>\n\n<p>-&nbsp;Bảng son l&igrave; ohui 3 m&agrave;u</p>\n\n<p>-&nbsp;Nước hoa hồng 20ml</p>\n\n<p>-&nbsp;Sữa dưỡng 20ml</p>\n\n<p>- Kem dưỡng 7ml</p>\n\n<p>-&nbsp;Kem mắt 5ml</p>\n\n<p><strong>Hướng dẫn sử dụng Tinh Chất Chống L&atilde;o H&oacute;a Ohui Prime Advancer Ampoule Serum</strong></p>\n\n<p>-&nbsp;Sau khi rửa mặt sạch v&agrave; sử dụng nước hoa hồng c&acirc;n bằng da, lấy 1 lượng vừa đủ tinh chất dưỡng thoa đều l&ecirc;n mặt v&agrave; vỗ nhẹ để cho serum c&oacute; thể thẩm thấu v&agrave;o b&ecirc;n trong da một c&aacute;ch tốt nhất, trước khi b&ocirc;i kem dưỡng ẩm.</p>\n\n<p>-&nbsp;Sản phẩm ph&ugrave; hợp với mọi loại da, kể cả l&agrave;n da yếu v&agrave; nhạy cảm nhất.</p>',
    2350000.00,
    2100000.00,
    1,
    '2019-12-08 16:11:42',
    '2019-12-08 16:11:42'
),(
    46,
    'Tinh Chất Chống Lão Hóa Ohui Prime Advancer Ampoule Serum',
    'tinh-chat-chong-lao-hoa-ohui-prime-advancer-ampoule-serum',
    '/userfiles/images/Tinh-Ch%E1%BA%A5t-Ch%E1%BB%91ng-L%C3%A3o-H%C3%B3a-Ohui-Prime-Advancer-Ampoule-Serum.png',
    1,
    '<p>Tinh Chất Chống L&atilde;o H&oacute;a Ohui Prime Advancer Ampoule Serum c&oacute; t&aacute;c dụng&nbsp;chống l&atilde;o h&oacute;a, chống nhăn, gi&uacute;p da săn chắc căng b&oacute;ng trắng s&aacute;ng mịn m&agrave;ng như da em b&eacute;. Tinh chất thẩm thấu s&acirc;u v&agrave;o 3 lớp biểu b&igrave;, th&acirc;n b&igrave; v&agrave; hạ b&igrave; để nu&ocirc;i dưỡng da từ gốc cho bạn một l&agrave;n da khỏe v&agrave; đẹp tự nhi&ecirc;n một c&aacute;ch bền vững.</p>',
    '<p>Tinh Chất Chống L&atilde;o H&oacute;a Ohui Prime Advancer Ampoule Serum c&oacute; t&aacute;c dụng chống l&atilde;o h&oacute;a, chống nhăn, gi&uacute;p da săn chắc căng b&oacute;ng trắng s&aacute;ng mịn m&agrave;ng như da em b&eacute;. Tinh chất thẩm thấu s&acirc;u v&agrave;o 3 lớp biểu b&igrave;, th&acirc;n b&igrave; v&agrave; hạ b&igrave; để nu&ocirc;i dưỡng da từ gốc cho bạn một l&agrave;n da khỏe v&agrave; đẹp tự nhi&ecirc;n một c&aacute;ch bền vững.</p>\n\n<p><strong>C&ocirc;ng dụng Tinh Chất Chống L&atilde;o H&oacute;a Ohui Prime Advancer Ampoule Serum</strong></p>\n\n<p>-&nbsp;L&agrave;m mềm v&agrave; trắng da</p>\n\n<p>-&nbsp;Chống l&atilde;o h&oacute;a, l&agrave;m trẻ h&oacute;a da</p>\n\n<p>-&nbsp;L&agrave;m săn chắc da</p>\n\n<p>-&nbsp;Phục hồi da sau tổn thương</p>\n\n<p>-&nbsp;Giữ ẩm cho da</p>\n\n<p><strong>Hướng dẫn sử dụng Tinh Chất Chống L&atilde;o H&oacute;a Ohui Prime Advancer Ampoule Serum</strong></p>\n\n<p>-&nbsp;Sau khi rửa mặt sạch v&agrave; sử dụng nước hoa hồng c&acirc;n bằng da, lấy 1 lượng vừa đủ tinh chất dưỡng thoa đều l&ecirc;n mặt v&agrave; vỗ nhẹ để cho serum c&oacute; thể thẩm thấu v&agrave;o b&ecirc;n trong da một c&aacute;ch tốt nhất, trước khi b&ocirc;i kem dưỡng ẩm.</p>\n\n<p>-&nbsp;Sản phẩm ph&ugrave; hợp với mọi loại da, kể cả l&agrave;n da yếu v&agrave; nhạy cảm nhất.</p>\n\n<p><strong>Combo 10 g&oacute;i = 80.000đ</strong></p>',
    100000.00,
    80000.00,
    1,
    '2019-12-08 16:16:18',
    '2019-12-08 16:16:18'
),(
    47,
    'Set Nước Hoa Hồng Sữa Dưỡng Chống Lão Hóa Ohui Prime Advancer',
    'set-nuoc-hoa-hong-sua-duong-chong-lao-hoa-ohui-prime-advancer',
    '/userfiles/images/Nuoc-Hoa-Hong-Sua-Duong-Ohui-Chong-Lao-Hoa.png',
    1,
    '<p>Set nước hoa hồng sữa dưỡng Ohui Prime Advancer l&agrave; ch&igrave;a kh&oacute;a cho l&agrave;n da căng b&oacute;ng, khỏe đẹp rạng rỡ&nbsp;gi&uacute;p da săn chắc, căng b&oacute;ng trắng s&aacute;ng mịn m&agrave;ng như da em b&eacute;&nbsp;gi&uacute;p da săn chắc, căng b&oacute;ng trắng s&aacute;ng mịn m&agrave;ng như da em b&eacute;. Serum thẩm thấu s&acirc;u v&agrave;o 3 lớp biểu b&igrave;, th&acirc;n b&igrave; v&agrave; hạ b&igrave; để nu&ocirc;i&nbsp;dưỡng&nbsp;da từ gốc cho bạn một l&agrave;n da khỏe v&agrave; đẹp tự nhi&ecirc;n.</p>',
    '<p><strong>Set nước hoa hồng sữa dưỡng Prime Advancer</strong><br />\nSet nước hoa hồng sữa dưỡng Ohui Prime Advancer l&agrave; ch&igrave;a kh&oacute;a cho l&agrave;n da căng b&oacute;ng, khỏe đẹp rạng rỡ gi&uacute;p da săn chắc, căng b&oacute;ng trắng s&aacute;ng mịn m&agrave;ng như da em b&eacute;. Serum thẩm thấu s&acirc;u v&agrave;o 3 lớp biểu b&igrave;, th&acirc;n b&igrave; v&agrave; hạ b&igrave; để nu&ocirc;i dưỡng da từ gốc cho bạn một l&agrave;n da khỏe v&agrave; đẹp tự nhi&ecirc;n.<br />\nSet dưỡng cải thiện nếp nhăn, chống l&atilde;o ho&aacute;, si&ecirc;u cấp ẩm cho da thiếu nước, se kh&iacute;t lỗ ch&acirc;n l&ocirc;ng v&agrave; điều tiết dầu tr&ecirc;n da gi&uacute;p thẩm thấu nhanh, kh&ocirc;ng g&acirc;y nhờn d&iacute;nh khi sử dụng, kh&ocirc;ng k&iacute;ch ứng da.</p>\n\n<p><br />\n<strong>C&ocirc;ng dụng sản phẩm</strong><br />\n- Bổ sung ẩm gi&uacute;p da ẩm mịn, mượt m&agrave;.<br />\n- Cải thiện độ đ&agrave;n hồi cho da lu&ocirc;n được săn chắc<br />\n- L&agrave;m trắng s&aacute;ng gi&uacute;p da khỏe mạnh, trong suốt<br />\n- Hiệu chỉnh nếp da, phục hồi da sau tổn thương<br />\n- Trẻ ho&aacute; da chống l&atilde;o ho&aacute;, l&agrave;m săn chắc da, phục hồi da sau tổn thương&nbsp;<br />\n- Sản phẩm d&ugrave;ng được cho mọi loại da, kể cả da yếu nhạy cảm, da bị hư tổn do kem trộn&nbsp;<br />\n<strong>&nbsp;<br />\nSản phẩm bao gồm&nbsp;</strong><br />\n- Nước hoa hồng Ohui Prime Advancer Skin Softene 150ml + 20ml&nbsp;<br />\n- Sữa dưỡng&nbsp;Ohui Prime Advancer Emulsion 150ml + 20ml<br />\n- Kem dưỡng Ohui Prime Advancer Cream 7ml&nbsp;<br />\n- Tinh chất Ohui Prime Advancer Ampoule Serum&nbsp;10ml&nbsp;<br />\n<strong>Hướng dẫn sử dụng</strong></p>\n\n<p><strong>-&nbsp;</strong>Ban ng&agrave;y: Nước hoa hồng &ndash; Tinh chất &ndash; Sữa dưỡng<br />\n- Ban đ&ecirc;m : Nước hoa hồng &ndash; Tinh chất &ndash; Sữa dưỡng &ndash; Kem dưỡng<br />\n&nbsp;</p>',
    1950000.00,
    NULL,
    1,
    '2019-12-08 16:28:00',
    '2019-12-08 16:28:00'
);
/*!40000
ALTER TABLE
    `products` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `social_accounts`
    --

LOCK TABLES
    `social_accounts` WRITE;
    /*!40000
ALTER TABLE
    `social_accounts` DISABLE KEYS */;
INSERT INTO `social_accounts`
VALUES(
    1,
    2,
    '807265696359073',
    'facebook',
    '2019-12-06 16:58:05',
    '2019-12-06 16:58:05'
),(
    2,
    11,
    '102374064735414807970',
    'google',
    '2019-12-06 17:02:15',
    '2019-12-06 17:02:15'
),(
    3,
    13,
    '10150076600991724',
    'facebook',
    '2019-12-09 07:43:53',
    '2019-12-09 07:43:53'
);
/*!40000
ALTER TABLE
    `social_accounts` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `status`
    --

LOCK TABLES
    `status` WRITE;
    /*!40000
ALTER TABLE
    `status` DISABLE KEYS */;
INSERT INTO `status`
VALUES(1, 'Chờ xác nhận', NULL, NULL),(2, 'Đang giao hàng', NULL, NULL),(3, 'Đơn hàng bị hủy', NULL, NULL),(
    4,
    'Đơn hàng thành công',
    NULL,
    NULL
);
/*!40000
ALTER TABLE
    `status` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `users`
    --

LOCK TABLES
    `users` WRITE;
    /*!40000
ALTER TABLE
    `users` DISABLE KEYS */;
INSERT INTO `users`
VALUES(
    1,
    'admin@gmail.com',
    '$2y$10$fkzGlazEMbXp9enLdjcJI.g.MxFpVPAfTWZROE4Z.I6UjA4qFyj9a',
    498595,
    'ohuivietnam',
    NULL,
    1,
    500,
    0,
    '37R3uAODWcwAV4iTx1oiab9KKIu5y9iKr6a59FnUyJBmXxy5hPJ1Zm3FbLSA',
    NULL,
    '2019-12-09 17:05:51'
),(
    2,
    'luongnd2286@gmail.com',
    NULL,
    48,
    'FwIm5HfP4FcS',
    '/uploads/avatars/1575478135.IMG_0701.JPG',
    1,
    300,
    1,
    'p7Z6J4btDovdJOa9IvrvZBTRmRMZ8xqfNcvtXehAQ2iGqCTH2pVKVhsvvcKT',
    '2019-11-23 02:38:33',
    '2019-12-08 14:49:47'
),(
    4,
    'tuananhnguyen199dz@gmail.com',
    NULL,
    0,
    '2KEjB9Eo6g71',
    NULL,
    1,
    1,
    0,
    'i4vMG70S5SKgRSpduk6QOIyk3y5Nqc2wiP7RJ6OAItp7hKltYIxGUIikuZIR',
    '2019-11-30 23:52:02',
    '2019-11-30 23:52:02'
),(
    5,
    'huynhthuanvugia@gmail.com',
    NULL,
    0,
    'FO2lpS0iar21',
    NULL,
    1,
    1,
    0,
    'dVfyAGgxaG6qq8pWXu7KnQarcIq5RVQATz5Dd2hdiKvbmlxvAs6tkG7yORyM',
    '2019-12-01 00:37:00',
    '2019-12-01 00:37:00'
),(
    11,
    'luongndph06219@fpt.edu.vn',
    '$2y$10$JHZ6M.GszgMJkN2aILMfreerPGVtq8qCWUkJJl94IpInDDdcYxTRC',
    0,
    '7e1mxcxf5CbA',
    NULL,
    1,
    1,
    0,
    'tmwHHuOv6UC50tKRIbDJEu06mBmVfelrrFGlUtugFQllYw6mJ3c651DeRfVD',
    '2019-12-06 17:02:15',
    '2019-12-06 17:02:15'
),(
    13,
    'geogatedproject228@gmail.com',
    '$2y$10$fh9L.r0TokB6CB0rrrkVAOLD2capbV0VEl1KoLM.YNTT7ZDzNWKK6',
    0,
    'cPr03mLJrcSi',
    NULL,
    1,
    1,
    0,
    'oCrVkljl5hmW9tKhxREuyytZJD5THlb22g1OHhVAar3vKgBxooG7uCQSuEd9',
    '2019-12-09 07:43:53',
    '2019-12-09 07:43:53'
);
/*!40000
ALTER TABLE
    `users` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `vouchers`
    --

LOCK TABLES
    `vouchers` WRITE;
    /*!40000
ALTER TABLE
    `vouchers` DISABLE KEYS */;
INSERT INTO `vouchers`
VALUES(
    1,
    1,
    'Mg4MQYGG1r',
    'Giảm giá 10% cho đơn hàng',
    'percent',
    10,
    -1,
    '2019-11-22 17:21:33',
    NULL
),(
    2,
    1,
    'swaM4FxWny',
    'Giảm giá 50000 VNĐ',
    'total',
    50000,
    -1,
    '2019-11-22 17:21:38',
    NULL
),(
    3,
    2,
    'lwIwrMKj5N',
    'Giảm giá 5% cho đơn hàng',
    'percent',
    5,
    1,
    '2019-11-23 02:42:12',
    '2019-11-30 05:16:08'
),(
    4,
    1,
    'MUaF5PVy1i',
    'Giảm giá 5% cho đơn hàng',
    'percent',
    5,
    -1,
    '2019-11-23 09:41:25',
    NULL
),(
    5,
    1,
    'QaHBFpL20l',
    'Giảm giá 50000 VNĐ',
    'total',
    50000,
    -1,
    '2019-11-23 09:42:20',
    NULL
);
/*!40000
ALTER TABLE
    `vouchers` ENABLE KEYS */;
UNLOCK TABLES
    ;
    --

    -- Dumping data for table `wishlists`
    --

LOCK TABLES
    `wishlists` WRITE;
    /*!40000
ALTER TABLE
    `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists`
VALUES(1, 1, 44, NULL, NULL),(3, 1, 34, NULL, NULL),(12, 1, 47, NULL, NULL),(15, 1, 46, NULL, NULL),(16, 2, 41, NULL, NULL),(17, 2, 34, NULL, NULL);
/*!40000
ALTER TABLE
    `wishlists` ENABLE KEYS */;
UNLOCK TABLES
    ;
    /*!40103
SET
    TIME_ZONE = @OLD_TIME_ZONE */;
    /*!40101
SET
    SQL_MODE = @OLD_SQL_MODE */;
    /*!40014
SET
    FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
    /*!40101
SET
    CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
    /*!40101
SET
    CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
    /*!40101
SET
    COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
    /*!40111
SET
    SQL_NOTES = @OLD_SQL_NOTES */;
    -- Dump completed on 2019-12-12 10:17:50
    