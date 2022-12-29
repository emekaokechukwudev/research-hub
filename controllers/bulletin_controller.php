<?php
// Connect to the bulletin class
require("../classes/bulletin_class.php");

// Insert news function
function insert_news_fxn ($a, $b, $c) {

	// Create an instance of bulletin class
	$news_object = new bulletin_class();
	
	// Run the insert news method
	$insert_news_con = $news_object->insert_news($a, $b, $c);

	// Check if the method worked
	if ($insert_news_con) {

		// Return query result (boolean)
		return $insert_news_con;
	}
	else {
		return false;
	}
}

// Update news function
function update_news_fxn ($a, $b, $c) {

	// Create an instance of bulletin class
	$news_object = new bulletin_class();
	
	// Run the update news method
	$update_news_con = $news_object->update_news($a, $b, $c);
	
	// Check if the method worked
	if ($update_news_con) {

		// Return query result (boolean)
		return $update_news_con;
	}
	else {
		return false;
	}
}

// Delete news function
function delete_news_fxn ($a) {

	// Create an instance of bulletin class
	$news_object = new bulletin_class();
	
	// Run the delete news method
	$delete_news_con = $news_object->delete_news($a);

	// Check if the method worked
	if ($delete_news_con) {

		// Return query result (boolean)
		return $delete_news_con;
	}
	else {
		return false;
	}
}

// View all news function
function view_all_news_fxn () {

	// Create an array variable
	$news_array = array();

	// Create an instance of bulletin class
	$news_object = new bulletin_class();

	// Run the view all news method
	$news_records = $news_object->view_all_news();

	// Check if the method worked
	if ($news_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $news_object->db_fetch()) {

			// Assign each result to the array
			$news_array[] = $one_record;
		}
	}

	// Return query result (boolean)
	return $news_array;
}

// View news details function
function view_news_detail_fxn ($a) {

	// Create an array variable
	$news_array = array();

	// Create an instance of bulletin class
	$news_object = new bulletin_class();

	// Run the view news details method
	$news_records = $news_object->view_news_detail($a);

	// Check if the method worked
	if ($news_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $news_object->db_fetch()) {

			// Assign each result to the array
			$news_array[] = $one_record;
		}
	}

	// Return the array
	return $news_array;
}

// Insert event function
function insert_event_fxn ($a, $b, $c, $d, $e) {

	// Create an instance of bulletin class
	$event_object = new bulletin_class();
	
	// Run the insert event method
	$insert_event_con = $event_object->insert_event($a, $b, $c, $d, $e);

	// Check if the method worked
	if ($insert_event_con) {

		// Return query result (boolean)
		return $insert_event_con;
	}
	else {
		return false;
	}
}

// Update event function
function update_event_fxn ($a, $b, $c, $d, $e, $f) {

	// Create an instance of bulletin class
	$event_object = new bulletin_class();
	
	// Run the update event method
	$update_event_con = $event_object->update_event($a, $b, $c, $d, $e, $f);

	// Check if the method worked
	if ($update_event_con) {

		// Return query result (boolean)
		return $update_event_con;
	}
	else {
		return false;
	}
}

// Delete event function
function delete_event_fxn ($a) {

	// Create an instance of bulletin class
	$event_object = new bulletin_class();
	
	// Run the delete event method
	$delete_event_con = $event_object->delete_event($a);

	// Check if the method worked
	if ($delete_event_con) {

		// Return query result (boolean)
		return $delete_event_con;
	}
	else {
		return false;
	}
}

// View all events function
function view_all_events_fxn () {

	// Create an array variable
	$event_array = array();

	// Create an instance of bulletin class
	$event_object = new bulletin_class();

	// Run the view all events method
	$event_records = $event_object->view_all_events();

	// Check if the method worked
	if ($event_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $event_object->db_fetch()) {

			// Assign each result to the array
			$event_array[] = $one_record;
		}
	}
	
	// Return the array
	return $event_array;
}

// View all events function
function view_all_events_paginated_fxn ($a, $b) {

	// Create an array variable
	$event_array = array();

	// Create an instance of bulletin class
	$event_object = new bulletin_class();

	// Run the view all events paginated method
	$event_records = $event_object->view_all_events_paginated($a, $b);

	// Check if the method worked
	if ($event_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $event_object->db_fetch()) {

			// Assign each result to the array
			$event_array[] = $one_record;
		}
	}
	
	// Return the array
	return $event_array;
}

// View event details function
function view_event_detail_fxn ($a) {

	// Create an array variable
	$event_array = array();

	// Create an instance of bulletin class
	$event_object = new bulletin_class();

	// Run the view event details method
	$event_records = $event_object->view_event_detail($a);

	// Check if the method worked
	if ($event_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $event_object->db_fetch()) {

			// Assign each result to the array
			$event_array[] = $one_record;
		}
	}
	
	// Return the array
	return $event_array;
}
?>