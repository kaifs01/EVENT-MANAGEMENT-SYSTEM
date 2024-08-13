<?php 
if (!session_id()) {
	session_start();
}
unset($_SESSION['id']);
header('Location: reg.php');
?>