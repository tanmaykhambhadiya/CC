<?php require_once 'header.php'; ?>

<section class="content-header">
    <h1>Dashboard</h1>
</section>

<?php
// Array of tables to fetch row counts
$tables = [
    'admin',
    'orders',
    'tbl_featured_products',
    'tbl_slider',
    'tbl_user',
    'users'
];

$table_counts = [];

// Loop through each table and fetch the row count
foreach ($tables as $table) {
    $statement = $pdo->prepare("SELECT COUNT(*) AS total FROM $table");
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $table_counts[$table] = $result['total'];
}
?>

<section class="content">
    <div class="row">

        <?php foreach ($table_counts as $table_name => $row_count): ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Rows in <?= ucfirst(str_replace('_', ' ', $table_name)); ?></span>
                        <span class="info-box-number"><?= $row_count; ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>

<?php require_once 'footer.php'; ?>