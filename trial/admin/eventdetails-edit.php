<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {
    $valid = 1;
    $error_message = '';
    $success_message = '';

    // Validate required fields
    if (
        empty($_POST['e_id']) || empty($_POST['title']) || empty($_POST['artist_name']) ||
        empty($_POST['date']) || empty($_POST['time']) || empty($_POST['age']) ||
        empty($_POST['duration']) || empty($_POST['language']) || empty($_POST['category']) ||
        empty($_POST['venue_address']) || empty($_POST['tickit_link']) || empty($_POST['about_event'])
    ) {
        $valid = 0;
        $error_message .= 'All required fields must be filled.<br>';
    }

    // Handle image upload
    $image = '';
    if ($valid == 1 && isset($_REQUEST['id'])) {
        // Fetch old image
        $statement = $pdo->prepare("SELECT image FROM event_detail WHERE id=?");
        $statement->execute([$_REQUEST['id']]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $old_image = $row ? $row['image'] : '';

        if (!empty($_FILES['image']['name'])) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $ext;
            $target = '../uploads/eventdetails/' . $filename;
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            if (in_array(strtolower($ext), $allowed)) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $image = $filename;
                    // Optionally delete old image
                    if ($old_image && file_exists('../uploads/eventdetails/' . $old_image)) {
                        @unlink('../uploads/eventdetails/' . $old_image);
                    }
                } else {
                    $valid = 0;
                    $error_message .= 'Failed to upload the image.<br>';
                }
            } else {
                $valid = 0;
                $error_message .= 'Invalid image file type.<br>';
            }
        } else {
            $image = $old_image;
        }
    }

    if ($valid == 1) {
        if (isset($_REQUEST['id'])) {
            // Update existing record
            $statement = $pdo->prepare("UPDATE event_detail SET 
                e_id=?, title=?, artist_name=?, date=?, time=?, age=?, duration=?, language=?, category=?, venue_address=?, venue_link=?, tickit_link=?, about_event=?, community_link=?, 
                follow_spotify_link=?, follow_apple_music_link=?, image=? WHERE id=?");
            $statement->execute([
                $_POST['e_id'],                  // 1
                $_POST['title'],                 // 2
                $_POST['artist_name'],           // 3
                $_POST['date'],                  // 4
                $_POST['time'],                  // 5
                $_POST['age'],                   // 6
                $_POST['duration'],              // 7
                $_POST['language'],              // 8
                $_POST['category'],              // 9
                $_POST['venue_address'],         // 10
                $_POST['venue_link'] ?? null,    // 11 (optional)
                $_POST['tickit_link'],           // 12
                $_POST['about_event'],           // 13
                $_POST['community_link'] ?? null, // 14 (optional)
                $_POST['follow_spotify_link'] ?? null, // 15 (optional)
                $_POST['follow_apple_music_link'] ?? null, // 16 (optional)
                $image,                          // 17
                $_REQUEST['id']                  // 18 (WHERE condition)
            ]);
            $success_message = 'Event updated successfully!';
        }
    }
}

// Fetch existing data for editing
if (isset($_REQUEST['id'])) {
    $statement = $pdo->prepare("SELECT * FROM event_detail WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    $e_id = $result['e_id'];
    $title = $result['title'];
    $artist_name = $result['artist_name'];
    $date = $result['date'];
    $time = $result['time'];
    $age = $result['age'];
    $duration = $result['duration'];
    $language = $result['language'];
    $category = $result['category'];
    $venue_address = $result['venue_address'];
    $venue_link = $result['venue_link'];
    $tickit_link = $result['tickit_link'];
    $about_event = $result['about_event'];
    $community_link = $result['community_link'];
    $follow_spotify_link = $result['follow_spotify_link'];
    $follow_apple_music_link = $result['follow_apple_music_link'];
    $image = $result['image'];
} else {
    $e_id = $title = $artist_name = $date = $time = $age = $duration = $language = $category = $venue_address = $venue_link = $tickit_link = $about_event = $community_link = $follow_spotify_link = $follow_apple_music_link = $image = '';
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Edit Event</h1>
    </div>
    <div class="content-header-right">
        <a href="eventdetails.php" class="btn btn-primary btn-sm">View All</a>
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
                <div class="box box-info">
                    <div class="box-body">
                        <!-- Form fields -->
                        <div class="form-group">
                            <label for="e_id" class="col-sm-2 control-label">Event ID <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="e_id" value="<?php echo htmlspecialchars($e_id); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="artist_name" class="col-sm-2 control-label">Artist Name <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="artist_name" value="<?php echo htmlspecialchars($artist_name); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-sm-2 control-label">Date <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="date" value="<?php echo htmlspecialchars($date); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time" class="col-sm-2 control-label">Time <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="time" class="form-control" name="time" value="<?php echo htmlspecialchars($time); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age" class="col-sm-2 control-label">Age <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="age" value="<?php echo htmlspecialchars($age); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="duration" class="col-sm-2 control-label">Duration <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="duration" value="<?php echo htmlspecialchars($duration); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="language" class="col-sm-2 control-label">Language <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="language" value="<?php echo htmlspecialchars($language); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-sm-2 control-label">Category <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="category" value="<?php echo htmlspecialchars($category); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="venue_address" class="col-sm-2 control-label">Venue Address <span>*</span></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="venue_address" rows="3" required><?php echo htmlspecialchars($venue_address); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="venue_link" class="col-sm-2 control-label">Venue Link</label>
                            <div class="col-sm-6">
                                <input type="url" class="form-control" name="venue_link" value="<?php echo htmlspecialchars($venue_link); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tickit_link" class="col-sm-2 control-label">Ticket Link <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="url" class="form-control" name="tickit_link" value="<?php echo htmlspecialchars($tickit_link); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about_event" class="col-sm-2 control-label">About Event <span>*</span></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="about_event" rows="5" required><?php echo htmlspecialchars($about_event); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="community_link" class="col-sm-2 control-label">Community Link</label>
                            <div class="col-sm-6">
                                <input type="url" class="form-control" name="community_link" value="<?php echo htmlspecialchars($community_link); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="follow_spotify_link" class="col-sm-2 control-label">Spotify Follow Link</label>
                            <div class="col-sm-6">
                                <input type="url" class="form-control" name="follow_spotify_link" value="<?php echo htmlspecialchars($follow_spotify_link); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="follow_apple_music_link" class="col-sm-2 control-label">Apple Music Follow Link</label>
                            <div class="col-sm-6">
                                <input type="url" class="form-control" name="follow_apple_music_link" value="<?php echo htmlspecialchars($follow_apple_music_link); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Event Image</label>
                            <div class="col-sm-6">
                                <?php if (!empty($image)): ?>
                                    <img src="../uploads/eventdetails/<?php echo htmlspecialchars($image); ?>" alt="Event Image" style="max-width:120px;max-height:90px;margin-bottom:10px;"><br>
                                <?php endif; ?>
                                <input type="file" name="image" accept="image/*">
                                <p class="help-block">Leave blank to keep existing image.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-6">
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