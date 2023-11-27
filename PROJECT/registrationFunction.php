<?php

function checkUsername($username){
    global $pdo;

    $sql = "SELECT username FROM registration WHERE username = ? ";

    $statement = $pdo->prepare($sql);
    $statement->execute([$username]);

    if ((strlen($username)<6)||(strlen($username)>12)||(strtolower($username) == strtolower($statement->fetch()["username"]))){
        require ("registration.html");
        echo "<h2>Invalid Username</h2>";
        return false;
    } else {
        return true;
    }
}

function checkPassword($password){
    if ((strlen($password)<6)||(strlen($password)>12)||($password == strtolower($password))||(!(preg_match('~[0-9]+~', $password)))||(is_numeric($password))){
        require ("registration.html");
        echo "<h2>Invalid Password</h2>";
        return false;
    } else {
        return true;
    }
}


session_start();
if (!((isset($_POST["username"]))&&(isset($_POST["password"])))){
    $_SESSION["username"] = "logged out";
    $_SESSION["password"] = "logged out";
    header("Location: index.html");
}else{

$username = $_POST["username"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$goodInputs = False;
$pdo = new PDO("mysql:host=localhost:8889;dbname=project","root","root");

if($password !== $password2){
    require("registration.html");
    echo "<h2>Passwords Don't Match</h2>";
    
    
} else if ((checkUsername($username))&&(checkPassword($password))){
    $goodInputs = true;
}

if($goodInputs == true){
    $pwdHashed = password_hash($password,PASSWORD_BCRYPT);
    
    $sql = "INSERT IGNORE INTO registration(username,password) VALUES(?,?)";

    $statement = $pdo->prepare($sql);
    $statement->execute([$username,$pwdHashed]);

    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;

    require ("Home.php");

}
}
?>