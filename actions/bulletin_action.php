<?php
// Start session
session_start();

// Connect to controller
require("../controllers/bulletin_controller.php");

if ($_POST['action'] == 'addevent') {

	// Grab event form data
	$eventtitle = $_POST['eventtitle'];
	$eventdate = $_POST['eventdate'];
	$eventtype = $_POST['eventtype'];
	$eventvenue = $_POST['eventvenue'];
	$eventcontent = $_POST['eventcontent'];

	// Insert new event
	$insert_event_con = insert_event_fxn($eventtitle, $eventdate, $eventtype, $eventvenue, $eventcontent);

	if (!$insert_event_con) {
		echo 'failed';
	}

} else if ($_POST['action'] == 'updateevent') {

	// Grab event form data
	$eventid = $_POST['eventid'];
	$eventtitle = $_POST['eventtitle'];
	$eventdate = $_POST['eventdate'];
	$eventtype = $_POST['eventtype'];
	$eventvenue = $_POST['eventvenue'];
	$eventcontent = $_POST['eventcontent'];

	// Update event
	$update_event_con = update_event_fxn($eventtitle, $eventdate, $eventtype, $eventvenue, $eventcontent, $eventid);

	if (!$update_event_con) {
		echo 'failed';
	}

} else if ($_POST['action'] == 'deleteevent') {

	// Grab event form data
	$eventid = $_POST['eventid'];

	// Delete event
	$delete_event_con = delete_event_fxn($eventid);

	if (!$delete_event_con) {
		echo 'failed';
	}

} else if ($_POST['action'] == 'addnews') {

	// Grab news form data
	$date = date('Y-m-d H:i:s');
	$newstitle = $_POST['newstitle'];
	$newscontent = $_POST['newscontent'];

	// Insert new news
	$insert_news_con = insert_news_fxn($newstitle, $newscontent, $date);

	if (!$insert_news_con) {
		echo 'failed';
	}

}  else if ($_POST['action'] == 'updatenews') {

	// Grab news form data
	$newsid = $_POST['newsid'];
	$newstitle = $_POST['newstitle'];
	$newscontent = $_POST['newscontent'];

	// Update news
	$update_news_con = update_news_fxn($newstitle, $newscontent, $newsid);

	if (!$update_news_con) {
		echo 'failed';
	}

} else if ($_POST['action'] == 'deletenews') {

	// Grab news form data
	$newsid = $_POST['newsid'];

	// Delete news
	$delete_news_con = delete_news_fxn($newsid);

	if (!$delete_news_con) {
		echo 'failed';
	}

} else if (isset($_POST['action']) == 'vieweventdetail') {  
	$output = '';  
	$event_id = $_POST['event_id'];
	$event_detail = view_event_detail_fxn($event_id);
	
	$output .= '<div>
		<div class="row">
			<div class="col-sm-12 table-responsive-sm"><br>
				<table class="table table-sm table-borderless">';  
					foreach ($event_detail as $row) {  
						$output .= '<tr>
							<td class="text-nowrap">
								<i class="fas fa-podcast"></i><strong> Type</strong>
							</td>
							<td><i>'.$row["event_type"].'</i></td>
						</tr>

						<tr>
							<td>
								<i class="fas fa-map"></i><strong> Title</strong>
							</td>
							<td><i>'.$row["event_title"].'</i></td>
						</tr>

						<tr>
							<td>
								<i class="fas fa-book-reader"></i><strong> Content</strong>
							</td>
							<td><i>'.$row["event_content"].'</i></td>
						</tr>

						<tr>
							<td class="text-nowrap">
								<i class="fas fa-map-marker"></i><strong> Venue</strong>
							</td>
							<td><i>'.$row["event_venue"].'</i></td>
						</tr>

						<tr>
							<td class="text-nowrap">
								<i class="fas fa-calendar"></i><strong> Event Date</strong>
							</td>
							<td><i>'.$row["custom_date"].'</i></td>
						</tr>';
					}  
	$output .= "</table></div></div>";
	
	echo $output;
}
?>