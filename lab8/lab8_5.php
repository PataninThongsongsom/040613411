<?php include "./php/connect.php" ?>
<html>
    <head><meta charset="utf-8"></head>
    <body>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");
            if(!empty($_GET)){
                $value = '%' .$_GET["username"]. '%';
            }
            $stmt->bindParam(1,$value);
            $stmt->execute();
            $row = $stmt->fetch()
        ?>
        
            <?=$row["name"]?><br>
            <?=$row["address"]?><br>
            <?=$row["mobile"]?><br>
            <?=$row["email"]?><br>
        
        
    </body>
</html>