<?php
if(isset($_POST["submit"])){                  //url eka gahala ynn login.inc.php ekat ynn bh "submit" button eka oblma ynn one

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username, $pwd) !==false){
        exit();
    }

    LoginUser($conn, $username, $pwd);

}
else{
    header('Location:../login.php');
    exit();
}