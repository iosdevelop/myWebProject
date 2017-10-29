CREATE DATABASE woodstock;
USE woodstock;

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `emailAddress` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `eventID` int(10) UNSIGNED NOT NULL,
  `registrationNumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--


ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registrationNumber` (`registrationNumber`);

--
-- AUTO_INCREMENT for dumped tables
ALTER TABLE `users` ADD CONSTRAINT `fkevents` FOREIGN KEY (`eventID`) REFERENCES `events`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

INSERT INTO `events` (`id`, `location`, `date`) VALUES
(1, 'Woodstock', '2017-11-03'),
(2, 'Woodstock', '2017-12-01'),
(3, 'Woodstock', '2018-01-05'),
(4, 'Woodstock', '2018-02-02'),
(5, 'Woodstock', '2018-03-02'),
(6, 'Woodstock', '2018-04-06'),
(7, 'Woodstock', '2018-05-04')
;
