<?php
session_start();
session_destroy();

setcookie('cid',$id,time()-(86400*360),'/');
setcookie('cnama',$nama,time()-(86400*360),'/');
setcookie('clevel',$level,time()-(86400*360),'/');
setcookie('cuser',$user,time()-(86400*360),'/');
?>

<script>
    document.location="login.php";
</script>