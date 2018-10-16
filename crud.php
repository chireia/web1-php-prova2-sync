<?php
    session_start();
    require_once "connectDB.php";

    (isset($_REQUEST['action']) && !empty($_REQUEST['action']))? $action = $_REQUEST['action'] : exit("Algo deu errado aqui");
    
    $query = "";

    /********************************** LOGIN **********************************/
    if($action == 'login'){
        $user   =       $_POST['login'];
        $pw     =   md5($_POST['pw']);

        $query  = "SELECT * FROM users WHERE userLogin = '$user' AND userPw = '$pw'";

        $validate = mysqli_query($con, $query) or die("Erro no select");
        $row = mysqli_fetch_array($validate);

        if(mysqli_num_rows($validate) <= 0){
            $_SESSION['status'] = 'fail';
            header("location:index.php");
        }
        else {
            $_SESSION['status'] = 'sucess';
            $_SESSION['user']   = $row['userName'];
            $_SESSION['type']   = $row['userType'];
            header("location:index.php");
        }
    }

    /********************************** CREATE **********************************/
    if($action =='create'){
        
        $mname = $_POST['mname'];
        $mdesc = $_POST['mdesc'];
        $mdur = $_POST['mdur'];
        $mclassf = $_POST['mclassf'];
        $mgenre = $_POST['mgenre'];

        $query = "INSERT INTO movies(
                                movieName,
                                movieDesc, 
                                movieDuration, 
                                movieClassificationId, 
                                movieGenreId) 
                                VALUES ('$mname','$mdesc', $mdur, $mclassf, $mgenre)";

        $res = mysqli_query($con, $query);
        
        if($res){
            $_SESSION['insert']='sucess';
            header("location:create.php");
        }
        else {
            $_SESSION['insert']='fail';
            header("location:create.php");
        }   
    }
    
    /********************************** EDIT **********************************/
    if ($action == 'edit') {

        $mid        = $_POST['mid'];
        $mname      = $_POST['mname'];
        $mdesc      = $_POST['mdesc'];
        $mdur       = $_POST['mdur'];
        $mclassf    = $_POST['mclassf'];
        $mgenre     = $_POST['mgenre'];

        $query = 'UPDATE movies SET     movieName = "'.$mname.'",
                                        movieDesc =  "'.$mdesc.'",
                                        movieDuration = '.$mdur.',
                                        movieClassificationId = '.$mclassf.',
                                        movieGenreId = '.$mgenre.'
                                WHERE   movieId = '.$mid;

        

        $res = mysqli_query($con, $query);
 

        if($res){
            $_SESSION['update']='sucess';
            header("location:index.php");
        }
        else {
            $_SESSION['update']='fail';
            header("location:index.php");
        }  
    }

    /********************************** DELETE **********************************/
    if ($action == 'del') {
        $id = $_GET['id'];

        $query = "DELETE FROM movies WHERE movieId=$id";
        $res = mysqli_query($con, $query);
        
        if($res){
            $_SESSION['delete']='sucess';
            header("location:index.php");
        }
        else {
            $_SESSION['delete']='fail';
            header("location:index.php");
        } 
    }

    ?>