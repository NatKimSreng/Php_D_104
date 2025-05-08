<?php require("includes/header.php") ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <?php
                        include("db/connection.php");
                        
                        // Check if category_id is set in URL
                        if(isset($_GET['category_id'])) {
                            $category_id = $_GET['category_id'];
                            
                            // Complete the SQL query and prepare statement
                            $sql = "DELETE FROM category WHERE category_id = ?"; 
                            $stmt = $conn->prepare($sql);
                            
                            // Bind parameter
                            $stmt->bind_param("i", $category_id);
                            
                            // Execute and check result
                            if($stmt->execute()){
                                echo "<div class='alert alert-success'>Deleted successfully</div>";
                            } else {
                                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
                            }
                            
                            $stmt->close();
                        }
                        ?>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?php include_once("includes/footer.php"); ?>