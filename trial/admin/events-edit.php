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

    // Ensure the directory exists
    $upload_dir = __DIR__ . '/../uploads/events/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create the directory if it doesn't exist
    }

    // Handle image upload
    $image_name = '';
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($image_ext, $allowed_ext)) {
            $valid = 0;
            $error_message .= 'You must upload a valid image file (jpg, jpeg, png, gif).<br>';
        } else {
            // Move the uploaded file to the target directory
            if (!move_uploaded_file($image_tmp, $upload_dir . $image_name)) {
                $valid = 0;
                $error_message .= 'Failed to upload the image. Please check directory permissions.<br>';
            } else {
                // Delete the old image if a new one is uploaded
                if (!empty($_POST['current_image']) && file_exists($upload_dir . $_POST['current_image'])) {
                    unlink($upload_dir . $_POST['current_image']);
                }
            }
        }
    } else {
        $image_name = $_POST['current_image']; // Keep the current image if no new image is uploaded
    }

    if ($valid == 1) {
        if (isset($_REQUEST['id'])) {
            // Update existing record
            $statement = $pdo->prepare("UPDATE events SET title=?, date=?, location=?, image_url=?, attendees_count=?, link=?, button_text=? WHERE id=?");
            $statement->execute([
                $_POST['title'],
                $_POST['date'],
                $_POST['location'],
                $image_name,
                $_POST['attendees_count'],
                $_POST['link'],
                $_POST['button_text'],
                $_REQUEST['id']
            ]);
            $success_message = 'Event updated successfully!';
        } else {
            // Insert new record
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
}

// Fetch existing data for editing
if (isset($_REQUEST['id'])) {
    $statement = $pdo->prepare("SELECT * FROM events WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $title = $result['title'];
    $date = $result['date'];
    $location = $result['location'];
    $image_url = $result['image_url'];
    $attendees_count = $result['attendees_count'];
    $link = $result['link'];
    $button_text = $result['button_text'];
} else {
    $title = $date = $location = $image_url = $attendees_count = $link = $button_text = '';
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1><?php echo isset($_REQUEST['id']) ? 'Edit Event' : 'Add Event'; ?></h1>
    </div>
    <div class="content-header-right">
        <a href="events.php" class="btn btn-primary btn-sm">View All</a>
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
                            <label for="" class="col-sm-2 control-label">Date <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="date" value="<?php echo htmlspecialchars($date); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Location <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="location" value="<?php echo htmlspecialchars($location); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" name="image">
                                <?php if (!empty($image_url)): ?>
                                    <img src="../uploads/events/<?php echo htmlspecialchars($image_url); ?>" alt="Event Image" style="width:150px; margin-top:10px;">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Attendees Count</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="attendees_count" value="<?php echo htmlspecialchars($attendees_count); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Link <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="link" value="<?php echo htmlspecialchars($link); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Button Text</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="button_text" value="<?php echo htmlspecialchars($button_text); ?>" placeholder="Explore">
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