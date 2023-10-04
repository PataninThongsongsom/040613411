<?php session_start(); ?>

<html>
<body>
<h1>สวัสดี <?=$_SESSION["fullname"]?></h1>
<h2>สิทธิ์ <?=$_SESSION["pevi"]?></h2>
<table border="1">
    <tr>
        <th>product</th>
        <th>quantity</th>
    </tr>
    <?php
    include "./connect.php";
		$stmt = $pdo->prepare("SELECT * FROM product JOIN item ON product.pid = item.pid JOIN orders ON orders.ord_id = item.ord_id JOIN member ON member.username = orders.username WHERE member.username=? GROUP BY product.pname" );
		$stmt->bindParam(1, $_SESSION["username"]);
        $stmt->execute();
		while ($row = $stmt->fetch()) { 
	?>
		<tr>
            <td><?=$row["pname"]?></td>
            <td><?=$row["quantity"]?></td>
        </tr>
	<?php } ?>
</table>
หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a>
</body>
</html>
