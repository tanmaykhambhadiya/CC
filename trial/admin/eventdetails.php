<?php require_once('header.php'); ?>

<section class="content-header">
    <div class="content-header-left">
        <h1>View Events</h1>
    </div>
    <div class="content-header-right">
        <a href="eventdetails-add.php" class="btn btn-primary btn-sm">Add New</a>
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
                                <th>ID</th>
                                <th>Event ID</th>
                                <th>Title</th>
                                <th>Artist Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Age</th>
                                <th>Duration</th>
                                <th>Language</th>
                                <th>Category</th>
                                <th>Venue Address</th>
                                <th>Venue Link</th>
                                <th>Ticket Link</th>
                                <th>Community Link</th>
                                <th>Share WhatsApp</th>
                                <th>Share Instagram</th>
                                <th>Share Facebook</th>
                                <th>Follow Spotify</th>
                                <th>Follow Instagram</th>
                                <th>Follow Apple Music</th>
                                <th>References</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $statement = $pdo->prepare("SELECT * FROM event_detail ORDER BY id ASC");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                $i++;
                                $imagePath = !empty($row['image']) ? '../uploads/eventdetails/' . htmlspecialchars($row['image']) : '../uploads/eventdetails/default-event.jpg';
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['e_id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                                    <td><?php echo htmlspecialchars($row['artist_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['date']); ?></td>
                                    <td><?php echo htmlspecialchars($row['time']); ?></td>
                                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                                    <td><?php echo htmlspecialchars($row['duration']); ?></td>
                                    <td><?php echo htmlspecialchars($row['language']); ?></td>
                                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                                    <td><?php echo htmlspecialchars($row['venue_address']); ?></td>
                                    <td>
                                        <?php if (!empty($row['venue_link'])): ?>
                                            <a href="<?php echo htmlspecialchars($row['venue_link']); ?>" target="_blank">View</a>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['tickit_link'])): ?>
                                            <a href="<?php echo htmlspecialchars($row['tickit_link']); ?>" target="_blank">Ticket</a>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['community_link'])): ?>
                                            <a href="<?php echo htmlspecialchars($row['community_link']); ?>" target="_blank">Community</a>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['share_whatsapp_link'])): ?>
                                            <a href="<?php echo htmlspecialchars($row['share_whatsapp_link']); ?>" target="_blank">WhatsApp</a>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['share_instagram_link'])): ?>
                                            <a href="<?php echo htmlspecialchars($row['share_instagram_link']); ?>" target="_blank">Instagram</a>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['share_facebook_link'])): ?>
                                            <a href="<?php echo htmlspecialchars($row['share_facebook_link']); ?>" target="_blank">Facebook</a>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['follow_spotify_link'])): ?>
                                            <a href="<?php echo htmlspecialchars($row['follow_spotify_link']); ?>" target="_blank">Spotify</a>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['follow_instagram_link'])): ?>
                                            <a href="<?php echo htmlspecialchars($row['follow_instagram_link']); ?>" target="_blank">Instagram</a>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['follow_apple_music_link'])): ?>
                                            <a href="<?php echo htmlspecialchars($row['follow_apple_music_link']); ?>" target="_blank">Apple Music</a>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo !empty($row['ref']) ? nl2br(htmlspecialchars($row['ref'])) : 'N/A'; ?>
                                    </td>
                                    <td>
                                        <img src="<?php echo $imagePath; ?>" alt="Event Image" style="max-width:80px;max-height:60px;">
                                    </td>
                                    <td>
                                        <a href="eventdetails-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="#" class="btn btn-danger btn-xs" data-href="eventdetails-delete.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
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
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>