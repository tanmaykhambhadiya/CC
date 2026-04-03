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
        $error_message .= 'Price cannot be empty.<br>';
    }

    // Validate Image Upload
    $path1 = $_FILES['image1']['name'];
    $path_tmp1 = $_FILES['image1']['tmp_name'];

    if ($path1 != '') {
        $ext1 = pathinfo($path1, PATHINFO_EXTENSION);
        if (!in_array($ext1, ['jpg', 'jpeg', 'png', 'gif'])) {
            $valid = 0;
            $error_message .= 'You must upload a valid image file (jpg, jpeg, png, gif).<br>';
        }
    }

    if ($valid == 1) {
        if ($path1 == '') {
            // Update without changing the image
            $statement = $pdo->prepare("UPDATE tbl_featured_products SET name=?, current_price=?, description=? WHERE id=?");
            $statement->execute([$_POST['name'], $_POST['current_price'], $_POST['description'], $_REQUEST['id']]);
        } else {
            // Remove the old image
            unlink('../assets/uploads/products/' . $_POST['current_image1']);

            // Upload the new image
            $final_name1 = 'product1-' . time() . '.' . $ext1;
            move_uploaded_file($path_tmp1, '../assets/uploads/products/' . $final_name1);

            // Update with the new image
            $statement = $pdo->prepare("UPDATE tbl_featured_products SET name=?, current_price=?, image1=?, description=? WHERE id=?");
            $statement->execute([$_POST['name'], $_POST['current_price'], $final_name1, $_POST['description'], $_REQUEST['id']]);
        }

        $success_message = 'Product is updated successfully!';
    }
}
?>

<?php
if (!isset($_REQUEST['id'])) {
    header('location: logout.php');
    exit;
} else {
    // Check if the ID is valid
    $statement = $pdo->prepare("SELECT * FROM tbl_featured_products WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($total == 0) {
        header('location: logout.php');
        exit;
    }
}

foreach ($result as $row) {
    $name = $row['name'];
    $current_price = $row['current_price'];
    $image1 = $row['image1'];
    $description = $row['description'];
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Edit Product</h1>
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
                <input type="hidden" name="current_image1" value="<?php echo $image1; ?>">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Name <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Price <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="current_price" value="<?php echo htmlspecialchars($current_price); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Image <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="file" name="image1">
                                <img src="../assets/uploads/products/<?php echo $image1; ?>" alt="" style="width:150px; margin-top:10px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="description"><?php echo htmlspecialchars($description); ?></textarea>
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