<?php
function getValue($key) {
    if(isset($_POST[$key])) {
        $value = trim($_POST[$key]);
        $value = htmlspecialchars($value);
        return $value;
    } else {
        return "";
    }
}
session_start();

if (!((isset($_SESSION["username"]))&&(isset($_SESSION["password"])))){
    $_SESSION["username"] = "logged out";
    $_SESSION["password"] = "logged out";
    header("Location: index.html");
    exit();
}else{


$username = getValue("username");
$password = getValue("password");


$pdo = new PDO("mysql:host=localhost:8889;dbname=project","root","root");


$sql = "SELECT * FROM registration WHERE username = ?";
$statement = $pdo->prepare($sql);
$statement->execute([$username]);

$loginInfo = $statement->fetch();


if($loginInfo["username"] == $username){
    if(password_verify($password,$loginInfo["password"])){
        
        $_SESSION["username"]=$_POST['username'];
        $_SESSION["password"]=$_POST['password'];
        $_SESSION["status"] = $loginInfo['adminStatus'];
        $_SESSION["userStatus"] = True;
        header("Location: Home.php");
        exit();
            
    } else {
        require("index.html");
        echo "<h2>Password does not match Username</h2>";
    }
} else {
    require("index.html");
    echo "<h2>Username does not exist</h2>";
}

}
?>