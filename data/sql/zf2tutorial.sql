-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 07 月 27 日 13:14
-- 服务器版本: 5.1.69
-- PHP 版本: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `zf2tutorial`
--

-- --------------------------------------------------------

--
-- 表的结构 `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `quiztime` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=301 ;

--
-- 导出表中的数据 `album`
--

INSERT INTO `album` (`id`, `artist`, `title`, `quiztime`) VALUES
(1, 'The Military Wives', 'In My Dreams', 0000),
(2, 'Adele', '21', 0000),
(4, 'Lana Del Rey', 'Born To Die', 0000),
(5, 'Gotye', 'Making Mirrors', 0000),
(7, 'Bastille', 'Bad Blood', 0000),
(8, 'Bruno Mars', 'Unorthodox Jukebox', 0000),
(9, 'Emeli Sand', 'Our Version of Events (Special Edition)', 0000),
(10, 'Bon Jovi', 'What About Now (Deluxe Version)', 0000),
(11, 'Justin Timberlake', 'The 20/20 Experience (Deluxe Version)', 0000),
(12, 'Bastille', 'Bad Blood (The Extended Cut)', 0000),
(13, 'P!nk', 'The Truth About Love', 0000),
(14, 'Sound City - Real to Reel', 'Sound City - Real to Reel', 0000),
(15, 'Jake Bugg', 'Jake Bugg', 0000),
(16, 'Various Artists', 'The Trevor Nelson Collection', 0000),
(17, 'David Bowie', 'The Next Day', 0000),
(18, 'Mumford & Sons', 'Babel', 0000),
(19, 'The Lumineers', 'The Lumineers', 0000),
(20, 'Various Artists', 'Get Ur Freak On - R&B Anthems', 0000),
(21, 'The 1975', 'Music For Cars EP', 0000),
(22, 'Various Artists', 'Saturday Night Club Classics - Ministry of Sound', 0000),
(23, 'Hurts', 'Exile (Deluxe)', 0000),
(24, 'Various Artists', 'Mixmag - The Greatest Dance Tracks of All Time', 0000),
(25, 'Ben Howard', 'Every Kingdom', 0000),
(26, 'Stereophonics', 'Graffiti On the Train', 0000),
(27, 'The Script', '#3', 0000),
(28, 'Stornoway', 'Tales from Terra Firma', 0000),
(29, 'David Bowie', 'Hunky Dory (Remastered)', 0000),
(30, 'Worship Central', 'Let It Be Known (Live)', 0000),
(31, 'Ellie Goulding', 'Halcyon', 0000),
(32, 'Various Artists', 'Dermot O''Leary Presents the Saturday Sessions 2013', 0000),
(33, 'Stereophonics', 'Graffiti On the Train (Deluxe Version)', 0000),
(34, 'Dido', 'Girl Who Got Away (Deluxe)', 0000),
(35, 'Hurts', 'Exile', 0000),
(36, 'Bruno Mars', 'Doo-Wops & Hooligans', 0000),
(37, 'Calvin Harris', '18 Months', 0000),
(38, 'Olly Murs', 'Right Place Right Time', 0000),
(39, 'Alt-J (?)', 'An Awesome Wave', 0000),
(40, 'One Direction', 'Take Me Home', 0000),
(41, 'Various Artists', 'Pop Stars', 0000),
(42, 'Various Artists', 'Now That''s What I Call Music! 83', 0000),
(43, 'John Grant', 'Pale Green Ghosts', 0000),
(44, 'Paloma Faith', 'Fall to Grace', 0000),
(45, 'Laura Mvula', 'Sing To the Moon (Deluxe)', 0000),
(46, 'Duke Dumont', 'Need U (100%) [feat. A*M*E] - EP', 0000),
(47, 'Watsky', 'Cardboard Castles', 0000),
(48, 'Blondie', 'Blondie: Greatest Hits', 0000),
(49, 'Foals', 'Holy Fire', 0000),
(50, 'Maroon 5', 'Overexposed', 0000),
(51, 'Bastille', 'Pompeii (Remixes) - EP', 0000),
(52, 'Imagine Dragons', 'Hear Me - EP', 0000),
(53, 'Various Artists', '100 Hits: 80s Classics', 0000),
(54, 'Various Artists', 'Les Misrables (Highlights From the Motion Picture Soundtrack)', 0000),
(55, 'Mumford & Sons', 'Sigh No More', 0000),
(56, 'Frank Ocean', 'Channel ORANGE', 0000),
(57, 'Bon Jovi', 'What About Now', 0000),
(58, 'Various Artists', 'BRIT Awards 2013', 0000),
(59, 'Taylor Swift', 'Red', 0000),
(60, 'Fleetwood Mac', 'Fleetwood Mac: Greatest Hits', 0000),
(61, 'David Guetta', 'Nothing But the Beat Ultimate', 0000),
(62, 'Various Artists', 'Clubbers Guide 2013 (Mixed By Danny Howard) - Ministry of Sound', 0000),
(63, 'David Bowie', 'Best of Bowie', 0000),
(64, 'Laura Mvula', 'Sing To the Moon', 0000),
(65, 'ADELE', '21', 0000),
(66, 'Of Monsters and Men', 'My Head Is an Animal', 0000),
(67, 'Rihanna', 'Unapologetic', 0000),
(68, 'Various Artists', 'BBC Radio 1''s Live Lounge - 2012', 0000),
(69, 'Avicii & Nicky Romero', 'I Could Be the One (Avicii vs. Nicky Romero)', 0000),
(70, 'The Streets', 'A Grand Don''t Come for Free', 0000),
(71, 'Tim McGraw', 'Two Lanes of Freedom', 0000),
(72, 'Foo Fighters', 'Foo Fighters: Greatest Hits', 0000),
(73, 'Various Artists', 'Now That''s What I Call Running!', 0000),
(74, 'Swedish House Mafia', 'Until Now', 0000),
(75, 'The xx', 'Coexist', 0000),
(76, 'Five', 'Five: Greatest Hits', 0000),
(77, 'Jimi Hendrix', 'People, Hell & Angels', 0000),
(78, 'Biffy Clyro', 'Opposites (Deluxe)', 0000),
(79, 'The Smiths', 'The Sound of the Smiths', 0000),
(80, 'The Saturdays', 'What About Us - EP', 0000),
(81, 'Fleetwood Mac', 'Rumours', 0000),
(82, 'Various Artists', 'The Big Reunion', 0000),
(83, 'Various Artists', 'Anthems 90s - Ministry of Sound', 0000),
(84, 'The Vaccines', 'Come of Age', 0000),
(85, 'Nicole Scherzinger', 'Boomerang (Remixes) - EP', 0000),
(86, 'Bob Marley', 'Legend (Bonus Track Version)', 0000),
(87, 'Josh Groban', 'All That Echoes', 0000),
(88, 'Blue', 'Best of Blue', 0000),
(89, 'Ed Sheeran', '+', 0000),
(90, 'Olly Murs', 'In Case You Didn''t Know (Deluxe Edition)', 0000),
(91, 'Macklemore & Ryan Lewis', 'The Heist (Deluxe Edition)', 0000),
(92, 'Various Artists', 'Defected Presents Most Rated Miami 2013', 0000),
(93, 'Gorgon City', 'Real EP', 0000),
(94, 'Mumford & Sons', 'Babel (Deluxe Version)', 0000),
(95, 'Various Artists', 'The Music of Nashville: Season 1, Vol. 1 (Original Soundtrack)', 0000),
(96, 'Various Artists', 'The Twilight Saga: Breaking Dawn, Pt. 2 (Original Motion Picture Soundtrack', 0000),
(97, 'Various Artists', 'Mum - The Ultimate Mothers Day Collection', 0000),
(98, 'One Direction', 'Up All Night', 0000),
(99, 'Bon Jovi', 'Bon Jovi Greatest Hits', 0000),
(100, 'Agnetha Fltskog', 'A', 0000),
(101, 'Fun.', 'Some Nights', 0000),
(102, 'Justin Bieber', 'Believe Acoustic', 0000),
(103, 'Atoms for Peace', 'Amok', 0000),
(104, 'Justin Timberlake', 'Justified', 0000),
(105, 'Passenger', 'All the Little Lights', 0000),
(106, 'Kodaline', 'The High Hopes EP', 0000),
(107, 'Lana Del Rey', 'Born to Die', 0000),
(108, 'JAY Z & Kanye West', 'Watch the Throne (Deluxe Version)', 0000),
(109, 'Biffy Clyro', 'Opposites', 0000),
(110, 'Various Artists', 'Return of the 90s', 0000),
(111, 'Gabrielle Aplin', 'Please Don''t Say You Love Me - EP', 0000),
(112, 'Various Artists', '100 Hits - Driving Rock', 0000),
(113, 'Jimi Hendrix', 'Experience Hendrix - The Best of Jimi Hendrix', 0000),
(114, 'Various Artists', 'The Workout Mix 2013', 0000),
(115, 'The 1975', 'Sex', 0000),
(116, 'Chase & Status', 'No More Idols', 0000),
(117, 'Rihanna', 'Unapologetic (Deluxe Version)', 0000),
(118, 'The Killers', 'Battle Born', 0000),
(119, 'Olly Murs', 'Right Place Right Time (Deluxe Edition)', 0000),
(120, 'A$AP Rocky', 'LONG.LIVE.A$AP (Deluxe Version)', 0000),
(121, 'Various Artists', 'Cooking Songs', 0000),
(122, 'Haim', 'Forever - EP', 0000),
(123, 'Lianne La Havas', 'Is Your Love Big Enough?', 0000),
(124, 'Michael Bubl', 'To Be Loved', 0000),
(125, 'Daughter', 'If You Leave', 0000),
(126, 'The xx', 'xx', 0000),
(127, 'Eminem', 'Curtain Call', 0000),
(128, 'Kendrick Lamar', 'good kid, m.A.A.d city (Deluxe)', 0000),
(129, 'Michael Bubl', 'Crazy Love (Hollywood Edition)', 0000),
(130, 'Bon Jovi', 'Bon Jovi Greatest Hits - The Ultimate Collection', 0000),
(131, 'Rita Ora', 'Ora', 0000),
(132, 'g33k', 'Spabby', 0000),
(133, 'Various Artists', 'Annie Mac Presents 2012', 0000),
(134, 'David Bowie', 'The Platinum Collection', 0000),
(135, 'Bridgit Mendler', 'Ready or Not (Remixes) - EP', 0000),
(136, 'Dido', 'Girl Who Got Away', 0000),
(137, 'Various Artists', 'Now That''s What I Call Disney', 0000),
(138, 'The 1975', 'Facedown - EP', 0000),
(139, 'Kodaline', 'The Kodaline - EP', 0000),
(140, 'Various Artists', '100 Hits: Super 70s', 0000),
(141, 'Fred V & Grafix', 'Goggles - EP', 0000),
(142, 'Biffy Clyro', 'Only Revolutions (Deluxe Version)', 0000),
(143, 'Train', 'California 37', 0000),
(144, 'Ben Howard', 'Every Kingdom (Deluxe Edition)', 0000),
(145, 'Various Artists', 'Motown Anthems', 0000),
(146, 'Courteeners', 'ANNA', 0000),
(147, 'Johnny Marr', 'The Messenger', 0000),
(148, 'Rodriguez', 'Searching for Sugar Man', 0000),
(149, 'Jessie Ware', 'Devotion', 0000),
(150, 'Bruno Mars', 'Unorthodox Jukebox', 0000),
(151, 'Various Artists', 'Call the Midwife (Music From the TV Series)', 0000),
(152, 'David Bowie', 'The Next Day (Deluxe Version)', 0000),
(153, 'Bastille', 'Bad Blood', 0000),
(154, 'Bruno Mars', 'Unorthodox Jukebox', 0000),
(155, 'David Bowie', 'The Next Day (Deluxe Version)', 0000),
(156, 'Bastille', 'Bad Blood', 0000),
(157, 'Bruno Mars', 'Unorthodox Jukebox', 0000),
(158, 'Emeli Sand', 'Our Version of Events (Special Edition)', 0000),
(159, 'Bon Jovi', 'What About Now (Deluxe Version)', 0000),
(160, 'Justin Timberlake', 'The 20/20 Experience (Deluxe Version)', 0000),
(161, 'Bastille', 'Bad Blood (The Extended Cut)', 0000),
(162, 'P!nk', 'The Truth About Love', 0000),
(163, 'Sound City - Real to Reel', 'Sound City - Real to Reel', 0000),
(164, 'Jake Bugg', 'Jake Bugg', 0000),
(165, 'Various Artists', 'The Trevor Nelson Collection', 0000),
(166, 'David Bowie', 'The Next Day', 0000),
(167, 'Mumford & Sons', 'Babel', 0000),
(168, 'The Lumineers', 'The Lumineers', 0000),
(169, 'Various Artists', 'Get Ur Freak On - R&B Anthems', 0000),
(170, 'The 1975', 'Music For Cars EP', 0000),
(171, 'Various Artists', 'Saturday Night Club Classics - Ministry of Sound', 0000),
(172, 'Hurts', 'Exile (Deluxe)', 0000),
(173, 'Various Artists', 'Mixmag - The Greatest Dance Tracks of All Time', 0000),
(174, 'Ben Howard', 'Every Kingdom', 0000),
(175, 'Stereophonics', 'Graffiti On the Train', 0000),
(176, 'The Script', '#3', 0000),
(177, 'Stornoway', 'Tales from Terra Firma', 0000),
(178, 'David Bowie', 'Hunky Dory (Remastered)', 0000),
(179, 'Worship Central', 'Let It Be Known (Live)', 0000),
(180, 'Ellie Goulding', 'Halcyon', 0000),
(181, 'Various Artists', 'Dermot O''Leary Presents the Saturday Sessions 2013', 0000),
(182, 'Stereophonics', 'Graffiti On the Train (Deluxe Version)', 0000),
(183, 'Dido', 'Girl Who Got Away (Deluxe)', 0000),
(184, 'Hurts', 'Exile', 0000),
(185, 'Bruno Mars', 'Doo-Wops & Hooligans', 0000),
(186, 'Calvin Harris', '18 Months', 0000),
(187, 'Olly Murs', 'Right Place Right Time', 0000),
(188, 'Alt-J (?)', 'An Awesome Wave', 0000),
(189, 'One Direction', 'Take Me Home', 0000),
(190, 'Various Artists', 'Pop Stars', 0000),
(191, 'Various Artists', 'Now That''s What I Call Music! 83', 0000),
(192, 'John Grant', 'Pale Green Ghosts', 0000),
(193, 'Paloma Faith', 'Fall to Grace', 0000),
(194, 'Laura Mvula', 'Sing To the Moon (Deluxe)', 0000),
(195, 'Duke Dumont', 'Need U (100%) [feat. A*M*E] - EP', 0000),
(196, 'Watsky', 'Cardboard Castles', 0000),
(197, 'Blondie', 'Blondie: Greatest Hits', 0000),
(198, 'Foals', 'Holy Fire', 0000),
(199, 'Maroon 5', 'Overexposed', 0000),
(200, 'Bastille', 'Pompeii (Remixes) - EP', 0000),
(201, 'Imagine Dragons', 'Hear Me - EP', 0000),
(202, 'Various Artists', '100 Hits: 80s Classics', 0000),
(203, 'Various Artists', 'Les Misrables (Highlights From the Motion Picture Soundtrack)', 0000),
(204, 'Mumford & Sons', 'Sigh No More', 0000),
(205, 'Frank Ocean', 'Channel ORANGE', 0000),
(206, 'Bon Jovi', 'What About Now', 0000),
(207, 'Various Artists', 'BRIT Awards 2013', 0000),
(208, 'Taylor Swift', 'Red', 0000),
(209, 'Fleetwood Mac', 'Fleetwood Mac: Greatest Hits', 0000),
(210, 'David Guetta', 'Nothing But the Beat Ultimate', 0000),
(211, 'Various Artists', 'Clubbers Guide 2013 (Mixed By Danny Howard) - Ministry of Sound', 0000),
(212, 'David Bowie', 'Best of Bowie', 0000),
(213, 'Laura Mvula', 'Sing To the Moon', 0000),
(214, 'ADELE', '21', 0000),
(215, 'Of Monsters and Men', 'My Head Is an Animal', 0000),
(216, 'Rihanna', 'Unapologetic', 0000),
(217, 'Various Artists', 'BBC Radio 1''s Live Lounge - 2012', 0000),
(218, 'Avicii & Nicky Romero', 'I Could Be the One (Avicii vs. Nicky Romero)', 0000),
(219, 'The Streets', 'A Grand Don''t Come for Free', 0000),
(220, 'Tim McGraw', 'Two Lanes of Freedom', 0000),
(221, 'Foo Fighters', 'Foo Fighters: Greatest Hits', 0000),
(222, 'Various Artists', 'Now That''s What I Call Running!', 0000),
(223, 'Swedish House Mafia', 'Until Now', 0000),
(224, 'The xx', 'Coexist', 0000),
(225, 'Five', 'Five: Greatest Hits', 0000),
(226, 'Jimi Hendrix', 'People, Hell & Angels', 0000),
(227, 'Biffy Clyro', 'Opposites (Deluxe)', 0000),
(228, 'The Smiths', 'The Sound of the Smiths', 0000),
(229, 'The Saturdays', 'What About Us - EP', 0000),
(230, 'Fleetwood Mac', 'Rumours', 0000),
(231, 'Various Artists', 'The Big Reunion', 0000),
(232, 'Various Artists', 'Anthems 90s - Ministry of Sound', 0000),
(233, 'The Vaccines', 'Come of Age', 0000),
(234, 'Nicole Scherzinger', 'Boomerang (Remixes) - EP', 0000),
(235, 'Bob Marley', 'Legend (Bonus Track Version)', 0000),
(236, 'Josh Groban', 'All That Echoes', 0000),
(237, 'Blue', 'Best of Blue', 0000),
(238, 'Ed Sheeran', '+', 0000),
(239, 'Olly Murs', 'In Case You Didn''t Know (Deluxe Edition)', 0000),
(240, 'Macklemore & Ryan Lewis', 'The Heist (Deluxe Edition)', 0000),
(241, 'Various Artists', 'Defected Presents Most Rated Miami 2013', 0000),
(242, 'Gorgon City', 'Real EP', 0000),
(243, 'Mumford & Sons', 'Babel (Deluxe Version)', 0000),
(244, 'Various Artists', 'The Music of Nashville: Season 1, Vol. 1 (Original Soundtrack)', 0000),
(245, 'Various Artists', 'The Twilight Saga: Breaking Dawn, Pt. 2 (Original Motion Picture Soundtrack', 0000),
(246, 'Various Artists', 'Mum - The Ultimate Mothers Day Collection', 0000),
(247, 'One Direction', 'Up All Night', 0000),
(248, 'Bon Jovi', 'Bon Jovi Greatest Hits', 0000),
(249, 'Agnetha Fltskog', 'A', 0000),
(250, 'Fun.', 'Some Nights', 0000),
(251, 'Justin Bieber', 'Believe Acoustic', 0000),
(252, 'Atoms for Peace', 'Amok', 0000),
(253, 'Justin Timberlake', 'Justified', 0000),
(254, 'Passenger', 'All the Little Lights', 0000),
(255, 'Kodaline', 'The High Hopes EP', 0000),
(256, 'Lana Del Rey', 'Born to Die', 0000),
(257, 'JAY Z & Kanye West', 'Watch the Throne (Deluxe Version)', 0000),
(258, 'Biffy Clyro', 'Opposites', 0000),
(259, 'Various Artists', 'Return of the 90s', 0000),
(260, 'Gabrielle Aplin', 'Please Don''t Say You Love Me - EP', 0000),
(261, 'Various Artists', '100 Hits - Driving Rock', 0000),
(262, 'Jimi Hendrix', 'Experience Hendrix - The Best of Jimi Hendrix', 0000),
(263, 'Various Artists', 'The Workout Mix 2013', 0000),
(264, 'The 1975', 'Sex', 0000),
(265, 'Chase & Status', 'No More Idols', 0000),
(266, 'Rihanna', 'Unapologetic (Deluxe Version)', 0000),
(267, 'The Killers', 'Battle Born', 0000),
(268, 'Olly Murs', 'Right Place Right Time (Deluxe Edition)', 0000),
(269, 'A$AP Rocky', 'LONG.LIVE.A$AP (Deluxe Version)', 0000),
(270, 'Various Artists', 'Cooking Songs', 0000),
(271, 'Haim', 'Forever - EP', 0000),
(272, 'Lianne La Havas', 'Is Your Love Big Enough?', 0000),
(273, 'Michael Bubl', 'To Be Loved', 0000),
(274, 'Daughter', 'If You Leave', 0000),
(275, 'The xx', 'xx', 0000),
(276, 'Eminem', 'Curtain Call', 0000),
(277, 'Kendrick Lamar', 'good kid, m.A.A.d city (Deluxe)', 0000),
(278, 'Michael Bubl', 'Crazy Love (Hollywood Edition)', 0000),
(279, 'Bon Jovi', 'Bon Jovi Greatest Hits - The Ultimate Collection', 0000),
(280, 'Rita Ora', 'Ora', 0000),
(281, 'g33k', 'Spabby', 0000),
(282, 'Various Artists', 'Annie Mac Presents 2012', 0000),
(283, 'David Bowie', 'The Platinum Collection', 0000),
(284, 'Bridgit Mendler', 'Ready or Not (Remixes) - EP', 0000),
(285, 'Dido', 'Girl Who Got Away', 0000),
(286, 'Various Artists', 'Now That''s What I Call Disney', 0000),
(287, 'The 1975', 'Facedown - EP', 0000),
(288, 'Kodaline', 'The Kodaline - EP', 0000),
(289, 'Various Artists', '100 Hits: Super 70s', 0000),
(290, 'Fred V & Grafix', 'Goggles - EP', 0000),
(291, 'Biffy Clyro', 'Only Revolutions (Deluxe Version)', 0000),
(292, 'Train', 'California 37', 0000),
(293, 'Ben Howard', 'Every Kingdom (Deluxe Edition)', 0000),
(294, 'Various Artists', 'Motown Anthems', 0000),
(295, 'Courteeners', 'ANNA', 0000),
(296, 'Johnny Marr', 'The Messenger', 0000),
(297, 'Rodriguez', 'Searching for Sugar Man', 0000),
(298, 'Jessie Ware', 'Devotion', 0000),
(299, 'Bruno Mars', 'Unorthodox Jukebox', 0000),
(300, 'Various Artists', 'Call the Midwife (Music From the TV Series)', 0000);

-- --------------------------------------------------------

--
-- 表的结构 `bug`
--

CREATE TABLE IF NOT EXISTS `bug` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `description` text,
  `priority` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- 导出表中的数据 `bug`
--

INSERT INTO `bug` (`id`, `author`, `email`, `date`, `url`, `description`, `priority`, `status`) VALUES
(1, 'linmk', 'back1992@gmail.com', NULL, 'www.baidu.com', 'des', NULL, NULL),
(2, 'baobeican', 'cuicansky@163.com', NULL, NULL, NULL, NULL, NULL),
(5, 'baobeican', 'cuicansky@163.com', 12, 'www.baidu.com', 'des5', 'low', 'new'),
(4, 'baobeican', 'cuicansky@163.com', 12, 'http://weibo.com/ajaxlogin.php?framelogin=1&callback=parent.sinaSSOController.feedBackUrlCallBack', 'des3 ps', 'low', 'new'),
(6, 'linmk', 'back_1992@hotmail.com', 12, 'www.baidu.com', 'des lin', 'low', 'new'),
(7, 'baobeican', 'cuicansky@163.com', 0, 'www.baidu.com', 'des4', 'low', 'new'),
(8, 'linmk', 'cuicansky@163.com', 12, 'http://weibo.com/ajaxlogin.php?framelogin=1&callback=parent.sinaSSOController.feedBackUrlCallBack', '5', 'low', 'new'),
(9, 'linmk', 'cuicansky@163.com', 12, 'http://weibo.com/ajaxlogin.php?framelogin=1&callback=parent.sinaSSOController.feedBackUrlCallBack', '5', 'low', 'new'),
(10, 'baobeican', 'back1992@gmail.com', 12, 'http://weibo.com/ajaxlogin.php?framelogin=1&callback=parent.sinaSSOController.feedBackUrlCallBack', '56', 'low', 'new'),
(11, 'baobeican', 'cuicansky@163.com', 12, 'www.baidu.com', '60', 'low', 'new'),
(12, 'baobeican', 'cuicansky@163.com', 12, 'www.baidu.com', '61', 'low', 'new'),
(13, 'baobeican', 'cuicansky@163.com', 12, 'www.baidu.com', '61', 'low', 'new'),
(14, 'linmk2222222222222222', 'cuicansky@163.com', 12, 'www.baidu.com', '64', 'low', 'new');

-- --------------------------------------------------------

--
-- 表的结构 `bugs`
--

CREATE TABLE IF NOT EXISTS `bugs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `description` text,
  `priority` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `bugs`
