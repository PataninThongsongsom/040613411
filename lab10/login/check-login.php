<?php
  include "connect.php";
  
  session_start();

  $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ? AND password = ?");
  //$stmt = $pdo->prepare("SELECT * FROM product JOIN item ON product.pid = item.pid JOIN orders ON orders.ord_id = item.ord_id JOIN member ON member.username = orders.username  WHERE member.username= ? AND member.password=? ");
  $stmt->bindParam(1, $_POST["username"]);
  $stmt->bindParam(2, $_POST["password"]);
  $stmt->execute();
  $row = $stmt->fetch();
  
  // หาก username และ password ตรงกัน จะมีข้อมูลในตัวแปร $row
  if (!empty($row)) { 
    // นำข้อมูลผู้ใช้จากฐานข้อมูลเขียนลง session 2 ค่า
    $_SESSION["fullname"] = $row["name"];   
    $_SESSION["username"] = $row["username"];
    $_SESSION["password"] = $row["password"];
    $_SESSION["pevi"] = $row["pevi"];
    // แสดง link เพื่อไปยังหน้าต่อไปหลังจากตรวจสอบสำเร็จแล้ว
    echo "เข้าสู่ระบบสำเร็จ<br>";
    echo "<a href='user-home.php'>ไปยังหน้าหลักของผู้ใช้</a>"; 

  // กรณี username และ password ไม่ตรงกัน
  } else {
    echo "ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
    echo "<a href='login-form.php'>เข้าสู่ระบบอีกครัง</a>"; 
  }
  
?>
