-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 11 2022 г., 15:56
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `forundb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banstatuses`
--

CREATE TABLE `banstatuses` (
  `idBan` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `banstatuses`
--

INSERT INTO `banstatuses` (`idBan`, `name`) VALUES
(1, 'Не забанен'),
(2, 'Забанен');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `idComment` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idTheme` int(11) NOT NULL,
  `discription` varchar(250) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`idComment`, `idUser`, `idTheme`, `discription`, `date`) VALUES
(1, 3, 7, 'Я просто оставлю это тут', '2022-12-07 12:17:58'),
(2, 3, 7, 'ergsdegrdrege', '2022-12-07 14:00:18'),
(3, 68, 7, 'Я люблю Мику', '2022-12-07 14:00:51'),
(4, 68, 10, 'erter5', '2022-12-07 13:23:58'),
(5, 68, 7, 'eryfgyusdrf', '2022-12-07 13:39:30'),
(6, 3, 9, 'Хорошая тема, мне нравится, побольше бы таких))', '2022-12-07 13:54:05'),
(7, 3, 2, 'rthfdhtfyjhf', '2022-12-07 14:00:52'),
(8, 3, 2, 'уыкпваыпыва', '2022-12-07 14:02:56'),
(9, 68, 2, 'куку, ты меня видишь?', '2022-12-07 14:03:41'),
(10, 68, 9, 'привет всем, я ничего не умею', '2022-12-07 15:06:26'),
(11, 68, 9, 'просто тестовый комментарий', '2022-12-08 11:26:30'),
(12, 74, 10, 'ку ку', '2022-12-08 12:44:17'),
(15, 3, 13, 'Я ТАК ОБОЖАЮ ТАМАГОЧИ, ПРОСТО НЕ МОГУ, СПАСИБО ТЕБЕ ЗА ГАЙД Я ТАК ДОЛГО ЕГО ЖДАЛ!!!!!!!!!!!!!!', '2022-12-08 18:10:57'),
(16, 3, 13, 'чаерсаер', '2022-12-10 15:44:36'),
(17, 74, 7, 'Так, Мику тоже отчасти аниме, по этому пусть будет', '2022-12-11 15:16:06'),
(18, 3, 13, 'гыг', '2022-12-11 15:22:08');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `idRole` int(11) NOT NULL,
  `nameRole` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`idRole`, `nameRole`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `idStatus` int(11) NOT NULL,
  `nameStatus` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`idStatus`, `nameStatus`) VALUES
(1, 'Ожидает модерацию'),
(2, 'Одобрено модерацией'),
(3, 'Отклонено модерацией');

-- --------------------------------------------------------

--
-- Структура таблицы `themes`
--

CREATE TABLE `themes` (
  `idTheme` int(11) NOT NULL,
  `nameTheme` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `discription` varchar(1000) DEFAULT NULL,
  `idStatus` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `themes`
--

INSERT INTO `themes` (`idTheme`, `nameTheme`, `date`, `discription`, `idStatus`, `idUser`) VALUES
(1, 'Вкусная еда', '2022-12-07 17:59:09', 'Я очень люблю кушать солянку. Ещё мне очень нравится запеченная в духовке рыба. Расскажите о там какие блюда нравятся вам)', 2, 68),
(2, 'Тестовоя тема', '2022-12-04 19:39:16', 'Lorem ipsum и тд', 2, 68),
(3, 'ыкепвкаепрвакерв', '2022-12-03 19:40:03', 'ирваервкаенрваерваер', 3, 68),
(4, 'вкп', '2022-12-04 19:50:38', 'квпвакпв', 3, 68),
(5, 'вкпвкпв', '2022-12-05 19:50:42', 'ыукепывпкыв', 3, 68),
(7, 'Хатсуне Мику', '2022-12-06 13:52:07', 'Гайд на косплей Хатсуне Мику в виде горничной  ( >\\\\\\<)', 2, 68),
(9, 'Тема для одобрения', '2022-12-06 14:22:44', 'Эта тема создана только для того чтобы её одобрили и больше ни для чего, просто для проверки функционала', 2, 3),
(10, 'ergdrthdrthdt', '2022-12-06 17:30:44', 'rs5yhdertyhrt5d6y', 3, 3),
(11, 'Просто тема', '2022-12-07 14:01:45', 'что хочу то и пишу, по тому что это мой сайт, я его сделал', 2, 3),
(12, 'Я админ', '2022-12-08 13:41:03', 'Я админ и я делаю всё что захочу, вы мне не указ, захочу и забаню вас навсегда', 2, 74),
(13, 'Тамагочи', '2022-12-08 18:06:55', 'Гайд на тамагочи', 2, 68),
(22, 'rtgrdtg', '2022-12-11 13:15:15', 'rdhthdftg', 3, 3),
(23, 'gersg', '2022-12-11 13:16:30', 'sedrgds', 3, 3),
(24, 'Аниме', '2022-12-11 14:56:28', 'Я считаю что аниме это лучшее что придумало человечество, все несогласные получают перманентный бан!', 1, 74);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `idRole` int(11) NOT NULL,
  `idBan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`idUser`, `email`, `name`, `surname`, `password`, `idRole`, `idBan`) VALUES
