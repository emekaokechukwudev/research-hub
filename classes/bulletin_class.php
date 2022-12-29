<?php
// Connect to database class
require("../settings/db_class.php");

// Bulletin class to handle everything news and events related
class bulletin_class extends db_connection {

	// Method to insert new news
	public function insert_news ($a, $b, $c) {

		// Query to insert new news
		$sql = "INSERT INTO `news`(`news_title`, `news_content`, `news_published_on`) VALUES ('$a', '$b', '$c')";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all news contents
	public function view_all_news () {
		
		// Query to get all news contents
		$sql = "SELECT *, DATE_FORMAT(`news_published_on`, '%W %D %M %Y %H:%i GMT') AS `custom_date` FROM `news`";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view details of a news
	public function view_news_detail ($a) {
		
		// Query to get details of a news
		$sql = "SELECT * FROM `news` WHERE `news_id` = '$a'";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to update news
	public function update_news ($a, $b, $c) {

		// Query to update news
		$sql = "UPDATE `news` SET `news_title` = '$a', `news_content` = '$b' WHERE `news_id` = '$c'";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method to delete a news
	public function delete_news ($a) {

		// Query to delete a news
		$sql = "DELETE FROM `news` WHERE `news_id` = '$a'";

		// Execute the query
		return $this->db_query($sql);
	}
	
	// Method to insert new event
	public function insert_event ($a, $b, $c, $d, $e) {

		// Query to insert new event
		$sql = "INSERT INTO `events`(`event_title`, `event_date`, `event_type`, `event_venue`, `event_content`) 
		VALUES ('$a', '$b', '$c', '$d', '$e')";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all events
	public function view_all_events () {

		// Query to get all events
		$sql = "SELECT *, DATE_FORMAT(`event_date`, '%b') AS `abbreviated_month`, DATE_FORMAT(`event_date`, '%a %d') 
		AS `abbreviated_day` FROM `events` WHERE `event_date` > CURDATE() ORDER BY `event_date`";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all events
	public function view_all_events_paginated ($a, $b) {
	
		// Query to get all events paginated
		$sql = "SELECT *, DATE_FORMAT(`event_date`, '%b') AS `abbreviated_month`, DATE_FORMAT(`event_date`, '%a %d') 
		AS `abbreviated_day` FROM `events` WHERE `event_date` > CURDATE() ORDER BY `event_date` LIMIT $a, $b";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to update event
	public function update_event ($a, $b, $c, $d, $e, $f) {

		// Query to update event
		$sql = "UPDATE `events` SET `event_title` = '$a', `event_date` = '$b', `event_type` = '$c',
		`event_venue` = '$d', `event_content` = '$e' WHERE `event_id` = '$f'";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method to delete an event
	public function delete_event ($a) {

		// Query to delete an event
		$sql = "DELETE FROM `events` WHERE `event_id` = '$a'";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view details of an event
	public function view_event_detail ($a) {
		
		// Query to get details of an event
		$sql = "SELECT *, DATE_FORMAT(`event_date`, '%a - %d %M %Y %H:%i GMT') AS `custom_date` FROM `events` WHERE `event_id` = '$a'";

		// Execute the query
		return $this->db_query($sql);
	}
}
?>