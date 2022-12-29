<?php
// Connect to core file for general configuration
require("../settings/core.php");

// Check for login
check_login();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Hub - Bulletin</title>	
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
	<script type="text/javascript" src="../js/loading-spinner.js"></script>
	<script type="text/javascript" src="../js/standard_js.js"></script>

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
		require('../controllers/bulletin_controller.php');
	?>
		
	<!-- Top navigation -->
	<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #923D41;">
		<a class="navbar-brand" href="dashboard.php">Research Hub</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span>| </span><span class="fas fa-tasks"></span> Research Activity</a>
					<div class="dropdown-menu navbar-dark" style="background-color: #923D41;">
						<a class="dropdown-item" href="research_process.php"><span class="fas fa-play"></span> Start A New Research</a>
						<a class="dropdown-item" href="ongoing_research.php"><span class="fas fa-spinner"></span> My Ongoing Research</a>
						<a class="dropdown-item" href="published_research.php"><span class="fas fa-check-double"></span> My Published Research</a>
						<a class="dropdown-item" href="collaborative_research.php"><span class="fas fa-user-friends"></span> My Collaborative Research</a>
						<a class="dropdown-item" href="invite_user_to_research.php"><span class="fas fa-user-plus"></span> Invite User To Research</a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span>| </span><span class="fas fa-hand-holding-usd"></span> Grant</a>
					<div class="dropdown-menu" style="background-color: #923D41;">
						<a class="dropdown-item" href="grant_opportunities.php"><span class="fas fa-hand-holding-usd"></span> Grant Opportunities</a>
						<a class="dropdown-item" href="grant_support.php"><span class="fas fa-user-friends"></span> Grant Support</a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span>| </span><span class="fas fa-globe"></span> Public Research</a>
					<div class="dropdown-menu navbar-dark" style="background-color: #923D41;">
						<a class="dropdown-item" href="all_ongoing_research.php"><span class="fas fa-spinner"></span> All Ongoing Research</a>
						<a class="dropdown-item" href="all_publications.php"><span class="fas fa-book"></span> All Publications</a>
					</div>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="bulletin.php" role="button" aria-haspopup="true" aria-expanded="false"><span>| </span><span class="fas fa-chalkboard"></span> View Bulletin</a>
				</li> 

				<li class="nav-item">
					<a class="nav-link" href="user_profile.php" role="button" aria-haspopup="true" aria-expanded="false"><span>| </span><span class="fas fa-user"></span> Profile</a>
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

		<h2 style="color: #923D41;"><span class="fa fa-chalkboard"></span> Bulletin</h2>
		</br>

		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#upcomingevents"><span class="fa fa-calendar-alt"></span> Upcoming Events</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#latestnews"><span class="fa fa-newspaper"></span> Latest News</a>
			</li>
		</ul>
		
		<!-- Tab pane -->
		<div class="tab-content">
			
			<!-- Upcoming events pane -->
			<div class="container tab-pane active" id="upcomingevents">
				<div class="tab-content container"> <br>
					
					<!-- Event listing -->
					<?php
						// Define a variable for event listing
						$event_list_unpaginated = view_all_events_fxn();

						// Pagination Calculation
						$results_per_page = 4;

						$number_of_results = count($event_list_unpaginated);

						$number_of_pages = ceil($number_of_results / $results_per_page);

						if (!isset($_GET['page'])) {
							$page = 1;
						} else {
							$page = $_GET['page'];
						}

						$this_page_first_result = ($page - 1) * $results_per_page;

						$event_list = view_all_events_paginated_fxn($this_page_first_result, $results_per_page);

						// Check if any event was found
						if ($event_list) {

							// Run through returned list of events
							foreach ($event_list as $event) {
								$event_id = $event['event_id'];
								echo "<li class='media'>
									<div class='media-left border border-danger rounded-lg'>
										<div class='panel panel-danger text-center date'>
											<div class='panel-heading month bg-warning border-bottom-0 rounded-top text-nowrap'>
												<span class='panel-title strong'>".$event['abbreviated_month']."</span>
											</div>
											<div class='panel-body day text-danger'>".$event['abbreviated_day']."</div>
										</div>
									</div>
									
									<div class='table-responsive'>
										<div class='media-body pl-3'>
											<h4 class='media-heading'>".$event['event_title']." "."<i class='btn-sm btn-secondary view_detail' onclick='' style='cursor:pointer;' data-toggle='modal' data-target='#viewModal' id='$event_id'>read more...</i></h4>
											<table class='table table-borderless table-sm event-table'>
												<thead class='thead-light'>
													<tr>
														<th><small><i class='fas fa-podcast'></i> Type</small></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>".$event['event_type']."</td><td></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</li>";
							}
						} else {
							echo 'No events found';
						}

						echo '<hr> 
						<ul class="pagination pagination-sm">
							<li class="page-item">
								<a class="page-link" href="bulletin.php?page=1">First</a>
							</li>';
			
							if ($page >= 2) {   
								echo '<li class="page-item">
									<a class="page-link" href="bulletin.php?page='.($page - 1).'">Previous</a>
								</li>';   
							}       
			
							for ($page_number = 1; $page_number <= $number_of_pages; $page_number++) {   
								if ($page_number == $page) {   
									echo '<li class="page-item active">
										<a class="page-link" href="bulletin.php?page='.$page_number.'">'.$page_number.' </a>
									</li>';   
								} else { 
									echo '<li class="page-item">
										<a class="page-link" href="bulletin.php?page='.$page_number.'">'.$page_number.' </a>
									</li>';     
								}   
							};
			
							if ($page < $number_of_pages) {   
								echo '<li class="page-item">
									<a class="page-link" href="bulletin.php?page='.($page + 1).'">Next</a>
								</li>';
							}
							
							echo '<li class="page-item">
								<a class="page-link" href="bulletin.php?page='.$number_of_pages.'">Last</a>
							</li>
						</ul>
						<!-- End of pagination -->
						
						<div>
							<small>
								Total Events: '.$number_of_results.'<br>
								Pages: '.$number_of_pages.'<br>
							</small>
						</div>';
					?>
					<!-- End of events -->
				</div>

				<div class="modal fade" id="detailModal" style="display: none;" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						
							<!-- Modal header -->
							<div class="modal-header">
								<h4 class="modal-title">Event Info</h4>
								<button type="button" class="close" data-dismiss="modal">×</button>
							</div>
									
							<!-- Modal body -->
							<div class="modal-body" id="event_detail">
							</div>
							
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<br>
			
			<!-- General pane -->
			<div class="container tab-pane fade" id="latestnews">
				<div class="container">
					<?php
						// Define a variable for news listing
						$news_list = view_all_news_fxn();

						// Check if any news was found
						if ($news_list) {

							// Run through returned list of news
							foreach ($news_list as $news) {
								echo "<div class='card'>
									<div class='card-header' style='background-color: #923D41;'>
										<font style='color:white;'>".$news['news_title']."</font>
									</div>
									<div class='card-body'>
										<b>Date Published: ".$news['custom_date']."
										</b></br></br>
										".nl2br($news['news_content'])."
									</div>
								</div>
								</br>";
							}
						} else {
							echo 'No news found';
						}
					?>
				</div>
			</div>

		</div>
		<br><br>

	</div>

</body>
</html>

<script>
	$(document).ready(function() {  
		$('.view_detail').click(function() {  
			var event_id = $(this).attr('id');  
			$.ajax({  
				url:"../actions/bulletin_action.php",  
				method:"post",  
				data:{
					event_id : event_id,
					action : 'vieweventdetail'
				},  
				success:function(data) {  
					$('#event_detail').html(data);  
					$('#detailModal').modal("show");  
				}  
			});  
		});  
	});  
</script>