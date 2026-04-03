<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {
    $valid = 1;
    $error_message = '';
    $success_message = '';

    // Validate H1 Heading and H2 Text
    if (empty($_POST['h1_heading']) || empty($_POST['h2_text'])) {
        $valid = 0;
        $error_message .= 'H1 Heading and H2 Text cannot be empty.<br>';
    }

    // Validate Image Upload
    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if ($path != '') {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = 'slider-' . time() . '.' . $ext;

        // Check for valid image extensions
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
            $valid = 0;
            $error_message .= 'You must upload a valid image file (jpg, jpeg, png, gif).<br>';
        }
    }

    if ($valid == 1) {
        if ($path == '') {
            // Update without changing the image
            $statement = $pdo->prepare("UPDATE tbl_slider SET h1_heading=?, h2_text=? WHERE id=?");
            $statement->execute([$_POST['h1_heading'], $_POST['h2_text'], $_REQUEST['id']]);
        } else {
            // Remove the old image
            unlink('../assets/uploads/slider/' . $_POST['current_photo']);

            // Upload the new image
            move_uploaded_file($path_tmp, '../assets/uploads/slider/' . $file_name);

            // Update with the new image
            $statement = $pdo->prepare("UPDATE tbl_slider SET image=?, h1_heading=?, h2_text=? WHERE id=?");
            $statement->execute([$file_name, $_POST['h1_heading'], $_POST['h2_text'], $_REQUEST['id']]);
        }

        $success_message = 'Slider is updated successfully!';
    }
}
?>

<?php
if (!isset($_REQUEST['id'])) {
    header('location: logout.php');
    exit;
} else {
    // Check if the ID is valid
    $statement = $pdo->prepare("SELECT * FROM tbl_slider WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($total == 0) {
        header('location: logout.php');
        exit;
    }
}

foreach ($result as $row) {
    $photo = $row['image'];
    $h1_heading = $row['h1_heading'];
    $h2_text = $row['h2_text'];
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Edit Slider</h1>
    </div>
    <div class="content-header-right">
        <a href="slider.php" class="btn btn-primary btn-sm">View All</a>
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
                <input type="hidden" name="current_photo" value="<?php echo $photo; ?>">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Existing Photo</label>
                            <div class="col-sm-9" style="padding-top:5px">
                                <img src="../assets/uploads/slider/<?php echo $photo; ?>" alt="Slider Photo" style="width:400px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Photo</label>
                            <div class="col-sm-6" style="padding-top:5px">
                                <input type="file" name="photo">(Only jpg, jpeg, gif, and png are allowed)
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">H1 Heading <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="h1_heading" value="<?php echo htmlspecialchars($h1_heading); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">H2 Text <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="h2_text" value="<?php echo htmlspecialchars($h2_text); ?>" required>
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