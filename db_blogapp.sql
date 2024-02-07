-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 12:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `post_at` date DEFAULT current_timestamp(),
  `email` varchar(50) NOT NULL,
  `technology` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `banner`, `content`, `views`, `post_at`, `email`, `technology`) VALUES
(100, 'what is love', 'love.jpg', '&lt;h3&gt;Love is a profound and complex emotion, encompassing affection, compassion, and deep connection between individuals.&lt;/h3&gt; It transcends boundaries, fostering understanding, support, and shared joy. Love can be romantic, platonic, or familial, bringing warmth and meaning to life. It is a universal force that binds people together, creating lasting bonds.&lt;&gt;The Important Points about Love !!!.&lt;/&gt;&lt;ol&gt;&lt;li&gt;Complex Emotion: Love is a multifaceted and complex emotion that encompasses a range of feelings, including affection, compassion, warmth, and attachment. It goes beyond mere attraction and can be expressed in various forms, such as romantic love, platonic love, familial love, and self-love.&lt;/li&gt;&lt;li&gt;Connection and Bonding: Love often involves a deep connection and bonding between individuals. Whether it&#039;s between partners, friends, or family members, love creates a sense of unity and understanding. This connection fosters a supportive environment where individuals can share their joys, sorrows, and experiences.&lt;/li&gt;&lt;li&gt;Unconditional and Selfless: True love is often characterized by its unconditional and selfless nature. It means caring for someone without expecting anything in return and accepting them with their flaws and imperfections. This type of love is often associated with the willingness to sacrifice for the well-being of the loved one.&lt;/li&gt;&lt;li&gt;Nurturing Growth: Love has the power to inspire personal growth and development. In a loving relationship, individuals often encourage and support each other&#039;s aspirations and goals. This nurturing aspect of love helps individuals evolve and become the best versions of themselves.&lt;/li&gt;&lt;li&gt;Enduring and Resilient: Genuine love tends to be enduring and resilient, with the ability to withstand challenges and difficulties. It involves a commitment to weathering the storms of life together, fostering a sense of security and stability. Love, when built on a foundation of trust and communication, can endure the test of time.&lt;/li&gt;&lt;/ol&gt;', 0, '2024-01-29', 'john@4w.com', 'others'),
(101, 'Personal Growth', 'personal growth.png', 'Personal Growth:\r\n\r\nPersonal growth refers to the ongoing process of self-improvement, self-discovery, and the development of one&#039;s skills, knowledge, and abilities. It involves a conscious effort to enhance various aspects of your life, including emotional, intellectual, spiritual, and physical well-being. Personal growth is a lifelong journey that often involves reflection, goal-setting, and the willingness to step outside of one&#039;s comfort zone.', 0, '2024-01-29', 'john@4w.com', 'Healthcare'),
(103, 'Benefits Of  Education', 'education.jfif', 'Education is a transformative force with numerous benefits that extend beyond individual enrichment to societal progress. It equips individuals with essential knowledge, skills, and critical thinking abilities, fostering personal development and empowerment. Education opens doors to diverse opportunities, enhancing employability and economic prospects. Moreover, it promotes social cohesion by fostering understanding, tolerance, and cooperation among people of different backgrounds. A well-educated populace contributes to a more informed and engaged citizenry, laying the foundation for a robust democracy. Education also plays a vital role in addressing societal challenges, such as poverty, inequality, and health disparities. By nurturing creativity and innovation, education propels advancements in science, technology, and culture, driving overall societal progress. Ultimately, the benefits of education extend far beyond the individual, creating a ripple effect that positively impacts communities and nations, fostering a brighter and more equitable future for all.', 0, '2024-01-29', 'akalya@4w.com', 'Education'),
(104, 'what is AI', 'ai.jfif', 'Artificial Intelligence (AI) technology represents a groundbreaking frontier, revolutionizing various aspects of human life. It involves the development of intelligent machines capable of simulating human cognitive functions, such as learning, problem-solving, and decision-making. AI applications range from virtual assistants and chatbots to sophisticated algorithms powering recommendation systems, autonomous vehicles, and medical diagnostics. Its impact extends to industries like finance, healthcare, and manufacturing, streamlining processes and enhancing efficiency. However, ethical considerations and responsible AI implementation are crucial to navigate potential challenges. As AI continues to evolve, its transformative influence on society, economy, and daily life is poised to expand further.', 0, '2024-01-29', 'akalya@4w.com', ' AI'),
(105, 'Yoga', 'yoga.jfif', 'Yoga is a holistic practice that originated in ancient India, emphasizing the union of mind, body, and spirit. Combining physical postures (asanas), breath control (pranayama), and meditation, yoga promotes physical strength, flexibility, and mental well-being. It is renowned for reducing stress, improving concentration, and fostering a sense of inner peace. Beyond its physical benefits, yoga serves as a powerful tool for self-discovery and personal transformation. With diverse styles such as Hatha, Vinyasa, and Kundalini, yoga accommodates practitioners of all levels. Its timeless principles have made it a globally embraced practice, promoting holistic health and harmony in modern lifestyles.\r\n\r\n', 0, '2024-01-29', 'akalya@4w.com', 'Lifestyle Blog'),
(106, 'Mutton Biryani', 'mutton.jfif', 'South Indian Mutton Biryani is a flavorful and aromatic dish that showcases the rich culinary heritage of southern India. Comprising fragrant basmati rice, succulent mutton (goat meat), and a medley of spices, it is a celebration of diverse flavors. The rice is typically infused with a blend of aromatic spices, including cardamom, cinnamon, and cloves, while the mutton is marinated in a mixture of yogurt and spices for enhanced tenderness. Layers of rice and mutton are slow-cooked, allowing the flavors to meld and intensify. Garnished with fried onions, fresh coriander, and mint leaves, South Indian Mutton Biryani offers a delightful balance of spiciness and fragrance. Served with accompaniments like raita or a cooling cucumber salad, this biryani is a cherished culinary masterpiece, embodying the region&#039;s culinary finesse and love for aromatic, spicy delights.', 0, '2024-01-29', 'john@4w.com', 'Food Blog'),
(108, 'Caring for a baby', 'Ailum_LI (2).jpg', '1. Prioritize basic needs: Ensure warmth, hunger signs are met with safe feeding practices, and diaper changes are frequent.&lt;br&gt;\r\n2. Respond to cries: Soothe with rocking, cuddling, skin-to-skin contact, and calming words.&lt;br&gt;\r\n3. Encourage sleep: Create a consistent sleep routine, dim lights, and offer a safe sleep space.&lt;br&gt;\r\n4. Promote development: Engage in tummy time, talk and sing, provide safe toys, and respond to their cues.&lt;br&gt;\r\n5. Seek support: Connect with other parents, healthcare professionals, and resources for guidance and reassurance.', 0, '2024-02-01', '11@ssd.com', 'Baby Health'),
(109, 'Taste  Of Tea', 'Tea.jfif', 'The taste of tea is a delightful symphony of flavors, blending the robustness of earthy undertones with the subtle sweetness and a hint of astringency. Whether it&#039;s the comforting warmth of a well-steeped black tea or the delicate notes of a fragrant green tea, each sip is a sensory journey.', 0, '2024-02-05', '11@ssd.com', 'others'),
(110, 'Types of Train', 'train.jfif', 'AC Electric Train: Powered by alternating current (AC) through overhead lines or a third rail.\r\nDC Electric Train: Powered by direct current (DC) from third rails or batteries.\r\nHigh-Speed Rail (HSR): Often electric, utilizing pantographs to collect AC power from overhead lines.\r\nMaglev Train: Employs electromagnets for levitation and propulsion, creating a smooth, frictionless ride.', 0, '2024-02-05', '11@ssd.com', 'Train'),
(115, 'Value of News', 'image21-1.jpg', '&lt;ul&gt;&lt;li&gt;Accuracy and Reliability: &lt;br&gt;Is the information factual and based on trustworthy sources?&lt;/li&gt;\r\n&lt;li&gt;Relevance and Timeliness: Is the news relevant to your interests and current events?&lt;/li&gt;\r\n&lt;li&gt;Impact and Significance: Does the news have the potential to affect you or society as a whole?&lt;/li&gt;\r\n&lt;li&gt;Perspective and Bias: Who reported the news, and what is their potential bias?&lt;/li&gt;\r\n&lt;li&gt;Personal Interest: Does the news align with your individual interests and concerns?&lt;/li&gt;&lt;/ul&gt;', 0, '2024-02-07', 'Poovu@gmail.com', 'News'),
(116, 'Title', 'Baby (4).JPG', 'Main Content ', 0, '2024-02-07', 'glflowerking@gmail.com', 'Domain'),
(117, 'Title data', 'personal growth.png', 'Main Content Data', 0, '2024-02-07', 'glflowerking@gmail.com', 'Domain data');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `no_post` int(11) DEFAULT 0,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `name`, `phone`, `no_post`, `created_at`) VALUES
('11@ssd.com', 'Abc@123', 'aravinth', '11', 2, '2024-01-29'),
('akalya@4w.com', 'Abc@123', 'Akalya', '123456789', 0, '2024-01-29'),
('glflowerking@gmail.com', 'Abc@123', 'Ram', '9150371785', 2, '2024-02-07'),
('john@4w.com', 'Abc@123', 'John', '987654321', 0, '2024-01-29'),
('Poovu@gmail.com', 'Abc@123', 'Poovarasan', '9150371784', 1, '2024-02-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
