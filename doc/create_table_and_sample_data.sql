-- --------------------------------------------------------
-- ホスト:                          127.0.0.1
-- サーバーのバージョン:                   10.4.27-MariaDB - mariadb.org binary distribution
-- サーバー OS:                      Win64
-- HeidiSQL バージョン:               12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--  テーブル quiz_game.jstudy_t0010_apply の構造をダンプしています
CREATE TABLE IF NOT EXISTS `jstudy_t0010_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_num` int(11) DEFAULT NULL,
  `a_type` varchar(10) DEFAULT NULL,
  `ref_id` varchar(100) DEFAULT NULL,
  `ref_apply_id` int(11) DEFAULT NULL,
  `event_name` varchar(100) DEFAULT NULL,
  `domain` varchar(100) DEFAULT NULL,
  `a_name` varchar(100) DEFAULT NULL,
  `a_kanji` varchar(100) DEFAULT NULL,
  `a_sex` varchar(100) DEFAULT NULL,
  `a_address` varchar(400) DEFAULT NULL,
  `a_area` varchar(200) DEFAULT NULL,
  `a_tel` varchar(100) DEFAULT NULL,
  `a_whatsapp` varchar(100) DEFAULT NULL,
  `a_email` varchar(100) DEFAULT NULL,
  `a_pos` varchar(100) DEFAULT NULL,
  `a_dep` varchar(100) DEFAULT NULL,
  `a_cm` varchar(50) DEFAULT NULL,
  `e_level` varchar(100) DEFAULT NULL,
  `j_level` varchar(100) DEFAULT NULL,
  `u_level` varchar(100) DEFAULT NULL,
  `a_0` text DEFAULT NULL,
  `a_1` text DEFAULT NULL,
  `a_2` text DEFAULT NULL,
  `a_3` text DEFAULT NULL,
  `a_4` text DEFAULT NULL,
  `a_5` text DEFAULT NULL,
  `c_0` varchar(100) DEFAULT NULL,
  `c_1` varchar(100) DEFAULT NULL,
  `c_2` varchar(100) DEFAULT NULL,
  `c_3` varchar(100) DEFAULT NULL,
  `c_4` varchar(100) DEFAULT NULL,
  `c_5` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `a_school` varchar(100) DEFAULT NULL,
  `school_area` varchar(100) DEFAULT NULL,
  `p_0` varchar(200) DEFAULT NULL,
  `p_1` varchar(200) DEFAULT NULL,
  `p_2` varchar(200) DEFAULT NULL,
  `p_3` varchar(200) DEFAULT NULL,
  `p_4` varchar(200) DEFAULT NULL,
  `p_5` varchar(200) DEFAULT NULL,
  `u_0` varchar(200) DEFAULT NULL,
  `u_1` varchar(100) DEFAULT NULL,
  `u_2` varchar(100) DEFAULT NULL,
  `u_3` varchar(100) DEFAULT NULL,
  `u_4` varchar(100) DEFAULT NULL,
  `u_5` varchar(100) DEFAULT NULL,
  `e_0` varchar(200) DEFAULT NULL,
  `e_1` varchar(100) DEFAULT NULL,
  `e_2` varchar(100) DEFAULT NULL,
  `e_3` varchar(100) DEFAULT NULL,
  `e_4` varchar(100) DEFAULT NULL,
  `e_5` varchar(100) DEFAULT NULL,
  `sel_docs` text DEFAULT NULL,
  `data_json` text DEFAULT NULL,
  `memo` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21640 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- テーブル quiz_game.jstudy_t0010_apply: 9 rows のデータをダンプしています
