<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $login = $_POST['login'];
        $password = md5($_POST['password']); 

        $user_data = "$login:$password\n";
        if (file_put_contents('users.txt', $user_data, FILE_APPEND) !== false) {
            http_response_code(201);
            echo "Регистрация прошла успешно!";
        } else {
            http_response_code(500);
            echo "Ошибка: Не удалось сохранить данные!";
        }
    } else {
        http_response_code(400);
        echo "Ошибка: Необходимо заполнить все поля!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
       <div>
    <label> Login </label>
    <input type="text" id="login" name="login">
       </div>
       <div>
        <label> Password</label>
        <input type="password" id="password" name="password">
       </div>
       <button type="submit">Зарегистрироваться</button>
    </form>
</body>
</html>
