-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2018 at 12:21 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ita`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(1, 'men'),
(2, 'women'),
(3, 'books'),
(4, 'gadgets'),
(5, 'sports');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `email`, `pid`, `pname`, `price`, `quantity`, `total`, `address`, `date`) VALUES
(2, 'Shiva Achar', 'shiva111@gmail.com', '12 ', 'Levis Blue Shirt', 1500, 3, 4500, '#34, 5th Cross, Malleshwaram, Bangalore - 01', '2018-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `category` int(11) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `price` bigint(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `info` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`category`, `pid`, `pname`, `price`, `image`, `info`) VALUES
(1, '11', 'Levis White Shirt', 1000, 'levis_white.jpg', 'Pure Cotton White Shirt by Levis. Limited edition summer wear. '),
(1, '110', 'Adidas Red Shirt', 1100, 'adidas_red.jpg', 'Dri-Fit D-Rose T shirt by Adidas. Available in S,M,L,XL,XX'),
(1, '111', 'Under Armour Blue Shirt', 1000, 'ua_blue.jpg', 'High quality cotton T shirt by Under Armour. Available in S,M,L,XL,XXL'),
(1, '112', 'US Polo Yellow Shirt', 1500, 'uspolo_yellow.jpg', 'High quality cotton T shirt by US Polo. Available in S,M,L,XL,XXL'),
(1, '113', 'Levis Blue Jeans', 900, 'levis_bluepant.jpg', 'Comfortable and durable jeans by Levis. Made of tough fabric which doesn’t tear easily'),
(1, '114', 'Levis Black Jeans', 900, 'levis_blackpant.jpg', 'Comfortable and durable jeans by Levis. Made of tough fabric which doesn’t tear easily'),
(1, '115', 'Flying Machine Blue Jeans', 1300, 'fm_bluepant.jpeg', 'Comfortable and durable jeans by Flying Machine. Made of tough fabric which doesn’t tear easily'),
(1, '12', 'Levis Blue Shirt', 1500, 'levis_blue.jpeg', 'Experience the luxury of pure cotton by wearing the all new Levis Blue Shirt'),
(1, '13', 'Levis Red Shirt', 1200, 'levis_red.jpg', 'High quality Levis red shirt. Look charm and energitic'),
(1, '14', 'Adidas Brown Shirt', 2000, 'adidas_brown.jpg', 'Pure cotton Adidas limited edition brown shirt. Grab now to give a sporting look to your casuals '),
(1, '15', 'Roadster Brown Shirt', 1700, 'roadster_brown.jpg', 'High quality Roadster brown shirt, finely weaved to fit real men '),
(1, '16', 'Levis Black Shirt', 1500, 'levis_black.jpg', 'All new Levis black shirt. Wear it and look professional and classic'),
(1, '17', 'Nike Blue Shirt', 1200, 'nike_blue.jpg', 'High quality cotton T shirt by Nike. Available in S,M,L,XL,XXL'),
(1, '18', 'Nike Yellow Shirt', 1000, 'nike_yellow.jpg', 'High quality cotton T shirt by Nike. Available in S,M,L,XL,XXL'),
(1, '19', 'Under Armour Grey Shirt', 1400, 'ua_grey.jpg', 'High quality synthetic T shirt by Under Armour. Available in S,M,L,XL,XXL'),
(2, '21', 'Soch Kurta', 1200, 'soch_kurta1.jpg', 'Stylish kurta by Soch. Available in S, M, L, XL, XXL'),
(2, '210', 'Shree leggings', 450, 'shree_leggings.jpg', 'A pair of mustard yellow knitted churidar leggings, has an elasticated waistband'),
(2, '211', 'plusS Olive Green Solid Top', 800, 'pluss_top.jpg', 'Olive green solid knitted regular top, has a round neck, three-quarter sleeves, button closure, has tie-up detail'),
(2, '212', 'Imara Yellow Printed Top', 780, 'imara_top.jpg', 'Yellow printed woven top, has a round neck, short sleeves, button closure'),
(2, '213', 'Biba Lehenga Dupatta', 4000, 'biba_lehenga.jpg', 'Green and golden embellished lehenga choli with dupatta\r\nGreen embroidered choli, has a round neck, sleeveless, a full hook-and-eye placket on the back, beaded detail.'),
(2, '214', 'Yellow Lehenga Choli Dupatta', 1580, 'yellow_lehenga.jpg', 'Green and orange printed lehenga choli with dupatta\r\nOrange printed flared lehenga, has an elasticated waistband with a concealed zip closure on one side, lace trim along the hem, an attached lining.'),
(2, '215', 'RARE Blouson Top', 600, 'rare_top.jpg', 'Off-white, peach-coloured and navy printed woven blouson top with pleated detail, has a round neck, sleeveless, elasticated hem, and a cut-out detail on the back'),
(2, '22', 'Soch Saree', 1700, 'soch_saree.jpg', 'Stylish and elegant saree by Soch. Comes with blouse piece'),
(2, '23', 'Soch Pink Salwar', 1200, 'soch_pink.jpg', 'Stylish Salwar by Soch. Available in S, M, L, XL, XXL'),
(2, '24', 'Soch Black Salwar', 1500, 'soch_black.jpg', 'Stylish kurta by Soch. Available in S, M, L, XL, XXL'),
(2, '25', 'Libas Grey Straight Kurta', 1200, 'libas_grey.jpg', 'Grey and navy printed straight kurta, has a round neck, three-quarter sleeves, straight hem, side slits'),
(2, '26', 'Libas Blue Straight Kurta', 1750, 'libas_blue.jpg', 'Navy solid straight kurta, has a round neck, short sleeves, curved hem'),
(2, '27', 'Mimosa Saree', 1780, 'mimosa_saree.jpg', 'Navy blue Kanjeevaram woven design saree, has a zari border'),
(2, '28', 'Chennai Silks Saree', 4500, 'cs_saree.jpg', 'Beige woven design saree, has a zari border'),
(2, '29', 'Panit leggings', 400, 'panit_leggings.jpg', 'Red knitted churidar leggings, has an elasticated waistband'),
(3, '31', 'A Century is not Enough: My Roller-coaster Ride to Success', 450, 'sg_book.jpg', 'Sourav Ganguly’s autobiography. A must read.'),
(3, '32', 'Imperfect', 450, 'sanj_manj.jpg', 'Sanjay Manjrekar’s autobiography. Available in hard bound also.'),
(3, '33', 'Exam Warriors by Narendra Modi', 300, 'exam_warriors.jpg', 'Exam Warriors by Narendra Modi is an inspiring book for the youth. Written in a fun and interactive style, with illustrations, activities and yoga exercises, this book will be a friend not only in acing exams but also in facing life.'),
(3, '34', 'Ramayana', 600, 'ramayana.jpg', 'One of India’s greatest epics, the Ramayana pervades the country’s moral and cultural consciousness. Believed to have been composed by V?lm?ki sometime between the eighth and sixth centuries BC, it recounts the tragic and magical tale of R?ma, the wrongfully exiled prince of Ayodhy?, an incarnation of the god Vi??u, born to rid the earth of the terrible demon R?va?a.'),
(3, '35', 'Mahabharatha Vol. 1, 2, 3', 1990, 'mahabharatha.jpg', 'Veda Vyasa legendary epic needs no introduction. The Mahabharata is a story of brotherhood, deceit, love and sacrifice. It is also the setting for The Gita, Lord Krishnas discourse on dharma.'),
(3, '36', 'Heroes of the Valley', 325, 'hotv.jpg', 'Jonathan Stroud has created an epic saga with a funny, unique spin, and an unforgettable anti-hero.'),
(3, '37', 'How I Braved Anu Aunty & Co-Founded a Million Dollar Company', 399, 'how_i.jpg', 'Published on 1st April, 2012, How I Braved Anu Aunty & Co-Founded A Million Dollar Company can be purchased in paperback. What is most interesting about this story is the beautiful portrayal of the authors real-life struggle and success in the entrepreneurial world.'),
(3, '38', 'A Wasted Hour', 420, 'ja_awh.jpg', 'Taken from his collection Tell Tale, A Wasted Hour is an ingenious and witty short story sure to delight Jeffrey Archers many fans and proves why the Mail on Sunday has said that he is probably the greatest storyteller of our age..'),
(3, '39', 'The Alchemist', 350, 'alchemist.jpg', 'This story, dazzling in its powerful simplicity and inspiring wisdom, is about an Andalusian shepherd boy named Santiago who travels from his homeland in Spain to the Egyptian desert in search of a treasure buried in the Pyramids. Along the way he meets a Gypsy woman, a man who calls himself'),
(4, '41', 'Sennheiser CX 275 S In -Ear Headphones', 899, 'senn_ear.jpg', 'Premium comfort - ear adaptors in different sizes for excellent ear canal fit and ambient noise attenuation'),
(4, '410', 'Sony Vaio Laptop', 69999, 'sony_vaio.jpg', 'Intel Core i5-6200U (3MB Cache, up to 2.80GHz). 8GB Memory. 128GB SATA SSD. 13.3\" Full HD (1920x1080) Display. Approx. 2.34 lbs..1 Year Manufacturer Warranty'),
(4, '411', 'Lenovo Yoga Laptop', 32999, 'lenovo_yoga.jpg', '1.1GHz Intel Pentium N4200 processor. 4GB DDR3 RAM.1TB hard drive. 11.6-inch screen, Intel HD Graphics'),
(4, '412', 'Dell Inspiron Laptop', 70999, 'dell_inspiron.jpg', 'Up to 3.5GHz Intel Core i5-7300HQ 7th Gen processor. 8GB DDR4 RAM. 1TB 5400rpm hard drive. 15.6-inch screen, Nvidia GeForce GTX 1050 4GB Graphics'),
(4, '413', 'Redragon Gaming Mouse', 749, 'red_mouse.jpg', 'Adjustable up to 2000/3200DPI 4000 FPS 15G acceleration and an Avago sensor Omron micro switches.6 buttons and an 8-piece weight tuning set (2.4g x 8)'),
(4, '414', 'Cosmic Byte Gaming Keyboard', 899, 'cosmic_keyboard.jpg', 'Backlight: Red Backlit, 4 Levels of Brightness Adjustment. Anti-Ghosting: 19 Anti-ghosting Keys. Scratch Resistant Keys: Easy to clean keys'),
(4, '415', 'DragonWar Gaming Mouse', 899, 'dragon_mouse.jpg', 'High-speed USB 2.0 PC connectivity. Gaming mouse with 6 control buttons. Mouse Cable Length 1.8 meters. Suitable for almost every surface. Ergonomic Design for professional gamer'),
(4, '42', 'JBL C100SI In-Ear Headphones', 749, 'jbl_ear.jpg', 'JBL Signature Sound.Lightweight and comfortable.One-button universal remote with mic'),
(4, '43', 'Philips SHE1350 In-Ear Headphones', 199, 'philips_ear.jpg', 'Bass beat vents allow air movement for better sound with a deep rich bass. Small enough for optimum wearing comfort and big enough to deliver crisp, non-distorted sound'),
(4, '44', 'JBL GO Bluetooth Speaker', 1749, 'jbl_speaker.jpg', 'Great sound and small form factor. Rechargeable Battery With Up to five hour playtime'),
(4, '45', 'Sony SRS-XB10 EXTRA BASS Bluetooth Speaker', 3249, 'sony_speaker.jpg', 'Extra bass for deep and punchy sound. One-touch listening with NFC and Bluetooth. Up to 16 hours of battery life for longer listening hours'),
(4, '46', 'Bose SoundLink Color II Bluetooth Speaker', 9199, 'bose_speaker.jpg', 'Innovative Bose technology packs bold sound into a small, water-resistant speaker. Up to 8 hours of playtime.'),
(4, '47', 'SanDisk Cruzer Blade USB 2.0 Pen Drive', 399, 'sandisk_pen.jpg', 'Compact Design for Maximum Portability. Store more with capacities up to 16gb 5-year limited warranty.'),
(4, '48', 'Seagate 1 TB External Hard Disk', 3899, 'seagate_hdd.jpg', 'Quick file transfer with USB 3.0 connectivity.Dimensions(L x W x H mm)-114,5 x 76 x 20,35 mm. Works interchangeably on PC and Mac computers-without needing to reformat'),
(4, '49', 'Samsung 32GB MicroSD Card', 799, 'samsung_sd.jpg', 'Record and play full HD video - with ultra-fast read and write speeds up to 95mbps and 20mbps respectively, the 32GB Evo Plus lets you transfer a 3GB video to your notebook in just 38 seconds'),
(5, '51', 'Adidas Football', 3000, 'adidas_football.jpg', 'quality ball with outer Material: Butylene (100%), Thermoplastic Polyurethane (100%)'),
(5, '510', 'Puma studs', 1500, 'football_studs.jpg', 'High tear resistance shoes with light weight'),
(5, '511', 'Bayern Munich jersey', 6000, 'bayern_munich_jersey.jpg', 'High quality cotton t-shirt by adidas, available size:L,M,S'),
(5, '512', 'Leather ball set', 1600, 'cric_leather_ball.jpg', 'Smooth surface quality leather ball'),
(5, '513', 'Running shoes', 1000, 'running_light.jpg', 'soft running material shoes with better grip'),
(5, '514', 'Sneakers', 300, 'sneakers.jpeg', 'black sneakers with grippy sole'),
(5, '52', 'Barcelona Home Jersey', 5500, 'barcelona_jersey.jpg', 'High quality cotton T shirt by Nike. Available in S,M,L,XL,XXL'),
(5, '53', 'Baseball bat', 1000, 'baseball_bat.jpg', 'Top quality wood easton bat'),
(5, '54', 'Basketball', 800, 'basket_ball.jpg', 'Rubber outer material and built for max output'),
(5, '55', 'Puma Football', 2500, 'puma_football.jpg', 'Quality material light ball'),
(5, '56', 'Kookabura bat', 800, 'kookabura_bat.jpeg', 'light weight bat made with quality wood'),
(5, '57', 'Home workouts', 18000, 'home_workout_equipment.jpeg', 'Sport Type: Home Gym Ideal For: Junior, Senior,Color: Multicolor'),
(5, '58', 'Adidas Hockey stick', 1300, 'hockey_stick_adidas.jpg', 'Adidas Practice Field Hockey Sticks Hockey Stick - 36 inch  (Green)'),
(5, '59', 'Chess', 400, 'chess.jpg', 'Glossy surface with metal shiny pieces');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `rid` int(11) NOT NULL,
  `pid` varchar(30) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `review` text NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rid`, `pid`, `pname`, `username`, `email`, `review`, `ip`) VALUES
