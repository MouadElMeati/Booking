<?php
session_start();

if (!isset($_SESSION['reservation'])) {
    header("Location: index.php"); 
    exit();
}

