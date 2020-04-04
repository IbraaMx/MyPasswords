<?php
session_start();
if(isset($_SESSION['user'])) {
	include 'connect.php';	
	if(isset($_POST['id'])) {
		$stmt = $con->prepare("SELECT * FROM items WHERE id = ".$_POST['id']."");
		$stmt->execute();
		$res = $stmt->fetch(PDO::FETCH_ASSOC);
		echo json_encode($res);
	}
}
?>