(1, 'вкепвае', 'вкпв', 'еарва', 'аверае', 2, 1),
(2, 'вкепвае', 'вкпв', 'еарва', 'аверае', 2, 1),
(3, 'jera8068@gmail.com', 'Егор', 'Кулаков', 'qwerty', 2, 1),
(62, 'sefse', 'sefs', 'sefse', 'sefse', 2, 1),
(64, 'кпвкпв', 'у4еуепу', 'вкпвкпк5', 'вкпукп', 2, 1),
(65, 'sefse', 'rgdg', 'ergfedrg', 'ergerg', 2, 2),
(66, 'fhbnfgyhn', 'fthdtfh', 'dfthdfth', 'fdthdfth', 2, 1),
(67, 'qwe', 'qwe', 'qwe', 'qwe', 2, 1),
(68, 'miss.lol1234@bk.ru', 'nika', 'kot', '1234@kot', 2, 2),
(69, 'уаыва', 'ыуафук', 'фуц4еку', 'фуц4еыу', 2, 1),
(70, 'sfes', 'asefas', 'asef', 'saef', 2, 2),
(71, 'erfgtertg', 'se4t5se', 'sergtsde', 'sedrgtserg', 2, 1),
(72, 'fersfgse', 'sertgse', 'sedr4tsd', 'sed4ts', 2, 1),
(73, 'пипяу', 'пипяу', 'пипяу', 'пипяу', 2, 2),
(74, 'admin', 'Я админ', 'Я всё могу', 'admin', 1, 1),
(80, 'jera8068@gmail.com', 'Челик', 'Человечий', 'qwerty1', 2, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `banstatuses`
--
ALTER TABLE `banstatuses`
  ADD PRIMARY KEY (`idBan`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `Comments_themes_null_fk` (`idTheme`),
  ADD KEY `Comments_users_null_fk` (`idUser`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`idStatus`);

--
-- Индексы таблицы `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`idTheme`),
  ADD KEY `themes_statuses_null_fk` (`idStatus`),
  ADD KEY `themes_users_null_fk` (`idUser`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `users_roles_idRole_fk` (`idRole`),
  ADD KEY `users_banstatuses_null_fk` (`idBan`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `banstatuses`
--
ALTER TABLE `banstatuses`
  MODIFY `idBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `idStatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `themes`
--
ALTER TABLE `themes`
  MODIFY `idTheme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Comments_themes_null_fk` FOREIGN KEY (`idTheme`) REFERENCES `themes` (`idTheme`),
  ADD CONSTRAINT `Comments_users_null_fk` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Ограничения внешнего ключа таблицы `themes`
--
ALTER TABLE `themes`
  ADD CONSTRAINT `themes_statuses_null_fk` FOREIGN KEY (`idStatus`) REFERENCES `statuses` (`idStatus`),
  ADD CONSTRAINT `themes_users_null_fk` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_banstatuses_null_fk` FOREIGN KEY (`idBan`) REFERENCES `banstatuses` (`idBan`),
  ADD CONSTRAINT `users_roles_idRole_fk` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
