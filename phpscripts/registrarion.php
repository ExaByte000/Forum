<?php
include 'connect.php';
if (isset($_GET['registration'])){
    $emailform = $_GET['email'];
    $nameform = $_GET['name'];
    $surnameform = $_GET['surname'];
    $passwordform = $_GET['password'];
    $idroleform = 2;
    $idbanform = 1;

    $email = '"'.$mysqli->real_escape_string($emailform).'"';
    $name = '"'.$mysqli->real_escape_string($nameform).'"';
    $surname = '"'.$mysqli->real_escape_string($surnameform).'"';
    $password = '"'.$mysqli->real_escape_string($passwordform).'"';
    $idrole = '"'.$mysqli->real_escape_string($idroleform).'"';
    $idban = '"'.$mysqli->real_escape_string($idbanform).'"';

    $query = "INSERT INTO users(email, name, surname, password, idRole, idBan) VALUES ($email, $name, $surname, $password, $idrole, $idban)";
    $res = $mysqli->query("SELECT * FROM users WHERE email = '$emailform' AND password = '$passwordform'");
    $ins = array();
    foreach ($res as $row){
        $ins += $row;
    }
        if ($emailform == "" | $nameform == "" | $surnameform == "" | $passwordform == ""){
            echo "<h3 style='margin-left: -7%;'>Все поля являются обязательными</h3>";
        }
        elseif (count($ins) != 0){
            echo "<h3 style='margin-left: -7%;'>Такие логин и пароль уже существуют.<br/> Смените логин или пароль</h3>";
        }
        else{
            $result = $mysqli->query($query);
            if ($result){
                header("Location:authpage.php");
            }
            else{
                echo "Что-то пошло не по плану";
            }
        }



}
