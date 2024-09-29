<?php

function emptyInputLogin($username, $pwd) {
    if (empty($username) || empty($pwd)) {
        // Redirect back with an error message or handle the error
        header("Location: ../login.php?error=emptyinput");
        return true;
    }
    return false;
}

function LoginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);
    if($uidExists === false){
        header("Location:../signup.php?erroe=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header('Location:../signup.php?error=worninglogin');
        exit();

    }else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("Location:../index.php")
        exit();
    }
}



function  emptyInputSingup($name, $email, $username, $pwd, $pwdRepeat){
   $results ;
   if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
    $results = true;

   } else{
    $results = false;

   }
   return $results;
}


function  invalidUid($username){
    $results ;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
     $results = true;
 
    } else{
     $results = false;
 
    }
    return $results;
 }

 function  invalidEmail($email){
    $results ;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $results = true;
 
    } else{
     $results = false;
 
    }
    return $results;
 }


 function  pwdMatch($pwd, $pwdRepeat){
    $results ;
    if($pwd !== $pwdRepeat) {
     $results = true;
 
    } else{
     $results = false;
 
    }
    return $results;
 }

 function uidExists($conn, $username, $email){
  
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../signup.php?error=stmtfailed");
        exit;
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
 }



 function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../signup.php?error=stmtfailed");
        exit;
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../signup.php?error=none");
    exit();

 }