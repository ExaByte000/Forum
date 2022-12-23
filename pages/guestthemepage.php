<?
if(isset($_GET['main'])){
        if((isset($_COOKIE['authname']) & isset($_COOKIE['authsurname']))){
            header('Location: mainpage.php');
        }
        else{
            header('Location: ../index.php');
        }
    }
    if(isset($_GET['reg'])){
        header("Location: regpage.php");
    }
    if(isset($_GET['auth'])){
        header("Location: authpage.php");
    }
    
    include "../phpscripts/logout.php";

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
    <h2>Тема</h2>
    <form method="get" action="../index.php" class="menu">
        <input type="submit" name="reg" class="navmenu" value="Регистрация">
        <input type="submit" name="auth" class="navmenu" value="Авторизация">
        <input type="submit" name="main" class="navmenu" value="Главная">
    </form>
</header>

<br/>
<div class="form">
    <p></p>
</div>

<div class="themes">
    <?php
    include "../phpscripts/theme.php";
    echo'
            <h3 class="mar">Комментарии</h3>
            <div class="mar">Чтобы оставлять коментарии авторизуйтесь или зарегистрируйтесь</div>
        ';

    include "../phpscripts/comments.php";



    ?>
</div>
<footer></footer>
</body>
</html>