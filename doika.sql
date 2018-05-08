-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 08 2018 г., 22:02
-- Версия сервера: 5.7.11
-- Версия PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `doika`
--

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `company_title`, `company_active`, `created_at`, `updated_at`) VALUES
(30, 'смчсмчс', 1, '2018-03-25 14:31:55', '2018-03-25 14:31:55'),
(33, 'Кампания', 1, '2018-03-26 14:21:18', '2018-04-01 10:56:14'),
(25, 'Назва кампаніі.', 0, '2018-03-07 11:06:31', '2018-03-28 05:10:10'),
(34, 'Компания 27', 0, '2018-03-27 05:13:48', '2018-03-27 05:13:48'),
(35, 'Кампания_Кампания', 0, '2018-03-27 08:46:08', '2018-03-27 08:46:08'),
(36, 'Компания 5', 0, '2018-03-28 03:24:43', '2018-03-28 03:24:43'),
(37, '29-03-2018', 1, '2018-03-29 04:54:55', '2018-03-29 04:54:55');

-- --------------------------------------------------------

--
-- Структура таблицы `company_configurations`
--

CREATE TABLE `company_configurations` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required_amount` double NOT NULL,
  `company_progress_bar` tinyint(1) DEFAULT '1',
  `time_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `company_configurations`
--

INSERT INTO `company_configurations` (`id`, `company_id`, `photo`, `required_amount`, `company_progress_bar`, `time_start`, `time_end`, `created_at`, `updated_at`) VALUES
(28, 30, 'information_items_574.jpg', 123, NULL, '2012-08-07 21:00:00', '2018-04-19 21:00:00', '2018-03-25 14:31:55', '2018-03-31 12:05:40'),
(31, 33, '5019423948.jpg', 250, NULL, '2018-03-26 21:00:00', '2018-04-01 21:00:00', '2018-03-26 14:21:18', '2018-04-01 10:59:13'),
(32, 34, 'kofe-chashka-napitok-penka-serdtse.jpg', 900, NULL, '2018-03-28 21:00:00', '2018-05-30 21:00:00', '2018-03-27 05:13:48', '2018-03-28 05:10:00'),
(23, 25, 'default.jpg', 555, NULL, '2018-03-31 21:00:00', '2019-01-31 21:00:00', '2018-03-07 11:06:31', '2018-03-29 12:00:35'),
(33, 35, 'default.jpg', 1000, NULL, '2018-03-30 21:00:00', '2018-04-29 21:00:00', '2018-03-27 08:46:08', '2018-03-27 08:46:08'),
(34, 36, 'default.jpg', 150, NULL, '2018-02-28 21:00:00', '2018-03-30 21:00:00', '2018-03-28 03:24:43', '2018-03-28 03:24:43'),
(35, 37, 'serdtse_bukvy_lepestki_119318_1920x1080.jpg', 120, NULL, '2018-03-28 21:00:00', '2018-04-27 21:00:00', '2018-03-29 04:54:55', '2018-03-29 04:54:55');

-- --------------------------------------------------------

--
-- Структура таблицы `company_lang_informations`
--

CREATE TABLE `company_lang_informations` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `company_lang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_title_lang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_description_lang` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_currency_lang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required_amount_lang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_amount_lang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `donate_lang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_title_lang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_description_lang` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `company_lang_informations`
--

