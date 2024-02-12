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

-- エクスポートするデータが選択されていません

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

-- エクスポートするデータが選択されていません

--  テーブル quiz_game.q0002_team の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0002_team` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `q0012_id` bigint(20) unsigned DEFAULT NULL,
  `leader_email` varchar(256) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `school` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- エクスポートするデータが選択されていません

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

-- エクスポートするデータが選択されていません

--  テーブル quiz_game.q0011_game の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0011_game` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- エクスポートするデータが選択されていません

--  テーブル quiz_game.q0012_event の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0012_event` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `event_date` datetime DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- エクスポートするデータが選択されていません

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

-- エクスポートするデータが選択されていません

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

-- エクスポートするデータが選択されていません

--  テーブル quiz_game.q0022_question_show_record の構造をダンプしています
CREATE TABLE IF NOT EXISTS `q0022_question_show_record` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `q0012_id` bigint(20) unsigned NOT NULL,
  `q0021_id` bigint(20) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `q0012_id_q0021_id` (`q0012_id`,`q0021_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- エクスポートするデータが選択されていません

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
