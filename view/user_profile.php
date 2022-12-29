<?php
// Connect to core file for general configuration
require("../settings/core.php");

// Check for login
check_login();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Hub - User Profile</title>
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
	<script type="text/javascript" src="../js/user_ajax.js"></script>
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
		require("../controllers/user_controller.php");

		// Get user id
		$id = $_SESSION['user_id'];

		// Run the function to get the user profile
		$result = view_user_profile_fxn($id);

		// Store in variables
		$user_id = $result[0]['user_id'];
		$first_name = $result[0]['first_name'];
		$last_name = $result[0]['last_name'];
		$gender = $result[0]['gender'];
		$phone_number = $result[0]['phone_number'];
		$department = $result[0]['department'];
		$rank = $result[0]['rank'];
		$email_address = $result[0]['email_address'];
		$interest_areas = $result[0]['interest_areas'];
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

				<li class="nav-item active">
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

		<h2 style="color: #923D41;"><span class="fa fa-user"></span> Profile Info</h2>
		
		<!-- Get user profile -->
		<div class="row">
			<div class="col-sm-12 border rounded table-responsive-sm" style="background-color: #DCDCDC"><br>
				<table class="table table-sm table-borderless">
					<tbody>
						<tr>
							<td rowspan="6"><img src="../images/face-icon-user.png" style="width:200px; border-radius: 50%;"></td>
							<td><span class="fas fa-user"></span><strong> First Name: </strong></td>
							<td><i> <?php echo $first_name?> </i></td>
							<td><span class="fas fa-user"></span><strong> Last Name: </strong></td>
							<td><i> <?php echo $last_name?> </i></td>
						</tr>
						<tr>
							<td class=""><span class="fas fa-address-card"></span><strong> ID: </strong></td>
							<td><i> <?php echo $user_id?> </i></td>
							<td><span class="fas fa-child"></span><strong> Gender: </strong></td>
							<td><i> <?php echo $gender?> </i></td>
						</tr>
						<tr>
							<td><span class="fas fa-envelope"></span><strong> Email: </strong></td>
							<td><i> <?php echo $email_address?> </i></td>
							<td><span class="fas fa-mobile-alt"></span><strong> Mobile: </strong></td>
							<td><i> <?php echo $phone_number?> </i></td>
						</tr>
						<tr>
							<td><span class="fas fa-building"></span><strong> Department: </strong></td>
							<td><i> <?php echo $department?> </i></td>
							<td><span class="fas fa-users-cog"></span><strong> Rank: </strong></td>
							<td><i> <?php echo $rank?> </i></td>
						</tr>
					</tbody>
				</table>
				<div>
					<span class="fas fa-heart"></span><strong> Interest Areas: </strong>
					<i> <?php echo $interest_areas?> </i> <br><br>
				</div> 
			</div>
	  	</div>

		<!-- Action buttons -->
		<div class="text-center"><br>
		 	<button class="btn btn-secondary" data-toggle="modal" data-target="#editaUser"><span class="fas fa-upload"></span> Edit Profile</button>
         	<a href="#" onClick='alert("Feature Not Yet Available")'><button class="btn btn-secondary" onclick=""><span class="fas fa-camera"></span> Change Profile Picture</button></a>
        </div>

		<div class="modal fade" id="editaUser" style="display: none;" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
				
					<!-- Modal header -->
					<div class="modal-header">
						<h4 class="modal-title">Update Profile</h4>
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>
							
					<!-- Modal body -->
					<div class="modal-body">
						<div>
							<form action="" role="form" method="post"> 

								<div class="row form-group">
									<div class="col">
										<input type="text" class="form-control" placeholder="First Name *" name="firstname" id="firstname" required="required" maxlength="20" value="<?php echo $first_name?>">
									</div>
									<div class="col">
										<input type="text" class="form-control" placeholder="Last Name *" name="lastname" id="lastname" required="required" maxlength="20" value="<?php echo $last_name?>">
									</div>
								</div>

								<div class="row form-group">
									<div class="col">
										<input type="text" class="form-control" placeholder="User ID" name="userid" id="userid" maxlength="8" value="<?php echo $user_id?>" readonly>
										<small>user ID: only visible to you &amp; the admin</small>
									</div>
									<div class="col">
										<select class="form-control" name="usergender" id="usergender">
										<option value="<?php echo (isset($gender))? $gender: ''; ?>" disabled selected><?php echo (isset($gender))? $gender: 'Select your gender'; ?></option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
										<small>gender</small>
									</div>
								</div>

								<div class="row form-group">
									<div class="col">
										<input type="text" class="form-control" placeholder="Email Address *" name="emailaddress" id="emailaddress" required="required" maxlength="20" value="<?php echo $email_address?>" readonly>
										<small>email address</small>
									</div>
									<div class="col">
										<input type="text" class="form-control" maxlength="10" placeholder="Phone Number" name="phonenumber" id="phonenumber" value="<?php echo $phone_number?>">
										<small>phone number: only visible to you &amp; the admin</small>
									</div>
								</div>

								<div class="row form-group ">
									<div class="col">
										<select class="form-control" name="userdepartment" id="userdepartment">
											<option value="<?php echo (isset($department))? $department: ''; ?>" disabled selected><?php echo (isset($department))? $department: 'Select your department'; ?></option>
											<option value="Business Administration">Business Administration (BA)</option>
											<option value="Engineering">Engineering (ENG)</option>
											<option value="Computer Science">Computer Science (CS)</option>
											<option value="Humanities & Social Sciences">Humanities & Social Sciences (HSS)</option>
										</select>
										<small>department</small>
									</div>
									
									<div class="col">
										<select class="form-control" name="userrank" id="userrank">
											<option value="<?php echo (isset($rank))? $rank: ''; ?>" disabled selected><?php echo (isset($rank))? $rank: 'Select your rank'; ?></option>
											<option value="Adjunct Lecturer">Adjunct Lecturer</option>
											<option value="Senior Lecturer">Senior Lecturer</option>
											<option value="Assistant Lecturer">Assistant Lecturer</option>
											<option value="Associate Professor">Associate Professor</option>
											<option value="Professor">Professor</option>
										</select>
										<small>rank</small>
									</div>
								</div>

								<div class="row form-group">
									<div class="col">
										<textarea type="text" class="form-control" placeholder="Research Interest, Specialization &amp; Expertise" name="interestareas" id="interestareas" rows="5" maxlength="500" required="required"><?php echo $interest_areas?></textarea>
										<small class="form-text text-muted">
											(<span id="interestcount">0 / 500</span>) - list your interest areas separated by coma, for example: e-commerce, web development, and machine learning
										</small>
									</div>
								</div>

								<!-- Error messages -->
								<div class="alert alert-danger fade collapse" id="invalid_first_name">
									Invalid first name.
								</div>
								<div class="alert alert-danger fade collapse" id="invalid_last_name">
									Invalid last name.
								</div>
								<div class="alert alert-danger fade collapse" id="invalid_phone_number">
									Invalid phone number - minimum of 10 digit.
								</div>
								<div class="alert alert-danger fade collapse" id="update_user_profile_failed">
									<strong>Update User Profile Failed!</strong> Kindly try again or contact admin.
								</div> 
								
								<div class="form-group">
									<button type="button" class="btn btn-block btn-success" name="updateprofilebutton" id="updateprofilebutton" onclick="updateprofile()"><span class="fa fa-check-circle"></span> Update Profile</button>
								</div>
								
							</form>

							<!-- Loading spinner -->
							<div class="d-flex justify-content-center">
								<div id="processLoading" role="status">
								</div>
							</div>

						</div>
					</div>
					
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				
				</div>
			</div>
		</div>
	</div>
		
</body>
</html>