INSERT INTO `company_lang_informations` (`id`, `company_id`, `company_lang`, `company_title_lang`, `company_description_lang`, `company_currency_lang`, `required_amount_lang`, `other_amount_lang`, `donate_lang`, `payment_title_lang`, `payment_description_lang`, `created_at`, `updated_at`) VALUES
(23, 30, 'be', 'смчсмчс', 'ыфвы', 'BYN', 'Неабходная сума', 'Iншая сума', 'Ахвяруй!', 'Апiсанне спосабу аплаты', 'Тут будет хранится само описание способа оплаты на языке по умолчанию', '2018-03-25 14:31:55', '2018-03-25 14:31:55'),
(26, 33, 'be', 'Кампания', 'Проверяю работу компании', 'BYN', 'Неабходная сума', 'Iншая сума', 'Ахвяруй!', 'Апiсанне спосабу аплаты', 'Тут будет хранится само описание способа оплаты на языке по умолчанию', '2018-03-26 14:21:18', '2018-04-01 10:59:13'),
(27, 34, 'be', 'Компания 27', '123', 'BYN', 'Неабходная сума', 'Iншая сума', 'Ахвяруй!', 'Апiсанне спосабу аплаты', 'Тут будет хранится само описание способа оплаты на языке по умолчанию', '2018-03-27 05:13:48', '2018-03-27 05:13:48'),
(28, 35, 'be', 'Кампания_Кампания', '123', 'BYN', 'Неабходная сума', 'Iншая сума', 'Ахвяруй!', 'Апiсанне спосабу аплаты', 'Тут будет хранится само описание способа оплаты на языке по умолчанию', '2018-03-27 08:46:08', '2018-03-27 08:46:08'),
(18, 25, 'be', 'Назва кампаніі.', 'Апісанне кампаніі.', 'BYN', 'Неабходная сума', 'Iншая сума', 'Ахвяруй!', 'Апiсанне спосабу аплаты', 'Тут будет хранится само описание способа оплаты на языке по умолчанию', '2018-03-07 11:06:31', '2018-03-21 15:47:11'),
(29, 36, 'be', 'Компания 5', '589', 'BYN', 'Неабходная сума', 'Iншая сума', 'Ахвяруй!', 'Апiсанне спосабу аплаты', 'Тут будет хранится само описание способа оплаты на языке по умолчанию', '2018-03-28 03:24:43', '2018-03-28 03:24:43'),
(30, 37, 'be', '29-03-2018', '123456', 'BYN', 'Неабходная сума', 'Iншая сума', 'Ахвяруй!', 'Апiсанне спосабу аплаты', 'Тут будет хранится само описание способа оплаты на языке по умолчанию', '2018-03-29 04:54:55', '2018-03-29 04:54:55');

-- --------------------------------------------------------

--
-- Структура таблицы `doika_configurations`
--

