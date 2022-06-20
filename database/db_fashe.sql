/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : db_fashe

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 19/08/2020 21:26:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sort_order` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `page` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cate_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES (1, 'images/banners/5bf6cf911bb89.jpg', 'Áo', '1', 'home', 2);
INSERT INTO `banners` VALUES (2, 'images/banners/banner2.jpg', 'Quần', '2', 'home', 1);
INSERT INTO `banners` VALUES (3, 'images/banners/banner3.jpg', 'Cặp', '3', 'home', 3);
INSERT INTO `banners` VALUES (4, 'images/banners/banner5.jpg', 'about', NULL, 'about', NULL);
INSERT INTO `banners` VALUES (5, 'images/banners/banner7.jpg', 'contact', NULL, 'contact', NULL);
INSERT INTO `banners` VALUES (6, 'images/banners/banner6.jpg', 'cart', NULL, 'cart', NULL);
INSERT INTO `banners` VALUES (7, 'images/banners/banner11.jpg', 'blog', NULL, 'blog', NULL);
INSERT INTO `banners` VALUES (9, 'images/banners/banner12.jpg', 'product', NULL, 'product', NULL);
INSERT INTO `banners` VALUES (10, 'images/banners/5bec3087ba690.jpg', 'pay', '', 'pay', NULL);
INSERT INTO `banners` VALUES (11, 'images/banners/5c0ce2bc6124b.jpg', 'account', NULL, 'account', NULL);

-- ----------------------------
-- Table structure for brands
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of brands
-- ----------------------------
INSERT INTO `brands` VALUES (1, 'TOP SHOP', 'images/brands/brand1.png', 'http://www.topshop.com/');
INSERT INTO `brands` VALUES (2, 'MANGO', 'images/brands/brand2.png', 'https://shop.mango.com/vn');
INSERT INTO `brands` VALUES (3, 'ZARA', 'images/brands/brand3.png', 'https://www.zara.com/vn/');
INSERT INTO `brands` VALUES (4, 'ASOS', 'images/brands/brand5.png', 'https://www.asos.com/');
INSERT INTO `brands` VALUES (5, 'BRESHKA', 'images/brands/brand4.png', 'https://www.bershka.com/');
INSERT INTO `brands` VALUES (6, 'River Island', 'images/brands/brand6.png', 'https://www.riverisland.com/');

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone_number` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES (16, 'yẾN', 'yengthph06061@fpt.edu.vn', '0973465845', 'Fat', 1);
INSERT INTO `contacts` VALUES (17, 'hoàng', 'hoang@gmail.com', '0374969474', '123', 0);

-- ----------------------------
-- Table structure for discount_code
-- ----------------------------
DROP TABLE IF EXISTS `discount_code`;
CREATE TABLE `discount_code`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `percent` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of discount_code
-- ----------------------------
INSERT INTO `discount_code` VALUES (2, 'PVBHA117611', 10);
INSERT INTO `discount_code` VALUES (3, 'IINKM62797', 10);
INSERT INTO `discount_code` VALUES (4, 'FJOVQ70150', 10);
INSERT INTO `discount_code` VALUES (5, 'CIGKM65714', 10);
INSERT INTO `discount_code` VALUES (6, 'CODE123', 12);
INSERT INTO `discount_code` VALUES (9, 'OULAK71574', 10);
INSERT INTO `discount_code` VALUES (10, 'JEGQC43607', 10);
INSERT INTO `discount_code` VALUES (11, 'POVBD52963', 10);

-- ----------------------------
-- Table structure for invoice_detail
-- ----------------------------
DROP TABLE IF EXISTS `invoice_detail`;
CREATE TABLE `invoice_detail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NULL DEFAULT NULL,
  `invoice_id` int(11) NULL DEFAULT NULL,
  `quantity` int(11) NULL DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `unit_price` int(11) NULL DEFAULT NULL,
  `total_product_price` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of invoice_detail
-- ----------------------------
INSERT INTO `invoice_detail` VALUES (38, 8, 16, 1, NULL, 190000, 171000);
INSERT INTO `invoice_detail` VALUES (39, 16, 17, 1, NULL, 340000, 340000);

-- ----------------------------
-- Table structure for invoices
-- ----------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_price` int(11) NULL DEFAULT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone_number` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_date` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `discount_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `discount_percent` int(3) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of invoices
-- ----------------------------
INSERT INTO `invoices` VALUES (16, NULL, 'hoàng', '0968937035', '123', '', 'hoangtv0710@gmail.com', '15-08-2020 10:45', 'TDZUZ31357', 10, 0);
INSERT INTO `invoices` VALUES (17, NULL, 'hoàng', '0968937031', '123', '', 'hoangtv0710@gmail.com', '15-08-2020 11:23', '0', 0, 0);

-- ----------------------------
-- Table structure for post_categories
-- ----------------------------
DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE `post_categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of post_categories
-- ----------------------------
INSERT INTO `post_categories` VALUES (1, 'GUIDEBOOK', NULL);
INSERT INTO `post_categories` VALUES (2, 'INSPIRER', NULL);
INSERT INTO `post_categories` VALUES (3, 'JOURNAL', NULL);

-- ----------------------------
-- Table structure for post_comments
-- ----------------------------
DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE `post_comments`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `post_id` int(11) NULL DEFAULT NULL,
  `created_date` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of post_comments
