-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2017 at 11:58 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backpackers`
--

-- --------------------------------------------------------

--
-- Table structure for table `change_filter_table`
--

CREATE TABLE IF NOT EXISTS `change_filter_table` (
  `id` int(10) NOT NULL,
  `time_new` varchar(10) NOT NULL,
  `price_range` varchar(20) NOT NULL,
  `nohpp` varchar(20) NOT NULL,
  `time_each_page` varchar(200) NOT NULL,
  `hotel_count` varchar(11) NOT NULL,
  `time_curr_php` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `change_filter_table`
--

INSERT INTO `change_filter_table` (`id`, `time_new`, `price_range`, `nohpp`, `time_each_page`, `hotel_count`, `time_curr_php`) VALUES
(1, '1491991006', '1', '3', '1:3:1:45', '3', '1491991006'),
(2, '1491991051', '1', '3', '1:3:1:0', '3', '1491991052');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_data`
--

CREATE TABLE IF NOT EXISTS `hotel_data` (
  `serial_no` int(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `hotel_name` varchar(30) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(110) NOT NULL,
  `price` varchar(15) NOT NULL,
  `spotless_linen` varchar(10) NOT NULL,
  `washroom` varchar(16) NOT NULL,
  `tv` varchar(10) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `distance` varchar(20) NOT NULL,
  `cooling` varchar(40) NOT NULL,
  `room_size` varchar(20) NOT NULL,
  `breakfast` varchar(50) NOT NULL,
  `extra1` varchar(20) NOT NULL,
  `extra2` varchar(20) NOT NULL,
  `extra3` varchar(20) NOT NULL,
  `extra4` varchar(20) NOT NULL,
  `extra5` varchar(20) NOT NULL,
  `extra6` varchar(20) NOT NULL,
  `extra7` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_data`
--

INSERT INTO `hotel_data` (`serial_no`, `category`, `hotel_name`, `contact_name`, `email`, `phone`, `address`, `price`, `spotless_linen`, `washroom`, `tv`, `telephone`, `distance`, `cooling`, `room_size`, `breakfast`, `extra1`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `extra7`) VALUES
(2, '1', 'HOTEL SHANTI PALACE', 'Kush Kumar Singh', 'kushkumar81@sppax.com', '(+91) 8134567141', '38, Netaji Subhash Marg, Darya Ganj , Chandni Chowk, 110002 New Delhi, India', 'Rs 699', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '15.07 km', '12 Litre Air Cooler', '', '', '', '', '', '', '', '', ''),
(3, '1', 'HOTEL CITY PALACE', 'Sumit Sharma', 'cityplace@hotets.com', '(+91) 7778524369', 'P-455 Third Floor,Greater Kailash 110016 New Delhi, India', 'Rs 759', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '13.17 km', 'Jumbo Air Cooler', '', '', '', '', '', '', '', '', ''),
(4, '1', 'HOTEL ASHWIN INN', 'Rahul Jain', 'rahuljashwin.com', '(+91) 9405264962', 'B block Third Floor, Panchsheel Park, 110017 New Delhi, India', 'Rs 859', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '12.07 km', '15 Litre Jumbo Window Cooler', '', '', '', '', '', '', '', '', ''),
(5, '1', 'HOTEL MEENA ', 'Shyam Trivari', 'shyamt@meena.com', '(+91) 9161727881', 'Virah Market Subhash Marg, Darya Ganj , Chandni Chowk, 110002 New Delhi, India', 'Rs 899', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '10.52 km', 'Thender Air Cooler', '', '', '', '', '', '', '', '', ''),
(6, '1', 'HOTEL PEARL', 'Praveen Prohit', 'pp@pearl.com', '(+91) 7427342395', 'B-139A, Third Floor, Panchsheel Park, 110017 New Delhi, India', 'Rs 999', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '11.5 km', '20 Litre Air  Cooler', '', '', '', '', '', '', '', '', ''),
(7, '1', 'HOTEL HILTON GARDEN INN', 'Rahul Niwas', 'hinesdoyle@premiant.com', '(+91) 7402304991', 'S-39A, Third Floor, Panchsheel Park, 110017 New Delhi, India', 'Rs 889', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '9.52 km', 'Personal Air Cooler', '', '', '', '', '', '', '', '', ''),
(8, '1', 'HOTEL COUNTRY INN ', 'Balveer Prajapat', 'burkealvarez@printspan.com', '(+91) 9421782392', 'Phase 122 Greater Kaislash , 110057 New Delhi, India', 'Rs 1009', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '8.74 km', '15 Litre  Personal Air Cooler ', '', '', '', '', '', '', '', '', ''),
(9, '1', 'HOTEL SRIVINAYAK', 'Ishan Agarwal', 'langmontgomery@geoform.com', '(+91) 7147195918', '11A/34, Channa Market, Karol Bagh, Karol Bagh, 110005 New Delhi, India', 'Rs 1099', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '8.00 km', '51 Litre Jumbo Cooler', '', '', '', '', '', '', '', '', ''),
(10, '1', 'HOTEL THE ROYAL', 'Lalit Kumar Mishra', 'montgomerysanchez@zenthall.com', '(+91) 8169838471', 'block 44, w.a,. Channa Market, mayur vihar, 110005 New Delhi, India', 'Rs 1159', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '10.52 km', 'Thender Air Cooler', '', '', '', '', '', '', '', '', ''),
(11, '1', 'HOTEL BUDDHA INN', 'Roshan Mheta', 'kentlarsen@exiand.com', '(+91) 7935299567', 'S-40A, Third Floor, Panchsheel Park, 110017 New Delhi, India', 'Rs 1299', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '11.5 km', '20 Litre Air  Cooler', '', '', 'Iron', '', '', '', '', '', ''),
(12, '1', 'HOTEL PREELESS PLAZA', 'Prakash Kumar', 'terradaniels@viagreat.com', '(+91) 7822511903', '1206, Ram Guru Raod, Mandi, Pahar Ganj, Paharganj, 110055 New Delhi, India', 'Rs 1359', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '9.52 km', 'Personal Air Cooler', '', '', '', '256Kbps', '', '', '', '', ''),
(13, '1', 'HOTEL TAJ GARDEN ', 'Abhi Shriwastava', 'courtneygibson@locazone.com', '(+91) 8841264673', 'S-39A, Third Floor,Chanakyapuri Panchsheel Park, 110017 New Delhi, India', 'Rs 1499', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '8.74 km', '15 Litre  Personal Air Cooler ', '', '', '', '', 'Tea & Coffee Bag', '', '', '', ''),
(14, '1', 'HOTEL THE ROYAL TAJ', 'Sidd Juneja', 'Juneja@conjurica.com', '(+91) 9447668453', '122/34, w.e.a,. Channa Market, Karol Bagh, Greater Kailash, 110005 New Delhi, India', 'Rs 1599', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '8.00 km', '51 Litre Jumbo Cooler', '', '', '', '', '', '24hr Room Service', '', '', ''),
(17, '2', 'HOTEL CROWN', 'Hughes Mejia', 'hughesmejia@emoltra.com', '(+91) 8337457362', 'S-39A, Forth  Floor, Connaught Place 110017 New Delhi, India', 'Rs 1700', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '8.69 km', 'Desert Cooler', '5.1m  x  3.1m', '', '', '', '', '', '', '', ''),
(18, '2', 'HOTEL KRISHNA', 'Maudi Menta', 'menta@gallaxia.com', '(+91) 8629841723', '2/34,  Channa Market, Karol Bagh, Karol Bagh, 110005 New Delhi, India', 'Rs 1899', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '8.41 km', 'Jumbo Cooler', '5.7m  x  4.3m', '', '', '', '', '', '', '', ''),
(19, '2', 'HOTEL GODWIN', 'Lori Chaudhari', 'lorifinley@daido.com', '(+91) 7690435716', '1206, Ram Guru Raod, Muna Mandi, Pahar Ganj, Paharganj, 110055 New Delhi, India', 'Rs 1999', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '7.58 km', 'Window High Power Cooler', '5.7m  x  4.7m', '', '', '', '', '', '', '', ''),
(20, '2', 'HOTEL ASHOK PLAZA', 'Inder Vishwas', 'Inder@eventix.com', '(+91) 9140506388', 'S-34A, Third Floor, Panchsheel Park, 110017 New Delhi, India', 'Rs 2099', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '7.05 km', 'Desert Air Cooler', '5.4m  x  4.4m', '', '', '', '', '', '', '', ''),
(21, '2', 'HOTEL ASHOK INN', 'Hines Doyle', 'hinesdoyle@premiant.com', '(+91) 7546248464', 'Paota  Muna Mandi, Mayur Vihar 110055 New Delhi, India', 'Rs 2199', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '8.00 km', '51 Litre Jumbo Air Cool', '5.7m  x  5.7m', '', '', '', '', '', '', '', ''),
(22, '2', 'HOTEL PULLMAN INN', 'Brami Burke', 'brandieburke@apex.com', '(+91) 9170529690', '2B Vasant Vihar, 110057 New Delhi, India', 'Rs 2299', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '8.25 km', 'Ac ', '6.1m  x  5.2m', '', '', '', '', '', '', '', ''),
(23, '2', 'HOTEL ROSE TREE', 'Huma Shrivastava', 'h.sri@ezentia.com', '(+91) 9193601706', '1B, Ram Guru Raod, Muna Mandi, Pahar Ganj, Paharganj, 110055 New Delhi, India', 'Rs 2399', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '6.31 km', 'Window Ac', '6.7m  x  3.3m', '', '', '', '', '', '', '', ''),
(24, '2', 'HOTEL CHANDELA INN', 'Doli Bass', 'donovanbass@netur.com', '(+91) 8784123829', 'P-39A, Third Floor, Panchsheel Park, 110017 New Delhi, India', 'Rs 2459', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '8.41 km', 'Jumbo Cooler', '5.7m  x  4.3m', '', '', '286Kbps', '', '', '', '', ''),
(25, '2', 'HOTEL BUNDELA PALACE', 'Preet Dawson', 'preerdawson@atgen.com', '(+91) 9566240856', 'B44, Third Floor, Chanakyapuri , 110017 New Delhi, India', 'Rs 2589', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '7.58 km', 'Window High Power Cooler', '5.7m  x  4.7m', '', '', '', 'Tea & Coffee Bag', '', '', '', ''),
(26, '2', 'HOTEL DISHANT PALACE', 'Afirin Mihhamad', 'afirin@glukgluk.com', '(+91) 7844308531', 'Salimar Bhag Greater Kailash New Delhi', 'Rs 2699', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '7.05 km', 'Desert Air Cooler', '5.4m  x  4.4m', '', '', '', '', '24hr Room Service', '', '', ''),
(27, '2', 'HOTEL LOVELY PLAZA', 'Sheppa Kundu', 'sheppa@genekom.com', '(+91) 8237623426', 'Qutab Institutional Area, Shaheed Jeet Singh Marg, 110016 New Delhi, India', 'Rs 2659', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '8.00 km', '51 Litre Jumbo Air Cool', '5.7m  x  5.7m', '', '', '', '', '', 'Buffet Dinner', '', ''),
(28, '2', 'HOTEL ABHI PALACE', 'Benilal ', 'lal@biflex.com', '(+91) 9529382918', ' Shaheed Jeet Sing Marg, Greater Kailash 110016 New Delhi, India', 'Rs 2789', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '8.25 km', 'Ac ', '6.1m  x  5.2m', '', '', '', '', '', '', 'Laundry Service', ''),
(29, '2', 'HOTEL SAMARTH PLAZA', 'Jishamin Hussain', 'jishamin@zorromop.com', '(+91) 7239615433', '120 Esplaned New Delhi ', 'Rs 2799', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '6.31 km', 'Window Ac', '6.7m  x  3.3m', '', '', '', '', '', '', '', 'Refrigrator & Bar'),
(32, '3', 'HOTEL SONA INN', 'Chandra Fulton', 'chandrafulton@qimonk.com', '(+91) 9577130304', 'SR, Ram Guru Raod, Saket , 110055 New Delhi, India', 'Rs 2899', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '6.33 km', 'Window Ac', '6m  x  5.5 m', 'Indian Breakfast (Puri Sabji)', '', '', '', '', '', '', ''),
(33, '3', 'HOTEL RED FORT', 'Chandar Mishra', 'ch.mishra@bleeko.com', '(+91) 9621886273', 'Vasant Vihar, Vasant Vihar, 110057 New Delhi, India', 'Rs 2999', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '6.53 km', 'Window Ac', '6m  x  5.5 m', 'Indian Breakfast (Puri Sabji)', '', '', '', '', '', '', ''),
(34, '3', 'HOTEL KUTEBH ', 'Murli Upaan', 'murli133@intam.com', '(+91) 7970272924', 'B 266 Third Floor, Chanakyapuri , 110017 New Delhi, India', 'Rs 3099', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '5.07 km', 'Central Ac', '7m  x  6.5 m', 'American Breakfast (Omlet & Butter N Bread)', '', '', '', '', '', '', ''),
(35, '3', 'HOTEL DELHI DERBAR', 'Wishu Vikaas', 'wishu@isologica.com', '(+91) 7697373777', 'SR, Ram Guru Raod, Muna Mandi, Mahipalpur , 110055 New Delhi, India', 'Rs 3199', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '4.62 km', 'Window Ac', '7m  x  5 m', 'English Breakfast (Butter N Bread And Egg)', '', '', '', '', '', '', ''),
(36, '3', 'HOTEL METRO INN', 'Rosa Sabestian', 'woodwardrosa@oatfarm.com', '(+91) 7261790686', 'Mandir Marg Connaught Place New Delhi', 'Rs 3299', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '5.07 km', 'Central Ac', '7m  x  6.5 m', 'American Breakfast (Omlet & Butter N Bread)', '', '', '', '', '', '', ''),
(37, '3', 'HOTEL METRO PLAZA', 'Helena Sinha', 'helenas@recritube.com', '(+91) 8355567855', 'Park Street Karol Road New Delhi', 'Rs 3399', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '4.62 km', 'Window Ac', '7m  x  5 m', 'English Breakfast (Butter N Bread And Egg)', '', '', '', '', '', '', ''),
(38, '3', 'HOTEL SITA PALACE', 'Noel Kumar', 'noelmonroe@colaire.com', '(+91) 8450452531', 'SR, Ram Guru Raod, Muna Mandi, Pahar Ganj, Paharganj, 110055 New Delhi, India', 'Rs 3599', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '3.15 km', 'Central  Ac', '8m  x  6m', 'Cafe Breakfast ( Tea & Tost)', '', '', '', '', '', '', ''),
(39, '3', 'HOTEL HANS PLAZA', 'Nishaan Mistry', 'mistry@ronelon.com', '(+91) 8566224841', 'SS-3914A, Forth Floor, Panchsheel Park, 110017 New Delhi, India', 'RS 3699', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '2.27 km', 'Tower   Ac', '7m  x  6.8 m', 'Indian Breakfast (Paratha)', 'Toiletaries ', '', '', '', '', '', ''),
(40, '3', 'HOTEL KRISHNA DELUXE', 'Austin Ojha', 'patsyaustin@illumity.com', '(+91) 7107591607', 'Qutab  Area, Shaheed Jeet Singh Marg, 110016 New Delhi, India', 'Rs 3659', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '2.27 km', 'Tower   Ac', '7m  x  6.8 m', 'Indian Breakfast (Paratha)', 'Refrigerator', '', '', '', '', '', ''),
(41, '3', 'HOTEL VISHAL RESIDENCY', 'Santosh Rivera', 'stantonrivera@ecolight.com', '(+91) 7853687257', '17 Bressul Street Mahipalpur New Delhi', 'Rs 3789', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '3.15 km', 'Central   Ac', '8m  x  6m', 'Cafe Breakfast ( Tea & Tost)', '', '', 'Buffet Dinner', '', '', '', ''),
(42, '3', 'HOTEL ALPINE RESIDENCY', 'Roshali Bunakar', 'rosha@keengen.com', '(+91) 9809909645', 'B Road Sardar Pura Karol Bagh New Delhi', 'Rs 3759', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '1.28 km', 'Window Ac ', '7m  x  6 .9m', 'Cafe Breakfast ( Tea & Tost)', '', '', '', '24 hr Room Service', '', '', ''),
(43, '3', 'HOTEL JYOTI MAHAL ', 'Mistu Mistry', 'mituburt@lunchpod.com', '(+91) 8222688921', '45 ML Shanti Pura Paharganj New Delhi', 'Rs 3799', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '1.05 km', 'Central Ac', '8.4m  x  8.7m', 'American Breakfast (Omlet & Butter N Bread)', '', '', '', '', 'Gym', '', ''),
(44, '3', 'HOTEL LODHI PLAZA', 'Aakash Awasthi', 'marcellahendrix@gology.com', '(+91) 9313530606', 'S-549A, Third Floor, Panchsheel Park, 110017 New Delhi, India', 'Rs 3859', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '1.28 km', 'Window Ac ', '7m  x  6 .9m', 'Cafe Breakfast ( Tea & Tost)', '', '', '', '', '', 'Pool', ''),
(45, '3', 'HOTEL ROHIT PARK PLAZA ', 'Donaldson Woods', 'awasthi@jamnation.com', '(+91) 9862291100', 'CP 120 Connaught Place New Delhi', 'Rs 3899', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '1.05 km', 'Central Ac', '8.4m  x  8.7m', 'American Breakfast (Omlet & Butter N Bread)', '', '', '', '', '', '', 'Spa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) NOT NULL,
  `user_id` varchar(5) NOT NULL,
  `name` varchar(16) NOT NULL,
  `nohpp` varchar(10) NOT NULL,
  `total_exp_time` varchar(10) NOT NULL,
  `time_each_page` varchar(200) NOT NULL,
  `selected_hotel_id` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `price_range_change` int(11) NOT NULL,
  `nohpp_change` int(11) NOT NULL,
  `hotel_count` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `change_filter_table`
--
ALTER TABLE `change_filter_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_data`
--
ALTER TABLE `hotel_data`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `change_filter_table`
--
ALTER TABLE `change_filter_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hotel_data`
--
ALTER TABLE `hotel_data`
  MODIFY `serial_no` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
