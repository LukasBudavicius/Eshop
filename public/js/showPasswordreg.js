function showPassword() {

    var key_attr = $('#password').attr('type');
    var key_attr = $('#confirm-password').attr('type');

    if(key_attr != 'text') {
        $('.checkbox').addClass('show');
        $('#password').attr('type', 'text');
        $('#confirm-password').attr('type', 'text');

    } else {
        $('.checkbox').removeClass('show');
        $('#password').attr('type', 'password');
        $('#confirm-password').attr('type', 'password');
    }
}