<?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: /');
    }

    if ($_SESSION['user']['ban'] == 1)
    {
      header('Location: core/errors/banned.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Darkness</title>
        <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
        <script src="https://bootstraptema.ru/plugins/2015/b-v3-3-6/bootstrap.min.js"></script>
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/stylesImg.css" />
        <link rel="stylesheet" href="assets/css/stylesProfile.css" />
</head>

<body>
    <div class="container">
    <div id="main">
    <center>
      <?php
        if ($_SESSION['msg'])
        {
          echo '<p class="msg"> ' . $_SESSION['msg'] . ' </p>';
        }
        unset($_SESSION['msg']);
      ?>

  </center>
      <div class="row" id="real-estates-detail">
      <div class="col-lg-4 col-md-4 col-xs-12">
      <div class="panel panel-default">
      <div class="panel-heading">
      <header class="panel-title">
      <div class="text-center">
<strong>

<strong> ID: <?= $_SESSION['user']['id'] ?> </strong>
    </div>
    </header>
    </div>
    <div class="panel-body">
    <div class="text-center" id="author">

<?php
     if (strlen($_SESSION['user']['avatar']) < 19)
     {
       echo '<img width="200" src="img/avatar.png"> ';
     }
     else
     {
       echo '<img width="200" src=" ' . $_SESSION['user']['avatar'] . ' "> ';
     }
?>

<h3>
<?php
    if ($_SESSION['user']['verification'] == 1)
    {
      echo '<p> ' . $_SESSION['user']['full_name'] . ' <img class="i" src="img/tick.png" title="Пользователь верифицирован">' .' </p>';

    }
    else
    {
      echo '<p> ' . $_SESSION['user']['full_name'] . ' </p>';
    }
?></h3>

    </div>
    <center>
    <a href="vendor/logout.php" class="logout">Выйти из системы</a>
    </center>
    </div>
    </div>
    </div>
    <div class="col-lg-8 col-md-8 col-xs-12">
    <div class="panel">
    <div class="panel-body">

        <ul id="myTab" class="nav nav-pills">
        <li class="active"><a href="#wall" data-toggle="tab">Стена</a></li>
        <li class=""><a href="#detail" data-toggle="tab">Бот для группы</a></li>
        <li class=""><a href="#contact" data-toggle="tab">Настройки</a></li>
        <li class=""><a href="#photo" data-toggle="tab">Фотографии</a></li>

</ul>

<div id="myTabContent" class="tab-content">
<hr>
<div class="tab-pane fade active in" id="wall">
<table class="table table-th-block">
<tbody>
    <center>
        <h4>Мой профиль</h4>
          <br>
</center>
        <tr><td class="active">ID:</td><td><?= '<p> ' . $_SESSION['user']['id'] . ' </p>' ?> </td></tr>
        <tr><td class="active">Логин:</td><td><?= '<p> ' . $_SESSION['user']['login'] . ' </p>' ?></td></tr>
        <tr><td class="active">E-mail:</td><td><?= '<p> ' . $_SESSION['user']['email'] . ' </p>' ?></td></tr>
        <tr><td class="active">Зарегистрирован:</td><td><?= '<p> ' . $_SESSION['user']['date'] . ' </p>' ?></td></tr>
        </tbody>
        </table>
<br>
<center>

    <h4>Все Ваши файлы Вы можете хранить на нашем сервере.</h4>
    <br>
    <form action="vendor/work/download.php" method="post" enctype="multipart/form-data">
        <input type="file" name="download" value="Загрузите файл">
            <button type="submit">Загрузить</button>
    </form>
</div>

<div class="tab-pane fade" id="detail">
<center>
 <form action="models/vk/addtarget.php" method="post">
   <h4>ВКонтакте бот для групп</h4>
   <input type="text" name="token" placeholder="API Key">
   <input type="text" name="confirmationToken" placeholder="Строка Callback API">
   <button type="submit">Старт</button>
 </form>
</center>
</div>
<div class="tab-pane fade" id="contact">
<p></p>
<center>
     <form action="vendor/edit/editavatar.php" method="post" enctype="multipart/form-data">
       <label>Изменить изображение профиля</label>
       <input type="file" name="avatars">
       <button type="submit">Сохранить</button>
     </form>
     <br>
     <form action="vendor/edit/editname.php" method="post">
       <label>Изменение личных данных</label>
       <input type="text" name="new_name" placeholder="Новое имя">
       <button type="submit">Сохранить</button>
     </form>
     <form action="vendor/edit/delprofile.php" method="post"><br>
         <label>Вы можете <a href="vendor/edit/delprofile.php">Удалить свой аккаунт</label>
     </form>
</center>
</div>
<div class="tab-pane fade" id="photo">
<?php
    $id = $_SESSION['user']['id'];
    $dir = 'vendor/work/uploads/' . $id . '/';
    $cols = 7;
    $files = scandir($dir);
    echo "<table>";
    $k = 0;
    for ($i = 0; $i < count($files); $i++)
    {
      if (($files[$i] != ".") && ($files[$i] != ".."))
      {
        if ($k % $cols == 0) echo "<tr>";
        echo "<td>";
        $path = $dir.$files[$i];
        echo "<a href='$path'>";
        echo "<img src='$path' alt='' width='100'/>";
        echo "</a>";
        echo "</td>";
        if ((($k + 1) % $cols == 0) || (($i + 1) == count($files))) echo "</tr>";
        $k++;
      }
    }
    echo "</table>";
?>
<a></a>
</div>
</div>
</body>
</html>
