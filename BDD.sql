-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 09 déc. 2021 à 11:22
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mon_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `chapo` varchar(500) NOT NULL,
  `content` varchar(7000) NOT NULL,
  `author` varchar(100) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `title`, `chapo`, `content`, `author`, `last_update`) VALUES
(4, 'La lune s\'approche de la terre', 'le chapo du blog 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum nunc a turpis finibus, ac hendrerit libero consequat. Nam congue leo velit, eget tincidunt dolor pulvinar id. Phasellus quis auctor ex, sed gravida est. Proin porttitor purus id efficitur varius. In sit amet vehicula dolor. Suspendisse imperdiet maximus cursus. Fusce non viverra eros, vel gravida ligula. Ut sagittis metus nisl, at placerat enim sollicitudin ut. Praesent dapibus neque purus, non egestas quam tincidunt sit amet. Nam eleifend turpis eget tortor commodo placerat. Quisque cursus tellus sit amet dui euismod varius. Morbi ante nisi, pharetra quis posuere ac, mollis nec neque.\r\n\r\nSed non pharetra diam, et euismod orci. Donec eget pretium erat. Quisque sit amet arcu tellus. Fusce varius nulla vitae quam eleifend, vitae pellentesque ipsum elementum. Maecenas vel risus suscipit, dignissim est eget, pretium purus. Praesent varius faucibus dignissim. Nunc vulputate eget eros eu malesuada. Fusce sollicitudin molestie ultricies. Pellentesque varius, elit vitae venenatis fringilla, sem tortor fermentum ante, nec dictum tortor libero et risus. Sed maximus et massa et elementum. Etiam egestas pharetra lacus quis gravida. Nullam porttitor pharetra purus, eu laoreet magna porttitor nec. Etiam nec nisi vel arcu ultrices molestie. Morbi ligula orci, dignissim ac dolor quis, pellentesque dapibus nibh. Donec at ultrices metus, eget efficitur arcu. Nulla ipsum nulla, tempor in accumsan ac, tempus quis erat.\r\n\r\nPraesent pulvinar accumsan purus, vel condimentum eros malesuada nec. Sed lobortis pellentesque dolor quis maximus. Sed eget turpis nec odio consectetur rutrum. Nunc non dapibus enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris leo mi, auctor vel fermentum eget, tincidunt at elit. Nullam tellus augue, dignissim eget turpis nec, mollis interdum ligula. Duis quis elit id turpis sagittis viverra.\r\n\r\nNunc faucibus risus velit, eget aliquam eros convallis vel. Nulla ornare leo vitae massa fringilla eleifend. Sed bibendum aliquet magna ut semper. Pellentesque non arcu non diam elementum suscipit. Nam ultrices metus neque, ac ullamcorper lectus gravida et. Fusce sollicitudin eros ac leo ultrices porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam sed aliquam dolor, pellentesque faucibus turpis. Nunc ac nunc nibh. Cras id nunc maximus, tincidunt neque sed, tincidunt ex. Proin scelerisque convallis est mollis consectetur. Etiam lorem nisi, ornare sed suscipit at, finibus vel augue.\r\n\r\nNunc ornare consectetur risus, at cursus est ultrices quis. Quisque in nisl leo. Fusce nec turpis bibendum mauris lobortis varius. Donec viverra augue eu tellus porttitor sagittis. Phasellus maximus mi et ultricies pharetra. Mauris sodales iaculis arcu, sit amet dapibus dui facilisis vitae. Proin pharetra id mauris vel mattis. Nam viverra magna justo, et pulvinar est imperdiet ut. Curabitur at metus enim. Etiam consequat nulla dolor, id bibendum erat sagittis eu. Aliquam massa ex, imperdiet tincidunt risus vitae, porta sagittis nulla. Suspendisse potenti. Phasellus laoreet ultrices augue, at ornare leo faucibus non. Fusce iaculis varius enim, quis viverra purus porta ut. Curabitur quis velit sagittis, commodo nulla non, hendrerit leo. Aliquam sit amet mauris eu tellus aliquet porttitor.', 'Ahtor 4', '2021-05-01 18:23:39'),
(5, 'Formation php', 'un magnifique lorem ipsum pour blog5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\r\n', 'blalblfldld', '2021-12-01 15:13:29'),
(9, 'A t-on vraiment besoin d\'internet?', 'Praesent pulvinar accumsan purus, vel condimentum eros malesuada nec. Sed lobortis pellentesque dolor quis maximus. Sed eget turpis nec odio consectetur rutrum. Nunc non dapibus enim.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum nunc a turpis finibus, ac hendrerit libero consequat. Nam congue leo velit, eget tincidunt dolor pulvinar id. Phasellus quis auctor ex, sed gravida est. Proin porttitor purus id efficitur varius. In sit amet vehicula dolor. Suspendisse imperdiet maximus cursus. Fusce non viverra eros, vel gravida ligula. Ut sagittis metus nisl, at placerat enim sollicitudin ut. Praesent dapibus neque purus, non egestas quam tincidunt sit amet. Nam eleifend turpis eget tortor commodo placerat. Quisque cursus tellus sit amet dui euismod varius. Morbi ante nisi, pharetra quis posuere ac, mollis nec neque.\r\n\r\nSed non pharetra diam, et euismod orci. Donec eget pretium erat. Quisque sit amet arcu tellus. Fusce varius nulla vitae quam eleifend, vitae pellentesque ipsum elementum. Maecenas vel risus suscipit, dignissim est eget, pretium purus. Praesent varius faucibus dignissim. Nunc vulputate eget eros eu malesuada. Fusce sollicitudin molestie ultricies. Pellentesque varius, elit vitae venenatis fringilla, sem tortor fermentum ante, nec dictum tortor libero et risus. Sed maximus et massa et elementum. Etiam egestas pharetra lacus quis gravida. Nullam porttitor pharetra purus, eu laoreet magna porttitor nec. Etiam nec nisi vel arcu ultrices molestie. Morbi ligula orci, dignissim ac dolor quis, pellentesque dapibus nibh. Donec at ultrices metus, eget efficitur arcu. Nulla ipsum nulla, tempor in accumsan ac, tempus quis erat.\r\n\r\nPraesent pulvinar accumsan purus, vel condimentum eros malesuada nec. Sed lobortis pellentesque dolor quis maximus. Sed eget turpis nec odio consectetur rutrum. Nunc non dapibus enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris leo mi, auctor vel fermentum eget, tincidunt at elit. Nullam tellus augue, dignissim eget turpis nec, mollis interdum ligula. Duis quis elit id turpis sagittis viverra.\r\n\r\nNunc faucibus risus velit, eget aliquam eros convallis vel. Nulla ornare leo vitae massa fringilla eleifend. Sed bibendum aliquet magna ut semper. Pellentesque non arcu non diam elementum suscipit. Nam ultrices metus neque, ac ullamcorper lectus gravida et. Fusce sollicitudin eros ac leo ultrices porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam sed aliquam dolor, pellentesque faucibus turpis. Nunc ac nunc nibh. Cras id nunc maximus, tincidunt neque sed, tincidunt ex. Proin scelerisque convallis est mollis consectetur. Etiam lorem nisi, ornare sed suscipit at, finibus vel augue.\r\n\r\nNunc ornare consectetur risus, at cursus est ultrices quis. Quisque in nisl leo. Fusce nec turpis bibendum mauris lobortis varius. Donec viverra augue eu tellus porttitor sagittis. Phasellus maximus mi et ultricies pharetra. Mauris sodales iaculis arcu, sit amet dapibus dui facilisis vitae. Proin pharetra id mauris vel mattis. Nam viverra magna justo, et pulvinar est imperdiet ut. Curabitur at metus enim. Etiam consequat nulla dolor, id bibendum erat sagittis eu. Aliquam massa ex, imperdiet tincidunt risus vitae, porta sagittis nulla. Suspendisse potenti. Phasellus laoreet ultrices augue, at ornare leo faucibus non. Fusce iaculis varius enim, quis viverra purus porta ut. Curabitur quis velit sagittis, commodo nulla non, hendrerit leo. Aliquam sit amet mauris eu tellus aliquet porttitor.', 'Ahtuor 9', '2021-12-01 17:29:28'),
(10, 'Bientôt le project qui va bouleverser le monde digital', 'Praesent pulvinar accumsan purus, vel condimentum eros malesuada nec. Sed lobortis pellentesque dolor quis maximus. Sed eget turpis nec odio consectetur rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum nunc a turpis finibus, ac hendrerit libero consequat. Nam congue leo velit, eget tincidunt dolor pulvinar id. Phasellus quis auctor ex, sed gravida est. Proin porttitor purus id efficitur varius. In sit amet vehicula dolor. Suspendisse imperdiet maximus cursus. Fusce non viverra eros, vel gravida ligula. Ut sagittis metus nisl, at placerat enim sollicitudin ut. Praesent dapibus neque purus, non egestas quam tincidunt sit amet. Nam eleifend turpis eget tortor commodo placerat. Quisque cursus tellus sit amet dui euismod varius. Morbi ante nisi, pharetra quis posuere ac, mollis nec neque.\r\n\r\nSed non pharetra diam, et euismod orci. Donec eget pretium erat. Quisque sit amet arcu tellus. Fusce varius nulla vitae quam eleifend, vitae pellentesque ipsum elementum. Maecenas vel risus suscipit, dignissim est eget, pretium purus. Praesent varius faucibus dignissim. Nunc vulputate eget eros eu malesuada. Fusce sollicitudin molestie ultricies. Pellentesque varius, elit vitae venenatis fringilla, sem tortor fermentum ante, nec dictum tortor libero et risus. Sed maximus et massa et elementum. Etiam egestas pharetra lacus quis gravida. Nullam porttitor pharetra purus, eu laoreet magna porttitor nec. Etiam nec nisi vel arcu ultrices molestie. Morbi ligula orci, dignissim ac dolor quis, pellentesque dapibus nibh. Donec at ultrices metus, eget efficitur arcu. Nulla ipsum nulla, tempor in accumsan ac, tempus quis erat.\r\n\r\nPraesent pulvinar accumsan purus, vel condimentum eros malesuada nec. Sed lobortis pellentesque dolor quis maximus. Sed eget turpis nec odio consectetur rutrum. Nunc non dapibus enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris leo mi, auctor vel fermentum eget, tincidunt at elit. Nullam tellus augue, dignissim eget turpis nec, mollis interdum ligula. Duis quis elit id turpis sagittis viverra.\r\n\r\nNunc faucibus risus velit, eget aliquam eros convallis vel. Nulla ornare leo vitae massa fringilla eleifend. Sed bibendum aliquet magna ut semper. Pellentesque non arcu non diam elementum suscipit. Nam ultrices metus neque, ac ullamcorper lectus gravida et. Fusce sollicitudin eros ac leo ultrices porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam sed aliquam dolor, pellentesque faucibus turpis. Nunc ac nunc nibh. Cras id nunc maximus, tincidunt neque sed, tincidunt ex. Proin scelerisque convallis est mollis consectetur. Etiam lorem nisi, ornare sed suscipit at, finibus vel augue.\r\n\r\nNunc ornare consectetur risus, at cursus est ultrices quis. Quisque in nisl leo. Fusce nec turpis bibendum mauris lobortis varius. Donec viverra augue eu tellus porttitor sagittis. Phasellus maximus mi et ultricies pharetra. Mauris sodales iaculis arcu, sit amet dapibus dui facilisis vitae. Proin pharetra id mauris vel mattis. Nam viverra magna justo, et pulvinar est imperdiet ut. Curabitur at metus enim. Etiam consequat nulla dolor, id bibendum erat sagittis eu. Aliquam massa ex, imperdiet tincidunt risus vitae, porta sagittis nulla. Suspendisse potenti. Phasellus laoreet ultrices augue, at ornare leo faucibus non. Fusce iaculis varius enim, quis viverra purus porta ut. Curabitur quis velit sagittis, commodo nulla non, hendrerit leo. Aliquam sit amet mauris eu tellus aliquet porttitor.', 'zineb', '2021-12-31 04:17:17'),
(11, 'Nouvel Ere du jeu', 'pleins de nouveautés, venez découvrir le nouveau monde de ce jeu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum nunc a turpis finibus, ac hendrerit libero consequat. Nam congue leo velit, eget tincidunt dolor pulvinar id. Phasellus quis auctor ex, sed gravida est. Proin porttitor purus id efficitur varius. In sit amet vehicula dolor. Suspendisse imperdiet maximus cursus. Fusce non viverra eros, vel gravida ligula. Ut sagittis metus nisl, at placerat enim sollicitudin ut. Praesent dapibus neque purus, non egestas quam tincidunt sit amet. Nam eleifend turpis eget tortor commodo placerat. Quisque cursus tellus sit amet dui euismod varius. Morbi ante nisi, pharetra quis posuere ac, mollis nec neque.\r\n\r\nSed non pharetra diam, et euismod orci. Donec eget pretium erat. Quisque sit amet arcu tellus. Fusce varius nulla vitae quam eleifend, vitae pellentesque ipsum elementum. Maecenas vel risus suscipit, dignissim est eget, pretium purus. Praesent varius faucibus dignissim. Nunc vulputate eget eros eu malesuada. Fusce sollicitudin molestie ultricies. Pellentesque varius, elit vitae venenatis fringilla, sem tortor fermentum ante, nec dictum tortor libero et risus. Sed maximus et massa et elementum. Etiam egestas pharetra lacus quis gravida. Nullam porttitor pharetra purus, eu laoreet magna porttitor nec. Etiam nec nisi vel arcu ultrices molestie. Morbi ligula orci, dignissim ac dolor quis, pellentesque dapibus nibh. Donec at ultrices metus, eget efficitur arcu. Nulla ipsum nulla, tempor in accumsan ac, tempus quis erat.\r\n\r\nPraesent pulvinar accumsan purus, vel condimentum eros malesuada nec. Sed lobortis pellentesque dolor quis maximus. Sed eget turpis nec odio consectetur rutrum. Nunc non dapibus enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris leo mi, auctor vel fermentum eget, tincidunt at elit. Nullam tellus augue, dignissim eget turpis nec, mollis interdum ligula. Duis quis elit id turpis sagittis viverra.\r\n\r\nNunc faucibus risus velit, eget aliquam eros convallis vel. Nulla ornare leo vitae massa fringilla eleifend. Sed bibendum aliquet magna ut semper. Pellentesque non arcu non diam elementum suscipit. Nam ultrices metus neque, ac ullamcorper lectus gravida et. Fusce sollicitudin eros ac leo ultrices porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam sed aliquam dolor, pellentesque faucibus turpis. Nunc ac nunc nibh. Cras id nunc maximus, tincidunt neque sed, tincidunt ex. Proin scelerisque convallis est mollis consectetur. Etiam lorem nisi, ornare sed suscipit at, finibus vel augue.\r\n\r\nNunc ornare consectetur risus, at cursus est ultrices quis. Quisque in nisl leo. Fusce nec turpis bibendum mauris lobortis varius. Donec viverra augue eu tellus porttitor sagittis. Phasellus maximus mi et ultricies pharetra. Mauris sodales iaculis arcu, sit amet dapibus dui facilisis vitae. Proin pharetra id mauris vel mattis. Nam viverra magna justo, et pulvinar est imperdiet ut. Curabitur at metus enim. Etiam consequat nulla dolor, id bibendum erat sagittis eu. Aliquam massa ex, imperdiet tincidunt risus vitae, porta sagittis nulla. Suspendisse potenti. Phasellus laoreet ultrices augue, at ornare leo faucibus non. Fusce iaculis varius enim, quis viverra purus porta ut. Curabitur quis velit sagittis, commodo nulla non, hendrerit leo. Aliquam sit amet mauris eu tellus aliquet porttitor.', 'Zineb ', '2021-11-30 04:21:49'),
(12, 'Blog 10', 'chapo10', 'contenu à venir....', 'zineb', '2021-12-01 15:14:07');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `creation_date` datetime NOT NULL,
  `is_validated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `id_blog`, `id_user`, `content`, `creation_date`, `is_validated`) VALUES
(22, 4, 29, 'Bonjour', '2021-10-25 13:13:55', 1),
(23, 5, 3, 'Salut', '2021-10-25 13:14:51', 1),
(24, 10, 29, 'Bonjour, \r\nvotre post est cool et est très instructif, merci beaucoup!', '2021-12-09 08:52:52', 1),
(25, 4, 29, 'Salut tout le monde, je commence à comprendre le secret de la lune.', '2021-12-08 08:52:52', 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(320) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `first_name`, `last_name`, `email`, `content`) VALUES
(1, 'zineb', 'benaicha', 'zineb.mezlef@gmail.com', 'bonjour zineb!'),
(2, 'Abderrezak', 'benaicha', 'macidwane.coucou@yahoo.com', 'Je suis abderrezak et je veux me présenter.'),
(3, 'kjui', 'skdjsklj', 'aaaaaa.lllllll@yahoo.fr', 'kifjfkldjfldjl'),
(4, 'zineb', 'benaicha', 'zineb.mezlef@gmail.com', 'kljfdl'),
(5, 'zineb', 'benaicha', 'zineb.mezlef@gmail.com', 'osrueprugpe'),
(6, 'Croline', 'benaicha', 'caroline.mammifere@gmail.com', 'Bonjour je suis caroline'),
(7, 'Croline', 'benaicha', 'caroline.mammifere@gmail.com', 'Bonjour je suis caroline'),
(8, 'zineb', 'benaicha', 'zineb.mezlef@gmail.com', 'sdgdfgfdgd'),
(9, 'Samia', 'benaicha', 'samia.benaicha@gmail.com', 'Bonjour,\r\nje suis Samia'),
(10, 'Samia', 'benaicha', 'samia.benaicha@gmail.com', 'Bonjour je suis samia'),
(11, 'Samia', 'benaicha', 'samia.benaicha@gmail.com', 'Bonjour je suis samia'),
(12, 'Samia', 'benaicha', 'samia.benaicha@gmail.com', 'Salut je suis Samia'),
(13, 'Samia', 'benaicha', 'zineb.benaicha@gmail.com', 'dfsfds'),
(14, 'Samia', 'benaicha', 'zineb.mezlef@gmail.com', 'dfgdfgdfg'),
(15, 'zineb', 'benaicha', 'zineb.mezlef@gmail.com', 'dssdfsdf'),
(16, 'Samia', 'benaicha', 'samia.benaicha@gmail.com', 'Salut je suis samia'),
(17, 'Sami', 'Blalal', 'samia.kjil@yahoo.fr', 'sjdhlsjfdhjslh'),
(18, 'Sami', 'Blalal', 'samia.kjil@yahoo.fr', 'sjdhlsjfdhjslh'),
(19, 'abderrezak', 'benaicha', 'abderrezak.benaicha@gmail.com', 'Bonjour,\r\nje suis Abderrezak'),
(20, 'abderrezak', 'benaicha', 'abderrezak.benaicha@gmail.com', 'Salut je reviens vers vous'),
(21, 'zineb', 'erere', 'dfldhjfl@gmail.com', 'gdfgdfgdgd'),
(22, 'Marie', 'marron', 'marie.marron@gmail.com', 'Bonjour, je suis Marie'),
(23, 'abderrezak', 'benaicha', 'abderrezak.benaicha@gmail.com', 'HJLHJHLKH'),
(24, 'zineb', 'benaicha', 'zineb.mezlef@gmail.com', 'kfugfklj'),
(25, 'malika', 'issaad', 'malika.issaad@gmail.com', 'Bonjour je suis Malika'),
(26, 'abderahim', 'benaicha', 'zineb.mezlef@gmail.com', 'Salut'),
(27, 'zineb', 'benaicha', 'zineb.mezlef@gmail.com', 'jshhbfbdhgdf'),
(28, 'Marie', 'benaicha', 'zineb.mezlef@gmail.com', 'Bonjour'),
(29, 'abderahim', 'benaicha', 'zineb.mezlef@gmail.com', 'Salut, je suis abderahim'),
(30, 'zineb', 'benaicha', 'zineb.mezlef@gmail.com', 'khfdlkfhg'),
(31, 'zineb', 'benaicha', 'zineb.mezlef@gmail.com', 'jhdfjhsdhf'),
(32, 'abderahim', 'benaicha', 'abderahim.bechbech@yahoo.fr', 'kjsdfhkjsfh'),
(33, 'dalila', 'kio', 'dalila.kio@gmail.com', 'kdhjhn,ndjfh'),
(34, 'zineb', 'benaicha', 'zineb.mezlef@gmail.com', 'dsflkdfhldf'),
(35, 'zineb', 'benaicha', 'abderrezak.benaicha@gmail.com', 'je reviens vers vous'),
(36, 'adrian', 'bami', 'adrian.bami@gmail.com', 'ksjufdndn,d'),
(37, 'adrian', 'macia', 'adrian.bami@gmail.com', 'kldsfhlf'),
(38, 'Fabien', 'Solice', 'fabien.solice@gmail.com', 'sjdfhkjsdfh'),
(39, 'zineb', 'mezlef', 'zineb.mezlef@gmail.com', 'Bonjour je suis zineb');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(500) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_validated` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `is_admin`, `is_validated`, `name`) VALUES
(3, 'admin1_blog@gmail', '$2y$10$GNVU97j3MYq.cVYF5NuEueUteGesBF1XiINVC.eqPehZogiNgz26.', 1, 1, 'admin1'),
(29, 'abderrezak.benaicha@gmail.com', '$2y$10$TZa60VJGSaXPJJNbQtWe1eas4cu3LlnIYvr9hcrdXvtiGR.ztDMv.', 0, 1, 'abdou'),
(30, 'admin2_blog@gmail', '$2y$10$FsR3zANEOf1ePKlmRGd0wuEDITEa/MLZls.Z8Z7EZOsJW3SrZ5mnS', 1, 0, 'Admin2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_blog` (`id_blog`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
