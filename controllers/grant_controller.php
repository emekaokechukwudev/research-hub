<?php
// Connect to the grant class
require("../classes/grant_class.php");

// Insert grant function
function insert_grant_fxn ($a, $b, $c, $d, $e, $f, $g) {

	// Create an instance of grant class
	$grant_object = new grant_class();
	
	// Run the insert grant method
	$insert_grant_con = $grant_object->insert_grant($a, $b, $c, $d, $e, $f, $g);

	// Check if the method worked
	if ($insert_grant_con) {

		// Return query result (boolean)
		return $insert_grant_con;
	}
	else {
		return false;
	}
}

// View all grants function
function view_all_grants_fxn () {

	// Create an array variable
	$grant_array = array();

	// Create an instance of grant class
	$grant_object = new grant_class();

	// Run the view all grants method
	$grant_records = $grant_object->view_all_grants();

	// Check if the method worked
	if ($grant_records) {

		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $grant_object->db_fetch()) {

			// Assign each result to the array
			$grant_array[] = $one_record;
		}
	}

	// Return the array
	return $grant_array;
}

// View all grants function
function view_all_grants_pagination_fxn ($a, $b) {

	// Create an array variable
	$grant_array = array();

	// Create an instance of grant class
	$grant_object = new grant_class();

	// Run the view all grants paginated method
	$grant_records = $grant_object->view_all_grants_pagination($a, $b);

	// Check if the method worked
	if ($grant_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $grant_object->db_fetch()) {
			
			// Assign each result to the array
			$grant_array[] = $one_record;
		}
	}

	// Return the array
	return $grant_array;
}

// View grant details function
function view_grant_detail_fxn ($a) {
    
	// Create an array variable
	$grant_array = array();

	// Create an instance of grant class
	$grant_object = new grant_class();

	// Run the view grant details method
	$grant_records = $grant_object->view_grant_detail($a);

	// Check if the method worked
	if ($grant_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $grant_object->db_fetch()) {
			
			// Assign each result to the array
			$grant_array[] = $one_record;
		}
	}

	// Return the array
	return $grant_array;
}

// Update grant function
function update_grant_fxn ($a, $b, $c, $d, $e, $f, $g, $h) {

	// Create an instance of grant class
	$grant_object = new grant_class();
	
	// Run the update grant method
	$update_grant_con = $grant_object->update_grant($a, $b, $c, $d, $e, $f, $g, $h);

	// Check if the method worked
	if ($update_grant_con) {

		// Return query result (boolean)
		return $update_grant_con;
	}
	else {
		return false;
	}
}

// Delete grant function
function delete_grant_fxn ($a) {

	// Create an instance of grant class
	$grant_object = new grant_class();
	
	// Run the delete grant method
	$delete_grant_con = $grant_object->delete_grant($a);

	// Check if the method worked
	if ($delete_grant_con) {

		// Return query result (boolean)
		return $delete_grant_con;
	}
	else {
		return false;
	}
}
?>