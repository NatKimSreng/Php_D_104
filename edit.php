<?php require_once("includes/header.php"); ?>
<?php
include("db/connection.php");

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    // Fetch the category details
    $stmt = $conn->prepare("SELECT * FROM category WHERE category_id = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();

    if (!$category) {
        echo "Category not found.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update the category
    $category_name = $_POST['category_name'];
    $description = $_POST['description'];

    $update_stmt = $conn->prepare("UPDATE category SET category_name = ?, decription = ? WHERE category_id = ?");
    $update_stmt->bind_param("ssi", $category_name, $description, $category_id);

    if ($update_stmt->execute()) {
        echo "Category updated successfully.";
        exit;
    } else {
        echo "Error updating category.";
    }
}
?>

<div class="container">
    <h2>Edit Category</h2>
    <form method="POST">
        <div class="form-group">
            <label for="category_name">names</label>
            <input type="text" name="category_name" id="category_name" class="form-control" value="<?php echo htmlspecialchars($category['category_name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="description">email</label>
            <textarea name="description" id="description" class="form-control" required><?php echo htmlspecialchars($category['decription']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="users.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>