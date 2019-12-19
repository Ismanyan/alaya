$('.check').hide();
$('.alert-danger').hide();
var rest_url = $('.rest_url').val();
var base_url = $('.base_url').val();
function splash(param) {
	var time = param;
	$('body').css('background-color', '#e9eef1');
	$('.login').hide();
	setTimeout(function () {
		$('#splashscreen').hide();
		$('.login').show();
		$('body').css('background-color', '#fff');
	}, time);
}
$(document).ready(function () {
	$(".btn-login").click(function () {
		var username = $('#username').val();
		var email = $('#emails').val();
		var password = $('#passwords').val();

		$.ajax({
			url: base_url+"auth/checklogin",
			type: 'post',
			data: {
				username: username,
				email: email,
				password: password,
			},
			beforeSend: function () {
				// Show image container
				$('body').css('background-color', '#e9eef1');
				$('#splashscreen').show();
				$('.check').show();
				$('.login').hide();
			},
			success: function (response) {
				let x = JSON.parse(response);

				if (x == false) {
					$('body').css('background-color', '#fff');
					$('#splashscreen').hide();
					$('.check').hide();
					$('.login').show();
					$('.alert-danger').show();
				} else {
					document.location.href = base_url+"auth/pin/" + response;
				}
			}
		});

	});
}); 