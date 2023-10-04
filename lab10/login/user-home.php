<?php session_start(); ?>

<html>
<body>
<h1>สวัสดี <?=$_SESSION["fullname"]?></h1>
<h2>สิทธิ์ <?=$_SESSION["pevi"]?></h2>
<table border="1">
        
        <tr id="tr1">
        
        </tr>

    <?php
    include "./connect.php";
		$stmt = $pdo->prepare("SELECT * FROM product JOIN item ON product.pid = item.pid JOIN orders ON orders.ord_id = item.ord_id JOIN member ON member.username = orders.username WHERE member.username=? GROUP BY product.pname" );
		$stmt->bindParam(1, $_SESSION["username"]);
        $stmt->execute();
        if($_SESSION["pevi"]==='member'){
		while ($row = $stmt->fetch()) { 
	?>
        <script> 
                let th1 =document.createElement("th");
                let th2 =document.createElement("th");
                let th3 =document.createElement("th");
                let tr1 =document.getElementById("tr1");
                th1.innerHTML = "Product";
                th2.innerHTML = "Quantity";
                tr1.appendChild(th1);
                tr1.appendChild(th2);
                </script>
		<tr>
            <td><?=$row["pname"]?></td>
            <td><?=$row["quantity"]?></td>
        </tr>
	<?php }}?>
    <?php 
        $stmt2 = $pdo->prepare("SELECT * FROM product JOIN item ON product.pid = item.pid JOIN orders ON orders.ord_id = item.ord_id JOIN member ON member.username = orders.username GROUP BY member.username,product.pname" );
        $stmt2->execute();
        if ($_SESSION["pevi"]==='admin') {
        while ($row2 = $stmt2->fetch()) { 
            ?>
                <script> 
                let th4 =document.createElement("th");
                let th5 =document.createElement("th");
                let th6 =document.createElement("th");
                let tr2 =document.getElementById("tr1");
                th4.innerHTML = "Username";
                th5.innerHTML = "Product";
                th6.innerHTML = "Quantity";
                tr2.appendChild(th4);
                tr2.appendChild(th5);
                tr2.appendChild(th6);  
            </script>
                <tr>
                    
                    <td><?=$row2["username"]?></td>
                    <td><?=$row2["pname"]?></td>
                    <td><?=$row2["quantity"]?></td>
                </tr>
            <?php } }
    ?>
</table>
หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a>
</body>
</html>
