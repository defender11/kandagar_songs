-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 14 2015 г., 14:35
-- Версия сервера: 5.1.72-2-log
-- Версия PHP: 5.3.16-1~dotdeb.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `songs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `archive`
--

CREATE TABLE IF NOT EXISTS `archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_url` text NOT NULL,
  `link_name` varchar(200) NOT NULL,
  `link_group` int(11) NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=137 ;

--
-- Дамп данных таблицы `links`
--

INSERT INTO `links` (`link_id`, `link_url`, `link_name`, `link_group`) VALUES
(78, 'https://www.youtube.com/watch?v=OncLZnWtuSw', 'Оригинал (видео)', 21),
(79, 'http://en.lyrsense.com/tom_jones/shes_a_lady', 'Текст песни / перевод', 21),
(80, 'https://www.youtube.com/watch?v=TMXehqqR8J8', 'Видео оригинал 2', 21),
(81, 'http://x-minus.org/track/98109/tom-jones-she-s-a-lady.html', 'Минусовка', 21),
(98, 'https://www.youtube.com/watch?v=vx2u5uUu3DE', 'Оригинал (видео)', 25),
(99, 'http://x-minus.org/track/10010/bon-jovi-it-s-my-life.html', 'Минусовка и текст', 25),
(100, 'https://www.youtube.com/watch?v=CS9OO0S5w2k', 'Оригинал (видео)', 27),
(101, 'http://x-minus.org/track/21087/village-people-ymca--минусовка.html', 'Минусовка (  бэк-вокал) и текст', 27),
(106, 'https://www.youtube.com/watch?v=iGaF4tKUl0o', 'Оригинал (видео)', 23),
(107, 'http://x-minus.org/track/51649/chris-norman-и-suzi-quatro-stumblin-in-минусовка.html', 'Минусовка', 23),
(117, 'https://www.youtube.com/watch?v=1EBw_da7BZk', 'Оригинал', 29),
(118, 'http://x-minus.org/track/37664/chris-rea-the-road-to-hell-минусовка.html', 'Минусовка и текст', 29),
(120, 'http://x-minus.org/track/202816/королева-наташа-stumblin-in.html', 'Текст', 23),
(123, 'https://www.youtube.com/watch?v=iZACBEW_B8s', 'Оригинал', 33),
(124, 'http://x-minus.org/track/21256/you-spin-me-round', 'Вариант минусовки', 33),
(125, 'http://en.lyrsense.com/dead_or_alive/you_spin_me_round_like_a_record', 'Текст', 33),
(126, 'https://www.youtube.com/watch?v=nPOy7TPjfkE', 'Оригинал (видео)', 35),
(127, 'http://x-minus.org/track/101685/bonnie-tyler-it-s-a-heartache.html', 'Минусовка', 35),
(128, 'https://www.youtube.com/watch?v=1y3TKv7Chk4', 'Оригинал', 37),
(129, 'https://www.youtube.com/watch?v=aH3Q_CZy968', 'оригинал', 39),
(131, 'https://www.youtube.com/watch?v=rkB5bM_54sc', 'Оригинал', 43),
(132, 'http://x-minus.org/track/75248/david-gray-sail-away.html', 'Минусовка и текст', 43),
(133, 'https://www.youtube.com/watch?v=m0AKJMGxwpE', 'Оригинал', 45),
(134, 'http://x-minus.org/track/19408/depeche-mode-enjoy-the-silence-минусовка.html', 'Минусовка', 45),
(135, 'http://x-minus.org/track/248581/enjoy-the-silence.html', 'Минусовка 2', 45),
(136, 'https://www.youtube.com/watch?v=HrxX9TBj2zY', 'Оригинал (видео)', 47);

-- --------------------------------------------------------

--
-- Структура таблицы `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `music` text NOT NULL,
  `about` text NOT NULL,
  `dt_add` varchar(19) NOT NULL,
  `dt_run` varchar(10) NOT NULL,
  `sort` int(11) NOT NULL,
  `archive` int(11) NOT NULL,
  `delete` int(11) NOT NULL,
  `url` text NOT NULL,
  `s_group` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Дамп данных таблицы `songs`
--

INSERT INTO `songs` (`id`, `name`, `music`, `about`, `dt_add`, `dt_run`, `sort`, `archive`, `delete`, `url`, `s_group`, `rating`) VALUES
(19, 'Игорь', 'Tom Jones - She''s a lady', 'undefined', '03-08-2015', 'undefined', 0, 0, 0, '', 21, 1),
(30, 'Игорь', 'Bon Jovi - It''s My Life ', 'undefined', '05-08-2015', 'undefined', 0, 0, 0, 'undefined', 25, 0),
(33, 'Игорь', 'Village People - YMCA', 'undefined', '07-08-2015', 'undefined', 0, 0, 0, 'undefined', 27, 0),
(39, 'Игорь', 'Chris Norman and Suzi Quatro - Stumblin'' In', 'undefined', '10-08-2015', 'undefined', 0, 0, 0, 'undefined', 23, 0),
(43, 'Катя', 'Chris Rea ‒ The Road To Hell', 'undefined', '11-08-2015', 'undefined', 0, 0, 0, 'undefined', 29, 0),
(47, 'Катя', 'Dead Or Alive ‒ You Spin Me Round', '', '12-08-2015', '', 0, 0, 0, '', 33, 0),
(48, 'Игорь', 'Bonnie Tyler - It''s A Heartache', '', '12-08-2015', '', 0, 0, 0, '', 35, 0),
(49, 'Sergey', 'Cambodia', '', '12-08-2015', '', 0, 0, 0, '', 37, 0),
(50, 'Sergey', 'Call Me (просто бомба)', '', '12-08-2015', '', 0, 0, 0, '', 39, 0),
(52, 'Катя', 'David Gray ‒ Sail Away', '', '14-08-2015', '', 0, 0, 0, '', 43, 0),
(53, 'Катя', 'Depeche Mode - Enjoy The Silence', '', '14-08-2015', '', 0, 0, 0, '', 45, 0),
(54, 'Игорь', 'Pink Floyd - Another Brick In The Wall', '', '14-08-2015', '', 0, 0, 0, '', 47, 0),
(55, 'Test', 'Test', '', '14-08-2015', '', 0, 1, 0, '', 49, 0),
(56, 'Test', 'Test', '', '14-08-2015', '', 0, 1, 0, '', 51, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(150) NOT NULL,
  `u_pass` varchar(15) NOT NULL,
  `u_key` int(4) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_pass`, `u_key`) VALUES
(1, 'as', 'as', 321),
(2, '1', '1', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
