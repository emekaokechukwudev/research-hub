<?php
// Connect to the login class
require("../classes/login_class.php");

// Register user function
function register_user_fxn ($userid, $firstname, $lastname, $gender, $department, $rank, $email, $password) {
	
	// Create an instance of login class
	$login_object = new login_class();

	// Run the register user method
	$register_user_con = $login_object->register_user($userid, $firstname, $lastname, $gender, $department, $rank, $email, $password);

	// Check if the method worked
	if ($register_user_con) {

		// Return query result (boolean)
		return $register_user_con;
	}
	else {
		return false;
	}
}

// Register admin user function
function admin_register_user_fxn ($userid, $firstname, $lastname, $email, $password) {
	
	// Create an instance of login class
	$login_object = new login_class();

	// Run the register admin user method
	$admin_register_user_con = $login_object->admin_register_user($userid, $firstname, $lastname, $email, $password);

	// Check if the method worked
	if ($admin_register_user_con) {

		// Return query result (boolean)
		return $admin_register_user_con;
	}
	else {
		return false;
	}
}

// Activate user account function
function activate_account_fxn ($a) {

	// Create an instance of login class
	$login_object = new login_class();
	
	// Run the activate user account method
	$activate_account_con = $login_object->activate_account($a);

	// Check if the method worked
	if ($activate_account_con) {

		// Return query result (boolean)
		return $activate_account_con;
	}
	else {
		return false;
	}
}

// Activate admin user account function
function admin_activate_account_fxn ($a) {

	// Create an instance of login class
	$login_object = new login_class();
	
	// Run the activate admin user account method
	$admin_activate_account_con = $login_object->admin_activate_account($a);

	// Check if the method worked
	if ($admin_activate_account_con) {

		// Return query result (boolean)
		return $admin_activate_account_con;
	}
	else {
		return false;
	}
}

// Get login information for user function
function login_user_fxn ($email) {

	// Create an array variable
	$login_array = array();

	// Create an instance of login class
	$login_object = new login_class();

	// Run the get login information method using email
	$login_record = $login_object->login_user($email);

	// Check if the method worked
	if ($login_record) {
		
		// Fetch the from the result
		$one_record = $login_object->db_fetch();

		// Assign to array
		$login_array[] = $one_record;
	}

	// Return array
	return $login_array;
}

// Get login information for admin user function
function admin_login_user_fxn ($email) {

	// Create an array variable
	$login_array = array();

	// Create an instance of login class
	$login_object = new login_class();

	// Run the get login information method for admin user using email
	$login_record = $login_object->admin_login_user($email);

	// Check if the method worked
	if ($login_record) {
		
		// Fetch the from the result
		$one_record = $login_object->db_fetch();

		// Assign to array
		$login_array[] = $one_record;
	}

	// Return array
	return $login_array;
}

// Reset password function
function reset_password_fxn ($a, $b) {

	// Create an instance of login class
	$login_object = new login_class();
	
	// Run the reset password method
	$reset_password_con = $login_object->reset_password($a, $b);

	// Check if the method worked
	if ($reset_password_con) {

		// Return query result (boolean)
		return $reset_password_con;
	}
	else {
		return false;
	}
}

// Reset admin password function
function admin_reset_password_fxn ($a, $b) {

	// Create an instance of login class
	$login_object = new login_class();
	
	// Run the reset admin password method
	$admin_reset_password_con = $login_object->admin_reset_password($a, $b);

	// Check if the method worked
	if ($admin_reset_password_con) {

		// Return query result (boolean)
		return $admin_reset_password_con;
	}
	else {
		return false;
	}
}
?>