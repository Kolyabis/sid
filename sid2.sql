-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 18 2014 г., 12:52
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `sid2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `edrpo` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `data` datetime NOT NULL,
  `persona` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `key`, `login`, `pass`, `edrpo`, `mail`, `tel`, `data`, `persona`) VALUES
(1, '111111', 'Alex', '96e79218965eb72c92a549dd5a330112', '', '2z.dizayn@gmail.com', '2461192', '2014-12-15 10:31:00', 'admin'),
(2, '22222', 'User', 'e3ceb5881a0a1fdaad01296d7554868d', '', '2z.dizayn@gmail.com', '2461192', '2014-12-15 10:34:00', 'user'),
(31, 'c5a4e7e6882845ea7bb4d9462868219b', 'Test', '11111', '123123123', '2z.dizayn@gmail.com', '3333333', '2014-12-17 16:02:51', 'user'),
(32, 'cb57cdb7cc459dc6fbbc33f91485b5e2', 'Test', '11111', '123123123', '2z.dizayn@gmail.com', '3333333', '2014-12-17 16:03:40', 'user'),
(33, '7f278ad602c7f47aa76d1bfc90f20263', 'ссссссссссс', 'd41d8cd98f00b204e9800998ecf8427e', 'ссссссссссссс', '2z.dizayn@gmail.com', '256255', '2014-12-18 10:37:23', 'user'),
(34, '70d31b87bd021441e5e6bf23eb84a306', 'Александр', 'fcea920f7412b5da7be0cf42b8c93759', '12345678910', '2z.dizayn@gmail.com', '0638385636', '2014-12-18 10:39:10', 'user'),
(35, 'f1903f234d3ba4da38a18aa25751457d', 'Александрович', 'd41d8cd98f00b204e9800998ecf8427e', '123456789', '2z.dizayn@gmail.com', '2461192', '2014-12-18 10:39:36', 'user'),
(36, 'd360a502598a4b64b936683b44a5523a', 'Александрович', 'fcea920f7412b5da7be0cf42b8c93759', '123456789', '2z.dizayn@gmail.com', '2461192', '2014-12-18 10:59:31', 'user'),
(37, '9d752cb08ef466fc480fba981cfa44a1', 'Александр', 'bae5e3208a3c700e3db642b6631e95b9', '222222222222', '2z.dizayn@gmail.com', '2366336', '2014-12-18 12:11:17', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
