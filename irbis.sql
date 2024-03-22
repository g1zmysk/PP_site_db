-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 22 2024 г., 15:16
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `irbis`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id_a` int(5) NOT NULL,
  `id_topic` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `text` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `login` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `text`, `date`, `login`) VALUES
(20, 'Попытка входа: удачный вход', '2024-03-22 13:51:08', 'g1zmo'),
(21, 'Попытка входа: удачный вход', '2024-03-22 13:52:51', 'vans'),
(22, 'Попытка входа: удачный вход', '2024-03-22 16:53:05', 'vans'),
(23, 'Попытка входа: неудачный вход', '2024-03-22 16:53:54', 'vnas'),
(24, 'Попытка входа: неудачный вход', '2024-03-22 16:54:26', '');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `opis` varchar(128) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `price` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `opis`, `foto`, `price`) VALUES
(1, 'Газовый котел «Хопер 100» с КСУБ 20.10', 'погодозависимый, Тип: КСВа, Мощность: 96.7 кВт, Отапливаемая площадь: 1000 м², Производство: Россия', 'good1.png', 198240),
(2, 'Газовый котел «Хопер 100» с КСУБ 20.05', 'энергозависимый, Тип: КСВа, Мощность: 96.7 кВт, Отапливаемая площадь: 1000 м², Производство: Россия', 'good1.png', 189000),
(3, 'Газовый котел «Хопер 80» с РГУ', 'энергонезависимый, Тип: КСВ, Мощность: 81.5 кВт, Отапливаемая площадь: 800 м², Производство: Россия', 'good2.png', 140460),
(4, 'Водогрейный котел «Барс 50» с КСУБ 20.10', 'погодозависимый, Тип: КСВа, Мощность: 47 кВт, Отапливаемая площадь: 500 м², Производство: Россия', 'good3.png', 158760),
(5, 'Водогрейный котел «Барс 500» с КСУБ 20.10 и модуля', 'погодозависимый, Тип: КСВам, Мощность: 490 кВт, Отапливаемая площадь: 5000 м², Производство: Россия', 'good3.png', 491400),
(6, 'Водогрейный котел «Барс 400» с КСУБ 20.15', 'погодозависимый, Тип: КСВа, Мощность: 400 кВт, Отапливаемая площадь: 4000 м², Производство: Россия', 'good4.png', 414840);

-- --------------------------------------------------------

--
-- Структура таблицы `quests`
--

CREATE TABLE `quests` (
  `id_q` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `answer` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id_topic` int(5) NOT NULL,
  `name_topic` varchar(50) NOT NULL,
  `quest` varchar(200) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(32) NOT NULL,
  `perm` varchar(15) NOT NULL DEFAULT 'user',
  `login` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `perm`, `login`, `pass`) VALUES
(8, 'Денис', 'denis.vinchester228@gmail.com', 'admin', 'g1zmo', '827ccb0eea8a706c4c34a16891f84e7b'),
(10, 'Иван', 'vans@mail.ru', 'user', 'vans', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Структура таблицы `uslugi`
--

CREATE TABLE `uslugi` (
  `id_u` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `opis` varchar(300) NOT NULL,
  `minprice` int(6) NOT NULL,
  `maxprice` int(6) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `uslugi`
--

INSERT INTO `uslugi` (`id_u`, `name`, `opis`, `minprice`, `maxprice`, `foto`) VALUES
(1, 'Диспетчеризация котельных и котлов', 'Система диспетчеризации котельных и котлов наружного размещения — одно из главных направлений деятельности котельного завода «Ирбис».', 12999, 23999, 'u1.png'),
(2, 'Пусконаладочные работы (ПНР)', 'Пусконаладочные работы (ПНР) — комплекс мероприятий по вводу в эксплуатацию смонтированного оборудования. ', 19999, 42999, 'u2.png'),
(3, 'Режимная наладка', 'Режимная наладка\r\nПАО «Завод котельного оборудования и отопительных систем БКМЗ» предлагает своим клиентам услуги по осуществлению режимной наладки оборудования.', 6999, 10999, 'u3.png'),
(4, 'Сервисное обслуживание', 'Сервисное (техническое) обслуживание — это полный комплекс работ, выполняемых с определенной периодичностью и направленных на обеспечение надежной и безаварийной работы котельной установки.', 4999, 7999, 'u4.png');

-- --------------------------------------------------------

--
-- Структура таблицы `zakaz`
--

CREATE TABLE `zakaz` (
  `id_z` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `zakaz`
--

INSERT INTO `zakaz` (`id_z`, `phone`, `id_user`) VALUES
(1, '+79081398774', 10),
(2, '89964510739', 10);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id_a`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`id_q`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id_topic`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`id_u`);

--
-- Индексы таблицы `zakaz`
--
ALTER TABLE `zakaz`
  ADD PRIMARY KEY (`id_z`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id_a` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `quests`
--
ALTER TABLE `quests`
  MODIFY `id_q` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id_topic` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `zakaz`
--
ALTER TABLE `zakaz`
  MODIFY `id_z` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
