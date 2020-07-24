-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 02:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siklus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `text_highlight` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `image`, `body`, `text_highlight`, `category`, `published`, `created_at`, `updated_at`) VALUES
(1, 1, 'testing number one edit edit edt', 'testing-number-one-edit-edit-edt', '5e53c5072a1035.38706339.', '<p>testing body number 1 edit</p>\r\n\r\n<p>\\r\\n</p>\r\n', '', 'edit', 0, '2020-02-24 12:43:51', '2020-02-24 12:43:51'),
(2, 1, 'testing number two edit', 'testing-number-two-edit', '5e536cdbd8fce3.06126237.', '<p>test</p>\r\n', '', 'edit', 0, '2020-02-24 06:27:39', '2020-02-24 06:27:39'),
(16, 2, 'ddd ddd ddd', 'ddd-ddd-ddd', '5e53f7a1285b37.66554176.png', '<p>ddd</p>\r\n', '', 'History', 0, '2020-02-24 16:19:45', '2020-02-24 16:19:45'),
(17, 4, 'John Doe Article', 'john-doe-article', '5e53c48b9a4274.86704816.jpg', '<p>rreeeeeeeeeeeeeeeeeeeeeee</p>\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'John Doe', 0, '2020-02-25 08:14:05', '2020-02-25 08:14:05'),
(19, 2, 'History of Lorem Ipsum', 'history-of-lorem-ipsum', '5e53e2796ef570.59651452.jpg', '<h1>Where does it come from ?</h1>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p><img alt=\"\" src=\"https://i.ibb.co/X8sRbDX/test-ttp-big-320x325.jpg\" style=\"height:325px; width:320px\" /></p>\r\n\r\n<h1>Why do we use it?</h1>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'History', 0, '2020-02-25 08:14:00', '2020-02-25 08:14:00'),
(20, 2, 'Testing Text Highlight', 'testing-text-highlight', '5e54d6110aa0e2.79292490.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'highlight', 0, '2020-02-25 08:13:12', '2020-02-25 08:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `post_topic`
--

CREATE TABLE `post_topic` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`) VALUES
(1, 'test'),
(2, 'test'),
(3, 'test'),
(4, 'test test'),
(5, 'coba'),
(6, 'coba lagi'),
(7, 'coba lagi satu'),
(8, 'etetetet'),
(9, 'fff'),
(10, 'asd'),
(11, 'ddd'),
(12, 'John Doe'),
(13, 'Lorem'),
(14, 'History'),
(15, 'highlight');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Author','Admin') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Jacob Holmes', 'tester@mail.com', 'Admin', '123', '', '2020-02-22 08:57:12', NULL),
(2, 'gili', 'gili@mail.com', 'Admin', '202cb962ac59075b964b07152d234b70', '', '2020-02-23 08:47:16', '2020-02-23 08:47:16'),
(4, 'John Doe', 'johndoe@mail.com', 'Author', '202cb962ac59075b964b07152d234b70', '', '2020-02-23 09:38:43', '2020-02-23 09:38:43'),
(5, 'Donal Trump', 'donald@mail.com', 'Author', '202cb962ac59075b964b07152d234b70', '', '2020-02-23 09:41:17', '2020-02-23 09:41:17'),
(8, 'Barack Obama', 'obama@mail.com', 'Author', '202cb962ac59075b964b07152d234b70', '5e5379b3a9d4c7.82672517.jpg', '2020-02-24 07:22:27', '2020-02-24 07:22:27'),
(9, 'test123321', 'testt@mail.com', 'Author', 'caf1a3dfb505ffed0d024130f58c5cfa', '5e53d096f067b7.91616836.jpg', '2020-02-24 12:28:26', '2020-02-24 12:28:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_topic`
--
ALTER TABLE `post_topic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`post_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `post_topic`
--
ALTER TABLE `post_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post_topic`
--
ALTER TABLE `post_topic`
  ADD CONSTRAINT `post_topic_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `post_topic_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
