// Save research function
function saveresearch() {

	// Disable button
	document.getElementById('saveresearchbutton').disabled = true;
	
	// Grab form data
	var researchtopic = document.getElementById('researchtopic').value;
	var researchproblem = document.getElementById('researchproblem').value;
	var researchhypothesis = document.getElementById('researchhypothesis').value;
    var datacollectionmethod = document.getElementById('datacollectionmethod').value;
    var datafindings = document.getElementById('datafindings').value;
    var researchabstract = document.getElementById('researchabstract').value;
    var grantinformation = document.getElementById('grantinformation').value;
    var researchpublication = document.getElementById('researchpublication').value;

    if (researchtopic == '') {
        
        // Stop form from submitting normally
		event.preventDefault();
        
        // Alert error
		$("#missing_research_topic").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_research_topic").slideUp(500);
		});
        
        // Enable button
		document.getElementById('saveresearchbutton').disabled = false;
        
    } else {

        // Process the form
        $.ajax({
            url : '../actions/research_action.php',
            type : 'POST',
            data : {
                researchtopic : researchtopic,
                researchproblem : researchproblem,
                researchhypothesis : researchhypothesis,
                datacollectionmethod : datacollectionmethod,
                datafindings : datafindings,
                researchabstract : researchabstract,
                grantinformation : grantinformation,
                researchpublication : researchpublication,
                action : 'saveresearch'
            },
            success : function(response) {
                if (response == 'failed') {
                    
					// Alert error
					$("#save_research_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#save_research_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('saveresearchbutton').disabled = false;
                    
					return false;
                }
                else {
                    swal({
                        title: "Research Saved.",
                        text: "You'll be redirected to your on-going research page.",
                        icon: "success",
                        button: "Ok"
                    }).then(function() {
                        window.location = "../view/ongoing_research.php";
                    });;
                }
            }
        });
        return false;
    }
}

