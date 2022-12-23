<?
if(isset($_GET['open'])){
    setcookie("idtheme",$_GET['open'],time()+60*60,'/');
    header("Location: themepage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
<header>
    <img src="../assets/images/logo.png" alt="" height="75" width="75"/>
    <h2>Все темы</h2>
    <form method="get" action="mainpage.php" class="menu">
        <input type="submit" name="main" class="navmenu" value="Главная">
        <input type="submit" name="exit" class="navmenu" value="Выйти">
    </form>
</header>

<?php
include "../phpscripts/logout.php";
if((isset($_COOKIE['authname']) & isset($_COOKIE['authsurname']))){
    echo "<h2>Вы авторизованы как ".$_COOKIE['authname']." ".$_COOKIE['authsurname']."</h2><br/>";

}
else{
    header("Location:../index.php");
}
?>
<div class="themes">
<?php
include "../phpscripts/allthemes.php";
?>
</div>
<footer></footer>
</body>
</html>