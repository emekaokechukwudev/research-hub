CREATE DATABASE `research_hub`;

CREATE TABLE IF NOT EXISTS `research_hub`.`users` (
    `user_id` int NOT NULL,  
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `gender` varchar(255) NOT NULL,
    `phone_number` varchar(13) NULL,
    `department` varchar(255) NOT NULL,
    `rank` varchar(255) NOT NULL,
    `interest_areas` varchar(25500) NULL,
    `photo_url` varchar(255) NULL,
    `email_address` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `verified` tinyint(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`user_id`)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `research_hub`.`admin_users` (
    `user_id` int NOT NULL,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `photo_url` varchar(255) NULL,
    `email_address` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `verified` tinyint(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`user_id`)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `research_hub`.`news` (
    `news_id` int NOT NULL AUTO_INCREMENT,
    `news_title` varchar(255) NOT NULL,
    `news_content` TEXT NOT NULL,
    `news_published_on` datetime NOT NULL,
    PRIMARY KEY (`news_id`)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `research_hub`.`events` (
    `event_id` int NOT NULL AUTO_INCREMENT,  
    `event_title` varchar(255) NOT NULL,
    `event_date` datetime NOT NULL,
    `event_type` varchar(255) NOT NULL,
    `event_venue` varchar(255) NOT NULL,
    `event_content` varchar(255) NOT NULL,
    PRIMARY KEY (`event_id`)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `research_hub`.`grant_opportunities` (
    `grant_id` int NOT NULL AUTO_INCREMENT,  
    `grant_name` varchar(255) NOT NULL,
    `grant_description` varchar(25500) NOT NULL,
    `currency` varchar(255),
    `maximum_award` varchar(255) NOT NULL,
    `closing_date` datetime NOT NULL,
    `website_1` varchar(500) NOT NULL,
    `website_2` varchar(500),
    PRIMARY KEY (`grant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `research_hub`.`research` (
    `research_id` int NOT NULL AUTO_INCREMENT,  
    `research_topic` varchar(255),
    `research_problem` varchar(255),
    `research_hypothesis` varchar(255),
    `data_collection_method` varchar(255),
    `data_findings` varchar(25500),
    `research_abstract` varchar(25500),
    `grant_information` varchar(500),
    `publication` varchar(500),
    `published` boolean DEFAULT '0',
    `submitted_by` int NOT NULL,
    `last_modified` datetime NOT NULL,
    PRIMARY KEY (`research_id`),
    FOREIGN KEY (`submitted_by`) REFERENCES `users`(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `research_hub`.`team` (
    `research_id` int NOT NULL,
    `user_id` int NOT NULL,
    `has_team` boolean NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;