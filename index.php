<?php 
$pageTitle = 'Home';
include "inc/core.php";
if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<div class="header">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <h1>Welcome <?php echo $_SESSION['user'] ?></h1>
              <p>To Your Passwords List</p>
          </div>
          <div class="col-md-6">
              <ul>
                  <li><a href="#" data-toggle="modal" data-target="#addModal">New Service</a></li>
                  <li><a href="logout.php?user=<?php echo $_SESSION['user'] ?>">Logout</a></li>
              </ul>
              <div class="alert"></div>
          </div>
      </div>
  </div>
</div>

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Service</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    <?php
      $stmt = $con->prepare("SELECT * FROM items ORDER BY id DESC");
      $stmt->execute();
      $id = 1;
      foreach($stmt->fetchAll() as $res) { ?>
        <tr>
        <th scope="row"><?php echo $id ?></th>
        <td><?php echo $res['service'] ?></td>
        <td><?php echo $res['email'] ?></td>
        <td><?php echo $res['password'] ?></td>
        <td>
          <button type="button" class="btn btn-info btn-sm btn-icon btn-round edit" data-toggle="modal" data-target="#editModal" id="<?php echo $res['id'] ?>" style="margin: 0"><i class="fas fa-pen-square"></i></button>
          <button type="button" class="btn btn-danger btn-sm btn-icon btn-round delete" id="<?php echo $res['id'] ?>" style="margin: 0"><i class="fas fa-trash"></i></button>
        </td>
      </tr>
    <?php $id++; } ?>

  </tbody>
</table>



<!-- Modals -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="insertResult"></div>

        <form action="inc/insert.php" method="POST" id="insertForm">

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-bullhorn"></i></div>
                </div>
                <input type="text" class="form-control" name="service" autocomplete="off" placeholder="Service">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-envelope-open-text"></i></div>
                </div>
                <input type="text" class="form-control" name="email" autocomplete="off" placeholder="Email">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-unlock"></i></div>
                </div>
                <input type="text" class="form-control" name="password" autocomplete="off" placeholder="Password">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Service</button>
            </div>

        </form>



      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="updateResult"></div>

        <form action="inc/update.php" method="POST" id="updateForm">

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-bullhorn"></i></div>
                </div>
                <input type="text" class="form-control" name="service" id="service" autocomplete="off" placeholder="Service">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-envelope-open-text"></i></div>
                </div>
                <input type="text" class="form-control" name="email" id="email" autocomplete="off" placeholder="Email">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-unlock"></i></div>
                </div>
                <input type="text" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password">
            </div>
            <input type="hidden" class="form-control" name="id" id="id" autocomplete="off" placeholder="serviceID">
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php" ?>