// Update research function
function updateresearch() {

	// Disable button
	document.getElementById('updateresearchbutton').disabled = true;
	
	// Grab form data
    var researchid = document.getElementById('researchid').value;
	var researchtopic = document.getElementById('researchtopic').value;
	var researchproblem = document.getElementById('researchproblem').value;
	var researchhypothesis = document.getElementById('researchhypothesis').value;
    var datacollectionmethod = document.getElementById('datacollectionmethod').value;
    var datafindings = document.getElementById('datafindings').value;
    var researchabstract = document.getElementById('researchabstract').value;
    var grantinformation = document.getElementById('grantinformation').value;
    var researchpublication = document.getElementById('researchpublication').value;

    if (researchtopic == '' && researchproblem == '' && researchhypothesis == '' && datacollectionmethod == '' && 
    datafindings == '' && researchabstract == '' && grantinformation == '' && researchpublication == '') {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#atleast_one_entry").fadeTo(5000, 50).slideUp(500, function() {
			$("#atleast_one_entry").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updateresearchbutton').disabled = false;
        
    } else {

        // Process the form
        $.ajax({
            url : '../actions/research_action.php',
            type : 'POST',
            data : {
                researchid : researchid,
                researchtopic : researchtopic,
                researchproblem : researchproblem,
                researchhypothesis : researchhypothesis,
                datacollectionmethod : datacollectionmethod,
                datafindings : datafindings,
                researchabstract : researchabstract,
                grantinformation : grantinformation,
                researchpublication : researchpublication,
                action : 'updateresearch'
            },
            success : function(response) {
                if (response == 'failed') {
                    
					// Alert error
					$("#update_research_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#update_research_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('updateresearchbutton').disabled = false;
                    
					return false;
                }
                else {
                    swal({
                        title: "Research Updated.",
                        text: "You'll be redirected to your on-going research page.",
                        icon: "success",
                        button: "Ok"
                    }).then(function() {
                        window.location = "../view/ongoing_research.php";
                    });;
                }
            }
        });
        return false;
    }
}

// Publish research function
function publishresearch() {

	// Disable button
	document.getElementById('publishresearchbutton').disabled = true;
	
	// Grab form data
    var researchid = document.getElementById('researchid').value;
	var researchtopic = document.getElementById('researchtopic').value;
	var researchproblem = document.getElementById('researchproblem').value;
	var researchhypothesis = document.getElementById('researchhypothesis').value;
    var datacollectionmethod = document.getElementById('datacollectionmethod').value;
    var datafindings = document.getElementById('datafindings').value;
    var researchabstract = document.getElementById('researchabstract').value;
    var grantinformation = document.getElementById('grantinformation').value;
    var researchpublication = document.getElementById('researchpublication').value;

    if (researchid == '') {
        
        // Stop form from submitting normally
        event.preventDefault();

        // Alert error
        $("#missing_research_id").fadeTo(5000, 50).slideUp(500, function() {
            $("#missing_research_id").slideUp(500);
        });

        // Enable button
        document.getElementById('publishresearchbutton').disabled = false;

    } else if (researchtopic == '' || researchproblem == '' || researchhypothesis == '' || datacollectionmethod == '' || 
    datafindings == '' || researchabstract == '' || grantinformation == '' || researchpublication == '') {

        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_entry").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_entry").slideUp(500);
		});
        
        // Enable button
		document.getElementById('publishresearchbutton').disabled = false;
    
    } else {
        
        swal({
            title: "Are you sure?",
            text: "Once published, you can no longer private it!", 
            icon: "warning",
            buttons: true,
            dangerMode: true
        })
        .then((willPublish) => {
    
            if (willPublish) {
                
                // Process the form
                $.ajax({
                    url : '../actions/research_action.php',
                    type : 'POST',
                    data : {
                        researchid : researchid,
                        researchtopic : researchtopic,
                        researchproblem : researchproblem,
                        researchhypothesis : researchhypothesis,
                        datacollectionmethod : datacollectionmethod,
                        datafindings : datafindings,
                        researchabstract : researchabstract,
                        grantinformation : grantinformation,
                        researchpublication : researchpublication,
                        action : 'publishresearch'
                    },
                    success : function(response) {
                        if (response == 'failed') {
                            
                            // Alert error
                            $("#publish_research_failed").fadeTo(10000, 50).slideUp(500, function() {
                                $("#publish_research_failed").slideUp(500);
                            });
                            
                            // Enable button
                            document.getElementById('publishresearchbutton').disabled = false;

                            return false;
                        }
                        else {
                            swal({
                                title: "Research Published.",
                                text: "You'll be redirected to your published research page.",
                                icon: "success",
                                button: "Ok"
                            }).then(function() {
                                window.location = "../view/published_research.php";
                            });;
                        }
                    }
                });
                return false;
            }
            else {
                swal("Your research is still private!");

                // Enable button
                document.getElementById('publishresearchbutton').disabled = false;

                return false;
            }
        });
    }
}

// Delete research function
function deleteresearch() {

    // Disable button
	document.getElementById('deleteresearchbutton').disabled = true;

    // Grab form data
    var researchid = document.getElementById('researchid').value;

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this research!", 
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
    .then((willDelete) => {

        if (willDelete) {
            
            $.ajax({
                url : '../actions/research_action.php',
                type : 'POST',
                data : {
                    researchid : researchid,
                    action : 'deleteresearch'
                },
                success : function(response) {
                    if (response == 'failed') {
                        
                        // Alert error
                        $("#delete_research_failed").fadeTo(10000, 50).slideUp(500, function() {
                            $("#delete_research_failed").slideUp(500);
                        });
        
                        // Enable button
                        document.getElementById('deleteresearchbutton').disabled = false;

                        return false;
                    }
                    else {
                        swal({
                            title: "Research Deleted.",
                            text: "You'll be redirected to your ongoing research page.",
                            icon: "success",
                            button: "Ok"
                        }).then(function() {
                            window.location = "../view/ongoing_research.php";
                        });;
                    }
                }
            });
            return false;
        }
        else {
            swal("Your research was not deleted!");

            // Enable button
            document.getElementById('deleteresearchbutton').disabled = false;
            
            return false;
        }
    });
}

