<?php
// Connect to core file for general configuration
require("../settings/core.php");

// Connect to environment file
require('../settings/env.php');

// Check for login
check_login();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!empty($_POST["send"])) {
	
    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';
    
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    
    $mail->Port = 587;
    
    $mail->Username = GMAIL_USERNAME;
    $mail->Password = GMAIL_APP_PASSWORD;
    
    $mail->Mailer = "smtp";

	$emailaddress = $_POST["emailaddress"];
	$firstname = $_POST["firstname"];
    
    $mail->SetFrom($emailaddress, $firstname);
    $mail->AddReplyTo($emailaddress, $firstname);
    $mail->AddAddress(SUPER_ADMIN_EMAIL);
    
	$email_body = '<p>The following are details of a recently filled grant support from 
	'.$firstname.' '.$_POST["lastname"].'</p>
	<p>First Name: '.$firstname.'</p>
	<p>Last Name: '.$_POST["lastname"].'</p>
	<p>Faculty ID: '.$_POST["facultyid"].'</p>
	<p>Gender: '.$_POST["usergender"].'</p>
	<p>Email Address: '.$_POST["emailaddress"].'</p>
	<p>Grant Period: '.$_POST["grantperiod"].' Months</p>
	<p>Start Date: '.$_POST["startdate"].'</p>
	<p>End Date: '.$_POST["enddate"].'</p>
	<p>Prospective Funder: '.$_POST["prospectivefunder"].'</p>
	<p>Grant Amount: USD '.$_POST["grantamount"].'</p>
	<p>Principal Investigator: '.$_POST["principalinvestigator"].'</p>
	<p>Co-Principal Investigator: '.$_POST["coprincipalinvestigator"].'</p>
	<p>Grant Proposal: '.$_POST["grantproposal"].'</p>';

    $mail->Subject = "New Grant Support Request";
	$mail->Body = $email_body;
    $mail->AltBody = $email_body;
    
    $mail->IsHTML(true);
    
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    
    if (!empty($_FILES['attachment'])) {

        $count = count($_FILES['attachment']['name']);

        if ($count > 0) {

            for ($i = 0; $i < $count; $i ++) {

                if (!empty($_FILES["attachment"]["name"])) {

                    $tempFileName = $_FILES["attachment"]["tmp_name"][$i];
                    $fileName = $_FILES["attachment"]["name"][$i];
                    $mail->AddAttachment($tempFileName, $fileName);
					
                }
            }
        }
    }
	
    if (!$mail->Send()) {
        $type = "error";
    } else {
        $type = "success";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Hub - Grant Support</title>
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

		.icon-add-more-attachment {
			float: right;
			margin-top: 10px;
			cursor: pointer;
		}
	</style>

	<script type="text/javascript">		
		function addAttachment() {
            $(".attachment-row:last").clone().insertAfter(".attachment-row:last");
            $(".attachment-row:last").find("input").val("");
        }
	</script>
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
						<a class="dropdown-item" href="invite_user_to_research.php"><span class="fas fa-user-plus"></span> Invite User To Research</a>
					</div>
				</li>

				<li class="nav-item dropdown active">
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

		<h2 style="color: #923D41;"><span class="fa fa-hands-helping"></span> Grant Support</h2>
		</br>

		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab">Grant Support Form</a>
			</li>
	  	</ul>
		</br>

		<div id="statusMessage"> 

			<?php if ($type == "success") {?>

				<script type="text/javascript">
					swal({
						title: "Email Successfully Sent.",
						text: "This page will be reloaded.",
						icon: "success",
						button: "Ok"
					}).then(function() {
						window.location = "../view/grant_support.php";
					});;
				</script>

			<?php } else if ($type == "error") {?>

				<script type="text/javascript">
					swal({
						title: "Email Not Sent.",
						text: "This page will be reloaded.",
						icon: "warning",
						button: "Ok"
					}).then(function() {
						window.location = "../view/grant_support.php";
					});;
				</script>

			<?php }?>

		</div>
		
		<p>Recently applied to a grant and need help? We can help you best secure the investment.</p>
		<p>Kindly fill the form below and we will respond back as soon as possible.</p> 
		</br>

		<div>
			<form name="mailForm" id="mailForm" method="post" action="" enctype="multipart/form-data" onsubmit="return validate()"> 

				<div class="row form-group">
					<div class="col">
						<input type="text" class="form-control" placeholder="First Name *" name="firstname" id="firstname" required="required" maxlength="20" value="<?php echo (isset($first_name))? $first_name : '';?>" readonly>
						<small class="form-text text-muted">
							first name
						</small>
						<span id="firstname-info" class="info"></span>
					</div>
					<div class="col">
						<input type="text" class="form-control" placeholder="Last Name *" name="lastname" id="lastname" required="required" maxlength="20" value="<?php echo (isset($last_name))? $last_name : '';?>" readonly>
						<small class="form-text text-muted">
							last name
						</small>
						<span id="lastname-info" class="info"></span>
					</div>
				</div>

				<div class="row form-group">
					<div class="col">
						<input type="text" class="form-control" placeholder="Faculty ID *" name="facultyid" id="facultyid" maxlength="8" value="<?php echo (isset($user_id))? $user_id : '';?>" readonly>
						<small class="form-text text-muted">
							faculty ID: only visible to you &amp; your supervisor
						</small>
						<span id="facultyid-info" class="info"></span>
					</div>
					<div class="col">
						<input type="text" class="form-control" placeholder="Gender *" name="usergender" id="usergender" required="required" maxlength="20" value="<?php echo (isset($gender))? $gender : '';?>" readonly>
						<small class="form-text text-muted">
							gender
						</small>
						<span id="usergender-info" class="info"></span>
					</div>
				</div>

				<div class="row form-group ">
					<div class="col">
						<input type="text" class="form-control" maxlength="10" placeholder="Email Address *" name="emailaddress" id="emailaddress" value="<?php echo (isset($email_address))? $email_address : '';?>" readonly>
						<small class="form-text text-muted">
							email address: only visible to you &amp; our administration
						</small>
						<span id="emailaddress-info" class="info"></span>
					</div>

					<div class="col ">
						<input type="number" class="form-control" min = "0" maxlength="10" placeholder="Grant Period (Months) *" name="grantperiod" id="grantperiod" value="">
						<small class="form-text text-muted">
							grant period in months
						</small>
						<span id="grantperiod-info" class="info"></span>
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col ">
						<input type="text" class="form-control start_date" placeholder="Start Date *" name="startdate" id="startdate" required="required" value="">
						<small class="form-text text-muted">
							start date
						</small>
						<span id="startdate-info" class="info"></span>
					</div>

					<div class="col ">
						<input type="text" class="form-control end_date" placeholder="End Date *" name="enddate" id="enddate" required="required" value="">
						<small class="form-text text-muted">
							end date
						</small>
						<span id="enddate-info" class="info"></span>
					</div>
				</div>

				<div class="row form-group">
					<div class="col">
						<input type="text" class="form-control" placeholder="Prospective Funder *" name="prospectivefunder" id="prospectivefunder" required="required" maxlength="20" value="">
						<small class="form-text text-muted">
							prospective funder
						</small>
						<span id="prospectivefunder-info" class="info"></span>
					</div>
					<div class="col">
						<input type="text" class="form-control" placeholder="Grant Amount Requested (USD) *" name="grantamount" id="grantamount" required="required" maxlength="20" value="">
						<small class="form-text text-muted">
							grant amount requested in USD ($)
						</small>
						<span id="grantamount-info" class="info"></span>
					</div>
				</div>

				<div class="row form-group">
					<div class="col">
						<input type="text" class="form-control" placeholder="Name of Principal Investigator *" name="principalinvestigator" id="principalinvestigator" required="required" maxlength="20" value="">
						<small class="form-text text-muted">
							name of principal investigator
						</small>
						<span id="principalinvestigator-info" class="info"></span>
					</div>
					<div class="col">
						<input type="text" class="form-control" placeholder="Name of Co-Principal Investigators *" name="coprincipalinvestigator" id="coprincipalinvestigator" required="required" maxlength="20" value="">
						<small class="form-text text-muted">
							name of co-principal investigators
						</small>
						<span id="coprincipalinvestigator-info" class="info"></span>
					</div>
				</div>

				<div class="row form-group">
					<div class="col">
						<div class="attachment-row">
							<input type="file" class="input-field" name="attachment[]">
						</div>
						<div onClick="addAttachment();" class="icon-add-more-attachment" title="Add More Attachments">+</div>
						<small class="form-text text-muted">
							upload relevant file - preferred format include PDF, picture, Word, PowerPoint, and Excel
						</small>
					</div>
				</div>

				<div class="row form-group">
					<div class="col">
						<textarea type="text" class="form-control" placeholder="Summary of Grant Proposal" name="grantproposal" id="grantproposal" rows="5" maxlength="250" required="required" onkeyup="charcountupdate(this.value)"></textarea>
						<small class="form-text text-muted">
							(<span id="interestcount">0 / 250</span>) - write briefly relevant details about the grant you need support with.
						</small>
						<span id="grantproposal-info" class="info"></span>
					</div>
				</div>
					
				<div class="row form-group">
					<div class="col"></div>
					<div class="col">
						<button type="submit" class="btn btn-submit btn-block btn-success" name="send" value="Send"><span class="fa fa-check-circle"></span> Send Form</button>
					</div>
					<div class="col"></div>
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
	$('#datetimepicker').datetimepicker({
		format:'d/m/Y H:i',
	});

	$('.start_date').datetimepicker({
		lang: 'ch',
		timepicker: false,
		format: 'd/m/Y',
		formatDate: 'Y/m/d',
	});

	$('.end_date').datetimepicker({
		lang: 'ch',
		timepicker: false,
		minDate: 0,
		format: 'd/m/Y',
		formatDate: 'Y/m/d',
	});
</script>

</html>