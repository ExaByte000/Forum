<?php

if((isset($_COOKIE['authname']) & isset($_COOKIE['authsurname']))){
   header("Location: pages/mainpage.php");
}
if(isset($_GET['reg'])){
    header("Location: pages/regpage.php");
}
elseif(isset($_GET['auth'])){
    header("Location: pages/authpage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<header>
    <img src="assets/images/logo.png" alt="" height="75" width="75"/>
    <h2>Главная</h2>
        <form method="get" action="index.php" class="menu">
        <input type="submit" class="navmenu" name="reg" value="Регистрация">
        <input type="submit" class="navmenu" name="auth" value="Авторизация">
    </form>
</header>
<div class="themes">
<?php
include "phpscripts/main.php";
?>
</div>
<footer></footer>
</body>
</html>