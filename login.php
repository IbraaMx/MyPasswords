<?php 
$pageTitle = 'Login';
include "inc/core.php";
    if(isset($_SESSION['user'])) {
        header("Location: index.php");
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $errors = array();
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $secure = md5($pass);

        if(empty($user)) {
            $errors[] = "You can't let username empty";
        }

        if(empty($pass)) {
            $errors[] = "You can't let password empty";
        }

        if(empty($errors)) {

            $stmt = $con->prepare("SELECT username, password FROM account WHERE username = ? AND password = ?");
            $stmt->execute(array($user, $secure));
            $check = $stmt->rowCount();

            if($check > 0) {
                $_SESSION['user'] = $user;
                header('Location: index.php');
            } else {
                $errors[] = "Incorrect Information";
            }

        }

    }

?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="login">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-user-circle"></i></div>
                </div>
                    <input type="text" class="form-control" name="username" autocomplete="off" placeholder="Username">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-key"></i></div>
                </div>
                    <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Password">
            </div>

            <?php if(!empty($errors)) {
                echo '<div class="alert alert-danger" role="alert">';
                foreach($errors as $err) {
                    echo $err . '<br>';
                }
                echo '</div>';
            }
            ?>
            <button type="submit" class="btn btn-info btn-block">Login</button>
        </form>

<?php include "footer.php" ?>