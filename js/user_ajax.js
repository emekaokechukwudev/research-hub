// Update user profile function
function updateprofile() {

	// Disable button
	document.getElementById('updateprofilebutton').disabled = true;
	
	// Grab form data
	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var usergender = document.getElementById('usergender').value;
    var phonenumber = document.getElementById('phonenumber').value;
    var userdepartment = document.getElementById('userdepartment').value;
    var userrank = document.getElementById('userrank').value;
    var interestareas = document.getElementById('interestareas').value;
    var userid = document.getElementById('userid').value;

    // Define regex for name and phone number
    var firstnameregex = /^[a-zA-Z]{2,50}/gm;
    var lastnameregex = /^[a-zA-Z]{2,50}/gm;
    var phonenumberregex = /^[0-9]{9,15}$/gm;

    if (!firstnameregex.test(firstname)) {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#invalid_first_name").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_first_name").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updateprofilebutton').disabled = false;

    } else if (!lastnameregex.test(lastname)) {
        
        // Stop form from submitting normally
		event.preventDefault();
        
        // Alert error
		$("#invalid_last_name").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_last_name").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updateprofilebutton').disabled = false;

    } else if (!phonenumberregex.test(phonenumber)) {
        
        // Stop form from submitting normally
		event.preventDefault();
        
        // Alert error
		$("#invalid_phone_number").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_phone_number").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updateprofilebutton').disabled = false;

    } else {

        // Process the form
        $.ajax({
            url : '../actions/user_action.php',
            type : 'POST',
            data : {
                userid : userid,
                firstname : firstname,
                lastname : lastname,
                usergender : usergender,
                phonenumber : phonenumber,
                userdepartment : userdepartment,
                userrank : userrank,
                interestareas : interestareas,
                action : 'updateuserprofile'
            },
            success : function(response) {
                if (response == 'failed') {
                    
					// Alert error
					$("#update_user_profile_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#update_user_profile_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('updateprofilebutton').disabled = false;

					return false;
                }
                else {
                    swal({
                        title: "User Profile Updated.",
                        text: "You'll be redirected to your profile page.",
                        icon: "success",
                        button: "Ok"
                    }).then(function() {
                        window.location = "../view/user_profile.php";
                    });;
                }
            }
        });
        return false;
    }
}

// Update admin user profile function
function adminupdateprofile() {

	// Disable button
	document.getElementById('updateadminprofilebutton').disabled = true;
	
	// Grab form data
	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
    var userid = document.getElementById('userid').value;

    // Define regex for name and phone number
    var firstnameregex = /^[a-zA-Z]{2,50}/gm;
    var lastnameregex = /^[a-zA-Z]{2,50}/gm;

    if (!firstnameregex.test(firstname)) {
        
        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#invalid_first_name").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_first_name").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updateadminprofilebutton').disabled = false;

    } else if (!lastnameregex.test(lastname)) {
        
        // Stop form from submitting normally
		event.preventDefault();
        
        // Alert error
		$("#invalid_last_name").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_last_name").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updateadminprofilebutton').disabled = false;

    } else {

        // Process the form
        $.ajax({
            url : '../actions/user_action.php',
            type : 'POST',
            data : {
                userid : userid,
                firstname : firstname,
                lastname : lastname,
                action : 'updateadminuserprofile'
            },
            success : function(response) {
                if (response == 'failed') {
                    
					// Alert error
					$("#update_user_profile_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#update_user_profile_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('updateadminprofilebutton').disabled = false;
                    
					return false;
                }
                else {
                    swal({
                        title: "User Profile Updated.",
                        text: "You'll be redirected to your profile page.",
                        icon: "success",
                        button: "Ok"
                    }).then(function() {
                        window.location = "../view/admin_profile.php";
                    });;
                }
            }
        });
        return false;
    }
}