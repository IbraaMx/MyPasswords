<?php
	session_start();
	if(isset($_SESSION['user']) && isset($_POST['id']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
		include 'connect.php';
		$msg = '';
		$id = $_POST['id'];
		$stmt = $con->prepare('SELECT id FROM items WHERE id = '.$id.'');
		$stmt->execute();
		$rw = $stmt->rowCount();
		if($rw > 0) {
			$stmt = $con->prepare('DELETE FROM items WHERE id = '.$id.'');
			$stmt->execute();
			echo $msg = '
				<div class="alert alert-success" role="alert">
				  <div class="container">
				    Service Successfully deleted
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				      <span aria-hidden="true">
				        <i class="fas fa-times"></i>
				      </span>
				    </button>
				  </div>
				</div>
			';
		} else {
			echo $msg = '
				<div class="alert alert-danger" role="alert">
				  <div class="container">
				    Couldn\'t find service id in database try to reload page
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				      <span aria-hidden="true">
				        <i class="fas fa-times"></i>
				      </span>
				    </button>
				  </div>
				</div>
			';
		}



	}