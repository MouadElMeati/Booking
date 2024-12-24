<?php 
session_start();
if($_SESSION['admin-name'] == ''){
    header('location: index.php');
}

?>