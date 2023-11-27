<?php
session_start();
if (!((isset($_SESSION["username"]))&&(isset($_SESSION["password"])))){
    require("index.html");
    $_SESSION["username"] = "logged out";
    $_SESSION["password"] = "logged out";
    exit();
}
                
$pdo = new PDO("mysql:host=localhost:8889;dbname=project","root","root");
$sql = $_POST['operation'];

$sql = "INSERT INTO admin (username,operation) VALUES(?,?)";
$statement = $pdo->prepare($sql);
$statement->execute([$_SESSION['username'],$_POST['operation']]);

$sql ="SELECT operation FROM admin";
$lastOperation = $pdo->query($sql);

$valid = False;

while (($lastOperation->fetch())){
    $row = $lastOperation->fetch();
}


if ($row['operation'] == $_POST['operation']){
    $valid = true;
}


if ($valid){
    echo"Your operation went through";
    require("admin.php");
} else {
    echo "Please try again";
    require("admin.php");
}




?>
