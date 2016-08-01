
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;


INSERT INTO `user` (`userID`, `firstName`, `lastName`, `email`, `password`) VALUES
(8, 'Tobi', 'Bent', 'tdog@fuzzypaws.com', '$2y$10$WulwQ9XpWZUqFQeh2CWTQOMzHM8r82YtfuJPEA2LtxagyFlusL0EK'),
(7, 'Marta', 'Chmielowska', 'mchmielowska@gmail.com', '$2y$10$pih9F5ZVNvlrEzay0BJcVuroXmm5Mz4wmD0I7LlQXYPzBjWUljbGq'),
(69, 'Ian', 'Bent', 'ianb@gmail.com', '$2y$10$6PqsXcWC/wnz.4SGhQ2.C.D/NrcTO/GNcSvxP6ghK.MRjPxJAMZDS'),
(70, 'Mikael', 'Paul', 'mpaul@gmail.com', '$2y$10$02UZd3utvNohXQbI6pCYEemt6V7dYVP7DIGaJxOAXHGFOneTNF8p.'),
(71, 'Zenon', 'Chmielowski', 'zenon.c@gmail.com', '$2y$10$YuQY9dmlVQ81ZKLFSAV/j.3kjtxB3A2H8.79Rg6ErWH0KRt51v0Wm'),
(72, 'Saba', 'TheDog', 'saba@gmail.com', '$2y$10$TLNYOVAxzc26muB8QPuc2.U3uFzsieMii1lJwiemOItrM8fPUnlfy'),
(73, 'Illidan', 'Stormrage', 'fel_nightelf@legion.com', '$2y$10$gWQK4UuRJgZu6MhLkFJEpejg2tLFeqYMjYEHDdfBxW7kPV4dwnQAu'),
(74, 'Malfurion', 'Stormrage', 'druid_nightelf@legion.com', '$2y$10$/fJ1sm.r3wB1MuKtfAAF3eA.0BZXBNM46a5jiz5oCyqj2xHqCv3gC');