CREATE TABLE `doika_configurations` (
  `id` int(10) UNSIGNED NOT NULL,
  `configuration_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `configuration_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `configuration_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `doika_configurations`
--

INSERT INTO `doika_configurations` (`id`, `configuration_name`, `configuration_value`, `configuration_active`, `created_at`, `updated_at`) VALUES
(1, 'lang', 'be', 1, NULL, NULL),
(2, 'currency_lang', 'BYN', 1, NULL, NULL),
(3, 'required_amount_lang', 'Неабходная сума', 1, NULL, NULL),
(4, 'other_amount_lang', 'Iншая сума', 1, NULL, NULL),
(5, 'donate_lang', 'Ахвяруй!', 1, NULL, NULL),
(6, 'payment_title_lang', 'Апiсанне спосабу аплаты', 1, NULL, NULL),
(7, 'payment_description_lang', 'Тут будет хранится само описание способа оплаты на языке по умолчанию', 1, NULL, NULL),
(20, 'color', '', 1, '2018-02-14 08:12:36', '2018-02-14 15:39:13'),
(18, 'id_market', '363', 1, '2018-02-14 08:12:36', '2018-02-14 15:39:13'),
(19, 'key_market', '4f585d2709776e53d080f36872fd1b63b700733e7624dfcadd057296daa37df6', 1, '2018-02-14 08:12:36', '2018-02-14 15:39:13'),
(17, 'token', '', 1, '2018-02-14 08:12:36', '2018-03-04 04:45:39'),
(25, 'color_top_banner', '', 1, '2018-03-28 19:44:30', '2018-05-08 18:36:04'),
(26, 'color_button_help', '', 1, '2018-03-28 19:44:30', '2018-05-08 18:36:04'),
(27, 'color_button_amount', '', 1, '2018-03-28 19:44:30', '2018-05-08 18:36:04'),
(28, 'default_password', '', 1, NULL, '2018-05-08 18:36:05'),
(29, 'is_test', 'true', 1, NULL, '2018-05-08 19:00:06');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_01_27_103255_create_companies_table', 1),
(2, '2018_01_27_104607_create_company_lang_informations_table', 1),
(3, '2018_01_28_210536_create_doika_configurations_table', 1),
(4, '2018_01_29_085252_create_payments_table', 1),
(5, '2018_01_29_090254_create_company_configurations_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `token_payment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `company_id`, `amount`, `token_payment`, `created_at`, `updated_at`) VALUES
(55, 25, 1, 'bb18b7c7-938d-4b27-a259-0ace08229d14', '2018-03-21 05:49:42', '2018-03-21 05:49:42'),
(56, 25, 5, 'df255ca7-e5b2-4cbf-b02d-8499306e7608', '2018-03-21 05:50:34', '2018-03-21 05:50:34'),
(57, 25, 5, 'f6970dd2-fd1b-4b7c-98ef-5b29e013730a', '2018-03-21 05:51:29', '2018-03-21 05:51:29'),
(58, 25, 1, 'f96bd1df-8002-4e58-ae5a-c1c5f5587773', '2018-03-21 05:55:11', '2018-03-21 05:55:11'),
(59, 25, 1, 'e55c9c90-5098-43fe-9088-d8f10ee086e1', '2018-03-21 05:56:37', '2018-03-21 05:56:37'),
(60, 25, 1, 'e707da5d-4020-4bf5-a812-da7676fd73b3', '2018-03-21 09:16:58', '2018-03-21 09:16:58'),
(61, 25, 1, '0dd8f959-1e5a-4eab-a112-d6e6626b583b', '2018-03-21 09:19:49', '2018-03-21 09:19:49'),
(62, 25, 5, '07766632-0a79-4310-89f4-3c47611ca94b', '2018-03-21 09:23:54', '2018-03-21 09:23:54'),
(63, 39, 50, '31442719-00cb-4d92-acf4-65daceab20e8', '2018-03-24 18:41:34', '2018-03-24 18:41:34'),
(64, 25, 2, 'd541f9e0-43f9-47d0-b725-d2c648004a96', '2018-03-24 19:02:13', '2018-03-24 19:02:13'),
(65, 39, 50, 'ec7fea55-d1f5-43bd-9d15-1558a53dd425', '2018-03-24 19:04:13', '2018-03-24 19:04:13'),
(66, 25, 3, '3f3cb5cb-e378-44e2-924d-f2f972a3ae97', '2018-03-25 04:19:54', '2018-03-25 04:19:54'),
(67, 25, 15, 'd552cf35-32f1-479b-8575-69a779d00254', '2018-03-25 05:09:18', '2018-03-25 05:09:18'),
(68, 25, 20, 'f7ee4a05-ce62-45f2-b186-f3fd2267c829', '2018-03-25 05:10:19', '2018-03-25 05:10:19'),
(69, 25, 74.74, 'badd5e62-3a78-4fae-aa35-facb2028a838', '2018-03-25 05:11:54', '2018-03-25 05:11:54'),
(70, 25, 5, '6f0c3d37-5f4a-4ba0-a46a-b81293b3c034', '2018-03-25 05:13:17', '2018-03-25 05:13:17'),
(71, 25, 20, '3beaed33-4e6a-4912-924e-b16343ac479a', '2018-03-25 05:14:20', '2018-03-25 05:14:20'),
(72, 25, 50, '1b848113-1670-4ac6-8fea-00cc43f20ba4', '2018-03-26 08:33:41', '2018-03-26 08:33:41'),
(73, 25, 20, '2a6871fd-37ec-4bec-adce-22f7fbbfdedf', '2018-03-26 13:54:06', '2018-03-26 13:54:06'),
(37, 25, 5, '6cfa546e-da8a-455a-9716-dfc18bba6565', '2018-03-16 16:34:12', '2018-03-16 16:34:12'),
(38, 25, 5, '7c72ba4a-8e95-427b-95f7-8070ea351d5d', '2018-03-17 06:34:07', '2018-03-17 06:34:07'),
(39, 25, 20, '5b60265d-d758-4781-95c1-ab20f7fde89c', '2018-03-18 07:41:46', '2018-03-18 07:41:46'),
(40, 25, 12.3, '6626677d-5cf6-4d81-897d-0e65fe9e3364', '2018-03-18 17:27:46', '2018-03-18 17:27:46'),
(41, 25, 50, '8a967c56-5ccb-4391-b13c-284e16357866', '2018-03-19 08:28:12', '2018-03-19 08:28:12'),
(42, 25, 20, '3d20798a-0174-4e27-8aa9-677e1db9f0f6', '2018-03-20 03:53:06', '2018-03-20 03:53:06'),
(43, 25, 95.95, '0329099e-8098-4ef5-8c2b-49e79ec1d5ed', '2018-03-20 05:39:32', '2018-03-20 05:39:32'),
(44, 25, 1.05, 'fb8997a8-5359-4860-a9c0-9ee987539579', '2018-03-20 13:57:34', '2018-03-20 13:57:34'),
(45, 25, 5, '5038af53-6279-4648-b903-cd5f3b51a29c', '2018-03-21 05:20:13', '2018-03-21 05:20:13'),
(46, 25, 5, '1bcba4f2-45ff-4c30-bb6b-12977e9bb7ab', '2018-03-21 05:22:35', '2018-03-21 05:22:35'),
(47, 25, 5, 'c416f539-c6f3-495c-9234-790dea823f1e', '2018-03-21 05:24:48', '2018-03-21 05:24:48'),
(48, 25, 1, '602a66c9-682c-44e0-90e5-69636a552e7f', '2018-03-21 05:26:32', '2018-03-21 05:26:32'),
(49, 25, 1, '9aee1689-7f7c-4117-a3aa-eeb1f875b3a7', '2018-03-21 05:34:34', '2018-03-21 05:34:34'),
(50, 25, 1, '1fd47039-db36-4825-9669-cf152462116f', '2018-03-21 05:36:51', '2018-03-21 05:36:51'),
(51, 25, 5, '844a02cc-4672-44ce-924f-40f7385d8d77', '2018-03-21 05:40:29', '2018-03-21 05:40:29'),
(52, 25, 1, 'fd437e2a-e9f3-489e-8ee6-b8edb885be28', '2018-03-21 05:43:49', '2018-03-21 05:43:49'),
(53, 25, 1, '43fa5079-3408-42d5-b188-b4e79a75d087', '2018-03-21 05:45:56', '2018-03-21 05:45:56'),
(54, 25, 1, 'caec7997-5fb6-43f8-8e8d-f50ed7e49f1f', '2018-03-21 05:47:04', '2018-03-21 05:47:04'),
(36, 25, 50, '8e93d188-c01c-4f9f-a7dd-a01cd4f38f1a', '2018-03-16 16:11:52', '2018-03-16 16:11:52'),
(35, 25, 20, '840e8819-3472-4842-90cc-deb720eb07c1', '2018-03-16 16:00:31', '2018-03-16 16:00:31'),
(34, 25, 50, '0d70681f-27d5-46fb-9bc7-27e5d9436db3', '2018-03-16 04:28:26', '2018-03-16 04:28:26'),
(33, 25, 95.95, 'a8533167-63a6-49c7-954d-6f4ebad9d370', '2018-03-16 04:22:24', '2018-03-16 04:22:24'),
(16, 1, 50, '38446001-8dee-45f2-8627-2a7a3612591e', '2018-03-11 14:53:26', '2018-03-11 14:53:26'),
(17, 1, 50, 'e5ddfdac-cf2e-4550-9ede-d4c6d9145677', '2018-03-11 19:44:17', '2018-03-11 19:44:17'),
(18, 1, 50, '755b855e-3959-4b4d-bbde-b16f5fe0daa5', '2018-03-11 19:54:01', '2018-03-11 19:54:01'),
(19, 1, 50, 'd13e3f27-2322-49d7-9935-1176b1bba3f3', '2018-03-11 20:07:34', '2018-03-11 20:07:34'),
(20, 1, 5, '136daea8-f4b3-4838-872b-d0c9b10b6fc5', '2018-03-12 04:40:38', '2018-03-12 04:40:38'),
(21, 1, 2, '2d633d64-d751-4964-ac9d-2dbdd90628f9', '2018-03-12 04:43:34', '2018-03-12 04:43:34'),
(22, 1, 78.7, '1c450cba-7feb-4c13-9cca-4ac85a57c083', '2018-03-12 04:55:12', '2018-03-12 04:55:12'),
(23, 1, 78.7, 'a14ec769-eeec-44c7-826f-61d139a10f79', '2018-03-12 04:56:15', '2018-03-12 04:56:15'),
(24, 1, 50, 'b2be3090-03dd-4122-80d8-8586b4f61f72', '2018-03-12 11:53:14', '2018-03-12 11:53:14'),
(25, 1, 20, '214d52d5-7ece-4f22-91e1-852d91d9da18', '2018-03-13 05:03:46', '2018-03-13 05:03:46'),
(26, 1, 78.7, '0a7acb9d-f4ee-4d74-b608-476bdc4f0a68', '2018-03-13 05:06:48', '2018-03-13 05:06:48'),
(27, 1, 50, '07ec6bfd-68b9-4366-bce6-e78c4d14f05d', '2018-03-13 05:13:52', '2018-03-13 05:13:52'),
(28, 21, 5, 'tyui', NULL, NULL),
(29, 21, 10, 'gfdgfd', NULL, NULL),
(30, 21, 5, 'tyui', NULL, NULL),
(31, 21, 10, 'gfdgfd', NULL, NULL),
(32, 25, 78.75, 'ffa7ac70-610f-4591-8eb1-715b1cd3956b', '2018-03-16 04:20:19', '2018-03-16 04:20:19'),
(74, 25, 20, '9902b5b9-d0a9-45c9-9ef6-8917567c6c62', '2018-03-27 04:18:01', '2018-03-27 04:18:01'),
(75, 25, 50, '31e3bb77-11da-4ac0-bed0-099d78cca7f5', '2018-03-27 04:23:56', '2018-03-27 04:23:56'),
(76, 25, 20, '9586badd-c30b-4d43-9d1e-1e3a7d7d67bb', '2018-03-27 04:33:00', '2018-03-27 04:33:00'),
(77, 25, 85, 'd23f2115-a2d9-412d-afc1-d33aa35927f4', '2018-03-28 03:07:20', '2018-03-28 03:07:20'),
(78, 25, 5, 'aa93c861-a7b3-4e72-8794-f248c0f5d41a', '2018-03-29 02:59:12', '2018-03-29 02:59:12'),
(79, 25, 20, '076cb913-5b80-4973-bec4-80bbcc53eca4', '2018-03-29 04:35:42', '2018-03-29 04:35:42'),
(80, 33, 5, '92c35081-a797-4014-bfca-40a37f1934df', '2018-03-31 16:25:28', '2018-03-31 16:25:28'),
(81, 33, 20, '12fa669d-aa9d-458d-8014-b7462c80d548', '2018-04-01 10:21:15', '2018-04-01 10:21:15'),
(82, 33, 5, 'cffeffbb-95aa-4665-8604-a4ac629f328b', '2018-04-01 10:25:41', '2018-04-01 10:25:41'),
(83, 33, 5, '69c8297d-0b66-48b0-844e-b2dd74508193', '2018-04-03 02:48:54', '2018-04-03 02:48:54');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'doika-user', 'tyubik@tut.by', '$2y$10$g9BFQ80hSBXpLimJMytRhuUVXhO5FkYva63afVG.geR7vR38CTgVW', 'YCr9vH2mjdD5Mc7VCSY0pY8ZKCwmW4QUR6b6ACjXbF3EQsMkFmNXJnjxVZU2', '2018-03-18 10:26:17', '2018-05-08 18:36:05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `company_configurations`
--
ALTER TABLE `company_configurations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_configurations_company_id_unique` (`company_id`);

--
-- Индексы таблицы `company_lang_informations`
--
ALTER TABLE `company_lang_informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_lang_informations_company_id_foreign` (`company_id`);

--
-- Индексы таблицы `doika_configurations`
--
ALTER TABLE `doika_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_company_id_foreign` (`company_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT для таблицы `company_configurations`
--
ALTER TABLE `company_configurations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT для таблицы `company_lang_informations`
--
ALTER TABLE `company_lang_informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `doika_configurations`
--
ALTER TABLE `doika_configurations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
