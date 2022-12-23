<?php
include "connect.php";
$id= $_COOKIE['idtheme'];
$result = $mysqli->query("SELECT * FROM themes WHERE idTheme='$id'");
foreach ($result as $row){
    $idUser = $row['idUser'];
    $namesUsers = $mysqli -> query("SELECT * FROM users WHERE idUser=$idUser");
    foreach ($namesUsers as $rowName){
        echo'
            <div class="mar">
            <h3>'.$row["nameTheme"].'</h3>
            Автор: '.$rowName['name'].' '.$rowName['surname'].'<br/>
            Содержание: '.$row["discription"].'<br/>
            Дата: '.$row["date"].'<br/>
            </div>
    ';
    }

}