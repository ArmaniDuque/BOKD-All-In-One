-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 07:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lamareamenu`
--

-- --------------------------------------------------------

--
-- Table structure for table `posmenu`
--

CREATE TABLE `posmenu` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `price1` varchar(250) NOT NULL,
  `categoryid` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `subcategoryid` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posmenu`
--

INSERT INTO `posmenu` (`id`, `name`, `description`, `price`, `price1`, `categoryid`, `status`, `subcategoryid`) VALUES
(1, 'Kahlúa', '', 'P 250.00', 'P 4,500.00', '1', '', '1'),
(2, 'Campari Bitter', '', 'P 210.00', 'P 4,200.00', '1', '', '1'),
(3, 'Martini Dry', '', 'P 300.00', '', '1', '', '1'),
(4, 'Martini Sweet', '', 'P 650.00', '', '1', '', '1'),
(5, 'Glenfiddich', '', 'P 650.00', 'P 13,000.00', '3', '', '3'),
(6, 'Chivas Regal', '', 'P 450.00', 'P 8,200.00', '3', '', '3'),
(7, 'Johnnie Walker Swing', '', 'P 300.00', 'P 5,100.00', '3', '', '3'),
(8, 'Johnnie Walker Black', '', 'P 320.00', 'P 7,900.00', '3', '', '3'),
(9, 'John Jameson', '', 'P 350.00', 'P 7,500.00', '3', '', '3'),
(10, 'Jack Daniel\'s', '', 'P 400.00', 'P 7,800.00', '3', '', '3'),
(11, 'Jim Beam', '', 'P 220.00', 'P 4,500.00', '3', '', '3'),
(12, 'Stolichnaya', '', 'P 280.00', 'P 5,100.00', '4', '', '4'),
(13, 'Absolut Blue', '', 'P 290.00', 'P 4,200.00', '4', '', '4'),
(14, 'Absolut Citron', '', 'P 290.00', 'P 5,100.00', '4', '', '4'),
(15, 'Absolut Kurant', '', 'P 290.00', 'P 5,100.00', '4', '', '4'),
(16, 'Fortant de France Chardonnay South France 2017 187 ml', '', 'P 750.00', '', '5', '', '5'),
(17, 'Fortant de France Cabernet Sauvignon South France 2017 187 ml', '', 'P 750.00', '', '5', '', '5'),
(18, 'Malibu', '', 'P 250.00', 'P 4,500.00', '6', '', '6'),
(19, 'Bacardi Silver', '', 'P 250.00', 'P 3,600.00', '6', '', '6'),
(20, 'Bacardi Gold', '', 'P 250.00', 'P 2,800.00', '6', '', '6'),
(21, 'Tanduay', '', 'P 150.00', 'P 1,250.00', '6', '', '6'),
(22, 'Louis Chatel Chardonnay Sable de Camargue USA 2012', '', 'P 2,800.00', '', '7', '', '7'),
(23, 'Woodbridge Sauvignon Blanc California USA 2012 750 ml', '', 'P 2,950.00', '', '7', '', '7'),
(24, 'Jose Cuervo Gold', '', 'P 290.00', 'P 5,800.00', '8', '', '8'),
(25, '', '', '', '', '', '', ''),
(26, 'Hennessy XO', '', 'P 1,100.00', 'P 25,000.00', '9', '', '9'),
(27, 'Remy Martin', '', 'P 700.00', 'P 13,500.00', '9', '', '9'),
(28, 'Carlos I', '', 'P 750.00', 'P 11,500.00', '9', '', '9'),
(29, 'Louis Chatel Cabernet Sauvignon ', 'Sable de Camargue France 2013 750 ml', 'P 2,800.00', '', '10', '', '10'),
(30, 'Woodbridge Cabernet Sauvignon ', 'California USA 2012 750 ml', 'P 2,950.00', '', '10', '', '10'),
(31, 'Beringer Cabernet Sauvignon ', 'California USA 2014 750 ml', 'P 2,700.00', '', '10', '', '10'),
(32, 'Tanqueray', '', 'P 5,500.00', '', '11', '', '11'),
(33, 'Beefeater', '', 'P 4,500.00', '', '11', '', '11'),
(34, 'Gilbey\'s', '', 'P 2,800.00', '', '11', '', '11'),
(35, 'BLT', 'Bacon, Lettuce, and Tomato', 'P 490.00', '', '12', '', '12'),
(36, 'Chili-Cheese Dog', 'Mayo Mustard, Chili Con Carne, Cilantro Tomato Salsa', 'P 390.00', '', '12', '', '12'),
(37, 'Club Sandwich', 'Wheat Bread, Grilled Chicken, Bacon, and Eggs', 'P 510.00', '', '12', '', '12'),
(38, 'Grilled Cheeseburger', 'Pure Beef Sirloin Patty Caramelized Onions, Tomatoes, and Melted Cheddar Cheese', 'P 470.00', '', '12', '', '12'),
(39, 'Grilled Cheese Sandwich', 'Mozzarella and Cheddar', 'P 290.00', '', '12', '', '12'),
(40, 'Hotdog Sandwich', '', 'P 250.00', '', '12', '', '12'),
(41, 'Baked Mac and Cheese', 'Fusilli Pasta in Creamy Cheese Sauce and Crispy Bacon Bits', 'P 250.00', '', '13', '', '13'),
(42, 'Cheesy Fries', '', 'P 250.00', '', '13', '', '13'),
(43, 'Chick\'N Fries', '', 'P 410.00', '', '13', '', '13'),
(44, 'Chicken and Spaghetti', 'Breaded Chicken Fillet, Spaghetti Pasta in Sweet Blend Tomato and Meat Sauce', 'P 420.00', '', '13', '', '13'),
(45, 'Crispy Fried Chicken', '1-pc Chicken served with Buttered Vegetables and Rice', 'P 280.00', '', '13', '', '13'),
(46, 'Hotdog on Stick', '', 'P 150.00', '', '13', '', '13'),
(47, 'Kiddie Spaghetti', 'In Sweet Blend Meat Sauce', 'P 260.00', '', '13', '', '13'),
(48, 'Coke', '', 'P 170.00', '', '14', '', '14'),
(49, 'Coke Light', '', 'P 170.00', '', '14', '', '14'),
(50, 'Coke Zero', '', 'P 170.00', '', '14', '', '14'),
(51, 'Sprite', '', 'P 170.00', '', '14', '', '14'),
(52, 'Royal', '', 'P 290.00', '', '14', '', '14'),
(53, 'Soda Water', '', 'P 290.00', '', '14', '', '14'),
(54, 'Tonic Water', '', 'P 80.00', '', '14', '', '14'),
(55, 'Bottled Water', '', 'P 170.00', '', '14', '', '14'),
(56, 'Pineapple Juice', '', 'P 130.00', '', '14', '', '14'),
(57, 'La Marea Iced Tea', '', 'P 130.00', '', '14', '', '14'),
(58, 'Coconut', '', 'P 200.00', '', '15', '', '15'),
(59, 'Watermelon', '', 'P 220.00', '', '15', '', '15'),
(60, 'Pineapple', '', 'P 200.00', '', '15', '', '15'),
(61, 'Ripe Mango', '', 'P 280.00', '', '15', '', '15'),
(62, 'Green Mango', '', 'P 250.00', '', '15', '', '15'),
(63, 'Banana', '', 'P 220.00', '', '15', '', '15'),
(64, 'Apple', '', 'P 250.00', '', '15', '', '15'),
(65, 'Cucumber', '', 'P 220.00', '', '15', '', '15'),
(66, 'Calamansi', '', 'P 190.00', '', '15', '', '15'),
(67, 'Add Milk', '', 'P 30.00', '', '15', '', '15'),
(68, 'Add Honey', '', 'P 30.00', '', '15', '', '15'),
(69, 'Espresso', '', 'P 150.00', '', '16', '', '16'),
(70, 'Café Affogato', '', 'P 180.00', '', '16', '', '16'),
(71, 'Americano', '', 'P 150.00', '', '16', '', '16'),
(72, 'Café Latte', '', 'P 180.00', '', '16', '', '16'),
(73, 'Cappuccino', '', 'P 180.00', '', '16', '', '16'),
(74, 'Mocha Latte', '', 'P 250.00', '', '16', '', '16'),
(75, 'White Chocolate Latte', '', 'P 250.00', '', '16', '', '16'),
(76, 'Caramel Latte', '', 'P 250.00', '', '16', '', '16'),
(77, 'Hazelnut Latte', '', 'P 250.00', '', '16', '', '16'),
(78, 'Raspberry Latte', '', 'P 250.00', '', '16', '', '16'),
(79, 'Matcha Green Tea Latte', '', 'P 200.00', '', '16', '', '16'),
(80, 'Flavored Tea', '', 'P 150.00', '', '16', '', '16'),
(81, 'Hot Chocolate', '', 'P 180.00', '', '16', '', '16'),
(82, 'San Miguel Pale Pilsen', '', 'P 170.00', '', '17', '', '17'),
(83, 'San Miguel Light', '', 'P 170.00', '', '17', '', '17'),
(84, 'San Miguel Super Dry', '', 'P 190.00', '', '17', '', '17'),
(85, 'Red Horse', '', 'P 190.00', '', '17', '', '17'),
(86, 'Daiquiri', '', 'P 210.00', '', '18', '', '18'),
(87, 'Irish Coffee', '', 'P 350.00', '', '18', '', '18'),
(88, 'Kamikaze', '', 'P 350.00', '', '18', '', '18'),
(89, 'Long Island Iced Tea', '', 'P 380.00', '', '18', '', '18'),
(90, 'Mai Tai', '', 'P 350.00', '', '18', '', '18'),
(91, 'Margarita', '', 'P 260.00', '', '18', '', '18'),
(92, 'Mojito', '', 'P 390.00', '', '18', '', '18'),
(93, 'Blue Margarita', '', 'P 350.00', '', '18', '', '18'),
(94, 'Piña Colada', '', 'P 290.00', '', '18', '', '18'),
(95, 'Screwdriver', '', 'P 290.00', '', '18', '', '18'),
(96, 'Tequila Sunrise', '', 'P 290.00', '', '18', '', '18'),
(97, 'Black Russian', '', 'P 350.00', '', '18', '', '18'),
(98, 'White Russian', '', 'P 350.00', '', '18', '', '18'),
(99, 'Rum Coke', '', 'P 260.00', '', '18', '', '18'),
(100, 'Gin Tonic', '', 'P 320.00', '', '18', '', '18'),
(101, 'Vodka Tonic', '', 'P 320.00', '', '18', '', '18'),
(102, 'Montemar\'s Beach Vibe', '', 'P 250.00', '', '18', '', '18'),
(103, 'Shirley Temple', '', 'P 210.00', '', '19', '', '19'),
(104, 'Virgin Mojito', '', 'P 210.00', '', '19', '', '19'),
(105, 'Four Seasons', '', 'P 210.00', '', '19', '', '19'),
(106, 'Pine-Cucumber Cooler', '', 'P 210.00', '', '19', '', '19'),
(107, 'Vanilla Milkshake', '', 'P 350.00', '', '20', '', '20'),
(108, 'Chocolate Milkshake', '', 'P 350.00', '', '20', '', '20'),
(109, 'Ube Milkshake', '', 'P 350.00', '', '20', '', '20'),
(110, 'Iced Latte', '', 'P 200.00', '', '21', '', '21'),
(111, 'Iced Americano', '', 'P 150.00', '', '21', '', '21'),
(112, 'Iced Mocha Latte', '', 'P 250.00', '', '21', '', '21'),
(113, 'Iced White Chocolate Latte', '', 'P 250.00', '', '21', '', '21'),
(114, 'Iced Caramel Latte', '', 'P 250.00', '', '21', '', '21'),
(115, 'Iced Hazelnut Latte', '', 'P 250.00', '', '21', '', '21'),
(116, 'Iced Raspberry Latte', '', 'P 250.00', '', '21', '', '21'),
(117, 'Iced Matcha Green Tea', '', 'P 250.00', '', '21', '', '21'),
(118, 'Iced Chocolate', '', 'P 250.00', '', '21', '', '21'),
(119, 'Omelet Plain', '', 'P 280.00', '', '22', '', '22'),
(120, 'Omelet Spanish', '', 'P 280.00', '', '22', '', '22'),
(121, 'Omelet Onions and Tomatoes', '', 'P 280.00', '', '22', '', '22'),
(122, 'Two Eggs', 'Scrambled, Boiled, Sunny-Side Up or done your way', 'P 120.00', '', '22', '', '22'),
(123, 'Adobo Flakes (Two Eggs)', '', 'P 220.00', '', '22', '', '22'),
(124, 'Bacon (Two Eggs)', '', 'P 250.00', '', '22', '', '22'),
(125, 'Beef Franks (Two Eggs)', '', 'P 260.00', '', '22', '', '22'),
(126, 'Corned Beef Hash (Two Eggs)', '', 'P 210.00', '', '22', '', '22'),
(127, 'Daing na Bangus (Two Eggs)', '', 'P 320.00', '', '22', '', '22'),
(128, 'Daing na Kapak (Two Eggs)', '', 'P 250.00', '', '22', '', '22'),
(129, 'Ham (Two Eggs)', '', 'P 210.00', '', '22', '', '22'),
(130, 'Hungarian Sausage (Two Eggs)', '', 'P 210.00', '', '22', '', '22'),
(131, 'Pork Longganisa (Two Eggs)', '', 'P 210.00', '', '22', '', '22'),
(132, 'Pork Tocino (Two Eggs)', '', 'P 210.00', '', '22', '', '22'),
(133, 'Tinapang Galunggong (Two Eggs)', '', 'P 210.00', '', '22', '', '22'),
(134, 'Tinapang Kapak (Two Eggs)', '', 'P 210.00', '', '22', '', '22'),
(135, 'Tuyo (Two Eggs)', '', 'P 210.00', '', '22', '', '22'),
(136, 'Paella La Marea', 'Saffron-infused Arborio rice, Seafoods, Chicken, Pork, Chorizo', 'P 2,750.00', '', '23', '', '23'),
(137, 'Paella Negra', 'Served with Garlic Aioli', 'P 2,250.00', '', '23', '', '23'),
(138, 'Banana Split', '', 'P 320.00', '', '24', '', '24'),
(139, 'Baked Cheesecake Whole', 'Choice of toppings Strawberry or Blueberry', 'P 2,850.00', '', '24', '', '24'),
(140, 'Baked Cheesecake Slice', 'Choice of toppings Strawberry or Blueberry', 'P 380.00', '', '24', '', '24'),
(141, 'Halo-Halo', '', 'P 250.00', '', '24', '', '24'),
(142, 'Leche Flan', '', 'P 150.00', '', '24', '', '24'),
(143, 'Moist Chocolate Cake Whole', '', 'P 1,900.00', '', '24', '', '24'),
(144, 'Moist Chocolate Cake Slice', '', 'P 280.00', '', '24', '', '24'),
(145, 'Turon de Leche Flan', 'Deep-fried Leche Flan wrapped in Spring Roll wrapper served with Butterscotch Sauce', 'P 210.00', '', '24', '', '24'),
(146, 'Crispy Pork Binagoongan', 'Pork Belly, Fried Eggplant, Water Spinach in homemade Shrimp Paste', 'P 520.00', '', '25', '', '25'),
(147, 'Oven-Baked Crispy Pata', 'Crispy Pork Knuckles served with Pickled Green Papaya', 'P 1,050.00', '', '25', '', '25'),
(148, 'Oven-Baked Lechon Kawali', 'Pork Belly served with Pickled Green Papaya', 'P 550.00', '', '25', '', '25'),
(149, 'Beef Caldereta', 'Stewed Beef Sirloin in Tomato Sauce Liver Spread, Carrots, Potatoes', 'P 790.00', '', '26', '', '26'),
(150, 'Beef Steak Tagalog', 'Thinly sliced Beef Tenderloin Braised in Soy Sauce and Calamansi', 'P 790.00', '', '26', '', '26'),
(151, 'Bulalong Baka', 'Beef Marrow Soup', 'P 810.00', '', '26', '', '26'),
(152, 'Crispy Tadyang ng Baka', 'Deep-Fried Beef Short Ribs served with Pickled Papaya and Soy Ginger Sauce', 'P 750.00', '', '26', '', '26'),
(153, 'Kare-Kare', 'Ox Tail, Ox Tripe, Sirloin, Vegetables in Peanut Sauce served with homemade Shrimp Paste', 'P 1,150.00', '', '26', '', '26'),
(154, 'Chicken Inasal', 'Served with Steamed Local Vegetables, Pickled Green Papaya and Home-made Shrimp Paste', 'P 720.00', '', '27', '', '27'),
(155, 'Montemar\'s Best BBQ per stick', '', 'P 110.00', '', '27', '', '27'),
(156, 'Montemar\'s Best BBQ 3 pieces', '', 'P 500.00', '', '27', '', '27'),
(157, 'Pork Liempo (From the Grill)', '', 'P 580.00', '', '27', '', '27'),
(158, 'Prawns (From the Grill)', '', 'P 950.00', '', '27', '', '27'),
(159, 'Stuffed Bangus (From the Grill)', '', 'P 690.00', '', '27', '', '27'),
(160, 'Stuffed Squid (From the Grill)', '', 'P 850.00', '', '27', '', '27'),
(161, 'Tanigue Steak (From the Grill)', '', 'P 750.00', '', '27', '', '27'),
(162, 'Bangus Belly (Sinigang)', 'Tamarind-based Soup', 'P 790.00', '', '28', '', '28'),
(163, 'Lechon Kawali (Sinigang)', 'Crispy Pork Belly', 'P 610.00', '', '28', '', '28'),
(164, 'Liempo (Sinigang)', 'Pork Belly', 'P 590.00', '', '28', '', '28'),
(165, 'Sugpo (Sinigang)', 'Prawns', 'P 980.00', '', '28', '', '28'),
(166, 'Tadyang ng Baka (Sinigang)', 'Beef Ribs', 'P 960.00', '', '28', '', '28'),
(167, 'Bangus ala Pobre', 'Milkfish Belly Sautéed in Garlic-infused Olive Oil', 'P 820.00', '', '29', '', '29'),
(168, 'Crispy Bangus Belly', 'Served with Pickled Green Papaya', 'P 790.00', '', '29', '', '29'),
(169, 'Seafood Kare-Kare', 'Local Vegetables Stewed in Peanut Sauce served with homemade Shrimp Paste', 'P 1,150.00', '', '29', '', '29'),
(170, 'Chicken Binakol', 'Chicken cooked in Fresh Buko Juice, Coconut Meat, Papaya and Ginger', 'P 520.00', '', '29', '', '29'),
(171, 'Chicken Pork Adobo', '', 'P 490.00', '', '30', '', '30'),
(172, 'Chicken Tinola', 'Clear Broth, Ginger, and Lemongrass', 'P 510.00', '', '30', '', '30'),
(173, 'La Marea Fried Chicken Whole', '', 'P 820.00', '', '30', '', '30'),
(174, 'La Marea Fried Chicken Half', '', 'P 480.00', '', '30', '', '30'),
(175, 'La Marea Pork Sisig', 'Crispy Pork Cheeks in homemade Sisig Sauce', 'P 695.00', '', '31', '1', '31'),
(176, 'Asian Beef Salpicao', 'Brazilian Beef Tenderloin in Garlic-Infused Olive Oil', 'P 550.00', '', '31', '0', '31'),
(177, 'Crispy Chicken Wings Buffalo', 'With your choice of sauce: Buffalo', 'P 550.00', '', '31', '', '31'),
(178, 'Crispy Chicken Wings Butter Garlic', 'With your choice of sauce: Butter Garlic', 'P 550.00', '', '31', '', '31'),
(179, 'Crispy Chicken Wings Smokey BBQ', 'With your choice of sauce: Smokey BBQ', 'P 480.00', '', '31', '', '31'),
(180, 'Cheesy Mozzarella Sticks', '', 'P 650.00', '', '31', '', '31'),
(181, 'Gambas al Ajillo', '', 'P 350.00', '', '31', '', '31'),
(182, 'Chicken Noodle Soup', 'Fresh Egg Noodles, Chicken Breast Fillet', 'P 160.00', '', '32', '', '32'),
(183, 'Pumpkin and Moringa', '', 'P 350.00', '', '32', '', '32'),
(184, 'Sotanghon Soup', 'Vermicelli Noodles, Chicken Breast Fillet', 'P 480.00', '', '32', '', '32'),
(185, 'Mango and Crabsticks', 'Mixed Greens in Chive Parmesan Dressing', 'P 550.00', '', '33', '', '33'),
(186, 'Traditional Caesar Salad', 'Crisp Romaine Lettuce, Bacon Bits, Parmesan, Garlic Croutons', 'P 550.00', '', '33', '', '33'),
(187, '', '', '', '', '', '', ''),
(188, 'Bam-I', 'Stir-fried Egg Noodles, Rice Noodles, Shrimps, Pork Liver and Vegetables', 'P 410.00', '', '34', '', '34'),
(189, 'Bihon Guisado', 'Stir-fried Rice Noodles, Shrimps, Pork Liver and Vegetables', 'P 380.00', '', '34', '', '34'),
(190, 'Japchae', 'Sweet Potato Noodles, Sliced Beef, Vegetables in Sweet and Savory Sauce', 'P 420.00', '', '34', '', '34'),
(191, 'Pancit Canton', 'Egg Noodles, Shrimps, Pork Liver and Vegetables', 'P 380.00', '', '35', '', '35'),
(192, 'Chop Suey', 'Sautéed Mixed Vegetables, Shrimp, Pork, and Pork liver', 'P 590.00', '', '35', '', '35'),
(193, 'Ensalada La Marea', 'Steamed Okra, String Beans, Water Spinach, Sweet Potato Tops, Eggplant, Green Mango, Salted Egg, homemade Shrimp Paste', 'P 310.00', '', '35', '', '35'),
(194, 'Ginataang Sitaw at Kalabasa', 'String Beans and Squash cooked in Fresh Coconut Milk, Shrimp, Pork', 'P 410.00', '', '35', '', '35'),
(195, 'Kangkong ala Pobre', 'Sautéed Water Spinach with Toasted Garlic', 'P 210.00', '', '35', '', '35'),
(196, 'Laing', 'Fresh Taro Leaves cooked in Fresh Coconut Milk, Chili Peppers, topped with Crispy Adobo Flakes', 'P 290.00', '', '35', '', '35'),
(197, 'Pak-net (Pinakbet with Crispy Bagnet)', 'Lowland Vegetables cooked in homemade Shrimp Paste, topped with Crispy Bagnet', 'P 590.00', '', '35', '', '35'),
(198, 'American Breakfast', 'Served with Toast, Butter and Pineapple - Mango Jam grilled tomatoes, two (2) eggs done your way: Coffee or Tea', '', '', '35', '', '35'),
(199, 'American Breakfast with Corned Beef Hash', 'Served with Toast, Butter and Pineapple - Mango Jam grilled tomatoes, two (2) eggs done your way: Coffee or Tea. Choice of: Corned Beef Hash', 'P 650.00', '', '36', '', '36'),
(200, 'American Breakfast with Pan Seared Ham', 'Served with Toast, Butter and Pineapple - Mango Jam grilled tomatoes, two (2) eggs done your way: Coffee or Tea. Choice of: Pan seared Ham', 'P 650.00', '', '36', '', '36'),
(201, 'American Breakfast with Bacon', 'Served with Toast, Butter and Pineapple - Mango Jam grilled tomatoes, two (2) eggs done your way: Coffee or Tea. Choice of: Bacon', 'P 650.00', '', '36', '', '36'),
(202, 'American Breakfast with Hungarian Sausage', 'Served with Toast, Butter and Pineapple - Mango Jam grilled tomatoes, two (2) eggs done your way: Coffee or Tea. Choice of: Hungarian Sausage', 'P 650.00', '', '36', '', '36'),
(203, 'Continental Breakfast', 'Served with Butter, Pineapple - Mango Jam, Fresh Fruit Cuts, Oatmeal or Cereals, Coffee or Tea', '', '', '36', '', '36'),
(204, 'Continental Breakfast with Oatmeal', 'Served with Butter, Pineapple - Mango Jam, Fresh Fruit Cuts, Oatmeal or Cereals, Coffee or Tea. Choice of: Oatmeal', 'P 420.00', '', '36', '', '36'),
(205, 'Continental Breakfast with Cereals', 'Served with Butter, Pineapple - Mango Jam, Fresh Fruit Cuts, Oatmeal or Cereals, Coffee or Tea. Choice of: Cereals', 'P 420.00', '', '36', '', '36'),
(206, 'Filipino Breakfast', 'Served with Garlic or Steamed White Rice, Fresh Fruit Cuts, Two (2) eggs done your way: Atchara, Coffee or Tea', '', '', '36', '', '36'),
(207, 'Filipino Breakfast with Pork Tocino', 'Served with Garlic or Steamed White Rice, Fresh Fruit Cuts, Two (2) eggs done your way: Atchara, Coffee or Tea. Choice of: Pork Tocino', 'P 550.00', '', '36', '', '36'),
(208, 'Filipino Breakfast with Longganisa', 'Served with Garlic or Steamed White Rice, Fresh Fruit Cuts, Two (2) eggs done your way: Atchara, Coffee or Tea. Choice of: Longganisa', 'P 550.00', '', '36', '', '36'),
(209, 'Filipino Breakfast with Beef Tapa', 'Served with Garlic or Steamed White Rice, Fresh Fruit Cuts, Two (2) eggs done your way: Atchara, Coffee or Tea. Choice of: Beef Tapa', 'P 680.00', '', '36', '', '36'),
(210, 'Filipino Breakfast with Crispy Adobo Flakes', 'Served with Garlic or Steamed White Rice, Fresh Fruit Cuts, Two (2) eggs done your way: Atchara, Coffee or Tea. Choice of: Crispy Adobo Flakes', 'P 550.00', '', '36', '', '36'),
(211, 'Filipino Breakfast with Daing na Bangus', 'Served with Garlic or Steamed White Rice, Fresh Fruit Cuts, Two (2) eggs done your way: Atchara, Coffee or Tea. Choice of: Daing na Bangus', 'P 550.00', '', '36', '', '36'),
(212, 'Filipino Breakfast with Tinapang Kapak', 'Served with Garlic or Steamed White Rice, Fresh Fruit Cuts, Two (2) eggs done your way: Atchara, Coffee or Tea. Choice of: Tinapang Kapak', 'P 550.00', '', '36', '', '36'),
(213, 'Filipino Breakfast with Tinapang Galunggong', 'Served with Garlic or Steamed White Rice, Fresh Fruit Cuts, Two (2) eggs done your way: Atchara, Coffee or Tea. Choice of: Tinapang Galunggong', 'P 550.00', '', '36', '', '36'),
(214, 'Filipino Breakfast with Crispy Daing na Kapak', 'Served with Garlic or Steamed White Rice, Fresh Fruit Cuts, Two (2) eggs done your way: Atchara, Coffee or Tea. Choice of: Crispy Daing na Kapak', 'P 550.00', '', '36', '', '36'),
(215, 'Filipino Breakfast with Tuyo', 'Served with Garlic or Steamed White Rice, Fresh Fruit Cuts, Two (2) eggs done your way: Atchara, Coffee or Tea. Choice of: Tuyo', 'P 550.00', '', '36', '', '36'),
(216, 'Arroz Caldo', '', 'P 220.00', '', '37', '', '37'),
(217, 'Club Pancake', 'Maple Syrup, Melted Butter, served with Banana Slices', 'P 350.00', '', '37', '', '37'),
(218, 'Champorado with Tuyo', 'Served with Tuyo Flakes, Milk', 'P 220.00', '', '37', '', '37'),
(219, 'French Toast', 'Served with Maple Syrup, Melted Butter', 'P 210.00', '', '37', '', '37'),
(220, 'La Marea Sisig Pizza', '', 'P 650.00', '', '38', '', '38'),
(221, 'Gambas Pizza', '', 'P 695.00', '', '38', '', '38'),
(222, 'Four Cheese Pizza', 'Cheddar, Cream Cheese, Mozzarella, Parmesan', 'P 550.00', '', '38', '', '38'),
(223, 'Garlic Pepperoni Pizza', '', 'P 570.00', '', '38', '', '38'),
(224, 'Hawaiian Pizza', 'Sliced Ham, Bacon, Pineapple, Parmesan cheese', 'P 590.00', '', '38', '', '38'),
(225, 'Margherita Pizza', 'Fresh Tomatoes, Basil, and Mozzarella', 'P 510.00', '', '38', '', '38'),
(226, 'Steak and Cheese Pizza', 'Beef Tenderloin, Caramelized Onions', 'P 720.00', '', '38', '', '38'),
(227, 'Aligue Pasta', 'Spicy Aligue in Olive Oil, Shrimps', 'P 490.00', '', '38', '', '38'),
(228, 'Grilled Chicken Alfredo', 'Fettuccine Pasta with Grilled Chicken breast fillet', 'P 420.00', '', '39', '', '39'),
(229, 'Gourmet Spicy Tuyo Pasta', '', 'P 420.00', '', '39', '', '39'),
(230, 'Bolognese', '', 'P 440.00', '', '39', '', '39'),
(231, 'Carbonara', '', 'P 420.00', '', '39', '', '39'),
(232, 'Spaghetti Garlic Shrimp', '', 'P 480.00', '', '39', '', '39'),
(233, 'Penne Pesto and Chicken', 'Served with Grilled Chicken breast fillet', 'P 450.00', '', '39', '', '39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posmenu`
--
ALTER TABLE `posmenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posmenu`
--
ALTER TABLE `posmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