/*!40000 ALTER TABLE `jstudy_t0010_apply` DISABLE KEYS */;
INSERT INTO `jstudy_t0010_apply` (`id`, `a_num`, `a_type`, `ref_id`, `ref_apply_id`, `event_name`, `domain`, `a_name`, `a_kanji`, `a_sex`, `a_address`, `a_area`, `a_tel`, `a_whatsapp`, `a_email`, `a_pos`, `a_dep`, `a_cm`, `e_level`, `j_level`, `u_level`, `a_0`, `a_1`, `a_2`, `a_3`, `a_4`, `a_5`, `c_0`, `c_1`, `c_2`, `c_3`, `c_4`, `c_5`, `created`, `modified`, `a_school`, `school_area`, `p_0`, `p_1`, `p_2`, `p_3`, `p_4`, `p_5`, `u_0`, `u_1`, `u_2`, `u_3`, `u_4`, `u_5`, `e_0`, `e_1`, `e_2`, `e_3`, `e_4`, `e_5`, `sel_docs`, `data_json`, `memo`) VALUES
	(1, NULL, 'E', NULL, 1, NULL, NULL, 'user1_1', NULL, NULL, NULL, NULL, '0011', NULL, 'user1_1@asjas.org', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 11:01:58', NULL, 'school1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, NULL, 'E', NULL, 1, NULL, NULL, 'user1_2', NULL, NULL, NULL, NULL, '0012', NULL, 'user1_2@asjas.org', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 11:01:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, NULL, 'E', NULL, 1, NULL, NULL, 'user1_3', NULL, NULL, NULL, NULL, '0013', NULL, 'user1_3@asjas.org', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 11:01:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, NULL, 'E', NULL, 4, NULL, NULL, 'user1_4', NULL, NULL, NULL, NULL, '0014', NULL, 'user1_4@asjas.org', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 11:02:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, NULL, 'E', NULL, 4, NULL, NULL, 'user1_5', NULL, NULL, NULL, NULL, '0015', NULL, 'user1_5@asjas.org', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 11:02:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, NULL, 'E', NULL, NULL, NULL, NULL, 'user3_1', NULL, NULL, NULL, NULL, '0016', NULL, 'user3_1@asjas.org', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 11:02:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, NULL, 'E', NULL, 6, NULL, NULL, 'user2_1', NULL, NULL, NULL, NULL, '0021', NULL, 'user2_1@asjas.org', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 11:02:07', NULL, 'school2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, NULL, 'E', NULL, 6, NULL, NULL, 'user2_2', NULL, NULL, NULL, NULL, '0022', NULL, 'user2_2@asjas.org', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 11:02:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, NULL, 'E', NULL, NULL, NULL, NULL, 'user3_2', NULL, NULL, NULL, NULL, '0016', NULL, 'user3_2@asjas.org', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 11:02:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `jstudy_t0010_apply` ENABLE KEYS */;

--  テーブル quiz_game.q0001_user の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0001_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `q0002_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- テーブル quiz_game.q0001_user: ~8 rows (約) のデータをダンプしています
INSERT INTO `q0001_user` (`id`, `q0002_id`, `name`, `email`, `phone`, `created_at`) VALUES
	(1, 1, 'user1_1', 'user1_1@asjas.org', '0011', '2024-01-19 10:20:07'),
	(2, 1, 'user1_2', 'user1_2@asjas.org', '0012', '2024-01-19 11:01:58'),
	(3, 1, 'user1_3', 'user1_3@asjas.org', '0013', '2024-01-19 11:01:59'),
	(4, 2, 'user1_4', 'user1_4@asjas.org', '0014', '2024-01-19 11:02:01'),
	(5, 2, 'user1_5', 'user1_5@asjas.org', '0015', '2024-01-19 11:02:04'),
	(6, 2, 'user1_6', 'user1_6@asjas.org', '0016', '2024-01-19 11:02:07'),
	(7, 3, 'user2_1', 'user2_1@asjas.org', '0021', '2024-01-19 11:02:07'),
	(8, 3, 'user2_2', 'user2_2@asjas.org', '0022', '2024-01-19 11:02:07');

--  テーブル quiz_game.q0002_team の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0002_team` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `q0012_id` bigint(20) unsigned DEFAULT NULL,
  `leader_email` varchar(256) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `school` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- テーブル quiz_game.q0002_team: ~3 rows (約) のデータをダンプしています
INSERT INTO `q0002_team` (`id`, `q0012_id`, `leader_email`, `name`, `school`) VALUES
	(1, 1, 'user1_1@asjas.org', 'school1_1', 'school1'),
	(2, 1, 'user1_4@asjas.org', 'school1_2', 'school1'),
	(3, 1, 'user2_1@asjas.org', 'school2', 'school2');

--  テーブル quiz_game.q0004_user_answer の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0004_user_answer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `q0001_id` bigint(20) unsigned NOT NULL,
  `q0012_id` bigint(20) unsigned NOT NULL,
  `q0021_id` bigint(20) unsigned NOT NULL,
  `answer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `q0001_id_q0012_id_q0021_id` (`q0001_id`,`q0012_id`,`q0021_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- テーブル quiz_game.q0004_user_answer: ~24 rows (約) のデータをダンプしています
INSERT INTO `q0004_user_answer` (`id`, `q0001_id`, `q0012_id`, `q0021_id`, `answer`, `created_at`) VALUES
	(1, 1, 1, 1, 1, '2024-01-30 04:00:00'),
	(2, 1, 1, 2, 2, '2024-01-30 05:00:00'),
	(3, 1, 1, 3, 3, '2024-01-30 06:00:00'),
	(4, 1, 1, 4, 4, '2024-01-30 07:00:00'),
	(5, 2, 1, 1, 1, '2024-01-30 04:00:00'),
	(6, 2, 1, 2, 2, '2024-01-30 05:00:00'),
	(7, 2, 1, 3, 3, '2024-01-30 06:00:00'),
	(8, 2, 1, 4, 4, '2024-01-30 07:00:00'),
	(9, 4, 1, 1, 1, '2024-01-30 04:00:00'),
	(10, 4, 1, 2, 2, '2024-01-30 05:00:00'),
	(11, 4, 1, 3, 1, '2024-01-30 06:00:00'),
	(12, 4, 1, 4, 1, '2024-01-30 07:00:00'),
	(13, 6, 1, 1, 1, '2024-01-30 04:00:00'),
	(14, 6, 1, 2, 1, '2024-01-30 05:00:00'),
	(15, 6, 1, 3, 1, '2024-01-30 06:00:00'),
	(16, 6, 1, 4, 1, '2024-01-30 07:00:00'),
	(17, 8, 1, 1, 1, '2024-01-30 04:00:00'),
	(18, 8, 1, 2, 2, '2024-01-30 05:00:00'),
	(19, 8, 1, 3, 3, '2024-01-30 06:00:00'),
	(20, 8, 1, 4, 4, '2024-01-30 07:00:00'),
	(21, 9, 1, 1, 1, '2024-01-30 04:00:00'),
	(22, 9, 1, 2, 2, '2024-01-30 05:00:00'),
	(23, 9, 1, 3, 1, '2024-01-30 06:00:00'),
	(24, 9, 1, 4, 1, '2024-01-30 07:00:00');

--  テーブル quiz_game.q0011_game の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0011_game` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- テーブル quiz_game.q0011_game: ~2 rows (約) のデータをダンプしています
INSERT INTO `q0011_game` (`id`, `name`) VALUES
	(1, 'Game1'),
	(2, 'Game2');

--  テーブル quiz_game.q0012_event の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0012_event` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `event_date` datetime DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- テーブル quiz_game.q0012_event: ~1 rows (約) のデータをダンプしています
INSERT INTO `q0012_event` (`id`, `name`, `event_date`, `city`) VALUES
	(1, 'event1', '2024-02-12 00:00:00', 'hk');

--  テーブル quiz_game.q0013_event_game_rel の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0013_event_game_rel` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `q0011_id` bigint(20) unsigned NOT NULL,
  `q0012_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- テーブル quiz_game.q0013_event_game_rel: ~2 rows (約) のデータをダンプしています
INSERT INTO `q0013_event_game_rel` (`id`, `name`, `start_time`, `end_time`, `q0011_id`, `q0012_id`) VALUES
	(1, '第一回合', '2024-01-30 12:00:00', '2024-01-30 13:00:00', 1, 1),
	(2, '第二回合', '2024-01-30 13:00:00', '2024-01-30 14:00:00', 2, 1);

--  テーブル quiz_game.q0021_question の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0021_question` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `q0011_id` bigint(20) unsigned NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `question` varchar(255) NOT NULL,
  `choices1` varchar(255) NOT NULL,
  `choices2` varchar(255) NOT NULL,
  `choices3` varchar(255) NOT NULL,
  `choices4` varchar(255) NOT NULL,
  `answer` int(11) NOT NULL,
  `view_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- テーブル quiz_game.q0021_question: ~5 rows (約) のデータをダンプしています
INSERT INTO `q0021_question` (`id`, `q0011_id`, `image`, `question`, `choices1`, `choices2`, `choices3`, `choices4`, `answer`, `view_order`) VALUES
	(1, 1, 'q1.jpg', 'q1_1', 'c1_1', 'c1_2', 'c1_3', 'c1_4', 1, 1),
	(2, 1, NULL, 'q2_1', 'c2_1', 'c2_2', 'c2_3', 'c2_4', 2, 2),
	(3, 1, 'q3.jpg', 'q3_1', '', '', '', '', 3, 3),
	(4, 1, NULL, 'q4_1', 'c4_1', 'c4_2', 'c4_3', 'c4_4', 4, 4),
	(5, 1, 'q5.jpg', 'q5_1', 'c5_1', 'c5_2', 'c5_3', 'c5_4', 1, 1);

--  テーブル quiz_game.q0022_question_show_record の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0022_question_show_record` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `q0012_id` bigint(20) unsigned NOT NULL,
  `q0021_id` bigint(20) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `q0012_id_q0021_id` (`q0012_id`,`q0021_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- テーブル quiz_game.q0022_question_show_record: ~4 rows (約) のデータをダンプしています
INSERT INTO `q0022_question_show_record` (`id`, `q0012_id`, `q0021_id`, `created_at`) VALUES
	(1, 1, 1, '2024-01-30 12:00:00'),
	(2, 1, 2, '2024-01-30 13:00:00'),
	(3, 1, 3, '2024-01-30 14:00:00'),
	(4, 1, 4, '2024-01-30 15:00:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
