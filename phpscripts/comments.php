<?php
include "connect.php";
$idtheme = $_COOKIE['idtheme'];
$result = $mysqli->query("SELECT * FROM comments WHERE idTheme=$idtheme ORDER BY date DESC");
if (isset($_GET['add'])){
    $commentform = $_GET['comment'];
    $iduserform = $_COOKIE['authid'];
    $dateform = date('Y-m-d H:i:s');
    $comment = '"'.$mysqli->real_escape_string($commentform).'"';
    $iduser = '"'.$mysqli->real_escape_string($iduserform).'"';
    $idTheme = '"'.$mysqli->real_escape_string($idtheme).'"';
    $date = '"'.$mysqli->real_escape_string($dateform).'"';
    $query = "INSERT INTO comments(idUser, idTheme, discription, date) VALUES ($iduser, $idTheme, $comment, $date)";
    if ($commentform != ""){
        $result1 = $mysqli->query($query);
        if($result1){
            // header("Location: themepage.php");
            echo "<script>window.location.href = 'themepage.php';</script>";
        }
        else{
            ?><p>Что-то пошло не по плану</p><?
        }
    }
    else{
        ?><div class='mar'>Вы не можете оставтить пустой комментарий</div><?
    }
}
    foreach ($result as $row) {
    $idUser = $row['idUser'];
    $name = $mysqli->query("SELECT * FROM users WHERE idUser=$idUser");
        foreach ($name as $rowname){ ?>
           <div class="mar">
                <h4><?=$rowname['name'];?></h4>
                <?=$row['discription'];?><br/>'
                <?=$row['date'];?><br/>
            </div>
            <div class="line"></div>
            <?
        }
   }


