-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th9 26, 2023 lúc 07:15 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cf`
--
--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `status`, `created_at`, `updated_at`) VALUES
                                                                                                  (1, 'Cà Phê', 'ca-phe', 'ca-phe14.png', 1, NULL, NULL),
                                                                                                  (2, 'Trà Trái Cây', 'tra-trai-cay', 'tra-trai-cay62.png', 1, NULL, NULL),
                                                                                                  (3, 'Đá Xay', 'da-xay', 'da-xay70.png', 1, NULL, NULL),
                                                                                                  (4, 'Thưởng Thức Tại Nhà', 'thuong-thuc-tai-nha', 'thuong-thuc-tai-nha33.png', 1, NULL, NULL),
                                                                                                  (5, 'Bánh - Snacks', 'banh-snacks', 'banh-snacks30.png', 1, NULL, NULL),
                                                                                                  (7, 'ca phe hoa tan', 'ca-phe-hoa-tan', '1656664050.jpg', 1, '2022-07-01 01:27:30', '2022-07-01 01:27:30');



--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `thumb_image`, `category_id`, `description`, `content`, `price`, `status`, `created_at`, `updated_at`) VALUES
                                                                                                                                                         (1, 'Cà Phê Sữa Nóng', 'ca-phe-sua-nong', 'ca-phe-nong59.jpg', 1, 'Cà phê được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.', 'Cà phê sữa nóng - Sự độc đáo trong thưởng thức cà phê của người Việt\n\nCà phê phin kết hợp cùng sữa đặc là một sáng tạo đầy tự hào của người Việt, được xem món uống thương hiệu của Việt Nam.\n\nKhi người Pháp đem văn hóa cà phê vào Việt Nam, người bản xứ thay thế sữa tươi đắt đỏ bằng sữa đặc rẻ tiền hơn để pha cùng cà phê. Tuy nhiên, bằng sự kết hợp hài hòa giữa các thái cực đắng – ngọt, bùi – béo, ly cà phê sữa đá lại sánh đặc và đậm đà hơn, không làm mất đi công dụng của cà phê mà bổ sung thêm năng lượng cho cơ thể từ sữa đã trở thành quen thuộc với nếp sống của người Việt và là một nét sáng tạo riêng, chinh phục được trái tim hàng triệu người yêu cà phê trên thế giới.\n\nNhà báo Nicola Graydon từng miêu tả và chia sẻ cảm nhận của mình trên tờ nhật báo nổi tiếng của Anh rằng: \"Đó là loại cà phê mạnh, nhỏ giọt từ một phin kim loại nhỏ, bên dưới ly chứa khoảng ¼ lượng sữa đặc. Sau khoảng 15 phút, khi café ngừng nhỏ giọt, bạn sẽ khuấy đều và cho đá vào. Đầu tiên, tôi không chịu được cái ngọt kiểu như vậy. Tuy nhiên sau 3 ngày, tôi bị khuất phục và nghiện cái ngọt “thần thánh” ấy. Thật tuyệt vời khi cảm nhận cái ngọt thanh mát trong cuống họng, điều mà chúng ta không thấy ở một ly latte cổ điển”.\n\nCũng có người đã miêu tả Cà phê sữa rằng: Cà phê thì đắng mà sữa lại quá ngọt ngào. Hai vị đắng - ngọt như hương vị của cuộc sống, nên thưởng thức Cà phê sữa cũng giống như đang thưởng thức cuộc sống.\n\nVà The Coffee House nghĩ rằng: Chằng có cách nào mô tả chính xác được mùi vị của Cà phê sữa Việt Nam hơn việc tự mình thưởng thức. Còn gì tuyệt vời hơn bắt đầu một ngày mới, trong tiết trời se se lạnh bằng một ly Cà phê sữa nóng thơm lừng và tinh tế đúng không nào!', 20000, 1, NULL, '2023-09-23 17:52:28'),
                                                                                                                                                         (2, 'Americano Nóng', 'amerricano-nong', 'americano-nong14.jpg', 1, 'Americano được pha chế bằng cách pha thêm nước với tỷ lệ nhất định vào tách cà phê Espresso, từ đó mang lại hương vị nhẹ nhàng và giữ trọn được mùi hương cà phê đặc trưng.', 'Khám phá tách cà phê Americano theo phong cách Mỹ\r\n\r\nAmericano bắt nguồn từ Espresso. Đây là một thức uống truyền thống của Mỹ và đã trở nên quen thuộc với các tín đồ cà phê trên thế giới.\r\n\r\n\r\n\r\nNguồn gốc lịch sử\r\n\r\nCâu chuyện được kể lại rằng trong Thế Chiến Thứ II, những binh sĩ Mỹ đóng quân trên đất Ý đã rơi vào tình trạng \"say bí tỉ\" khi lần đầu tiếp xúc với hương vị Espresso mạnh mẽ vùng bản địa.\r\n\r\nVốn không quen với độ sánh đặc của cà phê nơi đây, họ đã nảy ra ý tưởng thêm nước nóng vào cốc Espresso để làm loãng nó.\r\n\r\nVà từ đó, Americano của người Mỹ (American) ra đời.\r\n\r\nTại The Coffee House, Americano được các nghệ nhân pha chế bằng cách pha thêm nước với tỷ lệ nhất định vào tách cà phê Espresso, từ đó mang lại hương vị nhẹ nhàng và giữ trọn được mùi hương cà phê đặc trưng.\r\n\r\n\r\n\r\nLợi ích khi thưởng thức cà phê Americano mỗi ngày\r\n\r\nNgoài việc mang đến sự tỉnh táo, linh hoạt cho người uống, Americano còn có thành phần chống oxy hóa nên nếu thưởng thức hằng ngày sẽ giúp ngăn ngừa xơ gan, giảm hen suyễn, lợi tiểu và hỗ trợ chống ung thư.\r\n\r\n\r\n\r\nVậy nên, hãy bắt đầu buổi sáng của mình bằng một tách Cà phê Americano The Coffee House nhé!', 21000, 1, NULL, '2022-07-14 06:01:25'),
                                                                                                                                                         (3, 'Cà Phê Hòa Tan Đậm Vị Việt Túi 40x16G', 'ca-phe-da-hoa-tan', 'ca-phe-da-hoa-tan56.jpg', 4, 'Bắt đầu ngày mới với tách cà phê sữa “Đậm vị Việt” mạnh mẽ sẽ giúp bạn luôn tỉnh táo và hứng khởi cho ngày làm việc thật hiệu quả.', 'Khám phá tách cà phê Americano theo phong cách Mỹ\r\n\r\nAmericano bắt nguồn từ Espresso. Đây là một thức uống truyền thống của Mỹ và đã trở nên quen thuộc với các tín đồ cà phê trên thế giới.\r\n\r\n\r\n\r\nNguồn gốc lịch sử\r\n\r\nCâu chuyện được kể lại rằng trong Thế Chiến Thứ II, những binh sĩ Mỹ đóng quân trên đất Ý đã rơi vào tình trạng \"say bí tỉ\" khi lần đầu tiếp xúc với hương vị Espresso mạnh mẽ vùng bản địa.\r\n\r\nVốn không quen với độ sánh đặc của cà phê nơi đây, họ đã nảy ra ý tưởng thêm nước nóng vào cốc Espresso để làm loãng nó.\r\n\r\nVà từ đó, Americano của người Mỹ (American) ra đời.\r\n\r\nTại The Coffee House, Americano được các nghệ nhân pha chế bằng cách pha thêm nước với tỷ lệ nhất định vào tách cà phê Espresso, từ đó mang lại hương vị nhẹ nhàng và giữ trọn được mùi hương cà phê đặc trưng.\r\n\r\n\r\n\r\nLợi ích khi thưởng thức cà phê Americano mỗi ngày\r\n\r\nNgoài việc mang đến sự tỉnh táo, linh hoạt cho người uống, Americano còn có thành phần chống oxy hóa nên nếu thưởng thức hằng ngày sẽ giúp ngăn ngừa xơ gan, giảm hen suyễn, lợi tiểu và hỗ trợ chống ung thư.\r\n', 50000, 1, NULL, NULL),
                                                                                                                                                         (4, 'Cà Phê Sữa Đá', 'ca-phe-sua-da', 'ca-phe-sua-da16.jpg', 1, 'Cà phê Đắk Lắk nguyên chất được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.', 'Cà phê sữa đá - Sự độc đáo trong thưởng thức cà phê của người Việt\r\n\r\n\r\n\r\nCà phê phin kết hợp cùng sữa đặc là một sáng tạo đầy tự hào của người Việt, được xem món uống thương hiệu của Việt Nam.\r\n\r\nKhi người Pháp đem văn hóa cà phê vào Việt Nam, người bản xứ thay thế sữa tươi đắt đỏ bằng sữa đặc rẻ tiền hơn để pha cùng cà phê. Tuy nhiên, bằng sự kết hợp hài hòa giữa các thái cực đắng – ngọt, bùi – béo, ly cà phê sữa đá lại sánh đặc và đậm đà hơn, không làm mất đi công dụng của cà phê mà bổ sung thêm năng lượng cho cơ thể từ sữa đã trở thành quen thuộc với nếp sống của người Việt và là một nét sáng tạo riêng, chinh phục được trái tim hàng triệu người yêu cà phê trên thế giới.\r\n\r\nNhà báo Nicola Graydon từng miêu tả và chia sẻ cảm nhận của mình trên tờ nhật báo nổi tiếng của Anh rằng: \"Đó là loại cà phê mạnh, nhỏ giọt từ một phin kim loại nhỏ, bên dưới ly chứa khoảng ¼ lượng sữa đặc. Sau khoảng 15 phút, khi café ngừng nhỏ giọt, bạn sẽ khuấy đều và cho đá vào. Đầu tiên, tôi không chịu được cái ngọt kiểu như vậy. Tuy nhiên sau 3 ngày, tôi bị khuất phục và nghiện cái ngọt “thần thánh” ấy. Thật tuyệt vời khi cảm nhận cái ngọt thanh mát trong cuống họng, điều mà chúng ta không thấy ở một ly latte cổ điển”.\r\n\r\nCũng có người đã miêu tả Cà phê sữa đá rằng: Cà phê thì đắng mà sữa lại quá ngọt ngào. Hai vị đắng - ngọt như hương vị của cuộc sống, nên thưởng thức Cà phê sữa cũng giống như đang thưởng thức cuộc sống.\r\n\r\nVà The Coffee House nghĩ rằng: Chằng có cách nào mô tả chính xác được mùi vị của Cà phê sữa Việt Nam hơn việc tự mình thưởng thức. Còn gì tuyệt vời hơn khi bắt đầu một ngày làm việc tràn đầy năng lượng hay tận hưởng ngày nghỉ của mình bằng một ly Cà phê sữa tinh tế đúng không nào!.\r\n\r\n', 22000, 1, NULL, NULL),
                                                                                                                                                         (5, 'Cappuccino Nóng', 'cappuccino-nong', 'cappuccino-nong1.jpg', 1, 'Capuchino là thức uống hòa quyện giữa hương thơm của sữa, vị béo của bọt kem cùng vị đậm đà từ cà phê Espresso. Tất cả tạo nên một hương vị đặc biệt, một chút nhẹ nhàng, trầm lắng và tinh tế.', 'Cappuchino - Hương vị hoàn hảo làm say đắm mọi giác quan\r\nCappuchino là một thức uống quen thuộc gắn liền với đất nước Ý xinh đẹp và thơ mộng. \r\n\r\nĐây là một loại thức uống được pha chế cầu kỳ và tinh tế. Một tách Cappuchino ngon đúng điệu là sẽ mang hương vị nồng nàn của cà phê Espresso hòa quyện sữa thơm dịu, đi kèm lớp bọt sữa bồng bềnh, béo ngậy.\r\n\r\nBởi chính hương vị thơm ngon cùng nghệ thuật pha chế và tạo hình bọt sữa đầy tinh tế của Barista tại The Coffee House, khi nhấp một ngụm Cappuchino, thực khách sẽ được trải nghiệm một hành trình vị giác đầy mê hoặc. Đó cũng là lý do vì sao Cà phê Cappuchino dễ dàng chinh phục nhiều khách hàng trong những năm qua.\r\n\r\nHãy đặt thử và cho The Coffee House cảm nhận của riêng mình nhé!', 30000, 1, NULL, NULL),
                                                                                                                                                         (6, 'Caramel Macchiato Nóng', 'caramel-macchiato-nong', 'caramel-macchiato-nong4.jpg', 1, 'Caramel Macchiato sẽ mang đến một sự ngạc nhiên thú vị khi vị thơm béo của bọt sữa, sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng và vị ngọt đậm của sốt caramel được gói gọn trong một tách cà phê.', 'Caramel Macchiato - Cái nhấp môi ngọt ngào\r\nMỗi cái nhấp môi vào tách Caramel Macchiato sẽ đem đến một sự ngạc nhiên thú vị, vì nhiều hương vị được gói gọn trong một tách cà phê.\r\n\r\nNhững năm trở lại đây, những món đồ uống liên quan đến cụm từ “Macchiato” đều trở thành trào lưu của các tín đồ sành ăn.\r\n\r\nTùy vào sở thích, tâm trạng khác nhau mà chúng ta có những cảm nhận rất riêng. Ở The Coffee House, Caramel Macchiato là một trong món khách hàng ưa thích chọn lựa.\r\n\r\nVậy điều gì đã làm nên thức uống đầy mê hoặc này?\r\n\r\nĐể tạo nên một tách cà phê Caramel Macchiato tuyệt hảo thì yêu cầu bắt buộc phải sử dụng cà phê thượng hạng và nguyên chất. Do đó, The Coffee House luôn đảm bảo chất lượng cà phê từ chọn giống, chăm sóc, sơ chế,… để mang đến cho thực khách sự ngạc nhiên và thỏa mãn vị giác bởi một tách cà phê Caramel Macchiato thơm béo của bọt sữa sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng và vị ngọt đậm của sốt caramel được gói gọn trong một tách cà phê.\r\n\r\nBên cạnh đó, bằng sự điêu luyện và tỉ mỉ của các nghệ nhân pha chế, mỗi tách Caramel Macchiato tại The Coffee House đều thể hiện sự tinh tế, nhẹ nhàng mang đến cảm xúc thăng hoa cho người thưởng thức.\r\n\r\nGiờ thì thử liền một tách Caramel Macchiato ngon đúng điệu đi chứ nhỉ!', 32000, 1, NULL, NULL),
                                                                                                                                                         (7, 'Trà Matcha Latte Đá', 'chanh-da-xay', 'chanh-da-xay65.jpg', 3, 'Với màu xanh mát mắt của bột trà Matcha, vị ngọt nhẹ nhàng, pha trộn cùng sữa tươi và lớp foam mềm mịn, Matcha Latte sẽ khiến bạn yêu ngay từ lần đầu tiên.', 'Matcha Latte – Yêu từ cái nhìn đầu tiên\r\nVới thành phần chính là Matcha quen thuộc vậy Matcha Latte có gì thú vị để có thể khiến bạn yêu từ cái nhìn đầu tiên?\r\n\r\nHương vị vừa quen vừa lạ\r\n\r\nTuy là thức uống được The Coffee House ra mắt từ nhiều năm, nhưng Matcha latte luôn nằm trong Top thức uống được mọi người lựa chọn. Là thức uống được biến tấu độc đáo từ Coffee latte - thức uống kết hợp giữa cà phê và sữa tươi, được thay thế nguyên liệu cà phê bằng nguyên liệu bột trà xanh. Do vậy thức uống này có hàm lượng cafein ít hơn cà phê để phục vụ những khách hàng không thích nạp nhiều cafein vào trong cơ thể. Matcha latte vừa quen vừa lạ với hương thơm trà xanh đặc trưng, quyện cùng lớp sữa béo ngậy, cho từng ngụm tươi mát, khiến các fan matcha sẽ không thể bỏ lỡ.\r\n\r\nThưởng thức Matcha Latte có gì thú vị?\r\n\r\nKhông những có hương vị tuyệt vời, Matcha còn chứa hàm lượng chất chống oxy hóa cao và nguồn caffein tốt cho sức khỏe. Nếu Cappucinno hay Latte có hơi \"quá sức\" đối với bạn, The Coffee House gợi ý bạn nên thử Matcha Latte - Bạn sẽ cảm thấy sảng khoái và tỉnh táo suốt một ngày dài đấy.\r\n\r\nOrder ngay một ly latte cho cả ngày tỉnh táo nhé!', 24000, 1, NULL, '2022-07-20 06:43:20'),
                                                                                                                                                         (8, 'Espresso Đá', 'espresso-da', 'espresso-da87.jpg', 1, 'Một tách Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc.', 'Espresso - Cà phê tinh chất nhất theo phong cách Ý\r\nTạm gác lại những ồn ào nơi phố thị và thử nhâm nhi ly cà phê Espresso hương vị đậm đà, tinh tế của The Coffee House để tận hưởng những khoảnh khắc diệu kỳ của cuộc sống.\r\n\r\nNgười ta vẫn hay ví Espresso là phép màu trong một chiếc tách vì độ quyến rũ không phai của nó.\r\n\r\nMột cốc Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc. Để đạt được sự kết hợp này, The Coffee House xay tươi hạt cà phê cho mỗi lần pha.\r\n\r\nLớp bọt khí nhỏ li ti màu nâu nhạt nằm trên cùng của cốc Espresso được gọi là crema. Thời gian để \"bắt\" được lớp crema xốp nhẹ và lâu tan chỉ vỏn vẹn 27 giây, dưới áp suất nước xấp xỉ 9 bar của Macchiana (máy pha Espresso) với nhiệt độ không quá 95°C. Nếu không chính xác, crema của bạn sẽ bị đắng.\r\n\r\nTuy nhiên, không có gì gọi là chuẩn mực, cà phê Espresso cũng thế. Hương vị cuối cùng của Espresso được tạo ra bằng dấu ấn của Barista khi pha chế.\r\n\r\nVì thế mỗi cốc Espresso The Coffee House mang đến cho bạn đều mang một vị ngon rất riêng, không trộn lẫn, không lặp lại.', 35000, 1, NULL, NULL),
                                                                                                                                                         (9, 'Latte Đá', 'latte-tao-da', 'latte-tao-da30.jpg', 1, 'Một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.', 'Latte - Sự tinh tế trong hương vị, mùi vị lẫn nhãn quan\r\nKhi chuẩn bị Latte, cà phê Espresso và sữa nóng được trộn lẫn vào nhau, bên trên vẫn là lớp bọt sữa nhưng mỏng và nhẹ hơn Cappucinno.\r\n\r\nGiống như Cappuchino, Latte cũng được pha chế gồm 3 lớp nguyên liệu chính: Cà phê Espresso, sữa nóng và lớp bọt sữa thơm mịn. Nếu không phải là người sành thưởng thức cà phê, bạn sẽ khó lòng phân biệt được 2 loại cà phê này. Khi pha chế Latte, các Barista thường thể hiện sự sáng tạo hoặc gửi gắm tâm ý của họ đến thực khách thông qua những hình vẽ nghệ thuật và tinh tế. Thực chất, điểm khác biệt giữa Latte và Cappuchino chính là: Lượng bọt sữa của Cappuchino dày hơn so với Latte.\r\n\r\nNgoài ra, Cà phê Latte The Coffee House là một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.\r\n\r\nChọn một tách Latte tinh tế chính là cách giúp bạn có một ngày thêm trọn vẹn, thử ngay nhé!', 23000, 1, NULL, NULL),
                                                                                                                                                         (10, 'Latte Táo Lê Quế', 'latte-tao-le', 'latte-tao-le21.jpg', 1, 'Phiên bản Chai Fresh tiện lợi, với thức uống đậm đà, thú vị tuyệt hảo để cùng bạn tận hưởng những ngày cuối năm ấm áp và trọn vẹn.', 'Latte - Sự tinh tế trong hương vị, mùi vị lẫn nhãn quan\r\nKhi chuẩn bị Latte, cà phê Espresso và sữa nóng được trộn lẫn vào nhau, bên trên vẫn là lớp bọt sữa nhưng mỏng và nhẹ hơn Cappucinno.\r\n\r\nGiống như Cappuchino, Latte cũng được pha chế gồm 3 lớp nguyên liệu chính: Cà phê Espresso, sữa nóng và lớp bọt sữa thơm mịn. Nếu không phải là người sành thưởng thức cà phê, bạn sẽ khó lòng phân biệt được 2 loại cà phê này. Khi pha chế Latte, các Barista thường thể hiện sự sáng tạo hoặc gửi gắm tâm ý của họ đến thực khách thông qua những hình vẽ nghệ thuật và tinh tế. Thực chất, điểm khác biệt giữa Latte và Cappuchino chính là: Lượng bọt sữa của Cappuchino dày hơn so với Latte.\r\n\r\nNgoài ra, Cà phê Latte The Coffee House là một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.\r\n\r\nChọn một tách Latte tinh tế chính là cách giúp bạn có một ngày thêm trọn vẹn, thử ngay nhé!', 29000, 1, NULL, NULL),
                                                                                                                                                         (11, 'Mít Sấy', 'mit-say', 'mit-say26.jpg', 5, 'Mít sấy khô vàng ươm, giòn rụm, giữ nguyên được vị ngọt lịm của mít tươi.', 'Mít sấy - Món ăn vặt không thể bỏ qua khi ghé The Coffee House\r\n\r\n\r\nMón ăn vặt đặc trưng của miền nhiệt đới\r\n\r\nLà một loại quả đặc trưng của miền nhiệt đới, Mít được trồng rất nhiều ở khu vực Đông Nam Á, trong đó có Việt Nam. Mít sấy khô có màu vàng ươm, giòn rụm, giữ nguyên được vị ngọt lịm của mít tươi.\r\n\r\n\r\n\r\nĂn vặt chứa nhiều Vitamin\r\n\r\nBên cạnh được yêu thích nhờ hương vị hấp dẫn, mít sấy còn là món ăn vặt cung cấp nhiều dinh dưỡng. Trong mít sấy chứa chất xơ, vitamin A, vitamin C, ….giúp cơ thể tăng cường hệ miễn dịch, chống oxy hoá, kiểm soát các bệnh về tim mạch. \r\n\r\n\r\n\r\nMít sấy món ăn vặt không thể thiếu cho những ngày bạn cần một chút ngọt ngào, Order ngay.\r\n\r\n', 60000, 0, NULL, '2022-07-20 20:13:53'),
                                                                                                                                                         (12, 'Mocha Đá', 'mocha-da', 'mocha-da41.jpg', 1, 'Loại cà phê được tạo nên từ sự kết hợp hoàn hảo của vị đắng đậm đà của Espresso và sốt sô-cô-la ngọt ngào mang tới hương vị đầy lôi cuốn, đánh thức mọi giác quan nên đây chính là thức uống ưa thích của phụ nữ và giới trẻ.', 'Mocha – Một chút đắng của tình yêu đầu\r\nKhông như cà phê Cappuchino chỉ có một lớp bọt sữa trên bề mặt, cà phê Mocha còn hòa quyện cả vị thơm béo của kem tươi và sốt sô-cô-la.\r\n\r\nNgười ta thường ví cà phê như một thức uống kỳ diệu. Chúng không ngọt ngào để nuông chiều cảm xúc của bất kỳ ai nhưng lại mang đến một sự bí ẩn rất cuốn hút, khơi gợi người khác phải khám phá.\r\n\r\nBên cạnh những loại cà phê máy như Espresso, Cappuchino, Latte,… thực khách tại The Coffee House cũng dành nhiều tình cảm cho một loại cà phê khác mang tên Mocha. Mocha là một dạng hỗn hợp giữa cà phê và sô-cô-la nóng. Không như cà phê Cappuchino chỉ có một lớp bọt sữa trên bề mặt, cà phê Mocha còn hòa quyện cả vị thơm béo của kem tươi và sốt sô-cô-la. Mùi vị này, hương thơm này tựa như hương vị của một tình yêu chớm nở, vừa có chút vị đắng của Espresso và sự ngọt ngào đầy lôi cuốn.\r\n\r\n Nếu bạn thích socola và cũng nghiện cà phê thì Mocha sẽ là sự lựa chọn hoàn hảo rồi đấy!', 43000, 1, NULL, NULL),
                                                                                                                                                         (13, 'Mocha Nóng', 'mocha-nong', 'mocha-nong95.jpg', 1, 'Loại cà phê được tạo nên từ sự kết hợp hoàn hảo của vị đắng đậm đà của Espresso và sốt sô-cô-la ngọt ngào mang tới hương vị đầy lôi cuốn, đánh thức mọi giác quan nên đây chính là thức uống ưa thích của phụ nữ và giới trẻ.', 'Mocha – Một chút đắng của tình yêu đầu\r\nKhông như cà phê Cappuchino chỉ có một lớp bọt sữa trên bề mặt, cà phê Mocha còn hòa quyện cả vị thơm béo của kem tươi và sốt sô-cô-la.\r\n\r\nNgười ta thường ví cà phê như một thức uống kỳ diệu. Chúng không ngọt ngào để nuông chiều cảm xúc của bất kỳ ai nhưng lại mang đến một sự bí ẩn rất cuốn hút, khơi gợi người khác phải khám phá.\r\n\r\nBên cạnh những loại cà phê máy như Espresso, Cappuchino, Latte,… thực khách tại The Coffee House cũng dành nhiều tình cảm cho một loại cà phê khác mang tên Mocha. Mocha là một dạng hỗn hợp giữa cà phê và sô-cô-la nóng. Không như cà phê Cappuchino chỉ có một lớp bọt sữa trên bề mặt, cà phê Mocha còn hòa quyện cả vị thơm béo của kem tươi và sốt sô-cô-la. Mùi vị này, hương thơm này tựa như hương vị của một tình yêu chớm nở, vừa có chút vị đắng của Espresso và sự ngọt ngào đầy lôi cuốn.\r\n\r\n Nếu bạn thích socola và cũng nghiện cà phê thì Mocha sẽ là sự lựa chọn hoàn hảo rồi đấy!', 27000, 1, NULL, NULL),
                                                                                                                                                         (14, 'Trà Dưa Đào Sung Túc', 'tra-chanh', 'tra-chanh69.jpg', 2, 'Vị thơm ngọt của Dưa lưới và đào tươi chua chua trên nền trà Oolong cùng lớp foam cheese mỏng nhẹ tạo nên cảm giác sung túc trong mùa xuân mới.', 'Dưa Đào Sung Túc - Giai điệu tươi vui cho mùa xuân mới\r\n\r\n\r\nNăm mới ngoài bình an, sum vầy, The Coffee House còn mong chúc sự sung túc sẽ đến với mọi nhà. Hy vọng những khó khăn sẽ đi qua, một cuộc sống sung túc hơn sẽ đến, để bạn không còn quá nhiều những bận lòng, bắt lấy thật nhiều cơ hội và thật SUNG cho năm mới 2022..\r\n\r\n\r\n\r\nTrà Dưa Đào Sung Túc với vị thơm ngọt của Dưa lưới và đào tươi chua chua, ngọt ngọt trên nền trà Oolong trứ danh cùng lớp foam cheese mỏng nhẹ vị mặn mặn tạo nên sự cân bằng cho thức uóng, sẽ đem đến cho bạn, gia đình và bạn bè những giai điệu tươi vui, thịnh vượng cho mùa xuân mới.  \r\n\r\n\r\n\r\nDưa Đào Sung Túc của The Coffee House sẽ là đại diện chúc cho năm mới khởi đầu đầy thuận lợi, các chiến hữu sẽ vẫn sát cánh bên nhau thật “sung”. Đặc biệt là đong đầy lộc lá và thật “son” trong năm mới. Cụng ly Dưa Đào Sung Túc của The Coffee House để không khí thêm rộn ràng, khởi đầu sung túc và rước lộc đầu năm bạn nhé!', 22000, 1, NULL, NULL),
                                                                                                                                                         (15, 'Cold Brew Sữa Tươi', 'cold-brew-sua-tuoi', '1656663496.jpg', 7, 'Thanh mát và cân bằng với hương vị cà phê nguyên bản 100% Arabica Cầu Đất cùng sữa tươi thơm béo cho từng ngụm tròn vị, hấp dẫn.', '', 30000, 1, '2022-07-01 01:18:16', '2022-07-01 02:02:17'),
                                                                                                                                                         (16, 'cà phê đá lạnh', 'ca-phe-da-nong', '1657251006.jpg', 2, 'Đây là cà phê nóng', '', 20000, 1, '2022-07-04 07:36:21', '2022-07-07 20:30:06'),
                                                                                                                                                         (17, 'cam tươi', 'cam-tuoi', '1661327832.jpg', 1, 'cam tươi dhdhhđhdhdhdh', 'dddddddddddddddddddddđ', 18000, 1, '2022-08-24 00:57:12', '2022-08-24 00:57:12'),
                                                                                                                                                         (18, 'cam tươi fake no origin price', 'cam-tuoi-fake', '1661327832.jpg', 1, 'cam tươi dhdhhđhdhdhdh', 'dddddddddddddddddddddđ', 18000, 1, '2022-08-24 00:57:12', '2022-08-24 00:57:12');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
