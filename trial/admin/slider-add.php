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
    $path = $_FILES['image']['name'];
    $path_tmp = $_FILES['image']['tmp_name'];

    if ($path != '') {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = 'slider-' . time() . '.' . $ext;

        // Check for valid image extensions
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
            $valid = 0;
            $error_message .= 'You must upload a valid image file (jpg, jpeg, png, gif).<br>';
        } else {
            move_uploaded_file($path_tmp, '../assets/uploads/slider/' . $file_name);
        }
    } else {
        $valid = 0;
        $error_message .= 'You must select an image.<br>';
    }

    // Insert into database if validation passes
    if ($valid == 1) {
        $statement = $pdo->prepare("INSERT INTO tbl_slider (image, h1_heading, h2_text) VALUES (?, ?, ?)");
        $statement->execute([$file_name, $_POST['h1_heading'], $_POST['h2_text']]);

        $success_message = 'Slider is added successfully!';
    }
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Add Slider</h1>
    </div>
    <div class="content-header-right">
        <a href="slider.php" class="btn btn-primary btn-sm">View All</a>
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
                            <label for="" class="col-sm-2 control-label">H1 Heading <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="h1_heading" value="<?php echo isset($_POST['h1_heading']) ? htmlspecialchars($_POST['h1_heading']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">H2 Text <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="h2_text" value="<?php echo isset($_POST['h2_text']) ? htmlspecialchars($_POST['h2_text']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Image <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="file" name="image" required>
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