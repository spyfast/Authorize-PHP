<?php
    session_start();
    require_once '../connect.php';

    $login = $_SESSION['user']['login'];
    $password = $_SESSION['user']['password'];

    $check = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");




        if (mysqli_num_rows($check) > 0)
        {
          $name = $_POST['new_name'];

          if ($name === '')
          {
              $_SESSION['msg'] = 'Нельзя установить пустое имя!';
              header('Location: ../../profile.php');
          }
          else
          {
            $full_name = $_SESSION['full_name'];
            mysqli_query($connect, "UPDATE `users` SET `full_name` = '$name' WHERE `full_name` = '$full_name'");

            $_SESSION['msg'] = 'Имя профиля успешно изменено!';
            $_SESSION['user']['full_name'] = $name;
            header('Location: ../../profile.php');
          }

        }
        else
        {
          $_SESSION['msg'] = 'Возникли ошибки при смене данных профиля...';
        }
?>
