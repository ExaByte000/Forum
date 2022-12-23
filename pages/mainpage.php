<?
include "../phpscripts/logout.php";
if((!isset($_COOKIE['authname']) & !isset($_COOKIE['authsurname']))){
   header("Location:../index.php");
}
if(isset($_GET['themes'])){
   header("Location:themespage.php");
}
if (isset($_GET['allthemes'])){
    header("Location: allthemespage.php");
}
if (isset($_GET['allusers'])){
    header("Location: alluserspage.php");
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
        <h2>Главная</h2>
		<form method="get" action="mainpage.php" class="menu">
            <input type="submit" name="themes" class="navmenu" value="Мои темы">
            <?php
            if($_COOKIE['authidrole'] == 1){
                ?>
                <input type="submit" name="allusers"  class="navmenu" value="Все пользователи">
                <input type="submit" name="allthemes"  class="navmenu" value="Все темы" >
                <?
                
            }
             
            ?>
            <input type="submit" class="navmenu" name="exit" value="Выйти">
		</form>
	</header>
    <h2>Вы авторизованы как <?=$_COOKIE['authname']?> <?=$_COOKIE['authsurname']?></h2>
    <div class="themes">
        <?php
        include "../phpscripts/main.php";
        ?>
    </div>
	<footer></footer>
</body>
</html>