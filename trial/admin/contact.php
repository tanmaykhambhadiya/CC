<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {
    // Update only the contact number
    $number = $_POST['number'];

    $statement = $pdo->prepare("UPDATE tbl_contact SET number=? WHERE id=1");
    $statement->execute(array($number));

    $success_message = 'Contact number is updated successfully.';
}

// Fetch the contact number
$statement = $pdo->prepare("SELECT * FROM tbl_contact WHERE id=1");
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);
$number = $result['number'];
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Contact Information</h1>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($success_message)): ?>
                <div class="callout callout-success">
                    <p><?php echo $success_message; ?></p>
                </div>
            <?php endif; ?>
            <div class="box box-info">
                <div class="box-body">
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Number <span>*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="number" value="<?php echo $number; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>