(1, '12', 'Levis Blue Shirt', 'shiva', 'shiva@gmail.com', 'good\r\nawesome\r\nvery nice\r\nsfdadsg\r\nsdagv\r\nsdg\r\nsdtret\r\nyreahgba\r\near\r\ngretyreyery\r\neryt\r\nreytert\r\nreyethfd\r\ngyreayreayreayreygfagreat\r\net\r\nerwtreay\r\nery\r\nreyre', '10.100.34.54'),
(2, '12', 'Levis Blue Shirt', 'dodda', 'dodda@gmail.com', 'bad\r\nnot at all good\r\nvery costly', '10.100.34.56'),
(3, '12', '	\r\nLevis Blue Shirt', 'pdp', 'gana@gmail.com', 'fsdf\r\nsdf\r\nsdf\r\ndsf\r\nsdf\r\nsdf\r\nsdf\r\nsdf\r\nsdf\r\nsdferwtewEWgg\r\n\r\newtgwetwet\r\nwer\r\newrwe\r\n\r\new\r\nr\r\newtrewt\r\nwe\r\nt\r\newt\r\n\r\new\r\n\r\ne\r\nt\r\ne\r\nwt\r\newt\r\newtrewtew\r\n\r\n\r\n\r\newt\r\newtewtewr', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `phone`, `address`) VALUES
('Shiva Achar', 'shiva111@gmail.com', 'shiva111', '8578439767', '#34, 5th Cross, Malleshwaram, Bangalore - 01'),
('Shivananda D', 'shiva199@gmail.com', 'shivananda', '1234512345', 'Gandhi Circle, CRPatna - 573116');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `email` (`email`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
