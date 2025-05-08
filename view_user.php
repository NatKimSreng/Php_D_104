<?php require("includes/header.php") ?>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Users</h5>
              </div>
              <div class="card-body">
                <?php
                    require_once("db/connection.php");
                    $user_id = $_GET["user_id"];
                    if($user_id){
                        $sql = "SELECT users.id, users.username, users.email, users.photo, users.phone, 
                        users.created_at, users.updated_at, roles.role_name FROM users 
                        LEFT JOIN roles ON users.role_id = roles.id WHERE users.id = '$user_id'";
                        $result = $con->query($sql);
                        $i =1;
                        $row = $result->fetch_assoc();
                    }
                ?>
                <div><?php echo $row["username"] ?></div>
                <div><?php echo $row["email"] ?></div>
                <div><?php echo $row["role_name"] ?></div>
                <div><?php echo $row["phone"] ?></div>
                <div><?php echo $row["created_at"] ?></div>
                <div><?php echo $row["updated_at"] ?></div>
                <a href="users.php" class="btn btn-danger">Back to User List</a>     
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once("includes/footer.php"); ?>
  <?php include_once("includes/footer.php"); ?>
  <?php include_once("includes/footer.php"); ?>