// Join research function
function joinresearch() {

    // Disable button
	document.getElementById('joinresearchbutton').disabled = true;

    // Grab form data
    var researchid = document.getElementById('researchid').value;
    var userid = document.getElementById('userid').value;

    swal({
        title: "Are you sure?",
        text: "Do you want to join this research?", 
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
    .then((willDelete) => {

        if (willDelete) {
            
            $.ajax({
                url : '../actions/research_action.php',
                type : 'POST',
                data : {
                    researchid : researchid,
                    userid : userid,
                    action : 'joinresearch'
                },
                success : function(response) {
                    if (response == 'failed') {
                        
                        // Alert error
                        $("#join_research_failed").fadeTo(10000, 50).slideUp(500, function() {
                            $("#join_research_failed").slideUp(500);
                        });
        
                        // Enable button
                        document.getElementById('joinresearchbutton').disabled = false;

                        return false;
                    }
                    else {
                        swal({
                            title: "Joined Research.",
                            text: "You'll be redirected to your collaborative research page.",
                            icon: "success",
                            button: "Ok"
                        }).then(function() {
                            window.location = "../view/collaborative_research.php";
                        });;
                    }
                }
            });
            return false;
        }
        else {
            swal("You did not join the research!");

            // Enable button
            document.getElementById('joinresearchbutton').disabled = false;
            
            return false;
        }
    });
}

// Update research by team member function
function teamupdateresearch() {

	// Disable button
	document.getElementById('teamupdateresearchbutton').disabled = true;
	
	// Grab form data
    var researchid = document.getElementById('researchid').value;
	var researchtopic = document.getElementById('researchtopic').value;
	var researchproblem = document.getElementById('researchproblem').value;
	var researchhypothesis = document.getElementById('researchhypothesis').value;
    var datacollectionmethod = document.getElementById('datacollectionmethod').value;
    var datafindings = document.getElementById('datafindings').value;
    var researchabstract = document.getElementById('researchabstract').value;
    var grantinformation = document.getElementById('grantinformation').value;
    var researchpublication = document.getElementById('researchpublication').value;

    if (researchtopic == '' && researchproblem == '' && researchhypothesis == '' && datacollectionmethod == '' && 
    datafindings == '' && researchabstract == '' && grantinformation == '' && researchpublication == '') {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#atleast_one_entry").fadeTo(5000, 50).slideUp(500, function() {
			$("#atleast_one_entry").slideUp(500);
		});
        
        // Enable button
		document.getElementById('teamupdateresearchbutton').disabled = false;
        
    } else {

        // Process the form
        $.ajax({
            url : '../actions/research_action.php',
            type : 'POST',
            data : {
                researchid : researchid,
                researchtopic : researchtopic,
                researchproblem : researchproblem,
                researchhypothesis : researchhypothesis,
                datacollectionmethod : datacollectionmethod,
                datafindings : datafindings,
                researchabstract : researchabstract,
                grantinformation : grantinformation,
                researchpublication : researchpublication,
                action : 'updateresearch'
            },
            success : function(response) {
                if (response == 'failed') {
                    
					// Alert error
					$("#update_research_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#update_research_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('teamupdateresearchbutton').disabled = false;
                    
					return false;
                }
                else {
                    swal({
                        title: "Research Updated.",
                        text: "You'll be redirected to your collaborative research page.",
                        icon: "success",
                        button: "Ok"
                    }).then(function() {
                        window.location = "../view/collaborative_research.php";
                    });;
                }
            }
        });
        return false;
    }
}

// Leave research function
function leaveresearch() {

    // Disable button
	document.getElementById('leaveresearchbutton').disabled = true;

    // Grab form data
    var researchid = document.getElementById('researchid').value;
    var userid = document.getElementById('userid').value;

    swal({
        title: "Are you sure?",
        text: "Once left, you will lose access to this research but can rejoin!", 
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
    .then((willLeave) => {

        if (willLeave) {
            
            $.ajax({
                url : '../actions/research_action.php',
                type : 'POST',
                data : {
                    researchid : researchid,
                    userid : userid,
                    action : 'leaveresearch'
                },
                success : function(response) {
                    if (response == 'failed') {
                        
                        // Alert error
                        $("#leave_research_failed").fadeTo(10000, 50).slideUp(500, function() {
                            $("#leave_research_failed").slideUp(500);
                        });
        
                        // Enable button
                        document.getElementById('leaveresearchbutton').disabled = false;
                        
                        return false;
                    }
                    else {
                        swal({
                            title: "You've left this research.",
                            text: "You'll be redirected to your collaborative research page.",
                            icon: "success",
                            button: "Ok"
                        }).then(function() {
                            window.location = "../view/collaborative_research.php";
                        });;
                    }
                }
            });
            return false;
        }
        else {
            swal("You're still in this research!");

            // Enable button
            document.getElementById('leaveresearchbutton').disabled = false;
            
            return false;
        }
    });
}