-- ----------------------------
INSERT INTO `post_comments` VALUES (5, 'admin@gmail.com', 'ok', 5, '02:07 09-08-2020', 'images/users/admin.jpg', 1);

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cate_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `short_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_date` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `author_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `views` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 'images/posts/5f2d0cb370963.jpg', 1, '5 TIPS DIỆN ÁO KHOÁC GIÚP BẠN BẢNH BAO HƠN GẤP 100 LẦN', 'Thời tiết đã thực sự trở lạnh và giờ là lúc những chiếc áo khoác mùa đông trở nên cần thiết hơn bao giờ hết. Tuy nhiên, không phải ai cũng biết cách phối hợp những chiếc áo khoác để trở nên Bảnh Bao, Tinh Gọn.', '<p></p><h2>1. Đừng bỏ qua những chiếc áo khoác dáng ngắn</h2><p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/25088/artCT/57170/1_01.jpg\"></p><p>Có một nguyên tắc dường như lúc nào cũng đúng trong thời trang, chính là những gì ngắn ngủn, gọn gàng thường trẻ trung và năng động hơn tất thảy. Diện item này lên mình giống như 1 mũi tên trúng 2 đích vậy, bởi áo dạ dáng ngắn không chỉ tươi trẻ, sành điệu mà còn ăn gian chiều cao đáng kể nhờ vào kiểu dáng gọn gàng. Vì thế, những chàng trai có chiều cao khiêm tốn không nên bỏ qua item này.</p><p>&nbsp;</p><h2>2. Chọn cho mình một chiếc áo khoác màu đen</h2><p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/25088/artCT/57170/2_01.jpg\"></p><p>Trong hầu hết mọi trường hợp, diện đồ đen là trông bạn đã gọn gàng, gầy mảnh hơn thực tế rất nhiều và những chiếc áo khoác màu đen cũng không nằm ngoài bí kíp kinh điển ấy. Chưa hết, khi diện áo khoác đen, vẻ ngoài của bạn sẽ thêm phần bí ẩn, lại mix&amp;match kiểu nào cũng dễ mặc, dễ đẹp. Tóm lại, tủ đông mà thiếu đi áo khoác đen thì người thiệt thòi nhất chính là bạn đấy!</p><p>&nbsp;</p><h2>3. Mở khuy áo và sơ vin bên trong</h2><p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/25088/artCT/57170/3_01.jpg\"></p><p>Chỉ cần sơ vin gọn gàng bộ đôi áo quần bên trong, layer áo khoác bên ngoài và nhớ mở toang cúc áo, bạn đã có được set đồ trúng hai đích là: hack chiều cao và tạo hiệu ứng dáng trông gầy hơn với những bạn sở hữu thân hình mũm mĩm. Cách <a target=\"_blank\" rel=\"nofollow\" href=\"http://kenh14.vn/troi-chuyen-lanh-cac-nang-can-trau-doi-ngay-4-tips-dien-ao-khoac-giup-voc-dang-nhu-gay-di-vai-kilogram-20191127144256769.chn#\">mix đồ</a> này còn giúp vẻ ngoài của bạn tăng thêm bội phần phóng khoáng và bảnh bao nữa.</p><p>&nbsp;</p><h2>4. Diện với những items sáng màu bên trong</h2><p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/25088/artCT/57170/4_01.jpg\"></p><p>Mix &amp; match bên trong áo dạ những chiếc áo len, áo sơ mi trắng, be nhạt hay màu mè một chút cũng là cách tuyệt hay để thắp sáng cả set đồ tưởng như \"tối sầm tối xì\" của bạn. Và như thế, ngay cả khi bạn diện chiếc áo khoác dạ tối màu cỡ nào, vẻ ngoài cũng không hề bị già dặn, cứng nhắc mà trái lại, trông sành điệu và cực kì hút mắt.</p><p>&nbsp;</p><h2>5. Kết hợp outfit với một chiếc quần Jeans</h2><p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/25088/artCT/57170/5_01.jpg\">&nbsp; &nbsp;Hầu hết mọi item khi bắt cặp với quần jeans thì đều mang đến nét tươi trẻ, cá tính hơn cho người diện; và điều này hoàn toàn đúng với áo khoác dạ. Chỉ cần thay thế những chiếc quần vải ống đứng, ống suông bằng quần jeans thì ngay lập tức, vẻ ngoài của bạn trông sẽ trẻ ra vài tuổi; sau cùng, set đồ sẽ trở nên sành điệu và hút mắt hơn hẳn nếu các bạn kết hợp thêm với Chelsea boots hoặc một đôi sneakers khỏe khoắn, năng động.</p><p>Hi vọng 5 tips của SSStutter vừa chia sẻ sẽ giúp bạn có một mùa đông không chỉ ấm áp mà còn vô cùng Bảnh Bao.</p><br><p></p>', '1', '07-07-2020', 'Admin', 15);
INSERT INTO `posts` VALUES (2, 'images/posts/post2.png', 2, '4 BÀI HỌC VỠ LÒNG VỀ THỜI TRANG BẠN ƯỚC MÌNH NÊN BIẾT SỚM HƠN', 'Nếu cảm thấy phong cách thời trang của mình vẫn còn nhàm chán và thiếu cuốn hút; nếu bạn từng nhận những ánh nhìn ái ngại chỉ vì bộ trang phục bạn mặc, nếu bạn vẫn đang loay hoay mỗi lần đi mua quần áo không biết phải chọn gì cho phù hợp, 03 bài học dưới đây sẽ giúp bạn điều đó', '<p>\r\n\r\n</p><p>93,76% những người mà Fashe gặp đều thừa nhận họ đã từng mắc lỗi trong thời trang.</p><p>Không ai sinh ra đã ăn mặc đẹp sẵn. Gout thời trang có thể thay đổi theo thời gian, và đương nhiên, giống như mọi kiến thức khác, cũng có thể được học hỏi.</p><p>Nếu cảm thấy phong cách thời trang của mình vẫn còn nhàm chán và thiếu cuốn hút; nếu bạn từng nhận những ánh nhìn ái ngại chỉ vì bộ trang phục bạn mặc; nếu bạn vẫn đang loay hoay mỗi lần đi mua quần áo không biết phải chọn gì cho phù hợp, 04 bài học dưới đây sẽ là “cứu tinh” cho bạn!</p><p><br></p><p><b>1. Thấu hiểu chính mình</b></p><p>Không sở hữu chiều cao lý tưởng, thân hình 3 vòng đâu ra đấy hoàn toàn không đồng nghĩa với việc các bạn sẽ khó để mặc đẹp và cuốn hút. Chỉ cần hiểu về vóc dáng của mình, đẹp ở đâu, không ổn ở chỗ nào thì sẽ luôn có những món thời trang phù hợp giúp các bạn tự tin, tỏa sáng. </p><p>Chẳng hạn nếu sở hữu vòng bụng lớn thì những chiếc áo sơ mi dáng rộng, quần cạp cao chính là những items dành cho bạn. Ngay cả khi sở hữu chiều cao khiêm tốn bạn cũng có thể dễ dàng khắc phục bằng những tips đơn giản như sơ vin với quần cạp cao, chọn những họa tiết kẻ sọc, quần dáng ôm hay đi giày có phần đế dày để “ăn gian” thêm vài phân, cũng để vẻ ngoài của mình thêm cao ráo, thon gọn.</p><p><br></p><p><b>2. Đừng quan trọng hóa thương hiệu</b></p><p>Chắc hẳn, đã không ít lần các bạn đã chứng kiến các ngôi sao chi đến hàng trăm triệu, thậm chí là tiền tỷ cho những bộ cánh đến từ các nhà thương hiệu lừng danh thế giới, nhưng rồi chỉ nhận lại những lời bình luận thiếu tích cực, rằng những bộ đồ đó chẳng khác gì hàng rẻ tiền? Thực tế, quần áo hàng hiệu không khiến các bạn trông đẹp và thời thượng hơn nếu món đồ ấy không thực sự phù hợp với vóc dáng và vẻ ngoài của mình.<br></p><p>Một bộ cánh vừa vặn, tôn dáng, phù hợp phong cách bản thân và quan trọng nhất, khiến bạn tự tin hơn khi diện thì dù đến từ thương hiệu nào cũng xứng đáng có mặt trong tủ đồ của bạn.</p><p><br></p><p><b>3. Luôn luôn cập nhật xu hướng thời trang</b></p><p>Bạn không bao giờ có thể ăn mặc đẹp, nếu chẳng chịu quan tâm đến thời trang, hoặc dành thời gian để chăm chút cho tủ đồ của mình. Chịu khó để ý và tìm kiếm cảm hứng ăn mặc từ khắp mọi nơi xung quanh, từ những ngôi sao mình yêu thích cho đến những người đồng nghiệp, bạn thân, một anh chàng bảnh bao vô tình nhìn thấy trên phố hay trên mạng xã hội... Bỏ ra vài phút mỗi ngày ngắm nghía những xu hướng thời trang, học hỏi những bí kíp phù hợp nhất với bản thân (tuyệt đối đừng copy) và bạn sẽ thấy phong cách của mình bỗng trở nên mới mẻ, cuốn hút và thời thượng hơn rất nhiều.</p>\r\n\r\n<br><p></p>', '1', '08-07-2020', 'Admin', 59);
INSERT INTO `posts` VALUES (3, 'images/posts/post3.jpg', 3, '07 MẸO GIẶT QUẦN ÁO BỀN LÂU ĐÚNG CHUẨN', 'Bạn có biết, giặt đồ sai cách chính là yếu tố hàng đầu khiến quần áo của bạn ', '<p>Có rất nhiều \"bí ẩn” xung quanh tần suất giặt đồ jeans. Matt Eddmenson - người đồng sáng lập nhãn hiệu denim iIogene + Willie nổi tiếng cho hay chúng ta nên hạn chế giặt quần jeans nhưng không đến mức quá ít. Và nếu bạn từng nghe một vài mẹo ai đó mách về việc để quần jeans trong tủ lạnh qua đêm, thì thực tế đây không được xem là một cách làm sạch quần jeans đâu.</p><p>\"Nếu như bạn không nhớ được lần cuối cùng giặt chiếc quần của mình là khi nào thì rất có thể bạn đã thực hiện rất đúng nhưng không phải lúc nào cũng đúng. Lời khuyên ở đây là: Lần giặt đầu tiên khi mới mua quần về, không giặt quần jeans sớm hơn 3 tháng mà phải khoảng 4 tháng mới nên giặt một lần trừ khi bạn là một công nhân xây dựng. Với lần giặt thứ 2 và những lần sau thì nên giặt khi quần hơi có mùi.</p><p>Matt Eddmenson cũng khuyên nên giặt quần jeans trong bồn rửa mặt, ít nhất là với 3 lần đầu tiên. Cụ thể là xả quần jeans dưới nước ấm, dưới vòi nước. Ngâm quần trong nước ấm cho tới khi nước nguội lanh. Sau đó vắt khô và xả quần dưới nước lạnh và đem phơi khô.</p>', '1', '29-07-2020', 'Admin', 8);
INSERT INTO `posts` VALUES (4, 'images/posts/post4.jpg', 1, '5 BƯỚC QUẢN LÝ THỜI GIAN HIỆU QUẢ', '90% những người mà Fashe. biết đều gặp phải một tình trạng chung - Lãng phí thời gian', '<p>\r\n\r\n</p><p><b>1. Hiểu được tầm quan trọng của thời gian</b></p><p>Nhiều người hay nói rằng “Thời gian là tiền bạc” hoặc “Thời gian quý báu hơn tiền bạc”. Tuy nhiên khi sử dụng nó trong công việc và <a target=\"_blank\" rel=\"nofollow\" href=\"http://phamngocanh.com/thu-vien/guong-thanh-cong/cai-tien-cuoc-song/\">cuộc sống</a> thì không phải ai cũng coi trọng và sử dụng thời gian một cách khoa học.</p><p>Thời gian là một trong những kỹ năng quan trọng nhất mà con người cần rèn luyện càng sớm càng tốt. Quản lý thời gian có ý nghĩa đặc biệt đối với những nhà kinh doanh và là bí quyết để cân bằng cuộc sống giữa công việc và gia đình.</p><p>Mọi người thường than vãn rằng: tôi không có nhiều thời gian, tôi không đủ thời gian, cho tôi thêm 5, 10 phút… Bạn biết rằng thời gian rất quý giá nhưng tại sao hàng ngày bạn vẫn lãng phí thời gian vào những việc không quan trọng.</p><p>Trước hết hãy hiểu rõ tầm quan trọng của thời gian và việc quản lý thời gian và xác định cho mình phương thức phân chia và quản lý thời gian hiệu quả.</p><p><br></p><p><b>2. Tạo một danh sách những việc cần làm</b></p><p>Tạo một danh sách những việc cần làm là cách quản lý thời gian tốt nhất. Mỗi ngày đến công ty, hãy dành cho mình 15 phút để tư duy những việc cần làm trong ngày kèm theo đó là đóng khung thời gian cho từng nhiệm vụ.</p><p>Mọi người thường lên danh sách từ 25 – 40 công việc mà họ phải làm. Trên thực tế, danh sách dài khiến bạn thật sự bận rộn nhưng không mang lại hiệu quả. Khi bạn có một danh sách dài, bạn phải tập trung năng lượng nhiều để cắt giảm danh sách hơn là làm việc.</p><p>Mỗi ngày, chọn ra 6 việc mà bạn sẽ làm việc với năng suất cao nhất để đưa vào danh sách, và hoàn thành tất cả sáu điều đó trong ngày.</p><p><br></p><p><b>3. Lên kế hoạch sẽ dành bao lâu cho mỗi thứ</b></p><p>Bạn đã bắt đầu một ngày bằng cách lên danh sách sáu điều quan trọng nhất. Điều đó mất hai hoặc ba phút. Bây giờ hãy dành một phút khác để lập kế hoạch xem chúng sẽ làm bạn mất bao lâu hoặc bạn sẽ dành cho chúng bao nhiêu thời gian.</p><p><br></p><p><b>4. Ưu tiên những việc quan trọng</b></p><p>Các chuyên gia cho rằng: Bạn chỉ có hai cánh tay và một cái đầu vì vậy vác ba, bốn bao tải cùng lúc là điều không thể. Chính vì vậy, một chính sách mà bạn cần thi hành là ưu tiên những việc quan trọng nhất và tập trung hết tốc lực vào nó. Bạn có thể sẽ được sếp giao cho giải quyết cùng lúc hai hoặc ba nhiệm vụ và tất cả đều cần được hoàn thành một cách tốt nhất. Hãy suy nghĩ và tìm ra đâu là việc làm quan trọng hơn cả và thực hiện nó đầu tiên, sau đó là các bước tiếp theo.</p><p><br></p><p><b>5. Dẹp tan tư tưởng trì hoãn</b></p><p>Bạn phải nhớ chính xác rằng : “Tư tưởng trì hoãn công việc là kẻ thù của <a target=\"_blank\" rel=\"nofollow\" href=\"http://phamngocanh.com/thu-vien/kien-thuc-kinh-doanh/nen-tang-thanh-cong-cua-flappy-bird/\">thành công</a>”. Nhiều người có kỹ năng cần thiết và tài năng để thực hiện nhiệm vụ nhưng lại quá lười biếng và luôn tồn tại tư tưởng “chây ỳ”. Mỗi ngày tích một chút công việc nghĩa là mỗi ngày bạn phí phạm một lượng thời gian đáng kể và tiếp tay nuôi dưỡng thói quen xấu.</p><p>Chính vì vậy việc cần làm ngay của bạn là phải dẹp bỏ ngay thói quen trì hoãn của mình và lên mục tiêu, kế hoạch để loại bỏ nó. Để làm được điều này bạn cần sức kiên trì và quyết tâm.</p>\r\n\r\n<br><p></p>', '1', '01-08-2020', 'Admin', 23);
INSERT INTO `posts` VALUES (5, 'images/posts/post5.jpg', 1, '6 BÍ KÍP SĂN QUẦN ÁO SALE “ĐẠI THẮNG”', 'Nếu biết cách nắm bắt thời cơ, bạn hoàn toàn có thể tranh thủ tìm kiếm những mẫu quần áo sale chất lượng tốt, dễ phối hợp với các mùa tiếp theo, với giá thành vô cùng dễ chịu.', '<p></p>\r\n\r\n<p><b>1. Ăn mặc có chủ ý để dễ thay đồ</b></p><p>Lời khuyên của các chuyên gia dành cho tất cả các tín đồ Sale, đó là hãy ăn mặc tinh gọn nhất có thể.</p><p>Trang phục bên ngoài hãy mặc đơn giản, không nên mặc layer cầu kì, áo buộc dây lằng nhằng hay quần cài thắt lưng, để tiết kiệm thời gian nhất có thể khi thay đồ, nếu nên đi dép lê hay giày lười thì càng tốt. Vì Sale mà, thường các cửa hàng sẽ chật kín người, phòng thay đồ thì luôn trong tình trạng quá tải, và tất nhiên bạn sẽ không muốn ăn mặc lỉnh kỉnh để rồi tốn quá nhiều thời gian hay thậm chí mất đồ, phải không?</p><p>Tốt nhất hãy mặc những món đồ basic nhất, như áo phông trắng với quần bò / khahi đen, những item có thể tiện để bạn phối đồ luôn, không mất thời gian mượn tạm một món đồ khác của cửa hàng để phối cho hợp mắt.</p><p><br></p><p><strong>2. Không quan tâm đến danh sách cần mua</strong></p><p>Không giống như việc mua quần áo đầu mùa, việc mua đồ giảm giá thường khó lường trước. Bạn không nên vạch sẵn những mục tiêu quá rõ ràng, ví dụ như cần mua một chiếc áo sơ mi, hai chiếc quần, bởi vì giữa thực tế và kỳ vọng thường có khoảng cách rất lớn.</p><p>Đôi khi món đồ bạn cần mua sẽ giảm giá rất ít, và nếu cứ bám trụ vào kế hoạch đó thì có thể bạn sẽ bỏ qua rất nhiều ưu đãi giá hời cho các món đồ thú vị khác. Vì vậy, hãy chuẩn bị tâm lý tùy cơ ứng biến khi đi mua đồ giảm giá. </p><p><br></p><p><strong>3. Nhưng phải suy nghĩ có chiến lược khi mua đồ</strong></p><p>Mặc dù việc mua đồ hạ giá là khá khó lường, nhưng bạn cũng có thể xác định một danh sách ưu tiên. Những món đồ cơ bản như áo khoác, áo phông, &nbsp;áo sơ mi trắng, quần âu, khaki, jeans vừa cỡ là những món đồ không bao giờ thừa.</p><p>Khi gặp những món đồ như thế, hãy nghĩ xem trong tủ của mình đã có món đồ tương tự hay chưa, liệu nó đã cũ hay vẫn còn mới. Bạn có thể chọn mua món đồ có màu sắc hoặc kiểu dáng hơi khác đi so với những đồ đã có, để tạo sự phong phú cho tủ quần áo. </p><p>Việc này sẽ giúp bạn tránh khỏi tình trạng mua sắm quá tay, mua những món đồ chỉ vì nó rẻ, để rồi đến 2 năm sau bạn vẫn chưa cả động vào thì phí phạm lắm nhé!</p><p><br></p><p><b>4. Lịch sự nhưng cũng phải cương quyết để \"giành\" món đồ mình thích</b></p><p>Nghe có phần kì cục nhưng… là thật, vì trong tình trạng mua Sale hỗn loạn, sẽ thích hợp nếu bạn là người quyết đoán và dứt khoát. Nhanh tay chọn món mình thích và cũng nhanh chóng trả lại ngay khi không phù hợp để người khác có cơ hội được thử cùng, đây là phép lịch sự tối thiểu bạn có thể dành cho người khác.</p><p>Chắc chắn sẽ có rất nhiều tình huống khó xử xảy ra, ví dụ như khi bạn và một người khác cùng muốn lấy một món đồ nào đó. Tất nhiên, hãy cố gắng “chộp” lấy món đồ đấy càng nhanh càng tốt, không cần phải tỏ ý nhường nhịn.</p><p>Nhưng sau đó, bạn có thể tươi cười nói với người “đối thủ” kia rằng bạn sẽ nhường lại món đồ này nếu nó không vừa cỡ với bạn, và có thể tặng thêm một câu khen ngợi về mắt nhìn thẩm mỹ của bạn ấy. </p><p><br></p><p><strong>5. Đừng ngại phải sửa đồ</strong></p><p>Nếu món đồ có mức giá giảm hấp dẫn những có chi tiết không vừa vặn, đặc biệt là không được đổi trả nữa, vậy nên sẽ thích hợp nếu bạn có thể xem xét việc mang ra ngoài hàng sửa lại. </p><p>Để tránh gặp trường hợp “tiền sửa nhiều hơn tiền sale”, bạn có thể dành một buổi trước ngày đi mua đồ giảm giá để đến gặp một người thợ may sửa đồ, tìm hiểu trước về chi phí sửa đồ thông dụng, ví dụ như phí cắt gấu, nới eo v.v… Nắm rõ mức phí này rồi, bạn sẽ dễ dàng tính toán lợi hại khi chọn đồ và đưa ra được những quyết định hợp lý. </p><p>Quan trọng là khi chọn đồ, hãy để ý thật kĩ những chi tiết lỗi trên sản phẩm để được đổi ngay trước khi thanh toán.</p><p><br></p><p><b>6. Đi cùng “chiến hữu”</b></p><p>Hai cái đầu bao giờ cũng tính toán nhanh hơn và đưa ra quyết định chính xác hơn một cái đầu. Và tất nhiên, các bạn sẽ có một khoản ngân sách gấp đôi, dễ dàng bù trừ, hỗ trợ nhau nếu thấy một món đồ quá đẹp, giảm giá quá hời mà lại không còn đủ tiền để mua.</p><p>Có bạn đi cùng cũng có thể dễ dàng giúp đỡ nhau trong việc xếp hàng luân phiên, giữ chỗ, giữ trước đồ và bảo quản tư trang khi thay đồ. </p>\r\n\r\n<p></p>', '1', '07-08-2020', 'Admin', 35);

-- ----------------------------
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES (1, 'Quần', NULL);
INSERT INTO `product_categories` VALUES (2, 'Áo', NULL);
INSERT INTO `product_categories` VALUES (3, 'Cặp', NULL);
INSERT INTO `product_categories` VALUES (4, 'Áo khoác', '');
INSERT INTO `product_categories` VALUES (6, 'bikini', '');

-- ----------------------------
-- Table structure for product_comments
-- ----------------------------
DROP TABLE IF EXISTS `product_comments`;
CREATE TABLE `product_comments`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  `created_date` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_comments
-- ----------------------------
INSERT INTO `product_comments` VALUES (5, 'admin@gmail.com', 'i dont eat yr rice\r\ni dont drink yr water\r\ndont say me\r\nFAT FAT FAT', 8, '21:32 07-08-2020', 'images/users/admin.jpg', 1);

-- ----------------------------
-- Table structure for product_galleries
-- ----------------------------
DROP TABLE IF EXISTS `product_galleries`;
CREATE TABLE `product_galleries`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_galleries
-- ----------------------------
INSERT INTO `product_galleries` VALUES (1, 16, 'images/product_galleries/5bf67b7703983.jpg');
INSERT INTO `product_galleries` VALUES (4, 16, 'images/product_galleries/5bf68325b521a.jpg');
INSERT INTO `product_galleries` VALUES (5, 15, 'images/product_galleries/5bfcc35b758b0.jpg');
INSERT INTO `product_galleries` VALUES (6, 15, 'images/product_galleries/5bfcc36a24c7b.jpg');
INSERT INTO `product_galleries` VALUES (7, 13, 'images/product_galleries/5bfcc3b8af34d.jpg');
INSERT INTO `product_galleries` VALUES (8, 12, 'images/product_galleries/5bfcc4dcf3627.jpg');
INSERT INTO `product_galleries` VALUES (9, 11, 'images/product_galleries/5bfcc513e5cad.jpg');
INSERT INTO `product_galleries` VALUES (10, 10, 'images/product_galleries/5bfcc5aee04a6.jpg');
INSERT INTO `product_galleries` VALUES (11, 9, 'images/product_galleries/5bfcc5d51d57e.jpg');
INSERT INTO `product_galleries` VALUES (12, 8, 'images/product_galleries/5bfcc63bd4a5f.jpg');
INSERT INTO `product_galleries` VALUES (13, 8, 'images/product_galleries/5bfcc64bb1e33.jpg');
INSERT INTO `product_galleries` VALUES (14, 7, 'images/product_galleries/5bfcc693187fa.jpg');
INSERT INTO `product_galleries` VALUES (15, 7, 'images/product_galleries/5bfcc6bab242d.jpg');
INSERT INTO `product_galleries` VALUES (16, 6, 'images/product_galleries/5bfcc769954da.jpg');
INSERT INTO `product_galleries` VALUES (17, 5, 'images/product_galleries/5bfcc78d87ca6.jpg');
INSERT INTO `product_galleries` VALUES (18, 5, 'images/product_galleries/5bfcc79a6851b.jpg');
INSERT INTO `product_galleries` VALUES (19, 4, 'images/product_galleries/5bfcc7cd62917.jpg');
INSERT INTO `product_galleries` VALUES (20, 4, 'images/product_galleries/5bfcc7d7cd5e3.jpg');
INSERT INTO `product_galleries` VALUES (21, 3, 'images/product_galleries/5bfcc800e5647.jpg');
INSERT INTO `product_galleries` VALUES (22, 2, 'images/product_galleries/5bfcc819f2318.jpg');
INSERT INTO `product_galleries` VALUES (23, 1, 'images/product_galleries/5bfcc847ae058.jpg');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sell_price` int(11) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `views` int(11) NULL DEFAULT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 1, 'COLE PANTS', 390000, 290000, 'images/products/sp1.jpg', 'Còn hàng', 53, '<p>\r\n\r\n</p><p>Cole Pants - Chiếc quần hoàn hảo nhất mùa thu này  </p><p>Nếu đã quá chán với những mẫu quần âu, khaki thông thường, hay chỉ đơn giản là đang tìm kiếm một mẫu quần độc đáo khó ai “đụng hàng” được, đây chính là lựa chọn hoàn hảo cho bạn.</p><p>Cole Pants - sản phẩm được Fashe. ấp ủ suốt nhiều tháng trời chính thức ra mắt. Chất vải quần cao cấp nhập khẩu cực đẹp và cực hiếm, với độ dày vừa phải để quần vừa đứng dáng vừa giữ ấm những ngày se lạnh, nhưng vẫn mềm mại và co giãn cho bạn thoải mái vận động cả ngày. Chút biến tấu đường chỉ trắng nơi viền quần, vừa đủ để tạo nét phá cách ai nhìn cũng phải hỏi thăm địa chỉ mua đấy!</p>\r\n\r\n<br><p></p>');
INSERT INTO `products` VALUES (2, 1, 'MORGAN PANTS', 400000, 300000, 'images/products/sp2.jpg', 'Còn hàng', 103, '<p>\r\n\r\n</p><div><div><div><div><div><div><div><h5>Morgan Pants - Điểm nhấn độc đáo cho outfit \"ai cũng phải ngước nhìn\"</h5></div></div></div></div></div></div></div><div><div><p>Vì Fashe hiểu ai cũng cần một chút biến tấu mới lạ giữa cả trăm mẫu quần âu, khaki quen thuộc mà. </p><div><p>Nếu có đang tìm một điểm nhấn độc đáo chẳng lo “đụng hàng” cho tủ đồ, Morgan Pants chính là gợi ý hoàn hảo dành cho bạn.</p><p>Morgan Pants - sản phẩm quần chủ đạo được SSStutter nghiên cứu suốt 03 tháng, với cảm hứng từ sự thoải mái của quần thể thao. Chất liệu quần cao cấp, mềm mại co giãn, cùng điểm nhấn phần kẻ trắng trắng dậm chất thể thao, nhưng kiểu dáng ôm gọn tinh tế, Morgan Pants vẫn giữ nguyên vẻ thanh lịch phù hợp đi làm, đi học.</p><p>Gợi ý: Thu này diện Morgan Pants với một chiếc áo phông trơn cùng giày thể thao, bạn đã có một outfit thừa sức trẻ trung, có gout ai nhìn cũng phải ngưỡng mộ đấy!</p></div></div></div>\r\n\r\n<br><p></p>');
INSERT INTO `products` VALUES (3, 1, 'BUOC PANTS', 299000, 0, 'images/products/sp3.jpg', 'Còn hàng', 64, '<p>\r\n\r\n</p><p>Tuyệt Chiêu “Mặc Mà Như Không”, Thoải Mái Năng Động Với Chiếc Quần BUOC PANTS </p><p>Nếu bạn đang tìm một chiếc quần mặc dễ chịu, khỏi tốn thời gian mặc gì mà vẫn thoải mái vô cùng; hay chỉ đơn giản là đã quá chán với những chiếc quần âu thông thường, câu trả lời chính là BUOC PANTS!</p><div><p>Buoc Pants - sản phẩm chưa kịp ra mắt đã bị bạn bè giục “làm nhanh lên để mua” vì độ thoải mái, thuận tiện vận động mà trông vẫn rất thanh lịch. . Điểm nhấn hoàn hảo cho chiếc quần này là ở phần chun buộc bụng, cộng thêm chất vải mềm nhẹ, khiến người mặc cứ có cảm giác… như không mặc gì. Thoải mái là thế nhưng Buoc Pants vẫn rất Tinh tế nhờ họa tiết kẻ sọc với form quần cắt may gọn gàng, xứng đáng điểm Bảnh bao luôn.</p></div>\r\n\r\n<br><p></p>');
INSERT INTO `products` VALUES (4, 1, 'WIDE PANTS', 199000, 0, 'images/products/sp4.jpg', 'Còn hàng', 24, '<p>\r\n\r\n</p><p>Thế giới chỉ có 2 loại đàn ông. Một là những bạn luôn tốn ít nhất 20’ mỗi sáng chỉ để chọn lựa, là lượt một bộ outfit phù hợp, thế rồi… muộn việc. Hai là loại mở tủ đồ ra và chọn ngay bộ outfit ngoài cùng, để rồi cả tháng cũng chỉ quanh quẩn 2, 3 kiểu nhàm chán.</p><p>Từ nay bớt hẳn lo lắng mỗi sáng vì chuyện Outfit đi nhé, vì Fashe đã có cho bạn “giải pháp” hoàn hảo - Wide Pants rồi đây. </p><p>Vừa mới được \r\n\r\nFashe trình làng nhưng Wide Pants đã ghi điểm tuyệt đối nhờ form dáng Rộng rãi, Thoải mái, đảm bảo đi cả ngày cũng không khó chịu. Lại được thêm chất liệu khaki trẻ trung, màu sắc bắt mắt, phối với sơ mi thì vừa thanh lịch lại có gout, phối với áo phông thì thừa sức trẻ trung cá tính với chút phong cách streetstyle. Đúng là một chiếc quần “đa năng”, xứng đáng được nằm ngoài cùng tủ quần áo hàng ngày đó! </p>\r\n\r\n<br><p></p>');
INSERT INTO `products` VALUES (5, 1, 'TOKYO JEANS', 430000, 270000, 'images/products/sp5.jpg', 'Còn hàng', 68, '<p>\r\n\r\n</p><p>Biến hóa trẻ trung đầy năng lượng với Tokyo Jeans</p><p></p><p>Cả tuần đi học đi làm ăn mặc chỉn chu lịch sự rồi, đã đến lúc để “đổi gió” với chút streetstyle từ những items năng động và đầy phong cách, điển hình như mẫu quần Tokyo Jeans mới ra mắt của SSS.</p><p></p><p>Quần Jeans thì không phải bàn về độ linh hoạt trẻ trung rồi, nhưng với phiên bản quần Tokyo còn được cộng thêm vài điểm năng động, cá tính với màu quần xanh sáng, form quần rộng rãi. Chất quần được cải tiến gấp 3 lần, mềm mại, mỏng nhẹ và co giãn vừa phải, để bạn luôn thoải mái và tự tin suốt cả ngày đi chơi.</p>\r\n\r\n<br><p></p>');
INSERT INTO `products` VALUES (6, 2, 'S TEE', 299000, 0, 'images/products/sp6.jpg', 'Còn hàng', 32, NULL);
INSERT INTO `products` VALUES (7, 2, 'LOE TEE', 399000, 0, 'images/products/5bfcc6f26b93b.jpg', 'Còn hàng', 47, '<p>\r\n\r\n</p><p>Suốt 5 năm làm nghề, cuối cùng vẫn là mẫu áo này đẹp xuất sắc nhất!</p><p></p><p>Trẻ trung thoải mái với thiết kế như áo phông, nhưng vẻ thanh lịch, nhã nhặn từ chất vải đến form dáng của những chiếc sơ mi vẫn chẳng lẫn đi được, chỉ có thể là siêu phẩm “không lo đụng hàng” mới trình làng của Fashe- Loe Tee. </p>\r\n\r\n<br><p></p>');
INSERT INTO `products` VALUES (8, 2, 'L\'AMOUR TEE', 299000, 190000, 'images/products/sp8.jpg', 'Còn hàng', 60, '<p>\r\n\r\n</p><p>“Hạ Gục” Vài Trái Tim Chỉ Bằng Một Ánh Nhìn Với OH L’AMOUR TEE</p><p>Bạn có tin vào Tình yêu chỉ từ một câu nói?</p><p>Oh L’amour trong Tiếng Pháp nghĩa là “Ôi! Tình yêu”. Đó là cách gọi ngọt ngào mà những chàng trai lãng mạn xứ Pháp gọi người tình của mình. Truyền thuyết kể rằng, tiếng gọi đầy sức mê hoặc này đã thu hút không biết bao nhiêu con tim si mê, làm xao xuyến không biết bao cô gái trẻ đẹp.</p><p>Ấn tượng từ lâu với câu nói đầy lãng mạn “Ôi! Tình yêu” này, SSStutter đã phải gửi ngay vào sản phẩm áo phông mới nhất của chúng mình - OH L’AMOUR TEE</p><p>Chưa kể đến ý nghĩa cực tình trên áo, bản thân Oh L’amour Tee đã là một trong những chiếc áo phông tốt nhất từng được Fashe sản xuất, với thiết kế Chất lượng đến từng đường kim mũi chỉ. Thêm điểm nhấn với màu sắc mới lạ, chiếc áo này chắc chắn sẽ khiến vài trái tim đang thổn thức ngay từ cái nhìn đầu tiên đấy! </p>\r\n\r\n<br><p></p>');
INSERT INTO `products` VALUES (9, 2, 'GREAT LIFE TEE', 129000, 0, 'images/products/sp9.jpg', 'Còn hàng', 58, '<p>\r\n\r\n</p><p>“Để mỗi ngày bạn thức dậy lại là một ngày Tuyệt Vời”</p><p>Với sứ mệnh mang đến vẻ đẹp “Bảnh bao từ bên trong”, Fashe chúng mình luôn tâm niệm phải mang đến những sản phẩm không chỉ Đẹp, mà còn luôn phải khiến bạn bè gần xa cảm thấy Tuyệt Vời mỗi ngày.</p><p>Hiểu được mong muốn của các bạn, chúng mình đã ấp ủ từ lâu một mẫu áo phông “Tuyệt vời” chỉ chờ hôm nay để trình làng - GREAT LIFE TEE Là phiên bản nâng cấp từ “người anh em” Great Day Tee, Great Life Tee đã được hoàn thiện thiết kế - Chất Lượng hơn từ phần cổ áo bo đến từng đường kim mũi chỉ &amp; Form áo. Great Life Tee xứng đáng là Mẫu Áo Phông Xuất Sắc Nhất từng được SSStutter thiết kế.</p>\r\n\r\n<br><p></p>');
INSERT INTO `products` VALUES (10, 2, 'NEW YORK TEE', 299000, 0, 'images/products/sp10.jpg', 'Còn hàng', 138, '<p>\r\n\r\n</p><p>“Chẳng có cách nào thể hiện Cá Tính bản thân tuyệt hơn một chiếc Áo Phông!”</p><p>Nếu là một người bạn lâu năm của Fashe, chắc chắn ai cũng thấy văn hóa Mỹ ảnh hưởng sâu sắc đến thương hiệu của chúng mình, từ cách trang trí cửa hàng, logo nhỏ ở mỗi góc sản phẩm,.... Đơn giản vì ở SSS., chúng mình luôn cố gắng học hỏi từ những điều tốt nhất, mà một trong số đó phải kể đến ý chí và nghị lực xuất sắc của người Mỹ trong công việc. Với họ, thành công sẽ đến với những người chăm chỉ, những người luôn sống và làm việc với 200% công suất.</p><p>Đó là lí do vì sao những sản phẩm của Fashe luôn mang hơi thở của nước Mỹ, đặc biệt là dòng áo phông “New York”. Trẻ trung, nhiệt huyết nhưng vẫn vô cùng bảnh bao, chỉ một chiếc áo phông đã đủ để thể hiện hết những cá tính, tham vọng của bất cứ chàng trai nào!</p>\r\n\r\n<br><p></p>');
INSERT INTO `products` VALUES (11, 3, 'classic - all black', 750000, 675000, 'images/products/sp11.jpg', 'Còn hàng', 73, '<p>\r\n\r\nChất liệu: Polyethylene Foam (Chống nước, chống khuẩn và làm sạch dễ dàng)<br>Màu sắc: Đen<br>Ngăn laptop: 15.6 inch<br>Kích thước: Cao 46cm / Ngang 30cm / Sâu 13cm<br>Xuất xứ: Việt Nam\r\n\r\n<br></p>');
INSERT INTO `products` VALUES (12, 3, 'Settlement - Navy', 950000, 855000, 'images/products/sp12.jpg', 'Còn hàng', 94, '<p>\r\n\r\nChất liệu: 100% Polyester<br>Màu sắc: Xanh navy<br>Ngăn laptop: 15 inch<br>Kích thước: Cao 45cm / Ngang 31cm / Sâu 14.6cm\r\n\r\n<br></p>');
INSERT INTO `products` VALUES (13, 3, 'Balo HZ-0475A', 580000, 0, 'images/products/sp13.jpg', 'Còn hàng', 102, '<p>\r\n\r\nChất liệu: Vải thô canvas<br>Màu sắc: Xám đậm<br>Ngăn laptop: 14 inch<br>Kích thước: Cao 42cm / Ngang 31cm / Sâu 17cm\r\n\r\n<br></p>');
INSERT INTO `products` VALUES (14, 3, 'Classic - Eclipse X', 675000, 0, 'images/products/sp14.jpg', 'Còn hàng', 19, '<p>\r\n\r\nChất liệu: Vải thô canvas<br>Màu sắc: Xanh dương<br>Ngăn laptop: 15.6 inch<br>Kích thước: Cao 42cm / Ngang 31cm / Sâu 17cm\r\n\r\n\r\n<br></p>');
INSERT INTO `products` VALUES (15, 3, 'BP-VANS-Flame', 420000, 0, 'images/products/sp15.jpeg', 'Còn hàng', 35, '<p>\r\n\r\nChất liệu: 100% Polyester<br>Màu sắc: Đen&nbsp;<br>Ngăn laptop: 13 inch<br>Kích thước: Cao 43cm / Ngang 31cm / Sâu 12cm\r\n\r\n<br></p>');
INSERT INTO `products` VALUES (16, 4, 'mood jacket', 680000, 340000, 'images/products/5bf0cc718507c.jpg', 'Còn hàng', 29, '<p>\r\n\r\nMood Jacket - sản phẩm \"mở hàng\" cho xu hướng \"smart clothing\" đảm bảo sẽ khiến bạn phải bất ngờ!<br><br>Đã bao giờ bạn thấy một chiếc áo khoác không có cổ áo? Nhưng lạ chưa, mặc lên vừa ấm lại vừa có gout, kết hợp với áo len hay sơmi cũng đều hài hoà đến đáng ngạc nhiên!<br><br>Đó chính là cái hay của Mood Jacket đó - sản phẩm có 2 màu Ghi / Đỏ Cam với chất liệu dạ nhập khẩu cao cấp - hiện chỉ còn rất ít tại các chi nhánh do đơn đặt hàng trước đã chờ đợi từ đầu mùa đông.\r\n\r\n<br></p>');
INSERT INTO `products` VALUES (19, 2, 'MIND BRIDGE', 350000, 0, 'images/products/5f2eb61cadbd1.jpg', 'Còn hàng', 2, '<p>\r\n\r\nÁo phông cổ tròn kiểu dáng cơ bản. Chất liệu cotton poly pha 5% PU đảm bảo các yếu tố - thoáng mát, mềm mại, co dãn tốt, bền bỉ. Màu sắc be, xanh lá tươi trẻ, đầy sức sống nhưng không quá nổi, ngược lại tạo thiện cảm dễ chịu. Điểm nhấn là hình thêu nhỏ xuất hiện trên túi áo tạo hiệu ứng thị giác thú vị. Sản phẩm nằm trong Youth Summer Collection 2020 của Mind Bridge.\r\n\r\n<br></p>');
INSERT INTO `products` VALUES (20, 3, 'BALO APE', 450000, 0, 'images/products/5f2ebe8c52d6a.jpg', 'Còn hàng', 3, '<p>\r\n\r\n</p><p>Balo kéo khóa, thiết kế cơ bản với 2 quai đeo vai có thể điều chỉnh độ dài. Chiếc tem thương hiệu nhỏ được gắn dưới góc bên trái. Sản phẩm gồm một ngăn lớn, một ngăn phía trước và các ngăn phụ bên trong tiện dụng, linh hoạt với mọi mục đích sử dụng. </p><p>Cao x Rộng x Sâu: 46cm x 32cm x 17cm</p>\r\n\r\n<br><p></p>');
INSERT INTO `products` VALUES (21, 2, 'VERTICAL COTTON SHIRT', 399000, 0, 'images/products/5f2ec1dfe5a92.jpg', 'Tạm hết hàng', 0, '<p>\r\n\r\nÁo sơ mi form classic, cổ mandarin không khít. Thiết kế trẻ trung với những đường cắt xẻ vừa phải ở đuôi áo. Áo kẻ sọc được phối hợp hài hòa với đường kẻ ngang và kẻ chéo ở tay và cổ áo. Hai màu sắc xanh/nâu thanh lịch và không kén da. Thêm vào đó, chất liệu cotton 100% cũng đảm bảo độ thoáng mát cho người mặc.\r\n\r\n<br></p>');

