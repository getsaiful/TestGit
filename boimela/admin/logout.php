<?php
session_start();
session_unset("uid");
session_unset("uname");
session_destroy();
setcookie("GZL_Cookie", "", time()-86400);

header("Location: index.php");
?>