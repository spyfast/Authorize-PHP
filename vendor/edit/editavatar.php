<?php

    session_start();
    require_once '../connect.php';


    $login = $_SESSION['user']['login'];
    $password = $_SESSION['user']['password'];
    $avatar = $_SESSION['user']['avatar'];

    $check = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

    if (mysqli_num_rows($check) > 0)
    {
      $path = 'uploads/' . time() . $_FILES['avatars']['name'];
      if (!move_uploaded_file($_FILES['avatars']['tmp_name'], '../../' . $path))
      {
          $_SESSION['msg'] = 'Ошибка при загрузке аватара...';
          header('Location: ../../profile.php');
      }

        mysqli_query($connect, "UPDATE `users` SET `avatar` = '$path' WHERE `avatar` = '$avatar'");

        $_SESSION['msg'] = 'Аватар Вашего профиля успешно изменен!';
        $_SESSION['user']['avatar'] = $path;
        header('Location: ../../profile.php');

    }
    else
    {
        $_SESSION['msg'] = 'Что-то пошло не так... Не удалось сменить аватар.';
    }


?>
