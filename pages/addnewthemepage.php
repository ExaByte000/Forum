<?php
include "../phpscripts/connect.php";
if(isset($_GET['main'])){
    if((isset($_COOKIE['authname']) & isset($_COOKIE['authsurname']))){
        header('Location: mainpage.php');
    }
    else{
        header('Location: ../index.php');
    }
}
if(isset($_GET['themes'])){
    header("Location:themespage.php");
}
include "../phpscripts/logout.php";
if(isset($_GET['save'])){
    $nametheme = $_GET['name_themes_user'];
    $texttheme = $_GET['text_themes_user'];
    $datetheme = date('Y-m-d H:i:s');
    $statustheme = 1;
    $idusertheme = $_COOKIE['authid'];
    $name = '"'.$mysqli->real_escape_string($nametheme).'"';
    $text = '"'.$mysqli->real_escape_string($texttheme).'"';
    $date = '"'.$mysqli->real_escape_string($datetheme).'"';
    $status = '"'.$mysqli->real_escape_string($statustheme).'"';
    $iduser = '"'.$mysqli->real_escape_string($idusertheme).'"';
    $query = "INSERT INTO themes(nameTheme, date, discription, idStatus, idUser) VALUES ($name, $date, $text, $status, $iduser)";
    if ($nametheme == "" & $texttheme == ""){
        ?><h3 style='margin-left: 40%;'>Введите название темы и содержание</h3><?
    }
    else{
        $result = $mysqli->query($query);
        if($result){
            header("Location: themespage.php");
        }
        else{
            ?><p>Что-то пошло не по плану</p><?
        }
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
    <h2>Создание новой темы</h2>
    <form method="get"  class="menu">
        <input type="submit" name="themes" class="navmenu" value="Мои темы">
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
<div class="newthem">
    <?php
    $idUser = $_COOKIE['authid'];
    $rowsUsers = $mysqli ->query("SELECT * FROM users WHERE idUser=$idUser");
    foreach($rowsUsers as $row){
        if($row['idBan'] == 2){
            ?><h3 style="margin-left: -60%;">Вы забанены и не можете создавать новые темы, для разбана обратитесь к администрарору</h3><?
        }
        else{
           ?><div class="addthemeform">
                <form method="GET" class="mar">
                    Название
                    <input type="text" name="name_themes_user">
                    <p></p>
                    Содержание
                    <textarea name="text_themes_user"> </textarea>
                    <p></p>
                    <input type="submit" name="save" class="navmenu" value="Сохранить">
                </form>
                </div>
                <?
        }
    }
    ?>
</div>



<footer></footer>
</body>
</html>