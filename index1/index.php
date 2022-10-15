<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>index1</title>
    </head>
    <body>
        <?php
        function insert($username, $pass){
            require("../db.php");
            $stm = $conn->prepare("INSERT INTO `users` (`username`, `pass`) VALUES (:username, :pass)");
            $username = $_POST['username'];
            $pass = $_POST['pass'];
            $stm->bindValue(':username', $username);
            $stm->bindValue(':pass', $pass);
            $stm->execute();
        }
        function check($username , $pass){
            require("../db.php");
            $username = $_POST['username'];
            $stm = $conn->prepare("SELECT * FROM `users` where username='$username'");
            $stm->execute();
            if ($stm->rowCount() > 0) {
                while ($row = $stm->fetch(PDO::FETCH_NAMED)) {
                    if ($pass = $row['pass']) {
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                        return true;
                    }
                }
            }else {
                return false;
            }
        }
        if (isset($_POST) && !empty($_POST['username']) && !empty($_POST['pass'])) {

            if (check($_POST['username'],$_POST['pass'])) {
                header("Location: ../index.php");
            }else {
                insert($_POST['username'],$_POST['pass']);
                echo "<div style='color:#fff;'>saved...login now :)</div>";
            }
            
            
            
        }
        ?>
        <form action="" method="POST">
        <div class="container">
            <h2>الدخول الى الدردشات </h2>
            <input type="text" name="username" placeholder="اسم المستخدم" data-holder="اسم المستخدم">
            <input type="password" name="pass" placeholder="كلمة السر" data-holder="كلمة السر">
            <button type="submit" name="send">دخول</button>
        </div>
        </form>

        <script src="js/main.js"></script>
    </body>
</html>