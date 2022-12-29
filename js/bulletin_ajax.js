// Add event function
function addevent() {

	// Disable button
	document.getElementById('addeventbutton').disabled = true;
	
	// Grab form data
    var eventtitle = document.getElementById('eventtitle').value;
	var eventdate = document.getElementById('eventdate').value;
    var eventtype = document.getElementById('eventtype').value;
	var eventvenue = document.getElementById('eventvenue').value;
	var eventcontent = document.getElementById('eventcontent').value;

    if (eventtitle == '') {
        
        // Stop form from submitting normally
        event.preventDefault();

        // Alert error
        $("#missing_event_title").fadeTo(5000, 50).slideUp(500, function() {
            $("#missing_event_title").slideUp(500);
        });

        // Enable button
        document.getElementById('addeventbutton').disabled = false;

    } else if (eventdate == '') {

        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_event_date").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_event_date").slideUp(500);
		});
        
        // Enable button
		document.getElementById('addeventbutton').disabled = false;
    
    } else if (eventvenue == '') {

        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_event_venue").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_event_venue").slideUp(500);
		});
        
        // Enable button
		document.getElementById('addeventbutton').disabled = false;
    
    } else if (eventcontent == '') {

        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_event_content").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_event_content").slideUp(500);
		});
        
        // Enable button
		document.getElementById('addeventbutton').disabled = false;
    
    } else {

        // Process the form
        $.ajax({
            url : '../actions/bulletin_action.php',
            type : 'POST',
            data : {
                eventtitle : eventtitle,
                eventdate : eventdate,
                eventtype : eventtype,
				eventvenue : eventvenue,
				eventcontent : eventcontent,
                action : 'addevent'
            },
            success : function(response) {
                if (response == 'failed') {
                    
					// Alert error
					$("#add_event_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#add_event_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('addeventbutton').disabled = false;

					return false;
                }
                else {
                    swal({
                        title: "Event Added.",
                        text: "You'll be redirected to the events page.",
                        icon: "success",
                        button: "Ok"
                    }).then(function() {
                        window.location = "../view/admin_bulletin.php";
                    });;
                }
            }
        });
        return false;
    }
}

// Update event function
function updateevent() {

	// Disable button
	document.getElementById('updateeventbutton').disabled = true;
	
	// Grab form data
    var eventid = document.getElementById('eventid').value;
    var eventtitle = document.getElementById('eventtitle').value;
	var eventdate = document.getElementById('eventdate').value;
    var eventtype = document.getElementById('eventtype').value;
	var eventvenue = document.getElementById('eventvenue').value;
	var eventcontent = document.getElementById('eventcontent').value;

    if (eventtitle == '') {
        
        // Stop form from submitting normally
        event.preventDefault();

        // Alert error
        $("#missing_event_title").fadeTo(5000, 50).slideUp(500, function() {
            $("#missing_event_title").slideUp(500);
        });

        // Enable button
        document.getElementById('updateeventbutton').disabled = false;

    } else if (eventdate == '') {

        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_event_date").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_event_date").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updateeventbutton').disabled = false;
    
    } else if (eventvenue == '') {

        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_event_venue").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_event_venue").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updateeventbutton').disabled = false;
    
    } else if (eventcontent == '') {

        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#missing_event_content").fadeTo(5000, 50).slideUp(500, function() {
			$("#missing_event_content").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updateeventbutton').disabled = false;
    
    } else {

        // Process the form
        $.ajax({
            url : '../actions/bulletin_action.php',
            type : 'POST',
            data : {
                eventid : eventid,
                eventtitle : eventtitle,
                eventdate : eventdate,
                eventtype : eventtype,
				eventvenue : eventvenue,
				eventcontent : eventcontent,
                action : 'updateevent'
            },
            success : function(response) {
                if (response == 'failed') {
                    
					// Alert error
					$("#update_event_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#update_event_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('updateeventbutton').disabled = false;

					return false;
                }
                else {
                    swal({
                        title: "Event Updated.",
                        text: "You'll be redirected to the events page.",
                        icon: "success",
                        button: "Ok"
                    }).then(function() {
                        window.location = "../view/admin_bulletin.php";
                    });;
                }
            }
        });
        return false;
    }
}

// Delete event function
function deleteevent() {

    // Disable button
	document.getElementById('deleteeventbutton').disabled = true;

    // Grab form data
    var eventid = document.getElementById('eventid').value;

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this event!", 
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
    .then((willDelete) => {

        if (willDelete) {
            
            $.ajax({
                url : '../actions/bulletin_action.php',
                type : 'POST',
                data : {
                    eventid : eventid,
                    action : 'deleteevent'
                },
                success : function(response) {
                    if (response == 'failed') {
                        
                        // Alert error
                        $("#delete_event_failed").fadeTo(10000, 50).slideUp(500, function() {
                            $("#delete_event_failed").slideUp(500);
                        });
        
                        // Enable button
                        document.getElementById('deleteeventbutton').disabled = false;

                        return false;
                    }
                    else {
                        swal({
                            title: "Event Deleted.",
                            text: "You'll be redirected to the events page.",
                            icon: "success",
                            button: "Ok"
                        }).then(function() {
                            window.location = "../view/admin_bulletin.php";
                        });;
                    }
                }
            });
            return false;
        }
        else {
            swal("This event was not deleted!");

            // Enable button
            document.getElementById('deleteeventbutton').disabled = false;

            return false;
        }
    });
}

