<?php
// Connect to core file for general configuration
require("../settings/core.php");

// Connect to environment file
require('../settings/env.php');

// Check for login
check_login();
?>

<!DOCTYPE html>
<html>
<head>
<title>Research Hub - Research Progress</title>
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
	</style>
</head>
<body>
	
	<!-- Controller and settings -->
	<?php
		// Connect to controller
		require("../controllers/research_controller.php");

		// Check if action is an edit
		if (isset($_GET['edit'])) {

			// Get research id
			$id = $_GET['edit'];

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

		<h2 style="color: #923D41;"><span class="fa fa-search"></span> Research Process</h2>
		</br>

		<input type="text" value="http://<?php echo LOCALHOST_ADDRESS; ?>/research-hub/view/invitation_to_research.php?id=<?php echo $research_id?>" id="copyResearchInviteLink" style="position: absolute; left: -9999px;">
		
		<!-- Get research id -->
		<div class="d-flex flex-row-reverse">
	  		<button type="button" title="<?php echo (isset($research_id))? '': 'Please save your research to copy your invite link'; ?>" class="btn btn-success btn-sm" onclick="copyResearchInviteLinkToClipboard()" <?php echo (isset($research_id))? '': 'disabled'; ?>><i class="fa fa-link"></i> Copy Research Invite Link</button>
	  	</div>
		</br>

        <!-- Nav tabs -->
		<ul class="nav nav-tabs">

			<li class="nav-item">
			    <a class="nav-link active" data-toggle="tab" href="#introduction"><span class="fa fa-align-left"></span> Introduction</a>
			</li>
            <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#datacollection"><span class="fa fa-chart-bar"></span> Data Collection</a>
			</li>
            <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#abstract"><span class="fa fa-i-cursor"></span> Abstract</a>
			</li>
			<li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#grant"><span class="fa fa-hand-holding-usd"></span> Grant</a>
			</li>
			<li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#publication"><span class="fa fa-book"></span> Publication</a>
			</li>
			
	  	</ul>
		</br>
        
        <!-- Tab pane -->
		<div class="tab-content">
            <form class="tab-content" action="" role="form" method="post">

                <!-- Research introduction pane -->
                <div class="container tab-pane active" id="introduction">
				    <div class="container"> <br>
                        <div class="row form-group">
                            <div class="col">
                                <textarea type="text" class="form-control" placeholder="Research Topic" name="researchtopic" id="researchtopic" rows="1" maxlength="255"><?php echo (isset($research_topic))? $research_topic: ''; ?></textarea>
                                <small class="form-text text-muted">
                                    (<span id="interestcount">0 / 255</span>) - write your research topic (a subject or issue you are interested in researching on)
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <textarea type="text" class="form-control" placeholder="Research Problem" name="researchproblem" id="researchproblem" rows="1" maxlength="255"><?php echo (isset($research_problem))? $research_problem: ''; ?></textarea>
                                <small class="form-text text-muted">
                                    (<span id="interestcount">0 / 255</span>) - write the problem your research is to address
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <textarea type="text" class="form-control" placeholder="Research Hypothesis" name="researchhypothesis" id="researchhypothesis" rows="2" maxlength="255"><?php echo (isset($research_hypothesis))? $research_hypothesis: ''; ?></textarea>
                                <small class="form-text text-muted">
                                    (<span id="interestcount">0 / 255</span>) - write your clear research hypothesis, for example, "Low-cost airlines are more likely to have delays than premium airlines"
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data collection pane -->
			    <div id="datacollection" class="container tab-pane fade">
				    <div class="container"> <br>
                        <div class="row form-group">
                            <div class="col">
								<textarea type="text" class="form-control" placeholder="Data Collection Method" name="datacollectionmethod" id="datacollectionmethod" rows="1" maxlength="255"><?php echo (isset($data_collection_method))? $data_collection_method: ''; ?></textarea>
                                <small class="form-text text-muted">
                                    give which data collection method you will use
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <textarea type="text" class="form-control" placeholder="Data Findings" name="datafindings" id="datafindings" rows="5" maxlength="25500"><?php echo (isset($data_findings))? $data_findings: ''; ?></textarea>
                                <small class="form-text text-muted">
                                    (<span id="interestcount">0 / 25500</span>) - write what you learnt newly after collecting such data
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Abstract pane -->
			    <div id="abstract" class="container tab-pane fade">
				    <div class="container"> <br>
                        <div class="row form-group">
                            <div class="col">
                                <textarea type="text" class="form-control" placeholder="Research Abstract" name="researchabstract" id="researchabstract" rows="6" maxlength="25500"><?php echo (isset($research_abstract))? $research_abstract: ''; ?></textarea>
                                <small class="form-text text-muted">
                                    (<span id="interestcount">0 / 25500</span>) - write an abstract for your research. Be sure to touch on 1) the overall purpose of the research and problems; 2) research methodology; 3) major findings and arguments; and 4) a brief conclusion
                                </small>
                            </div>
				        </div>
                    </div>
                </div>

				<!-- Grant pane -->
			    <div id="grant" class="container tab-pane fade">
				    <div class="container"> <br>
                        <div class="row form-group">
                            <div class="col">
                                <textarea type="text" class="form-control" placeholder="Grant Information" name="grantinformation" id="grantinformation" rows="2" maxlength="500"><?php echo (isset($grant_information))? $grant_information: ''; ?></textarea>
                                <small class="form-text text-muted">
                                    (<span id="interestcount">0 / 500</span>) - write some information about the grant approved for the research
                                </small>
                            </div>
				        </div>
                    </div>
                </div>

				<!-- Publication pane -->
				<div id="publication" class="container tab-pane fade">
				    <div class="container"> <br>
                        <div class="row form-group">
                            <div class="col">
                                <textarea type="text" class="form-control" placeholder="Publication" name="researchpublication" id="researchpublication" rows="2" maxlength="500"><?php echo (isset($publication))? $publication: ''; ?></textarea>
                                <small class="form-text text-muted">
                                    (<span id="interestcount">0 / 500</span>) - write where your research was published, like a journal for instance
                                </small>
                            </div>
				        </div>
                    </div>
                </div>

				<!-- Buttons -->
                <div class="row form-group">

					<input type="hidden" name="researchid" id="researchid" value="<?php echo (isset($research_id))? $research_id : '';?>">

					<?php echo (isset($research_id))? '

						<div class="col">
							
							<!-- Error messages -->
							<div class="alert alert-danger fade collapse" id="atleast_one_entry">
								Enter at least one research information.
							</div>
							<div class="alert alert-danger fade collapse" id="update_research_failed">
								<strong>Failed to update research!</strong> Kindly try again and contact admin.
							</div>

							<button type="submit" class="btn btn-block btn-info" name="updateresearchbutton" id="updateresearchbutton" onclick="updateresearch()"><span class="fa fa-edit"></span> Update Research</button>
						</div>
						
						<div class="col">
							
							<!-- Error messages -->
							<div class="alert alert-danger fade collapse" id="missing_research_id">
								Save your research before you can publish.
							</div>
							<div class="alert alert-danger fade collapse" id="missing_entry">
								Missing research information.
							</div>
							<div class="alert alert-danger fade collapse" id="publish_research_failed">
								<strong>Failed to publish research!</strong> Kindly try again or contact admin.
							</div>

							<button type="submit" style="background-color: #923D41; color:white" class="btn btn-block" name="publishresearchbutton" id="publishresearchbutton" onclick="publishresearch()"><span class="fa fa-upload"></span> Publish Research</button>
						</div>
						
						<div class="col">

							<!-- Error messages -->
							<div class="alert alert-danger fade collapse" id="delete_research_failed">
								<strong>Failed to delete research!</strong> Kindly try again or contact admin.
							</div>

							<button type="submit" class="btn btn-block btn-danger" name="deleteresearchbutton" id="deleteresearchbutton" onclick="deleteresearch()"><span class="fa fa-trash-alt"></span> Delete Research</button>
						</div>' : 

						'<div class="col"></div>
						
						<div class="col">

							<!-- Error messages -->
							<div class="alert alert-danger fade collapse" id="missing_research_topic">
								Missing research topic.
							</div>
							<div class="alert alert-danger fade collapse" id="save_research_failed">
								<strong>Failed to save research!</strong> Kindly try again and contact admin.
							</div>
							
							<button type="submit" class="btn btn-block btn-success" name="saveresearchbutton" id="saveresearchbutton" onclick="saveresearch()"><span class="fa fa-check-circle"></span> Save My Research</button>
						</div>
						
						<div class="col"></div>';
					?>
				</div>

            </form>
        </div>
		<br><br><br>
        
		<h3 style="color: #923D41;"><span class="fa fa-hands-helping"></span> Research Helpers</h3>
		</br>
        
        <!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
			    <a class="nav-link active" data-toggle="tab" href="#researchteam"><span class="fa fa-users"></span> Research Team</a>
			</li>
			<li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#writingtips"><span class="fas fa-lightbulb"></span> Writing Tips</a>
			</li>
	  	</ul>
		</br>
        
        <!-- Tab pane -->
		<div class="tab-content">

            <!-- Research team pane -->
            <div class="container tab-pane active" id="researchteam">
                <div class="container"> <br>

					<!-- Add to team -->
					<div class="d-flex flex-row-reverse">
						<button type="button" class="btn btn-info" title="<?php echo (isset($research_id))? '': 'Please save your research to add users'; ?>" onclick="location.href='invite_user_to_research.php'; updateresearch()" <?php echo (isset($research_id))? '': 'disabled'; ?>><i class="fa fa-user-plus"></i> Add To Team</button>
					</div>
					</br>

					<!-- List of users -->
					<div class="table-responsive">
						<?php
							echo '<table class="table table-hover table-sm">
								<thead style="background-color: #923D41; color: white;">
									<tr>
										<th scope="col">Research Topic</th>
										<th scope="col">Email Address</th>
										<th scope="col">Department</th>
										<th scope="col"></th>
									</tr>
								</thead>';

								// Get user id and store in variable
								$a = $_SESSION['user_id'];
								$b = '';

								if (isset($research_id)) {
									$b = $research_id;
								} else {
									$b = 0;
								}

								// Define a variable for user listing
								$user_list = view_all_research_users_except_user_fxn($a, $b);

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
												<td class='text-nowrap'>Send Email<a href='mailto:".$row['email_address']."?subject = Invitation to my research & body = '><i class='btn fa fa-envelope'></i></a></td>
											</tr>
										</tbody>";
									}
								} else {
									echo 'There are currently no members on this research team. Click <b>Add To Team</b> to add users.';
								}
							
							echo '</table>';
						?>
					</div>

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

				</div>
			</div>

			<!-- Writing tips pane -->
			<div id="writingtips" class="container tab-pane fade">
                <div class="container"> <br>
					<h3>General Guide</h3>
					<div id="accordion">
						<div class="card">
							<div class="card-header" style="background-color: #923D41;">
								<a class="card-link" data-toggle="collapse" href="#collapseOne" style="color:white;">
									Writing Your Research Topic
								</a>
							</div>
							<div id="collapseOne" class="collapse show" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vehicula venenatis nunc, non porttitor orci auctor in. Morbi iaculis tellus lectus. 
									Mauris consequat lacus arcu, nec gravida metus fringilla vitae. Etiam lectus mauris, laoreet in mi et, ultrices ultrices nisi. 
									Vivamus condimentum metus ac nulla hendrerit, sed commodo lorem posuere. Aliquam elementum bibendum metus. Phasellus iaculis tortor at auctor finibus. 
									Quisque id eleifend nibh. Aenean vitae augue quis ex auctor aliquam aliquam id mi. Curabitur a orci nec massa pretium sagittis. Duis eget accumsan dolor. Nulla lobortis gravida porttitor. 
									Curabitur sed augue in velit venenatis molestie.
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header" style="background-color: #923D41;">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo" style="color:white;">
									Finding Your Research Problem
								</a>
							</div>
							<div id="collapseTwo" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Fusce ut aliquam enim. Proin a sollicitudin elit. Proin ac imperdiet libero. Quisque vitae sapien mi. Fusce vestibulum elementum lectus ut pellentesque. 
									Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam commodo interdum imperdiet. 
									Aliquam vitae elit sed ipsum consectetur porta. Nam id egestas eros.
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header" style="background-color: #923D41;">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseThree" style="color:white;">
									Writing Your Research Hypothesis
								</a>
							</div>
							<div id="collapseThree" class="collapse" data-parent="#accordion">
								<div class="card-body">
									Praesent vel eros nec nisi laoreet faucibus. Mauris ligula arcu, tincidunt quis malesuada ut, aliquam ut leo. Nullam nunc velit, sodales rhoncus erat et, ullamcorper sagittis diam. 
									Morbi et libero leo. Donec varius quam et vulputate porttitor. Aliquam tristique vitae enim vitae iaculis. Sed ex odio, posuere ut erat vitae, eleifend commodo velit.
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
		<br><br><br><br><br>

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

<script>
	function copyResearchInviteLinkToClipboard() {
		var copyText = document.getElementById("copyResearchInviteLink");
		copyText.select();
		copyText.setSelectionRange(0, 99999)
		document.execCommand("copy");
		swal("Research Invite Link Copied!", "Your invite link is " + copyText.value);
	}
</script>