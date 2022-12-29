<?php
// Connect to the user class
require("../classes/user_class.php");

// View user profile function
function view_user_profile_fxn ($a) {

	// Create an array variable
	$user_array = array();

	// Create an instance of user class
	$user_object = new user_class();

	// Run the view user profile method
	$user_records = $user_object->view_user_profile($a);

	// Check if the method worked
	if ($user_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $user_object->db_fetch()) {

			// Assign each result to the array
			$user_array[] = $one_record;
		}
	}

	// Return the array
	return $user_array;
}

// View admin user profile function
function view_admin_user_profile_fxn ($a) {

	// Create an array variable
	$user_array = array();

	// Create an instance of user class
	$user_object = new user_class();

	// Run the view admin user profile method
	$user_records = $user_object->view_admin_user_profile($a);

	// Check if the method worked
	if ($user_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $user_object->db_fetch()) {

			// Assign each result to the array
			$user_array[] = $one_record;
		}
	}

	// Return the array
	return $user_array;
}

// Update user profile function
function update_user_profile_fxn ($a, $b, $c, $d, $e, $f, $g, $h) {

	// Create an instance of user class
	$user_object = new user_class();
	
	// Run the update user profile method
	$update_user_profile_con = $user_object->update_user_profile($a, $b, $c, $d, $e, $f, $g, $h);

	// Check if the method worked
	if ($update_user_profile_con) {

		// Return query result (boolean)
		return $update_user_profile_con;
	}
	else {
		return false;
	}
}

// Update admin user profile function
function update_admin_user_profile_fxn ($a, $b, $c) {

	// Create an instance of user class
	$user_object = new user_class();
	
	// Run the update admin user profile method
	$update_admin_user_profile_con = $user_object->update_admin_user_profile($a, $b, $c);

	// Check if the method worked
	if ($update_admin_user_profile_con) {
		
		// Return query result (boolean)
		return $update_admin_user_profile_con;
	}
	else {
		return false;
	}
}

// View user detail function
function view_user_detail_fxn ($a) {
    
	// Create an array variable
	$user_array = array();

	// Create an instance of user class
	$user_object = new user_class();

	// Run the view user detail method
	$user_records = $user_object->view_user_detail($a);

	// Check if the method worked
	if ($user_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $user_object->db_fetch()) {

			// Assign each result to the array
			$user_array[] = $one_record;
		}
	}

	// Return the array
	return $user_array;
}
?>