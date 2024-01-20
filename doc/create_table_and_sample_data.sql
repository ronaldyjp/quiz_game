-- --------------------------------------------------------
-- ホスト:                          127.0.0.1
-- サーバーのバージョン:                   10.1.38-MariaDB - mariadb.org binary distribution
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

--  テーブル quiz_game.q0001_user の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0001_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `q0002_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

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
  `q0012_id` bigint(20) unsigned NOT NULL,
  `q0001_leader_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `school` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- テーブル quiz_game.q0002_team: ~3 rows (約) のデータをダンプしています
INSERT INTO `q0002_team` (`id`, `q0012_id`, `q0001_leader_id`, `name`, `school`) VALUES
	(1, 1, 1, 'school1_1', 'school1'),
	(2, 1, 3, 'school1_2', 'school1'),
	(3, 1, 5, 'school2_1', 'school2');

--  テーブル quiz_game.q0004_user_answer の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0004_user_answer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `q0001_id` bigint(20) unsigned NOT NULL,
  `q0012_id` bigint(20) unsigned NOT NULL,
  `q0021_id` bigint(20) unsigned NOT NULL,
  `answer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- テーブル quiz_game.q0004_user_answer: ~1 rows (約) のデータをダンプしています
INSERT INTO `q0004_user_answer` (`id`, `q0001_id`, `q0012_id`, `q0021_id`, `answer`, `created_at`) VALUES
	(3, 1, 1, 1, 1, '2024-01-20 01:07:45'),
	(4, 1, 1, 1, 1, '2024-01-20 02:08:08');

--  テーブル quiz_game.q0011_game の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0011_game` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- テーブル quiz_game.q0012_event: ~1 rows (約) のデータをダンプしています
INSERT INTO `q0012_event` (`id`, `name`, `event_date`, `city`) VALUES
	(1, 'event1', '2024-01-20 00:00:00', 'hk');

--  テーブル quiz_game.q0013_event_game_rel の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0013_event_game_rel` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `q0011_id` bigint(20) unsigned NOT NULL,
  `q0012_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- テーブル quiz_game.q0013_event_game_rel: ~2 rows (約) のデータをダンプしています
INSERT INTO `q0013_event_game_rel` (`id`, `start_time`, `end_time`, `q0011_id`, `q0012_id`) VALUES
	(1, '2024-01-30 12:00:00', '2024-01-30 13:00:00', 1, 1),
	(2, '2024-01-30 13:00:00', '2024-01-30 14:00:00', 2, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- テーブル quiz_game.q0021_question: ~4 rows (約) のデータをダンプしています
INSERT INTO `q0021_question` (`id`, `q0011_id`, `image`, `question`, `choices1`, `choices2`, `choices3`, `choices4`, `answer`, `view_order`) VALUES
	(1, 1, 'q1.jpg', 'q1_1', 'c1_1', 'c1_2', 'c1_3', 'c1_4', 1, 1),
	(2, 1, NULL, 'q2_1', 'c2_1', 'c2_2', 'c2_3', 'c2_4', 2, 2),
	(3, 1, 'q3.jpg', 'q3_1', '', '', '', '', 3, 3),
	(4, 1, NULL, 'q4_1', 'c4_1', 'c4_2', 'c4_3', 'c4_4', 4, 4);

--  テーブル quiz_game.q0022_question_show_record の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0022_question_show_record` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `q0012_id` bigint(20) unsigned NOT NULL,
  `q0021_id` bigint(20) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- テーブル quiz_game.q0022_question_show_record: ~3 rows (約) のデータをダンプしています
INSERT INTO `q0022_question_show_record` (`id`, `q0012_id`, `q0021_id`, `created_at`) VALUES
	(1, 1, 1, '2024-01-30 12:00:00'),
	(2, 1, 2, '2024-01-30 12:01:00'),
	(3, 1, 3, '2024-01-30 12:02:00'),
	(4, 1, 4, '2024-01-30 12:03:00'),
	(5, 1, 1, '2024-01-20 09:19:56');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
