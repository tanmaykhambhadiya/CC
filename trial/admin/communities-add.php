<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {
    $valid = 1;
    $error_message = '';
    $success_message = '';

    // Validate required fields
    if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['join_circle_link']) || empty($_POST['join_community_link'])) {
        $valid = 0;
        $error_message .= 'All fields are required except the image.<br>';
    }

    // Ensure the directory exists
    $upload_dir = __DIR__ . '/../uploads/communities/';
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
            move_uploaded_file($image_tmp, $upload_dir . $image_name);
        }
    }

    // Insert into database if validation passes
    if ($valid == 1) {
        $statement = $pdo->prepare("INSERT INTO communities (name, description, banner_image_url, members_count, tags, join_circle_link, join_community_link) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $statement->execute([
            $_POST['name'],
            $_POST['description'],
            $image_name,
            $_POST['members_count'],
            $_POST['tags'],
            $_POST['join_circle_link'],
            $_POST['join_community_link']
            ]);

        $success_message = 'Community added successfully!';
    }
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Add Community</h1>
    </div>
    <div class="content-header-right">
        <a href="communities.php" class="btn btn-primary btn-sm">View All</a>
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
                            <label for="" class="col-sm-2 control-label">Name <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Description <span>*</span></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="description" rows="5" required><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Banner Image</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Members Count</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="members_count" value="<?php echo isset($_POST['members_count']) ? htmlspecialchars($_POST['members_count']) : '0'; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Tags</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="tags" value="<?php echo isset($_POST['tags']) ? htmlspecialchars($_POST['tags']) : ''; ?>" placeholder="Comma-separated tags">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Join Circle Link <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="join_circle_link" value="<?php echo isset($_POST['join_circle_link']) ? htmlspecialchars($_POST['join_circle_link']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Join Community Link <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="join_community_link" value="<?php echo isset($_POST['join_community_link']) ? htmlspecialchars($_POST['join_community_link']) : ''; ?>" required>
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