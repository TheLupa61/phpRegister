<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <!-- Форма регистрации -->

    <form>
        <p class="alert alert-danger msg none"></p>

        <label for="validationServer01" class="form-label">Имя</label>
        <input type="text" name="first_name" class="form-control id="validationServer01" placeholder="Введите свое полное имя">
        <div id="validationServer01Feedback" class="invalid-feedback"></div>
        <label for="validationServer02" class="form-label">Фамилия</label>
        <input type="text" name="last_name" class="form-control id="validationServer02" placeholder="Введите свою фамилию">
        <div id="validationServer01Feedback" class="invalid-feedback"></div>
        <label for="validationServer03" class="form-label">Почта</label>
        <input type="email" name="email" class="form-control id="validationServer03" placeholder="Введите адрес своей почты">
        <div id="validationServer01Feedback" class="invalid-feedback"></div>
        <label for="validationServer04" class="form-label">Изображение профиля</label>
        <input type="file" class="form-control id="validationServer04" name="avatar">
        <div id="validationServer01Feedback" class="invalid-feedback"></div>
        <label for="validationServer05" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control id="validationServer05" placeholder="Введите пароль">
        <div id="validationServer01Feedback" class="invalid-feedback"></div>
        <label for="validationServer06" class="form-label">Подтверждение пароля</label>
        <input type="password" name="password_confirm" class="form-control id="validationServer06" placeholder="Подтвердите пароль">
        <div id="validationServer01Feedback" class="invalid-feedback"></div>
        <button type="submit" class="register-btn btn btn-primary">Зарегистрироваться</button>
        <div class="alert alert-info" style="margin-top:15px;">
            У вас уже есть аккаунт? <a href="/index.php">Авторизуйтесь.
        </div>
    </form>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>