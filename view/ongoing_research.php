<?php
// Connect to core file for general configuration
require("../settings/core.php");

// Check for login
check_login();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Hub - Ongoing Research</title>
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
	<script type="text/javascript" src="../js/research_process_validation.js"></script>
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

		/* SweetAlert button color */
		.swal-button {
			background-color: #923D41;
			padding: 7px 19px;
			box-shadow: none !important;
		}

		.swal-button:not([disabled]):hover {
			background-color: #923D41;
		}
	</style>
</head>
<body>

	<!-- Controller and settings -->
	<?php
		// Connect to controller
		require('../controllers/research_controller.php');
	?>
		
	<!-- Top navigation -->
	<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #923D41;">
		<a class="navbar-brand" href="dashboard.php">Research Hub</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">

				<li class="nav-item dropdown active">
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

				<li class="nav-item">
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
		
		<h2 style="color: #923D41;"><span class="fa fa-spinner"></span> Ongoing Research</h2>
		</br>

		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab">Ongoing Research</a>
			</li>
	  	</ul>

		<div class="tab-content container"><br>
		
	   		<!-- Add search button to the right -->
      		<div class="row">

				<div class="col-sm-6">
					
					<!-- Search bar -->
					<form class="form-inline">
						<input class="form-control" type="text" id="search_term" name="search" placeholder="research topic" maxlength="20">
						<button type="submit" name="searchbutton" class="btn btn-outline-success">Search</button>
					</form>

				</div>
				<div class="col-sm-3"></div>
				<div class="col-sm-3" style="text-align: right;"></div>

			</div>
			<br>

			<!-- List of research by user -->
			<div class="table-responsive">
				<?php
					echo '<table class="table table-hover table-sm">
						<thead style="background-color: #923D41; color: white;">
							<tr>
								<th scope="col">Research Topic</th>
							</tr>
						</thead>';

						// Get user id and store in variable
						$a = $_SESSION['user_id'];

						// Define a variable for research listing
						$research_list_unpaginated = view_all_user_ongoing_research_fxn($a);

						// Pagination Calculation
						$results_per_page = 8;

						$number_of_results = count($research_list_unpaginated);

						$number_of_pages = ceil($number_of_results / $results_per_page);

						if (!isset($_GET['page'])) {
							$page = 1;
						} else {
							$page = $_GET['page'];
						}

						$this_page_first_result = ($page - 1) * $results_per_page;

						$research_list = view_all_user_ongoing_research_pagination_fxn($a, $this_page_first_result, $results_per_page);

						// Define a variable for research listing
						$research_list;

						// Check for search
						if (isset($_GET['searchbutton'])) {

							// Get search term and store in variable
							$term = $_GET['search'];
							$a = $_SESSION['user_id'];

							// Run search research function
							global $research_list;

							$research_list = search_user_ongoing_research_fxn($term, $a);
						}

						// Check if a research was found
						if ($research_list) {

							// Run through returned list of research
							foreach ($research_list as $row) {
								$research_id = $row['research_id'];

								echo "<tbody>
									<tr>
										<td><a href='research_process.php?edit=$research_id'><i class='btn fa fa-eye'></i></a>". $row['research_topic']."</td>
									</tr>
								</tbody>";
							}
						} else {
							
							echo 'No ongoing  research found';
						}
					
					echo '</table>';
				
					echo (isset($_GET['searchbutton']))? '<div>
					<a class="far fa-arrow-alt-circle-left fa-3x" href="ongoing_research.php"></a> </div>' : '';

					echo (isset($_GET['searchbutton']))? '' : '<ul class="pagination pagination-sm">
						<li class="page-item">
							<a class="page-link" href="ongoing_research.php?page=1">First</a>
						</li>';

						if ($page >= 2) {   
							echo (isset($_GET['searchbutton']))? '' : '<li class="page-item">
								<a class="page-link" href="ongoing_research.php?page='.($page - 1).'">Previous</a>
							</li>';   
						}       

						for ($page_number = 1; $page_number <= $number_of_pages; $page_number++) {   
							if ($page_number == $page) {   
								echo (isset($_GET['searchbutton']))? '' : '<li class="page-item active">
									<a class="page-link" href="ongoing_research.php?page='.$page_number.'">'.$page_number.' </a>
								</li>';
							} else {
								echo (isset($_GET['searchbutton']))? '' : '<li class="page-item">
									<a class="page-link" href="ongoing_research.php?page='.$page_number.'">'.$page_number.' </a>
								</li>';     
							}   
						};

						if ($page < $number_of_pages) {   
							echo (isset($_GET['searchbutton']))? '' : '<li class="page-item">
								<a class="page-link" href="ongoing_research.php?page='.($page + 1).'">Next</a>
							</li>';   
						}   
						
						echo (isset($_GET['searchbutton']))? '' : '<li class="page-item">
							<a class="page-link" href="ongoing_research.php?page='.$number_of_pages.'">Last</a>
						</li>
					</ul>
					<!-- End of pagination -->
					
					<div>
						<small>
							Total Ongoing Research: '.$number_of_results.'<br>
							Pages: '.$number_of_pages.'<br>
						</small>
					</div>';
				?>
			</div>

		</div>
		</br>
	</div>
		
</body>
</html>