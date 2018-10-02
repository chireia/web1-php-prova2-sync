<?php
    session_start();
    include "header.php";
    include "connectDB.php";

    $_SESSION['status']=='sucess'? true : header("location:login.php");
    
    echo "logado";


    include "footer.php"
?>
<title>NextFlix - Home</title>