<?php
if(isset($_GET['save'])){
    $nametheme = $_GET['name_themes_user'];
    $texttheme = $_GET['text_themes_user'];
    $datetheme = date('Y-m-d H:i:s');
    $statustheme = 1;
    $idusertheme = $_COOKIE['authid'];
    $name = '"'.$mysqli->real_escape_string("1111").'"';
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