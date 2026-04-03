<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {
    $valid = 1;
    $error_message = '';
    $success_message = '';

    // Validate required fields
    if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['link'])) {
        $valid = 0;
        $error_message .= 'All fields are required except the image.<br>';
    }

    // Handle image upload
    $image_name = '';
    if ($valid == 1 && isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($image_ext, $allowed_ext)) {
            $valid = 0;
            $error_message .= 'You must upload a valid image file (jpg, jpeg, png, gif).<br>';
        } else {
            move_uploaded_file($image_tmp, '../uploads/experience/' . $image_name);
        }
    }

    // Insert into database if validation passes
    if ($valid == 1) {
        $statement = $pdo->prepare("INSERT INTO experience_blocks (title, description, image_url, link) VALUES (?, ?, ?, ?)");
        $statement->execute([
            $_POST['title'],
            $_POST['description'],
            $image_name,
            $_POST['link']
        ]);

        $success_message = 'Experience block added successfully!';
    }
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Add Experience Block</h1>
    </div>
    <div class="content-header-right">
        <a href="experience.php" class="btn btn-primary btn-sm">View All</a>
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
                                <input type="text" class="form-control" name="title" value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Description <span>*</span></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="description" rows="5" required><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Link <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="link" value="<?php echo isset($_POST['link']) ? htmlspecialchars($_POST['link']) : ''; ?>" required>
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