-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 15 Novembre 2017 à 08:37
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet-5`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `header` text NOT NULL,
  `content` longtext NOT NULL,
  `author` varchar(32) NOT NULL,
  `publication` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `blog`
--

INSERT INTO `blog` (`id`, `title`, `header`, `content`, `author`, `publication`, `last_update`) VALUES
(1, 'Lorem ipsum dolor sit amet', 'Excepteur sint occaecat cupidatat non proident', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'Mathieu', '2017-10-31 11:38:53', '2017-11-15 08:36:41'),
(2, 'Maecenas posuere consequat ante', 'Eu gravida libero convallis ullamcorper', 'Aliquam viverra iaculis magna, nec elementum velit commodo a. Pellentesque erat augue, dignissim lobortis massa eget, lacinia tempor libero. Nam felis mi, egestas sed ante a, pharetra tincidunt eros. Quisque vitae porttitor dolor. Nam gravida neque eros, ac porttitor ligula tempor eget. Cras et orci in nibh mollis aliquam at quis massa. Duis faucibus mauris ipsum, eu eleifend libero dignissim ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lacus ante, maximus vitae felis vitae, congue sagittis augue. Nulla vulputate arcu eu velit luctus, id commodo mauris luctus. Sed eu placerat erat, sed convallis nibh. Cras condimentum tortor in tincidunt mollis.\r\n\r\nIn placerat vel ante at imperdiet. Curabitur porttitor efficitur sem, at accumsan orci laoreet et. Nunc id pulvinar ante. Donec et urna imperdiet, pretium ante et, molestie elit. Ut sed ex quis metus elementum euismod. Praesent sagittis vitae elit id cursus. Praesent tincidunt justo et nunc gravida, ac tristique lacus imperdiet. Nam at sem eu mauris congue ultrices. Cras fringilla massa sed justo tempor pharetra.\r\n\r\nAenean bibendum turpis in dolor finibus, nec sollicitudin quam pulvinar. Donec scelerisque sit amet elit vel convallis. Aliquam finibus metus nec tellus dignissim, vitae sodales sem malesuada. In tristique nisi ut eros aliquet dictum. Nulla consectetur ipsum in neque consequat malesuada. Sed vitae libero vitae quam tincidunt convallis. Suspendisse potenti. Donec nisl purus, sollicitudin quis semper sit amet, fermentum eu urna. Sed eleifend vel massa in luctus. Nulla facilisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'Thomas', '2017-11-15 08:26:16', '2017-11-15 08:26:16'),
(3, 'Elementum vitae ante', 'Proin justo risus, porta eu imperdiet', 'Donec ipsum eros, maximus non laoreet ac, ultrices vitae ipsum. Aenean mattis aliquet venenatis. Ut non nisi condimentum, ullamcorper turpis sit amet, varius nunc. Sed aliquam purus vitae tempor lobortis. Etiam hendrerit metus ac mi eleifend faucibus. Vivamus ac rhoncus sem.\r\n\r\nCras consectetur elit orci, et sagittis massa feugiat eu. Etiam tortor libero, ornare vel dui id, mollis gravida odio. Ut ante ante, viverra pellentesque orci in, imperdiet egestas ex. Suspendisse semper ac enim ut accumsan. Vivamus fermentum lectus eget justo venenatis commodo. Donec eu fermentum diam, vitae maximus augue. Integer venenatis interdum nisl, sit amet vestibulum justo egestas sit amet.\r\n\r\nPellentesque ut laoreet leo. Sed porta rutrum ipsum a ullamcorper. Vestibulum maximus in ligula id semper. Nam id pretium dui, eget dapibus quam. Donec eleifend in dui sit amet tempor. Nunc mattis malesuada efficitur. Fusce maximus orci sed metus accumsan, sit amet ultricies ante cursus. Cras dapibus odio mauris, id tincidunt lacus sagittis eu. Integer id maximus mi.', 'Pierre', '2017-11-15 08:27:45', '2017-11-15 08:36:45'),
(4, 'Nam eget semper justo', 'Interdum et malesuada fames ac ante', 'Sed finibus iaculis gravida. Maecenas commodo ac risus sit amet mattis. Pellentesque pharetra, lectus eget laoreet bibendum, augue lectus auctor ex, quis pretium lectus dolor non orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. \r\n\r\nQuisque ullamcorper, nisl at tempus aliquam, dui sapien venenatis ipsum, eu sagittis purus ex quis ex. Fusce mattis, velit non vulputate efficitur, magna nisi tempor neque, sed scelerisque dui ligula aliquam ex. Phasellus tincidunt ut nisi sed tristique. Ut tempus tincidunt sapien, ac ultrices ligula fermentum eu.\r\n\r\nProin mauris eros, sollicitudin id mauris vel, mollis finibus eros. Ut porttitor turpis et mauris dictum, id iaculis magna bibendum. Nam id ligula nec elit mollis pharetra. Donec ut gravida quam. Integer accumsan volutpat diam quis consequat. Donec ante mi, commodo id cursus et, mollis pharetra dui. Vestibulum ullamcorper lobortis arcu, id vehicula sapien consectetur ac. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec interdum tristique lacus, vitae sodales eros vehicula sit amet.', 'Jean', '2017-11-15 08:29:02', '2017-11-15 08:36:49'),
(5, 'Phasellus eu justo leo', 'Nullam ornare eleifend neque', 'Facilisis vestibulum risus porta consectetur. Nullam sit amet ipsum non urna bibendum ultrices. Nam id suscipit est, vel tristique enim. Suspendisse eu convallis odio. Vivamus commodo sapien vel placerat semper. Fusce egestas interdum sodales. Curabitur sollicitudin id urna vitae aliquet. Nunc non pellentesque nulla.\r\n\r\nDonec elementum turpis quis nisi volutpat fermentum. Etiam non scelerisque erat. Sed egestas est vel lobortis eleifend. Ut vel efficitur urna. Praesent pharetra iaculis vehicula. Vivamus non felis tortor. Nunc massa felis, aliquet at leo a, aliquam semper elit. Donec a leo a ante imperdiet suscipit sit amet vel ligula. In facilisis pellentesque ullamcorper.\r\n\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean maximus fringilla sem, eu faucibus nisi tempor sit amet. Vivamus varius venenatis sapien, non posuere tortor feugiat sit amet. Donec non libero et dui viverra pharetra. Maecenas aliquam massa at enim facilisis, nec euismod mi lobortis. Aliquam rhoncus sodales ex, in molestie enim imperdiet vel. Morbi porta eros mi, sed auctor risus aliquam sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at justo sagittis, aliquet sapien vitae, congue tellus. In non varius neque.', 'Paul', '2017-11-15 08:29:56', '2017-11-15 08:29:56');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
