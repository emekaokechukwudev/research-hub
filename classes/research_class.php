<?php
// Connect to database class
require("../settings/db_class.php");

// Research class to handle everything research related
class research_class extends db_connection {

    // Method to insert new research
	public function insert_research ($a, $b, $c, $d, $e, $f, $g, $h, $i) {

		$research_id = time() + $i;

		$last_modified = date('Y-m-d H:i:s');

		// Query to insert new research
		$sql = "INSERT INTO `research`(`research_id`, `research_topic`, `research_problem`, `research_hypothesis`, 
		`data_collection_method`, `data_findings`, `research_abstract`, `grant_information`, `publication`, 
		`submitted_by`, `last_modified`) VALUES ('$research_id', '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$last_modified')";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method to update research
	public function update_research ($a, $b, $c, $d, $e, $f, $g, $h, $i) {

		$last_modified = date('Y-m-d H:i:s');

		// Query to update research
		$sql = "UPDATE `research` SET `research_topic` = '$a', `research_problem` = '$b', `research_hypothesis` = '$c',
		`data_collection_method` = '$d', `data_findings` = '$e', `research_abstract` = '$f', `grant_information` = '$g', 
		`publication` = '$h', `last_modified` = '$last_modified' WHERE `research_id` = '$i'";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method to publish research
	public function publish_research ($a, $b, $c, $d, $e, $f, $g, $h, $i) {

		// Query to publish research
		$sql = "UPDATE `research` SET `research_topic` = '$a', `research_problem` = '$b', `research_hypothesis` = '$c',
		`data_collection_method` = '$d', `data_findings` = '$e', `research_abstract` = '$f', `grant_information` = '$g',
		`publication` = '$h', `published` = 1 WHERE `research_id` = '$i'";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all ongoing research under a user
	public function view_all_user_ongoing_research ($a) {
		
		// Query to get all ongoing research under a user
		$sql = "SELECT * FROM `research` WHERE `submitted_by` = '$a' AND `published` = 0 ORDER BY `last_modified` DESC";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all ongoing research under a user
	public function view_all_user_ongoing_research_pagination ($a, $b, $c) {
		
		// Query to get all ongoing research under a user paginated
		$sql = "SELECT * FROM `research` WHERE `submitted_by` = '$a' AND `published` = 0  ORDER BY `last_modified` DESC LIMIT $b, $c";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all ongoing research under a user based on research topic
	public function search_user_ongoing_research ($term, $a) {
		
		// Query to get all ongoing research under a user based on research topic
		$sql = "SELECT * FROM `research` WHERE `research_topic` LIKE '%$term%' AND `submitted_by` = '$a' AND `published` = 0 
		ORDER BY `last_modified` DESC";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all ongoing research
	public function view_all_ongoing_research () {
		
		// Query to get all ongoing research
		$sql = "SELECT * FROM `research` WHERE `published` = 0 ORDER BY `last_modified` DESC";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all ongoing research
	public function view_all_ongoing_research_pagination ($a, $b) {
		
		// Query to get all ongoing research paginated
		$sql = "SELECT * FROM `research`, `users` WHERE `research`.`submitted_by` = `users`.`user_id` AND `published` = 0 
		ORDER BY `research`.`last_modified` DESC LIMIT $a, $b";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all ongoing research based on research topic
	public function search_all_ongoing_research ($term) {
		
		// Query to get all ongoing research based on research topic
		$sql = "SELECT * FROM `research`, `users` WHERE `research`.`submitted_by` = `users`.`user_id` AND `published` = 0 
		AND `research`.`research_topic` LIKE '%$term%' ORDER BY `research`.`last_modified` DESC";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view details of a research
	public function view_one_research ($a) {

		// Query to get details of a research
		$sql = "SELECT * FROM `research` WHERE `research_id` = '$a'";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to delete a research
	public function delete_research ($a) {

		// Query to delete a research
		$sql = "DELETE FROM `research` WHERE `research_id` = '$a'";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all published research under a user
	public function view_all_user_published_research ($a) {

		// Query to get all published research under a user
		$sql = "SELECT * FROM `research` WHERE `submitted_by` = '$a' AND `published` = 1 ORDER BY `last_modified` DESC";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all published research under a user
	public function view_all_user_published_research_pagination ($a, $b, $c) {

		// Query to get all published research under a user paginated 
		$sql = "SELECT * FROM `research` WHERE `submitted_by` = '$a' AND `published` = 1 ORDER BY `last_modified` DESC LIMIT $b, $c";

		// Execute the query
		return $this->db_query($sql);
	}
	
	// Method to view all published research
	public function view_all_published_research ($a) {

		// Query to get all published research
		$sql = "SELECT * FROM `research` WHERE `published` = 1 ORDER BY `last_modified` DESC";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all published research
	public function view_all_published_research_pagination ($a, $b, $c) {

		// Query to get all published research paginated
		$sql = "SELECT * FROM `research` WHERE `published` = 1 ORDER BY `last_modified` DESC LIMIT $b, $c";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all verified users except logged-in user
	public function view_all_users_except_user($a) {

		// Query to get all verified users except logged-in user
		$sql = "SELECT * FROM `users` WHERE `user_id` <> '$a' AND `verified` = 2";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all verified users except logged-in user
	public function view_all_users_except_user_pagination ($a, $b, $c) {

		// Query to get all verified users except logged-in user paginated
		$sql = "SELECT * FROM `users` WHERE `user_id` <> '$a'  AND `verified` = 2 LIMIT $b, $c";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all verified users as admin
	public function view_all_users_admin () {

		// Query to get all verified users as admin
		$sql = "SELECT * FROM `users` WHERE `verified` = 2";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all verified users as admin
	public function view_all_users_admin_pagination ($a, $b) {

		// Query to get all verified users as admin paginated
		$sql = "SELECT * FROM `users` WHERE `verified` = 2 LIMIT $a, $b";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all published research under a user based on research topic
	public function search_user_published_research ($term, $a) {
		
		// Query to get all published research under a user based on research topic
		$sql = "SELECT * FROM `research` WHERE `research_topic` LIKE '%$term%' AND `submitted_by` = '$a' AND `published` = 1 
		ORDER BY `last_modified` DESC";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all published research based on research topic
	public function search_all_published_research ($term, $a) {
		
		// Query to get all published research based on research topic
		$sql = "SELECT * FROM `research` WHERE `research_topic` LIKE '%$term%' AND `published` = 1 ORDER BY `last_modified` DESC";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all users based on name
	public function search_user ($term, $a) {

		// Query to get all users based on name
		$sql = "SELECT * FROM `users` WHERE `first_name` LIKE '%$term%' OR `last_name` LIKE '%$term%' 
		OR CONCAT(`first_name`, ' ', `last_name`) LIKE '%$term%' AND `user_id` <> '$a'";

		// Execute the query
		return $this->db_query($sql);
	}
	
	// Method to join research
	public function join_research ($a, $b) {

		// Query to join research
		$sql = "INSERT INTO `team`(`research_id`, `user_id`, `has_team`) VALUES ('$a', '$b', 1)";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to remove user from research
	public function leave_research ($a, $b) {

		// Query to remove user from research
		$sql = "DELETE FROM `team` WHERE `research_id` = '$a' AND `user_id` = '$b'";

		// Execute the query
		return $this->db_query($sql);
	}
	
	// Method to view all users under a research except for logged-in user
	public function view_all_research_users_except_user ($a, $b) {

		// Query to get all users under a research except for logged-in user
		$sql = "SELECT * FROM `research`, `users`, `team` WHERE `research`.`research_id` = `team`.`research_id`
		AND `users`.`user_id` = `team`.`user_id` AND `users`.`verified` = 2 AND `research`.`research_id` = '$b' 
		ORDER BY `research`.`last_modified` DESC";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all collaborative research under a user
	public function view_all_user_collaborative_research ($a) {
		
		// Query to get all collaborative research under a user
		$sql = "SELECT * FROM `research`, `users`, `team` WHERE `research`.`research_id` = `team`.`research_id` 
		AND `users`.`user_id` = `team`.`user_id` AND `users`.`user_id` = '$a' ORDER BY `research`.`last_modified` DESC";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all collaborative research under a user
	public function view_all_user_collaborative_research_pagination ($a, $b, $c) {
		
		// Query to get all collaborative research under a user paginated
		$sql = "SELECT * FROM `research`, `users`, `team` WHERE `research`.`research_id` = `team`.`research_id` 
		AND `users`.`user_id` = `team`.`user_id` AND `users`.`user_id` = '$a' ORDER BY `research`.`last_modified` DESC LIMIT $b, $c";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all collaborative research under a user based on research topic
	public function search_collaborative_research ($term, $a) {
		
		// Query to get all collaborative research under a user based on research topic
		$sql = "SELECT * FROM `research`, `users`, `team` WHERE `research`.`research_id` = `team`.`research_id` 
		AND `users`.`user_id` = `team`.`user_id` AND `users`.`user_id` = '$a' AND `research`.`research_topic` LIKE '%$term%' 
		ORDER BY `research`.`last_modified` DESC";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view research leader details
	public function view_research_leader ($a) {
		
		// Query to get research leader details
		$sql = "SELECT * FROM `users` JOIN `research` ON `research`.`submitted_by` = `users`.`user_id` WHERE `research`.`research_id` = '$a'";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all research team details
	public function view_research_team ($a) {
		
		// Query to get all research team details
		$sql = "SELECT * FROM `research`, `users`, `team` WHERE `research`.`research_id` = `team`.`research_id` 
		AND `users`.`user_id` = `team`.`user_id` AND `research`.`research_id` = '$a'";

		// Execute the query
		return $this->db_query($sql);
	}
}
?>