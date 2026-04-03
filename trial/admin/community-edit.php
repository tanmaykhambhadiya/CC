<?php require_once('header.php'); ?>
<?php require_once('inc/config.php'); ?>

<?php
if (isset($_POST['form1'])) {
    $valid = 1;
    $error_message = '';
    $success_message = '';

    // Validate required fields
    if (empty($_POST['title']) || empty($_POST['subtitle']) || empty($_POST['button_text']) || empty($_POST['button_link'])) {
        $valid = 0;
        $error_message .= 'Title, Subtitle, Button Text, and Button Link are required.<br>';
    }

    if ($valid == 1) {
        if (isset($_REQUEST['id'])) {
            // Update existing record
            $statement = $pdo->prepare("UPDATE featured_slides SET title=?, subtitle=?, benefit_1=?, benefit_2=?, benefit_3=?, benefit_4=?, button_text=?, button_link=?, background_image=? WHERE id=?");
            $statement->execute([
                $_POST['title'],
                $_POST['subtitle'],
                $_POST['benefit_1'],
                $_POST['benefit_2'],
                $_POST['benefit_3'],
                $_POST['benefit_4'],
                $_POST['button_text'],
                $_POST['button_link'],
                $_POST['background_image'],
                $_REQUEST['id']
            ]);
            $success_message = 'Slide updated successfully!';
        } else {
            // Insert new record
            $statement = $pdo->prepare("INSERT INTO featured_slides (title, subtitle, benefit_1, benefit_2, benefit_3, benefit_4, button_text, button_link, background_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $statement->execute([
                $_POST['title'],
                $_POST['subtitle'],
                $_POST['benefit_1'],
                $_POST['benefit_2'],
                $_POST['benefit_3'],
                $_POST['benefit_4'],
                $_POST['button_text'],
                $_POST['button_link'],
                $_POST['background_image']
            ]);
            $success_message = 'Slide added successfully!';
        }
    }
}

// Fetch existing data for editing
if (isset($_REQUEST['id'])) {
    $statement = $pdo->prepare("SELECT * FROM featured_slides WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $title = $result['title'];
    $subtitle = $result['subtitle'];
    $benefit_1 = $result['benefit_1'];
    $benefit_2 = $result['benefit_2'];
    $benefit_3 = $result['benefit_3'];
    $benefit_4 = $result['benefit_4'];
    $button_text = $result['button_text'];
    $button_link = $result['button_link'];
    $background_image = $result['background_image'];
} else {
    $title = $subtitle = $benefit_1 = $benefit_2 = $benefit_3 = $benefit_4 = $button_text = $button_link = $background_image = '';
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1><?php echo isset($_REQUEST['id']) ? 'Edit Slide' : 'Add Slide'; ?></h1>
    </div>
    <div class="content-header-right">
        <a href="community.php" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if (!empty($error_message)): ?>
                <div class="callout callout-danger">
                    <p><?php echo $error_message; ?></p>
                </div>
            <?php endif; ?>

            <?php if (!empty($success_message)): ?>
                <div class="callout callout-success">
                    <p><?php echo $success_message; ?></p>
                </div>
            <?php endif; ?>

            <form class="form-horizontal" action="" method="post">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Title <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Subtitle <span>*</span></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="subtitle" required><?php echo htmlspecialchars($subtitle); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Benefit 1</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="benefit_1" value="<?php echo htmlspecialchars($benefit_1); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Benefit 2</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="benefit_2" value="<?php echo htmlspecialchars($benefit_2); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Benefit 3</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="benefit_3" value="<?php echo htmlspecialchars($benefit_3); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Benefit 4</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="benefit_4" value="<?php echo htmlspecialchars($benefit_4); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Button Text <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="button_text" value="<?php echo htmlspecialchars($button_text); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Button Link <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="button_link" value="<?php echo htmlspecialchars($button_link); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Background Image URL</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="background_image" value="<?php echo htmlspecialchars($background_image); ?>">
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