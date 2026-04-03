<?php
require_once('header.php');
require_once('inc/config.php'); // Include the database connection file

if (!$pdo) {
    die("Database connection error: PDO object is not initialized.");
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>View Featured Slides</h1>
    </div>
    <div class="content-header-right">
        <a href="community-edit.php" class="btn btn-primary btn-sm">Add New</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Button Text</th>
                                <th>Button Link</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $statement = $pdo->prepare("SELECT * FROM featured_slides ORDER BY id ASC");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                                    <td><?php echo htmlspecialchars($row['subtitle']); ?></td>
                                    <td><?php echo htmlspecialchars($row['button_text']); ?></td>
                                    <td><?php echo htmlspecialchars($row['button_link']); ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td><?php echo $row['updated_at']; ?></td>
                                    <td>
                                        <a href="community-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">Edit</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>