--

INSERT INTO `bugs` (`id`, `author`, `email`, `date`, `url`, `description`, `priority`, `status`) VALUES
(1, 'linmk', 'back1992@gmail.com', NULL, 'www.baidu.com', 'des', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `content_nodes`
--

CREATE TABLE IF NOT EXISTS `content_nodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `node` varchar(50) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `content_nodes`
--


-- --------------------------------------------------------

--
-- 表的结构 `mp3`
--

CREATE TABLE IF NOT EXISTS `mp3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `mp3file` varchar(200) NOT NULL,
  `quiztime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- 导出表中的数据 `mp3`
--

INSERT INTO `mp3` (`id`, `area`, `title`, `mp3file`, `quiztime`) VALUES
(1, 'The Military Wives', 'In My Dreams', '', 0),
(3, 'Bruce Springsteen', 'Wrecking Ball (Deluxe)', '', 0),
(5, 'Gotye', 'Making Mirrors', '', 0),
(68, 'test', 'ok', './data/tmpuploads/mp3_51f228faef51a', 0),
(67, 'www', '111', './data/tmpuploads/mp3_51f2272626695', 0),
(66, 'www', '111', './data/tmpuploads/mp3_51f22708e576e', 0);

-- --------------------------------------------------------

--
-- 表的结构 `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `namespace` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `pages`
--

