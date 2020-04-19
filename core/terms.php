<?php
    session_start();
    if ($_SESSION['user'])
    {
        header('Location: /');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Darkness — регламент</title>
    <meta http-equiv=Content-Type content="text/html; charset=windows-1251">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <table width=1000px align=center><tr><td>

  <div id="j"><div id="q"><center><b>Пользовательское соглашение</b></center></div></div>
<br>
  <div id="j"><div id="q"><center><b>Основное положение</b></center><br>

    Darkness — не только сервис ботов, но также отличный уголок для общения со своими друзьями.<br><br>

    ������������� ������ �������:
    <ul>
    <li>���� ������������ ���� e-mail, �� �� ������ �������� � ���� �������� � � ��� �� ���� �������� ���� ����������� ����� �������.</li>
    <li>����������� ������� ������� �������� ���� ��������� ����� � ������ ����� (�� �������� �������������� ��������).</li>
    </ul>
  </td></tr></table>
</body>
</html>
