-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2012 at 02:47 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `girasole`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ext` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-self, 1-blank',
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'defined in constants',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `path`, `ext`, `link`, `target`, `position`, `start_date`, `end_date`, `sort`, `is_active`, `created_at`) VALUES
(2, '', '', 'http://cosmopolitan.mn/images/contents/2987.jpg', 1, 'sideright', '0000-00-00', '0000-00-00', 2, 0, '0000-00-00 00:00:00'),
(5, '67ae05f7f45a6d926e7239940f6cd37be7effbb2.jpg', 'jpg', '', 1, 'header', '0000-00-00', '0000-00-00', 0, 0, '2012-06-05 14:35:34'),
(7, '1e32a74b44c03ed28589efe8e5279147d0b1c90d.png', 'png', '', 1, 'sideright', '0000-00-00', '0000-00-00', 1, 1, '2012-10-24 22:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `type`, `parent_id`, `name`, `sort`) VALUES
(1, 'new', 0, 'Хамгийн шилдэг', 1),
(2, 'new', 0, 'Хамгийн эрэлттэй', 1),
(3, 'new', 0, 'Хамгийн дур булаам', 1),
(4, 'beauty', 0, 'Үс засалт', 1),
(5, 'beauty', 0, 'Нүүр будалт', 1),
(6, 'beauty', 0, 'Арьс арчилгаа', 1),
(7, 'beauty', 0, 'Эрүүл мэнд, дасгал', 1),
(8, 'beauty', 0, 'Хумс болон бусад', 1),
(9, 'beauty', 0, 'How-To видео', 1),
(10, 'fashion', 0, 'Гудамжны загвар', 1),
(11, 'fashion', 0, 'Дэгжин охины 10 өдөр', 1),
(12, 'fashion', 0, 'Шилдэг 10 хувцаслалт', 1),
(13, 'beauty', 0, 'Биеийн гоо сайхан', 1),
(14, 'fashion', 0, 'Улаан хивсний ёслол', 0),
(15, 'new', 0, 'Хамгийн хээнцэр', 0),
(16, '', 0, 'Гоо сайхан', 100);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `object_type`, `object_id`, `created_at`, `user_id`, `ip_address`, `name`, `text`) VALUES
(1, 'content', 19, '2012-06-09 19:31:09', 0, '127.0.0.1', '', 'safsadgasd'),
(2, 'content', 19, '2012-06-09 19:32:39', 0, '127.0.0.1', '', 'asdgasdgds'),
(3, 'content', 19, '2012-06-09 19:32:44', 0, '127.0.0.1', '', 'sadgasdgsd'),
(4, 'content', 19, '2012-06-09 19:34:13', 0, '127.0.0.1', '', 'asdgasd'),
(5, 'content', 19, '2012-06-09 19:34:16', 0, '127.0.0.1', '', 'ok'),
(6, 'content', 19, '2012-06-09 19:41:04', 0, '127.0.0.1', '', 'sdasdgasd'),
(7, 'content', 19, '2012-06-09 19:41:07', 0, '127.0.0.1', '', 'serywer'),
(8, 'content', 19, '2012-06-19 14:44:50', 0, '127.0.0.1', '', 'afsasf'),
(9, 'content', 19, '2012-08-22 13:47:38', 0, '127.0.0.1', '', 'wegadgasd'),
(10, 'content', 19, '2012-08-22 13:47:46', 0, '127.0.0.1', '', 'rtuserhdfhadf'),
(11, 'content', 19, '2012-08-22 13:48:36', 0, '127.0.0.1', '', 'sadasdg'),
(12, 'content', 19, '2012-08-22 13:49:38', 0, '127.0.0.1', '', 'adgasdg'),
(13, 'content', 19, '2012-08-22 13:50:14', 0, '127.0.0.1', '', 'adfadfg'),
(14, 'content', 19, '2012-08-22 13:51:26', 0, '127.0.0.1', '', 'asasdg'),
(15, 'content', 7, '2012-08-22 13:52:09', 0, '127.0.0.1', '', 'fghjklhdsfh');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL COMMENT 'not used',
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `cover` varchar(255) NOT NULL,
  `cover_width` int(11) NOT NULL,
  `intro` text,
  `body` text,
  `source` varchar(255) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `nb_views` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_featured` tinyint(1) DEFAULT '1',
  `view_list` varchar(255) NOT NULL,
  `view_detail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `type`, `category_id`, `category_name`, `title`, `cover`, `cover_width`, `intro`, `body`, `source`, `sort`, `nb_views`, `is_active`, `is_featured`, `view_list`, `view_detail`, `created_at`) VALUES
(1, 'other', 16, 'ГОО САЙХАН', 'Gift-a-Day: Inspired Ideas from $5 to $500', 'image201205/cbce403a4d773159069621794fb5040e8bfb99a9.jpg', 400, 'It''s December and to celebrate, we have put together an advent calendar of sorts to help you find the perfect present at the perfect price. So, beginning December 1 (and continuing every day through December 25), we bring you a new, easy-to-acquire item to the list—starting with the chicest way to spend $5 to the smartest way to spend $500.', 'It''s December and to celebrate, we have put together an advent calendar of sorts to help you find the perfect present at the perfect price. So, beginning December 1 (and continuing every day through December 25), we bring you a new, easy-to-acquire item to the list—starting with the chicest way to spend $5 to the smartest way to spend $500.', '', 1, NULL, NULL, NULL, 'list1', 'detail1', '2011-12-19 11:16:35'),
(2, 'other', 16, 'ГОО САЙХАН', 'Вашингтоны загварын үдшийг монгол дээлээр эхлүүлжээ', 'image201205/f8c39ef2d525a180f55e6fb2ea1dd497b71d3fdc.jpg', 400, 'Мэдээ: -Сайн явж ирэв үү. Ва­шингтонд болсон загварын долоо хоног ямаршуухан болж өндөрлөв. Энэ тухай ярихгүй юу?\r\n-Олон улсын хэмжээнд зохиогддог тус арга хэмжээ өнөө жил ес дэх удаагаа болж өндөрлөлөө. Тус загварын долоо хоног Америкийн заг­варын ертөнцийнхний дунд болдог наадмын томоохонд тооцогддог юм билээ. Ди­зайнер Э.Баярцэцэг бид хоёр Вашингтон хотод болсон олон улсын загварын цуг­луулгын үдэшлэгт уригдаж очсон. ', '“DC fashion week” нэртэй­гээр долоо хоног үргэлжилсэн энэ арга хэмжээнд Монгол, Итали, Казахстан, Унгар, Узбекстан гээд дэлхийн олон орны 100 гаруй дизайнер оролцсон.\r\n\r\nТүүнчлэн энэ сарын 21-ний өдөр зохиогдсон загва­рын цуглуулгын үдшийг нээж, хамгийн эхэнд үндэснийхээ хувцсыг олонд сонирхуулах үүрэг бидэнд оногдсон юм. Монгол дизайнеруудын бү­тээсэн хувцсыг өмсөж олонд хүргэх 60 гаруй загвар өмсөгч өөрсдийн танилцуулах хууд­саа бариад хэдийнэ тэнд ирчихсэн байсан.\r\n\r\n-Тэр үдшийн нээлт мон­гол дизайнеруудын ур­ла­сан загвараар эхэлсэн нь ямар учиртай юм бэ?\r\n\r\n-Загварын үзүүлбэрт орол­цохоор холоос уригдаж ирсэн зочид гэдэг утгаар монгол хувцсыг хамгийн түрүүнд сонирхуулах эрх олгосон юм.\r\n\r\n-Тэгэхээр монгол үн­дэсний ямар хувцсыг тэнд сонирхуулав. Хүмүүс хэр хүлээж авсан бэ?\r\n\r\n-Бид хоорондоо ярьж бай­гаад миний зохион бүтээсэн ХII-ХIII зууны үеийн монгол хатдын өмсгөл бүхий заг­вараар эхлүүлж, дизайнер Э.Баярцэцэгийн “Үдшийн хатад” коллекциор өндөр­лөсөн. Тэдгээр загваруудаас “Зоос” коллекци маань үзэгч­дийн анхаарлыг хамгийн ихээр татсан гэж болно. Тэ­гээд ч монгол хөөмийн аялгуу “Зоос” загвартай хосолсныг биширсэн үзэгчид дуу алд­сан. Уг нь ямар ч загварын үдэш чимээ шуугиангүй, намуухан болж өндөрлөдөг. Гэтэл энэ удаад монгол хувцас­ны үзүүлбэр дуусах хүртэл хүмүүсийн алга та­шилт үргэлжилсээр байсан нь бидэнд их урам өгсөн юм.\r\n\r\nЕр нь монгол хувцасны үндсэн өнгө нь тод, асар их бэлгэдэл агуулагдаж байдгаа­раа өвөрмөц юм л даа. Улаан өнгө гал, цэнхрээр хөх тэн­гэрийг бэлгэдсэн байх жи­шээний.\r\n\r\nТухайн үдэш шүүгчид болон энгийн хүмүүс “Монгол хув­цас зохиомж сайтай. Илэр­хийлэх чадвараар ч маш сайн болжээ” гэж хэлж байсан юм. Энэ удаагийн загварын долоо хоногт бид хоёулхнаа оролцоод ирлээ. Бидний дээрх арга хэмжээнд оролцох зардлыг “Монгол костюмс” төвөөс гаргасан.\r\n\r\n-Тэгэхээр нийт хэдэн хувцсаар загварын арга хэмжээнд оролцсон гэж?\r\n\r\n- “Зоос”, “Хатдын үдэш”, “Янжинлхам” болон “Монгол костюмс” төвийн судлаач, зураач, дизайнеруудын бү­тээ­сэн “Эзэнт гүрний бахар­хал” коллекциудаар оролцсон. Нэг коллекци гэхэд арваад хувцастай. Торгоор хийсэн 40 гаруй монгол дээлийг гоёл чимэглэлтэй нь авч явах тийм ч амар байгаагүй. Мон­гол дизайнеруудын хувьд анх удаа загварын энэ томоохон арга хэмжээнд оролцож бай­гаа учраас бид хичээсэн. Үүний үр дүнд, ирэх сарын 19-нд Нью-Йорк хотноо болох загва­рын шоунд оролцох са­налыг бидэнд тавьсан юм. Ямартаа ч тэндхийн хүмүүст Монголын тухай ойлголтыг өгч чадлаа гэж үзэж байна. Учир нь тэд­ний дунд “Монголоос энэ хүртэл сар гаруй хуга­цаанд явж ирсэн үү” гэж асуух хүн ч байсан. Тухайн үед монгол үндэсний хувцсыг Америкийн загварын ертөн­цөд таниулс­ныг олон хүн шагшин ярьж байсан юм. Тэдний дунд тус улсад аж төрдөг мон­голчууд ч байв.\r\n\r\n-Гадаадад амьдардаг монголчуудтай тухтай ярьж амжив уу. Тэд ямаршуухан аж төрж байна?\r\n\r\n- Хэд хэдэн хүнтэй дотно танилцсан. Манай монгол­чуудаас нэлээд хэдэн хүн Америкийн загварын томоо­хон компаниудад туслах ди­зайнерээр ажилладаг юм би­лээ. Энэ нь тэдний хэр авь­яастай, хөдөлмөрч гэдгийг илтгэнэ. Тэд өөрсдийн ажил­ладаг байгууллагынхаа нэр хүнд бүхий дизайнеруудад монгол үндэсний хувцсыг сонирхуулахаар дагуулж ир­сэн байсан.\r\n\r\nМонголчуудад өөрт нь байдаг болоод ч тэр үү үн­дэснийхээ хувцасны гай­хамш­гийг төдийлөн үнэлдэг­гүй. Гэтэл гадаадынхан энэ бүх­нийг цоо шинээр хардаг.\r\n\r\n-Таныг орчин үеийн загвартай монгол дээл ур­ласан гэж байсан. Ийм хувц­сыг загварын долоо хо­ногт хүмүүс хэр их со­нир­хов?\r\n\r\n-Юутай ч загварын долоо хоногийг сонирхохоор ирсэн хүн бүр содон загвар, сонин детальтай орчин үеийн мон­гол дээл гээд гайхширч байна лээ. Зарим хүн монгол дээл­ний талаар ямар ч төсөө­лөлгүй байснаа хэлсэн. Ха­рин тэнд амьдардаг монгол­чууд өдөр тутамд өмсөх дээл байна уу гэж ихэд сураглаж ирсэн. Тиймээс бид энэ мэт дараа дараагийн арга хэм­жээнд оролцохдоо өдөр ту­тамд өмсөх монгол дээлтэй очих хэрэгтэй гэж үзсэн.\r\n\r\n-”DC fashion week” нэр­тэй энэ арга хэмжээ бизне­сийн чиглэлээр зохиогд­дог болохоор дизайне­рууд өөрс­дийн бүтээлээ ху­дал­дах боломжтой гэж сонс­сон. Энэ үнэн үү?\r\n\r\n-Бизнесийн чиглэлээр зохиогддог гэдэг ч үнэндээ дэлхийн олон орны дизай­неруудын нэг дор цугларч, бие биедээ бүтээлээ сонир­хуулдаг арга хэмжээ гэдгээ­рээ онцлог. Нөгөөтэйгүүр, нэр хүндийн асуудал гэж үз­дэг юм билээ. Бид бусад орны дизайнеруудын адил бү­тээлийнхээ танилцуулгыг авч очсон. Харамсалтай нь цаг хугацаа давчуу байсан боло­хоор энэ тал дээр анхаарах ч сөхөө байгаагүй. Монгол дээ­лийг “онлайнаар худалдах уу” гэж олон хүн асуусан. Бид тэр бүрт “Монгол костюмс” тө­вийн вэб сайтыг хэлж өгсөн.\r\n\r\n-Тэгэхээр таны болон монгол дизайнеруудын урласан дээл хэдээр үнэ­лэгдэх вэ?\r\n\r\n-Одоогоор үнэ ханш тог­тоогоогүй. Хэрэв авахаар бол тухайн үед ярьж байгаад үнэлэх байх.\r\n\r\nЧ.Анна\r\n\r\nЗурагчин: dn\r\nОгноо: 2008-09-30\r\n\r\nwww.dailynews.mn-c', NULL, 1, NULL, NULL, NULL, 'list1', 'detail1', '2012-01-25 16:43:40'),
(3, 'other', 16, 'ГОО САЙХАН', 'Вашингтоны загварын үдшийг монгол дээлээр эхлүүлжээ', 'image201205/944733df985cc5b531a443e0e98c8268aaefc12a.jpg', 700, 'Style.com дээр нэг ийм мэдээ байна. Монголын сурвалжилагч нарын энэ зуны / хаврын /намрын / өвлийн загвар юу вэ гэж улиг болсон уйтгарт асуултанд хөөрхөн хинт болох байхдаа.', 'Дэлхийй өөрчилөгдөөд загварын галт тэрэгний хурд өдрөөс өдөрт хором бүрт нэмэгдэж байгаа энэ үеийг тоолох хэдхэн дизайнертай эртний үе шигээ санадаг улс шүү. Бараг л 40см урт улаан шулуун банзал, бариу цагаан 6 товчтой дан зөрлөгтөй нэг халаастай босоо захтай цамц, 4 см өсгийтөй дөрвөлжин хоншоортой хар углааш ухааны яг таг хариулт хүсдэг сонин хүмүүс шүү. Арга ч үгүй байхдоо ямар загвар дагнаж мэдээлэл хийдэг ч хүмүүс биш бараг заваараа загвар сурвалжилдаг хүмүүс юм чинь. Хэзээ нэг Монголд би fashion editor, writer , critic гээд дуугарах хэвлэлийн хүмүүс гарах болдоо. За үндсэн сэдвээсээ хазайчихлаа :)', 'http://fashion.delhii.net/2007/07/12/186/', 1, NULL, NULL, NULL, 'list1', 'detail1', '2012-01-25 16:48:15'),
(4, 'other', 16, 'ГОО САЙХАН', '“Be Fashion 2012” загварын наадам анх удаагаа зохиогдлоо', 'image201205/dc407d8e256c2eeee47c151f8293c8fafa17038c.jpg', 400, 'Монголын залуусын №1 брэнд “Ве” жил бүр залуусынхаа загварын чиг хандлагыг тодорхойлох, авьяаслаг дизайнеруудын ур чадварыг шалгаж, загвар өмсөгчдийн хөдөлмөрийг үнэлэх зорилготой “Bе Fashion-2012” загварын наадмыг “Монголын Оюутны холбоо”-той хамтран 2011.12.23-ний өдөр Be төвд зохион байгууллаа.', '“Be Fashion-2012” наадмын шүүгчээр "Гоёл-2012" наадмын Шилдэг загвар зохион бүтээгч “Шилмэл загвар” ХХК-ийн загварын товчооны дизайнер Д.Өнөболор, “Гоёл-2009” наадмын Топ модель загвар өмсөгч О.Уянга нар оролцсон юм.\r\n\r\n“Be Fashion-2012” наадамд “Шилмэл модель агентлаг”-ийн моделиуд, хувцас загвар, дизайны чиглэлийн 6 их дээд сургуулийн 32 загвар зохион бүтээгчийн 160 гаруй бүтээл “Be Fashion-2012” наадамын тайзнаа амилсанаас “Авангард”, “Гоёл”, “Be Free Style” загварын төрөлд өрсөлдөж шилдэг загвар өмсөгч, шилдэг загвар зохион бүтээгчдээ тун өрсөлдөөнтэйгээр тодрууллаа. ', 'http://news.gogo.mn/photo/98931', 1, NULL, 1, 1, 'list1', 'detail1', '2012-01-26 14:19:52'),
(5, 'other', 16, 'ГОО САЙХАН', 'Улаанбаатар загварын долоо хоног', 'image201205/694309c93b49963934a8f23d4d3473e8fde4fda2.jpg', 400, 'Ес дэх удаагаа зохион байгуулагдаж буй уг арга хэмжээ жилээс жилд улам чансаажиж байгаа бөгөөд  тухайн улирлынхаа загварын чиг хандлагыг тодорхойлдог гэхэд болно.', '\r\nУрлах Эрдэм дээд сургууль, GT загварын товчооноос жил бүр зохион явуулдаг Улаанбаатар загварын долоо хоног энэ сарын 4-ний өдөр Худалдаа Аж Үйлдвэрийн танхимд нээлтээ хийн гурав дах өдрөө амжилттай үргэлжилж байна. ', 'http://news.gogo.mn/photo/85787', 1, NULL, 1, 1, 'list1', 'detail1', '2012-01-26 17:34:50'),
(6, 'other', 16, 'ГОО САЙХАН', 'test', 'image201205/1a08732ff50b65a720ece620980fe7ab81433091.jpg', 400, 'test', 'test', 'test', 1, NULL, 1, 1, 'list1', 'detail1', '2012-01-29 21:08:35'),
(7, 'other', 16, 'ГОО САЙХАН', 'test1', 'image201205/5989b53292f4abd26f1ec6c34e195f19682b711a.jpg', 400, 'test1', 'test1', '', 1, NULL, 1, 1, 'list1', 'detail1', '2012-01-29 21:09:31'),
(8, NULL, 16, 'ГОО САЙХАН', 'google', 'image201205/4b19da65cec944d6afe831521d1c50a2f6dfbdc2.jpg', 700, '', '', 'http://www.google.mn', 1, NULL, 1, 1, 'list1', 'detail1', '2012-02-06 12:44:51'),
(9, NULL, 16, 'ГОО САЙХАН', 'Скарлетт Йоханссоны гоо сайхны нууц', 'image201205/fa01179a5da1661e9763a0ba18339123898a7918.jpg', 400, 'Холливудын халуухан бүсгүй Скарлетт Йоханссон гоо сайхны нууцаасаа хуваалцлаа.', ' 	Скарлеттыг түүний гоо сайхан нь дэлхийн хэмжээний од болгосон гэдэгтэй хэн ч маргахгүй биз ээ. Түүний пин-ап стилийн үс засалт, талимаарах нүд, зузаан уруул... Ер нь түүний уруул нь өөрөө түүний нэрийн хуудас нь гэж хэлж болно. Скарлеттын уруул эхлээд Вүүди Алленыг, дараа нь  Доменико Дольче, Стефано Габбанна нарыг өөрийнхөө өмнө сөхрүүлж чадсан. Хөөрхий Вүүди түүнд зориулж кино зохиол хүртэл бичиж байна. Харин D&G Скарлеттыг гоо сайхны брэндийнхээ нүүр царай болгосон.\r\n\r\n<b>Make up-аа өөрөө хийдэг гэсэн. Хэнээс сурсан бэ?</b>\r\nБи ээжийгээ нүүрээ будаж байхыг нь харах дуртай байсан. Багс, энгэсэг, хацрын энгэсэг нь намайг жинхэнэ ховсддог байлаа. Би ээжийгээ харсаар байгаад л нүүрээ будаж сурсан даа. Ээж маань ч эмэгтэй хүн өөрийгөө арчлах нь хамгийн чухал зүйлийн нэг гэдэг байж билээ. \r\n\r\n<b>Одоо домогт make up artist Пат МакГраттай хамтран ажилладаг гэсэн. Тэр чамтай ямар нууцуудаасаа хуваалцсан бэ? </b>\r\nЖишээ нь Пат МакГрат намайг улаан уруулын будагт дуртай гэдгийг мэднэ. Тиймээс надад улаан уруулын будгийг хэрхэн зөв түрхэх аргыг зааж өгсөн. Уруулын будгаараа уруулаа будахаас айх хэрэггүй, бийрээрээ зөвхөн контураа засаарай. Ингэж чадвал уруул зузаан харагддаг.', 'http://cosmopolitan.mn/index.php/news/show/699', 1, NULL, 1, 1, 'list1', 'detail1', '2012-02-06 13:03:24'),
(11, NULL, 16, 'ГОО САЙХАН', 'Виктория Бекхэмийн сайхан биеийн нууц', 'image201205/fbe94a59f045ca6249873de2e240137783aa4308.jpg', 700, 'Тухайлбал тэрээр урт удаан хугацаанд алдарт Five hands диетийг барьсан. Энэ диетийн үндсэн санаа нь өдөрт таван атга (гарын алганд багтсан) хоолоос илүү хоол идэхгүй байхад оршдог. Одоо Виктория эрүүл мэнддээ харшлахгүй аргаар жингээ барьж байна. Тэрээр оддын фитнесс дасгалжуулагч Трэйси Андерсоны зааварчилгаагаар спорт зааланд хичээллэх болжээ.', 'Тухайлбал тэрээр урт удаан хугацаанд алдарт Five hands диетийг барьсан. Энэ диетийн үндсэн санаа нь өдөрт таван атга (гарын алганд багтсан) хоолоос илүү хоол идэхгүй байхад оршдог. Одоо Виктория эрүүл мэнддээ харшлахгүй аргаар жингээ барьж байна. Тэрээр оддын фитнесс дасгалжуулагч Трэйси Андерсоны зааварчилгаагаар спорт зааланд хичээллэх болжээ.', 'http://www.google.mn', 1, NULL, 1, 1, 'list1', 'detail1', '2012-02-06 13:06:15'),
(12, NULL, 16, 'ГОО САЙХАН', 'Vincent Cavanagh', 'image201205/9e194c738bfe814de82e50cf79d189b9e9f10e58.jpg', 700, 'Шинэ жилийн баярын уур амьсгал орж, хүн бүхэн гацуур, чимэглэл, гоёлын гангараандаа анхаарч, хэдийнээ “шооппинг” хийгээд эхэлчихэж.', 'Шинэ жилийн баярын уур амьсгал орж, хүн бүхэн гацуур, чимэглэл, гоёлын гангараандаа анхаарч, хэдийнээ “шооппинг” хийгээд эхэлчихэж. Дэлхийн алдарт дуучин Бритни Спийрс ч энэ асуудалд анхаарлаа хандуулж эхэлснээ твиттер хуудастаа бичсэн байна. Тэрээр ээждээ бэлэг авч өгөхөд нь туслаач хэмээн фэнүүдээсээ хүсчээ. “Би аялан тоглолтоо эхлүүлснээс хойш онлайнаар дэлгүүр хэсдэг боллоо. Гэхдээ бэлэг худалдан авахад минь та нарын тусламж хэрэгтэй байна. Ээждээ ямар бэлэг авах вэ. Ямар нэгэн санал байна уу” хэмээн өөрийн твиттертээ бичжээ. Харин хайртай дуучиндаа туслахаар тэр даруй 11.2 сая “жиргээч” өөр өөрсдийн саналаа илгээсэн байна. Тэд хувцас, ном, зураг гээд хүний сэтгэл хөдөлгөх бэлэг бүхнийг нэрлэсэн гэнэ. Харин нэгэн жиргээчийн бичсэн “Миний бодлоор ээждээ, өөрийн гараар хийсэн хайчилбаран ном хийж өгөх хэрэгтэй байх аа” хэмээх сэтгэгдэл Бритнид ихэд таалагдсан бололтой. Тэр энгийн хэрнээ хамгийн хөөрхөн санаа байна хэмээн хариу илгээжээ.', 'http://cosmopolitan.mn/index.php/news/show/98', 1, NULL, 1, 1, 'list1', 'detail1', '2012-02-06 13:17:15'),
(13, NULL, 16, 'ГОО САЙХАН', 'Charlize Theron-н үс болон нүүр будалтын нууцаас', 'image201205/46cbb97fb49dd961708429dfee413ab939ec7cf4.jpg', 400, 'Түүнчлэн хэдхэн хоногийн дараа гучин насны төрсөн өдрөө тэмдэглэх гэж буй Бритнитэй холбоотой өөр нэгэн мэдээлэл нь “Бритни гуравдахиа гэрлэх үү” гэсэн утга бүхий мессеж юм. ', 'Түүнчлэн хэдхэн хоногийн дараа гучин насны төрсөн өдрөө тэмдэглэх гэж буй Бритнитэй холбоотой өөр нэгэн мэдээлэл нь “Бритни гуравдахиа гэрлэх үү” гэсэн утга бүхий мессеж юм. Одоогоос долоон жилийн өмнө анх багын найз Жэйсон Александртай гэрлэж байсан түүнийг 55  цагийн дараа гэр бүлээ цуцлуулсныг нь санах уншигчид байгаа  л байх. Харин түүний хоёр дахь “алдарт” гэрлэлт нь Кевин Федерлайнтай хуримын бөгж солилцож, хоёр хүүхдийн эцэг эх болсон явдал юм. Жэйсоноос гэр бүлээ цуцлуулснаас зургаан сарын дараа ийнхүү хоёр дахь удаагаа гэрлэсэн. Гэвч Бритнигийн хоёр дахь амьдрал тийм ч удаан үргэлжлээгүй. Гурван жилийн дараа сүр дуулиантайгаар салсан хосуудын тухай мэдээлэл хэвлэлүүдээр нэг цацагдаж байсан юм. Харин одоо. Бритнигийн хайр дурлал, дурлалт залуу, магадгүй нөхөр болох хүний талаархи мэдээлэл тэгтлээ их сенсааци дэгдээсэнгүй. Магадгүй тэдний хайрын түүх хоёр жил гаруйн хугацаанд нам гүм хэрнээ амттайхан өрнөж байсан болохоор тэр биз. Саяхнаас л, Бритни болон түүний найз залуу Жэйсон Травикийн талаар мэдээ цацагдах болсон. “Radar”-т бичсэнээр хосууд гэрлэлтийн тухай эртнээс ярилцаж, шийдсэн бөгөөд Бритни Жэйсонд үнэхээр их хайртай аж. Жэйсоны хувьд Бритниг эртнээс, асар удаан хугацаанд хайрлаж ирсэн байна. Тиймээс ч ид шидийн мэт энэ гайхалтай хайрын түүх удахгүй хууль ёсных болох нь дамжиггүй хэмээн бичжээ.', 'http://www.elle.com/Beauty/Hair/Charlize-Theron-s-Hair-and-Makeup-Secrets', 1, NULL, 1, 1, 'list1', 'detail1', '2012-02-06 16:55:05'),
(18, NULL, 16, 'ГОО САЙХАН', 'ELLE - STREET CHIC', 'image201205/e94afa304d9c05b8f831493736bb7b1f3dc791e9.jpg', 400, 'Бидний мэдэх www.elle.com гайхамшигт сайтаас *гудамжний* хээнцэр загварыг та бүхэндээ хүргэж байна. ', '', 'http://www.elle.com/Fashion/Street-Chic', 1, NULL, 1, 1, 'list1', 'detail1', '2012-05-21 18:21:41'),
(19, NULL, 16, 'ГОО САЙХАН', '2012 Грэмми Авардс - Улаан хивсний ёслол - Sound oFF', 'image201205/310t-788dccc27e748efdf889a4053f7bf30fd4dddf4a.jpg', 400, 'Adele, Rihanna, Lady Gaga, Katy Perry ...', '', 'http://www.elle.com/Fashion/Celebrity-Style/Sound-Off', 1, NULL, 1, 1, 'list1', 'detail1', '2012-05-21 18:43:01'),
(20, NULL, 16, 'Гоо сайхан', 'Сайн аав болох эрийн шинжүүд', 'image201205/66be97e8bd344f90fa8104685aaa95f8018abd06.jpg', 0, 'Бидний эрчүүдээс хайдаг хэдхэн нийтлэг шинж чанар байдаг. Эхнийх нь өөртөө итгэлтэй байдал. Дараагийнх нь тодорхой хэмжээний хөрөнгө чинээ. (Жирэмсний амралтаа авсан үедээ ч болов мөнгөнд санаа зовохгүй байхыг хүсдэг л биз дээ?) Хамгийн сүүлд үр хүүхдэд нь сайн аав болж чадах эсэхийг.', 'Гэхдээ бид хайр дурлалын нөлөөнд автаад, түүний “эцэг болох потенциал”-ыг хэмжиж үзэлгүйгээр амьдралаа даатгачих тохиолдол олон бий. Тэгвэл “Чи хүүхдэд хайртай юу?” гэж асууж түүнийг айлгалгүйгээр, сайн аав болж чадах эсэхийг нь тогтоох шалгууруудыг танилцуулж байна.\r\n\r\n1. Тэр ээждээ сайн ханддаг. Тэр гэр бүлийнхээ хувьд эр хүнийхээ үүргийг хэр сайн биелүүлэх бол? Ээжтэйгээ яаж харьцаж байгааг нь л эхлээд харчих. Түүнийг хүндэтгэж байна уу? Түүнтэй цуг инээлдэж байна уу? Ээж дээрээ очих дуртай байна уу? Гэрийн ажил, хүнс дөхүүлэх зэрэгт нь тусалж байна уу? Хэрэв эдгээр асуултуудад чи “тийм” гэж хариулж байвал тэр чамайг ч бас ээж болсон хойно ингэж хандана гэсэн үг.\r\n\r\n2. Тэр аминчхан биш. Эцэг эх болоод хамгийн түрүүнд суралцах ёстой зүйл юу байдгийг мэдэх үү? Өөрийгөө нэгт биш хоёрт тавьж сурах! Өөрийгөө хорвоогийн төв цэг дээр зогсдог гэж боддог эртэй учирсан бол болгоомжлоорой. Эгоны түвшин хэт өндөртэй залуу нялх хүүхдээсээ эхнэрээ харамлаж эхэлдэг балай гэмтэй.\r\n\r\n3. Тэр хэт маягтай биш. Хүүхдүүд бол хувцсаа заваартуулж, гарандаа чихэр нялж байж л хорвоог таньж мэддэг ховорхон ертөнцүүд. Тиймээс бохир живх хараад сэжиглэхгүй, хүүхдийнхээ гулгихыг хараад муухай царайлахгүй эр хүн чамд хэрэгтэй. Тийм эрчүүд л ирээдүйд охинтойгоо цуг элсэн дээр тоглож, шавартай үед ч хүүтэйгээ хөлбөмбөгдөж чадна.\r\n\r\n4. Тэр сайн ах. Тэр дүү нараа дагуулж кино үздэг үү? Тэр хамаатныхаа дүү нарын төрсөн өдрийг мартдаггүй юу? Тэр үеэл дүү нарынхаа зургийг Facebook дээрээ тавиад “Хорвоогийн хөөрхөнүүд” мэтийн хайр шингээсэн тайлбар бичдэг үү? Өсвөр насны дүүдээ амьдралын ухаан зааж өгч байгаа ахын ухаанаар нь ч түүнийг ирээдүйд сайн аав болохыг таньж чадна.', 'http://www.goolingoo.mn/index.php?c=5643', 1, NULL, 1, 1, 'list1', 'detail1', '2012-10-24 21:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `designer`
--

CREATE TABLE IF NOT EXISTS `designer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_letter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `biography` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `designer`
--

