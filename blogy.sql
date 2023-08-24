-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: אוגוסט 24, 2023 בזמן 03:20 PM
-- גרסת שרת: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogy`
--

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'eviatar', 'admin@gamil.com', '$2y$10$caz1lrtIgXG3vI9TNXV02.wygYK3f/WcUw6odkdWIfgH76FYn8VO6', '2023-08-23 17:02:49', '2023-08-23 20:55:06'),
(2, 'admin.a@gamil.com', 'admin.a@gamil.com', '$2y$10$G0dmA1HCyg0vcf/P9ubTB.qM6omuxUi3sWHtiAIj8rZDwnTCIq0je', '2023-08-23 17:56:07', '2023-08-23 17:56:07'),
(3, 'admin.b@gamil.com', 'admin.b@gamil.com', '$2y$10$OPRY.UN/46NweC/W/c3mn.Rx1zZMK0JZGlUzzQ9i./PAWAFPpu0Qm', '2023-08-23 17:57:30', '2023-08-23 17:57:30');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Food', '2023-08-22 10:44:33'),
(2, 'business', '2023-08-22 10:44:33'),
(4, 'politics', '2023-08-22 10:44:33'),
(5, 'travel', '2023-08-22 10:44:33'),
(6, 'test', '2023-08-24 10:35:12');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `post_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `user_name`, `post_id`, `created_at`) VALUES
(1, 'comment num 1', 1, 'Eviatar Duany', 2, '2023-08-22 12:29:22'),
(2, 'comment num 2', 1, 'Eviatar Duany', 2, '2023-08-22 12:29:22'),
(3, 'comment num 1', 2, 'Eviatar Duany', 2, '2023-08-22 12:29:38'),
(4, 'comment num 2', 3, 'Eviatar Duany', 2, '2023-08-22 12:29:38'),
(5, 'asdf wf asd fd fds fdscsvcvdxsnv ds e fd fs', 1, 'eviatar', 21, '2023-08-22 14:29:02'),
(6, 'new Comment after redirct', 1, 'eviatar', 21, '2023-08-22 14:44:31'),
(7, 'abcd', 1, 'eviatar', 21, '2023-08-22 14:45:27'),
(8, 'asdas dwsa das', 1, 'eviatar', 1, '2023-08-22 21:19:28');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- הוצאת מידע עבור טבלה `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `description`, `category`, `user_id`, `user_name`, `created_at`) VALUES
(2, 'Startup vs corporate: What job suits you best?', 'hero_2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium nam quas inventore, ut iure iste modi eos adipisci ad ea itaque labore earum autem nobis et numquam, minima eius. Nam eius, non unde ut aut sunt eveniet rerum repellendus porro.\n\nSint ab voluptates itaque, ipsum porro qui obcaecati cumque quas sit vel. Voluptatum provident id quis quo. Eveniet maiores perferendis officia veniam est laborum, expedita fuga doloribus natus repellendus dolorem ab similique sint eius cupiditate necessitatibus, magni nesciunt ex eos.\n\nQuis eius aspernatur, eaque culpa cumque reiciendis, nobis at earum assumenda similique ut? Aperiam vel aut, ex exercitationem eos consequuntur eaque culpa totam, deserunt, aspernatur quae eveniet hic provident ullam tempora error repudiandae sapiente illum rerum itaque voluptatem. Commodi, sequi.\n\nQuibusdam autem, quas molestias recusandae aperiam molestiae modi qui ipsam vel. Placeat tenetur veritatis tempore quos impedit dicta, error autem, quae sint inventore ipsa quidem. Quo voluptate quisquam reiciendis, minus, animi minima eum officia doloremque repellat eos, odio doloribus cum.\n\nTemporibus quo dolore veritatis doloribus delectus dolores perspiciatis recusandae ducimus, nisi quod, incidunt ut quaerat, magnam cupiditate. Aut, laboriosam magnam, nobis dolore fugiat impedit necessitatibus nisi cupiditate, quas repellat itaque molestias sit libero voluptas eveniet omnis illo ullam dolorem minima.\n\nPorro amet accusantium libero fugit totam, deserunt ipsa, dolorem, vero expedita illo similique saepe nisi deleniti. Cumque, laboriosam, porro! Facilis voluptatem sequi nulla quidem, provident eius quos pariatur maxime sapiente illo nostrum quibusdam aliquid fugiat! Earum quod fuga id officia.\n\nIllo magnam at dolore ad enim fugiat ut maxime facilis autem, nulla cumque quis commodi eos nisi unde soluta, ipsa eius aspernatur sint atque! Nihil, eveniet illo ea, mollitia fuga accusamus dolor dolorem perspiciatis rerum hic, consectetur error rem aspernatur!\n\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus magni explicabo id molestiae, minima quas assumenda consectetur, nobis neque rem, incidunt quam tempore perferendis provident obcaecati sapiente, animi vel expedita omnis quae ipsa! Obcaecati eligendi sed odio labore vero reiciendis facere accusamus molestias eaque impedit, consequuntur quae fuga vitae fugit?', 'Food', 1, 'Eviatar Duany', '2023-08-21 12:52:30'),
(3, 'Thought you loved Python? Wait until you meet Rust', 'hero_3.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas', 'Food', 3, 'Evaiatr ', '2023-08-21 14:22:35'),
(4, 'Thought you loved Python? Wait until you meet Rust', 'img_1_sq.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.', 'business', 1, 'Eviatar Duany', '2023-08-21 15:20:50'),
(5, 'Thought you loved Python? Wait until you meet Rust', 'img_2_sq.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.', 'business', 1, 'Eviatar Duany', '2023-08-21 15:20:50'),
(6, 'Don’t assume your user data in the cloud is safe', 'img_5_vertical', 'orem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore\r\n                                    vel\r\n                                    voluptas', 'business', 1, 'Eviatar Duany', '2023-08-21 15:35:11'),
(7, 'Meta unveils fees on metaverse sales', 'hero_5.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel\r\n                                voluptas.', 'business', 1, 'Eviatar Duany', '2023-08-21 15:35:11'),
(8, 'Exploring Traditional Music and Dance', 'hero_1.jpg', ' Dive into the rich tapestry of cultural expression through traditional music and dance. Learn about the history, significance, and evolution of these art forms that have been passed down through generations.', 'culture', 1, 'Eviatar Duany', '2023-08-21 15:35:11'),
(9, 'Culinary Adventures: Global Street Food Delights', 'hero_2.jpg', ' Embark on a gastronomic journey as we explore the vibrant world of street food. From savory snacks to sweet treats, discover how street food reflects the diversity and flavors of cultures across the globe.', 'culture', 1, 'Eviatar Duany', '2023-08-21 15:35:11'),
(10, 'Unveiling Cultural Festivals: Colors and Celebrations', 'hero_3.jpg', 'Immerse yourself in the kaleidoscope of colors and festivities as we unveil the beauty and significance of cultural festivals around the world. From religious rituals to seasonal celebrations, explore the various ways cultures come together to honor traditions.', 'culture', 1, 'Eviatar Duany', '2023-08-21 16:13:37'),
(11, 'Timeless Artistry: Traditional Crafts from Around the World', 'hero_2.jpg', 'Delve into the world of traditional craftsmanship as we showcase remarkable creations handcrafted by artisans across different cultures. Discover the stories behind these intricate works of art that have stood the test of time.', 'culture', 1, 'Eviatar Duany', '2023-08-21 16:13:52'),
(12, 'Symbols of Belief: Sacred Places and Spiritual Practice', 'hero_3.jpg', 'Explore the spiritual diversity of cultures through their sacred places and rituals. Journey to temples, churches, mosques, and other places of worship to learn about the profound impact of religion on culture and identity.', 'culture', 1, 'Eviatar Duany', '2023-08-21 16:13:52'),
(13, 'Language and Identity: Expressions of Culture', 'hero_4.jpg', 'Uncover the intricate relationship between language and culture. From idioms to dialects, languages play a pivotal role in shaping cultural identity. Join us in exploring the nuances and beauty of linguistic diversity.', 'culture', 1, 'Eviatar Duany', '2023-08-21 16:13:52'),
(14, 'The Power of Diplomacy: Navigating International Relations', 'img_4_sq.jpg', 'Update Post Update Post Update Post Update Post Update Post Update Post\r\nUpdate Post Update Post Update Post Update Post Update Post Update Post\r\nUpdate Post Update Post Update Post Update Post Update Post Update Post\r\nDelve into the complex world of international diplomacy and the strategies nations employ to maintain peace and negotiate agreements. Explore historical examples and current challenges in global politics.', 'politics', 1, 'Eviatar Duany', '2023-08-21 07:00:00'),
(15, 'Political Ideologies Unveiled: From Liberalism to Conservatism', 'img_3_sq.jpg', 'Explore the spectrum of political ideologies that shape policies and governance. From the principles of liberalism and conservatism to socialism and beyond, discover the roots and impact of these beliefs on societies.\r\n\r\n\r\nUpdate Post\r\nUpdate Post', 'Food', 1, 'Eviatar Duany', '2023-08-21 07:15:00'),
(16, 'Power and Conflict: Geopolitics in a Changing World', 'img_5_sq.jpg', 'Examine the dynamics of global power and geopolitical conflicts. From territorial disputes to strategic alliances, gain insights into how nations navigate their interests on the international stage.', 'politics', 1, 'Eviatar Duany', '2023-08-21 09:00:00'),
(17, ' Election Dynamics: Unpacking Campaign Strategies and Voter Behavior', 'img_5_sq.jpg', 'Dive into the world of elections, from campaign strategies that politicians employ to the factors influencing voter decisions. Explore the impact of social issues, economic conditions, and more on electoral outcomes.', 'politics', 1, 'Eviatar Duany', '2023-08-21 09:00:00'),
(18, 'The Evolution of International Organizations: UN, EU, and Beyond', 'img_3_sq.jpg', 'Take a deep dive into the world of international organizations. Explore the history, functions, and challenges faced by entities like the United Nations, European Union, and other global bodies.', 'politics', 1, 'Eviatar Duany', '2023-08-21 14:11:20'),
(19, 'Environmental Politics: Balancing Sustainability and Development', 'img_3_sq.jpg', 'Investigate the intersection of politics and the environment. Explore how governments and international agreements navigate the challenges of addressing climate change, resource management, and sustainable development.', 'politics', 1, 'Eviatar Duany', '2023-08-21 16:34:07'),
(20, 'Exploring Hidden Gems: Off-the-Beaten-Path Destinations', 'img_2_sq.jpg', 'Embark on a journey to discover lesser-known destinations that are often overlooked by tourists. Uncover the beauty, culture, and unique experiences that these hidden gems have to offer.', 'travel', 1, 'Eviatar Duany', '2023-08-21 16:50:43'),
(21, 'Adventure Awaits: Thrilling Outdoor Escapes', 'img_1_sq.jpg', 'Get your adrenaline pumping with exhilarating outdoor adventures! From mountain trekking to white-water rafting, explore the world\'s most exciting destinations for thrill-seekers.', 'travel', 1, 'Eviatar Duany', '2023-08-21 16:51:56'),
(25, 'title Create a New Post', 'WhatsApp Image 2022-03-29 at 18.46.37.jpeg', 'Create a New Post\nCreate a New Post\nCreate a New Post\nCreate a New Post\nCreate a New Post\nCreate a New Post', 'culture', 1, 'eviatar', '2023-08-22 20:34:08');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male-avatar.jpg',
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No bio yet',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- הוצאת מידע עבור טבלה `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `bio`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'eviatar', 'eviatar.duany@gmail.com', NULL, '$2y$10$caz1lrtIgXG3vI9TNXV02.wygYK3f/WcUw6odkdWIfgH76FYn8VO6', 'male-avatar.jpg', 'Update Profile Info', NULL, '2023-08-21 06:06:06', '2023-08-23 10:07:26'),
(2, 'userLSD@gmail.com', 'userLSD@gmail.com', NULL, '$2y$10$qhiVVxeT4SB5.AgpTBDFy.LIdkV8Ldg8SLJucfDe1PCmejo0iFhDu', 'male-avatar.jpg', 'No bio yet', NULL, '2023-08-21 09:01:18', '2023-08-21 09:01:18'),
(3, 'userLSD6@gmail.com', 'userLSD6@gmail.com', NULL, '$2y$10$i/NPl9T6t4Tkj/iqrnf6fuSYv7vrmmJ8GJ1i.x6nFk8lACdGe3cGq', 'male-avatar.jpg', 'No bio yet', NULL, '2023-08-21 09:01:55', '2023-08-21 09:01:55');

--
-- Indexes for dumped tables
--

--
-- אינדקסים לטבלה `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- אינדקסים לטבלה `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- אינדקסים לטבלה `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- אינדקסים לטבלה `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- אינדקסים לטבלה `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