-- ----------------------------
-- Table structure for slideshows
-- ----------------------------
DROP TABLE IF EXISTS `slideshows`;
CREATE TABLE `slideshows`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `caption` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sort_order` int(11) NULL DEFAULT NULL,
  `effect` int(255) NULL DEFAULT NULL,
  `link_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of slideshows
-- ----------------------------
INSERT INTO `slideshows` VALUES (1, 'images/slideshows/slide1.jpg', 'shirt', 'New Collection 2020', 1, 1, 'product.php?id=2');
INSERT INTO `slideshows` VALUES (2, 'images/slideshows/slide2.jpg', 'trouser', 'New Collection 2020', 2, 2, 'product.php?id=1');
INSERT INTO `slideshows` VALUES (3, 'images/slideshows/slide3.jpg', 'balo', 'New Collection 2020', 3, 3, 'product.php?id=3');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` int(11) NULL DEFAULT NULL,
  `address` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `avatar` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gender` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone_number` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (20, 'hoangtv0710@gmail.com', 'hoàng', '$2y$10$KF1ObqYrslgXj93ZbVNOm.BI3yz0xaCM.XBERCo1J12YkZ0p1e0lu', 3, '', 'images/default/user.png', NULL, '');
INSERT INTO `users` VALUES (23, 'demo@gmail.com', 'demo', '$2y$10$xSugoyKv765TY8DsERJ2/.mPIOwLNdM5Iw1n3x1XNVymBlHNG4cX6', 2, 'Hà nội', 'images/default/user.png', NULL, '0374969474');

-- ----------------------------
-- Table structure for web_settings
-- ----------------------------
DROP TABLE IF EXISTS `web_settings`;
CREATE TABLE `web_settings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slogan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hotline` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `map` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ship_policy` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `return_policy` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `open_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of web_settings
-- ----------------------------
INSERT INTO `web_settings` VALUES (1, 'images/icons/5beafc57d05eb.png', 'Miễn phí giao hàng cho tất cả đơn hàng', '0374.969.474', 'hoangtv.dev@gmail.com', 'https://www.facebook.com', 'https://www.instagram.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14898.62043552233!2d105.77182893596874!3d21.00645785783943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134535103d68d8d%3A0x12421609bea07753!2zTeG7hSBUcsOsLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1596723036833!5m2!1svi!2s\" width=\"100%\" height=\"300\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', 'Mễ Trì, Hà Nội', 'Miễn phí giao hàng cho tất cả đơn hàng mua tại shop', 'Với 7 ngày đầu tiên bạn có thể đổi trả cho cửa hàng', 'thứ 2 - 7 / 8h-22h');

SET FOREIGN_KEY_CHECKS = 1;
