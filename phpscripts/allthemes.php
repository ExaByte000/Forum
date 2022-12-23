<?php
include "connect.php";
$result = $mysqli ->query("SELECT * FROM themes ORDER BY idStatus");
foreach ($result as $row){
    $idTheme = $row["idTheme"];
    $idststus = $row['idStatus'];
    $themes = $mysqli->query("SELECT COUNT(*) FROM comments WHERE idTheme=$idTheme");
    foreach ($themes as $rowTheme){
        foreach ($rowTheme as $key => $value){
            $stat = $mysqli->query("SELECT * FROM statuses WHERE idStatus='$idststus'");
            foreach ($stat as $row2){
                $pipau = $row2['nameStatus'];
            }
            if($idststus == 2){
                echo '
                     <form method="get" class="mar">
                         <h3>'.$row["nameTheme"].'</h3>
                         Содержание: '.$row["discription"].'<br/>
                         Статус: '.$pipau.'<br/>
                         Дата:'.$row['date'].'<br/>
                         <button name="open" class="navmenu" Value ="'.$row['idTheme'].'">Открыть тему</button>
                      </form>
                      <div class="line"></div>
                    ';
            }
            elseif($idststus == 1){
                echo '
                     <form method="get" class="mar">
                         <h3>'.$row["nameTheme"].'</h3>
                         Содержание: '.$row["discription"].'<br/>
                         Статус: '.$pipau.'<br/>
                         Дата:'.$row['date'].'<br/>
                         <input type="submit" name="accept'.$row['idTheme'].'" class="navmenu" value="Одобрить">
                         <input type="submit" name="noaccept'.$row['idTheme'].'" class="navmenu" value="Отклонить">
                      </form>
                      <div class="line"></div>
                    ';
                if(isset($_GET['accept'.$row['idTheme']])){
                    $idtheme = $row['idTheme'];

                    $id = '"'.$mysqli->real_escape_string($idtheme).'"';
                    $status = '"'.$mysqli->real_escape_string($idststus).'"';

                    $resultChange = $mysqli ->query("UPDATE themes SET idStatus=2 WHERE idtheme=$id");

                    if($resultChange){
                        echo "<script> window.location.href = 'allthemespage.php';</script>";
                    }
                    else{
                        echo "Что-то пошло не по плану";
                    }
                }
                elseif(isset($_GET['noaccept'.$row['idTheme']])){
                    $idtheme = $row['idTheme'];

                    $id = '"'.$mysqli->real_escape_string($idtheme).'"';
                    $status = '"'.$mysqli->real_escape_string($idststus).'"';

                    $resultChange = $mysqli ->query("UPDATE themes SET idStatus=3 WHERE idtheme=$id");

                    if($resultChange){
                        echo "<script> window.location.href = 'allthemespage.php';</script>";
                    }
                    else{
                        echo "Что-то пошло не по плану";
                    }
                }
            }
            else{
                echo '
                     <form method="get" class="mar">
                         <h3>'.$row["nameTheme"].'</h3>
                         Содержание: '.$row["discription"].'<br/>
                         Статус: '.$pipau.'<br/>
                         Дата:'.$row['date'].'<br/>
                      </form>
                      <div class="line"></div>
                    ';
            }
        }

    }

}