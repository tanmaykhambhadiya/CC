<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {
    $valid = 1;
    $error_message = '';
    $success_message = '';

    // Validate required fields
    if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['price'])) {
        $valid = 0;
        $error_message .= 'Title, Description, and Price cannot be empty.<br>';
    }

    // Handle image upload
    $path = $_FILES['image']['name'];
    $path_tmp = $_FILES['image']['tmp_name'];
    $file_name = '';

    if ($path != '') {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = 'featured-product-' . time() . '.' . $ext;

        // Check for valid image extensions
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
            $valid = 0;
            $error_message .= 'You must upload a valid image file (jpg, jpeg, png, gif).<br>';
        } else {
            move_uploaded_file($path_tmp, '../uploads/featured-products/' . $file_name);

            // Delete the old image if a new one is uploaded
            if (!empty($_POST['current_image']) && file_exists('../uploads/featured-products/' . $_POST['current_image'])) {
                unlink('../uploads/featured-products/' . $_POST['current_image']);
            }
        }
    } else {
        $file_name = $_POST['current_image']; // Keep the current image if no new image is uploaded
    }

    // Update the record if validation passes
    if ($valid == 1) {
        $statement = $pdo->prepare("UPDATE featured_products SET title=?, description=?, price=?, image_url=?, is_featured=? WHERE id=?");
        $statement->execute([
            $_POST['title'],
            $_POST['description'],
            $_POST['price'],
            $file_name,
            isset($_POST['is_featured']) ? 1 : 0,
            $_REQUEST['id']
        ]);

        $success_message = 'Featured product updated successfully!';
    }
}

// Check if the ID is valid and fetch the existing data
if (!isset($_REQUEST['id'])) {
    header('location: store.php');
    exit;
} else {
    $statement = $pdo->prepare("SELECT * FROM featured_products WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $total = $statement->rowCount();
    if ($total == 0) {
        header('location: store.php');
        exit;
    }
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $title = $result['title'];
    $description = $result['description'];
    $price = $result['price'];
    $image_url = $result['image_url'];
    $is_featured = $result['is_featured'];
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Edit Featured Product</h1>
    </div>
    <div class="content-header-right">
        <a href="store.php" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">

            <!-- Display Error Message -->
            <?php if (!empty($error_message)): ?>
                <div class="callout callout-danger">
                    <p><?php echo $error_message; ?></p>
                </div>
            <?php endif; ?>

            <!-- Display Success Message -->
            <?php if (!empty($success_message)): ?>
                <div class="callout callout-success">
                    <p><?php echo $success_message; ?></p>
                </div>
            <?php endif; ?>

            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($image_url); ?>">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Title <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Description <span>*</span></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="description" rows="5" required><?php echo htmlspecialchars($description); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Price <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="number" step="0.01" class="form-control" name="price" value="<?php echo htmlspecialchars($price); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-6">
                                <input type="file" name="image">
                                <?php if (!empty($image_url)): ?>
                                    <img src="../uploads/featured-products/<?php echo htmlspecialchars($image_url); ?>" alt="Product Image" style="width:150px; margin-top:10px;">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Is Featured</label>
                            <div class="col-sm-6">
                                <input type="checkbox" name="is_featured" <?php echo $is_featured ? 'checked' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>