<?php
session_start();
if (isset($_SESSION['email'])) {
    
}
else{
    header("refresh:0; url=index.php");
}
?>