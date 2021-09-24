/*
    Авторизация
 */


$('.login-btn').click(function (e) {

    e.preventDefault();

    $('input').removeClass('is-invalid')

    let email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val();
    $.ajax({
        url: 'vendor/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email,
            password: password
        },
        success (data) {
            if (data.status) {
                document.location.href = '/profile.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $( ` input[name="${field}"] ` ).addClass('is-invalid');
                    });

                }
                $('.msg').removeClass('none').text(data.message);
            }

        }
    });
});

/*
    Получение аватарки с поля
 */

let avatar = false;

$('input[name="avatar"]').change(function (e){
    avatar = e.target.files[0];
    console.log(avatar);
});

/*
    Регистрация
 */


$('.register-btn').click(function (e) {

    e.preventDefault();

    $('input').removeClass('is-invalid')

    let email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val(),
        first_name = $('input[name="first_name"]').val(),
        last_name = $('input[name="last_name"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    let formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);
    formData.append('first_name', first_name);
    formData.append('last_name', last_name);
    formData.append('password_confirm', password_confirm);
    formData.append('avatar', avatar);

    $.ajax({
        url: 'vendor/signup.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {
            if (data.status) {
                document.location.href = '/done.php';

            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $( ` input[name="${field}"] ` ).addClass('is-invalid');
                    });

                }
                $('.msg').removeClass('none').text(data.message);
                // $('.invalid-feedback').text(data.message);
                $('body').addClass('pad');
            }

        }
    });
});