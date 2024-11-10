<?php
session_start();
// Destroy the session and redirect to the introduction page
session_unset();
session_destroy();
header('Location: Introduction.php');
exit();
?>
