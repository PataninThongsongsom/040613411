<?php
  $chk = $_GET["language"];
  if($chk === 'th'){
    setcookie("lang","th",time()+3600*24*1);
  }else{
    setcookie("lang","en",time()+3600*24*1);
  }
  header("location: ./main.php");
?>

<html>
    <body>
        <form action="./select.php" method="get">
           
            <select name="language" required>
                <option value="">--Please choose an option--</option>
                <option value="th">th</option>
                <option value="en">en</option>
            </select>
                <input type="submit" value="submit">
        </form>
    </body>
</html>