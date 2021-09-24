<?php

    session_start();
    require_once 'connect.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
    if (mysqli_num_rows($check_email) > 0) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Такой email уже существует",
            "fields" => ['email']
        ];

        $log = date('Y-m-d H:i:s') . ' ' . print_r('Попытка использования ранее зарегистрированого email`а!', true);
        file_put_contents('../logs/log.txt', $log . PHP_EOL, FILE_APPEND);

        echo json_encode($response);
        die();
    }

    $error_fields = [];

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_fields[] = 'email';
    }

    if ($password === '') {
        $error_fields[] = 'password';
    }

    if ($first_name === '') {
        $error_fields[] = 'first_name';
    }

    if ($last_name === '') {
        $error_fields[] = 'last_name';
    }

    if ($password_confirm === '') {
        $error_fields[] = 'password_confirm';
    }

    if (!$_FILES['avatar']) {
        $error_fields[] = 'avatar';
    }


    if (!empty($error_fields)) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Проверьте правильность полей",
            "fields" => $error_fields
        ];

        echo json_encode($response);

        die();
    }

    if ($password === $password_confirm) {

        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $response = [
                "status" => false,
                "type" => 2,
                "message" => "Ошибка при загрузке аватарки",
            ];

            echo json_encode($response);
        }

        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `avatar`) VALUES (NULL, '$first_name', '$last_name', '$email', '$password', '$path')");

        $response = [
                "status" => true,
                "message" => "Регистрация прошла успешно!",
            ];

            echo json_encode($response);

    } else {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Пароли не совпадают",
            "fields" => ['password', 'password_confirm']
        ];

        echo json_encode($response);
        die();
    }

?>
