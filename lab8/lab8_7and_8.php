<?php include "./php/connect.php" ?>
<html>
    <head><meta charset="utf-8"></head>
    <body>
        <?php
            $stmt = $pdo->prepare("INSERT INTO member VALUE ('',?,?,?,?,?,?)");
            $stmt->bindParam(1,$_POST["username"]);
            $stmt->bindParam(2,$_POST["password"]);
            $stmt->bindParam(3,$_POST["name"]);
            $stmt->bindParam(4,$_POST["address"]);
            $stmt->bindParam(5,$_POST["moblie"]);
            $stmt->bindParam(6,$_POST["email"]);
            if($stmt->execute()){
                header("location: ./lab8_5_2.php");
           } 
        ?>
    </body>
</html>