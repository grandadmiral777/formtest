$().ready(function () {
	function res() {
		location.reload();
	}

	$('.cook').click(function(){
		$.post('/ajax/langset.php',
		   $.param({ 
			  deflang: $(this).attr('var'),
		   }), res
		);
	});
	
	if ($('#checkpage').val() == 'profile') {
		$.ajax({
			type: "POST",
			url: '/ajax/work-user.php',
			data: {'type': 'profilepage', 'lang': $('#lang').val(), 'id': $('#userid').val()},
			success: function (response) {
				$('#scontent').html(response);
			}
		});
	}

	$('#reg-user').click(function() {
		var username = $('#reg-username').val();
		var email = $('#reg-email').val();
		var pasword = $('#reg-password').val();
		var photo = 1;
		if (username && email && pasword) {
			var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
			if (testEmail.test(email)) {
				if (pasword.length > 7) {
					$.ajax({
						type: "POST",
						url: '/ajax/work-user.php',
						data: {'type': 'regnewuser', 'lang': $('#lang').val(), 'username': username, 'email': email, 'password': pasword, 'photo': photo},
						success: function (response) {
							UIkit.notification({ message: response, status: 'primary', pos: 'top-right', timeout: 5000 });
						}
					});
					res();	
				} else {
					UIkit.notification({ message: 'Password should be at least 8 symbols long!', status: 'danger', pos: 'top-right', timeout: 5000 });
				}
			} else {
				UIkit.notification({ message: 'Please check spelling of your email!', status: 'danger', pos: 'top-right', timeout: 5000 });
			}
		} else {
			UIkit.notification({ message: 'All fields with * must be filled!', status: 'danger', pos: 'top-right', timeout: 5000 });
		}
	});

	$('#log-user').click(function() {
		var email = $('#log-email').val();
		var pasword = $('#log-password').val();
		if (email && pasword) {
			var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
			if (testEmail.test(email)) {
				$.ajax({
					type: "POST",
					url: '/ajax/work-user.php',
					data: {'type': 'loguser', 'lang': $('#lang').val(), 'email': email, 'password': pasword},
					success: function (response) {
						if (response == 1) {
							res();
						} else {
							UIkit.notification({ message: response, status: 'danger', pos: 'top-right', timeout: 5000 });
						}
					}
				});
			} else {
				UIkit.notification({ message: 'Please check spelling of your email!', status: 'danger', pos: 'top-right', timeout: 5000 });
			}
		} else {
			UIkit.notification({ message: 'All fields must be filled!', status: 'danger', pos: 'top-right', timeout: 5000 });
		}
	});
});