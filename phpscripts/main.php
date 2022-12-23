<?php
include "connect.php";
$result = $mysqli->query("SELECT * FROM themes WHERE idStatus='2' ORDER BY date DESC");

foreach ($result as $row){
    $idTheme = $row["idTheme"];
    $themes = $mysqli->query("SELECT COUNT(*) FROM comments WHERE idTheme=$idTheme");
    foreach ($themes as $rowTheme){
        foreach ($rowTheme as $key => $value){ ?>
                     <form method="get" class="mar" action="../phpscripts/function.php">
                         <h3><?=$row["nameTheme"]?></h3>
                         Содержание: <?=$row["discription"]?><br/>
                         Количесво комментариев: <?=$value?><br/><br/>
                         <button class="navmenu" name="open" value ="<?=$row['idTheme']?>">Открыть тему</button>
                      </form>
                      <div class="line"></div>
        <?}

    }

}