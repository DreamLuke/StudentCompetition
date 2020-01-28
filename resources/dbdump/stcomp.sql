-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 05 2019 г., 12:06
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `stcomp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contestants`
--

CREATE TABLE `contestants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `contestants`
--

INSERT INTO `contestants` (`id`, `user_id`, `university_id`, `faculty_name`, `specialty_name`, `year`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'ФАМ', 'АПП', 3, '2019-03-26 22:00:00', '2019-04-01 09:00:45'),
(3, 6, 3, 'adsfasdf', 'dfadsfasdf', 4, '2019-03-28 06:50:27', '2019-03-28 06:50:27'),
(4, 7, 4, 'adsfasdf', 'dfadsfasdf', 4, '2019-03-28 06:52:54', '2019-03-28 06:52:54'),
(5, 8, 5, 'aaaaaaaaaaaaa', 'aaaaaaaaa', 4, '2019-03-28 06:57:59', '2019-03-28 06:59:13'),
(6, 9, 6, 'dfasfsadf', 'dsfasf', 3, '2019-03-28 07:00:52', '2019-03-28 07:00:52'),
(7, 10, 7, 'afasdf', 'asdfasdf', 3, '2019-03-28 07:03:10', '2019-03-28 07:03:10'),
(8, 11, 8, 'ФАМ', 'Специальность', 3, '2019-04-02 15:06:16', '2019-04-02 15:06:16');

-- --------------------------------------------------------

--
-- Структура таблицы `examinations`
--

CREATE TABLE `examinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expert_id` bigint(20) UNSIGNED NOT NULL,
  `paper_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `examinations`
--

