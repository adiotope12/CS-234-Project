<?php
session_start();

if (!((isset($_SESSION["username"]))&&(isset($_SESSION["password"])))){
    $_SESSION["username"] = "logged out";
    $_SESSION["password"] = "logged out";
    header("Location: index.html");
    
}

$pdo = new PDO("mysql:host=localhost:8889;dbname=project","root","root");

$sql = "SHOW TABLES";
$tables = $pdo->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel= stylesheet href ="Home.css">
        <title>Admin</title>
    </head>
    <body>
        <header>
            <h1>Admin Operations</h1>
        </header><br>
        <main>
            <div id = createDiv>
                <p id=bio>Welcome Admin, use the space below to mangage the website's database.</p>

                <h4>Current Tables:</h4>
                <?php

                foreach($tables as $table){
                    echo "<p>$table[0]</p>";
                }

                ?>
                <form action="adminFunction.php" method="Post">

                <label><h4>Operation:</h4></label>
                <textarea name="operation" id="operation" placeholder = "Type Your Operation Here" cols="100" rows="10" required></textarea><br><br>

                <input type="submit" name="Submit" id="submit" >
            </form>

            </div>
            <div id = buttons>
                <a href = "mailto:adio.tope12@gmail.com"><button>Contact Me</button></a><br>
                <a href = "Home.php"><button>Home</button></a><br>
                <a href = "review.php"><button>Reviews</button></a><br>
                <a href = "logout.php"><button>Log Out</button></a><br>
            </div>
        </main>
            <div id = starDiv>
                <?php
                $pdo = new PDO("mysql:host=localhost:8889;dbname=project","root","root");
                $sql = "SELECT * FROM admin";
                $admin = $pdo->query($sql);
                
                
                foreach ($admin as $operation){
                    echo"<h5>$operation[username], $operation[date]</h5>
                    <p>$operation[operation]</p>";
                }
                ?>
            </div>

        <footer id =reviewFooter>
            2023 &copy; Tope Adio
        </footer>
    </body>
</html>