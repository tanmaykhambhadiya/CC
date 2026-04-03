<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {
    $valid = 1;
    $error_message = '';

    // Validate Name
    if (empty($_POST['name'])) {
        $valid = 0;
        $error_message .= 'Name cannot be empty.<br>';
    }

    // Validate Current Price
    if (empty($_POST['current_price'])) {
        $valid = 0;
        $error_message .= 'Current Price cannot be empty.<br>';
    }

    // Validate Image Upload
    $path1 = $_FILES['image1']['name'];
    $path_tmp1 = $_FILES['image1']['tmp_name'];

    if ($path1 == '') {
        $valid = 0;
        $error_message .= 'You must select an image.<br>';
    } else {
        $ext1 = pathinfo($path1, PATHINFO_EXTENSION);
        if (!in_array($ext1, ['jpg', 'jpeg', 'png', 'gif'])) {
            $valid = 0;
            $error_message .= 'You must upload a valid image file (jpg, jpeg, png, gif).<br>';
        }
    }

    if ($valid == 1) {
        // Upload the image
        $final_name1 = 'product1-' . time() . '.' . $ext1;
        move_uploaded_file($path_tmp1, '../assets/uploads/products/' . $final_name1);

        // Insert into database
        $statement = $pdo->prepare("INSERT INTO tbl_featured_products (name, current_price, image1, description) VALUES (?, ?, ?, ?)");
        $statement->execute([$_POST['name'], $_POST['current_price'], $final_name1, $_POST['description']]);

        $success_message = 'Product is added successfully!';
    }
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Add Product</h1>
    </div>
    <div class="content-header-right">
        <a href="featured-products.php" class="btn btn-primary btn-sm">View All</a>
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
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Name <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Current Price <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="current_price" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Image <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="file" name="image1" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="description"></textarea>
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