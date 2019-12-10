-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2019 at 03:53 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dnevnik`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id_class` int(11) NOT NULL AUTO_INCREMENT,
  `class` int(11) NOT NULL,
  PRIMARY KEY (`id_class`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id_class`, `class`) VALUES
(1, 45),
(2, 3),
(3, 42);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id_grade` int(11) NOT NULL AUTO_INCREMENT,
  `class_grade` int(11) NOT NULL,
  PRIMARY KEY (`id_grade`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id_grade`, `class_grade`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `message` mediumtext NOT NULL,
  `id_from` int(11) NOT NULL,
  `id_to` int(11) NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rola`
--

DROP TABLE IF EXISTS `rola`;
CREATE TABLE IF NOT EXISTS `rola` (
  `id_rola` int(11) NOT NULL AUTO_INCREMENT,
  `rola_description` varchar(45) NOT NULL,
  PRIMARY KEY (`id_rola`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rola`
--

INSERT INTO `rola` (`id_rola`, `rola_description`) VALUES
(1, 'administrator'),
(2, 'director'),
(3, 'professor'),
(4, 'teacher'),
(5, 'parent');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id_students` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `id_grade` int(11) NOT NULL,
  PRIMARY KEY (`id_students`),
  KEY `id_parent_idx` (`id_parent`),
  KEY `id_class_idx` (`id_grade`),
  KEY `id_class_idx1` (`id_class`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_students`, `first_name`, `last_name`, `id_class`, `id_parent`, `id_grade`) VALUES
(33, 'Aleksandar', 'Cakic', 1, 5, 5),
(39, 'dora', 'dora', 2, 55, 3),
(40, 'Tamara', 'Cakic', 1, 59, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_rating`
--

DROP TABLE IF EXISTS `student_rating`;
CREATE TABLE IF NOT EXISTS `student_rating` (
  `id_student_rating` int(11) NOT NULL AUTO_INCREMENT,
  `id_subject` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  PRIMARY KEY (`id_student_rating`),
  KEY `id_student_idx` (`id_student`),
  KEY `id_subject_idx` (`id_subject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id_subject` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) NOT NULL,
  `id_grade` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  PRIMARY KEY (`id_subject`),
  KEY `id_professor_idx` (`id_professor`),
  KEY `id_grade_subject_idx` (`id_grade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `rol_id` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_rola_idx` (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`, `password`, `rol_id`) VALUES
(2, 'John', 'Johny', 'john@gmail.com', '1234', 2),
(3, 'a', 'a', 'cakic_aleksandar@yahoo.com', '12345', 3),
(4, 'milan', 'drndarevic', 'drnda@yahoo.com', '1d41c853af58d3a7ae54990ce29417d8', 4),
(5, 'sanja', 'tanja', 'manja@tanja.sanja', '674033583816e73167b0ca098ca0c65a', 5),
(6, 'zika', 'mika', 'zika@mika.com', '300aabd4e3e0f7db7c76ae50e370d96f', 1),
(7, 'kika', 'pera', 'pera@pera.pera', 'd8795f0d07280328f80e59b1e8414c49', 5),
(8, 'test', 'test', 'jasamja@gmail.com', 'a3d7f4db50c3c514cf44990ecd34f5f8', 1),
(9, 'aca', 'cale', 'cale@najjacisam.co.ja', '6e73a08269dd2e7937b8d1b1f99a0564', 1),
(10, 'asdasaaaaaaaaaaaa', 'asd', 'asd@asd.com', 'c20ad4d76fe97759aa27a0c99bff6710', 4),
(11, 'test', 'test', 'cale@najjacisam.co.jaaaa', '202cb962ac59075b964b07152d234b70', 1),
(12, 'Dora', 'Dorica', 'dora@doricagmail.com', '202cb962ac59075b964b07152d234b70', 5),
(13, 'tina', 'tina', 'tina@gmail.co.ja', '202cb962ac59075b964b07152d234b70', 3),
(14, 'Sanja', 'Sanja', '1', '1', 1),
(15, 'Sanja', 'Sanja', '1', '1', 4),
(52, 'Aca', 'Aca', '5', '7', 1),
(53, 'aca', 'aca', '1', '7', 3),
(54, 'aca', 'aca', '22', '22', 1),
(55, 'Zika', 'Zika', '123', '123', 5),
(59, 'Laza', 'Lazic', 'laki@gmail.com', '694391dc3d1d27e4b137080f9116cf63', 5),
(60, 'fiki', 'fiki', 'fiki@gmail.com', 'c25c073370ab7ccb2cc1b665193c06a0', 5),
(61, 'milos', 'milosevic', 'milos@gmail.com', '202cb962ac59075b964b07152d234b70', 3),
(62, 'milan', 'mile', 'mile@gmail.com', '698d51a19d8a121ce581499d7b701668', 4),
(63, 'Aleksandar', 'Cakic', 'acakic64@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `class_id` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `grade_id` FOREIGN KEY (`id_grade`) REFERENCES `grade` (`id_grade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `parent_id` FOREIGN KEY (`id_parent`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_rating`
--
ALTER TABLE `student_rating`
  ADD CONSTRAINT `id_student` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_students`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_subject` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `id_grade_subject` FOREIGN KEY (`id_grade`) REFERENCES `grade` (`id_grade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_professor` FOREIGN KEY (`id_professor`) REFERENCES `rola` (`id_rola`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id_rola` FOREIGN KEY (`rol_id`) REFERENCES `rola` (`id_rola`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
