<?php include './php/connect.php';

    $stmt=$pdo->prepare("UPDATE member SET username=?,password=?,name=?,Address=?,mobile=?,email=? WHERE id=?");
    $stmt->bindParam(1,$_POST["username"]);
    $stmt->bindParam(2,$_POST["password"]);
    $stmt->bindParam(3,$_POST["name"]);
    $stmt->bindParam(4,$_POST["address"]);
    $stmt->bindParam(5,$_POST["moblie"]);
    $stmt->bindParam(6,$_POST["email"]);
    $stmt->bindParam(7,$_POST["id"]);
    if($stmt->execute()){
        echo "แก้ไข รายละเอียดของ ".$_POST["username"]. " สำเร็จ";
   }


?>