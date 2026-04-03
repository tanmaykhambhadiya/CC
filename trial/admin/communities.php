<?php require_once('header.php'); ?>

<section class="content-header">
    <div class="content-header-left">
        <h1>View Communities</h1>
    </div>
    <div class="content-header-right">
        <a href="communities-add.php" class="btn btn-primary btn-sm">Add New</a>
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
                                <th>Name</th>
                                <th>Banner Image</th>
                                <th>Icon</th>
                                <th>Members Count</th>
                                <th>Description</th>
                                <th>Tags</th>
                                <th>Join Circle Link</th>
                                <th>Join Community Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $statement = $pdo->prepare("SELECT * FROM communities ORDER BY id ASC");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td>
                                        <img src="../uploads/communities/<?php echo htmlspecialchars($row['banner_image_url']); ?>" 
                                             alt="<?php echo htmlspecialchars($row['name']); ?>" 
                                             style="width:150px;">
                                    </td>
                                    <td><?php echo htmlspecialchars($row['icon']); ?></td>
                                    <td><?php echo htmlspecialchars($row['members_count']); ?></td>
                                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                                    <td><?php echo htmlspecialchars($row['tags']); ?></td>
                                    <td>
                                        <a href="<?php echo htmlspecialchars($row['join_circle_link']); ?>" target="_blank">
                                            <?php echo htmlspecialchars($row['join_circle_link']); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo htmlspecialchars($row['join_community_link']); ?>" target="_blank">
                                            <?php echo htmlspecialchars($row['join_community_link']); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="communities-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="#" class="btn btn-danger btn-xs" data-href="communities-delete.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
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

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>