-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2020 at 04:18 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id12732676_siklus_db`
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
(1, 2, 'Using Biodiesel Fuel in Your Engine', 'using-biodiesel-fuel-in-your-engine', '5e5608c3840ad0.63882816.jpg', '<h2>Introduction</h2>\r\n\r\n<p>Biodiesel is an engine fuel that is created by chemically reacting fatty acids and alcohol. Practically speaking, this usually means combining vegetable oil with methanol in the presence of a catalyst (usually sodium hydroxide). Biodiesel is much more suitable for use as an engine fuel than straight vegetable oil for a number of reasons, the most notable one being its lower viscosity. Many large and small producers have begun producing biodiesel, and the fuel can now be found in many parts of Pennsylvania and beyond either as &quot;pure biodiesel&quot;or a blended mixture with traditional petroleum diesel (e.g., B5 is 5 percent biodiesel, 95 percent petroleum diesel).</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/siklus/admin/img/post_image/975035534.jpg\" style=\"height:309px; width:463px\" /></p>\r\n\r\n<p>The process of making biodiesel is simple enough that farmers can consider producing biodiesel to meet their own needs by growing and harvesting an oil crop and converting it into biodiesel. In this way, farmers are able to &quot;grow&quot;their own fuel (see the Penn State Extension publication Biodiesel Safety and Best Management Practices for Small-Scale Noncommercial Production). There are many possible reasons to grow or use biodiesel, including economics, support of local industry, and environmental considerations.</p>\r\n\r\n<p>However, there is also a great deal of concern about the effect of biodiesel on engines. Many stories have been circulating about reduced performance, damage to key components, or even engine failures that are blamed on biodiesel. Some manufacturers are wary about honoring their warrantees on engines if biodiesel is used, while others are encouraging the use of biodiesel. Given the wide array of confusing reports, understanding the truth of the matter is not easy.</p>\r\n\r\n<p>Fortunately, quite a bit of careful research exists and continues on testing the performance of biodiesel in engines, both in laboratory conditions and in real-world operating conditions. These controlled studies clear up much of the confusion about using biodiesel and can be used as a reliable guide to the real performance of biodiesel fuel in engines.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Engine Performance Using Biodiesel</h2>\r\n\r\n<p>While we don&#39;t know everything about its performance, it is safe to say that good-quality biodiesel fuel generally performs well in engines. Several of the more important points to keep in mind are as follows:</p>\r\n\r\n<ul>\r\n	<li>Engine power: engine power and torque tend to be 3 to 5 percent lower when using biodiesel. This is due to the fact that biodiesel fuel has less energy per unit volume than traditional diesel fuel.</li>\r\n	<li>Fuel efficiency: fuel efficiency tends to be slightly lower when using biodiesel due to the lower energy content of the fuel. Typically, the drop-off is in the same range as the reduction in peak engine power (3-5 percent).</li>\r\n	<li>Engine wear: short-term engine wear when using biodiesel has been measured to be less than that of petroleum diesel. While long-term tests have not been published, engines are expected to experience less wear in the long run when using biodiesel.</li>\r\n	<li>Deposits and clogging: deposits and clogging due to biodiesel have been widely reported but are generally traceable to biodiesel that is either of low quality or has become oxidized. If fuel quality is high, deposits in the engine should not normally be a problem.</li>\r\n</ul>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<h2>Biodiesel Quality is Vital</h2>\r\n\r\n<p>It is important not to confuse the performance of high-quality biodiesel with the performance of low-quality biodiesel. The difference can be tremendous, and producers that do not pay careful attention to their process are almost guaranteed to end up with poor-quality biodiesel. Proper fuel quality and care are vital for all engine fuels, and this is certainly true for biodiesel.</p>\r\n\r\n<p>The most common problems with fuel quality are (1) the biodiesel may contain some &quot;unconverted&quot;vegetable oil (incomplete processing), (2) traces of chemicals from the making of the biodiesel (e.g., methanol, lye) can remain in the biodiesel, (3) products of the reaction (e.g., glycerin, soaps) may not be completely removed from the biodiesel, (4) excess water that is used to&quot;wash&quot;the fuel may be left in the biodiesel fuel, and (5) the fuel can polymerize/oxidize due to long-term storage or exposure to moderate to high temperatures.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Possible Engine Problems when Using Biodiesel</h2>\r\n\r\n<p>Many problems have been reported by people using biodiesel fuel. Careful investigation indicates that most of these difficulties can be attributed to poor-quality biodiesel fuel and are almost identical to the problems caused by low-quality petroleum diesel. However, some of the problems (primarily cold-weather problems) are not due to poor fuel quality but are related to the inherent properties of biodiesel fuel. Fortunately, most of these problems can be avoided or minimized. Common engine problems when using biodiesel, their possible causes, and their solutions are presented below. This list is not meant to serve as an exhaustive repair manual but rather to give a sense of some of the performance issues related to biodiesel fuel.</p>\r\n', 'Biodiesel is an engine fuel that is created by chemically reacting fatty acids and alcohol.', 'Biodiesel', 0, '2020-02-26 05:57:23', '2020-02-26 05:57:23'),
(2, 2, 'What Is Pyrolysis Oil', 'what-is-pyrolysis-oil', '5e5600d832aa28.79329684.jpg', '<h3>Pyrolysis Oil</h3>\r\n\r\n<p>Sometimes also known as biocrude or bio-oil, is a synthetic fuel under investigation as substitute for petroleum. It is obtained by heating dried biomass without oxygen in a reactor at a temperature of about 500 &deg;C with subsequent cooling. Pyrolytic oil (or bio-oil) is a kind of tar and normally contains levels of oxygen too high to be considered a hydrocarbon. This high oxygen content results in non-volatility, corrosiveness, immiscibity with fossil fuels, thermal instability, and a tendency to polymerize when exposed to air. As such, it is distinctly different from petroleum products. Removing oxygen from bio-oil or nitrogen from algal bio-oil is called upgrading.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'There are few standards for pyrolysis oil because of limited efforts to produce it. One of the few standards is from ASTM.', 'Biodiesel', 0, '2020-02-26 05:23:36', '2020-02-26 05:23:36'),
(3, 2, 'Recycling Myths Busted', 'recycling-myths-busted', '5e560c9046f046.84856582.jpg', '<h1>What really happens to all the stuff you put in those blue bins?</h1>\r\n\r\n<p>Last Earth Day, I published a column in the <em>Washington Post</em> <a href=\"https://www.washingtonpost.com/outlook/five-myths/five-myths-about-recycling/2018/04/20/9971de66-43e6-11e8-8569-26fda6b404c7_story.html?utm_term=.59ac2965b64b\">on common recycling myths</a>. I received so many comments and emails in response, often asking additional questions, that I wanted to follow up with a new list here at National Geographic.</p>\r\n\r\n<p>The recycling industry is changing rapidly, as are advancements in materials science and product design. The field has an increasingly global footprint and is affected by complex forces, from oil prices to national policies and consumer preferences.</p>\r\n\r\n<p>As investor Rob Kaplan of Circulate Capital <a href=\"https://www.nationalgeographic.com/environment/2018/07/ocean-plastic-pollution-solutions/\">recently told National Geographic</a>, &ldquo;There&#39;s no silver bullet to stop <a href=\"https://news.nationalgeographic.com/2018/05/plastics-facts-infographics-ocean-pollution/\">plastic pollution</a>. We&#39;re not going to be able to recycle our way out of the problem, and we&#39;re not going to be able to reduce our way out of the problem.&rdquo; We have to pursue both those tracks while seeking new solutions at the same time, Kaplan noted, which is why his firm is raising tens of millions of dollars to invest in new litter cleanup efforts in the developing world.</p>\r\n', 'Mixed plastics are conveyed toward an optical sorter at a recycling plant. The industry is going through rapid changes, making it sometimes confusing for consumers.', 'Recycling', 0, '2020-02-26 06:13:36', '2020-02-26 06:13:36'),
(21, 12, 'Testing Post Holmes', 'testing-post-holmes', '5e575380a23805.05925014.jpg', '<h1>Lorem Ipsum</h1>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin maximus erat magna, et semper mi tincidunt at. Proin tincidunt nisi sed ipsum ullamcorper iaculis. Fusce sit amet fringilla arcu. Sed fermentum libero non lobortis iaculis. Integer quis diam et arcu tincidunt congue. Cras a accumsan ante. In hac habitasse platea dictumst. Curabitur auctor, turpis eu convallis bibendum, sapien nulla condimentum ante, sit amet blandit diam nibh ut ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus rhoncus dapibus dui eget condimentum. Praesent eleifend tortor massa, quis sodales mauris rutrum quis. Fusce vel felis egestas, dapibus velit vel, vehicula diam. Duis volutpat malesuada nulla, sit amet fermentum neque scelerisque vitae. Nunc mattis, lorem non interdum mattis, arcu ligula feugiat lacus, ut vehicula lectus metus vel diam. Vivamus sed euismod sapien, faucibus gravida leo.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/siklus/admin/img/post_image/176672687.png\" style=\"height:416px; width:650px\" /></p>\r\n\r\n<p>Morbi lobortis eu metus viverra blandit. Sed non fringilla nunc. Donec at pretium diam, vel sodales enim. Aenean malesuada luctus augue sodales lacinia. Proin nunc sapien, convallis quis gravida finibus, molestie ut ex. Nam feugiat leo eu diam dictum, id viverra tortor eleifend. Ut sed purus elementum, bibendum leo mattis, interdum metus. Nulla ante magna, eleifend et elit ac, feugiat egestas lectus. Sed lorem nisl, vehicula sit amet maximus sit amet, ullamcorper ut nisl. Integer efficitur et risus vel finibus. Pellentesque eleifend volutpat suscipit. Praesent porttitor placerat nulla vitae luctus.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '0', 0, '2020-02-27 05:28:32', '2020-02-27 05:28:32');

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
(2, 'gili', 'gili@mail.com', 'Admin', '202cb962ac59075b964b07152d234b70', '', '2020-02-23 08:47:16', '2020-02-23 08:47:16'),
(12, 'Jacob Holmes', 'jacob.holmes@siklus.co.id', 'Admin', '614adfd35cdab721e7bcab7363649c11', '5e575234c609c2.85882104.jpeg', '2020-02-27 05:23:00', '2020-02-27 05:23:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
