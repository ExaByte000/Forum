<?
if(isset($_GET['open'])){
        setcookie("idtheme",$_GET['open'],time()+60*60*24,'/');
        if((isset($_COOKIE['authname']) & isset($_COOKIE['authsurname']))){
            header("Location: ../pages/themepage.php");
        }
        else{
           header("Location: ../pages/guestthemepage.php"); 
        }
}
    