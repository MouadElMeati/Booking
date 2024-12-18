<?php 

function LoginAdmin() {
    session_start();
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        header('location:index.php');
        exit();
    }
    session_regenerate_id(true);
}
?>
