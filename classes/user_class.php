<?php
// Connect to database class
require("../settings/db_class.php");

// User class to handle everything user related
class user_class extends db_connection {

	// Method to view user profile details
	public function view_user_profile ($a) {

		// Query to get user profile details
		$sql = "SELECT * FROM `users` WHERE `user_id` = '$a'";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view admin user profile details
	public function view_admin_user_profile ($a) {

		// Query to get admin user profile details
		$sql = "SELECT * FROM `admin_users` WHERE `user_id` = '$a'";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method to update user profile
	public function update_user_profile ($a, $b, $c, $d, $e, $f, $g, $h) {

		// Query to update user profile
		$sql = "UPDATE `users` SET `first_name` = '$a', `last_name` = '$b', `gender` = '$c', `phone_number` = '$d',
		`department` = '$e', `rank` = '$f', `interest_areas` = '$g' WHERE `user_id` = '$h'";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method to update admin user profile
	public function update_admin_user_profile ($a, $b, $c) {

		// Query to update admin user profile
		$sql = "UPDATE `admin_users` SET `first_name` = '$a', `last_name` = '$b' WHERE `user_id` = '$c'";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view user profile details
	public function view_user_detail ($a) {

		// Query to get user profile details
		$sql = "SELECT * FROM `users` WHERE `user_id` = '$a'";

		// Execute the query
		return $this->db_query($sql);
	}
}
?>