-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 20, 2024 at 10:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educachieve_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `user_id`, `first_name`, `last_name`, `phone_number`) VALUES
(1, 1, 'Francisco', 'Gilbert Sondakh', '085774325611');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_name` enum('A','B','C') NOT NULL,
  `class_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `teacher_id`, `class_name`, `class_level`) VALUES
(1, 2, 'A', 'Kelas 1'),
(2, 2, 'B', 'Kelas 2'),
(3, 2, 'C', 'Kelas 3'),
(4, 2, 'A', 'Kelas 4'),
(5, 2, 'B', 'Kelas 5'),
(6, 2, 'C', 'Kelas 6'),
(7, 2, 'A', 'Kelas 7'),
(8, 2, 'B', 'Kelas 8');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `grade` char(1) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `subject_id`, `student_id`, `grade`, `score`) VALUES
(1, 1, 1, 'A', 100),
(2, 2, 1, 'B', 100),
(4, 4, 1, 'A', 90),
(6, 6, 1, 'A', 92),
(7, 7, 1, 'B', 88),
(9, 9, 1, 'C', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `quiz_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `questions` varchar(255) NOT NULL,
  `answers` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`quiz_id`, `subject_id`, `teacher_id`, `questions`, `answers`) VALUES
(1, 1, 2, 'quiz1_questions.pdf', 'quiz1_answers.pdf'),
(2, 2, 2, 'quiz2_questions.pdf', 'quiz2_answers.pdf'),
(3, 3, 2, 'quiz3_questions.pdf', 'quiz3_answers.pdf'),
(4, 4, 2, 'quiz4_questions.pdf', 'quiz4_answers.pdf'),
(5, 5, 2, 'quiz5_questions.pdf', 'quiz5_answers.pdf'),
(6, 6, 2, 'quiz6_questions.pdf', 'quiz6_answers.pdf'),
(7, 7, 2, 'quiz7_questions.pdf', 'quiz7_answers.pdf'),
(8, 8, 2, 'quiz8_questions.pdf', 'quiz8_answers.pdf'),
(9, 1, 5, 'quiz9_questions.pdf', 'quiz9_answers.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  `tpt_lhr` varchar(100) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `teacher_id`, `class_id`, `user_id`, `first_name`, `last_name`, `phone_number`, `tpt_lhr`, `tgl_lhr`, `gender`, `address`) VALUES
(1, 2, 2, 2, 'Ahmad', 'Azhari', '0812345678', 'Cisaladah', '2012-12-09', 'L', 'jln. cisaladah'),
(2, 1, 3, 6, 'Lia', 'Kirana', '08123456701', 'Jakarta', '2001-05-01', 'P', 'Jl. Kebon Jeruk No. 10'),
(3, 1, 7, 7, 'Ella', 'Marlina', '08123456702', 'Bandung', '2001-06-15', 'P', 'Jl. Braga No. 11'),
(4, 1, 1, 8, 'Indira', 'Putri', '08123456703', 'Jakarta', '2000-08-17', 'P', 'Jl. Sudirman No. 12'),
(5, 1, 6, 9, 'Lyn', 'Natasha', '08123456704', 'Bogor', '2000-09-21', 'P', 'Jl. Merdeka No. 13'),
(6, 1, 5, 10, 'Amanda', 'Pratama', '08123456705', 'Semarang', '1999-11-17', 'P', 'Jl. Diponegoro No. 14'),
(7, 2, 4, 11, 'Callie', 'May', '08123456706', 'Yogyakarta', '2000-03-20', 'P', 'Jl. Malioboro No. 15'),
(8, 5, 6, 12, 'Greesel', 'Alvira', '08123456707', 'Jakarta', '2002-04-10', 'P', 'Jl. Gatot Subroto No. 16'),
(11, 5, 2, 15, 'Cynthia', 'Amalia', '08123456710', 'Bogor', '2002-12-25', 'P', 'Jl. Pajajaran No. 19'),
(12, 5, 6, 16, 'Cathy', 'Salsabila', '08123456711', 'Surabaya', '2001-04-01', 'P', 'Jl. Dr. Soetomo No. 20'),
(13, 5, 6, 17, 'Gracie', 'Winata', '08123456712', 'Malang', '2000-07-19', 'P', 'Jl. Ijen No. 21'),
(14, 1, 3, 18, 'Erine', 'Fitri', '08123456713', 'Jakarta', '2002-03-22', 'P', 'Jl. Tanah Abang No. 22'),
(15, 2, 3, 19, 'Oline', 'Permata', '08123456714', 'Bandung', '2003-08-30', 'P', 'Jl. Setiabudi No. 23'),
(16, 1, 7, 20, 'Fritzy', 'Aulia', '08123456715', 'Jakarta', '2002-05-10', 'P', 'Jl. Salemba No. 24'),
(17, 1, 8, 21, 'Lily', 'Anggraini', '08123456716', 'Medan', '2003-06-25', 'P', 'Jl. Imam Bonjol No. 25'),
(18, 2, 5, 22, 'Lana', 'Hapsari', '08123456717', 'Yogyakarta', '2002-11-13', 'P', 'Jl. Kaliurang No. 26'),
(19, 2, 8, 23, 'Delyn', 'Zahra', '08123456718', 'Bandung', '2001-12-01', 'P', 'Jl. Pasteur No. 27');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `class_id`, `teacher_id`, `subject_name`, `material_name`, `material`) VALUES
(1, 1, 2, 'Entrepreneurship', 'Chapter 1: Pengantar Entrepreneurship', 'entreu1.pdf'),
(2, 2, 2, 'Pemrograman Web', 'Chapter 1: Dasar-dasar Pemrograman Web', ''),
(3, 3, 2, 'Sistem Database II', 'Chapter 1: Pengantar Sistem Database', ''),
(4, 4, 2, 'Matematika Diskrit', 'Chapter 1: Definisi Matematika Diskrit', ''),
(5, 5, 2, 'Metode Numerik', 'Chapter 1: Konsep Metode Numerik', ''),
(6, 6, 2, 'Aljabar Linier', 'Chapter 1: Pengantar Aljabar Linier', ''),
(7, 7, 2, 'Sistem Operasi', 'Chapter 1: Pengantar Sistem Operasi', ''),
(8, 8, 2, 'Pemrograman Berorientasi Objek', 'Chapter 1: Pengantar Pemrograman Berorientasi Objek', ''),
(9, 1, 1, 'Pemrograman Website', 'PHP', 'B_140810230004_PPT Proposal Laundry Sepatu.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  `tpt_lhr` varchar(100) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `address` text NOT NULL,
  `hire_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `quality` char(1) NOT NULL DEFAULT '-',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `introduction` text NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `user_id`, `first_name`, `last_name`, `phone_number`, `tpt_lhr`, `tgl_lhr`, `gender`, `address`, `hire_date`, `quality`, `status`, `introduction`) VALUES
