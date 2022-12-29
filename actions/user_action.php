<?php
// Start session
session_start();

// Connect to controller
require("../controllers/user_controller.php");

if ($_POST['action'] == 'updateuserprofile') {

	// Grab user form data
	$userid = $_POST['userid'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$usergender = $_POST['usergender'];
	$phonenumber = $_POST['phonenumber'];
	$userdepartment = $_POST['userdepartment'];
	$userrank = $_POST['userrank'];
	$interestareas = $_POST['interestareas'];

	// Update user
	$update_user_profile_con = update_user_profile_fxn($firstname, $lastname, $usergender, $phonenumber, 
	$userdepartment, $userrank, $interestareas, $userid);

	if (!$update_user_profile_con) {
		echo 'failed';
	}

} else if ($_POST['action'] == 'updateadminuserprofile') {

	// Grab user form data
	$userid = $_POST['userid'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];

	// Update admin user
	$update_admin_user_profile_con = update_admin_user_profile_fxn($firstname, $lastname, $userid);

	if (!$update_admin_user_profile_con) {
		echo 'failed';
	}

} else if (isset($_POST['action']) == 'viewuserdetail') {  
	$output = '';  
	$user_id = $_POST['user_id'];
	$user_detail = view_user_detail_fxn($user_id);
	
	$output .= '<div>';
	foreach ($user_detail as $row) {  
		$output .= '<div class="media border p-3">
			<img src="../images/face-icon-user.png" alt="" class="mr-3 mt-3 rounded-circle" style="width:60px;">
			<div class="media-body">
				<h4>'.$row["first_name"].' '.$row["last_name"].'<small> <i>'.$row["department"].'</i></small></h4>
				<p><strong>Rank</strong>: '.$row["rank"].'</p>  
				<p><strong>Interests</strong>:</p>
				<p>'.$row["interest_areas"].'</p>
			</div>
		</div>';
	}

	$output .= '</div>';

	echo $output;  
}
?>