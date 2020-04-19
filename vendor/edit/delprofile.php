<?php
    session_start();
    require_once '../connect.php';

    $login = $_SESSION['user']['login'];
    $password = $_SESSION['user']['password'];
    $id = $_SESSION['user']['id'];

    $check = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

    if (mysqli_num_rows($check) > 0)
    {
        mysqli_query($connect, "DELETE FROM `users` WHERE `id` = '$id'");
        $_SESSION['user'] = null;

        header('Location: ../../index.php');
                $_SESSION['message'] = 'Аккаунт успешно удален!';

    }
    else
    {
        $_SESSION['msg'] = 'Что-то пошло не так... Не удалось удалить аккаунт';
    }
?>
