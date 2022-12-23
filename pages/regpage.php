<?php
        include "../phpscripts/registrarion.php";
        if(isset($_GET['auth'])){
            header("Location: authpage.php");
        }
        elseif(isset($_GET['main'])){
            if((isset($_COOKIE['authname']) & isset($_COOKIE['authsurname']))){
                header('Location: mainpage.php');
            }
            else{
                header('Location: ../index.php');
            }
        }
        ?>
<!DOCTYPE html>
<html lang="en" xmlns="">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <header>
        <img src="../assets/images/logo.png" alt="" height="75" width="75"/>
        <h2>Регистрация</h2>
        <form method="get" action="regpage.php" class="menu">
            <input type="submit" name="main" class="navmenu" value="Главная">
            <input type="submit" name="auth" class="navmenu" value="Авторизация">
        </form>
    </header>
    
    <div class="regform">

        <form method="get" class="mar">
            Email
            <input type="text" name="email">
            <p></p>
            Имя
            <input type="text" name="name">
            <p></p>
            Фамилия
            <input type="text" name="surname">
            <p></p>
            Пароль
            <input type="password" name="password">
            <p></p>
            <input type="submit" name="registration" class="navmenu" value="Зарегистритоваться">
            <p> </p>
        </form>

    </div>
    <br/>
    <div class="warnings">
        
    </div>
    <footer></footer>
</body>
</html>