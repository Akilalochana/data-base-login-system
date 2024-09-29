<?php
if(isset($_POST["submit"])){                  //url eka gahala ynn login.inc.php ekat ynn bh "submit" button eka oblma ynn one

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


     $emptyInput = emptyInputSingup($name, $email, $username, $pwd, $pwdRepeat);

     $invalidUid = invalidUid($username);
     $invalidEmail = invalidEmail($email);
     $pwdMatch = pwdMatch($pwd, $pwdRepeat);
     $uidExists = uidExists($conn, $username, $email);


    if( $emptyInput !==false){
        header("Location:../signup.php?error=emptyinput");  
        exit();
    }

    if( $invalidUid !==false){
        header("Location:../signup.php?error=invalidUid");  
        exit();
    }

    if( $invalidEmail !==false){
        header("Location:../signup.php?error=invalidEmail");  
        exit();
    }

    if( $pwdMatch !==false){
        header("Location:../signup.php?error=passworddontMach");  
        exit();
    }

    if( $uidExists !==false){
        header("Location:../signup.php?error=usernamAlredyTaken");  
        exit();
    }


    createUser($conn, $name, $email, $username, $pwd);

}
else{
    header('Location:../login.php');
}