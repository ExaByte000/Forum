<?php
if(isset($_GET['exit'])){
    unset($_COOKIE['authid']);
    setcookie('authid', null, -1, '/');
    unset($_COOKIE['authemail']);
    setcookie('authemail', null, -1, '/');
    unset($_COOKIE['authname']);
    setcookie('authname', null, -1, '/');
    unset($_COOKIE['authsurname']);
    setcookie('authsurname', null, -1, '/');
    unset($_COOKIE['authidrole']);
    setcookie('authidrole', null, -1, '/');
    unset($_COOKIE['idtheme']);
    setcookie('idtheme', null, -1, '/');
    header("Location:../index.php");
}