(1, 4, 'Shani', 'Indira Natio', '081384310179', 'Jakarta', '1998-10-05', 'P', 'Jl. Jenderal Sudirman No.1, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270\n', '2024-12-02 07:03:53', 'A', 'active', 'Shani Indira Natio adalah Wakil General Manager Teater JKT48 dan juga mantan kapten JKT48, ia merupakan anggota JKT8 dari generasi ketiga. Di acara Summer Fest 2023 yang dilaksanakan pada 2 Juli 2023 lalu, ia mengumumkan kelulusannya dari JKT48.'),
(2, 3, 'Sultan', 'Ali', '08281246914', 'Bekasi', '2003-02-15', 'L', 'Jl. Cisaladah No.Rt.02/07, Hegarmanah, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45363', '2024-12-02 06:24:52', 'A', 'active', 'haskell 2021'),
(5, 5, 'John', 'Doe', '081234567890', 'Bandung', '1990-05-15', 'L', 'Jl. Merdeka No. 10', '2024-12-02 07:53:10', 'B', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_picture` varchar(255) DEFAULT 'no_profile.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `level`, `created_at`, `updated_at`, `profile_picture`) VALUES
(1, 'noelianyt', 'immanuelfgs@gmail.com', '5968f73345582d555d0243f2ab541a4e', 3, '2024-11-17 09:01:39', '2024-12-02 06:18:31', 'no_profile.jpg'),
(2, 'azhari14', 'azhari23001@gmail.com', 'a82a825ef5570ba11de8922488162c5a', 1, '2024-12-02 06:06:45', '2024-12-02 08:08:33', 'azhari.jpg'),
(3, 'sultan12', 'sultan23001@gmail.com', '34fd55afc313012c4d8d48a63aa0bb3e', 2, '2024-12-02 06:14:47', '2024-12-02 08:08:44', 'sultan.jpg'),
(4, 'shani17', 'robaz170904@gmail.com', '9f99bd4fe44959fa59307815bce1c266', 2, '2024-12-02 07:00:51', '2024-12-20 03:44:56', 'robaz.jpg'),
(5, 'randomuser', 'randomuser@example.com', 'eb7740f8b658da3c3387ed3e5f0a1304', 2, '2024-12-02 07:53:08', '2024-12-16 09:12:26', 'no_profile.jpg'),
(6, 'lia', 'lia.kirana2024@example.com', '8fa0da86943f889a22eaf24e6e060a06', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'lia.jpg'),
(7, 'ella', 'ella.marlina89@example.org', '33a0ed6ed6de9bc9913cab5aa0fa61bb', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'ella.jpg'),
(8, 'indira', 'indira.putri1995@outlook.com', '64b863048ba630501fba078ea2faea8b', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'indira.jpg'),
(9, 'lyn', 'lyn.natasha@domain.com', '97fe2cf0f19b45b3773ec52284922211', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'lyn.jpg'),
(10, 'amanda', 'amanda.pratama@randommail.com', '92a6451cfc447e88663f3a2c7ad77028', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'amanda.jpg'),
(11, 'callie', 'callie.may123@gmail.com', '2fac5403b07331a3dc874858879afffa', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'callie.jpg'),
(12, 'greesel', 'greesel.alvira@hotmail.co.id', '140c63238174b530ee3844d4ec78ee39', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'greesel.jpg'),
(15, 'cynthia', 'cynthia.amalia7@randommail.org', 'c98ee212dacdea2c5bfe36fbc8303630', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'cynthia.jpg'),
(16, 'cathy', 'cathy.salsabila@website.com', '747c7a26841fc13292055d512ae983ac', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'cathy.jpg'),
(17, 'gracie', 'gracie.winata123@domain.org', '2cf31124375cd2e5fdfdf88db982af16', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'gracie.jpg'),
(18, 'erine', 'erine.fitri5@randommail.net', 'cff91b9684f8a0b9d6e6c9e6117e8c0e', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'erine.jpg'),
(19, 'oline', 'oline.permata7@gmail.com', '563665fadd6964de711b4461de1c9038', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'oline.jpg'),
(20, 'fritzy', 'fritzy.aulia98@domain.com', 'a4d849f9d4e4239e01a1c9333d79f08d', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'fritzy.jpg'),
(21, 'lily', 'lily.anggraini24@website.org', '907dec39fefd536565b07d6cb72986c9', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'lily.jpg'),
(22, 'lana', 'lana.hapsari33@outlook.com', 'd410d45b7494e4dd98dd1038444b5936', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'lana.jpg'),
(23, 'delyn', 'delyn.zahra2010@randommail.com', '1e03f0117a443ad56869f51dd5c6ca79', 1, '2024-12-16 08:52:35', '2024-12-16 08:52:35', 'delyn.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `quiz_id` (`subject_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `fk_subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `quizzes_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`),
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
