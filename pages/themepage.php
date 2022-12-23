<?php
include "../phpscripts/logout.php";
if((!isset($_COOKIE['authname']) & !isset($_COOKIE['authsurname']))){
   header("Location:../index.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
<header>
    <img src="../assets/images/logo.png" alt="" height="75" width="75"/>
    <h2>Тема</h2>
    <form method="get" class="menu">
        <input type="submit" name="main" class="navmenu" value="Назад">
        <input type="submit" name="exit" class="navmenu" value="Выйти">
    </form>
</header>
<h2>Вы авторизованы как <?=$_COOKIE['authname'];?> <?=$_COOKIE['authsurname'];?></h2> <br/>


<div class="themes">
    <?php
    
    include "../phpscripts/theme.php";


    echo'<h3 class="mar">Комментарии</h3>';
    $idUser = $_COOKIE['authid'];
    $rowsUsers = $mysqli ->query("SELECT * FROM users WHERE idUser=$idUser");
    foreach($rowsUsers as $row){
        if($row['idBan'] == 2){
            ?><div class="mar">Вы забанены и не можете оставлять комментарии, для разбана обратитесь к администрарору</div><?
        }
        else{
            ?>
                    <form method="get" class="mar">
                        Оставить комментарий:<br/>
                        <textarea name="comment"></textarea><br/>
                        <input type="submit" name="add" class="navmenu" value="Сохранить">
                    </form><br/>
           <?
        }
    }



    include "../phpscripts/comments.php";



    ?>
</div>
<footer></footer>
</body>
</html>