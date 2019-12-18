$(document).ready(function () {
    var base_url = $('.base_url').val();
    var back = $('.back').val();
    var latitude = $('.latitude').val();
    var longitude = $('.longitude').val();
    var location = $('.location').val();
    $('.absent').click(function () {
        $('.loader').show();
        $.ajax({
            url: base_url,
            type: 'post',
            data: {
                latitude: latitude,
                longitude: longitude,
                location: location
            },
            success: function (response) {
                let x = JSON.parse(response);
                $('.loader').hide();
                if(x == 1){
                    Swal.fire({
                    	title: "Absent success",
                    	icon: 'success',
                    	text: "Thank you for being absent today",
                    	timer: 2000,
                    	onClose: () => {
                    		window.location.replace(back);
                    	}
                    });
                } else {
                    Swal.fire({
                    	title: "Absent Denied",
                    	icon: 'warning',
                    	text: "Absent today already done",
                    	timer: 2000,
                    	onClose: () => {
                    		window.location.replace(back);
                    	}
                    });
                }
            }
        });
    });
});