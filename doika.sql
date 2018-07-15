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
-- Структура таблицы `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `campaign_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `campaign_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `campaigns`
--

INSERT INTO `campaigns` (`id`, `campaign_title`, `campaign_active`, `created_at`, `updated_at`) VALUES
(1, 'Першая кампанія па збору сродкаў', 1, '2018-03-25 14:31:55', '2018-03-25 14:31:55');
-- --------------------------------------------------------

--
-- Структура таблицы `campaign_configurations`
--

CREATE TABLE `campaign_configurations` (
  `id` int(10) UNSIGNED NOT NULL,
  `campaign_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required_amount` double NOT NULL,
  `campaign_progress_bar` tinyint(1) DEFAULT '1',
  `time_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `campaign_configurations`
--

INSERT INTO `campaign_configurations` (`id`, `campaign_id`, `photo`, `required_amount`, `campaign_progress_bar`, `time_start`, `time_end`, `created_at`, `updated_at`) VALUES
(1, 1, '345x230.png', 123, NULL, '2012-08-07 21:00:00', '2018-04-19 21:00:00', '2018-03-25 14:31:55', '2018-03-31 12:05:40');

-- --------------------------------------------------------

--
-- Структура таблицы `campaign_lang_informations`
--

CREATE TABLE `campaign_lang_informations` (
  `id` int(10) UNSIGNED NOT NULL,
  `campaign_id` int(10) UNSIGNED NOT NULL,
  `campaign_lang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campaign_title_lang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `campaign_description_lang` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `campaign_currency_lang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required_amount_lang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_amount_lang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `donate_lang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_title_lang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_description_lang` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `campaign_lang_informations`
--

INSERT INTO `campaign_lang_informations` (`id`, `campaign_id`, `campaign_lang`, `campaign_title_lang`, `campaign_description_lang`, `campaign_currency_lang`, `required_amount_lang`, `other_amount_lang`, `donate_lang`, `payment_title_lang`, `payment_description_lang`, `created_at`, `updated_at`) VALUES
(1, 1, 'be', 'Першая кампанія па збору сродкаў', 'Збор сродкаў на добрыя справы', 'BYN', 'Неабходная сума', 'Iншая сума', 'Ахвяруй!', 'Апiсанне спосабу аплаты', 'Тут будет хранится само описание способа оплаты на языке по умолчанию', '2018-03-25 14:31:55', '2018-03-25 14:31:55');

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
(8, 'id_market', '363', 1, '2018-02-14 08:12:36', '2018-02-14 15:39:13'),
(9, 'key_market', '4f585d2709776e53d080f36872fd1b63b700733e7624dfcadd057296daa37df6', 1, '2018-02-14 08:12:36', '2018-02-14 15:39:13'),
(10, 'token', '', 1, '2018-02-14 08:12:36', '2018-03-04 04:45:39'),
(11, 'show_banner', '1', 1, NULL, '2018-05-08 19:00:06'),
(12, 'color_banner_background', '#f6f4f3', 1, '2018-03-28 19:44:30', '2018-05-08 18:36:04'),
(13, 'color_banner_help_background', '#f26443', 1, '2018-03-28 19:44:30', '2018-05-08 18:36:04'),
(14, 'color_banner_help_text', '#31383e', 1, '2018-03-28 19:44:30', '2018-05-08 18:36:04'),
(15, 'color_banner_help_text', '#31383e', 1, '2018-03-28 19:44:30', '2018-05-08 18:36:04'),
(16, 'color_module_background', 'rgba(231, 238, 244, 1)', 1, '2018-03-28 19:44:30', '2018-05-08 18:36:04'),
(17, 'color_module_buttons', 'rgba(148, 200, 64, 0.34)', 1, '2018-03-28 19:44:30', '2018-05-08 18:36:04'),
(18, 'default_password', '', 1, NULL, '2018-05-08 18:36:05'),
(19, 'is_test', '', 1, NULL, '2018-05-08 19:00:06');

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
(1, '2018_01_27_103255_create_campaigns_table', 1),
(2, '2018_01_27_104607_create_campaign_lang_informations_table', 1),
(3, '2018_01_28_210536_create_doika_configurations_table', 1),
(4, '2018_01_29_085252_create_payments_table', 1),
(5, '2018_01_29_090254_create_campaign_configurations_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `token_payment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `campaign_id`, `amount`, `token_payment`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 'bb18b7c7-938d-4b27-a259-0ace08229d14', '2018-03-21 05:49:42', '2018-03-21 05:49:42');

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
(2, 'doika-user', 'sample@sample.com', '$2y$10$g9BFQ80hSBXpLimJMytRhuUVXhO5FkYva63afVG.geR7vR38CTgVW', 'YCr9vH2mjdD5Mc7VCSY0pY8ZKCwmW4QUR6b6ACjXbF3EQsMkFmNXJnjxVZU2', '2018-03-18 10:26:17', '2018-05-08 18:36:05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `campaign_configurations`
--
ALTER TABLE `campaign_configurations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `campaign_configurations_campaign_id_unique` (`campaign_id`);

--
-- Индексы таблицы `campaign_lang_informations`
--
ALTER TABLE `campaign_lang_informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaign_lang_informations_campaign_id_foreign` (`campaign_id`);

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
  ADD KEY `payments_campaign_id_foreign` (`campaign_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `campaign_configurations`
--
ALTER TABLE `campaign_configurations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `campaign_lang_informations`
--
ALTER TABLE `campaign_lang_informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
