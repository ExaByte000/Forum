<?php

include "connect.php";
$authid = $_COOKIE['authid'];
$result = $mysqli->query("SELECT * FROM themes WHERE idUser='$authid' ORDER BY idStatus");

foreach ($result as $row){
    $idststus = $row['idStatus'];
    $stat = $mysqli->query("SELECT * FROM statuses WHERE idStatus='$idststus'");
    foreach ($stat as $row2){
        $pipau = $row2['nameStatus'];
    }
    if($idststus == 2){
        ?>
              <form method="get" class="mar">
                  <h3><?=$row["nameTheme"]?></h3>
                  Содержание: <?=$row["discription"]?><br/>
                  Статус: <?=$pipau?><br/>
                  Дата:<?=$row['date']?><br/><br/>
                  <button class="navmenu" name="open" Value ="<?=$row['idTheme']?>">Открыть тему</button>
              </form>
              <div class="line"></div>
             <?
       
    }
    else{
        ?>
              <div class="mar">
              <h3><?=$row["nameTheme"]?></h3>
              Содержание: <?=$row["discription"]?><br/>
              Статус: <?=$pipau?><br/>
              Дата:<?=$row['date']?><br/>
              </div>
              <div class="line"></div>
              
        <?
    }

}
