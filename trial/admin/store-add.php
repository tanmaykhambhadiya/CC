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
        }
    } else {
        $valid = 0;
        $error_message .= 'You must select an image.<br>';
    }

    // Insert into database if validation passes
    if ($valid == 1) {
        $statement = $pdo->prepare("INSERT INTO featured_products (title, description, price, image_url, is_featured) VALUES (?, ?, ?, ?, ?)");
        $statement->execute([
            $_POST['title'],
            $_POST['description'],
            $_POST['price'],
            $file_name,
            isset($_POST['is_featured']) ? 1 : 0
        ]);

        $success_message = 'Featured product added successfully!';
    }
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Add Featured Product</h1>
    </div>
    <div class="content-header-right">
        <a href="store.php" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">

            <!-- Display Success Message -->
            <?php if (!empty($success_message)): ?>
                <div class="alert alert-success">
                    <p><?php echo $success_message; ?></p>
                </div>
            <?php endif; ?>

            <!-- Display Error Message -->
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger">
                    <p><?php echo $error_message; ?></p>
                </div>
            <?php endif; ?>

            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Title <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="title" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Description <span>*</span></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="description" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Price <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="number" step="0.01" class="form-control" name="price" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Image <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="file" name="image" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Is Featured</label>
                            <div class="col-sm-6">
                                <input type="checkbox" name="is_featured">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-6">
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