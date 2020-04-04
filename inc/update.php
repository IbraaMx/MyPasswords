<?php
session_start();
if(isset($_SESSION['user'])) {
include 'connect.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$errors = array();
		$service = $_POST['service'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$id = $_POST['id'];
		
		if(empty($service)) {
			$errors[] = 'Service input can\'t be empty';
		}

		if(empty($email)) {
			$errors[] = 'Email input can\'t be empty';
		}

		if(empty($pass)) {
			$errors[] = 'Password input can\'t be empty';
		}

		if(empty($errors)) {
			$stmt = $con->prepare("UPDATE items SET service = ?, email = ?, password = ? WHERE id = ". $id ."");
			if($stmt->execute(array($service, $email, $pass))) {
				echo '<div class="alert alert-info" role="alert">Service has been updated</div>';
			}
		} else {
			
				echo '<div class="alert alert-warning" role="alert">';
					foreach ($errors as $err) {
						echo $err . "<br>";
					}
				echo '</div>';
			}
	}
}