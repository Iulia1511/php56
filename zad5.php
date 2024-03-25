<?php
// Проверяем, что форма была отправлена методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, что все поля заполнены
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        // Получаем логин и пароль из формы
        $login = $_POST['login'];
        $password = md5($_POST['password']); // Шифруем пароль с помощью MD5

        // Проверяем существует ли пользователь с таким логином и паролем в файле users.txt
        $users_data = file_get_contents('users.txt');
        $user_found = false;
        $lines = explode("\n", $users_data);
        foreach ($lines as $line) {
            $line_data = explode(":", $line);
            if (isset($line_data[0]) && isset($line_data[1])) {
                $stored_login = $line_data[0];
                $stored_password = trim($line_data[1]);
                if ($login === $stored_login && $password === $stored_password) {
                    // Пользователь найден
                    $user_found = true;
                    break;
                }
            }
        }

        if ($user_found) {
            // Если пользователь найден, перенаправляем его на страницу с изображениями
            header("Location: images.php");
            exit(); // Завершаем выполнение скрипта, чтобы редирект прошел успешно
        } else {
            // Если пользователь не найден, выводим сообщение об ошибке
            echo "Ошибка: Неправильный логин или пароль!";
        }
    } else {
        // Если какое-то из полей не заполнено
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
       <button type="submit">Войти</button>
    </form>
</body>
</html>
