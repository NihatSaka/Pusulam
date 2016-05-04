-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 May 2016, 10:41:36
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adres`
--

CREATE TABLE IF NOT EXISTS `adres` (
  `URUN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ABONE_NO` varchar(255) NOT NULL,
  `ABONE_MAHALLE` varchar(255) NOT NULL,
  `ABONE_SOKAK` varchar(255) NOT NULL,
  `ABONE_ADRES_ID` varchar(255) NOT NULL,
  `ABONE_ILCE` varchar(255) NOT NULL,
  `ABONE_SEHIR` varchar(255) NOT NULL,
  UNIQUE KEY `URUN_ID` (`URUN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=203 ;

--
-- Tablo döküm verisi `adres`
--

INSERT INTO `adres` (`URUN_ID`, `ABONE_NO`, `ABONE_MAHALLE`, `ABONE_SOKAK`, `ABONE_ADRES_ID`, `ABONE_ILCE`, `ABONE_SEHIR`) VALUES
(1, 'nihatkullanici@pusulam.com', '19 mayis mh.', 'senlik sokak', '46', 'buyukcekmece', 'istanbul'),
(2, 'nihatkullanici@pusulam.com', '19 mayis mh.', 'sevki ari cadde', '24', 'buyukcekmece', 'istanbul'),
(3, 'nihatkullanici@pusulam.com', ' 19 mayis mh.', 'cicek sokak', '1', 'buyukcekmece', 'istanbul'),
(4, 'nihatkullanici@pusulam.com', 'Hacıkasım Mahallesi', 'cumhuriyet caddesi', '42/B', 'şile', 'istanbul'),
(5, 'nihatkullanici@pusulam.com', 'fevzi çakmak mahallesi', 'selanik sokak', '3/B', 'pendik', 'istanbul'),
(6, 'nihatkullanici@pusulam.com', 'maden mahallesi', 'çınar caddesi', '4/A', 'adalar', 'istanbul'),
(7, 'nihatkullanici@pusulam.com', 'bostancı mahallesi', 'vukela cad.', '23', 'kadıköy', 'istanbul'),
(8, 'nihatkullanici@pusulam.com', 'emek mahallesi', 'kayalar caddesi', '78', 'sancaktepe', 'istanbul'),
(9, 'nihatkullanici@pusulam.com', 'mimar sinan mahallesi', 'selim dede caddesi', '40/B', 'çekmeköy', 'istanbul'),
(10, 'nihatkullanici@pusulam.com', 'cemil meriç mahallesi', 'atatürk caddesi', '80/A', 'ümraniye', 'istanbul'),
(11, 'nihatkullanici@pusulam.com', 'merdivenköy mahallesi', 'gülnur sokak', '4/D', 'kadıköy', 'istanbul'),
(12, 'nihatkullanici@pusulam.com', 'koşuyolu mahallesi', 'kalfaçeşme sokak', '1', 'kadıköy', 'istanbul'),
(13, 'nihatkullanici@pusulam.com', 'selamiali mahallesi', 'Asteğmen Halil Ögel Sokak', '32/A', 'üsküdar', 'istanbul'),
(14, 'nihatkullanici@pusulam.com', 'mecidiye mahallesi', 'Muvakkit Sokak', '26/A', 'beşiktaş', 'istanbul'),
(15, 'nihatkullanici@pusulam.com', 'telsizler mahallesi', 'talatpaşa caddesi', '128/B', 'kağıthane', 'istanbul'),
(16, 'nihatkullanici@pusulam.com', 'atikali mahallesi', 'fevzipaşa caddesi', '94', 'fatih', 'istanbul'),
(17, 'nihatkullanici@pusulam.com', 'sakarya mahallesi', 'türbe caddesi', '10/A', 'eyüp', 'istanbul'),
(18, 'nihatkullanici@pusulam.com', 'kartaltepe mahallesi', 'kültür sokak', '24', 'bayrampaşa', 'istanbul'),
(19, 'nihatkullanici@pusulam.com', 'çınar mahallesi', 'osman gazi caddesi', '64/A', 'bağcılar', 'istanbul'),
(20, 'nihatkullanici@pusulam.com', 'barbaros mahallesi', '6/1.sokak ', '46', 'bağcılar', 'istanbul'),
(21, 'nihatkullanici@pusulam.com', 'şirinevler mahallesi', 'hastane caddesi', '18/D', 'bahçelievler', 'istanbul'),
(22, 'nihatkullanici@pusulam.com', 'kemalpaşa mahallesi', 'bağlar caddesi', '35/2', 'küçükçekmece', 'istanbul'),
(23, 'nihatkullanici@pusulam.com', 'Arnavutköy Merkez Mahallesi', 'Fatih Caddesi', '1175/A', 'Arnavutköy', 'istanbul'),
(24, 'nihatkullanici@pusulam.com', 'İsmetpaşa Mahallesi', 'Kenar Sokak', '22', 'bayrampaşa', 'istanbul'),
(25, 'nihatkullanici@pusulam.com', 'merkez mahallesi', 'Fatih Caddesi', '3', 'Arnavutköy', 'istanbul'),
(26, 'nihatkullanici@pusulam.com', 'Karayolları Mahallesi', 'Osmanbey Caddesi', '120', 'gaziosmanpaşa', 'istanbul'),
(27, 'nihatkullanici@pusulam.com', 'Yenidoğan Mahallesi', '41. Sokak', '3', 'zeytinburnu', 'istanbul'),
(28, 'nihatkullanici@pusulam.com', 'Mehmet Akif Ersoy Mahallesi', 'Cami Caddesi', '3', 'Sultanbeyli', 'istanbul'),
(29, 'nihatkullanici@pusulam.com', 'Balibey Mahallesi', 'Atatürk Caddesi', '1', 'Şile', 'istanbul'),
(30, 'nihatkullanici@pusulam.com', 'İçmeler Mahallesi', 'Enise Sokak', '5', 'tuzla', 'istanbul'),
(31, 'nihatkullanici@pusulam.com', 'elmalıkent mahallesi', 'Adem Yavuz Caddesi', '1', 'ümraniye', 'istanbul'),
(32, 'nihatkullanici@pusulam.com', 'Kemalpaşa Mahallesi', 'Halkalı Caddesi', '101', 'sefaköy', 'istanbul'),
(33, 'nihatkullanici@pusulam.com', 'Inkilap Mah. ', 'Küçüksu Cad.', '68', 'ümraniye', 'istanbul'),
(34, 'nihatkullanici@pusulam.com', 'Fevzi Çakmak Mah.', 'Yıldırım Beyazıd Cad.', '1', 'bahçelievler', 'istanbul'),
(35, 'nihatkullanici@pusulam.com', 'Silahtarağa mh.', 'Silahtarağa Cd. ', '187', 'eyüp', 'istanbul'),
(36, 'nihatkullanici@pusulam.com', 'Barış Mah.', 'Sakarya Cad.', '1', 'beylikdüzü', 'istanbul'),
(37, 'nihatkullanici@pusulam.com', 'Zümrütevler Mah.', 'Tülin Cad.', '45', 'maltepe', 'istanbul'),
(38, 'nihatkullanici@pusulam.com', 'Zümrütevler Mah.', 'Karaca Cad.', '59/A', 'zümrütevler', 'istanbul'),
(39, 'nihatkullanici@pusulam.com', 'Kazım Karabekir Mah', '859 Sok.', '16', 'eyüp', 'istanbul'),
(40, 'nihatkullanici@pusulam.com', 'Cumhuriyet Mah.', 'Dr.Sadık Ahmet Cad.', '55/A', 'küçükçekmece', 'istanbul'),
(41, 'nihatkullanici@pusulam.com', 'Cevizli Mah.', 'Denizer Cad.', '21/B', 'kartal', 'istanbul'),
(42, 'nihatkullanici@pusulam.com', 'Alibey Mah.', 'Ali Çetinkaya Cad', '99', 'silivri', 'istanbul'),
(43, 'nihatkullanici@pusulam.com', 'Oruç Reis Mah.', 'Barbaros Cad.', '26/B', 'esenler', 'istanbul'),
(44, 'nihatkullanici@pusulam.com', 'Yıldız Mah.', 'Çırağan Cad.', '21/A', 'Beşiktaş', 'istanbul'),
(45, 'nihatkullanici@pusulam.com', 'Ferhatpaşa Mah.', 'Atatürk Cad.', '105/A', 'çatalca', 'istanbul'),
(46, 'nihatkullanici@pusulam.com', 'İnkılap Mah.', 'Cumhuriyet Cad.', '20/A', 'ümraniye', 'istanbul'),
(47, 'nihatkullanici@pusulam.com', 'Kısıklı Mah.', 'Yunus Emre Sok.', '24/A', 'üsküdar', 'istanbul'),
(48, 'nihatkullanici@pusulam.com', 'Kavacık Mah.', 'Otağtepe Cad.', '23/A', 'Beykoz', 'istanbul'),
(49, 'nihatkullanici@pusulam.com', 'Ulus Mah. ', 'Atatürk Cad.', '24/B', 'büyükçekmece', 'istanbul'),
(50, 'nihatkullanici@pusulam.com', 'Fevzi Çakmak Mah.', 'Fatih Cad.', '82', 'bahçelievler', 'istanbul'),
(51, 'selimdemiral@hotmail.com', '19 mayis mh.', 'senlik sokak', '46', 'buyukcekmece', 'istanbul'),
(52, 'selimdemiral@hotmail.com', '19 mayis mh.', 'sevki ari cadde', '24', 'buyukcekmece', 'istanbul'),
(53, 'selimdemiral@hotmail.com', ' 19 mayis mh.', 'cicek sokak', '1', 'buyukcekmece', 'istanbul'),
(54, 'selimdemiral@hotmail.com', 'Hacıkasım Mahallesi', 'cumhuriyet caddesi', '42/B', 'şile', 'istanbul'),
(55, 'selimdemiral@hotmail.com', 'fevzi çakmak mahallesi', 'selanik sokak', '3/B', 'pendik', 'istanbul'),
(56, 'selimdemiral@hotmail.com', 'maden mahallesi', 'çınar caddesi', '4/A', 'adalar', 'istanbul'),
(57, 'selimdemiral@hotmail.com', 'bostancı mahallesi', 'vukela cad.', '23', 'kadıköy', 'istanbul'),
(58, 'selimdemiral@hotmail.com', 'emek mahallesi', 'kayalar caddesi', '78', 'sancaktepe', 'istanbul'),
(59, 'selimdemiral@hotmail.com', 'mimar sinan mahallesi', 'selim dede caddesi', '40/B', 'çekmeköy', 'istanbul'),
(60, 'selimdemiral@hotmail.com', 'cemil meriç mahallesi', 'atatürk caddesi', '80/A', 'ümraniye', 'istanbul'),
(61, 'selimdemiral@hotmail.com', 'merdivenköy mahallesi', 'gülnur sokak', '4/D', 'kadıköy', 'istanbul'),
(62, 'selimdemiral@hotmail.com', 'koşuyolu mahallesi', 'kalfaçeşme sokak', '1', 'kadıköy', 'istanbul'),
(63, 'selimdemiral@hotmail.com', 'selamiali mahallesi', 'Asteğmen Halil Ögel Sokak', '32/A', 'üsküdar', 'istanbul'),
(64, 'selimdemiral@hotmail.com', 'mecidiye mahallesi', 'Muvakkit Sokak', '26/A', 'beşiktaş', 'istanbul'),
(65, 'selimdemiral@hotmail.com', 'telsizler mahallesi', 'talatpaşa caddesi', '128/B', 'kağıthane', 'istanbul'),
(66, 'selimdemiral@hotmail.com', 'atikali mahallesi', 'fevzipaşa caddesi', '94', 'fatih', 'istanbul'),
(67, 'selimdemiral@hotmail.com', 'sakarya mahallesi', 'türbe caddesi', '10/A', 'eyüp', 'istanbul'),
(68, 'selimdemiral@hotmail.com', 'kartaltepe mahallesi', 'kültür sokak', '24', 'bayrampaşa', 'istanbul'),
(69, 'selimdemiral@hotmail.com', 'çınar mahallesi', 'osman gazi caddesi', '64/A', 'bağcılar', 'istanbul'),
(70, 'selimdemiral@hotmail.com', 'barbaros mahallesi', '6/1.sokak ', '46', 'bağcılar', 'istanbul'),
(71, 'selimdemiral@hotmail.com', 'şirinevler mahallesi', 'hastane caddesi', '18/D', 'bahçelievler', 'istanbul'),
(72, 'selimdemiral@hotmail.com', 'kemalpaşa mahallesi', 'bağlar caddesi', '35/2', 'küçükçekmece', 'istanbul'),
(73, 'selimdemiral@hotmail.com', 'Arnavutköy Merkez Mahallesi', 'Fatih Caddesi', '1175/A', 'Arnavutköy', 'istanbul'),
(74, 'selimdemiral@hotmail.com', 'İsmetpaşa Mahallesi', 'Kenar Sokak', '22', 'bayrampaşa', 'istanbul'),
(75, 'selimdemiral@hotmail.com', 'merkez mahallesi', 'Fatih Caddesi', '3', 'Arnavutköy', 'istanbul'),
(76, 'selimdemiral@hotmail.com', 'Karayolları Mahallesi', 'Osmanbey Caddesi', '120', 'gaziosmanpaşa', 'istanbul'),
(77, 'selimdemiral@hotmail.com', 'Yenidoğan Mahallesi', '41. Sokak', '3', 'zeytinburnu', 'istanbul'),
(78, 'selimdemiral@hotmail.com', 'Mehmet Akif Ersoy Mahallesi', 'Cami Caddesi', '3', 'Sultanbeyli', 'istanbul'),
(79, 'selimdemiral@hotmail.com', 'Balibey Mahallesi', 'Atatürk Caddesi', '1', 'Şile', 'istanbul'),
(80, 'selimdemiral@hotmail.com', 'İçmeler Mahallesi', 'Enise Sokak', '5', 'tuzla', 'istanbul'),
(81, 'selimdemiral@hotmail.com', 'elmalıkent mahallesi', 'Adem Yavuz Caddesi', '1', 'ümraniye', 'istanbul'),
(82, 'selimdemiral@hotmail.com', 'Kemalpaşa Mahallesi', 'Halkalı Caddesi', '101', 'sefaköy', 'istanbul'),
(83, 'selimdemiral@hotmail.com', 'Inkilap Mah. ', 'Küçüksu Cad.', '68', 'ümraniye', 'istanbul'),
(84, 'selimdemiral@hotmail.com', 'Fevzi Çakmak Mah.', 'Yıldırım Beyazıd Cad.', '1', 'bahçelievler', 'istanbul'),
(85, 'selimdemiral@hotmail.com', 'Silahtarağa mh.', 'Silahtarağa Cd. ', '187', 'eyüp', 'istanbul'),
(86, 'selimdemiral@hotmail.com', 'Barış Mah.', 'Sakarya Cad.', '1', 'beylikdüzü', 'istanbul'),
(87, 'selimdemiral@hotmail.com', 'Zümrütevler Mah.', 'Tülin Cad.', '45', 'maltepe', 'istanbul'),
(88, 'selimdemiral@hotmail.com', 'Zümrütevler Mah.', 'Karaca Cad.', '59/A', 'zümrütevler', 'istanbul'),
(89, 'selimdemiral@hotmail.com', 'Kazım Karabekir Mah', '859 Sok.', '16', 'eyüp', 'istanbul'),
(90, 'selimdemiral@hotmail.com', 'Cumhuriyet Mah.', 'Dr.Sadık Ahmet Cad.', '55/A', 'küçükçekmece', 'istanbul'),
(91, 'selimdemiral@hotmail.com', 'Cevizli Mah.', 'Denizer Cad.', '21/B', 'kartal', 'istanbul'),
(92, 'selimdemiral@hotmail.com', 'Alibey Mah.', 'Ali Çetinkaya Cad', '99', 'silivri', 'istanbul'),
(93, 'selimdemiral@hotmail.com', 'Oruç Reis Mah.', 'Barbaros Cad.', '26/B', 'esenler', 'istanbul'),
(94, 'selimdemiral@hotmail.com', 'Yıldız Mah.', 'Çırağan Cad.', '21/A', 'Beşiktaş', 'istanbul'),
(95, 'selimdemiral@hotmail.com', 'Ferhatpaşa Mah.', 'Atatürk Cad.', '105/A', 'çatalca', 'istanbul'),
(96, 'selimdemiral@hotmail.com', 'İnkılap Mah.', 'Cumhuriyet Cad.', '20/A', 'ümraniye', 'istanbul'),
(97, 'selimdemiral@hotmail.com', 'Kısıklı Mah.', 'Yunus Emre Sok.', '24/A', 'üsküdar', 'istanbul'),
(98, 'selimdemiral@hotmail.com', 'Kavacık Mah.', 'Otağtepe Cad.', '23/A', 'Beykoz', 'istanbul'),
(99, 'selimdemiral@hotmail.com', 'Ulus Mah. ', 'Atatürk Cad.', '24/B', 'büyükçekmece', 'istanbul'),
(100, 'selimdemiral@hotmail.com', 'Fevzi Çakmak Mah.', 'Fatih Cad.', '82', 'bahçelievler', 'istanbul'),
(101, 'selimkullanici@selim.com', 'URUN_ID', 'ABONE_ID', 'ADET', 'ABONE_SUBE_ID', 'ABONE_ADRES_ID'),
(102, 'selimkullanici@selim.com', '-2', '20811', '1', '248005', '52232100'),
(103, 'selimkullanici@selim.com', '-2', '231917', '1', '248005', '43398707'),
(104, 'selimkullanici@selim.com', '-2', '232496', '1', '248005', '36185298'),
(105, 'selimkullanici@selim.com', '-2', '273620', '1', '248005', '46559638'),
(106, 'selimkullanici@selim.com', '-3', '36714368', '1', '248005', '307406'),
(107, 'selimkullanici@selim.com', '-2', '36842020', '1', '248005', '30793645'),
(108, 'selimkullanici@selim.com', '-2', '41287321', '1', '248005', '44300347'),
(109, 'selimkullanici@selim.com', '-2', '41888375', '1', '248005', '51002904'),
(110, 'selimkullanici@selim.com', '-3', '41938457', '1', '248005', '43398707'),
(111, 'selimkullanici@selim.com', '-2', '44068932', '1', '248005', '52351042'),
(112, 'selimkullanici@selim.com', '-2', '46604200', '1', '248005', '276002'),
(113, 'selimkullanici@selim.com', '-2', '49175938', '1', '248005', '46229213'),
(114, 'selimkullanici@selim.com', '-3', '49294138', '1', '248005', '46565952'),
(115, 'selimkullanici@selim.com', '-2', '49389622', '1', '248005', '40517003'),
(116, 'selimkullanici@selim.com', '-2', '49594084', '1', '248005', '46565952'),
(117, 'selimkullanici@selim.com', '-2', '49621697', '1', '248005', '45907417'),
(118, 'selimkullanici@selim.com', '-2', '49777652', '1', '248005', '40641834'),
(119, 'selimkullanici@selim.com', '83001', '49836663', '1', '248005', '51002904'),
(120, 'selimkullanici@selim.com', '-2', '50329235', '1', '248005', '49858659'),
(121, 'selimkullanici@selim.com', '-2', '51548225', '1', '248005', '28721641'),
(122, 'selimkullanici@selim.com', '-2', '52134892', '1', '248005', '51740646'),
(123, 'selimkullanici@selim.com', '-2', '52221737', '1', '248005', '51829780'),
(124, 'selimkullanici@selim.com', '83001', '52221869', '1', '248005', '47142997'),
(125, 'selimkullanici@selim.com', '-2', '52298230', '1', '248005', '49363979'),
(126, 'selimkullanici@selim.com', '-3', '52327258', '1', '248005', '46224207'),
(127, 'selimkullanici@selim.com', '83001', '52482121', '1', '248005', '52046524'),
(128, 'selimkullanici@selim.com', '-2', '52528459', '1', '248005', '52112661'),
(129, 'selimkullanici@selim.com', '-2', '52872277', '1', '248005', '52926228'),
(130, 'selimkullanici@selim.com', '-2', '52872281', '1', '248005', '52926277'),
(131, 'selimkullanici@selim.com', '-2', '52872291', '1', '248005', '52926277'),
(132, 'selimkullanici@selim.com', '-2', '52872300', '1', '248005', '52926277'),
(133, 'selimkullanici@selim.com', '-2', '52872311', '1', '248005', '52926228'),
(134, 'selimkullanici@selim.com', '-2', '52872319', '1', '248005', '52926228'),
(135, 'selimkullanici@selim.com', '-2', '52902364', '1', '248005', '52569344'),
(136, 'selimkullanici@selim.com', '-2', '52944603', '1', '248005', '52451520'),
(137, 'selimkullanici@selim.com', '-2', '52952733', '1', '248005', '52461998'),
(138, 'selimkullanici@selim.com', '-2', '52954371', '1', '248005', '52462876'),
(139, 'selimkullanici@selim.com', '-2', '52954373', '1', '248005', '48457426'),
(140, 'selimkullanici@selim.com', '-2', '53024169', '1', '248005', '52539270'),
(141, 'selimkullanici@selim.com', '-2', '53051100', '1', '248005', '52566088'),
(142, 'selimkullanici@selim.com', '-2', '53080484', '1', '248005', '52597184'),
(143, 'selimkullanici@selim.com', '-2', '53173381', '2', '248005', '49447656'),
(144, 'selimkullanici@selim.com', '-2', '53173385', '2', '248005', '49447656'),
(145, 'selimkullanici@selim.com', '-2', '53173387', '2', '248005', '49447656'),
(146, 'selimkullanici@selim.com', '-2', '53173391', '2', '248005', '49447656'),
(147, 'selimkullanici@selim.com', '-2', '53173392', '1', '248005', '49447656'),
(148, 'selimkullanici@selim.com', '-2', '53173398', '1', '248005', '49447656'),
(149, 'selimkullanici@selim.com', '-2', '53173402', '2', '248005', '49447656'),
(150, 'selimkullanici@selim.com', '-2', '53179164', '1', '248005', '52698096'),
(151, 'selimkullanici@selim.com', '-2', '53277198', '1', '248005', '52793981'),
(152, 'selimkullanici@selim.com', '-2', '53292194', '1', '248005', '52808993'),
(153, 'selimkullanici@selim.com', '-2', '53292198', '1', '248005', '52808993'),
(154, 'selimkullanici@selim.com', '-2', '53343975', '1', '248005', '53414504'),
(155, 'selimkullanici@selim.com', '-2', '53386273', '1', '248005', '52904186'),
(156, 'selimkullanici@selim.com', '-2', '53397226', '1', '248005', '52912724'),
(157, 'selimkullanici@selim.com', '-2', '53439304', '1', '248005', '52957044'),
(158, 'selimkullanici@selim.com', '-2', '53489676', '1', '248005', '52677056'),
(159, 'selimkullanici@selim.com', '-2', '53494805', '1', '248005', '53008297'),
(160, 'selimkullanici@selim.com', '-2', '53519557', '1', '248005', '53032194'),
(161, 'selimkullanici@selim.com', '-2', '53534501', '1', '248005', '53047052'),
(162, 'selimkullanici@selim.com', '-2', '53549742', '1', '248005', '43256327'),
(163, 'selimkullanici@selim.com', '-2', '53575088', '1', '248005', '53143274'),
(164, 'selimkullanici@selim.com', '-2', '53594781', '1', '248005', '53106540'),
(165, 'selimkullanici@selim.com', '-2', '53594828', '1', '248005', '53129613'),
(166, 'selimkullanici@selim.com', '-2', '53594839', '1', '248005', '53106598'),
(167, 'selimkullanici@selim.com', '-2', '53594848', '1', '248005', '53106606'),
(168, 'selimkullanici@selim.com', '-2', '53611080', '1', '248005', '53121534'),
(169, 'selimkullanici@selim.com', '-2', '53672155', '1', '248005', '53178625'),
(170, 'selimkullanici@selim.com', '-2', '53695313', '1', '248005', '53202752'),
(171, 'selimkullanici@selim.com', '-2', '53757849', '1', '248005', '52926228'),
(172, 'selimkullanici@selim.com', '-2', '53757851', '1', '248005', '52926228'),
(173, 'selimkullanici@selim.com', '-2', '53757854', '1', '248005', '52926228'),
(174, 'selimkullanici@selim.com', '-2', '53757895', '1', '248005', '52926277'),
(175, 'selimkullanici@selim.com', '-2', '53757898', '1', '248005', '53261348'),
(176, 'selimkullanici@selim.com', '-2', '53757900', '1', '248005', '52926277'),
(177, 'selimkullanici@selim.com', '-2', '53757902', '1', '248005', '52926277'),
(178, 'selimkullanici@selim.com', '-2', '53797117', '2', '248005', '53296143'),
(179, 'selimkullanici@selim.com', '-2', '53797127', '2', '248005', '53296156'),
(180, 'selimkullanici@selim.com', '-2', '53797135', '2', '248005', '53296170'),
(181, 'selimkullanici@selim.com', '-2', '160040', '1', '248005', '52285031'),
(182, 'selimkullanici@selim.com', '-2', '217025', '1', '248005', '48870454'),
(183, 'selimkullanici@selim.com', '-3', '217106', '1', '248005', '1002452'),
(184, 'selimkullanici@selim.com', '-2', '237292', '1', '248005', '18480600'),
(185, 'selimkullanici@selim.com', '-2', '267422', '1', '248005', '49529953'),
(186, 'selimkullanici@selim.com', '-2', '269565', '1', '248005', '26442983'),
(187, 'selimkullanici@selim.com', '-2', '282638', '1', '248005', '52295931'),
(188, 'selimkullanici@selim.com', '-2', '283026', '1', '248005', '42849308'),
(189, 'selimkullanici@selim.com', '-2', '1240210', '1', '248005', '52294789'),
(190, 'selimkullanici@selim.com', '-3', '1322123', '1', '248005', '415295'),
(191, 'selimkullanici@selim.com', '-2', '1704337', '1', '248005', '52294577'),
(192, 'selimkullanici@selim.com', '-2', '1709847', '1', '248005', '32783033'),
(193, 'selimkullanici@selim.com', '-2', '1968630', '1', '248005', '52304205'),
(194, 'selimkullanici@selim.com', '-3', '1994378', '1', '248005', '43037410'),
(195, 'selimkullanici@selim.com', '-2', '2099116', '1', '248005', '52342217'),
(196, 'selimkullanici@selim.com', '-2', '2573988', '1', '248005', '52300048'),
(197, 'selimkullanici@selim.com', '-2', '2942751', '1', '248005', '52234214'),
(198, 'selimkullanici@selim.com', '-2', '3032289', '1', '248005', '52300041'),
(199, 'selimkullanici@selim.com', '-2', '3039123', '1', '248005', '30092772'),
(200, 'selimkullanici@selim.com', '-2', '3069710', '1', '248005', '52194466'),
(201, 'selimkullanici@selim.com', '-2', '3150301', '1', '248005', '52068455'),
(202, 'selimkullanici@selim.com', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `deneme`
--

CREATE TABLE IF NOT EXISTS `deneme` (
  `urun1` int(255) NOT NULL AUTO_INCREMENT,
  `urun2` varchar(255) NOT NULL,
  `urun3` varchar(255) NOT NULL,
  `urun4` varchar(255) NOT NULL,
  `urun5` varchar(255) NOT NULL,
  `urun6` varchar(255) NOT NULL,
  `urun7` varchar(255) NOT NULL,
  `urun8` varchar(255) NOT NULL,
  `urun9` varchar(255) NOT NULL,
  `urun10` varchar(255) NOT NULL,
  `urun11` varchar(255) NOT NULL,
  `urun12` varchar(255) NOT NULL,
  `urun13` varchar(255) NOT NULL,
  `urun14` varchar(255) NOT NULL,
  `urun15` varchar(255) NOT NULL,
  `urun16` varchar(255) NOT NULL,
  `urun17` varchar(255) NOT NULL,
  `urun18` varchar(255) NOT NULL,
  UNIQUE KEY `urun1` (`urun1`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=381 ;

--
-- Tablo döküm verisi `deneme`
--

INSERT INTO `deneme` (`urun1`, `urun2`, `urun3`, `urun4`, `urun5`, `urun6`, `urun7`, `urun8`, `urun9`, `urun10`, `urun11`, `urun12`, `urun13`, `urun14`, `urun15`, `urun16`, `urun17`, `urun18`) VALUES
(380, 'New York St', 'Redlands', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AD` varchar(255) NOT NULL,
  `SOYAD` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `SIFRE` varchar(255) NOT NULL,
  `KULLANICI_TURU` enum('admin','kullanici','surucu') NOT NULL,
  `ADRES` text NOT NULL,
  `MATRIS` text NOT NULL,
  `ROTA` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`ID`, `AD`, `SOYAD`, `EMAIL`, `SIFRE`, `KULLANICI_TURU`, `ADRES`, `MATRIS`, `ROTA`) VALUES
(2, 'selim', 'demiral', 'selimdemiral@hotmail.com', '716beabe841ea1c9d4642e8319529742', 'kullanici', '', '', ''),
(3, '', '', 'admin@pusulam.com', 'pusulam', 'admin', '', '', ''),
(4, 'selim', 'demiral', 'selimsurucu@pusulam.com', '716beabe841ea1c9d4642e8319529742', 'surucu', '', '', ''),
(5, 'nihat', 'saka', 'nihatkullanici@pusulam.com', '716beabe841ea1c9d4642e8319529742', 'kullanici', '', '', ''),
(6, 'Selim', 'Demiral', 'selimkullanici@selim.com', '5213ff85ba00f6a65a465d710ad584eb', 'kullanici', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rotalar`
--

CREATE TABLE IF NOT EXISTS `rotalar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(255) NOT NULL,
  `ROTA` varchar(255) NOT NULL,
  `TOPLAM_DISTANCE` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Tablo döküm verisi `rotalar`
--

INSERT INTO `rotalar` (`ID`, `EMAIL`, `ROTA`, `TOPLAM_DISTANCE`) VALUES
(1, 'alemdar@gmail.com', '5,4,2,10', '13.71'),
(2, 'alemdar@gmail.com', '5,2,8,11', '648.61'),
(3, 'alemdar@gmail.com', '1,2,3,4,5', '1902.07'),
(4, 'akapar@hsdf.asfd', '3,2,1', '965.82'),
(5, 'alemdar@gmail.com', '5,1,2', '648.61'),
(6, 'asfsdee@sad.asd', '2,1,3', '1297.83'),
(7, 'alemdar@gmail.com', '15,34,23,50,22,12', '202.7'),
(8, 'alemdar@gmail.com', '1,2,3,4,5,6,7,8,9,10', '176.13'),
(9, 'alemdar@gmail.com', '5,4,2,1', '132.2'),
(10, 'alemdar@gmail.com', '6,7,2,3', '57.93'),
(11, 'alemdar@gmail.com', '8,9,2,4', '141.8'),
(12, 'alemdar@gmail.com', '1,7,4,2', '180.79'),
(13, 'alemdar@gmail.com', '5,1,8,7', '120.09'),
(14, 'alemdar@gmail.com', '5,1,9,4', '147.56'),
(15, 'alemdar@gmail.com', '3,1,10,11', '53.51'),
(16, 'alemdar@gmail.com', '9,11,2,3,5,7', '127.67'),
(17, 'sdemiral@surucu.com', '7,10,18,23', '34.94'),
(18, 'alemdar@gmail.com', '5,4,2', '131.49'),
(19, 'akapar@hsdf.asfd', '5,4,12', '94.47'),
(20, 'asfsdee@sad.asd', '6,46', '18.16'),
(21, 'sdemiral@surucu.com', '4,5,6,7,8,9,10,11,12,13', '101.8'),
(22, 'sdemiral@surucu.com', '5,4,3,1,7,5,2', '252.28'),
(23, 'sdemiral@pusulams.com', '5,12,6,7,13', '47.67'),
(24, 'selim@pusulam.com', '5,4,2,9,12,14', '204.04'),
(25, 'selim@pusulam.com', '6,5,12,18,22,43,13', '81.88'),
(26, 'selim@pusulam.com', '6,23,45,32,13,42,4', '302.96'),
(27, 'selimsurucu@pusulam.com', '43,2,14,21,29,33', '177.94'),
(28, 'selimsurucu@pusulam.com', '53,12,78,9,2,65,22', '172.43'),
(29, 'selimsurucu@pusulam.com', '43,12,1,6,9,20', '158.95');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
