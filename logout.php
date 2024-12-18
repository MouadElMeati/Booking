<?php
session_start(); // Start the session

// Destroy all session data
session_destroy();

// Optionally, you can also unset specific session variables if needed
// unset($_SESSION['user_id']);
// unset($_SESSION['user_name']);
// unset($_SESSION['user_email']);

// Redirect to the home page or login page
header("Location: index.php");
exit();
?>