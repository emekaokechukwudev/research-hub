<?php
// Connect to core file for general configuration
require("../settings/core.php");

// Check for login
check_login();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Hub - Manage Grant Opportunities</title>
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
	<script type="text/javascript" src="../js/grant_ajax.js"></script>
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
	</style>
</head>
<body>

	<!-- Controller and settings -->
	<?php
		// Connect to controller
		require("../controllers/grant_controller.php");

		// Check if action is edit grant
		if (isset($_GET['edit'])) {

			// Get grant id
			$id = $_GET['edit'];

			// Run the function to get one grant detail
			$result = view_grant_detail_fxn($id);

			// Store in variables
			$grant_id = $result[0]['grant_id'];
			$grant_name = $result[0]['grant_name'];
			$grant_description = $result[0]['grant_description'];
			$currency = $result[0]['currency'];
			$maximum_award = $result[0]['maximum_award'];
			$closing_date = $result[0]['closing_date'];
			$website_1 = $result[0]['website_1'];
			$website_2 = $result[0]['website_2'];
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
				<li class="nav-item dropdown active">
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

		<h2 style="color: #923D41;"><span class="fa fa-hand-holding-usd"></span> <?php echo (isset($grant_id))? 'Manage Grant': 'Add Grant'; ?></h2>
		</br>

		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab"> <?php echo (isset($grant_id))? 'Manage Grant': 'Add Grant'; ?></a>
			</li>
	  	</ul>
		</br>

		<div class="tab-content container">
			<form role="form" action="" method="post"> 
				<div class="row form-group">
					<div class="col">
						<input type="text" class="form-control" placeholder="Grant Name *" name="grantname" id="grantname" required="required" value="<?php echo (isset($grant_name))? $grant_name: ''; ?>">
						<small class="form-text text-muted">
							grant name
						</small>
					</div>
				</div>

				<div class="row form-group">
					<div class="col">
						<select class="form-control" name="currency" id="currency">
						<?php echo (isset($grant_id))? '<option value="'.$currency.'" disabled selected>'.$currency.'</option>' : '<option value="" disabled selected>Select the currency of grant</option>';?>	
							<option value="USD">United States Dollar - USD</option>
							<option value="CAD">Canadian Dollars - CAD</option>
							<option value="£">Pound Sterling - GBP (£)</option>
							<option value="€">Euro - EUR (€)</option>
							<option value="">Not Known</option>
							<option value="">Other</option>
						</select>
						<small class="form-text text-muted">
							currency
						</small>
					</div>
					<div class="col">
						<input type="text" class="form-control" placeholder="Maximum Award *" name="maximumaward" id="maximumaward" required="required" value="<?php echo (isset($maximum_award))? $maximum_award: ''; ?>">
						<small class="form-text text-muted">
							maximum award - either enter amount or 'Not known' with ',' for thousands
						</small>
					</div>
				</div>

				<div class="row form-group">
                    <div class="col">
						<input type="text" class="form-control" placeholder="Closing Date *" name="closingdate" id="closingdate" required="required" value="<?php echo (isset($closing_date))? $closing_date: ''; ?>">
						<small class="form-text text-muted">
							closing date
						</small>
					</div>
				</div>

				<div class="row form-group">
					<div class="col">
						<input type="text" class="form-control" placeholder="Website Link #1 *" name="websitelink1" id="websitelink1" required="required" value="<?php echo (isset($website_1))? $website_1: ''; ?>">
						<small class="form-text text-muted">
							website link #1 - hint: you can copy the link directly from your browser's address bar
						</small>
					</div>
				</div>

				<div class="row form-group">
					<div class="col">
						<input type="text" class="form-control" placeholder="Website Link #2" name="websitelink2" id="websitelink2" value="<?php echo (isset($website_2))? $website_2: ''; ?>">
						<small class="form-text text-muted">
							website link #2
						</small>
					</div>
				</div>

				<div class="row form-group">
					<div class="col">
						<textarea type="text" class="form-control" placeholder="Grant Description *" name="grantdescription" id="grantdescription" rows="5" required="required"><?php echo (isset($grant_description))? $grant_description: ''; ?></textarea>
						<small class="form-text text-muted">
							grant description
						</small>
					</div>
				</div>

				<div class="row form-group">

					<input type="hidden" name="grantid" id="grantid" value="<?php echo (isset($grant_id))? $grant_id : '';?>">

					<?php echo (isset($grant_id))? '

						<div class="col">

							<!--Update Error Messages-->
							<div class="alert alert-danger fade collapse" id="missing_grant_name">
								Missing grant name.
							</div>
							<div class="alert alert-danger fade collapse" id="missing_maximum_award">
								Missing maximum award.
							</div>
							<div class="alert alert-danger fade collapse" id="missing_closing_date">
								Missing closing date.
							</div>
							<div class="alert alert-danger fade collapse" id="atleast_one_link">
								Insert at least one website link.
							</div>
							<div class="alert alert-danger fade collapse" id="invalid_website_link">
								Invalid website link #1. Use format: http://www.{domain name}.com/{remaining text} or https://www.{domain name}.com/{remaining text}.
							</div>
							<div class="alert alert-danger fade collapse" id="missing_grant_description">
								Missing grant description.
							</div> 
							<div class="alert alert-danger fade collapse" id="update_grant_failed">
								<strong>Failed to update grant!</strong> Kindly try again or contact admin.
							</div>

							<button type="submit" class="btn btn-block btn-info" name="updategrantbutton" id="updategrantbutton" onclick="updategrant()"><span class="fa fa-edit"></span> Update Grant</button>
						</div>

						<div class="col">

							<!-- Error messages -->
							<div class="alert alert-danger fade collapse" id="delete_grant_failed">
								<strong>Failed to delete grant!</strong> Kindly try again and contact admin.
							</div>

							<button type="submit" class="btn btn-block btn-danger" name="deletegrantbutton" id="deletegrantbutton" onclick="deletegrant()"><span class="fa fa-trash-alt"></span> Delete Grant</button>
						</div>': 

						'<div class="col"></div>

						<div class="col">

							<!--Update Error Messages-->
							<div class="alert alert-danger fade collapse" id="missing_grant_name">
								Missing grant name.
							</div>
							<div class="alert alert-danger fade collapse" id="missing_maximum_award">
								Missing maximum award.
							</div>
							<div class="alert alert-danger fade collapse" id="missing_closing_date">
								Missing closing date.
							</div>
							<div class="alert alert-danger fade collapse" id="atleast_one_link">
								Insert at least one website link.
							</div>
							<div class="alert alert-danger fade collapse" id="invalid_website_link">
								Invalid website link #1. Use format: http://www.{domain name}.com/{remaining text} or https://www.{domain name}.com/{remaining text}.
							</div>
							<div class="alert alert-danger fade collapse" id="missing_grant_description">
								Missing grant description.
							</div> 
							<div class="alert alert-danger fade collapse" id="add_grant_failed">
								<strong>Failed to add grant!</strong> Kindly try again or contact admin.
							</div>

							<button type="submit" class="btn btn-block btn-success" name="addgrantbutton" id="addgrantbutton" onclick="addgrant()"><span class="fa fa-check-circle"></span> Add Grant</button>
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
		
</body>
<script src="../js/jquery.js"></script>
<script src="../node_modules/php-date-formatter/js/php-date-formatter.min.js"></script>
<script src="../node_modules/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js" integrity="sha512-hDFt+089A+EmzZS6n/urree+gmentY36d9flHQ5ChfiRjEJJKFSsl1HqyEOS5qz7jjbMZ0JU4u/x1qe211534g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
	$('#closingdate').datetimepicker({
		lang:'ch',
		timepicker:false,
		minDate: '0',
	});
</script>

</html>