<?php
session_start();
session_destroy(); // Clear session data
header("Location: index.php"); // Redirect to homepage
exit;
?>