INSERT INTO `designer` (`id`, `name`, `first_letter`, `photo`, `biography`, `sort`, `created_at`) VALUES
(1, 'DEREK LAM', 'D', '', '', 0, '2012-05-21 12:35:35'),
(2, 'LANVIN', 'L', '', '', 0, '2012-05-21 12:35:35'),
(3, 'VERSAGE', 'V', '', '', 0, '2012-05-21 18:08:49'),
(4, 'ALEXANDRE HERCHCOVITCH', 'A', '', '', 0, '2012-05-21 12:35:35'),
(5, 'ADAN', 'A', '', '', 0, '2012-05-21 12:35:35'),
(6, 'ALBINO', 'A', '', '', 0, '2012-05-21 12:35:35'),
(7, 'VERA WANG', 'V', '', '', 0, '2012-05-21 12:35:35'),
(8, 'ANNA SUI', 'A', '', '', 0, '2012-05-21 12:35:35'),
(9, 'CHRIS BENZ', 'C', '', '', 0, '2012-05-21 12:35:35'),
(10, 'CALVIN KLEIN', 'L', '', '', 0, '2012-05-21 18:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `folder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `iscover` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=126 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `object_type`, `object_id`, `title`, `description`, `folder`, `filename`, `sort`, `iscover`, `created_at`) VALUES
(1, 'content', 3, 'Tilda Swinton', 'Haider Ackermann and Fred Leighton jewelry', 'image201205', 'c3698a054a9539dcd9c9168b685aa8b3af89a5a5.jpg', 1, 1, '2012-01-26 17:24:06'),
(2, 'content', 4, 'Michelle Williams', 'Jason Wu, Judith Leiber clutch, and vintage Fred Leighton headband', 'image201205', '7a3a5580eaf7002d08754aeb34bba8eb712c81bd.jpg', 1, 1, '2012-01-26 17:24:42'),
(3, 'content', 4, 'Emma Stone', 'Lanvin and Cartier clutch', 'image201205', '258b4912d0b3557b1bb5b8507c3536ba40d5b127.jpg', 1, 1, '2012-01-26 17:25:22'),
(4, 'content', 4, 'Rooney Mara', 'Nina Ricci', 'image201205', '791f8bb31b8dcac1fd3651e4551044b2b2a2e88a.jpg', 1, 1, '2012-01-26 17:26:08'),
(5, 'content', 4, 'Charlize Theron', 'Christian Dior and Cartier jewelry', 'image201205', '5ee06581c5d5f1a6079801e90e26cf21f004fd23.jpg', 1, 1, '2012-01-26 17:26:28'),
(6, 'content', 5, 'Macy’s INC Collection Celebrates Kate Young', 'Last evening, Macy’s celebrated their collaboration with stylist to the stars Kate Young, who acted as editor-at-large for the department store’s spring 2012 INC catalogue...', 'image201205', '25799087f810b2199d87ad42bfc7c7a2278fc542.jpg', 1, 1, '2012-01-27 16:17:07'),
(7, 'content', 5, 'America’s Most Sizzling Chefs ', 'From in-demand meatball slingers to a Vietnamese salad innovator, these guys have us drooling—and it’s not just because of their food', 'image201205', '6c22dabf2f793736063bc57da6654edfb8486fc1.jpg', 1, 1, '2012-01-27 16:18:51'),
(8, 'content', 5, '‘I’m Not What’s Best for My Baby’ ', 'She was 30 years old, married, and a lawyer. So why would she put her only child up for adoption? ', 'image201205', '1bf4cd13b711a1c20cbd0e0e1063f7c8ecc4a06b.jpg', 1, 1, '2012-01-27 16:19:08'),
(9, 'content', 5, 'Life After Zoe ', 'Brad Goreski, the reality star’s former assistant, talks to ELLE about becoming the big boss', 'image201205', '860092af5e083111f03877a4ae3606067805ee07.jpg', 1, 1, '2012-01-27 16:19:23'),
(10, 'content', 13, 'Hair Helpers', 'Mason Pearson filling up a bit too quickly? You’re not alone. “I used to treat about three patients a month for hair loss, and now it’s roughly three per day,” says NYC-based dermatologist Macrene Alexiades-Armenakas, MD, who attributes the “astounding increase” of hair loss to stress-induced testosterone production, which causes hair follicles to slow down.', 'image201205', 'af4a989b8271920c3fa5b8fd2d7c73fdaff6366d.jpg', 1, 1, '2012-02-06 22:31:12'),
(11, 'content', 13, 'The Bob', 'When Jennifer Aniston axed her signature layers into a chic bob, America swooned (again). Her hair can do no wrong, securing the most requested style of 2011 (hitmaker Rihanna has the country’s second favorite bob). Aniston’s stylist, Chris McMillan, created the slightly angled look by trimming at the nape of the neck and following the jawline. The secret to Rihanna’s blazing crop? A dry haircut. “I anticipate the way she’ll actually wear it,” says RiRi’s stylist, Ursula Stephen. The look hit especially high notes in our live music capital. “It’s the ultimate Austin cut,” explains Michael Portman, co-owner of Birds Barbershop. “The city is laid-back—people don’t want a fussy style.”', 'image201205', '04489fa25d2276331d094930f97d6699f94aa61f.jpg', 1, 1, '2012-02-06 22:31:45'),
(12, 'content', 13, 'The Long Bang', 'The sweet, sideswept bangs of newlywed Reese Witherspoon secured our silver medal, following Aniston’s bob as the second most-requested style overall (with J.Lo’s wispier fringe coming in as a close runner-up). To keep “choppy” fringe in top form, stylist Mark Townsend, who first trimmed Witherspoon’s bangs in 2007, removes weight using thinning shears on the bottom half-inch of the bangs. To duplicate the style, start the shortest pieces near the eyebrow, with gradual layers extending to the ear. In Portland, Oregon, where long hair leads the city’s style, side bangs are “on-trend and easy to wear,” says Magnum Opus Salon general manager Jill Hunter. “They’re flattering and feminine and complement longer cuts.”', 'image201205', 'fa7ee074fa5bbd8bd0a65fcf1a5d51217ec08bf2.jpg', 1, 1, '2012-02-06 22:32:06'),
(13, 'content', 13, 'The Pixie', 'For the second year in a row, the pixie landed third on the most-wanted list, with Emma Watson’s retro-adorable makeover and Halle Berry’s sophisticated coif taking first and second place, respectively. Rodney Cutler, who transformed Watson post–Harry Potter, paid extra attention to shaping “precise, rounded layers” that “conform to the head shape.” Wary of short? Have no fear: The style “suits all hair types,” Cutler says. “Curly hair like Halle’s will have more texture; fine hair like Emma’s will lie smooth.” In Georgia, where women battle heat and humidity year-round, the cut’s low-maintenance ease is ideal. “It’s feminine, sharp, and fresh,” says Soren Loffler, owner of Atlanta’s Soren Salon.', 'image201205', '2ca42d82486b7a1a257689619ffa7fec8e174fa2.jpg', 1, 1, '2012-02-06 22:32:20'),
(14, 'content', 13, 'The Wave', 'It’s no secret that everyone tries to keep up with Kim Kardashian—her glamorous waves won fourth place, inching out Blake Lively’s Lagerfeld-approved curls. To create Kardashian’s signature strands, her stylist, Frankie Payne, applies a thickening spray, then blow-dries hair. Using a large-barrel curling iron, he grabs “small sections, starting around the face and curling outward.” After teasing the roots for extra lift, Payne “loosely” brushes the waves to look “natural and effortless.” The versatility of Kardashian’s style makes it coveted in South Beach. “Long, layered waves are easy to tie back but quickly transform into a sexy evening look,” says Riley McLachlan, creative director of Miami Beach’s Snip Salon.', 'image201205', 'b0c5f50661a2dfc4fa21d595acc179b4f19788ea.jpg', 1, 1, '2012-02-06 22:32:35'),
(15, 'content', 13, 'Best In Hue', 'Champagne:\r\nReese Witherspoon', 'image201205', '8620fed50dd342a669fa27defc5150b8831e55c0.jpg', 1, 1, '2012-02-06 22:32:48'),
(16, 'content', 13, 'Best In Hue', 'Ombré:\r\nDrew Barrymore', 'image201205', '35a10c8ac7a1252f4ae8f9645751312028930874.jpg', 1, 1, '2012-02-06 22:33:07'),
(17, 'content', 13, 'Michelle Williams', 'Caramel:\r\nBeyoncé Knowles', 'image201205', '', 1, 1, '2012-02-06 22:33:18'),
(18, 'content', 13, 'Ginger: Amy Adams', '    The Best Budget Makeup\r\n    America''s Most Beautiful People\r\n    Elle Hair Makeover Challenge\r\n    Women of the Year: the Best Dressed of 2011\r\n    The Very Best Heels!\r\n    Street Talk: Winter Trends\r\n    Dressed to Thrill!\r\n    25 New Products That''ll Change Your Life\r\n    The Very Best in Metallic Accessories\r\n    Beauty Products: 20 Global Goodies\r\n', 'image201205', 'fa341f275484a3731f82ff5ec176d71ec26560bb.jpg', 1, 1, '2012-02-06 22:33:43'),
(19, 'content', 12, 'test', 'test', 'image201205', '519685314b9af69c7478ff65559c641e1bd64e30.jpg', 1, 1, '2012-05-16 11:08:43'),
(20, 'content', 12, 'test', 'test', 'image201205', 'f5b18ae34c80aa5496919499db1634ea41257d17.jpg', 1, 1, '2012-05-16 11:09:46'),
(21, 'content', 12, 'test', 'test', 'image201205', 'cbedc4d8195512b07931bf9aa7b1513e2e9d2766.jpg', 1, 1, '2012-05-16 11:16:36'),
(22, 'content', 12, 'sdg', 'ag', 'image201205', 'c7c5b163d0087a76ae93268a833cc5dd63e454a8.jpg', 1, 1, '2012-05-16 11:17:46'),
(23, 'content', 12, '1', '1', 'image201205', '41edba922591949ab23079a5773bd1ab9505dcbc.jpg', 1, 1, '2012-05-16 11:24:34'),
(24, 'content', 12, 'aa', 'a', 'image201205', '74ca4d987f58f924f31abcbed895cde4776e4976.jpg', 1, 1, '2012-05-16 11:25:22'),
(25, 'content', 12, 'asdg', 'asdg', 'image201205', '06964ee40e35389af50ab3b6de67406fa06c0b50.jpg', 1, 1, '2012-05-16 11:26:09'),
(26, 'content', 13, 'sdg', 'asdg', 'image201205', '46cbb97fb49dd961708429dfee413ab939ec7cf4.jpg', 1, 1, '2012-05-16 11:34:32'),
(27, 'content', 12, 'weqty', 'aery', 'image201205', 'ea4b1fb1416b9ba84feaa3831a9dabbcebd7f9d0.jpg', 1, 1, '2012-05-16 11:36:00'),
(28, 'content', 12, 'asd', 'asdg', 'image201205', '9e194c738bfe814de82e50cf79d189b9e9f10e58.jpg', 0, 1, '2012-05-16 11:38:20'),
(29, 'content', 11, 'sdfh', 'dbh', 'image201205', 'fbe94a59f045ca6249873de2e240137783aa4308.jpg', 2, 1, '2012-05-16 11:39:17'),
(30, 'content', 9, 'adg', 'asdg', 'image201205', 'fa01179a5da1661e9763a0ba18339123898a7918.jpg', 2, 1, '2012-05-16 11:40:04'),
(31, 'content', 8, 'asgd', 'asdg', 'image201205', '9068c7ef1ae3c9724623bbcd2ffeb62c9b6018ac.jpg', 2, 0, '2012-05-16 11:40:27'),
(32, 'content', 8, 'sdg', 'asdg', 'image201205', '4b19da65cec944d6afe831521d1c50a2f6dfbdc2.jpg', 1, 1, '2012-05-16 11:40:53'),
(33, 'content', 7, 'asgd', 'asdg', 'image201205', '5989b53292f4abd26f1ec6c34e195f19682b711a.jpg', 1, 1, '2012-05-16 11:41:08'),
(34, 'content', 6, 'asdg', 'asdg', 'image201205', '1a08732ff50b65a720ece620980fe7ab81433091.jpg', 1, 1, '2012-05-16 11:41:20'),
(35, 'content', 5, 'asdg', 'sadg', 'image201205', '694309c93b49963934a8f23d4d3473e8fde4fda2.jpg', 1, 1, '2012-05-16 11:41:34'),
(36, 'content', 4, 'sd', 'ag', 'image201205', 'dc407d8e256c2eeee47c151f8293c8fafa17038c.jpg', 1, 1, '2012-05-16 11:42:02'),
(37, 'content', 3, 'asd', 'd', 'image201205', '944733df985cc5b531a443e0e98c8268aaefc12a.jpg', 1, 1, '2012-05-16 11:42:21'),
(38, 'content', 2, 'asdg', 'asdg', 'image201205', 'f8c39ef2d525a180f55e6fb2ea1dd497b71d3fdc.jpg', 1, 1, '2012-05-16 11:42:44'),
(39, 'content', 1, 'sdg', 'sdg', 'image201205', 'cbce403a4d773159069621794fb5040e8bfb99a9.jpg', 1, 1, '2012-05-16 11:42:59'),
(40, 'content', 18, 'Britt Tapsal wears her dad’s shirt, a Topshop dress, and a thrifted bag and  shoes.', '', 'image201205', 'ed2c04ea0d2b95be4b303b41a1f08eb977e9d8ec.jpg', 1, 0, '2012-05-21 18:22:13'),
(41, 'content', 18, 'AnnaMaria Mostrom wears a Club Monaco shirt, Lindex pants, Fred Perry shoes, and Paul Smith glasses.', 'by Tommye Fitzpatrick on May 15, 2012 - 7:00 AM', 'image201205', 'cc8ad21e3e439af62fd8a6ae6dee503e35c2cf6e.jpg', 1, 0, '2012-05-21 18:22:42'),
(42, 'content', 18, 'Beck Hartke, a dancer from New York City, wears a Jones New York vintage silk skirt and DKNY denim shorts.', '', 'image201205', '553b6bc2d6b5b5118aa62070c21f093ff5832b71.jpg', 1, 0, '2012-05-21 18:23:46'),
(43, 'content', 18, 'Tatiana Pajkovic, a musician in the band Lovely Liar, wears an Isabel Marant top and a vintage skirt and boots.', '', 'image201205', '6215aea726051cce157365b235fb08b758bec28d.jpg', 1, 0, '2012-05-21 18:23:54'),
(44, 'content', 18, 'Adeline Michèle from Escort practices mixing prints.', '', 'image201205', '4d18bbcb4aeb0d4cc26cc4d9c3cdfbf0c5afa34e.jpg', 1, 0, '2012-05-21 18:24:05'),
(45, 'content', 18, 'Brie Welch wears a Clu dress, shoes from France, and Illesteva glasses.', '', 'image201205', '638ba89ef1d1ac54703c1390b37c65fa91681776.jpg', 1, 0, '2012-05-21 18:24:25'),
(46, 'content', 18, 'Chloé Fleury wears an H&M top, Topshop Necklace, Forever 21 shorts, self-made bracelet, Free People bag, and André boots.', '', 'image201205', '0961c9ab82af732a73380b33e7d9b2be40a20ad4.jpg', 0, 0, '2012-05-21 18:24:50'),
(47, 'content', 18, 'Hannah Kocurek, a local off to catch the ASAP Rocky performance, wears a Free People top and Urban Outfitters shorts.', '', 'image201205', 'ea69f09727b6724e13d14c9e7ffe738415634e77.jpg', 0, 0, '2012-05-21 18:25:04'),
(48, 'content', 18, 'DJ Mia Moretti wears a Missoni top and pants, Repetto shoes, Illesteva sunglasses, and a Furla bag.', '', 'image201205', '3e69c8bc681881a55517f1f43238127d114c60fc.jpg', 0, 0, '2012-05-21 18:25:19'),
(49, 'content', 18, 'Courtney Voss from Feathers wears a vintage jacket and a Free People dress.', '', 'image201205', 'e35568c362ad7a87fcd9bf9c6728531096e1c1aa.jpg', 0, 0, '2012-05-21 18:25:31'),
(50, 'content', 18, 'Abby Gregory, a writer from Dallas, wears a dress from LF, Steve Madden shoes, and vintage jewelry. ', '', 'image201205', '659f859ed108e9e4b88dea63db18ea631b1e8c24.jpg', 0, 0, '2012-05-21 18:25:42'),
(51, 'content', 18, '8 of 31 Play Prev Next  Miki from Houston wears a vintage vest, dress, and bag.', '', 'image201205', 'e12d816a1cdd657ded790b3ac3772fa49c030284.jpg', 0, 0, '2012-05-21 18:25:53'),
(52, 'content', 18, 'Lia Parsley wears a vintage shirt, a White Crow skirt, and Zodiac boots on her way to the Youth Lagoon show.', '', 'image201205', 'e94afa304d9c05b8f831493736bb7b1f3dc791e9.jpg', 0, 1, '2012-05-21 18:26:14'),
(53, 'content', 18, 'Alexis Bazan from Houston wears an Urban Outfitters top and skirt. ', '', 'image201205', 'cc8a667af52adcf080dbf4bed7de8ef3c0696575.jpg', 0, 0, '2012-05-21 18:26:24'),
(54, 'content', 19, 'Adele wears a custom Giorgio Armani gown, Christian Louboutin shoes, and Harry Winston ring.', '', 'image201205', '7bdec704facebc729384f9b25667ab87a27a6593.jpg', 0, 0, '2012-05-21 18:43:21'),
(55, 'content', 19, 'Rihanna wears a custom Giorgio Armani gown, and Christian Louboutin shoes.', '', 'image201205', '744b01bb486aa4d50aa4e0c28db4de3d0be96ffc.jpg', 0, 0, '2012-05-21 18:43:35'),
(56, 'content', 19, '3 of 27 Play Prev Next  Nicki Minaj wears a Versace dress.', '', 'image201205', 'd8784deef1cce37f4e4034351c58e17b10a8db67.jpg', 0, 0, '2012-05-21 18:43:43'),
(57, 'content', 19, 'Lady Gaga wears a custom Versace ensemble.', '', 'image201205', '9f2919f48144b4c363b8f688d33b4ac69f6f3ff7.jpg', 0, 0, '2012-05-21 18:43:51'),
(58, 'content', 19, 'Katy Perry wears an Elie Saab gown.', '', 'image201205', '630ac298098b374135e3448d7aae6a4ba1bcfc01.jpg', 0, 0, '2012-05-21 18:44:01'),
(59, 'content', 19, 'Taylor Swift wears a Zuhair Murad dress.', '', 'image201205', 'fecc025c22d94186c1b4cc3b140f0eabb030630a.jpg', 0, 0, '2012-05-21 18:44:24'),
(60, 'content', 19, 'Esperanza Spalding', '', 'image201205', 'f4debdb52095c8712ce637f6cbeb1cdd5cd13779.jpg', 0, 0, '2012-05-21 18:44:44'),
(61, 'content', 19, 'Fergie wears a Jean Paul Gaultier Couture gown.', '', 'image201205', 'a9566609236731388102f79842eb07614de937e6.jpg', 0, 0, '2012-05-21 18:44:52'),
(62, 'content', 19, 'Alicia Keys wears an Alexandre Vauthier dress and Christian Louboutin shoes.', '', 'image201205', '343e1b568579708c529fe4978f40602dd1576db5.jpg', 0, 0, '2012-05-21 18:45:01'),
(63, 'content', 19, 'Malin Ackerman wears a Cushnie et Ochs dress.', '', 'image201205', '189cd7f001c1ecaf306b5bdc592960e20620e371.jpg', 0, 0, '2012-05-21 18:45:08'),
(64, 'content', 19, '12 of 27 Play Prev Next  Jessie J wears a Julien Macdonald gown, and Lulu Guinness clutch.', '', 'image201205', '8dc44b4c9713bb9e097bec98be15e2628f6b6609.jpg', 0, 0, '2012-05-21 18:45:18'),
(65, 'content', 19, 'Corrine Bailey Rae wears a Christian Siriano dress.', '', 'image201205', 'ce6f726781f837f444c1186047aab31e1ff1c738.jpg', 0, 0, '2012-05-21 18:45:26'),
(66, 'content', 19, 'Kelly Rowland wears an Alberta Ferretti gown.', '', 'image201205', 'ae5bef22b6cd8177c615104d3493d8b2792c5748.jpg', 0, 0, '2012-05-21 18:45:33'),
(67, 'content', 19, 'Robyn', '', 'image201205', '6b20cdf4c62e92e5fa9a3153c8577210e0e0c760.jpg', 0, 0, '2012-05-21 18:45:40'),
(68, 'content', 19, 'Alison Krauss', '', 'image201205', '4824f3914d86e9180d9d314eeb63962c182244f0.jpg', 0, 0, '2012-05-21 18:45:47'),
(69, 'content', 19, 'Melanie Fiona', '', 'image201205', '899f9d3a24d4a80861a01070afa44965d329bcb8.jpg', 0, 0, '2012-05-21 18:45:55'),
(70, 'content', 19, 'Rebecca Black', '', 'image201205', '45f3274dba03b0b1e2cf78c98b77c43eb1369729.jpg', 0, 0, '2012-05-21 18:46:03'),
(71, 'content', 19, 'Lily Aldridge wears a Gucci dress.', '', 'image201205', 'a9f1796619cd7443a06cacd53e8b5be5073bf5f1.jpg', 0, 0, '2012-05-21 18:46:11'),
(72, 'content', 19, 'John Legend and Chrissy Teigen', '', 'image201205', '788dccc27e748efdf889a4053f7bf30fd4dddf4a.jpg', 0, 1, '2012-05-21 18:46:27'),
(73, 'runway', 4, 'BananaRepublic-FW11-Look-14_runway', '', 'image201205', 'BananaRepublic-FW11-Look-14_runway.jpg', 1, 1, '2012-05-21 20:20:45'),
(74, 'runway', 4, 'BananaRepublic-FW11-Look-14_runway', '', 'image201205', 'BananaRepublic-FW11-Look-15_runway.jpg', 1, 1, '2012-05-21 20:20:45'),
(75, 'runway', 4, 'BananaRepublic-FW11-Look-14_runway', '', 'image201205', 'BananaRepublic-FW11-Look-17_runway.jpg', 1, 1, '2012-05-21 20:21:34'),
(76, 'runway', 4, 'BananaRepublic-FW11-Look-14_runway', '', 'image201205', 'BananaRepublic-FW11-Look-21_runway.jpg', 1, 1, '2012-05-21 20:21:34'),
(77, 'runway', 4, 'BananaRepublic-FW11-Look-14_runway', '', 'image201205', 'BananaRepublic-FW11-Look-23_runway.jpg', 1, 1, '2012-05-21 20:21:34'),
(78, 'runway', 4, 'BananaRepublic-FW11-Look-14_runway', '', 'image201205', 'BananaRepublic-FW11-Look-24_runway.jpg', 1, 1, '2012-05-21 20:21:34'),
(79, 'runway', 4, 'BananaRepublic-FW11-Look-14_runway', '', 'image201205', 'BananaRepublic-FW11-Look-26_runway.jpg', 1, 1, '2012-05-21 20:21:34'),
(80, 'runway', 4, 'BananaRepublic-FW11-Look-14_runway', '', 'image201205', 'BananaRepublic-FW11-Look-18_runway.jpg', 1, 1, '2012-05-21 20:21:34'),
(81, 'runway', 38, 'dulamkhand at ballet class', 'dulamkhand at ballet class', 'image201205', '77105ab5d3574c84012b497b335ae8e2510572b8.jpg', 1, 1, '2012-06-04 21:00:34'),
(82, 'runway', 5, 'sfgjhsfj', '', 'image201205', '0d54fc07777c79a6a4af969e4b744a7d259c9776.jpg', 0, 1, '2012-06-05 09:07:54'),
(83, 'runway', 4, 'sdfgdg', '', 'image201205', '77a74f51be10144d5d0295e79e66dceaed277548.jpg', 0, 1, '2012-06-05 09:08:45'),
(84, 'runway', 6, 'afadfh', '', 'image201205', 'ffef039719220fb2b259db8c45b05f1fc122d70c.jpg', 0, 1, '2012-06-05 09:08:55'),
(85, 'runway', 13, 'aghadfh', '', 'image201205', '0ff34a14a202ac31f3b9dd90ebdff4f787227a7b.jpg', 0, 1, '2012-06-05 09:09:16'),
(86, 'runway', 7, 'ergahrh', '', 'image201205', 'c06261c806c37377f344e6cff41fac75de8e3cd7.jpg', 0, 1, '2012-06-05 09:09:47'),
(87, 'runway', 10, 'sjfgj', '', 'image201205', '8f747435ef2beacaca9cbcd60102344beaa21584.jpg', 0, 1, '2012-06-05 09:10:02'),
(88, 'runway', 11, 'erhaedf', '', 'image201205', '45548ef0c802c31f0c4593d68023e720fb5d609e.jpg', 0, 1, '2012-06-05 09:11:55'),
(89, 'runway', 21, 'agdagd', '', 'image201205', 'da0f3da2b597050dfa1f3fa0f084a73696d73c9d.jpg', 0, 1, '2012-06-05 09:21:32'),
(90, 'runway', 22, 'asdgasd', '', 'image201205', '9bfeb29241f02424153c82b1508142fcde1205a2.jpg', 0, 1, '2012-06-05 09:21:45'),
(91, 'runway', 23, 'sfdasdg', '', 'image201205', '61f0af76f57c4c78fa4f4e5d6aa02217e858f771.jpg', 0, 1, '2012-06-05 09:21:57'),
(92, 'runway', 24, 'dagsdg', '', 'image201205', '391fde6dccc7940d15c8e1ee616cd93164e47656.jpg', 0, 1, '2012-06-05 09:22:07'),
(93, 'runway', 24, 'asdgasdg', '', 'image201205', 'a7aeeffe36e57d086ba1dc043040c94049dfd410.jpg', 0, 1, '2012-06-05 09:22:29'),
(94, 'runway', 25, 'sadgasd', '', 'image201205', 'aceb7257a34667ae2825d19ef5fa3d32b2650d2e.jpg', 0, 1, '2012-06-05 09:22:42'),
(95, 'runway', 25, 'gsd', '', 'image201205', 'f77c4caa2b486620d7772e38b74e9de160b0e99c.jpg', 0, 1, '2012-06-05 09:22:52'),
(96, 'runway', 36, 'agds', '', 'image201205', '3c6509f6978d84d50950cac03acae0474570ebe8.jpg', 0, 1, '2012-06-05 09:23:04'),
(97, 'runway', 37, 'asdgasd', 'asd', 'image201205', '26ae7db6b28c20f892c782bc1c24732789a68caf.jpg', 0, 1, '2012-06-05 09:23:19'),
(98, 'runway', 35, 'adgasd', '', 'image201205', 'be2fd5e583f39708b2a6a97d47b2f234a2224fbf.jpg', 0, 1, '2012-06-05 09:23:24'),
(99, 'runway', 18, 'sdg', '', 'image201205', '9be7350ec63aef03f191639e8e81b5bedf8e23df.jpg', 0, 1, '2012-06-05 09:24:04'),
(100, 'runway', 17, 'agds', '', 'image201205', 'efaa23518006c909cf2616e920c95de6138f6162.jpg', 0, 1, '2012-06-05 09:24:09'),
(101, 'runway', 20, 'dfgd', '', 'image201205', 'e8e9e733a686c44bf380702443eb88768909c5a2.jpg', 0, 1, '2012-06-05 09:24:23'),
(102, 'runway', 20, 'asdgasd', '', 'image201205', '4c571d350db01ea2aae2a5c8a415d52a6cb891a0.jpg', 0, 1, '2012-06-05 09:24:28'),
(103, 'runway', 20, 'asdg', '', 'image201205', '684d7f72bd4aa9da460daa1d66631066dd1856ca.jpg', 0, 1, '2012-06-05 09:24:33'),
(104, 'runway', 20, 'adsd', '', 'image201205', 'accbfd6a1e344a57577b0b8398603962418a2a16.jpg', 0, 1, '2012-06-05 09:24:38'),
(105, 'runway', 19, 'ere', '', 'image201205', '4a6065d779dc0801daee370e91a8d3c68ba548f4.jpg', 0, 1, '2012-06-05 09:24:54'),
(106, 'runway', 16, 'rgasd', '', 'image201205', '6d1499a7ed6b5e43d1e5daa738f8fec99eb65ebc.jpg', 0, 1, '2012-06-05 09:24:59'),
(107, 'runway', 15, 'agdasd', '', 'image201205', '92b65bd06d731da55100e0bc3f614f5b37cbe6cf.jpg', 0, 1, '2012-06-05 09:25:13'),
(108, 'runway', 14, 'asdgsd', '', 'image201205', '510dd608c4d92aaf83ffccd282eb60312cac4f0c.jpg', 0, 1, '2012-06-05 09:25:18'),
(109, 'runway', 12, 'wete', '', 'image201205', '2cbdc3a5dfb2b705d8fca574f1ed92bfe51bdd79.jpg', 0, 1, '2012-06-05 09:25:25'),
(110, 'runway', 26, 'sdgasd', '', 'image201205', '902e88d08362a7b78053d0fdb78675373814ccd9.jpg', 0, 1, '2012-06-05 09:27:52'),
(111, 'runway', 27, 'asdgd', '', 'image201205', '72ce339da4569fa069955b56226c6438a9e1180b.jpg', 0, 1, '2012-06-05 09:27:58'),
(112, 'runway', 28, 'asdg', '', 'image201205', 'cd34c82d7771934e763c18b3ca6377f2dab171ec.jpg', 0, 1, '2012-06-05 09:28:02'),
(113, 'runway', 29, 'adgasd', '', 'image201205', '584d969adeec1919b32855643780f92938cba103.jpg', 0, 1, '2012-06-05 09:28:08'),
(114, 'runway', 30, 'asdg', '', 'image201205', '9af398f93eb1bc347ad0ec2b8b90a98f2e6da83e.jpg', 0, 1, '2012-06-05 09:28:28'),
(115, 'runway', 31, 'asdg', '', 'image201205', 'f75909d65c4701c81e57d8ea07ffecea4c0833aa.jpg', 0, 1, '2012-06-05 09:28:33'),
(116, 'runway', 32, 'adgasd', '', 'image201205', '4e86c7066835aa459bad990f591fa70e0b2229cb.jpg', 0, 1, '2012-06-05 09:28:39'),
(117, 'runway', 9, 'asfasd', '', 'image201205', '1e3e0c72613f5ad225cae3f744ebf05042aeb755.png', 0, 1, '2012-06-05 09:28:55'),
(118, 'runway', 8, 'sadgasd', '', 'image201205', 'd03779c4c6b94718faebb24778d43b4afd7f6418.jpg', 0, 1, '2012-06-05 09:29:00'),
(119, 'runway', 34, 'asdgasd', '', 'image201205', '9cd18814d86652ab028aa8c6a84768db0ae7e675.jpg', 0, 1, '2012-06-05 09:29:07'),
(120, 'runway', 33, 'asdgasd', '', 'image201205', 'a3d2af8c4f5424e81a9e7fad446cf0e0e3c38e6e.jpg', 0, 1, '2012-06-05 09:29:29'),
(121, 'runway', 21, 'ужэн', '', 'image201205', 'fe487ab7980c7ecbc7afc7f18b8f42df90aa333c.jpg', 0, 1, '2012-06-05 13:46:24'),
(122, 'runway', 21, 'цужэнгшүз', '', 'image201205', 'e342decf7def990a57a0fc8cfba3e0724ffc3545.jpg', 0, 0, '2012-06-05 13:46:36'),
(123, 'runway', 21, 'нзүшол', '', 'image201205', '7fbf1834ea7e05d90608879b09b9e57dc3379790.jpg', 0, 0, '2012-06-05 13:46:46'),
(125, 'content', 20, 'уцэ', '', 'image201205', '66be97e8bd344f90fa8104685aaa95f8018abd06.jpg', 1, 1, '2012-10-24 22:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `page`
--


-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE IF NOT EXISTS `poll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=124 ;

--
-- Dumping data for table `poll`
--


-- --------------------------------------------------------

--
-- Table structure for table `runway`
--

CREATE TABLE IF NOT EXISTS `runway` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `season_id` int(11) NOT NULL,
  `season_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designer_id` int(11) NOT NULL,
  `designer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `runway`
--

INSERT INTO `runway` (`id`, `title`, `cover`, `season_id`, `season_name`, `designer_id`, `designer_name`, `is_featured`, `is_active`, `sort`, `date`, `created_at`) VALUES
(4, 'FALL 2012 RTW', 'image201205/77a74f51be10144d5d0295e79e66dceaed277548.jpg', 0, '', 8, 'ANNA SUI', 1, 1, 1, '0000-00-00', '2012-06-05 09:08:45'),
(5, 'Spring 2012 Couture', 'image201205/0d54fc07777c79a6a4af969e4b744a7d259c9776.jpg', 0, '', 8, 'ANNA SUI', 0, 1, 1, '0000-00-00', '2012-06-05 09:07:54'),
(6, 'FALL 2011 RTW', 'image201205/ffef039719220fb2b259db8c45b05f1fc122d70c.jpg', 0, '', 8, 'ANNA SUI', 1, 1, 1, '0000-00-00', '2012-06-05 09:12:46'),
(7, 'Spring 2011Couture', 'image201205/c06261c806c37377f344e6cff41fac75de8e3cd7.jpg', 0, '', 8, 'ANNA SUI', 1, 1, 1, '0000-00-00', '2012-06-05 09:12:46'),
(8, 'FALL 2011 RTW', 'image201205/d03779c4c6b94718faebb24778d43b4afd7f6418.jpg', 0, '', 6, 'ALBINO', 1, 1, 1, '0000-00-00', '2012-06-05 09:13:09'),
(9, 'Spring 2010 Couture', 'image201205/1e3e0c72613f5ad225cae3f744ebf05042aeb755.png', 0, '', 6, 'ALBINO', 1, 1, 1, '0000-00-00', '2012-06-05 09:13:09'),
(10, 'Fall 2010 RTW', 'image201205/8f747435ef2beacaca9cbcd60102344beaa21584.jpg', 0, '', 7, 'VERA WANG', 1, 1, 1, '0000-00-00', '2012-06-05 09:13:09'),
(11, 'Spring 2010 Couture', 'image201205/45548ef0c802c31f0c4593d68023e720fb5d609e.jpg', 0, '', 7, 'VERA WANG', 1, 1, 1, '0000-00-00', '2012-06-05 09:13:09'),
(12, 'Spring 2012 Couture', 'image201205/2cbdc3a5dfb2b705d8fca574f1ed92bfe51bdd79.jpg', 0, '', 7, 'VERA WANG', 1, 1, 1, '0000-00-00', '2012-05-21 18:10:16'),
(13, 'Pre-Fall 2012', 'image201205/0ff34a14a202ac31f3b9dd90ebdff4f787227a7b.jpg', 0, '', 6, 'ALBINO', 1, 1, 1, '0000-00-00', '2012-06-05 09:09:16'),
(14, 'Resort 2012', 'image201205/510dd608c4d92aaf83ffccd282eb60312cac4f0c.jpg', 0, '', 6, 'ALBINO', 1, 1, 1, '0000-00-00', '2012-05-21 18:10:08'),
(15, 'FALL 2012 RTW', 'image201205/92b65bd06d731da55100e0bc3f614f5b37cbe6cf.jpg', 0, '', 5, 'ADAN', 1, 1, 1, '0000-00-00', '2012-05-21 18:10:03'),
(16, 'Spring 2012 Couture', 'image201205/6d1499a7ed6b5e43d1e5daa738f8fec99eb65ebc.jpg', 0, '', 5, 'ADAN', 1, 1, 1, '0000-00-00', '2012-05-21 18:10:03'),
(17, 'FALL 2012 RTW', 'image201205/efaa23518006c909cf2616e920c95de6138f6162.jpg', 0, '', 4, 'ALEXANDRE HERCHCOVITCH', 1, 1, 1, '0000-00-00', '2012-05-21 18:09:56'),
(18, 'Spring 2012 Couture', 'image201205/9be7350ec63aef03f191639e8e81b5bedf8e23df.jpg', 0, '', 4, 'ALEXANDRE HERCHCOVITCH', 1, 1, 1, '0000-00-00', '2012-05-21 18:09:56'),
(19, 'FALL 2012 RTW', 'image201205/4a6065d779dc0801daee370e91a8d3c68ba548f4.jpg', 0, '', 5, 'ADAN', 1, 1, 1, '0000-00-00', '2012-05-21 18:10:03'),
(20, 'Spring 2012 Couture', 'image201205/accbfd6a1e344a57577b0b8398603962418a2a16.jpg', 0, '', 5, 'ADAN', 1, 1, 1, '0000-00-00', '2012-05-21 18:10:03'),
(21, 'Fall 2007 RTW', 'image201205/fe487ab7980c7ecbc7afc7f18b8f42df90aa333c.jpg', 0, '', 5, 'ADAN', 1, 1, 1, '0000-00-00', '2012-06-05 09:14:35'),
(22, 'Spring 2007 Couture', 'image201205/9bfeb29241f02424153c82b1508142fcde1205a2.jpg', 0, '', 4, 'ALEXANDRE HERCHCOVITCH', 1, 1, 1, '0000-00-00', '2012-06-05 09:14:35'),
(23, 'Spring 2007 Couture', 'image201205/61f0af76f57c4c78fa4f4e5d6aa02217e858f771.jpg', 0, '', 4, 'ALEXANDRE HERCHCOVITCH', 1, 1, 1, '0000-00-00', '2012-06-05 09:14:35'),
(24, 'Pre-Fall 2007 ', 'image201205/a7aeeffe36e57d086ba1dc043040c94049dfd410.jpg', 0, '', 5, 'ADAN', 1, 1, 1, '0000-00-00', '2012-06-05 09:14:35'),
(25, 'Resort 2007 ', 'image201205/f77c4caa2b486620d7772e38b74e9de160b0e99c.jpg', 0, '', 5, 'ADAN', 1, 1, 1, '0000-00-00', '2012-06-05 09:14:35'),
(26, 'FALL 2009 RTW', 'image201205/902e88d08362a7b78053d0fdb78675373814ccd9.jpg', 0, '', 3, 'VERSAGE', 1, 1, 1, '0000-00-00', '2012-06-05 09:14:11'),
(27, 'Spring 2009 Couture', 'image201205/72ce339da4569fa069955b56226c6438a9e1180b.jpg', 0, '', 3, 'VERSAGE', 1, 1, 1, '0000-00-00', '2012-06-05 09:14:11'),
(28, 'FALL 2009 RTW', 'image201205/cd34c82d7771934e763c18b3ca6377f2dab171ec.jpg', 0, '', 2, 'LANVIN', 1, 1, 1, '0000-00-00', '2012-06-05 09:14:11'),
(29, 'Spring 2009 Couture', 'image201205/584d969adeec1919b32855643780f92938cba103.jpg', 0, '', 2, 'LANVIN', 1, 1, 1, '0000-00-00', '2012-06-05 09:14:11'),
(30, 'FALL 2008 RTW', 'image201205/9af398f93eb1bc347ad0ec2b8b90a98f2e6da83e.jpg', 0, '', 1, 'DEREK LAM', 1, 1, 1, '0000-00-00', '2012-06-05 09:13:52'),
(31, 'Spring 2008 Couture', 'image201205/f75909d65c4701c81e57d8ea07ffecea4c0833aa.jpg', 0, '', 1, 'DEREK LAM', 1, 1, 1, '0000-00-00', '2012-06-05 09:13:52'),
(32, 'Fall 2008 RTW', 'image201205/4e86c7066835aa459bad990f591fa70e0b2229cb.jpg', 0, '', 1, 'DEREK LAM', 1, 1, 1, '0000-00-00', '2012-06-05 09:13:52'),
(33, 'Spring 2008 Couture', 'image201205/a3d2af8c4f5424e81a9e7fad446cf0e0e3c38e6e.jpg', 0, '', 2, 'LANVIN', 1, 1, 1, '0000-00-00', '2012-06-05 09:13:52'),
(34, 'Spring 2010 Couture', 'image201205/9cd18814d86652ab028aa8c6a84768db0ae7e675.jpg', 0, '', 2, 'LANVIN', 1, 1, 1, '0000-00-00', '2012-06-05 09:13:31'),
(35, 'Pre-Fall 2012', 'image201205/be2fd5e583f39708b2a6a97d47b2f234a2224fbf.jpg', 0, '', 3, 'VERSAGE', 1, 1, 1, '0000-00-00', '2012-05-21 18:09:46'),
(36, 'Resort 2012', 'image201205/3c6509f6978d84d50950cac03acae0474570ebe8.jpg', 0, '', 3, 'VERSAGE', 1, 1, 1, '0000-00-00', '2012-05-21 18:09:46'),
(37, 'FALL 2012 RTW by ADAN', 'image201205/26ae7db6b28c20f892c782bc1c24732789a68caf.jpg', 1, '', 5, 'ADAN', 1, 1, 0, '0000-00-00', '2012-06-04 20:40:41'),
(38, 'FALL 2012 RTW by CALVIN KLEIN', 'image201205/77105ab5d3574c84012b497b335ae8e2510572b8.jpg', 1, '', 10, 'CALVIN KLEIN', 0, 0, 0, '0000-00-00', '2012-06-04 21:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE IF NOT EXISTS `season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`id`, `name`, `sort`, `created_at`) VALUES
(1, 'FALL 2012 RTW', 0, '2012-05-21 15:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `subscriber`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `logged_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `mobile`, `is_active`, `created_at`, `updated_at`, `logged_at`, `activation_code`, `is_admin`) VALUES
(1, 'handaa', '11611531cc390b3d047142569042fca3', 'Дуламханд', '', 'handaa.1224@gmail.com', '99071053', 1, '2011-02-01 04:04:13', '0000-00-00 00:00:00', '2011-02-01 04:04:13', '', 1),
(2, 'megamind', 'c92dc823b205ec5e32fdee0be5d8db89', 'megamind', '', 'megamind@yahoo.co.uk', '786432132', 1, '2011-02-01 04:04:13', '0000-00-00 00:00:00', '2011-02-01 04:04:13', NULL, NULL),
(3, 'shrek', '4b60aaf3227b41090abb25977f585648', 'shrek', '', 'shrek@gmail.com', '99071045', 1, '2011-02-01 04:04:13', '0000-00-00 00:00:00', '2011-02-01 04:04:13', NULL, NULL),
(4, 'bumba', '0e7a6660f2ac725766f4e3107305ffc9', 'bumba', '', 'bumba@yahoo.co.uk', '786432132', 1, '2011-02-01 04:04:13', '0000-00-00 00:00:00', '2011-02-01 04:04:13', NULL, NULL),
(5, 'mulan', 'bd2f935091786d0d89313135423d6534', 'mulan', '', 'megamind@yahoo.co.uk', '786432132', 1, '2011-02-01 04:04:13', '0000-00-00 00:00:00', '2011-02-01 04:04:13', NULL, NULL),
(6, 'rio', 'd5ed38fdbf28bc4e58be142cf5a17cf5', 'rio', '', 'rio@yahoo.co.uk', 'rio', 1, '2011-02-01 04:04:13', '0000-00-00 00:00:00', '2011-02-01 04:04:13', NULL, NULL),
(7, 'grandadmin', 'ae07cc501a584d5ee7693868f5cba953', 'Dulamzaya', '', 'dulamzaya@yahoo.com', '99688179', 1, '2011-12-06 22:39:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1),
(8, 'handaa', '', 'Handaa', '', 'handaa_1224@yahoo.com', '99071053', 1, '2011-12-06 14:43:17', '2011-12-17 07:35:18', '0000-00-00 00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `embed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `iscover` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `object_type`, `object_id`, `title`, `description`, `thumb`, `embed`, `sort`, `iscover`, `is_featured`, `created_at`) VALUES
(1, 'all', 0, 'American Mongolians Basketball Championship Tournament 2012 Gold Medal Match', 'American Mongolians Basketball Championship Tournament 2012 Gold Medal Match', '', '<iframe width="230" height="150" src="http://www.youtube.com/embed/VEpMj-tqixs" frameborder="0" allowfullscreen></iframe>', 1, 1, 0, '2012-06-20 14:02:25'),
(2, 'all', 0, 'Цагаан Сар 2012 Бөхийн Барилдаан - Tsagaan sar Bohiin Barildaan ', 'Цагаан Сар 2012 Бөхийн Барилдаан - Tsagaan sar Bohiin Barildaan ', '', '<iframe width="230" height="150" src="http://www.youtube.com/embed/VEpMj-tqixs" frameborder="0" allowfullscreen></iframe>', 1, 0, 0, '2012-06-20 14:13:12'),
(3, 'all', 0, 'Инээдтэй үдэш 2012 - Х Түц , Шинэ үе , Маск 2 ', 'Инээдтэй үдэш 2012 - Х Түц , Шинэ үе , Маск 2 ', '', '<iframe width="230" height="150" src="http://www.youtube.com/embed/VEpMj-tqixs" frameborder="0" allowfullscreen></iframe>', 0, 0, 0, '2012-06-20 14:13:43'),
(4, 'all', 0, 'Triya Swimwear Show - Bikini Models on the', 'Triya Swimwear Show - Bikini Models on the', '', '<iframe width="230" height="150" src="http://www.youtube.com/embed/VEpMj-tqixs" frameborder="0" allowfullscreen></iframe>', 0, 0, 0, '2012-06-20 14:14:06'),
(5, 'all', 0, 'Top Model Maria Mogsolova at Cannes Film Festival 2012 | FashionTV ', 'Top Model Maria Mogsolova at Cannes Film Festival 2012 | FashionTV ', '', '<iframe width="230" height="150" src="http://www.youtube.com/embed/VEpMj-tqixs" frameborder="0" allowfullscreen></iframe>', 0, 0, 0, '2012-06-20 14:14:20'),
(6, 'all', 0, 'Glamorous Wedding Fashion by Musee de Aya, and More on Tokyo Fashion News 92B | FashionTV ', 'Glamorous Wedding Fashion by Musee de Aya, and More on Tokyo Fashion News 92B | FashionTV ', '', '<iframe width="230" height="150" src="http://www.youtube.com/embed/VEpMj-tqixs" frameborder="0" allowfullscreen></iframe>', 0, 0, 0, '2012-06-20 14:14:35'),
(7, 'all', 0, 'Nights In Monaco Red Carpet ft Prince Albert, Diane Kruger, Joshua Jackson | Cannes 2012 | FashionTV ', 'Nights In Monaco Red Carpet ft Prince Albert, Diane Kruger, Joshua Jackson | Cannes 2012 | FashionTV ', '', '<iframe width="230" height="150" src="http://www.youtube.com/embed/VEpMj-tqixs" frameborder="0" allowfullscreen></iframe>', 0, 0, 0, '2012-06-20 14:14:54');
