<?php
// Connect to the research class
require("../classes/research_class.php");

// Insert research function
function insert_research_fxn ($a, $b, $c, $d, $e, $f, $g, $h, $i) {

	// Create an instance of research class
	$research_object = new research_class();
	
	// Run the insert research method
	$insert_research_con = $research_object->insert_research($a, $b, $c, $d, $e, $f, $g, $h, $i);

	// Check if the method worked
	if ($insert_research_con) {

		// Return query result (boolean)
		return $insert_research_con;
	}
	else {
		return false;
	}
}

// Update research function
function update_research_fxn ($a, $b, $c, $d, $e, $f, $g, $h, $i) {
	
	// Create an instance of research class
	$research_object = new research_class();
	
	// Run the update research method
	$update_research_con = $research_object->update_research($a, $b, $c, $d, $e, $f, $g, $h, $i);

	// Check if the method worked
	if ($update_research_con) {

		// Return query result (boolean)
		return $update_research_con;
	}
	else {
		return false;
	}
}

// Publish research function
function publish_research_fxn ($a, $b, $c, $d, $e, $f, $g, $h, $i) {

	// Create an instance of research class
	$research_object = new research_class();
	
	// Run the publish research method
	$publish_research_con = $research_object->publish_research($a, $b, $c, $d, $e, $f, $g, $h, $i);

	// Check if the method worked
	if ($publish_research_con) {

		// Return query result (boolean)
		return $publish_research_con;
	}
	else {
		return false;
	}
}

// View all ongoing research under a user function
function view_all_user_ongoing_research_fxn ($a) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all ongoing research under a user method
	$research_records = $research_object->view_all_user_ongoing_research($a);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View all ongoing research under a user function
function view_all_user_ongoing_research_pagination_fxn ($a, $b, $c) {

	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all ongoing research under a user paginated method
	$research_records = $research_object->view_all_user_ongoing_research_pagination($a, $b, $c);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View all ongoing research function
function view_all_ongoing_research_fxn () {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all ongoing research method
	$research_records = $research_object->view_all_ongoing_research();

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View all ongoing research function
function view_all_ongoing_research_pagination_fxn ($a, $b) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all ongoing research paginated method
	$research_records = $research_object->view_all_ongoing_research_pagination($a, $b);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// Search all ongoing research function
function search_all_ongoing_research_fxn ($term) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the search all ongoing research method
	$research_records = $research_object->search_all_ongoing_research($term);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {
			
			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View one research function
function view_one_research_fxn ($a) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view one research method
	$research_record = $research_object->view_one_research($a);

	// Check if the method worked
	if ($research_record) {
		
		// Fetch the result
		$one_record = $research_object->db_fetch();

		// Assign to array
		$research_array[] = $one_record;
	}

	// Return array
	return $research_array;
}

// Delete research function
function delete_research_fxn ($a) {

	// Create an instance of research class
	$research_object = new research_class();
	
	// Run the delete research method
	$delete_research_con = $research_object->delete_research($a);

	// Check if the method worked
	if ($delete_research_con) {

		// Return query result (boolean)
		return $delete_research_con;
	}
	else {
		return false;
	}
}

// View all published research under a user function
function view_all_user_published_research_fxn ($a) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all published research under a user method
	$research_records = $research_object->view_all_user_published_research($a);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View all published research under a user function
function view_all_user_published_research_pagination_fxn ($a, $b, $c) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all published research under a user paginated method
	$research_records = $research_object->view_all_user_published_research_pagination($a, $b, $c);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View all published research function
function view_all_published_research_fxn ($a) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all published research method
	$research_records = $research_object->view_all_published_research($a);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View all published research function
function view_all_published_research_pagination_fxn ($a, $b, $c) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all published research paginated method
	$research_records = $research_object->view_all_published_research_pagination($a, $b, $c);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View all users except logged-in user function
function view_all_users_except_user_fxn ($a) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all users except logged-in user method
	$research_records = $research_object->view_all_users_except_user($a);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View all users except logged-in user function
function view_all_users_except_user_pagination_fxn ($a, $b, $c) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all users except logged-in user paginated method
	$research_records = $research_object->view_all_users_except_user_pagination($a, $b, $c);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View all users as admin function
function view_all_users_admin_fxn () {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all users as admin method
	$research_records = $research_object->view_all_users_admin();

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View all users as admin function
function view_all_users_admin_pagination_fxn ($a, $b) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all users as admin paginated method
	$research_records = $research_object->view_all_users_admin_pagination($a, $b);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// Search ongoing research under a user function
function search_user_ongoing_research_fxn ($term, $a) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the search ongoing research under a user method
	$research_records = $research_object->search_user_ongoing_research($term, $a);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {
			
			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// Search published research under a user function
function search_user_published_research_fxn ($term, $a) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the search published research under a user method
	$research_records = $research_object->search_user_published_research($term, $a);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {
			
			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// Search all published research function
function search_all_published_research_fxn ($term, $a) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the search all published research method
	$research_records = $research_object->search_all_published_research($term, $a);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {
			
			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// Search user function
function search_user_fxn ($term, $a) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the search user method
	$research_records = $research_object->search_user($term, $a);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {
			
			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// Join research function
function join_research_fxn ($a, $b) {

	// Create an instance of research class
	$research_object = new research_class();
	
	// Run the join research method
	$join_research_con = $research_object->join_research($a, $b);

	// Check if the method worked
	if ($join_research_con) {

		// Return query result (boolean)
		return $join_research_con;
	}
	else {
		return false;
	}
}

// Leave research function
function leave_research_fxn ($a, $b) {

	// Create an instance of research class
	$research_object = new research_class();
	
	// Run the leave research method
	$leave_research_con = $research_object->leave_research($a, $b);

	// Check if the method worked
	if ($leave_research_con) {

		// Return query result (boolean)
		return $leave_research_con;
	}
	else {
		return false;
	}
}

// View all users under a research except logged-in user function
function view_all_research_users_except_user_fxn ($a, $b) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all users under a research except logged-in user method
	$research_records = $research_object->view_all_research_users_except_user($a, $b);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View all collaborative research under a user function
function view_all_user_collaborative_research_fxn ($a) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all collaborative research under a user method
	$research_records = $research_object->view_all_user_collaborative_research($a);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View all collaborative research under a user function
function view_all_user_collaborative_research_pagination_fxn ($a, $b, $c) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all collaborative research under a user paginated method
	$research_records = $research_object->view_all_user_collaborative_research_pagination($a, $b, $c);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// Search collaborative research under a user function
function search_collaborative_research_fxn ($term, $a) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the search collaborative research under a user method
	$research_records = $research_object->search_collaborative_research($term, $a);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {
			
			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}

// View research leader function
function view_research_leader_fxn ($a) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view research leader method
	$research_record = $research_object->view_research_leader($a);

	// Check if the method worked
	if ($research_record) {
		
		// Fetch the result
		$one_record = $research_object->db_fetch();

		// Assign to array
		$research_array[] = $one_record;
	}

	// Return array
	return $research_array;
}

// View all research team members function
function view_research_team_fxn ($a) {
	
	// Create an array variable
	$research_array = array();

	// Create an instance of research class
	$research_object = new research_class();

	// Run the view all research team members method
	$research_records = $research_object->view_research_team($a);

	// Check if the method worked
	if ($research_records) {
		
		/**
		 * Loop to see if there is more than one result
		 * Fetch one at a time
		 */
		while ($one_record = $research_object->db_fetch()) {

			// Assign each result to the array
			$research_array[] = $one_record;
		}
	}

	// Return the array
	return $research_array;
}
?>