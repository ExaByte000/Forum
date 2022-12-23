<?php
    include "../phpscripts/auth.php";
    if(isset($_GET['reg'])){
        header("Location: regpage.php");
    }
    if(isset($_GET['main'])){
        if((isset($_COOKIE['authname']) & isset($_COOKIE['authsurname']))){
            header('Location: mainpage.php');
        }
        else{
            header('Location: ../index.php');
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <header>
        <img src="../assets/images/logo.png" alt="" height="75" width="75"/>
        <h2>Авторизация</h2>
        <form method="get" action="authpage.php" class="menu">
            <input type="submit" name="main" class="navmenu" value="Главная">
            <input type="submit" name="reg" class="navmenu" value="Регистрация">
        </form>
    </header>

    <div class="authform">
        <form method="get" class="mar">
            Email
            <input type="text" name="email">
            <p></p>
            Пароль
            <input type="password" name="password">
            <p></p>
            <input type="submit" name="auth" class="navmenu" value="Авторизоваться">
        </form>
    </div>


    <footer></footer>
</body>
</html>