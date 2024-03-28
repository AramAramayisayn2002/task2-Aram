var logpassword = $('#logpassword');
//----------this function for the password to appear----------//
$('#iconPass').click(function () {
	if (logpassword.attr('type') === 'password') {
		logpassword.attr('type', 'text');
	} else {
		logpassword.attr('type', 'password');
	}
})