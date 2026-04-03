<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {
    $valid = 1;
    $error_message = '';
    $success_message = '';

    // Validate required fields
    if (empty($_POST['title']) || empty($_POST['genre']) || empty($_POST['type']) || empty($_POST['location']) || empty($_POST['date_range']) || empty($_POST['rating'])) {
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
            move_uploaded_file($image_tmp, '../uploads/homeevent/' . $image_name);
        }
    }

    // Insert into database if validation passes
    if ($valid == 1) {
        $statement = $pdo->prepare("INSERT INTO homeevent (title, genre, type, location, date_range, rating, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $statement->execute([
            $_POST['title'],
            $_POST['genre'],
            $_POST['type'],
            $_POST['location'],
            $_POST['date_range'],
            $_POST['rating'],
            $image_name
        ]);

        $success_message = 'Event added successfully!';
    }
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Add Event</h1>
    </div>
    <div class="content-header-right">
        <a href="homeevent.php" class="btn btn-primary btn-sm">View All</a>
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
                            <label for="" class="col-sm-2 control-label">Genre <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="genre" value="<?php echo isset($_POST['genre']) ? htmlspecialchars($_POST['genre']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Type <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="type" value="<?php echo isset($_POST['type']) ? htmlspecialchars($_POST['type']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Location <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="location" value="<?php echo isset($_POST['location']) ? htmlspecialchars($_POST['location']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Date Range <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="date_range" value="<?php echo isset($_POST['date_range']) ? htmlspecialchars($_POST['date_range']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Rating <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="number" step="0.1" class="form-control" name="rating" value="<?php echo isset($_POST['rating']) ? htmlspecialchars($_POST['rating']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" name="image">
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