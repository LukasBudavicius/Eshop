function showPassword() {

    var key_attr = $('#pasw').attr('type');

    if(key_attr != 'text') {
        $('.checkbox').addClass('show');
        $('#pasw').attr('type', 'text');

    } else {
        $('.checkbox').removeClass('show');
        $('#pasw').attr('type', 'password');
    }
}
