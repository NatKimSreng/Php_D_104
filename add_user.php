<?php require_once("includes/header.php"); ?>

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Add User</h5>
          </div>
          <div class="card-body">
            <?php 
            require_once("db/connection.php");
            

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $category_name = $_POST['username'];
                $decription = $_POST['email'];
                
                // Prepare and bind
                $stmt = $conn->prepare("INSERT INTO category (category_name, decription) VALUES (?, ?)");
                $stmt->bind_param("ss", $category_name, $decription);
                
                // Execute the statement
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>User added successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
                }
                
                // Close the statement
                $stmt->close();
            }
            ?>
            <form class="row g-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" required>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
              </div>
              <div class="col-12 mt-2">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <a href="users.php" class="btn btn-danger">Back to User List</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once("includes/footer.php"); ?>