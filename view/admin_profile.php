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

		// Run the function to get the admin user profile
		$result = view_admin_user_profile_fxn($id);

		// Store in variables
		$user_id = $result[0]['user_id'];
		$first_name = $result[0]['first_name'];
		$last_name = $result[0]['last_name'];
		$email_address = $result[0]['email_address'];
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
			
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span>| </span><span class="fas fa-chalkboard"></span> Bulletin</a>
					<div class="dropdown-menu" style="background-color: #923D41;">
                        <a class="dropdown-item" href="admin_bulletin.php"><span class="fas fa-chalkboard"></span> View Bulletin</a>
                        <a class="dropdown-item" href="manage_bulletin.php"><span class="fas fa-edit"></span> Manage Bulletin</a>
					</div>
				</li>

                <li class="nav-item dropdown active">
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
							<td><span class="fas fa-address-card"></span><strong> ID: </strong></td>
							<td><i> <?php echo $user_id?> </i></td>
							<td><span class="fas fa-envelope"></span><strong> Email: </strong></td>
							<td><i> <?php echo $email_address?> </i></td>
						</tr>
					</tbody>
				</table>
			</div>
	  	</div>

		<!-- Action buttons -->
		<div class="text-center"><br>
		 	<button class="btn btn-secondary" data-toggle="modal" data-target="#editaUser"><span class="fas fa-upload"></span> Edit Profile</button>
         	<a href="#" onClick='alert("Feature Not Yet Available")'><button class="btn btn-secondary"><span class="fas fa-camera"></span> Change Profile Picture</button></a>
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
										<small>user ID: only visible to you</small>
									</div>
									<div class="col">
										<input type="text" class="form-control" placeholder="Email Address *" name="emailaddress" id="emailaddress" required="required" maxlength="20" value="<?php echo $email_address?>" readonly>
										<small>email address: only visible to you</small>
									</div>
								</div>

								<!-- Error messages -->
								<div class="alert alert-danger fade collapse" id="invalid_first_name">
									Invalid first name.
								</div>
								<div class="alert alert-danger fade collapse" id="invalid_last_name">
									Invalid last name.
								</div>
								<div class="alert alert-danger fade collapse" id="update_user_profile_failed">
									<strong>Update User Profile Failed!</strong> Kindly try again or contact admin.
								</div> 
								
								<div class="form-group">
									<button type="button" class="btn btn-block btn-success" name="updateadminprofilebutton" id="updateadminprofilebutton" onclick="adminupdateprofile()"><span class="fa fa-check-circle"></span> Update Profile</button>
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