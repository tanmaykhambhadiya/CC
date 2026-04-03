<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {
    $valid = 1;
    $error_message = '';
    $success_message = '';

    // Validate required fields
    if (empty($_POST['title']) || empty($_POST['date']) || empty($_POST['location']) || empty($_POST['link'])) {
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
            move_uploaded_file($image_tmp, '../uploads/events/' . $image_name);
        }
    }

    // Insert into database if validation passes
    if ($valid == 1) {
        $statement = $pdo->prepare("INSERT INTO events (title, date, location, image_url, attendees_count, link, button_text) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $statement->execute([
            $_POST['title'],
            $_POST['date'],
            $_POST['location'],
            $image_name,
            $_POST['attendees_count'],
            $_POST['link'],
            $_POST['button_text']
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
        <a href="events.php" class="btn btn-primary btn-sm">View All</a>
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
                            <label for="" class="col-sm-2 control-label">Date <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="date" value="<?php echo isset($_POST['date']) ? htmlspecialchars($_POST['date']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Location <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="location" value="<?php echo isset($_POST['location']) ? htmlspecialchars($_POST['location']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Attendees Count</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="attendees_count" value="<?php echo isset($_POST['attendees_count']) ? htmlspecialchars($_POST['attendees_count']) : '0'; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Link <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="link" value="<?php echo isset($_POST['link']) ? htmlspecialchars($_POST['link']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Button Text</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="button_text" value="<?php echo isset($_POST['button_text']) ? htmlspecialchars($_POST['button_text']) : 'Explore'; ?>">
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