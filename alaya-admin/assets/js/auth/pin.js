function addNumber(id) {
    if ($('.pin').val().length < 6) {
        $('.pin').val($('.pin').val()+id);
    }
}

function deleteNumber() {
    $('.pin').val($('.pin').val().slice(0, -1));
}