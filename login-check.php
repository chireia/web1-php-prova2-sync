<?php
session_start();
    include "connectDB.php";
    
    $user = $_POST['login'];
    $pw = md5($_POST['pw']);
    $entrar = $_POST['entrar'];

    if(isset($entrar)){
        $validate = mysqli_query($con, "SELECT * FROM users WHERE userLogin = '$user' AND userPw = '$pw'") or die("Erro");
        $row = mysqli_fetch_array($validate);

        if(mysqli_num_rows($validate) <= 0){
            $_SESSION['status'] = 'fail';
            header("location:index.php");
        }
        else {
            $_SESSION['status'] = 'sucess';
            $_SESSION['user'] = $row['userName'];
            $_SESSION['type'] = $row['userType'];

            header("location:index.php");
        }
    }

    
    
?>