INSERT INTO `examinations` (`id`, `expert_id`, `paper_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2019-04-05 03:28:23', '2019-04-05 03:28:23'),
(2, 1, 2, 2, '2019-04-05 05:31:17', '2019-04-05 05:31:17'),
(3, 1, 3, 3, '2019-04-05 05:31:49', '2019-04-05 05:31:49'),
(4, 1, 4, 4, '2019-04-05 05:32:15', '2019-04-05 05:32:15'),
(5, 1, 1, 5, '2019-04-05 06:02:50', '2019-04-05 06:02:50'),
(6, 1, 2, 6, '2019-04-05 06:03:18', '2019-04-05 06:03:18');

-- --------------------------------------------------------

--
-- Структура таблицы `experts`
--

CREATE TABLE `experts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `facility` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `practice` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `experts`
--

INSERT INTO `experts` (`id`, `user_id`, `facility`, `practice`, `created_at`, `updated_at`) VALUES
(1, 1, 'Министерство образования', 'Самый заслуженный эксперт', '2019-03-26 22:00:00', '2019-04-01 05:29:18');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_03_27_054512_create_roles_table', 1),
(3, '2019_03_27_054803_create_users_table', 1),
(4, '2019_03_27_061039_create_universities_table', 2),
(5, '2019_03_27_061522_create_contestants_table', 3),
(6, '2019_03_27_062146_create_experts_table', 3),
(7, '2019_03_27_062829_create_papers_table', 4),
(8, '2019_03_27_063403_create_scores_table', 5),
(9, '2019_03_27_065148_create_papers_table', 6),
(10, '2019_03_27_065402_create_scores_table', 7),
(11, '2019_03_27_065809_create_statuses_table', 8),
(12, '2019_03_27_070136_create_examinations_table', 9),
(13, '2019_03_27_070445_create_votes_table', 10),
(14, '2019_03_27_071130_create_supp_subjects_table', 11),
(15, '2019_03_27_071337_create_supp_contents_table', 12),
(16, '2019_03_27_071828_create_notifications_table', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paper_id` bigint(20) UNSIGNED NOT NULL,
  `contestant_id` bigint(20) UNSIGNED NOT NULL,
  `expert_id` bigint(20) UNSIGNED DEFAULT NULL,
  `notfn_content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `papers`
--

CREATE TABLE `papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contestant_id` bigint(20) UNSIGNED NOT NULL,
  `paper_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comnt_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'expert', '2019-03-26 22:00:00', '2019-03-26 22:00:00'),
(2, 'contestant', '2019-03-26 22:00:00', '2019-03-26 22:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expert_id` bigint(20) UNSIGNED NOT NULL,
  `paper_id` bigint(20) UNSIGNED NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'not', '2019-04-05 03:28:23', '2019-04-05 03:28:23'),
(2, 'not', '2019-04-05 05:31:17', '2019-04-05 05:31:17'),
(3, 'not', '2019-04-05 05:31:49', '2019-04-05 05:31:49'),
(4, 'not', '2019-04-05 05:32:15', '2019-04-05 05:32:15'),
(5, 'not', '2019-04-05 06:02:50', '2019-04-05 06:02:50'),
(6, 'not', '2019-04-05 06:03:18', '2019-04-05 06:03:18');

-- --------------------------------------------------------

--
-- Структура таблицы `supp_contents`
--

CREATE TABLE `supp_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `dialog_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `supp_subjects`
--

CREATE TABLE `supp_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `universities`
--

INSERT INTO `universities` (`id`, `university_name`, `created_at`, `updated_at`) VALUES
(1, 'ДГМА', '2019-03-26 22:00:00', '2019-03-30 14:45:52'),
(2, 'КПИ', '2019-03-28 06:41:14', '2019-03-28 06:41:14'),
(3, 'ХАИ', '2019-03-28 06:50:27', '2019-04-01 07:50:14'),
(4, 'МГУ', '2019-03-28 06:52:54', '2019-03-28 06:52:54'),
(5, 'СПГУ', '2019-03-28 06:57:59', '2019-03-28 06:59:13'),
(6, 'Сарбона', '2019-03-28 07:00:52', '2019-03-28 07:00:52'),
(7, 'Гарвард', '2019-03-28 07:03:10', '2019-03-28 07:03:10'),
(8, 'Оксфорд', '2019-04-02 15:06:16', '2019-04-02 15:06:16');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `full_name`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.ru', '$2y$10$HUauCKG2jEWO71XWqOiP6.3mSNgc8Inih7S0VH4TmrqYjU18AKGyu', 'Админ Админыч', 1, '2019-03-26 22:00:00', '2019-04-01 05:29:04'),
(2, 'student@student.ru', '$2y$10$/sZzI9NLfEPHqWVlGE18cu2MI9S0NPvL1JE4xS45VMRnqqHK5cDB2', 'Студент Студентович', 2, '2019-03-28 06:41:14', '2019-03-28 06:41:14'),
(6, 'test23@test.ru', '$2y$10$QtkYw8/5.H3V2e9leG95netWWrYMj7AGJuAV0bye5fCNb1k9IwJLe', 'sadfasdfadsf', 2, '2019-03-28 06:50:27', '2019-03-28 06:50:27'),
(7, 'test25@test.ru', '$2y$10$y5O8Arbv3HCX9Twoonr8EuCwKgNImaLiVReCqOgD6CqCLCqI0GZHq', 'FFFFsadfasdfadsf', 2, '2019-03-28 06:52:54', '2019-03-28 06:52:54'),
(8, 'proverka@proverka.ru', '$2y$10$qJvuf.WTfwq73cwZgnR6YuMffBUZXe6jB4B/4unHFp9nHlVawuEyy', 'asdfasdfsdfddd', 2, '2019-03-28 06:57:59', '2019-03-28 06:59:13'),
(9, 'fff@fff.ru', '$2y$10$90o2anxIvQw6CCwwq8TU9OWR3rTfIFhqAg3r5Jm8CRHwocvbDNRM2', 'dasfasfd', 2, '2019-03-28 07:00:52', '2019-03-28 07:00:52'),
(10, 'ppp@ppp.ru', '$2y$10$VjSjqdQ1oZE8ZFqyqGqiWu67Lvvmk5Z4vevpJHlZus/kIifhDCt0q', 'dasdfasdf', 2, '2019-03-28 07:03:10', '2019-03-28 07:03:10'),
(11, 'test55@test.ru', '$2y$10$b8S.idA1a.zbPaQhFzFk3erxN6wrcrFPArngxoMdQI/f9Plelo8KS', 'Тест Тестович', 2, '2019-04-02 15:06:16', '2019-04-02 15:06:16');

-- --------------------------------------------------------

--
-- Структура таблицы `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contestant_id` bigint(20) UNSIGNED NOT NULL,
  `paper_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contestants`
--
ALTER TABLE `contestants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contestants_user_id_foreign` (`user_id`),
  ADD KEY `contestants_university_id_foreign` (`university_id`);

--
-- Индексы таблицы `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examinations_expert_id_foreign` (`expert_id`),
  ADD KEY `examinations_paper_id_foreign` (`paper_id`),
  ADD KEY `examinations_status_id_foreign` (`status_id`);

--
-- Индексы таблицы `experts`
--
ALTER TABLE `experts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experts_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_paper_id_foreign` (`paper_id`),
  ADD KEY `notifications_contestant_id_foreign` (`contestant_id`),
  ADD KEY `notifications_expert_id_foreign` (`expert_id`);

--
-- Индексы таблицы `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `papers_contestant_id_foreign` (`contestant_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_expert_id_foreign` (`expert_id`),
  ADD KEY `scores_paper_id_foreign` (`paper_id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `supp_contents`
--
ALTER TABLE `supp_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supp_contents_subject_id_foreign` (`subject_id`);

--
-- Индексы таблицы `supp_subjects`
--
ALTER TABLE `supp_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supp_subjects_status_id_foreign` (`status_id`);

--
-- Индексы таблицы `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votes_contestant_id_foreign` (`contestant_id`),
  ADD KEY `votes_paper_id_foreign` (`paper_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contestants`
--
ALTER TABLE `contestants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `experts`
--
ALTER TABLE `experts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `papers`
--
ALTER TABLE `papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `supp_contents`
--
ALTER TABLE `supp_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `supp_subjects`
--
ALTER TABLE `supp_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `contestants`
--
ALTER TABLE `contestants`
  ADD CONSTRAINT `contestants_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `contestants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `examinations`
--
ALTER TABLE `examinations`
  ADD CONSTRAINT `examinations_expert_id_foreign` FOREIGN KEY (`expert_id`) REFERENCES `experts` (`id`),
  ADD CONSTRAINT `examinations_paper_id_foreign` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`),
  ADD CONSTRAINT `examinations_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Ограничения внешнего ключа таблицы `experts`
--
ALTER TABLE `experts`
  ADD CONSTRAINT `experts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_contestant_id_foreign` FOREIGN KEY (`contestant_id`) REFERENCES `contestants` (`id`),
  ADD CONSTRAINT `notifications_expert_id_foreign` FOREIGN KEY (`expert_id`) REFERENCES `experts` (`id`),
  ADD CONSTRAINT `notifications_paper_id_foreign` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`);

--
-- Ограничения внешнего ключа таблицы `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `papers_contestant_id_foreign` FOREIGN KEY (`contestant_id`) REFERENCES `contestants` (`id`);

--
-- Ограничения внешнего ключа таблицы `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_expert_id_foreign` FOREIGN KEY (`expert_id`) REFERENCES `experts` (`id`),
  ADD CONSTRAINT `scores_paper_id_foreign` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`);

--
-- Ограничения внешнего ключа таблицы `supp_contents`
--
ALTER TABLE `supp_contents`
  ADD CONSTRAINT `supp_contents_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `supp_subjects` (`id`);

--
-- Ограничения внешнего ключа таблицы `supp_subjects`
--
ALTER TABLE `supp_subjects`
  ADD CONSTRAINT `supp_subjects_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_contestant_id_foreign` FOREIGN KEY (`contestant_id`) REFERENCES `contestants` (`id`),
  ADD CONSTRAINT `votes_paper_id_foreign` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
