-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 21 2022 г., 15:25
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hardware`
--

-- --------------------------------------------------------

--
-- Структура таблицы `hardware_serial`
--

CREATE TABLE `hardware_serial` (
  `id` int NOT NULL,
  `hardware_type_id` int NOT NULL,
  `serial_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `hardware_serial`
--

INSERT INTO `hardware_serial` (`id`, `hardware_type_id`, `serial_number`) VALUES
(1, 2, '4FFLL9-9bb'),
(17, 2, '4FFLL9-9aa\r'),
(18, 1, 'GGAAAAAA9YY');

-- --------------------------------------------------------

--
-- Структура таблицы `hardware_type`
--

CREATE TABLE `hardware_type` (
  `id` int NOT NULL,
  `type_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type_mask` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `hardware_type`
--

INSERT INTO `hardware_type` (`id`, `type_name`, `type_mask`) VALUES
(1, 'TP-Link TL-WR74', 'XXAAAAAXAA'),
(2, 'D-Link DIR-300', 'NXXAAXZXaa'),
(3, 'D-Link DIR-300 S', 'NXXAAXZXXX');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `hardware_serial`
--
ALTER TABLE `hardware_serial`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hardware_type`
--
ALTER TABLE `hardware_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `hardware_serial`
--
ALTER TABLE `hardware_serial`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `hardware_type`
--
ALTER TABLE `hardware_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
