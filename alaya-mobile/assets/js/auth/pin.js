var rest_url = $('.rest_url').val();
var base_url = $('.base_url').val();
function addNumber(id) {
    if ($('.pin').val().length < 6) {
        $('.pin').val($('.pin').val()+id);
    }
}

function deleteNumber() {
    $('.pin').val($('.pin').val().slice(0, -1));
}

$('.splashscreen').hide();
$('.alert-danger').hide();

$(document).ready(function () {
	$(".btn-pin").click(function () {
        let pin = $('.pin').val();
        let id = $('#id_user').val();

		$.ajax({
			url: base_url + "auth/check_pin",
			type: 'post',
			data: {
				pin: pin,
				id: id
			},
			beforeSend: function () {
				// Show image container
				$('body').css('background-color', '#e9eef1');
				$('.splashscreen').show();
				$('.pin-container').hide();
			},
			success: function (response) {
				let x = JSON.parse(response);
				if (x == false) {
					$('.splashscreen').hide();
					$('.alert-danger').show();
					$('.pin-container').show();
					$('body').css('background-color', '#fff');
				} else {
					document.location.href = base_url;
				}
			}
		});

	});
}); 