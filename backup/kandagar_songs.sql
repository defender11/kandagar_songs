-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 04 2015 г., 15:16
-- Версия сервера: 5.1.73
-- Версия PHP: 5.3.3-7+squeeze19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `kandagar_songs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(200) NOT NULL,
  `link_url` varchar(400) NOT NULL,
  `link_group` int(11) NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `links`
--

INSERT INTO `links` (`link_id`, `link_name`, `link_url`, `link_group`) VALUES
(1, 'test1', '', 1),
(2, 'test1', 'sddfafdsaf', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `music` text NOT NULL,
  `about` text NOT NULL,
  `dt_add` varchar(19) NOT NULL,
  `dt_run` varchar(19) NOT NULL,
  `url` text NOT NULL,
  `s_group` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `songs`
--

INSERT INTO `songs` (`id`, `name`, `music`, `about`, `dt_add`, `dt_run`, `url`, `s_group`, `rating`) VALUES
(1, 'Test', 'Test1', '', '08-04-2015', '', '', 0, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
