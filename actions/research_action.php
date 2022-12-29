<?php
// Start session
session_start();

// Connect to controller
require("../controllers/research_controller.php");

if ($_POST['action'] == 'saveresearch') {

	// Grab research form data
	$researchtopic = $_POST['researchtopic'];
	$researchproblem = $_POST['researchproblem'];
	$researchhypothesis = $_POST['researchhypothesis'];
	$datacollectionmethod = $_POST['datacollectionmethod'];
	$datafindings = $_POST['datafindings'];
	$researchabstract = $_POST['researchabstract'];
	$grantinformation = $_POST['grantinformation'];
	$researchpublication = $_POST['researchpublication'];
	$submittedby = $_SESSION["user_id"];

	// Insert new research
	$insert_research_con = insert_research_fxn($researchtopic, $researchproblem, $researchhypothesis, $datacollectionmethod, 
	$datafindings, $researchabstract, $grantinformation, $researchpublication, $submittedby);

	if (!$insert_research_con) {
		echo 'failed';
	}

} else if ($_POST['action'] == 'updateresearch') {

	// Grab research form data
	$researchid = $_POST['researchid'];
	$researchtopic = $_POST['researchtopic'];
	$researchproblem = $_POST['researchproblem'];
	$researchhypothesis = $_POST['researchhypothesis'];
	$datacollectionmethod = $_POST['datacollectionmethod'];
	$datafindings = $_POST['datafindings'];
	$researchabstract = $_POST['researchabstract'];
	$grantinformation = $_POST['grantinformation'];
	$researchpublication = $_POST['researchpublication'];

	// Update research
	$update_research_con = update_research_fxn($researchtopic, $researchproblem, $researchhypothesis, 
	$datacollectionmethod, $datafindings, $researchabstract, $grantinformation, $researchpublication, $researchid);

	if (!$update_research_con) {
		echo 'failed';
	}

} else if ($_POST['action'] == 'publishresearch') {

	// Grab research form data
	$researchid = $_POST['researchid'];
	$researchtopic = $_POST['researchtopic'];
	$researchproblem = $_POST['researchproblem'];
	$researchhypothesis = $_POST['researchhypothesis'];
	$datacollectionmethod = $_POST['datacollectionmethod'];
	$datafindings = $_POST['datafindings'];
	$researchabstract = $_POST['researchabstract'];
	$grantinformation = $_POST['grantinformation'];
	$researchpublication = $_POST['researchpublication'];

	// Publish research
	$publish_research_con = publish_research_fxn($researchtopic, $researchproblem, $researchhypothesis, $datacollectionmethod, 
	$datafindings, $researchabstract, $grantinformation, $researchpublication, $researchid);

	if (!$publish_research_con) {
		echo 'failed';
	}
	
} else if ($_POST['action'] == 'deleteresearch') {

	// Grab research form data
	$researchid = $_POST['researchid'];

	// Delete research
	$delete_research_con = delete_research_fxn($researchid);

	if (!$delete_research_con) {
		echo 'failed';
	}

} else if ($_POST['action'] == 'joinresearch') {

	// Grab research form data
	$researchid = $_POST['researchid'];
	$userid = $_POST['userid'];

	// Join research
	$join_research_con = join_research_fxn($researchid, $userid);

	if (!$join_research_con) {
		echo 'failed';
	}

} else if ($_POST['action'] == 'leaveresearch') {

	// Grab research form data
	$researchid = $_POST['researchid'];
	$userid = $_POST['userid'];

	// Leave research
	$leave_research_con = leave_research_fxn($researchid, $userid);

	if (!$leave_research_con) {
		echo 'failed';
	}
}
?>