// Add news function
function addnews() {

	// Disable button
	document.getElementById('addnewsbutton').disabled = true;
	
	// Grab form data
    var newstitle = document.getElementById('newstitle').value;
	var newscontent = document.getElementById('newscontent').value;

    if (newstitle == '') {
        
        // Stop form from submitting normally
        event.preventDefault();

        // Alert error
        $("#invalid_news_title").fadeTo(5000, 50).slideUp(500, function() {
            $("#invalid_news_title").slideUp(500);
        });

        // Enable button
        document.getElementById('addnewsbutton').disabled = false;

    } else if (newscontent == '') {

        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#invalid_news_content").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_news_content").slideUp(500);
		});
        
        // Enable button
		document.getElementById('addnewsbutton').disabled = false;
    
    } else {

        // Process the form
        $.ajax({
            url : '../actions/bulletin_action.php',
            type : 'POST',
            data : {
                newstitle : newstitle,
                newscontent : newscontent,
                action : 'addnews'
            },
            success : function(response) {
                if (response == 'failed') {
                    
					// Alert error
					$("#add_news_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#add_news_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('addnewsbutton').disabled = false;

					return false;
                }
                else {
                    swal({
                        title: "News Added.",
                        text: "You'll be redirected to the news page.",
                        icon: "success",
                        button: "Ok"
                    }).then(function() {
                        window.location = "../view/admin_bulletin.php";
                    });;
                }
            }
        });
        return false;
    }
}

// Update news function
function updatenews() {

	// Disable button
	document.getElementById('updatenewsbutton').disabled = true;
	
	// Grab form data
    var newsid = document.getElementById('newsid').value;
    var newstitle = document.getElementById('newstitle').value;
	var newscontent = document.getElementById('newscontent').value;

    if (newstitle == '') {
        
        // Stop form from submitting normally
        event.preventDefault();

        // Alert error
        $("#invalid_news_title").fadeTo(5000, 50).slideUp(500, function() {
            $("#invalid_news_title").slideUp(500);
        });

        // Enable button
        document.getElementById('updatenewsbutton').disabled = false;

    } else if (newscontent == '') {

        // Stop form from submitting normally
		event.preventDefault();

        // Alert error
		$("#invalid_news_content").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_news_content").slideUp(500);
		});
        
        // Enable button
		document.getElementById('updatenewsbutton').disabled = false;
    
    } else {

        // Process the form
        $.ajax({
            url : '../actions/bulletin_action.php',
            type : 'POST',
            data : {
                newsid : newsid,
                newstitle : newstitle,
                newscontent : newscontent,
                action : 'updatenews'
            },
            success : function(response) {
                if (response == 'failed') {
                    
					// Alert error
					$("#update_news_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#update_news_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('updatenewsbutton').disabled = false;
                    
					return false;
                }
                else {
                    swal({
                        title: "News Updated.",
                        text: "You'll be redirected to the news page.",
                        icon: "success",
                        button: "Ok"
                    }).then(function() {
                        window.location = "../view/admin_bulletin.php";
                    });;
                }
            }
        });
        return false;
    }
}

// Delete news function
function deletenews() {

    // Disable button
	document.getElementById('deletenewsbutton').disabled = true;

    // Grab form data
    var newsid = document.getElementById('newsid').value;

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this news!", 
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
    .then((willDelete) => {

        if (willDelete) {
            
            $.ajax({
                url : '../actions/bulletin_action.php',
                type : 'POST',
                data : {
                    newsid : newsid,
                    action : 'deletenews'
                },
                success : function(response) {
                    if (response == 'failed') {
                        
                        // Alert error
                        $("#delete_news_failed").fadeTo(10000, 50).slideUp(500, function() {
                            $("#delete_news_failed").slideUp(500);
                        });
        
                        // Enable button
                        document.getElementById('deletenewsbutton').disabled = false;
                        
                        return false;
                    }
                    else {
                        swal({
                            title: "News Deleted.",
                            text: "You'll be redirected to the news page.",
                            icon: "success",
                            button: "Ok"
                        }).then(function() {
                            window.location = "../view/admin_bulletin.php";
                        });;
                    }
                }
            });
            return false;
        }
        else {
            swal("This news was not deleted!");

            // Enable button
            document.getElementById('deletenewsbutton').disabled = false;

            return false;
        }
    });
}