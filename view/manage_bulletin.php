<?php
// Connect to core file for general configuration
require("../settings/core.php");

// Check for login
check_login();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Hub - Add Bulletin</title>
	<link rel="icon" href="../images/favicon.ico" type="image/ico" sizes="64x64">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your research journey">
    <meta name="author" content="Emeka Okechukwu - Full Stack Developer">
	
	<!-- CDN Bootstrap and jQuery -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome for icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- SweetAlert -->
	<script src="../js/sweetalert.min.js"></script>

	<!-- Editor -->
	<script type="text/javascript" src="../tinymce/tinymce.min.js"></script>

	<!-- Custom JS and spinner -->
	<script type="text/javascript" src="../js/bulletin_ajax.js"></script>
	<script type="text/javascript" src="../js/loading-spinner.js"></script>
	<script type="text/javascript" src="../js/standard_js.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.css"/>

	<!-- Custom CSS -->
	<style type="text/css" media="screen">
		a:link { color: black; text-decoration: none; }
		a:visited { color: black; text-decoration: none; }
		a:hover { color: #923D41; text-decoration: none; }
		a:active { color: #923D41; text-decoration: none; }

		/* Menu dropdown link color */
		a.dropdown-item:link { color: white; text-decoration: none; }
		a.dropdown-item:visited { color: white; text-decoration: none; }
		a.dropdown-item:hover { color: black; text-decoration: none; }
		a.dropdown-item:active { color: white; text-decoration: none; }

		/* Tab menu style */
		.nav-tabs .nav-link.active {
			background-color: #923D41;
			color: white;
		}

		/* SweetAlert button color */
		.swal-button {
			background-color: #923D41;
			padding: 7px 19px;
			box-shadow: none !important;
		}

		.swal-button:not([disabled]):hover {
			background-color: #923D41;
		}

		.swal-button--cancel {
   			background: #efefef;
		}

		.swal-button--cancel:not([disabled]):hover {
    		background: #efefef;
		}
		
		.panel.date {
			margin: 0px;
			width: 60px;
			text-align: center;
		}

		.panel.date .month {
			padding: 2px 0px;
			font-weight: 700;
			text-transform: uppercase;
		}

		.panel.date .day {
			padding: 3px 0px;
			font-weight: 700;
			font-size: 1.5em;
		}
	</style>
</head>
<body>

	<!-- Controller and settings -->
	<?php
		// Connect to controller
		require("../controllers/bulletin_controller.php");

		// Check if action is a manage event
		if (isset($_GET['manage_event'])) {

			// Get event id
			$id = $_GET['manage_event'];

			// Run function to get event detail
			$result = view_event_detail_fxn($id);

			// Store in variables
			$event_id = $result[0]['event_id'];
			$event_title = $result[0]['event_title'];
			$event_date = $result[0]['event_date'];
			$event_type = $result[0]['event_type'];
			$event_venue = $result[0]['event_venue'];
			$event_content = $result[0]['event_content'];

		} else if (isset($_GET['manage_news'])) {

			// Get news id
			$id = $_GET['manage_news'];

			// Run function to get news detail
			$result = view_news_detail_fxn($id);

			// Store in variables
			$news_id = $result[0]['news_id'];
			$news_title = $result[0]['news_title'];
			$news_content = $result[0]['news_content'];
			$news_published_on = $result[0]['news_published_on'];
		} 
	?>
		
	<!-- Top navigation -->
	<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #923D41;">
		<a class="navbar-brand" href="admin_dashboard.php">Research Hub</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span>| </span><span class="fas fa-hand-holding-usd"></span> Grant</a>
					<div class="dropdown-menu" style="background-color: #923D41;">
						<a class="dropdown-item" href="admin_grant_opportunities.php"><span class="fas fa-hand-holding-usd"></span> Grant Opportunities</a>
						<a class="dropdown-item" href="manage_grant_opportunity.php"><span class="fas fa-edit"></span> Manage Grant</a>
					</div>
				</li>
			
				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span>| </span><span class="fas fa-chalkboard"></span> Bulletin</a>
					<div class="dropdown-menu" style="background-color: #923D41;">
                        <a class="dropdown-item" href="admin_bulletin.php"><span class="fas fa-chalkboard"></span> View Bulletin</a>
                        <a class="dropdown-item" href="manage_bulletin.php"><span class="fas fa-edit"></span> Manage Bulletin</a>
					</div>
				</li>

                <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span>| </span><span class="fas fa-user-friends"></span> Users</a>
					<div class="dropdown-menu" style="background-color: #923D41;">
                        <a class="dropdown-item" href="admin_profile.php"><span class="fas fa-user"></span> Profile</a>
                        <a class="dropdown-item" href="all_active_users.php"><span class="fas fa-users"></span> All Active Users</a>
					</div>
				</li>
	
				<li class="nav-item">
					<a class="nav-link" href="../login/logout.php">
						<span>| </span>
						<span class="fas fa-sign-out-alt"></span>
						<span>Logout</span>
					</a>
				</li>

			</ul>
		</div>  
	</nav>
	<br>

	<!-- Main body content -->
	<div class="container mt-1">

		<h2 style="color: #923D41;"><span class="fa fa-chalkboard"></span> <?php echo (isset($event_id))? 'Manage Bulletin': 'Add Bulletin'; ?></h2>
		</br>

		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#upcomingevents"><span class="fa fa-calendar-alt"></span> <?php echo (isset($event_id))? 'Manage Event': 'Add Event'; ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#latestnews"><span class="fa fa-newspaper"></span> <?php echo (isset($news_id))? 'Manage News': 'Add News'; ?></a>
			</li>
		</ul>
		
		<!-- Tab pane -->
		<div class="tab-content">

			<!-- Upcoming events pane -->
			<br>
			<div id="upcomingevents" class="container tab-pane active">
				<div class="container">
					<div>
                        <form role="form" action="" method="post"> 
                            <div class="row form-group">
                                <div class="col">
                                    <textarea type="text" class="form-control" placeholder="Event Title *" name="eventtitle" id="eventtitle" rows="1" maxlength="255" required="required"><?php echo (isset($event_title))? $event_title: ''; ?></textarea>
                                    <small class="form-text text-muted">
                                        (<span id="interestcount">0 / 255</span>) - title of the event
                                    </small>
                                </div>
                            </div>

							<div class="row form-group">
								<div class="col">
									<input type="text" class="form-control" placeholder="Event Date *" name="eventdate" id="eventdate" required="required" value="<?php echo (isset($event_date))? $event_date: ''; ?>">
									<small class="form-text text-muted">
										event date - GMT timezone
									</small>
								</div>
								<div class="col">
									<select class="form-control" name="eventtype" id="eventtype" required="required">
										<?php echo (isset($event_id))? '<option value="'.$event_type.'" disabled selected>'.$event_type.'</option>' : '<option value="" disabled selected>Select the event type</option>';?>
										<option value="Research Day">Research Day</option>
										<option value="Research Bootcamp">Research Bootcamp</option>
										<option value="Research Committee Meetings">Research Committee Meetings</option>
										<option value="Faculty Research Series">Faculty Research Series</option>
										<option value="Research & Intellectual Community">Research & Intellectual Community</option>
									</select>
									<small class="form-text text-muted">
										event type
									</small>
								</div>
							</div>

							<div class="row form-group">
								<div class="col">
									<input type="text" class="form-control" placeholder="Event Venue *" name="eventvenue" id="eventvenue" required="required" value="<?php echo (isset($event_venue))? $event_venue: ''; ?>">
									<small class="form-text text-muted">
										event venue
									</small>
								</div>
							</div>

                            <div class="row form-group">
                                <div class="col">
                                    <textarea type="text" class="form-control" placeholder="Event Content *" name="eventcontent" id="eventcontent" rows="2" required="required"><?php echo (isset($event_content))? $event_content: ''; ?></textarea>
                                    <small class="form-text text-muted">
                                        (<span id="interestcount">0 / 255</span>) - write the content of the event
                                    </small>
                                </div>
                            </div>
                            
                            <div class="row form-group">

								<input type="hidden" name="eventid" id="eventid" value="<?php echo (isset($event_id))? $event_id : '';?>">

								<?php echo (isset($event_id))? '
								
									<div class="col">

										<!-- Error messages -->
										<div class="alert alert-danger fade collapse" id="missing_event_title">
											Missing event title.
										</div>
										<div class="alert alert-danger fade collapse" id="missing_event_date">
											Missing event date.
										</div>
										<div class="alert alert-danger fade collapse" id="missing_event_venue">
											Missing event venue.
										</div>
										<div class="alert alert-danger fade collapse" id="missing_event_content">
											Missing event content.
										</div>
										<div class="alert alert-danger fade collapse" id="update_event_failed">
											<strong>Failed to update event!</strong> Kindly try again and contact admin.
										</div>

										<button type="submit" class="btn btn-block btn-info" name="updateeventbutton" id="updateeventbutton" onclick="updateevent()"><span class="fa fa-edit"></span> Update Event</button>
									</div>
									
									<div class="col">

										<!-- Error messages -->
										<div class="alert alert-danger fade collapse" id="delete_event_failed">
											<strong>Failed to delete event!</strong> Kindly try again and contact admin.
										</div>

										<button type="submit" class="btn btn-block btn-danger" name="deleteeventbutton" id="deleteeventbutton" onclick="deleteevent()"><span class="fa fa-trash-alt"></span> Delete Event</button>
									</div>': 
									
									'<div class="col"></div>

									<div class="col">

										<!-- Error messages -->
										<div class="alert alert-danger fade collapse" id="missing_event_title">
											Missing event title.
										</div>
										<div class="alert alert-danger fade collapse" id="missing_event_date">
											Missing event date.
										</div>
										<div class="alert alert-danger fade collapse" id="missing_event_venue">
											Missing event venue.
										</div>
										<div class="alert alert-danger fade collapse" id="missing_event_content">
											Missing event content.
										</div>
										<div class="alert alert-danger fade collapse" id="add_event_failed">
											<strong>Failed to add event!</strong> Kindly try again and contact admin.
										</div>

										<button type="submit" class="btn btn-block btn-success" name="addeventbutton" id="addeventbutton" onclick="addevent()"><span class="fa fa-check-circle"></span> Add Event</button>
									</div>

									<div class="col"></div>'; 
								?>
                                
                            </div>   
                        </form>

                        <!-- Loading spinner -->
                        <div class="d-flex justify-content-center">
                            <div id="processLoading" role="status">
                            </div>
                        </div>

		            </div>
				</div>
			</div>

			<!-- Latest news pane -->
			<div class="container tab-pane fade" id="latestnews">
				<div class="container"> <br>
                    <div>
                        <form role="form" action="" method="post"> 
                            <div class="row form-group">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Date: " name="date" id="date" required="required" maxlength="20" value="<?php echo (isset($news_published_on))? 'Date Published: '.$news_published_on: 'Date: '.date("l jS F Y H:i").''; ?>" readonly>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col">
                                    <textarea type="text" class="form-control" placeholder="News Title *" name="newstitle" id="newstitle" rows="2" maxlength="255" required="required"><?php echo (isset($news_title))? $news_title: ''; ?></textarea>
                                    <small class="form-text text-muted">
                                        (<span id="interestcount">0 / 255</span>) - title of your news.
                                    </small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col">
                                    <textarea type="text" class="form-control" placeholder="News Content *" name="newscontent" id="newscontent" rows="5" required="required"><?php echo (isset($news_content))? $news_content: ''; ?></textarea>
                                    <small class="form-text text-muted">
                                        (<span id="interestcount">0 / ∞</span>) - write the content of your news.
                                    </small>
                                </div>
                            </div>

							<div class="row form-group">

								<input type="hidden" name="newsid" id="newsid" value="<?php echo (isset($news_id))? $news_id : '';?>">

								<?php echo (isset($news_id))? '
									
									<div class="col">

										<!-- Error messages -->
										<div class="alert alert-danger fade collapse" id="invalid_news_title">
											Invalid news title.
										</div>
										<div class="alert alert-danger fade collapse" id="invalid_news_content">
											Invalid news content.
										</div>
										<div class="alert alert-danger fade collapse" id="update_news_failed">
											<strong>Failed to update news!</strong> Kindly try again or contact admin.
										</div>

										<button type="submit" class="btn btn-block btn-info" name="updatenewsbutton" id="updatenewsbutton" onclick="updatenews()"><span class="fa fa-edit"></span> Update News</button>
									</div>
									
									<div class="col">
										
										<!-- Error messages -->
										<div class="alert alert-danger fade collapse" id="delete_news_failed">
											<strong>Failed to delete news!</strong> Kindly try again and contact admin.
										</div>

										<button type="submit" class="btn btn-block btn-danger" name="deletenewsbutton" id="deletenewsbutton" onclick="deletenews()"><span class="fa fa-trash-alt"></span> Delete News</button>
									</div>': 
									
									'<div class="col"></div>

									<div class="col">

										<!-- Error messages -->
										<div class="alert alert-danger fade collapse" id="invalid_news_title">
											Invalid news title.
										</div>
										<div class="alert alert-danger fade collapse" id="invalid_news_content">
											Invalid news content.
										</div>
										<div class="alert alert-danger fade collapse" id="add_news_failed">
											<strong>Failed to add news!</strong> Kindly try again or contact admin.
										</div>

										<button type="submit" class="btn btn-block btn-success" name="addnewsbutton" id="addnewsbutton" onclick="addnews()"><span class="fa fa-check-circle"></span> Add News Content</button>
									</div>

									<div class="col"></div>'; 
								?>
							</div>
                        </form>

                        <!-- Loading spinner -->
                        <div class="d-flex justify-content-center">
                            <div id="processLoading" role="status">
                            </div>
                        </div>

		            </div>
				</div>
			</div>

		</div>
		<br><br>

	</div>

</body>
<script src="../js/jquery.js"></script>
<script src="../node_modules/php-date-formatter/js/php-date-formatter.min.js"></script>
<script src="../node_modules/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js" integrity="sha512-hDFt+089A+EmzZS6n/urree+gmentY36d9flHQ5ChfiRjEJJKFSsl1HqyEOS5qz7jjbMZ0JU4u/x1qe211534g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
	$('#eventdate').datetimepicker({
		format:'Y/m/d H:i',
		minDate: 0,
	});
</script>

</html>