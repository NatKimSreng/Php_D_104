<?php require("includes/header.php") ?>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Detail</h5>
              </div>
              <div class="card-body">
                <?php
                include("db/connection.php");

                if (isset($_GET['category_id'])) {
                    $category_id = $_GET['category_id'];

                    $stmt = $conn->prepare("SELECT * FROM category WHERE category_id = ?");
                    $stmt->bind_param("i", $category_id);
                    if($stmt->execute()){
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo "<p>Category ID: " . htmlspecialchars($row['category_id']) . "</p>";
                            echo "<p>Username: " . htmlspecialchars($row['category_name']) . "</p>";
                            echo "<p>Email: " . htmlspecialchars($row['decription']) . "</p>";
                        } else 
                        {
                            echo "<div class='alert alert-danger'>No user found with this ID.</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
                    }
                }
                ?>
                <div class="mt-2">
                  <a href="users.php" class="btn btn-danger">Back to User List</a>
                </div>
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