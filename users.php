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
                <a href="add_user.php" class="btn btn-primary mb-2">Add User</a>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Details</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include("db/connection.php");

                        $stmt = $conn ->prepare(("SELECT * FROM category"));
                        if($stmt->execute()){
                            $result = $stmt->get_result();
                            $i=1;
                            while($row = $result->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>" . $i++ . "</td>";
                                echo "<td>" .($row['category_name']) . "</td>";
                                echo "<td>" .($row['decription']) . "</td>";
                                echo"<td>
                                <a href='detail_user.php?category_id=".$row['category_id']."'
                                class ='btn btn-primary'>Detail</a>
                                </td>";
                                echo "<td>
                                <a href='edit.php?category_id=".$row['category_id']."'
                                class ='btn btn-success'>Edit</a>
                                </td>";
                                echo "<td>
                                <a href='delete.php?action=delete&category_id=".$row['category_id']."'
                                class ='btn btn-danger' onclick=\"return confirm('are you for real bro?');\" >Delete</a>
                                </td>";
                            }
                        }
                       ?>    
                    </tbody>
                </table>
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
  <?php
$sql = "DELETE FROM category WHERE category_id = ?";
$stmt = $conn->prepare($sql);
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $category_id = $_GET['category_id'];
    $stmt->bind_param("i", $category_id);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>User deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }
    $stmt->close();
}
  ?>
  <!-- /.content-wrapper -->

  <?php include_once("includes/footer.php"); ?>