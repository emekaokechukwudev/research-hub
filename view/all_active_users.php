<?php
// Connect to core file for general configuration
require("../settings/core.php");

// Check for login
check_login();
?>

<!DOCTYPE html>
<html>
<head>
<title>Research Hub - All Active Users</title>
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
		require("../controllers/research_controller.php");
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
		<h2 style="color: #923D41;"><span class="fa fa-users"></span> All Active Users</h2>
		<br>

		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab">Active Users</a>
			</li>
		</ul>

	  	<!-- Tab pane -->
	  	<div class="tab-content"> 
			<div class="container tab-pane active"><br>

				<!-- Add user button to the right -->
				<div class="row">

					<div class="col-sm-6">

						<!-- Search bar -->
						<form class="form-inline">
							<input class="form-control" type="text" id="search_term" name="search" placeholder="first or last name" maxlength="20">
							<button type="submit" class="btn btn-outline-success" name="searchbutton" onclick="searchValidation()">Search</button>
						</form>

					</div>
					<div class="col-sm-3"></div>
					<div class="col-sm-3" style="text-align: right;"></div>

				</div>
				<br>

				<!-- List of users -->
				<div class="table-responsive">
					<?php
						echo '<table class="table table-hover table-sm">
							<thead style="background-color: #923D41; color: white;">
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Email Address</th>
									<th scope="col">Department</th>
									<th scope="col"></th>
								</tr>
							</thead>';

							// Get user id and store in variable
							$a = $_SESSION['user_id'];

							// View all users from as an admin function
							$user_list_unpaginated = view_all_users_admin_fxn();

							// Pagination Calculation
							$results_per_page = 8;

							$number_of_results = count($user_list_unpaginated);

							$number_of_pages = ceil($number_of_results / $results_per_page);

							if (!isset($_GET['page'])) {
								$page = 1;
							} else {
								$page = $_GET['page'];
							}

							$this_page_first_result = ($page - 1) * $results_per_page;

							$user_list = view_all_users_admin_pagination_fxn($this_page_first_result, $results_per_page);

							// Define a variable for user listing
							$user_list;

							// Check for search
							if (isset($_GET['searchbutton'])) {

								// Get search term and store in variable
								$term = $_GET['search'];
								$a = $_SESSION['user_id'];

								// Run search user function
								global $user_list;

								$user_list = search_user_fxn($term, $a);
							}

							// Check if a user was found
							if ($user_list) {

								// Run through returned list of user
								foreach ($user_list as $row) {
									$user_id = $row['user_id'];
									echo "<tbody>
										<tr>
											<td class='text-nowrap'><i class='btn fa fa-eye view_user_detail' style='cursor:pointer;' data-toggle='modal' onclick='' data-target='#viewUserModal' id='$user_id'></i>
											".$row['first_name']." ".$row['last_name']."</td>
											<td class='text-nowrap'>".$row['email_address']."</td>
											<td class='text-nowrap'>".$row['department']."</td>
											<td class='text-nowrap'>Send Email<a href='mailto:".$row['email_address']."'><i class='btn fa fa-envelope'></i></a></td>
										</tr>
									</tbody>";
								}
							}
							else {
								echo 'No active user found';
							}
						
						echo '</table>';

						echo (isset($_GET['searchbutton']))? '<div>
						<a class="far fa-arrow-alt-circle-left fa-3x" href="all_active_users.php"></a> </div>' : '';

						echo (isset($_GET['searchbutton']))? '' : '<ul class="pagination pagination-sm">
							<li class="page-item">
								<a class="page-link" href="all_active_users.php?page=1">First</a>
							</li>';
			
							if ($page >= 2) {   
								echo (isset($_GET['searchbutton']))? '' : '<li class="page-item">
									<a class="page-link" href="all_active_users.php?page='.($page - 1).'">Previous</a>
								</li>';   
							}       
			
							for ($page_number = 1; $page_number <= $number_of_pages; $page_number++) {   
								if ($page_number == $page) {   
									echo (isset($_GET['searchbutton']))? '' : '<li class="page-item active">
										<a class="page-link" href="all_active_users.php?page='.$page_number.'">'.$page_number.' </a>
									</li>';   
								}               
								else { 
									echo (isset($_GET['searchbutton']))? '' : '<li class="page-item">
										<a class="page-link" href="all_active_users.php?page='.$page_number.'">'.$page_number.' </a>
									</li>';     
								}   
							};
			
							if ($page < $number_of_pages) {   
								echo (isset($_GET['searchbutton']))? '' : '<li class="page-item">
									<a class="page-link" href="all_active_users.php?page='.($page + 1).'">Next</a>
								</li>';   
							}   
							
							echo (isset($_GET['searchbutton']))? '' : '<li class="page-item">
								<a class="page-link" href="all_active_users.php?page='.$number_of_pages.'">Last</a>
							</li>
						</ul>
						<!-- End of pagination -->
						
						<div>
							<small>
								Total Active Users: '.$number_of_results.'<br>
								Pages: '.$number_of_pages.'<br>
							</small>
						</div>';
					?>
				</div>

				<!-- Edit user modal -->
				<div class="modal fade" id="viewUserModal" style="display: none;" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						
							<!-- Modal header -->
							<div class="modal-header">
								<h4 class="modal-title">User Details</h4>
								<button type="button" class="close" data-dismiss="modal">×</button>
							</div>
									
							<!-- Modal body -->
							<div class="modal-body" id="user_detail">
							</div>
							
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						
						</div>
					</div>
				</div>
				<!--End edit user nodal-->
				
			</div>
	  	</div>
	</div>
		
</body>
</html>

<script>
	$(document).ready(function() {  
		$('.view_user_detail').click(function() {  
			var user_id = $(this).attr('id');  
			$.ajax({  
				url:"../actions/user_action.php",  
				method:"post",  
				data:{
					user_id : user_id,
					action : 'viewuserdetail'
				},  
				success:function(data) {  
					$('#user_detail').html(data);  
					$('#viewUserModal').modal("show");  
				}  
			});  
		});  
	});
</script>