-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 08:50 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peopledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternative_last_names`
--

CREATE TABLE `alternative_last_names`
(
    `id`          int(11) NOT NULL,
    `person_id`   int(11)     DEFAULT NULL,
    `last_name`   varchar(45) DEFAULT NULL,
    `change_type` varchar(45) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


-- --------------------------------------------------------

--
-- Table structure for table `army`
--

CREATE TABLE `army`
(
    `id`           int(11) NOT NULL,
    `person_id`    int(11)      DEFAULT NULL,
    `suitablility` int(11)      DEFAULT NULL,
    `unit`         varchar(300) DEFAULT NULL,
    `year_start`   int(11)      DEFAULT NULL,
    `year_end`     int(11)      DEFAULT NULL,
    `rank`         varchar(300) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts`
(
    `id`         int(11) NOT NULL,
    `owner`      int(11)      DEFAULT NULL,
    `account`    varchar(45)  DEFAULT NULL,
    `account_id` varchar(300) DEFAULT NULL,
    `status`     varchar(45)  DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education`
(
    `id`          int(11) NOT NULL,
    `person_id`   int(11)      DEFAULT NULL,
    `type`        varchar(45)  DEFAULT NULL,
    `institution` varchar(300) DEFAULT NULL,
    `year_start`  int(11)      DEFAULT NULL,
    `year_end`    int(11)      DEFAULT NULL,
    `group`       varchar(45)  DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages`
(
    `id`        int(11) NOT NULL,
    `person_id` int(11)     DEFAULT NULL,
    `language`  varchar(45) DEFAULT NULL,
    `level`     varchar(45) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes`
(
    `id`          int(11) NOT NULL,
    `person`      int(11)     DEFAULT NULL,
    `like_status` varchar(45) DEFAULT NULL,
    `object_type` varchar(45) DEFAULT NULL,
    `object`      varchar(45) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person`
(
    `id`                  int(11) NOT NULL,
    `last_name`           varchar(45)  DEFAULT NULL,
    `first_name`          varchar(45)  DEFAULT NULL,
    `middle_name`         varchar(45)  DEFAULT NULL,
    `nickname`            varchar(45)  DEFAULT NULL,
    `acquintance_type`    varchar(45)  DEFAULT NULL,
    `sex`                 tinyint(4)   DEFAULT NULL,
    `orientation`         varchar(45)  DEFAULT NULL,
    `birth_day`           int(11)      DEFAULT NULL,
    `birth_month`         int(11)      DEFAULT NULL,
    `birth_year`          int(11)      DEFAULT NULL,
    `birth_hour`          int(11)      DEFAULT NULL,
    `birth_minute`        int(11)      DEFAULT NULL,
    `relationship_status` varchar(45)  DEFAULT NULL,
    `height`              int(11)      DEFAULT NULL,
    `weight`              float        DEFAULT NULL,
    `home_city`           varchar(300) DEFAULT NULL,
    `country`             varchar(300) DEFAULT NULL,
    `city`                varchar(300) DEFAULT NULL,
    `street`              varchar(300) DEFAULT NULL,
    `building`            varchar(45)  DEFAULT NULL,
    `floor`               varchar(45)  DEFAULT NULL,
    `apartment`           varchar(45)  DEFAULT NULL,
    `mother`              int(11)      DEFAULT NULL,
    `father`              int(11)      DEFAULT NULL,
    `religion`            varchar(45)  DEFAULT NULL,
    `political_views`     varchar(45)  DEFAULT NULL,
    `personal_priority`   varchar(45)  DEFAULT NULL,
    `important_in_others` varchar(45)  DEFAULT NULL,
    `views_on_smoking`    varchar(45)  DEFAULT NULL,
    `views_on_alcohol`    varchar(45)  DEFAULT NULL,
    `views_on_drugs`      varchar(45)  DEFAULT NULL,
    `drive_license`       varchar(45)  DEFAULT NULL,
    `school_results`      varchar(300) DEFAULT NULL,
    `ege_results`         varchar(300) DEFAULT NULL,
    `univer_results`      varchar(300) DEFAULT NULL,
    `iq_test`             varchar(45)  DEFAULT NULL,
    `socionic_test`       varchar(300) DEFAULT NULL,
    `political_test`      varchar(300) DEFAULT NULL,
    `bennet_test`         varchar(45)  DEFAULT NULL,
    `hikka_test`          varchar(300) DEFAULT NULL,
    `death_status`        varchar(45)  DEFAULT NULL,
    `death_day`           varchar(45)  DEFAULT NULL,
    `death_month`         varchar(45)  DEFAULT NULL,
    `death_year`          varchar(45)  DEFAULT NULL,
    `death_hour`          varchar(45)  DEFAULT NULL,
    `death_minute`        varchar(45)  DEFAULT NULL,
    `gender`              varchar(45)  DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property`
(
    `id`            int(11) NOT NULL,
    `person_id`     int(11)      DEFAULT NULL,
    `property_type` varchar(45)  DEFAULT NULL,
    `property_name` varchar(300) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship`
(
    `id`            int(11) NOT NULL,
    `person_1`      int(11)     DEFAULT NULL,
    `person_2`      int(11)     DEFAULT NULL,
    `relation_type` varchar(45) DEFAULT NULL,
    `year_start`    int(11)     DEFAULT NULL,
    `month_start`   varchar(45) DEFAULT NULL,
    `day_start`     varchar(45) DEFAULT NULL,
    `year_end`      int(11)     DEFAULT NULL,
    `month_end`     varchar(45) DEFAULT NULL,
    `day_end`       varchar(45) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills`
(
    `id`     int(11) NOT NULL,
    `person` int(11)     DEFAULT NULL,
    `skill`  varchar(45) DEFAULT NULL,
    `level`  varchar(45) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work`
(
    `id`         int(11) NOT NULL,
    `person_id`  int(11)      DEFAULT NULL,
    `company`    varchar(300) DEFAULT NULL,
    `post`       varchar(300) DEFAULT NULL,
    `year_start` int(11)      DEFAULT NULL,
    `year_end`   int(11)      DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternative_last_names`
--
ALTER TABLE `alternative_last_names`
    ADD PRIMARY KEY (`id`),
    ADD KEY `person_idx` (`person_id`);

--
-- Indexes for table `army`
--
ALTER TABLE `army`
    ADD PRIMARY KEY (`id`),
    ADD KEY `person_idx` (`person_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
    ADD PRIMARY KEY (`id`),
    ADD KEY `owner_idx` (`owner`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
    ADD PRIMARY KEY (`id`),
    ADD KEY `person_id_idx` (`person_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
    ADD PRIMARY KEY (`id`),
    ADD KEY `person_idx` (`person_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
    ADD PRIMARY KEY (`id`),
    ADD KEY `person_idx` (`person`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
    ADD PRIMARY KEY (`id`),
    ADD KEY `mother_idx` (`mother`),
    ADD KEY `father_idx` (`father`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
    ADD PRIMARY KEY (`id`),
    ADD KEY `person_idx` (`person_id`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
    ADD PRIMARY KEY (`id`),
    ADD KEY `person_2_idx` (`person_1`),
    ADD KEY `person2_idx` (`person_2`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
    ADD PRIMARY KEY (`id`),
    ADD KEY `person_idx` (`person`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
    ADD PRIMARY KEY (`id`),
    ADD KEY `person_idx` (`person_id`);


--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternative_last_names`
--
ALTER TABLE `alternative_last_names`
    ADD CONSTRAINT `person` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `army`
--
ALTER TABLE `army`
    ADD CONSTRAINT `person_army` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
    ADD CONSTRAINT `owner` FOREIGN KEY (`owner`) REFERENCES `person` (`id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
    ADD CONSTRAINT `person_id` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
    ADD CONSTRAINT `person_languages` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
    ADD CONSTRAINT `person_likes` FOREIGN KEY (`person`) REFERENCES `person` (`id`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
    ADD CONSTRAINT `father` FOREIGN KEY (`father`) REFERENCES `person` (`id`),
    ADD CONSTRAINT `mother` FOREIGN KEY (`mother`) REFERENCES `person` (`id`);

--
-- Constraints for table `property`
--
ALTER TABLE `property`
    ADD CONSTRAINT `person_property` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `relationship`
--
ALTER TABLE `relationship`
    ADD CONSTRAINT `person1` FOREIGN KEY (`person_1`) REFERENCES `person` (`id`),
    ADD CONSTRAINT `person2` FOREIGN KEY (`person_2`) REFERENCES `person` (`id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
    ADD CONSTRAINT `person_skills` FOREIGN KEY (`person`) REFERENCES `person` (`id`);

--
-- Constraints for table `work`
--
ALTER TABLE `work`
    ADD CONSTRAINT `person_work` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
