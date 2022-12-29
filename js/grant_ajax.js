// Add grant function
function addgrant() {

	// Disable button
	document.getElementById('addgrantbutton').disabled = true;
	
	// Grab form data
	var grantname = document.getElementById('grantname').value;
    var currency = document.getElementById('currency').value;
	var maximumaward = document.getElementById('maximumaward').value;
	var closingdate = document.getElementById('closingdate').value;
    var websitelink1 = document.getElementById('websitelink1').value;
    var websitelink2 = document.getElementById('websitelink2').value;
    var grantdescription = document.getElementById('grantdescription').value;

    // Define regex for website link
    var websiteregex = /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)$/gm;

    if (grantname == '') {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_grant_name").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_grant_name").slideUp(500);
		});
        
        // Enable button
		document.getElementById('addgrantbutton').disabled = false;

    } else if (maximumaward == '') {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_maximum_award").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_maximum_award").slideUp(500);
		});
        
        // Enable button
		document.getElementById('addgrantbutton').disabled = false;

    } else if (closingdate == '') {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_closing_date").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_closing_date").slideUp(500);
		});
        
        // Enable button
		document.getElementById('addgrantbutton').disabled = false;

    } else if (websitelink1 == '' && websitelink2 == '') {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#atleast_one_link").fadeTo(5000, 50).slideUp(500, function() {
			$("#atleast_one_link").slideUp(500);
		});
        
        // Enable button
		document.getElementById('addgrantbutton').disabled = false;

    } else if (!websiteregex.test(websitelink1) && !websiteregex.test(websitelink2)) {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#invalid_website_link").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_website_link").slideUp(500);
		});
        
        // Enable button
		document.getElementById('addgrantbutton').disabled = false;

    } else if (grantdescription == '') {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_grant_description").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_grant_description").slideUp(500);
		});
        
        // Enable button
		document.getElementById('addgrantbutton').disabled = false;

    } else {

        // Process the form
        $.ajax({
            url : '../actions/grant_action.php',
            type : 'POST',
            data : {
                grantname : grantname,
                currency : currency,
                maximumaward : maximumaward,
                closingdate : closingdate,
                websitelink1 : websitelink1,
                websitelink2 : websitelink2,
                grantdescription : grantdescription,
                action : 'addgrant'
            },
            success : function(response) {
                if (response == 'failed') {
                    
					// Alert error
					$("#add_grant_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#add_grant_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('addgrantbutton').disabled = false;
                    
					return false;
                }
                else {
                    swal({
                        title: "Grant Added.",
                        text: "You'll be redirected to the list of grants.",
                        icon: "success",
                        button: "Ok"
                    }).then(function() {
                        window.location = "../view/admin_grant_opportunities.php";
                    });;
                }
            }
        });
        return false;
    }
}

// Update grant function
function updategrant() {

	// Disable button
	document.getElementById('updategrantbutton').disabled = true;
	
	// Grab form data
    var grantid = document.getElementById('grantid').value;
	var grantname = document.getElementById('grantname').value;
    var currency = document.getElementById('currency').value;
	var maximumaward = document.getElementById('maximumaward').value;
	var closingdate = document.getElementById('closingdate').value;
    var websitelink1 = document.getElementById('websitelink1').value;
    var websitelink2 = document.getElementById('websitelink2').value;
    var grantdescription = document.getElementById('grantdescription').value;

    // Define regex for website link
    var websiteregex = /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)$/gm;

    if (grantname == '') {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_grant_name").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_grant_name").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updategrantbutton').disabled = false;

    } else if (maximumaward == '') {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_maximum_award").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_maximum_award").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updategrantbutton').disabled = false;

    } else if (closingdate == '') {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_closing_date").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_closing_date").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updategrantbutton').disabled = false;

    } else if (websitelink1 == '' && websitelink2 == '') {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#atleast_one_link").fadeTo(5000, 50).slideUp(500, function() {
			$("#atleast_one_link").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updategrantbutton').disabled = false;

    } else if (!websiteregex.test(websitelink1) && !websiteregex.test(websitelink2)) {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#invalid_website_link").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_website_link").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updategrantbutton').disabled = false;

    } else if (grantdescription == '') {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_grant_description").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_grant_description").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updategrantbutton').disabled = false;

    } else {

        // Process the form
        $.ajax({
            url : '../actions/grant_action.php',
            type : 'POST',
            data : {
                grantid : grantid,
                grantname : grantname,
                currency : currency,
                maximumaward : maximumaward,
                closingdate : closingdate,
                websitelink1 : websitelink1,
                websitelink2 : websitelink2,
                grantdescription : grantdescription,
                action : 'updategrant'
            },
            success : function(response) {
                if (response == 'failed') {
                    
					// Alert error
					$("#update_grant_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#update_grant_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('updategrantbutton').disabled = false;

					return false;
                }
                else {
                    swal({
                        title: "Grant Updated.",
                        text: "You'll be redirected to the list of grants.",
                        icon: "success",
                        button: "Ok"
                    }).then(function() {
                        window.location = "../view/admin_grant_opportunities.php";
                    });;
                }
            }
        });
        return false;
    }
}

// Delete grant function
function deletegrant() {

    // Disable button
	document.getElementById('deletegrantbutton').disabled = true;

    // Grab form data
    var grantid = document.getElementById('grantid').value;

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this grant!", 
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
    .then((willDelete) => {

        if (willDelete) {
            
            $.ajax({
                url : '../actions/grant_action.php',
                type : 'POST',
                data : {
                    grantid : grantid,
                    action : 'deletegrant'
                },
                success : function(response) {
                    if (response == 'failed') {
                        
                        // Alert error
                        $("#delete_grant_failed").fadeTo(10000, 50).slideUp(500, function() {
                            $("#delete_grant_failed").slideUp(500);
                        });
        
                        // Enable button
                        document.getElementById('deletegrantbutton').disabled = false;

                        return false;
                    }
                    else {
                        swal({
                            title: "Grant Deleted.",
                            text: "You'll be redirected to the grant opportunities page.",
                            icon: "success",
                            button: "Ok"
                        }).then(function() {
                            window.location = "../view/admin_grant_opportunities.php";
                        });;
                    }
                }
            });
            return false;
        }
        else {
            swal("This grant was not deleted!");

            // Enable button
            document.getElementById('deletegrantbutton').disabled = false;

            return false;
        }
    });
}