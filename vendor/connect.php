<?php

    $connect = mysqli_connect('localhost', 'Логин', 'Пароль', 'Имя');

    if (!$connect) {
        die('Error connect to DataBase');
    }
