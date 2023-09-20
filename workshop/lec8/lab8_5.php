<?php include "./php/connect.php" ?>
<html>
    <head><meta charset="utf-8"></head>
    <body>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");
            if(!empty($_GET)){
                $value = '%' .$_GET["pid"]. '%';
            }
            $stmt->bindParam(1,$value);
            $stmt->execute();
            
        ?>
        <?php while($row = $stmt->fetch()){
        
        
        ?>
        <?php }?>
        
    </body>
</html>