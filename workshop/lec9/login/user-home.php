<?php session_start(); ?>

<html>
<body>
<h1>สวัสดี <?=$_SESSION["fullname"]?></h1>
<h2>สิทธิ์ <?=$_SESSION["pevi"]?></h2>
<?php
		$stmt = $pdo->prepare("SELECT * FROM product JOIN item ON product.pid = item.pid JOIN orders ON orders.ord_id = item.ord_id JOIN member ON member.username = orders.username WHERE member.username= ? AND member.password=?");
		$stmt->execute();
		while ($row = $stmt->fetch()) { 
	?>
		<div style="padding: 15px; text-align: center">
			<h3>
                <?=$row["pname"] ?><br>
                <?=$row["quantity"] ?>
            </h3>
		</div>
	<?php } ?>
หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a>
</body>
</html>
