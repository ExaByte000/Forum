<?php
include "../phpscripts/logout.php";
if(isset($_GET['main'])){
    if((isset($_COOKIE['authname']) & isset($_COOKIE['authsurname']))){
        header('Location: mainpage.php');
    }
    else{
        header('Location: ../index.php');
    }
}
if(isset($_GET['open'])){
    setcookie("idtheme",$_GET['open'],time()+60*60,'/');
    header("Location: themepage.php");
}
if (isset($_GET['addtheme'])){
    header('Location: addnewthemepage.php');
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
    <h2>Мои Темы</h2>
    <form method="get" class="menu">
        <input type="submit" name="main" class="navmenu" value="Главная">
        <input type="submit" name="exit" class="navmenu" value="Выйти">
    </form>
</header>
<?php
if((isset($_COOKIE['authname']) & isset($_COOKIE['authsurname']))){
    ?><h2>Вы авторизованы как <?=$_COOKIE['authname']." ".$_COOKIE['authsurname']?></h2><br/><?

}
else{
    header("Location:../index.php");
}
?>
<br/>
    <form method="get" class="newthem">
        <input type="submit" name="addtheme" class="navmenu" value="Добавить новую тему">
    </form>
    <p></p>
<div class="themes">
<?
include "../phpscripts/themes.php";
?>
</div>
<footer></footer>
</body>
</html>