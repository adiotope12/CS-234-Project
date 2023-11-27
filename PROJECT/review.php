<?php
session_start();

if (!((isset($_SESSION["username"]))&&(isset($_SESSION["password"])))){
    $_SESSION["username"] = "logged out";
    $_SESSION["password"] = "logged out";
    header("Location: index.html");
    
}

if($_SESSION['status']==1){
    echo "<a href = 'admin.php'><button>Admin</button></a><br>";
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel= stylesheet href ="Home.css">
        <title>Reviews</title>
    </head>
    <body>
        <header>
            <h1>Reviews</h1>
        </header><br>
        <main>
            <div id = createDiv>

            <h3>Rate me out of 5 stars!</h3>
            <h4>Also include some feedback on how great I am or how I could improve.</h4>

            <form action="finishedReview.php" method="Post">

                <label>Stars:</label><br><br>
                <input type="radio" name="stars" value ="1" id="1s"  required>
                <label for="1s">1 Star</label>

                <input type="radio" name="stars" value ="2" id="2s"  required>
                <label for="2s">2 Stars</label>

                <input type="radio" name="stars" value ="3" id="3s"  required>
                <label for="3s">3 Stars</label>

                <input type="radio" name="stars" value ="4" id="4s"  required>
                <label for="4s">4 Stars</label>

                <input type="radio" name="stars" value ="5" id="5s"  required>
                <label for="5s">5 Stars</label>
                <br><br>

                <label>Name:</label><br><br>
                <input type="text" name="name" id="name" placeholder = "Type Your Name Here" required><br><br>

                <label>Review:</label><br><br>
                <textarea name="review" id="password" placeholder = "Type Your Review Here" cols="100" rows="10" required></textarea><br><br>

                <input type="submit" name="Submit" id="submit" >
            </form>

            </div>
            <div id = buttons>
                <a href = "mailto:adio.tope12@gmail.com"><button>Contact Me</button></a><br>
                <a href = "Home.php"><button>Home</button></a><br>
                <a href = "logout.php"><button>Log Out</button></a>
            </div>
        </main>
        <div id = starDiv>
            <?php
            $pdo = new PDO("mysql:host=localhost:8889;dbname=project","root","root");
            $sql = "SELECT stars FROM reviews";
            $sum = 0;
            $count = 0;
            $avg = 0.0;

            $starInfo = $pdo->query($sql);

            foreach($starInfo as $person){
                $sum += $person['stars'];
                $count += 1;
            }

            $avg = $sum/$count;
            $avg = number_format((float) $avg, 1, '.', '');

            echo"<h1>Overall Rating:</h1>";
            for($i = 0; $i < $avg;++$i){
                echo"<img src =star.png rel=star width = 10px>";
            }
            echo"<h3>$avg Stars</h3>";
            ?>
        </div><br>
            <?php
            $pdo = new PDO("mysql:host=localhost:8889;dbname=project","root","root");
            $sql = "SELECT * FROM reviews";

            $reviewInfo = $pdo->query($sql);

            foreach($reviewInfo as $person){

                echo "<div id = reviewDiv>
                    <h1>{$person['realname']}</h1>
                    <h3>{$person['stars']} stars</h3><p>";

                for($i = 0; $i < $person['stars'];++$i){
                    echo"<img src =star.png rel=star width = 10px>";
                }

                echo"</p>
                <h4>{$person['date']}</h4>
                <p>{$person['review']}</p>
                </div>";
            }
            ?>
        <footer id = reviewFooter>
            2023 &copy; Tope Adio
        </footer>
    </body>
</html>