-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 02:17 AM
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
-- Database: `allinonedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posusermasterfile`
--

CREATE TABLE `posusermasterfile` (
  `userid` int(11) NOT NULL,
  `userfullname` varchar(200) NOT NULL,
  `useridno` varchar(200) NOT NULL,
  `userposition` varchar(200) NOT NULL,
  `userdepartment` varchar(200) NOT NULL,
  `userjoblevel` varchar(200) NOT NULL,
  `useremploymentstatus` varchar(200) NOT NULL,
  `userareaofassignment` varchar(200) NOT NULL,
  `userdatehired` varchar(200) NOT NULL,
  `usercontact` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `userbirthdate` varchar(200) NOT NULL,
  `userage` varchar(200) NOT NULL,
  `usergender` varchar(200) NOT NULL,
  `usercivilstatus` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `userpassword` varchar(200) NOT NULL,
  `userrole` varchar(200) NOT NULL,
  `userremarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posusermasterfile`
--

INSERT INTO `posusermasterfile` (`userid`, `userfullname`, `useridno`, `userposition`, `userdepartment`, `userjoblevel`, `useremploymentstatus`, `userareaofassignment`, `userdatehired`, `usercontact`, `email`, `userbirthdate`, `userage`, `usergender`, `usercivilstatus`, `username`, `userpassword`, `userrole`, `userremarks`) VALUES
(1001001, 'Aldea, Jurinda', '1234556', 'Outlet Cashier', 'Accounting', 'Rank and File', 'Fixed - Term', '', '', '9123456789', 'Jurinda', '', '30', 'Female', 'Married', 'Jurinda', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', 'test update'),
(1001002, 'Aquino, Angelito Jr. Hipolio', '', 'F&B Inventory Clerk', 'Accounting', 'Rank and File', 'Regular', '', '04/04/2012', '9123456789', 'Angelito', '27/12/1991', '30', 'Male', 'Single', 'Angelito', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001003, 'Baciles, Arlene F.', '', 'Outlet Cashier', 'Accounting', 'Rank and File', 'Fixed - Term', '', '19/06/2019', '9123456789', 'Arlene', '04/10/1997', '30', 'Female', 'Single', 'Arlene', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001004, 'Cunanan, Melba P.', '', 'Purchasing Assistant', 'Accounting', 'Rank and File', 'Regular', '', '23/08/2019', '9123456789', 'Melba', '09/05/1974', '30', 'Female', 'Married', 'Melba', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001005, 'De Pedro, Jocelyn Trindad', '', 'Senior Outlet Cashier', 'Accounting', 'Rank and File', 'Regular', '', '01/10/2000', '9123456789', 'Pedro', '16/01/1978', '30', 'Female', 'Single', 'Pedro', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001006, 'Ellivera, Rina Villablanca', '', 'Outlet Cashier', 'Accounting', 'Rank and File', 'Regular', '', '01/12/2006', '9123456789', 'Rina', '09/08/1985', '30', 'Female', 'Married', 'Rina', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001007, 'Mamangon, Krisha', '', 'Cost Control', 'Accounting', 'Rank and File', 'Fixed - Term', '', '', '9123456789', 'Krisha', '', '30', 'Female', 'Single', 'Krisha', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001008, 'Ramirez, Catherine Joy Banito', '', 'Accounting Assistant Manager', 'Accounting', 'Managerial', 'Regular', '', '17/01/2018', '9123456789', 'Catherine', '27/11/1996', '30', 'Female', 'Single', 'Catherine', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'manager', ''),
(1001009, 'Ramos, Marc Anthony O.', '', 'Purchasing Officer', 'Accounting', 'Supervisor', 'Regular', '', '18/11/2019', '9123456789', 'Marc', '18/10/1984', '30', 'Male', 'Married', 'Marc', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'supervisor', ''),
(1001010, 'Tenorio, Lucena Bautista', '', 'Cash Services Head', 'Accounting', 'Supervisor', 'Regular', '', '01/05/2001', '9123456789', 'Lucena', '30/06/1967', '30', 'Female', 'Married', 'Lucena', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'supervisor', ''),
(1001011, 'Vicencio, Angeline Magsino', '', 'Cost Control Clerk', 'Accounting', 'Rank and File', 'Regular', '', '07/09/2016', '9123456789', 'Angeline', '07/02/1987', '30', 'Female', 'Married', 'Angeline', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001012, 'Arellano, Dante Mendoza', '', 'Painter', 'Engineering', 'Rank and File', 'Regular', '', '04/10/1999', '9123456789', 'Dante', '28/01/1972', '30', 'Male', 'Married', 'Dante', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001013, 'Banzon, Jayson ', '', 'Electrician', 'Engineering', 'Rank and File', 'Fixed - Term', '', '13/12/2021', '9123456789', 'Jayson', '21/02/1994', '30', 'Male', 'Single', 'Jayson', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001014, 'Dio, Juan Carlos B.', '', 'Electrician', 'Engineering', 'Rank and File', 'Fixed - Term', '', '07/03/2019', '9123456789', 'Juan', '27/03/1999', '30', 'Male', 'Single', 'Juan', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001015, 'Dojillo, Jerome', '', 'Chief Engineer', 'Engineering', 'Managerial', 'PROBATIONARY', '', '16/07/2024', '9123456789', 'Jerome', '26/06/1991', '30', 'Male', 'Married', 'Jerome', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'manager', ''),
(1001016, 'Loste, John Anthony Cataluña', '', 'Electrician', 'Engineering', 'Rank and File', 'Regular', '', '24/11/2014', '9123456789', 'John', '26/04/1986', '30', 'Male', 'Married', 'John', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001017, 'Valdez, Dennis ', '', 'Electrician', 'Engineering', 'Rank and File', 'Fixed - Term', '', '', '9123456789', 'Dennis', '18/02/1983', '30', 'Male', 'Married', 'Dennis', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001018, 'Velasquez, Norberto Jr. C.', '', 'Carpenter', 'Engineering', 'Rank and File', 'Fixed - Term', '', '09/09/2019', '9123456789', 'Norberto', '03/10/1983', '30', 'Male', 'Single', 'Norberto', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001019, 'Villanueva, Jay-Ar C.', '', 'Electrician', 'Engineering', 'Rank and File', 'Fixed - Term', '', '14/11/2022', '9123456789', 'Jay-Ar', '06/02/1989', '30', 'Male', 'Married', 'Jay-Ar', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001020, 'Alonzo, Virgilio Labog', '', 'Project Manager', 'Executive Office', 'Managerial', 'Makati Hired', '', '07/11/1997', '9123456789', 'Virgilio', '20/09/1972', '30', 'Male', 'Married', 'Virgilio', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'manager', ''),
(1001021, 'Vergel DE DIOS, Rolando', '', 'General Manager', 'Executive Office', 'Managerial', '', '', '08/07/2024', '9123456789', 'GM', '03/11/1983', '30', 'Male', 'Married', 'GM', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'admin', ''),
(1001022, 'Bantugan, Anthony Balboa', '', 'Line Cook/Fryer', 'Food and Beverage Production', 'Rank and File', 'Regular', '', '08/10/2016', '9123456789', 'Anthony', '04/12/1982', '30', 'Male', 'Single', 'Anthony', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001023, 'Bantugan, Michael Cascasan', '', 'Line Cook / Dispatcher', 'Food and Beverage Production', 'Rank and File', 'Regular', '', '01/01/2008', '9123456789', 'Michael', '27/07/1983', '30', 'Male', 'Married', 'Michael', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001024, 'Bigtas, Julius R.', '', 'Steward', 'Food and Beverage Production', 'Rank and File', 'Fixed - Term', '', '17/11/2022', '9123456789', 'Julius', '25/06/1997', '30', 'Male', 'Single', 'Julius', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001025, 'Camano, Ricel', '', 'Pantry/Pastry Attendant', 'Food and Beverage Production', 'Rank and File', 'Fixed - Term', '', '29/04/2023', '9123456789', 'Ricel', '17/12/1986', '30', 'Female', 'Married', 'Ricel', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001026, 'Comon, Christian', '', 'Steward', 'Food and Beverage Production', 'Rank and File', 'Fixed - Term', '', '30/10/2023', '9123456789', 'Christian', '25/12/1998', '30', 'Male', 'Single', 'Christian', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001027, 'De Guzman, Everlyn E.', '', 'Pantry/Pastry Attendant', 'Food and Beverage Production', 'Rank and File', 'Fixed - Term', '', '14/06/2022', '9123456789', 'Guzman', '28/10/1997', '30', 'Female', 'Single', 'Guzman', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001028, 'Dela Cruz, Florentino S.', '', 'Steward', 'Food and Beverage Production', 'Rank and File', 'Fixed - Term', '', '25/11/2022', '9123456789', 'Cruz', '01/03/2000', '30', 'Male', 'Single', 'Cruz', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001029, 'Diaz, Aries Miller', '', 'Sous Chef', 'Food and Beverage Production', 'Supervisor', 'Regular', '', '27/03/2000', '9123456789', 'Aries', '09/04/1980', '30', 'Male', 'Married', 'Aries', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'supervisor', ''),
(1001030, 'Ellivera, Roland Greg', '', 'Steward', 'Food and Beverage Production', 'Rank and File', 'Fixed - Term', '', '01/11/2023', '9123456789', 'Roland', '30/03/1990', '30', 'Male', 'Single', 'Roland', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001031, 'Manaloto, Meryl Joy N.', '', 'Steward', 'Food and Beverage Production', 'Rank and File', 'Fixed - Term', '', '21/11/2022', '9123456789', 'Meryl', '16/05/2000', '30', 'Female', 'Single', 'Meryl', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001032, 'Marquez, Leonel G.', '', 'Steward', 'Food and Beverage Production', 'Rank and File', 'Fixed - Term', '', '01/11/2016', '9123456789', 'Leonel', '03/06/1986', '30', 'Male', 'Married', 'Leonel', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001033, 'Ochoco, Rodel Sison', '', 'Line Cook / Expediter', 'Food and Beverage Production', 'Rank and File', 'Regular', '', '01/12/2010', '9123456789', 'Rodel', '07/01/1981', '30', 'Male', 'Married', 'Rodel', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001034, 'Salazar, Edmar Salonga', '', 'Line Cook', 'Food and Beverage Production', 'Rank and File', 'Regular', '', '03/04/2010', '9123456789', 'Edmar', '02/12/1986', '30', 'Male', 'Single', 'Edmar', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001035, 'Sanchez, June Robern E.', '', 'Butcher', 'Food and Beverage Production', 'Rank and File', 'Fixed - Term', '', '13/04/2022', '9123456789', 'June', '16/06/1978', '30', 'Male', 'Married', 'June', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001036, 'Trinidad, Menandro del Rosario', '', 'Sous Chef', 'Food and Beverage Production', 'Supervisor', 'Regular', '', '19/10/1996', '9123456789', 'Menandro', '09/06/1971', '30', 'Male', 'Single', 'Menandro', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'supervisor', ''),
(1001037, 'Vale, Allan', '', 'Executive Sous Chef', 'Food and Beverage Production', 'Managerial', 'PROBATIONARY', '', '26/06/2024', '9123456789', 'Allan', '17/12/1991', '30', 'Male', 'Married', 'Allan', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'manager', ''),
(1001038, 'Villorente, Andres R.', '', 'Kitchen Helper', 'Food and Beverage Production', 'Rank and File', 'Fixed - Term', '', '27/12/2015', '9123456789', 'Andres', '27/10/1976', '30', 'Male', 'Married', 'Andres', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001039, 'Arabos, Jhan Paulo H.', '', 'Bar Attendant', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '23/11/2022', '9123456789', 'Jhan', '18/11/2001', '30', 'Male', 'Single', 'Jhan', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001040, 'Azcona, Alfie D.', '', 'Waiter', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '22/11/2022', '9123456789', 'Alfie', '15/05/1986', '30', 'Male', 'Married', 'Alfie', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001041, 'Baciles, Angelica', '', 'Waitress', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '16/06/2023', '9123456789', 'Angelica', '02/08/1997', '30', 'Female', 'Married', 'Angelica', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001042, 'Banito, Ben Margallo', '', 'Waiter', 'Food and Beverage Service', 'Rank and File', 'Regular Seasonal', '', '01/03/2013', '9123456789', 'Ben', '17/04/1977', '30', 'Male', 'Married', 'Ben', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001043, 'Borja, Justine Ivanne', '', 'Waiter', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '12/12/2022', '9123456789', 'Justine', '07/07/2003', '30', 'Male', 'Single', 'Justine', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001044, 'Dorion, John Marco', '', 'Waiter', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '19/03/2022', '9123456789', 'John', '18/02/2002', '30', 'Male', 'Single', 'John', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001045, 'Dorion, Mart Wesley L.', '', 'Waiter', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '26/12/2021', '9123456789', 'Mart', '04/08/2002', '30', 'Male', 'Single', 'Mart', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001046, 'Jaen, Ryan James', '', 'Waiter', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '24/12/2022', '9123456789', 'Ryan', '12/06/1996', '30', 'Male', 'Single', 'Ryan', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001047, 'Jornal, Angelica P.', '', 'Waitress', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '19/03/2022', '9123456789', 'Angelica', '19/04/1998', '30', 'Female', 'Single', 'Angelica', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001048, 'Manalaotao, Leonora', '', 'Waitress', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '27/12/2023', '9123456789', 'Leonora', '25/08/1994', '30', 'Female', 'Single', 'Leonora', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001049, 'Mañio, Roneme D.', '', 'Waiter', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '25/11/2022', '9123456789', 'Roneme', '26/09/1993', '30', 'Male', 'Single', 'Roneme', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001050, 'Mendoza, Don Ambruce de Guzman', '', 'Bar Attendant', 'Food and Beverage Service', 'Rank and File', 'Regular Seasonal', '', '18/10/2016', '9123456789', 'Don', '02/08/1994', '30', 'Male', 'Single', 'Don', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001051, 'Morales, John Kyle L.', '', 'Waiter', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '19/03/2022', '9123456789', 'John', '11/11/2000', '30', 'Male', 'Single', 'John', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001052, 'Oconer, Randy', '', 'Waiter', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '02/06/2023', '9123456789', 'Randy', '03/10/1995', '30', 'Male', 'Single', 'Randy', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001053, 'Rebillido, Loryvett', '', 'Waitress', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '06/06/2023', '9123456789', 'Loryvett', '05/08/1992', '30', 'Female', 'Single', 'Loryvett', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001054, 'Rosal, Justine', '', 'Waiter', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '04/01/2024', '9123456789', 'Justine', '03/08/2003', '30', 'Male', 'Single', 'Justine', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001055, 'Tugade, Carl Joseph T.', '', 'Waiter', 'Food and Beverage Service', 'Rank and File', 'Fixed - Term', '', '08/04/2022', '9123456789', 'Carl', '17/01/2001', '30', 'Male', 'Single', 'Carl', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001056, 'Candelaria, Patricia Hannah A.', '', 'Front Office Associates', 'Front Office', 'Rank and File', 'Regular', '', '13/07/2022', '9123456789', 'Patricia', '03/11/1999', '30', 'Female', 'Single', 'Patricia', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001057, 'Santos Lloyd Anthony A.', '', 'Front Office Associates', 'Front Office', 'Rank and File', 'Fixed - Term', '', '01/10/2016', '9123456789', 'Lloyd', '04/09/1993', '30', 'Male', 'Single', 'Lloyd', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001058, 'Albarda, Glenah Paguio', '', 'Front Office Supervisor', 'Front Office ', 'Supervisor', 'Regular', '', '08/07/2017', '9123456789', 'Glenah', '03/06/1986', '30', 'Female', 'Married', 'Glenah', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'supervisor', ''),
(1001059, 'Rillera, Ronald A.', '', 'Front Office Agent/Banquet Coordinator', 'Front Office ', 'Rank and File', 'Regular', '', '01/03/2013', '9123456789', 'Ronald', '09/12/1986', '30', 'S', 'Married', 'Ronald', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001060, 'Alonzo, Michael San Andres', '', 'Grounds Supervisor', 'Grounds', 'Supervisor', 'Regular', '', '01/07/2000', '9123456789', 'Michael', '09/05/1981', '30', 'Male', 'Married', 'Michael', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'supervisor', ''),
(1001061, 'Araullo Jr., Cezar I.', '', 'Field Maintenance', 'Grounds', 'Rank and File', 'Fixed - Term', '', '18/02/2013', '9123456789', 'Jr', '10/09/1991', '30', 'Male', 'Married', 'Jr', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001062, 'Bantugan, Loreto Jr. Nojadera', '', 'Field Maintenance', 'Grounds', 'Rank and File', 'Regular', '', '07/04/1999', '9123456789', 'Loreto', '27/12/1980', '30', 'Male', 'Married', 'Loreto', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001063, 'Baron, Decerie Nanteza', '', 'Gardener', 'Grounds', 'Rank and File', 'Regular Seasonal', '', '18/02/2013', '9123456789', 'Decerie', '26/12/1972', '30', 'Female', 'Married', 'Decerie', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001064, 'Camilotes, Eris Daniel A.', '', 'Field Maintenance', 'Grounds', 'Rank and File', 'Fixed - Term', '', '28/06/2017', '9123456789', 'Eris', '14/03/1996', '30', 'Male', 'Married', 'Eris', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001065, 'Chavez, Allan Kwan', '', 'Mach Optr/Pony Attendant', 'Grounds', 'Rank and File', 'Regular', '', '01/10/2014', '9123456789', 'Allan', '16/10/1983', '30', 'Male', 'Single', 'Allan', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001066, 'Fernandez, Israel Filipino', '', 'Golf Maintenance', 'Grounds', 'Rank and File', 'Regular', '', '04/07/1997', '9123456789', 'Israel', '21/06/1978', '30', 'Male', 'Single', 'Israel', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001067, 'Lazala, Venny T.', '', 'Field Maintenance', 'Grounds', 'Rank and File', 'Fixed - Term', '', '12/11/2022', '9123456789', 'Venny', '14/02/1993', '30', 'Male', 'Single', 'Venny', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001068, 'Maglaqui, Michael M. ', '', 'Field Maintenance', 'Grounds', 'Rank and File', 'Fixed - Term', '', '28/06/2017', '9123456789', 'Michael', '08/02/1977', '30', 'Male', 'Married', 'Michael', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001069, 'Marquez, Edelberto', '', 'Field Maintenance', 'Grounds', 'Rank and File', 'Fixed - Term', '', '', '9123456789', 'Edelberto', '01/10/1991', '30', 'Male', 'Widow', 'Edelberto', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001070, 'Marquez, Tristan Gonzales', '', 'Field Maintenance', 'Grounds', 'Rank and File', 'Regular', '', '14/10/1996', '9123456789', 'Tristan', '20/11/1977', '30', 'Male', 'Married', 'Tristan', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001071, 'Nojadera, Angelito D.', '', 'Field Maintenance', 'Grounds', 'Rank and File', 'Fixed - Term', '', '01/10/2018', '9123456789', 'Angelito', '01/09/1991', '30', 'Male', 'Single', 'Angelito', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001072, 'Nojadera, Victor dela Peña', '', 'Gardener/Artist', 'Grounds', 'Rank and File', 'Regular Seasonal', '', '01/07/2000', '9123456789', 'Victor', '24/07/1979', '30', 'Male', 'Married', 'Victor', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001073, 'Sugatain, Jessie Jusayan', '', 'Field Maintenance', 'Grounds', 'Rank and File', 'Regular Seasonal', '', '01/12/2006', '9123456789', 'Jessie', '31/03/1979', '30', 'Male', 'Married', 'Jessie', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001074, 'Tolentino, Elmer Pillagara', '', 'Field Maintenance', 'Grounds', 'Rank and File', 'Regular', '', '01/10/2014', '9123456789', 'Elmer', '29/11/1979', '30', 'Male', 'Married', 'Elmer', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001075, 'Tolentino, Raffy S.', '', 'Field Maintenance', 'Grounds', 'Rank and File', 'Fixed - Term', '', '22/03/2010', '9123456789', 'Raffy', '22/11/1985', '30', 'Male', 'Married', 'Raffy', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001076, 'Apales, Angelo Quiñones', '', 'Room Attendant', 'Housekeeping ', 'Rank and File', 'Regular Seasonal', '', '01/07/2002', '9123456789', 'Angelo', '28/08/1978', '30', 'Male', 'Married', 'Angelo', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001077, 'Balugal, Anharlizan A.', '', 'Room Attendant', 'Housekeeping ', 'Rank and File', 'Fixed - Term', '', '17/04/2019', '9123456789', 'Anharlizan', '09/09/1994', '30', 'Female', 'Single', 'Anharlizan', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001078, 'Bantugan, Wilfredo S.', '', 'Room Attendant', 'Housekeeping ', 'Rank and File', 'Regular Seasonal', '', '30/10/2011', '9123456789', 'Wilfredo', '22/06/1989', '30', 'Male', 'Married', 'Wilfredo', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001079, 'Bunag, Percival Eder', '', 'Room Attendant', 'Housekeeping ', 'Rank and File', 'Regular Seasonal', '', '18/03/2002', '9123456789', 'Percival', '26/06/1972', '30', 'Male', 'Single', 'Percival', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001080, 'Cadivida, Dione', '', 'Room Attendant', 'Housekeeping ', 'Rank and File', 'Fixed - Term', '', '14/04/2023', '9123456789', 'Dione', '16/11/1999', '30', 'Male', 'Single', 'Dione', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001081, 'Caguiwa, Allan Gabriel', '', 'HK  Supervisor', 'Housekeeping ', 'Supervisor', 'Regular', '', '04/10/1999', '9123456789', 'Allan', '04/07/1976', '30', 'Male', 'Married', 'Allan', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'supervisor', ''),
(1001082, 'Dollosa, Eric', '', 'HK Manager', 'Housekeeping ', 'Managerial', 'PROBATIONARY', '', '16/04/2024', '9123456789', 'Eric', '21/01/1976', '30', 'Male', 'Married', 'Eric', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'manager', ''),
(1001083, 'Espinosa, Gary Meraz', '', 'Room Attendant', 'Housekeeping ', 'Rank and File', 'Regular', '', '07/10/2002', '9123456789', 'Gary', '13/06/1970', '30', 'Male', 'Married', 'Gary', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001084, 'Galido, Francess Jean G.', '', 'Room Attendant', 'Housekeeping ', 'Rank and File', 'Fixed - Term', '', '21/11/2022', '9123456789', 'Francess', '26/05/1998', '30', 'Female', 'Single', 'Francess', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001085, 'Labampa, Noel Cascasan', '', 'HK Assistant Supervisor', 'Housekeeping ', 'Rank and File', 'Regular', '', '30/09/1996', '9123456789', 'Noel', '18/06/1967', '30', 'Male', 'Married', 'Noel', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001086, 'Labog, Marivic V.', '', 'Room Attendant', 'Housekeeping ', 'Rank and File', 'Fixed - Term', '', '19/03/2015', '9123456789', 'Marivic', '20/07/1982', '30', 'Female', 'Married', 'Marivic', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001087, 'Lepata, Revelyn P.', '', 'Public Area Attendant', 'Housekeeping ', 'Rank and File', 'Fixed - Term', '', '06/02/2016', '9123456789', 'Revelyn', '27/09/1982', '30', 'Female', 'Single', 'Revelyn', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001088, 'Martal, Esperanza A.', '', 'Public Area Attendant', 'Housekeeping ', 'Rank and File', 'Fixed - Term', '', '06/05/2019', '9123456789', 'Esperanza', '01/08/1974', '30', 'Female', 'Single', 'Esperanza', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001089, 'Martinez, Leonardo Bantugan', '', 'Public Area Supervisor', 'Housekeeping ', 'Supervisor', 'Regular', '', '04/07/2005', '9123456789', 'Leonardo', '21/01/1965', '30', 'Male', 'Married', 'Leonardo', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'supervisor', ''),
(1001090, 'Monchez, Jocelyn Hesta', '', 'Assistant PA Supervisor', 'Housekeeping ', 'Rank and File', 'Regular', '', '23/10/2008', '9123456789', 'Jocelyn', '03/11/1973', '30', 'Female', 'Married', 'Jocelyn', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001091, 'Navalde, Nina ', '', 'Room Attendant', 'Housekeeping ', 'Rank and File', 'Fixed - Term', '', '', '9123456789', 'Nina', '22/10/1994', '30', 'Female', 'Single', 'Nina', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001092, 'Nojadera, Kathrina J.', '', 'Room Attendant', 'Housekeeping ', 'Rank and File', 'Fixed - Term', '', '08/03/2024', '9123456789', 'Kathrina', '23/11/1990', '30', 'Female', 'Married', 'Kathrina', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001093, 'Pareño, Renato Canello', '', 'Room Attendant', 'Housekeeping ', 'Rank and File', 'Regular', '', '12/10/1996', '9123456789', 'Renato', '06/03/1976', '30', 'Male', 'Married', 'Renato', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001094, 'Quiling, Erwin Orisga', '', 'Public Area Attendant', 'Housekeeping ', 'Rank and File', 'Regular', '', '01/07/2009', '9123456789', 'Erwin', '01/11/1967', '30', 'Male', 'Married', 'Erwin', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001095, 'Rios, Kevin Jay Salonga', '', 'Room Attendant', 'Housekeeping ', 'Rank and File', 'Regular Seasonal', '', '12/04/2014', '9123456789', 'Kevin', '01/01/1996', '30', 'Male', 'Married', 'Kevin', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001096, 'Villablanca, Michael de Guzman', '', 'Room Attendant', 'Housekeeping ', 'Rank and File', 'Regular Seasonal', '', '18/03/2002', '9123456789', 'Michael', '24/01/1976', '30', 'Male', 'Married', 'Michael', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001097, 'David, Joel ', '', 'Driver', 'Human Resources', 'Rank and File', 'Fixed - Term', '', '', '9123456789', 'Joel', '29/12/1980', '30', 'Male', 'Married', 'Joel', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001098, 'Ramos, Benidict V.', '', 'HR/Admin Manager', 'Human Resources', 'Managerial', 'PROBATIONARY', '', '01/03/2024', '9123456789', 'Benidict', '26/04/1996', '30', 'Male', 'Single', 'Benidict', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'manager', ''),
(1001099, 'Tutol, Diana Pangon', '', 'HR Assistant', 'Human Resources', 'Rank and File', 'Regular', '', '12/11/2011', '9123456789', 'Diana', '24/04/1983', '30', 'Female', 'Single', 'Diana', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001100, 'Duque, Armani', '', 'IT Specialist', 'IT', 'Supervisor', 'PROBATIONARY', '', '14/04/2024', '9123456789', 'duquearmani14@gmail.com', '14/09/1994', '30', 'Male', 'Single', 'IT', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'admin', ''),
(1001101, 'Dela Cruz, Ferdinand Buluran', '', 'Laundry / Linen Supervisor', 'Housekeeping', 'Supervisor', 'Regular', '', '09/04/1997', '9123456789', 'Cruz', '23/07/1972', '30', 'Male', 'Married', 'Cruz', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'supervisor', ''),
(1001102, 'Lepata, Rodel Paguio', '', 'Laundry / Linen Attendant', 'Housekeeping', 'Rank and File', 'Regular', '', '12/10/1996', '9123456789', 'Rodel', '07/01/1976', '30', 'Male', 'Married', 'Rodel', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001103, 'San Pedro, Rolando Dingco', '', 'Laundry / Linen Attendant', 'Housekeeping', 'Rank and File', 'Regular', '', '12/10/1996', '9123456789', 'Pedro', '24/01/1971', '30', 'Male', 'Married', 'Pedro', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001104, 'Calimbas, Reynaldo Jr. Paz', '', 'Laundry/Linen Attendant', 'Housekeeping', 'Rank and File', 'Regular Seasonal', '', '04/11/2011', '9123456789', 'Reynaldo', '22/01/1984', '30', 'Male', 'Single', 'Reynaldo', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001105, 'Tolentino, Ma. Fatima D.', '', 'Laundry /Linen Attendant', 'Housekeeping', 'Rank and File', 'Fixed - Term', '', '07/12/2013', '9123456789', 'Ma.', '14/10/1993', '30', 'Female', 'Single', 'Ma.', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001106, 'Fider, Andrea Isabel', '', 'Sales and Marketing Assistant', 'Membership and Sales', 'Rank and File', 'Regular', '', '01/11/2022', '9123456789', 'Andrea', '14/09/1995', '30', 'Female', 'Single', 'Andrea', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001107, 'Cortado, Maricel Dayao', '', 'Membership & Reservations, Sales & Mrktg Mgr', 'Membership and Sales', 'Managerial', 'Regular', '', '01/10/2018', '9123456789', 'Maricel', '30/08/1979', '30', 'Female', 'Married', 'Maricel', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'manager', ''),
(1001108, 'Suson, Rodel R.', '', 'Membership & Reservations, Sales & Mrktg Senior Supervisor', 'Membership and Sales', 'Supervisor', 'Regular', '', '22/12/2021', '9123456789', 'Rodel', '17/03/1981', '30', 'Male', 'Single', 'Rodel', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'supervisor', ''),
(1001109, 'Bantugan, Ronaldo Mayo', '', 'Lifeguard', 'Sports and Recreation', 'Supervisor', 'Regular', '', '01/12/2010', '9123456789', 'Ronaldo', '02/09/1969', '30', 'Male', 'Married', 'Ronaldo', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'supervisor', ''),
(1001110, 'Cruz, Robert de Guzman', '', 'Lifeguard', 'Sports and Recreation', 'Rank and File', 'Regular', '', '01/01/2008', '9123456789', 'Robert', '11/03/1974', '30', 'Male', 'Married', 'Robert', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001111, 'Insigne, Felix Acayan', '', 'Lifeguard', 'Sports and Recreation', 'Rank and File', 'Regular Seasonal', '', '25/04/2008', '9123456789', 'Felix', '05/04/1965', '30', 'Male', 'Married', 'Felix', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001112, 'Loreto, John Cerill C.', '', 'Beach Cleaner', 'Sports and Recreation', 'Rank and File', 'Fixed - Term', '', '23/09/2022', '9123456789', 'John', '08/07/1997', '30', 'Male', 'Single', 'John', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001113, 'Lumibao, Vincent Peralta', '', 'Lifeguard', 'Sports and Recreation', 'Rank and File', 'Regular Seasonal', '', '11/05/2013', '9123456789', 'Vincent', '24/08/1984', '30', 'Male', 'Married', 'Vincent', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001114, 'Nojadera, Samuel John D.', '', 'Beach Cleaner', 'Sports and Recreation', 'Rank and File', 'Fixed - Term', '', '20/06/2017', '9123456789', 'Samuel', '17/09/1993', '30', 'Male', 'Married', 'Samuel', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001115, 'Yere, Mark Edison Reyes', '', 'Lifeguard', 'Sports and Recreation', 'Rank and File', 'Regular Seasonal', '', '07/10/2016', '9123456789', 'Mark', '01/11/1988', '30', 'Male', 'Single', 'Mark', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001116, 'Manzano, Jonald M.', '', 'Encoder/Receiving Clerk', 'Warehouse', 'Rank and File', 'Fixed - Term', '', '21/11/2022', '9123456789', 'Jonald', '14/12/1997', '30', 'Male', 'Married', 'Jonald', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', ''),
(1001117, 'Panganiban, Eduardo Dinglasan', '', 'Property Custodian', 'Warehouse ', 'Supervisor', 'Regular', '', '23/03/1998', '9123456789', 'Eduardo', '07/06/1976', '30', 'Male', 'Married', 'Eduardo', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'supervisor', ''),
(1001118, 'Salvacion, Cristy Ann Quiroz', '', 'Receiving Clerk/Encoder', 'Warehouse ', 'Rank and File', 'Regular', '', '10/01/2012', '9123456789', 'Cristy', '23/12/1990', '30', 'Female', 'Single', 'Cristy', '$2y$10$E3H0YalVYoZi4fRTb.FgdOOoNTIbvHpAnBloIPf3f9VENBxKQfXJm', 'staff', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
