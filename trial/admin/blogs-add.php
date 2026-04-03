<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {
    $valid = 1;
    $error_message = '';
    $success_message = '';

    // Validate required fields
    if (empty($_POST['title']) || empty($_POST['content']) || empty($_POST['author_name']) || empty($_POST['published_date'])) {
        $valid = 0;
        $error_message .= 'Title, Content, Author Name, and Published Date are required.<br>';
    }

    // Ensure the directory exists
    $upload_dir = __DIR__ . '/../uploads/blogs/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Handle image upload
    $image_name = '';
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
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
        $statement = $pdo->prepare("INSERT INTO blogs (title, excerpt, content, image, category, author_name, author_avatar, published_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->execute([
            $_POST['title'],
            $_POST['excerpt'],
            $_POST['content'],
            $image_name,
            $_POST['category'],
            $_POST['author_name'],
            $_POST['author_avatar'],
            $_POST['published_date']
        ]);

        $success_message = 'Blog added successfully!';
    }
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Add Blog</h1>
    </div>
    <div class="content-header-right">
        <a href="blogs.php" class="btn btn-primary btn-sm">View All</a>
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
                            <label class="col-sm-2 control-label">Title <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="title" value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Excerpt</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="excerpt" rows="3"><?php echo isset($_POST['excerpt']) ? htmlspecialchars($_POST['excerpt']) : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Content <span>*</span></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="content" rows="8" required><?php echo isset($_POST['content']) ? htmlspecialchars($_POST['content']) : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Category</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="category" value="<?php echo isset($_POST['category']) ? htmlspecialchars($_POST['category']) : ''; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Author Name <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="author_name" value="<?php echo isset($_POST['author_name']) ? htmlspecialchars($_POST['author_name']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Author Avatar</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="author_avatar" value="<?php echo isset($_POST['author_avatar']) ? htmlspecialchars($_POST['author_avatar']) : ''; ?>" placeholder="e.g. AL">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Published Date <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="published_date" value="<?php echo isset($_POST['published_date']) ? htmlspecialchars($_POST['published_date']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
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