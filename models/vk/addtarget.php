<?php

    session_start();
    require_once '../../vendor/connect.php';

    $token = $_POST['token'];
    $confirmationToken = $_POST['confirmationToken'];

    $file = fopen('handler.php', 'r');
    $text = fread($file, filesize('handler.php'));
    fclose($file);
    $file = fopen('handler.php', 'w');
    $text = str_replace('</INVENTORY>', '', $text);
    $text = str_replace('e6ab65ef', 'd', $text);
    fwrite($file, $text);
    fclose($file);
?>
