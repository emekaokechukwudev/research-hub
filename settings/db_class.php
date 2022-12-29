<?php
// Database

// Database credentials
require('db_cred.php');

/**
 * @author Emeka Okechukwu
 * @version 1
 */
class db_connection {

	// Properties
	public $db = null;
	public $results = null;

	/**
	 * Database connection
	 * @return boolean
	 */
	function db_connect() {

		// Connection
		$this->db = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
		
		// Test the connection
		if (mysqli_connect_errno()) {

			return false;

		} else {

			return true;

		}
	}

	/**
	 * Execute a query
	 * Query the Database
	 * @param takes a connection and sql query
	 * @return boolean
	 */
	function db_query($sqlQuery) {
		if (!$this->db_connect()) {

			return false;

		} elseif ($this->db==null) {

			return false;

		}

		// Run query 
		$this->results = mysqli_query($this->db,$sqlQuery);

		if ($this->results == false) {

			return false;

		} else {

			return true;

		}
	}

	/**
	 * Fetch data
	 * Get select data
	 * @return a record
	 */
	function db_fetch() {

		// Check if result was set
		if ($this->results == null) {

			return false;

		} elseif ($this->results == false) {

			return false;

		}

		// Return a record
		return mysqli_fetch_assoc($this->results);

	}
}
?>