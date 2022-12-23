<?php
include "connect.php";
$result = $mysqli->query("SELECT * FROM users WHERE idRole=2");
foreach ($result as $row){
    $idBan = $row['idBan'];
    $rowbans = $mysqli ->query("SELECT * FROM banstatuses WHERE idBan=$idBan");
    foreach ($rowbans as $row2){
        echo '<h3 class="mar" style="margin-left: 220px">'.$row['name'].' '.$row['surname'].'</h3>';

        if($row['idBan']==1){
            echo'
           <form method="get" class="mar" style="margin-left: 220px">
                <input type="submit" name="ban'.$row['idUser'].'" class="navmenu" value="Забанить">
           </form>
           <div class="line"></div>
       ';
        }
        else{
            echo '
            <form method="get" class="mar" style="margin-left: 220px">
                <input type="submit" name="unban'.$row['idUser'].'" class="navmenu" value="Разбанить"> '.$row2['name'].'
            </form>
            <div class="line"></div>
        ';
        }
    }
    if((isset($_GET['ban'.$row['idUser']]))){
        $idUser = $row['idUser'];

        $ban = '"'.$mysqli->real_escape_string($idBan).'"';
        $user = '"'.$mysqli->real_escape_string($idUser).'"';

        $resultBan = $mysqli ->query("UPDATE users SET idBan=2 WHERE idUser=$user");

        if($resultBan){
            echo "<script> window.location.href = 'alluserspage.php';</script>";
        }
        else{
            echo "Что-то пошло не по плану";
        }
    }
    elseif((isset($_GET['unban'.$row['idUser']]))){
        $idUser = $row['idUser'];

        $ban = '"'.$mysqli->real_escape_string($idBan).'"';
        $user = '"'.$mysqli->real_escape_string($idUser).'"';

        $resultBan = $mysqli ->query("UPDATE users SET idBan=1 WHERE idUser=$user");

        if($resultBan){
            echo "<script> window.location.href = 'alluserspage.php';</script>";
        }
        else{
            echo "Что-то пошло не по плану";
        }
    }
}
