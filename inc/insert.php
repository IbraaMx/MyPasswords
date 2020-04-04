<?php
session_start();
if(isset($_SESSION['user'])) {
		include 'connect.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$errors = array();
		$serv = $_POST['service'];
		$mail = $_POST['email'];
		$pass = $_POST['password'];

		if(empty($serv)) {
			$errors[] = "Service field is required";
		}

		if(empty($mail)) {
			$errors[] = "Email field is required";
		}

		if(empty($pass)) {
			$errors[] = "Password field is required";
		}

		if(empty($errors)) {

			$stmt = $con->prepare("INSERT INTO items (service, email, password) VALUES(?, ?, ?)");
			if($stmt->execute(array($serv, $mail, $pass))) {
				echo '<div class="alert alert-info" role="alert">Service has been registred</div>';
			} else {
				echo '<div class="alert alert-warning" role="alert>filed to submit new service</div>';
			}

		}

		if(!empty($errors)) {
			echo '<div class="alert alert-danger" role="alert">';
			foreach($errors as $err) {
				echo $err . '<br>';
			}
			echo '</div>';
		}

	}
}