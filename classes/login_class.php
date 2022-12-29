<?php
// Connect to database class
require("../settings/db_class.php");

// Login class to handle everything login related
class login_class extends db_connection {

	// Method for user registration
	public function register_user ($a, $b, $c, $d, $e, $f, $g, $h) {

		$hashedPassword = password_hash($h, PASSWORD_BCRYPT);

		// Query to insert new user
		$sql = "INSERT into `users`(`user_id`, `first_name`, `last_name`, `gender`, `department`, `rank`, `email_address`, 
		`password`, `verified`) VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$hashedPassword', 1)";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method for admin user registration
	public function admin_register_user ($a, $b, $c, $d, $e) {

		$hashedPassword = password_hash($e, PASSWORD_BCRYPT);

		// Query to insert new admin user
		$sql = "INSERT into `admin_users`(`user_id`, `first_name`, `last_name`, `email_address`, `password`) 
		VALUES ('$a', '$b', '$c', '$d', '$hashedPassword')";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to activate user account
	public function activate_account ($a) {

		// Query to activate user account
		$sql = "UPDATE `users` SET `verified` = 2 WHERE `email_address` = '$a'";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method to activate admin user account
	public function admin_activate_account ($a) {

		// Query to activate admin user account
		$sql = "UPDATE `admin_users` SET `verified` = 2 WHERE `email_address` = '$a'";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method for login information
	public function login_user ($a) {

		// Query to get all login information based on email
		$sql = "SELECT * FROM `users` WHERE `email_address` = '$a' AND `verified` = 2";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method for login information for admin user
	public function admin_login_user ($a) {

		// Query to get all login information for admin user based on email
		$sql = "SELECT * FROM `admin_users` WHERE `email_address` = '$a' AND `verified` = 2";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to reset user password
	public function reset_password ($a, $b) {

		$hashedPassword = password_hash($b, PASSWORD_BCRYPT);

		// Query to reset user password
		$sql = "UPDATE `users` SET `password` = '$hashedPassword' WHERE `email_address` = '$a'";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to reset admin user password
	public function admin_reset_password ($a, $b) {

		$hashedPassword = password_hash($b, PASSWORD_BCRYPT);

		// Query to reset admin user password
		$sql = "UPDATE `admin_users` SET `password` = '$hashedPassword' WHERE `email_address` = '$a'";

		// Execute the query
		return $this->db_query($sql);
	}
}
?>