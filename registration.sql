-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 20 2016 г., 18:32
-- Версия сервера: 5.7.12-0ubuntu1
-- Версия PHP: 7.0.4-7ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `registration`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id_city` int(11) UNSIGNED NOT NULL,
  `id_country` int(11) UNSIGNED NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id_city`, `id_country`, `city_name`) VALUES
(1, 1, 'Киев'),
(2, 1, 'Харьков'),
(3, 1, 'Одесса'),
(4, 1, 'Днепропетровск'),
(5, 1, 'Запорожье'),
(6, 1, 'Львов'),
(7, 1, 'Кривой Рог'),
(8, 1, 'Николаев'),
(9, 1, 'Мариуполь'),
(10, 1, 'Винница'),
(11, 2, 'Варшава'),
(12, 2, 'Краков'),
(13, 2, 'Вроцлав'),
(14, 2, 'Лодзь'),
(15, 2, 'Познань'),
(16, 2, 'Гданьск'),
(17, 2, 'Щецин'),
(18, 2, 'Люблин'),
(19, 2, 'Катовице'),
(20, 2, 'Белосток'),
(21, 3, 'Берлин'),
(22, 3, 'Гамбург'),
(23, 3, 'Мюнхен'),
(24, 3, 'Кёльн'),
(25, 3, 'Штутгарт'),
(26, 3, 'Дюссельдорф'),
(27, 3, 'Дортмунд'),
(28, 3, 'Эссен'),
(29, 3, 'Бремен'),
(30, 3, 'Дрезден'),
(31, 4, 'Париж'),
(32, 4, 'Марсель'),
(33, 4, 'Лион'),
(34, 4, 'Тулуза'),
(35, 4, 'Ницца'),
(36, 4, 'Нант'),
(37, 4, 'Страсбур'),
(38, 4, 'Монпелье'),
(39, 4, 'Бордо'),
(40, 4, 'Лилль'),
(41, 5, 'Рим'),
(42, 5, 'Милан'),
(43, 5, 'Неаполь'),
(44, 5, 'Турин'),
(45, 5, 'Палермо'),
(46, 5, 'Генуя'),
(47, 5, 'Болонья'),
(48, 5, 'Флоренция'),
(49, 5, 'Бари'),
(50, 5, 'Катания'),
(51, 6, 'Мадрид'),
(52, 6, 'Барселона'),
(53, 6, 'Валенсия'),
(54, 6, 'Севилья'),
(55, 6, 'Малага'),
(56, 6, 'Мурсия'),
(57, 6, 'Бильбао'),
(58, 6, 'Аликанте'),
(59, 6, 'Вальядолид'),
(60, 6, 'Гранада');

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id_country` int(11) UNSIGNED NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id_country`, `country_name`) VALUES
(1, 'Украина'),
(2, 'Польша'),
(3, 'Германия'),
(4, 'Франция'),
(5, 'Италия'),
(6, 'Испания');

-- --------------------------------------------------------

--
-- Структура таблицы `invites`
--

CREATE TABLE `invites` (
  `invite` char(6) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `date_status` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `invites`
--

INSERT INTO `invites` (`invite`, `status`, `date_status`) VALUES
('245576', 0, '2016-05-19 08:50:38'),
('349842', 1, '2016-05-20 15:28:04'),
('475936', 0, '2016-05-19 08:50:38'),
('553731', 0, '2016-05-19 08:50:38'),
('666432', 1, '2016-05-20 15:00:26'),
('668227', 1, '2016-05-20 15:14:39'),
('769321', 0, '2016-05-19 08:50:38'),
('854365', 1, '2016-05-20 15:29:26'),
('885322', 1, '2016-05-20 15:31:05'),
('907539', 1, '2016-05-20 15:26:37');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `login` varchar(250) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `id_city` int(11) UNSIGNED NOT NULL,
  `invite` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id_city`),
  ADD KEY `id_country` (`id_country`),
  ADD KEY `id_country_2` (`id_country`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id_country`);

--
-- Индексы таблицы `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`invite`),
  ADD UNIQUE KEY `invite` (`invite`),
  ADD UNIQUE KEY `invite_2` (`invite`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `invite` (`invite`),
  ADD KEY `id_city` (`id_city`),
  ADD KEY `invite_2` (`invite`),
  ADD KEY `id_city_2` (`id_city`),
  ADD KEY `invite_3` (`invite`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id_city` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id_country` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `countries` (`id_country`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id_city`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`invite`) REFERENCES `invites` (`invite`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
