<?php
// Connect to database class
require("../settings/db_class.php");

// Grant class to handle everything grant related
class grant_class extends db_connection {

    // Method to insert new grant
	public function insert_grant ($a, $b, $c, $d, $e, $f, $g) {

		// Query to insert new grant
		$sql = "INSERT INTO `grant_opportunities`(`grant_name`, `grant_description`, `currency`, `maximum_award`,
		`closing_date`, `website_1`, `website_2`) VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g')";
		
		// Execute the query
		return $this->db_query($sql);
	}

    // Method to view all grants
	public function view_all_grants () {

		// Query to get all grants
		$sql = "SELECT *, DATE_FORMAT(`closing_date`, '%b') AS `abbreviated_month`, 
		DATE_FORMAT(`closing_date`, '%a %d') AS `abbreviated_day` FROM `grant_opportunities` 
		WHERE `closing_date` > CURDATE() ORDER BY `closing_date`";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view all grants
	public function view_all_grants_pagination ($a, $b) {

		// Query to get all grants paginated
		$sql = "SELECT *, DATE_FORMAT(`closing_date`, '%b') AS `abbreviated_month`, 
		DATE_FORMAT(`closing_date`, '%a %d') AS `abbreviated_day` FROM `grant_opportunities` 
		WHERE `closing_date` > CURDATE() ORDER BY `closing_date` LIMIT $a, $b";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to view details of a grant
	public function view_grant_detail ($a) {

		// Query to get details of a grant
		$sql = "SELECT *, DATE_FORMAT(`closing_date`, '%a - %d %M %Y') 
		AS `custom_date` FROM `grant_opportunities` WHERE `grant_id` = '$a'";

		// Execute the query
		return $this->db_query($sql);
	}

	// Method to update grant
	public function update_grant ($a, $b, $c, $d, $e, $f, $g, $h) {

		// Query to update grant
		$sql = "UPDATE `grant_opportunities` SET `grant_name` = '$a', `grant_description` = '$b', `currency` = '$c',
		`maximum_award` = '$d', `closing_date` = '$e', `website_1` = '$f', `website_2` = '$g' WHERE `grant_id` = '$h'";
		
		// Execute the query
		return $this->db_query($sql);
	}

	// Method to delete a grant
	public function delete_grant ($a) {

		// Query to delete a grant
		$sql = "DELETE FROM `grant_opportunities` WHERE `grant_id` = '$a'";

		// Execute the query
		return $this->db_query($sql);
	}
}
?>