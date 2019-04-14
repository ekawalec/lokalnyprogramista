-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 30 Mar 2019, 17:45
-- Wersja serwera: 5.7.19
-- Wersja PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `lokalny`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review_id` int(11) NOT NULL,
  `content` varchar(512) NOT NULL,
  `author` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `review_id` (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `comment`
--

INSERT INTO `comment` (`id`, `review_id`, `content`, `author`, `created_at`) VALUES
(1, 1, 'asd asd asd asd asd', 'aaaaaaa@aaaa.com', 1553359683),
(3, 1, 'Test komnetarza\r\n', 'e.kawalec@gmail.com', 1553359747),
(4, 1, 'test kolejny komentarza', 'e.kawalec@gmail.com', 1553382840),
(8, 1, '[***] jasiu [***]zi stasiu', 'e.kawalec', 1553421326),
(9, 1, 'kuper penis  jasiu bąk', 'e.kawalec', 1553421872),
(10, 1, 'asdasd', 'asdasdasd', 1553423821);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `description` text,
  `tech_info` text,
  `poster` varchar(512) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `producer` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_active_idx` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `movie`
--

INSERT INTO `movie` (`id`, `title`, `description`, `tech_info`, `poster`, `year`, `active`, `producer`) VALUES
(1, 'Matrix', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae semper velit. Curabitur id elit tortor. Sed volutpat ligula id vehicula aliquam. Donec nunc odio, dictum vel risus nec, accumsan lobortis ligula. Sed egestas sodales blandit. Aenean mattis, sem sit amet pellentesque tincidunt, lorem eros scelerisque turpis, et blandit purus ante sed eros. Aenean aliquet sed eros dapibus euismod. Aliquam erat volutpat. Sed lectus augue, egestas a mattis eget, tincidunt ut tortor.', 'Directors: Lana Wachowski (as The Wachowski Brothers), Lilly Wachowski (as The Wachowski Brothers)\r\nWriters: Lilly Wachowski (as The Wachowski Brothers), Lana Wachowski (as The Wachowski Brothers)\r\nStars: Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss | See full cast & crew »', 'https://m.media-amazon.com/images/M/MV5BNzQzOTk3OTAtNDQ0Zi00ZTVkLWI0MTEtMDllZjNkYzNjNTc4L2ltYWdlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SY1000_CR0,0,665,1000_AL_.jpg', 1999, 1, ''),
(2, 'Incepcja', 'Donec vel tellus dapibus, faucibus erat et, finibus purus. Donec ut malesuada justo. Proin porttitor ut mauris nec volutpat. Sed convallis venenatis accumsan. Duis id mi tellus. Sed vel ligula commodo, molestie turpis quis, maximus massa. Ut vitae lectus diam. Etiam id rutrum eros, fermentum suscipit felis.', NULL, NULL, 2002, 1, ''),
(3, 'Star Wars', 'Donec vel tellus dapibus, faucibus erat et, finibus purus. Donec ut malesuada justo. Proin porttitor ut mauris nec volutpat. Sed convallis venenatis accumsan. Duis id mi tellus. Sed vel ligula commodo, molestie turpis quis, maximus massa. Ut vitae lectus diam. Etiam id rutrum eros, fermentum suscipit felis.', NULL, NULL, 2020, 0, ''),
(4, 'Twelve monkeys', 'In a future world devastated by disease, a convict is sent back in time to gather information about the man-made virus that wiped out most of the human population on the planet.\r\n', NULL, 'https://m.media-amazon.com/images/M/MV5BN2Y2OWU4MWMtNmIyMy00YzMyLWI0Y2ItMTcyZDc3MTdmZDU4XkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SY1000_CR0,0,671,1000_AL_.jpg', 1995, 0, ''),
(5, 'Green mile', 'The lives of guards on Death Row are affected by one of their charges: a black man accused of child murder and rape, yet who has a mysterious gift.', NULL, 'https://m.media-amazon.com/images/M/MV5BMTUxMzQyNjA5MF5BMl5BanBnXkFtZTYwOTU2NTY3._V1_.jpg', 1999, 1, ''),
(6, 'MPFC', NULL, NULL, NULL, 2003, 0, ''),
(7, 'adadasdasdasd', NULL, NULL, NULL, NULL, 0, ''),
(8, 'adadasdasdasd', NULL, NULL, NULL, NULL, 0, ''),
(9, 'adadasdasdasd', NULL, NULL, NULL, NULL, 0, ''),
(10, 'adadasdasdasd', NULL, NULL, NULL, NULL, 0, ''),
(11, 'adadasdasdasd', NULL, NULL, NULL, NULL, 0, ''),
(12, 'adadasdasdasd', NULL, NULL, NULL, NULL, 0, ''),
(13, 'adadasdasdasd', NULL, NULL, NULL, NULL, 0, ''),
(14, 'adadasdasdasd', NULL, NULL, NULL, NULL, 0, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `review_movie_id_fk` (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `review`
--

INSERT INTO `review` (`id`, `movie_id`, `title`, `content`) VALUES
(1, 1, 'Lorem', 'Duis pulvinar ex a ligula eleifend dictum. Vivamus a leo elit. Aenean vulputate diam feugiat nisl viverra finibus sed sed elit. Donec nec euismod diam. In dignissim, turpis et iaculis condimentum, arcu velit volutpat turpis, rhoncus egestas ante velit vel libero. Sed vitae pretium ipsum. Proin eu orci odio. Aliquam lorem elit, rutrum non quam a, rhoncus egestas dolor. Sed at velit condimentum, viverra quam a, sollicitudin orci. Donec porta metus ex, eu feugiat sem egestas tincidunt. Vivamus id dolor eget dui finibus volutpat in vitae sem. Duis quis mauris nisi. Nunc molestie dignissim sem id euismod. Integer condimentum ante eget odio venenatis, vel elementum neque rutrum. Nunc tortor risus, luctus nec massa vitae, congue ultricies urna.\r\n\r\nSed posuere nunc quis diam fermentum, ut porttitor ex blandit. Aenean malesuada, turpis at consectetur ultricies, ipsum tellus tincidunt tellus, eu interdum neque eros non tortor. Ut dolor lectus, ornare at odio at, commodo pretium felis. Phasellus vitae odio auctor, placerat tortor ut, sollicitudin augue. Mauris dictum magna sit amet risus posuere, a aliquam dui egestas. Nunc ex ex, sagittis vel tempor eu, vehicula in nisi. In consectetur lorem id odio pulvinar, vel sollicitudin ante consequat. Donec faucibus egestas odio, vel mattis orci mollis sit amet. Pellentesque consequat nec justo eget luctus. Sed rutrum posuere fermentum. Suspendisse congue velit ut ligula vehicula commodo.'),
(2, 1, 'Impsum', 'Fusce sem tellus, elementum non ante non, rutrum luctus magna. Integer et magna non orci condimentum volutpat. Ut ullamcorper cursus posuere. Nullam fringilla quam lacus, eget tincidunt urna congue nec. Sed vel dictum ex. Pellentesque convallis, nisi ut egestas efficitur, arcu ex placerat felis, sit amet lacinia arcu ante non metus. Etiam commodo mauris et condimentum bibendum. Nullam pulvinar, sem molestie scelerisque malesuada, enim sapien posuere leo, id vulputate ipsum lectus vitae ex.\r\n\r\nDuis pulvinar ex a ligula eleifend dictum. Vivamus a leo elit. Aenean vulputate diam feugiat nisl viverra finibus sed sed elit. Donec nec euismod diam. In dignissim, turpis et iaculis condimentum, arcu velit volutpat turpis, rhoncus egestas ante velit vel libero. Sed vitae pretium ipsum. Proin eu orci odio. Aliquam lorem elit, rutrum non quam a, rhoncus egestas dolor. Sed at velit condimentum, viverra quam a, sollicitudin orci. Donec porta metus ex, eu feugiat sem egestas tincidunt. Vivamus id dolor eget dui finibus volutpat in vitae sem. Duis quis mauris nisi. Nunc molestie dignissim sem id euismod. Integer condimentum ante eget odio venenatis, vel elementum neque rutrum. Nunc tortor risus, luctus nec massa vitae, congue ultricies urna.\r\n\r\nSed posuere nunc quis diam fermentum, ut porttitor ex blandit. Aenean malesuada, turpis at consectetur ultricies, ipsum tellus tincidunt tellus, eu interdum neque eros non tortor. Ut dolor lectus, ornare at odio at, commodo pretium felis. Phasellus vitae odio auctor, placerat tortor ut, sollicitudin augue. Mauris dictum magna sit amet risus posuere, a aliquam dui egestas. Nunc ex ex, sagittis vel tempor eu, vehicula in nisi. In consectetur lorem id odio pulvinar, vel sollicitudin ante consequat. Donec faucibus egestas odio, vel mattis orci mollis sit amet. Pellentesque consequat nec justo eget luctus. Sed rutrum posuere fermentum. Suspendisse congue velit ut ligula vehicula commodo.\r\n\r\nProin vitae ante vel leo sagittis viverra. Nulla tellus urna, elementum id odio a, malesuada pulvinar dui. Sed vestibulum aliquam rhoncus. Quisque turpis turpis, tempor ut risus vel, semper dictum arcu. Morbi sit amet lacus ac nisl scelerisque porta. Nulla pellentesque risus sit amet diam fringilla faucibus. Mauris pulvinar eleifend rhoncus. Ut eget quam vel sapien venenatis luctus sit amet elementum augue. In ac accumsan nibh, id rutrum tellus. Mauris nec commodo neque, vel tincidunt erat. Nunc ac nulla leo. Interdum et malesuada fames ac ante ipsum primis in faucibus.'),
(3, 1, 'Dolor', 'Nullam tincidunt gravida purus, ut porta enim molestie ut. In rhoncus dapibus ligula, et ultricies diam tincidunt nec. Curabitur id enim mauris. Pellentesque lacus diam, vulputate non venenatis sed, sollicitudin nec orci. Curabitur molestie dignissim leo quis mollis. Nam dapibus ipsum nec justo tempor imperdiet. Pellentesque tellus leo, consectetur sit amet lacus ac, mattis lobortis ligula.\r\n\r\nIn in mauris cursus, rhoncus felis a, porta tortor. Aliquam erat volutpat. Sed eros erat, porta id hendrerit in, interdum sit amet turpis. Proin faucibus condimentum nulla, non laoreet lectus molestie vitae. Integer et accumsan enim. Etiam ex ipsum, porttitor non augue vel, ultricies pharetra nulla. Maecenas bibendum sollicitudin imperdiet. Nulla in facilisis elit, vitae viverra magna. Proin a rhoncus ex, at condimentum risus.');

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `review` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
