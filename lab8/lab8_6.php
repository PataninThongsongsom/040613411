<?php
    include "./php/connect.php"; 
?>
<html>
    <head><meta charset="utf-8"></head>
    <body>
        <?php
            $stmt = $pdo->prepare("DELETE FROM member WHERE username=?");
            $stmt->bindParam(1,$_POST["username"]);
            if($stmt->execute()){
                echo "ลบสำเร็จ";
                header("location: ./lab8_5_2.php");
            } 
        ?>
    </body>
</html>