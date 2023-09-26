<?php
    include "./php/connect.php"; 
?>
<html>
    <head><meta charset="utf-8"></head>
    <body>
        <?php
            $stmt = $pdo->prepare("DELETE FROM member WHERE username=?");
            $stmt->bindParam(1,$_GET["username"]);
            if($stmt->execute()){
                 header("location: ./lab8_5_2.php");
            } 
        ?>
    </body>
</html>