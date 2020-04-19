<?php

    session_start();

    $fileName = $_SESSION['user']['id'] . '.txt';
    $Text = null;
    if (!is_dir($_SERVER['DOCUMENT_ROOT'] . "/uploads"))
    {
        mkdir("uploads/" . $_SESSION['user']['id']);
    }

    $times = time();

    if ($_SESSION['user']['date'] )

    $result = move_uploaded_file
    (
        $_FILES["download"]["tmp_name"],
        "uploads/" . $_SESSION['user']['id'] .  DIRECTORY_SEPARATOR .  $times . $_FILES["download"]["name"]
    );
    if ($result)
    {
        $_SESSION['msg'] = 'Файл успешно загружен, Ваша ссылка: ' . 'http://fusts.host/darkness/vendor/work'  . '/uploads' . '/' . $_SESSION['user']['id'] . '/' . $times . $_FILES["download"]["name"];
        $Text = 'http://fusts.host/darkness/vendor/work'  . '/uploads' . '/' . $_SESSION['user']['id'] . '/' . $times . $_FILES["download"]["name"];

        $OpenFile = fopen("./file_users/" . $fileName, "a+");
        fwrite($OpenFile, $Text . "\n");
        fclose($OpenFile);

        $times = null;
        header('Location: ../../profile.php');
    }

?>
