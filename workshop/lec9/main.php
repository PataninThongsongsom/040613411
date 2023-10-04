<?php
    $ckk = $_COOKIE["lang"];
    if($ckk === 'en'){
        echo "welcome";
    }else{
        echo "ยินดีต้อนรับ";
    }
    setcookie("lang"," ",time()+3600*24*1);
?>
   