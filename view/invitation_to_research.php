<?php
// Connect to core file for general configuration
require("../settings/core.php");

// Check for login
check_login();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Hub - Invitation To Research</title>
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
	<script type="text/javascript" src="../js/research_process_ajax.js"></script>
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

		.custombutton {
		    font-size: 16px;
		    padding: 6px 12px;
		    margin-bottom: 10px;
		    display: inline-block;
		    text-decoration: none;
		    text-align: center;
		    white-space: nowrap;
		    vertical-align: middle;
		    -ms-touch-action: manipulation;
		    touch-action: manipulation;
		    -webkit-user-select: none;
		    -moz-user-select: none;
		    -ms-user-select: none;
		    user-select: none;
		    background-image: none;
		    border: 1px solid transparent;
		}
	</style>
</head>
<body>

	<!-- Controller and settings -->
	<?php
		// Connect to controller
		require("../controllers/research_controller.php");

		// Check if action is an update
		if (isset($_GET['id'])) {

			// Get research id
			$id = $_GET['id'];

			// Run the function to get one research
			$result = view_one_research_fxn($id);

			// Store in variables
			$research_id = $result[0]['research_id'];
			$research_topic = $result[0]['research_topic'];
			$research_problem = $result[0]['research_problem'];
			$research_hypothesis = $result[0]['research_hypothesis'];
			$data_collection_method = $result[0]['data_collection_method'];
			$data_findings = $result[0]['data_findings'];
			$research_abstract = $result[0]['research_abstract'];
			$grant_information = $result[0]['grant_information'];
			$publication = $result[0]['publication'];
		}
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
	<div class="container">

		<div class="row">
			<div class="col-sm-10">
				<p class="rounded-lg text-center custombutton btn-block"  style="background-color: #17a2b8; color: white;">You have been invited to join this research. Click <b>Join Research</b> to accept the invitation!</p>
			</div>
			<div class="col-sm-2">

				<!-- Error messages -->
				<div class="alert alert-danger fade collapse" id="join_research_failed">
					<strong>Failed to join research!</strong> Kindly try again or contact admin.
				</div>

				<form class="tab-content" action="" role="form" method="post">
					<input type="hidden" name="researchid" id="researchid" value="<?php echo (isset($research_id))? $research_id : '';?>">
					<input type="hidden" name="userid" id="userid" value="<?php echo (isset($_SESSION['user_id']))? $_SESSION['user_id'] : '';?>">
					<button type="submit" class="btn btn-success" name="joinresearchbutton" id="joinresearchbutton" onclick="joinresearch()"><span class="fas fa-sign-in-alt"></span> Join Research</button>
				</form>
			</div>
		</div>

		<!-- Research pane -->
		<div class="container tab-pane active" id="research">
			<form class="tab-content" action="" role="form" method="post">
				<div class="container"> <br>
					<h4 style="color: #923D41;"><span class="fa fa-align-left"></span> Introduction</h4>
					<br>
					
					<div class="row form-group">
						<div class="col">
							<textarea type="text" class="form-control" readonly><?php echo $research_topic; ?></textarea>
							<small class="form-text text-muted">
								Research Topic
							</small>
						</div>
					</div>

					<div class="row form-group">
						<div class="col">
							<textarea type="text" class="form-control" readonly><?php echo $research_problem;?></textarea>
							<small class="form-text text-muted">
								Research Problem
							</small>
						</div>
					</div>

					<div class="row form-group">
						<div class="col">
							<textarea type="text" class="form-control" readonly><?php echo (isset($research_hypothesis))? $research_hypothesis: ''; ?></textarea>
							<small class="form-text text-muted">
								Research Hypothesis
							</small>
						</div>
					</div>
					<br><br>

					<h4 style="color: #923D41;"><span class="fa fa-chart-bar"></span> Data Collection Method & Analysis</h4>
					<br>
					
					<div class="row form-group">
						<div class="col">
							<textarea type="text" class="form-control" readonly><?php echo $data_collection_method ?></textarea>
							<small class="form-text text-muted">
								Data Collection Method
							</small>
						</div>
					</div>

					<div class="row form-group">
						<div class="col">
							<textarea type="text" class="form-control" readonly><?php echo $data_findings; ?></textarea>
							<small class="form-text text-muted">
								Data Collection Analysis
							</small>
						</div>
					</div>
					<br><br>

					<h4 style="color: #923D41;"><span class="fa fa-i-cursor"></span> Research Abstract</h4>
					<br>

					<div class="row form-group">
						<div class="col">
							<textarea type="text" class="form-control" readonly><?php echo $research_abstract;?></textarea>
							<small class="form-text text-muted">
								Research Abstract: 1) the overall purpose of the research and problems; 2) research methodology; 3) major findings and arguments; and 4) a brief conclusion
							</small>
						</div>
					</div>
					<br><br>

					<h4 style="color: #923D41;"><span class="fa fa-hand-holding-usd"></span> Grant Information</h4>
					<br>

					<div class="row form-group">
						<div class="col">
							<textarea type="text" class="form-control" readonly><?php echo $grant_information;?></textarea>
							<small class="form-text text-muted">
								Research Grant Information
							</small>
						</div>
					</div>
					<br><br>
					
					<h4 style="color: #923D41;"><span class="fa fa-book"></span> Publication</h4>
					<br>

					<div class="row form-group">
						<div class="col">
							<textarea type="text" class="form-control" readonly><?php echo $publication;?></textarea>
							<small class="form-text text-muted">
								Publication
							</small>
						</div>
					</div>
				</div>
			</form>
		<div>
	</div>
		
</body>
</html>