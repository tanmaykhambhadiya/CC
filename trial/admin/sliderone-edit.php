<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {
    $valid = 1;
    $error_message = '';
    $success_message = '';

    // Validate Title and Subtitle
    if (empty($_POST['title']) || empty($_POST['subtitle'])) {
        $valid = 0;
        $error_message .= 'Title and Subtitle cannot be empty.<br>';
    }
    if (empty($_POST['button_link'])) {
        $valid = 0;
        $error_message .= 'Button Link cannot be empty.<br>';
    }

    // Image upload handling
    $path = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : '';
    $path_tmp = isset($_FILES['photo']['tmp_name']) ? $_FILES['photo']['tmp_name'] : '';
    $file_name = '';
    if ($path != '') {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = 'sliderone-' . time() . '.' . $ext;
        $allowed = array('jpg', 'jpeg', 'png', 'gif', 'webp');
        if (!in_array(strtolower($ext), $allowed)) {
            $valid = 0;
            $error_message .= 'Invalid image file type.<br>';
        }
    }

    if ($valid == 1) {
        if ($path == '') {
            // Update without changing the image
            $statement = $pdo->prepare("UPDATE sliders SET title=?, subtitle=?, button_text=?, button_link=?, updated_at=NOW() WHERE id=?");
            $statement->execute([
                $_POST['title'],
                $_POST['subtitle'],
                $_POST['button_text'] ?: 'Learn More',
                $_POST['button_link'],
                $_REQUEST['id']
            ]);
        } else {
            // Move the uploaded file
            move_uploaded_file($path_tmp, '../uploads/slider/' . $file_name);
            // Update with the new image
            $statement = $pdo->prepare("UPDATE sliders SET image=?, title=?, subtitle=?, button_text=?, button_link=?, updated_at=NOW() WHERE id=?");
            $statement->execute([
                $file_name,
                $_POST['title'],
                $_POST['subtitle'],
                $_POST['button_text'] ?: 'Learn More',
                $_POST['button_link'],
                $_REQUEST['id']
            ]);
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
    $statement = $pdo->prepare("SELECT * FROM sliders WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($total == 0) {
        header('location: logout.php');
        exit;
    }
}

foreach ($result as $row) {
    $image = $row['image'];
    $title = $row['title'];
    $subtitle = $row['subtitle'];
    $button_text = $row['button_text'];
    $button_link = $row['button_link'];
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Edit Slider</h1>
    </div>
    <div class="content-header-right">
        <a href="sliderone.php" class="btn btn-primary btn-sm">View All</a>
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
                            <label class="col-sm-2 control-label">Current Image</label>
                            <div class="col-sm-6">
                                <?php if (!empty($image)): ?>
                                    <img src="../uploads/slider/<?php echo htmlspecialchars($image); ?>" style="max-width:120px;">
                                <?php else: ?>
                                    <span>No image uploaded.</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Change Image</label>
                            <div class="col-sm-6">
                                <input type="file" name="photo" accept="image/*">
                                <span class="help-block">Allowed types: jpg, jpeg, png, gif, webp</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Title <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Subtitle <span>*</span></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="subtitle" required><?php echo htmlspecialchars($subtitle); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Button Text</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="button_text" value="<?php echo htmlspecialchars($button_text); ?>">
                                <span class="help-block">Default: Learn More</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Button Link <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="button_link" value="<?php echo htmlspecialchars($button_link); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-6">
                                <button type="submit" class="btn btn-success" name="form1">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>