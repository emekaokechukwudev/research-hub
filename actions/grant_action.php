<?php
// Start session
session_start();

// Connect to controller
require("../controllers/grant_controller.php");

if ($_POST['action'] == 'addgrant') {

	// Grab grant form data
	$grantname = $_POST['grantname'];
	$grantdescription = $_POST['grantdescription'];
	$currency = $_POST['currency'];
	$maximumaward = $_POST['maximumaward'];
	$closingdate = $_POST['closingdate'];
	$websitelink1 = $_POST['websitelink1'];
	$websitelink2 = $_POST['websitelink2'];

	// Insert new grant
	$insert_grant_con = insert_grant_fxn($grantname, $grantdescription, $currency, $maximumaward, $closingdate, $websitelink1, $websitelink2);

	if (!$insert_grant_con) {
		echo 'failed';
	}

} else if ($_POST['action'] == 'updategrant') {

	// Grab grant form data
	$grantid = $_POST['grantid'];
	$grantname = $_POST['grantname'];
	$grantdescription = $_POST['grantdescription'];
	$currency = $_POST['currency'];
	$maximumaward = $_POST['maximumaward'];
	$closingdate = $_POST['closingdate'];
	$websitelink1 = $_POST['websitelink1'];
	$websitelink2 = $_POST['websitelink2'];

	// Update grant
	$update_grant_con = update_grant_fxn($grantname, $grantdescription, $currency, $maximumaward, $closingdate, $websitelink1, $websitelink2, $grantid);

	if (!$update_grant_con) {
		echo 'failed';
	}

} else if ($_POST['action'] == 'deletegrant') {

	// Grab grant form data
	$grantid = $_POST['grantid'];

	// Delete grant
	$delete_grant_con = delete_grant_fxn($grantid);

	if (!$delete_grant_con) {
		echo 'failed';
	}

} else if (isset($_POST['action']) == 'viewgrantdetail') {  
	$output = '';  
	$grant_id = $_POST['grant_id'];
	$grant_detail = view_grant_detail_fxn($grant_id);
	
	$output .= '<div>';
	foreach ($grant_detail as $row) {  
		$output .= '<p><b>'.$row["grant_name"].'</b><i></i></p>
			<p><i>'.$row["grant_description"].'</i></p>
			<p><i><b>Maximum award: </b>'.$row["currency"].' '.$row["maximum_award"].'</i></p>
			<p><i><b>Closing date: </b>'.$row["custom_date"].'</i></p>
			<p><i><b>For more information, visit </b></i></p>
			<p><a href='.$row["website_1"].' target="_blank"><i>'.$row["website_1"].'</i></a></p>
			<p><a href='.$row["website_2"].' target="_blank"><i>'.$row["website_2"].'</i></a></p>';
	}

	$output .= '</div>';
	
	echo $output;  
}
?>