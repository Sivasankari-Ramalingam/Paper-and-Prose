-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 08:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(100, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `first_name`, `last_name`, `nationality`, `genre`) VALUES
('A100', 'James', 'Clear', 'American', 'Psychology'),
('A101', 'Lauren', 'Roberts', 'American', 'Fiction'),
('A102', 'Grant', 'Hill', 'American', 'Memoir'),
('A103', 'Rebecca', 'Yarros', 'American', 'Romance'),
('A104', 'Prince', 'Harry', 'American', 'Memoir'),
('A105', 'Elle', 'Kennedy', 'Canadian', 'Romance'),
('A106', 'Mark', 'Carney', 'Canadian', 'Finance'),
('A107', 'Jordan', 'Belfort', 'American', 'Psychology'),
('A108', 'Haruki', 'Marukami', 'Japanese', 'Fiction'),
('A109', 'Paulo', 'Coelho', 'Brazilian', 'Fiction'),
('A110', 'Arundhati', 'Roy', 'Indian', 'Political'),
('A111', 'Freida', 'McFadden ', 'British', 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `publish_date` date DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `book_image` varchar(100) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT 0,
  `books_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `publish_date`, `price`, `stock_quantity`, `book_image`, `featured`, `books_description`) VALUES
('B001', 'Way of the Wolf', '2020-01-15', 19.99, 149, 'images/wayofthewolf.jpg', 1, 'For the first time ever, Jordan Belfort opens his playbook and gives you access to his exclusive step-by-step system—the same system he used to create massive wealth for himself, his clients, and his sales teams. Until now this revolutionary program was only available through Jordan’s $1,997 online training. Now, in Way of the Wolf, Belfort is ready to unleash the power of persuasion to a whole new generation, revealing how anyone can bounce back from devastating setbacks, master the art of persuasion, and build wealth. Every technique, every strategy, and every tip has been tested and proven to work in real-life situations.'),
('B002', 'Atomic Habits', '2021-03-22', 25.50, 198, 'images/atomichabits.jpg', 0, 'No matter your goals, Atomic Habits offers a proven framework for improving--every day. James Clear, one of the world\'s leading experts on habit formation, reveals practical strategies that will teach you exactly how to form good habits, break bad ones, and master the tiny behaviors that lead to remarkable results.'),
('B003', 'Fearless', '2025-03-10', 45.00, 70, 'images/fearless.jpg', 0, 'Paedyn and Kai are reunited but face a terrible decision in this thrilling conclusion to the New York Times bestselling romantic fantasy trilogy perfect for fans of Sarah J. Maas and The Red Queen. Paedyn Gray and Kai Azer return to the Kingdom of Ilya… And Paedyn has a life-altering choice to make. Whatever she decides will determine her fate—and the fate of those around her—forever. In the ultimate battle of love and loyalty, who wins?'),
('B004', 'Powerful', '2025-01-15', 29.95, 114, 'images/powerful.jpg', 0, 'Set during the time of the New York Times bestseller Powerless, fan favorite Adena gets a story all her own in this captivating novella as she attempts to survive on the streets of Loot…and falls for a mysterious—and dangerous—Elite. Adena and Paedyn have always been inseparable. Fate brought them together when they were young, but friendship ensured they would always protect each other and the home they built in the slums of Loot. But now Paedyn—an Ordinary—has been selected for the Purging Trials, which means almost certain death.'),
('B005', 'Onyx Storm', '2018-05-18', 18.75, 178, 'images/onyxstorm.jpg', 0, 'After nearly eighteen months at Basgiath War College, Violet Sorrengail knows there’s no more time for lessons. No more time for uncertainty. Because the battle has truly begun, and with enemies closing in from outside their walls and within their ranks, it’s impossible to know who to trust. Now Violet must journey beyond the failing Aretian wards to seek allies from unfamiliar lands to stand with Navarre. The trip will test every bit of her wit, luck, and strength, but she will do anything to save what she loves—her dragons, her family, her home, and him.'),
('B006', 'Iron Flame', '2023-11-11', 35.60, 47, 'images/ironflame.jpg', 0, 'Everyone expected Violet Sorrengail to die during her first year at Basgiath War College―Violet included. But Threshing was only the first impossible test meant to weed out the weak-willed, the unworthy, and the unlucky. Now the real training begins, and Violet’s already wondering how she’ll get through. It’s not just that it’s grueling and maliciously brutal, or even that it’s designed to stretch the riders’ capacity for pain beyond endurance. It’s the new vice commandant, who’s made it his personal mission to teach Violet exactly how powerless she is–unless she betrays the man she loves. Although Violet’s body might be weaker and frailer than everyone else’s, she still has her wits―and a will of iron. And leadership is forgetting the most important lesson Basgiath has taught her: Dragon riders make their own rules. '),
('B007', 'The Goal', '2020-06-30', 22.80, 90, 'images/thegoal.jpg', 0, 'College senior Sabrina James has her whole future planned out: graduate from college, kick butt in law school, and land a high-paying job at a cutthroat firm. Her path to escaping her shameful past certainly doesnt include a gorgeous hockey player who believes in love at first sight. One night of sizzling heat and surprising tenderness is all shes willing to give John Tucker, but sometimes, one night is all it takes for your entire life to change.'),
('B008', 'Values', '2025-02-22', 12.99, 299, 'images/values.jpg', 0, 'CollegeOur world is full of fault lines—growing inequality in income and opportunity; systemic racism; health and economic crises from a global pandemic; mistrust of experts; the existential threat of climate change; deep threats to employment in a digital economy with robotics on the rise. Mark Carney argues that these fundamental problems and others like them stem from a common crisis in values. Drawing on the turmoil of the past decade, he shows how \"market economies\" have evolved into \"market societies\" where price determines the value of everything.'),
('B009', 'Game', '2021-08-16', 40.00, 110, 'images/game.jpg', 0, 'Grant Hill always had game. His choice of college was a subject of national interest, and his arrival at Duke University cemented the program’s arrival at the top. In his freshman year, he led the team to its first NCAA championship, and three championship appearances in four years. His Duke career produced some of the most iconic moments in college basketball history, and Coach K proved to be a lifelong mentor.'),
('B010', 'Spare', '2022-12-01', 15.40, 220, 'images/spare.jpg', 0, 'Before losing his mother, twelve-year-old Prince Harry was known as the carefree one, the happy-go-lucky Spare to the more serious Heir. Grief changed everything. He struggled at school, struggled with anger, with loneliness—and, because he blamed the press for his mother’s death, he struggled to accept life in the spotlight.'),
('B011', 'The Housemaid', '2025-03-03', 15.00, 40, 'images/housemaid.jpg', 0, NULL),
('B012', 'The Housemaid', '2025-03-03', 15.00, 40, 'images/housemaid.jpg', 0, NULL);

--
-- Triggers `books`
--
DELIMITER $$
CREATE TRIGGER `after_book_insert` AFTER INSERT ON `books` FOR EACH ROW begin
	insert into book_log(book_id, book_action, date_added)
    values (NEW.book_id, 'ADD', NOW());
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_book_delete` BEFORE DELETE ON `books` FOR EACH ROW begin
	insert into book_log(book_id, book_action, date_added)
    values (OLD.book_id, 'delete', NOW());
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `book_authors`
--

CREATE TABLE `book_authors` (
  `book_id` varchar(50) DEFAULT NULL,
  `author_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_authors`
--

INSERT INTO `book_authors` (`book_id`, `author_id`) VALUES
('B001', 'A107'),
('B002', 'A100'),
('B003', 'A101'),
('B004', 'A101'),
('B005', 'A103'),
('B006', 'A103'),
('B007', 'A105'),
('B008', 'A106'),
('B009', 'A102'),
('B010', 'A104'),
('B012', 'A111');

-- --------------------------------------------------------

--
-- Table structure for table `book_log`
--

CREATE TABLE `book_log` (
  `log_id` int(11) NOT NULL,
  `book_id` varchar(50) DEFAULT NULL,
  `book_action` varchar(50) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_log`
--

INSERT INTO `book_log` (`log_id`, `book_id`, `book_action`, `date_added`) VALUES
(1, 'B011', 'ADD', '2025-04-14 13:56:41'),
(2, 'B012', 'ADD', '2025-04-14 13:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `apt_no` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `postal_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `phone`, `email`, `street_address`, `apt_no`, `city`, `province`, `postal_code`) VALUES
('C001', 'John', 'Doe', '5551234876', 'john.doe@gmail.com', '123 Elm St', 'Apt 101', 'Toronto', 'ON', 'M5A 1A1'),
('C002', 'Jane', 'Smith', '5555678231', 'jane.smith@gmail.com', '456 Oak St', 'Apt 322', 'Vancouver', 'BC', 'V6B 2B2'),
('C003', 'Alice', 'Johnson', '5558765223', 'alice.johnson@gmail.com', '789 Maple St', 'Apt 342', 'Montreal', 'QC', 'H2X 3X3'),
('C004', 'Bob', 'Brown', '5554321543', 'bob.brown@gmail.com', '101 Pine St', 'Apt 45', 'Calgary', 'AB', 'T2P 4P4'),
('C005', 'Charlie', 'Williams', '5551122987', 'charlie.williams@gmail.com', '202 Birch St', 'Apt 15', 'Ottawa', 'ON', 'K1A 5A5'),
('C006', 'David', 'Taylor', '5553344354', 'david.taylor@gmail.com', '303 Cedar St', 'Apt 601', 'Edmonton', 'AB', 'T5K 6K6'),
('C007', 'Emma', 'Anderson', '5555566997', 'emma.anderson@gmail.com', '404 Redwood St', 'Apt 237', 'Hamilton', 'ON', 'L8N 7N7'),
('C008', 'Frank', 'Martinez', '5557788221', 'frank.martinez@gmail.com', '505 Willow St', 'Apt 548', 'Winnipeg', 'MB', 'R3C 8C8'),
('C009', 'Grace', 'Garcia', '5559900121', 'grace.garcia@gmail.com', '606 Cherry St', 'Apt 900', 'Quebec City', 'QC', 'G1R 9R9'),
('C010', 'Henry', 'Miller', '5552233656', 'henry.miller@gmail.com', '707 Maplewood St', 'Apt 1210', 'London', 'ON', 'N6A 1A1'),
('C011', 'Shiva', 'Mahesh', '1231231231', 'shiva.mahesh@gmail.com', '2322 Queen st', '201', 'Waterloo', 'ON', 'N2L 3R8');

-- --------------------------------------------------------

--
-- Table structure for table `customers_login`
--

CREATE TABLE `customers_login` (
  `customer_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers_login`
--

INSERT INTO `customers_login` (`customer_id`, `username`, `pwd`) VALUES
('C003', 'alice.johnson@gmail.com', 'chair'),
('C004', 'bob.brown@gmail.com', 'sun'),
('C005', 'charlie.williams@gmail.com', 'river'),
('C006', 'david.taylor@gmail.com', 'dog'),
('C007', 'emma.anderson@gmail.com', 'car'),
('C008', 'frank.martinez@gmail.com', 'cloud'),
('C009', 'grace.garcia@gmail.com', 'lovebooks'),
('C010', 'henry.miller@gmail.com', 'universe'),
('C002', 'jane.smith@gmail.com', 'mirage'),
('C001', 'john.doe@gmail.com', 'apple'),
('C011', 'shiva', 'mahesh');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `deal_id` varchar(50) NOT NULL,
  `book_id` varchar(50) DEFAULT NULL,
  `discounted_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`deal_id`, `book_id`, `discounted_price`) VALUES
('D01', 'B001', 15.00),
('D02', 'B005', 15.00);

-- --------------------------------------------------------

--
-- Stand-in structure for view `new_books_view`
-- (See below for the actual view)
--
CREATE TABLE `new_books_view` (
`book_id` varchar(50)
,`title` varchar(100)
,`publish_date` date
,`price` decimal(10,2)
,`book_image` varchar(100)
,`stock_quantity` int(11)
,`books_description` text
,`first_name` varchar(50)
,`last_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `order_item_id` varchar(50) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `book_id` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`order_item_id`, `order_id`, `book_id`, `quantity`, `price`) VALUES
('OI001', 'O001', 'B001', 2, 15.50),
('OI002', 'O001', 'B002', 1, 25.99),
('OI003', 'O002', 'B003', 3, 12.45),
('OI004', 'O002', 'B004', 1, 20.75),
('OI005', 'O003', 'B005', 2, 18.00),
('OI006', 'O004', 'B006', 1, 22.30),
('OI007', 'O005', 'B007', 5, 9.99),
('OI008', 'O006', 'B008', 1, 30.00),
('OI009', 'O007', 'B009', 4, 14.60),
('OI010', 'O008', 'B010', 2, 17.45),
('OI011', 'O011', 'B010', 1, 15.40),
('OI012', 'O011', 'B009', 1, 40.00),
('OI013', 'O012', 'B001', 2, 19.99),
('OI014', 'O013', 'B007', 1, 22.80),
('OI015', 'O013', 'B008', 1, 12.99),
('OI016', 'O017', 'B004', 1, 29.95),
('OI017', 'O017', 'B005', 1, 18.75),
('OI018', 'O017', 'B006', 1, 35.60),
('OI019', 'O018', 'B001', 1, 19.99),
('OI020', 'O018', 'B002', 1, 25.50),
('OI021', 'O019', 'B003', 4, 45.00),
('OI022', 'O020', 'B004', 1, 29.95),
('OI023', 'O021', 'B006', 1, 35.60),
('OI024', 'O022', 'B004', 1, 29.95),
('OI025', 'O023', 'B002', 1, 25.50),
('OI026', 'O023', 'B003', 1, 45.00),
('OI027', 'O023', 'B006', 1, 35.60),
('OI028', 'O023', 'B005', 1, 18.75);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(50) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `order_status`, `total_amount`) VALUES
('O001', 'C001', '2025-03-01', 'Shipped', 120.50),
('O002', 'C002', '2025-03-02', 'Pending', 75.30),
('O003', 'C003', '2025-03-03', 'Delivered', 99.99),
('O004', 'C004', '2025-03-04', 'Shipped', 150.00),
('O005', 'C005', '2025-03-05', 'Pending', 45.60),
('O006', 'C006', '2025-03-06', 'Delivered', 200.20),
('O007', 'C007', '2025-03-07', 'Shipped', 85.75),
('O008', 'C008', '2025-03-08', 'Pending', 56.40),
('O009', 'C009', '2025-03-09', 'Delivered', 110.10),
('O010', 'C010', '2025-03-10', 'Shipped', 132.80),
('O011', 'C001', '2025-04-10', 'ordered', 55.40),
('O012', 'C001', '2025-04-10', 'ordered', 39.98),
('O013', 'C001', '2025-04-10', 'ordered', 35.79),
('O014', 'C001', '2025-04-10', 'ordered', 29.95),
('O015', 'C001', '2025-04-10', 'ordered', 84.30),
('O016', 'C001', '2025-04-10', 'ordered', 84.30),
('O017', 'C001', '2025-04-10', 'ordered', 84.30),
('O018', 'C011', '2025-04-11', 'ordered', 45.49),
('O019', 'C011', '2025-04-11', 'ordered', 180.00),
('O020', 'C011', '2025-04-14', 'ordered', 29.95),
('O021', 'C011', '2025-04-14', 'ordered', 35.60),
('O022', 'C011', '2025-04-14', 'ordered', 29.95),
('O023', 'C011', '2025-04-14', 'ordered', 124.85);

-- --------------------------------------------------------

--
-- Structure for view `new_books_view`
--
DROP TABLE IF EXISTS `new_books_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `new_books_view`  AS SELECT `b`.`book_id` AS `book_id`, `b`.`title` AS `title`, `b`.`publish_date` AS `publish_date`, `b`.`price` AS `price`, `b`.`book_image` AS `book_image`, `b`.`stock_quantity` AS `stock_quantity`, `b`.`books_description` AS `books_description`, `a`.`first_name` AS `first_name`, `a`.`last_name` AS `last_name` FROM ((`books` `b` join `book_authors` `ba` on(`b`.`book_id` = `ba`.`book_id`)) join `authors` `a` on(`ba`.`author_id` = `a`.`author_id`)) WHERE `b`.`publish_date` >= curdate() - interval 100 day ORDER BY `b`.`publish_date` DESC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_authors`
--
ALTER TABLE `book_authors`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `book_log`
--
ALTER TABLE `book_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customers_login`
--
ALTER TABLE `customers_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_log`
--
ALTER TABLE `book_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_authors`
--
ALTER TABLE `book_authors`
  ADD CONSTRAINT `book_authors_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_authors_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_log`
--
ALTER TABLE `book_log`
  ADD CONSTRAINT `book_log_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `customers_login`
--
ALTER TABLE `customers_login`
  ADD CONSTRAINT `customers_login_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
