<?php
// Connect to core file for general configuration
require("../settings/core.php");

// Check for login
check_login();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Hub - Dashboard</title>
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

		<div class="jumbotron">
			<h1>Welcome to Research Hub</h1>
			<p>Hi there! Here are a few things to expect:
			</br><i class="fas fa-check"></i> Step-by-step guide from forming your research hypothesis to publishing your research
			</br><i class="fas fa-check"></i> View and apply for a list of vetted <a href="grant_opportunities.php" style="color: #923D41"> grant opportunities </a> or get <a href="grant_support.php" style="color: #923D41"> support </a> for a grant you have applied to already
			</br><i class="fas fa-check"></i> Read on the latest news and be updated on upcoming events on our <a href="bulletin.php" style="color: #923D41"> bulletin </a>
			</br>and much more...</p>
			<p>Click <a href="research_process.php" style="color: #923D41"> Get Started </a> below to begin your journey to an expert researcher!</p> 
		</div>
	
		<!-- First row -->
		<div class="row mb-3">
			<div class="col-xl-3 col-sm-6 py-2">
				<a href="research_process.php">
					<div class="card text-white bg-success h-100">
						<div class="card-body bg-success">
							<div class="rotate">
								<span class="fa fa-play fa-3x"></span>
							</div>
							<br>
							<h6 class="text-uppercase">Get Started</h6>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-3 col-sm-6 py-2">
				<a href="bulletin.php">
					<div class="card text-white bg-secondary h-100">
						<div class="card-body" style="background-color: #7B68EE; color: white;">
							<div class="rotate">
								<span class="fa fa-chalkboard fa-3x"></span>
							</div>
							<br>
							<h6 class="text-uppercase">Bulletin</h6>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-3 col-sm-6 py-2">
				<a href="grant_opportunities.php">
					<div class="card text-white bg-info h-100">
						<div class="card-body bg-info">
							<div class="rotate">
								<span class="fa fa-hand-holding-usd fa-3x"></span>
							</div>
							<br>
							<h6 class="text-uppercase">Grant Opportunities</h6>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-3 col-sm-6 py-2">
				<a href="user_profile.php">
					<div class="card text-white bg-warning h-100">
						<div class="card-body">
							<div class="rotate">
								<span class="fa fa-user fa-3x"></span>
							</div>
							<br>
							<h6 class="text-uppercase">Update My Profile</h6>
						</div>
					</div>
				</a>
			</div>
        </div>
        <!-- Second row if any -->
	</div>
		
</body>
</html>