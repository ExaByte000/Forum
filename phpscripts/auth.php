<?php
include "connect.php";
$email = '';
$password = '';
if(isset($_GET['auth'])){
    $email = $_GET['email'];
    $password = $_GET['password'];
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
    if ($result->fetch_assoc() != null){
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
        foreach ($result as $row){
            setcookie("authid", $row['idUser'], time() + 17000,'/');
            setcookie("authemail", $row['email'], time() + 17000,'/');
            setcookie("authname", $row['name'], time() + 17000,'/');
            setcookie("authsurname", $row['surname'], time() + 17000,'/');
            setcookie("authidrole", $row['idRole'], time() + 17000,'/');
        }
        header("Location: mainpage.php");


    }
    else{
        echo "<h3 style='margin-left: 41%; color: black'>Неверный логин или пароль</h3>";
    }
}