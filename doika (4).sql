-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 01 2018 г., 12:06
-- Версия сервера: 5.7.11
-- Версия PHP: 5.6.19

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
(21, 'Новая', 0, '2018-03-08 16:34:01', '2018-03-08 16:34:01'),
(22, 'Активненькая', 1, '2018-03-28 07:54:33', '2018-03-28 07:54:33');

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
  `time_start` timestamp NOT NULL,
  `time_end` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `company_configurations`
--

INSERT INTO `company_configurations` (`id`, `company_id`, `photo`, `required_amount`, `company_progress_bar`, `time_start`, `time_end`, `created_at`, `updated_at`) VALUES
(19, 21, 'default.jpg', 2000, NULL, '2018-02-28 21:00:00', '2018-03-29 21:00:00', '2018-03-08 16:34:02', '2018-03-28 08:18:54'),
(20, 22, 'default.jpg', 45622, NULL, '2018-03-13 21:00:00', '2018-04-04 21:00:00', '2018-03-28 07:54:33', '2018-03-28 07:54:33');

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
(14, 21, 'be', 'Новая', 'ывывааыаыва', 'BYN', 'Неабходная сума', 'Iншая сума', 'Ахвяруй!', 'Апiсанне спосабу аплаты', 'Тут будет хранится само описание способа оплаты на языке по умолчанию', '2018-03-08 16:34:02', '2018-03-08 16:34:02'),
(15, 22, 'be', 'Активненькая', 'ваываываыва', 'BYN', 'Неабходная сума', 'Iншая сума', 'Ахвяруй!', 'Апiсанне спосабу аплаты', 'Тут будет хранится само описание способа оплаты на языке по умолчанию', '2018-03-28 07:54:33', '2018-03-28 07:54:33');

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
(19, 'key_market', '4f585d2709776e53d080f36872fd1b63b700733e7624dfcadd057296daa37df6', 1, '2018-02-14 08:12:36', '2018-02-14 15:39:13'),
(17, 'token', '', 1, '2018-02-14 08:12:36', '2018-02-14 15:39:13'),
(21, 'id_market', '363', 1, '2018-03-23 18:35:06', '2018-03-23 18:35:06'),
(22, 'color_top_banner', '', 1, '2018-03-23 18:37:29', '2018-03-23 18:37:29'),
(23, 'color_button_help', '', 1, '2018-03-23 18:37:29', '2018-03-23 18:37:29'),
(24, 'color_button_amount', '', 1, '2018-03-23 18:37:29', '2018-03-23 18:37:29');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `company_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 21, 32, NULL, NULL),
(2, 21, 44, NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `company_configurations`
--
ALTER TABLE `company_configurations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `company_lang_informations`
--
ALTER TABLE `company_lang_informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `doika_configurations`
--
ALTER TABLE `doika_configurations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
