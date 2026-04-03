<?php require_once('header.php'); ?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Add Event</h1>
    </div>
    <div class="content-header-right">
        <a href="eventdetails.php" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<?php
$error_message = '';
$success_message = '';

if (isset($_POST['form1'])) {
    $valid = 1;

    // Validation for required fields
    $required_fields = [
        'e_id' => 'Event ID',
        'title' => 'Title',
        'artist_name' => 'Artist Name',
        'date' => 'Date',
        'time' => 'Time',
        'age' => 'Age',
        'duration' => 'Duration',
        'language' => 'Language',
        'category' => 'Category',
        'venue_address' => 'Venue Address',
        'tickit_link' => 'Ticket Link',
        'about_event' => 'About Event'
    ];

    foreach ($required_fields as $field => $label) {
        if (empty($_POST[$field])) {
            $valid = 0;
            $error_message .= "$label cannot be empty.<br>";
        }
    }

    // Handle image upload
    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $ext;
        $target = '../uploads/eventdetails/' . $filename;
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (in_array(strtolower($ext), $allowed)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $image = $filename;
            } else {
                $valid = 0;
                $error_message .= 'Failed to upload the image.<br>';
            }
        } else {
            $valid = 0;
            $error_message .= 'Invalid image file type.<br>';
        }
    }

    // Handle optional fields
    $venue_link = isset($_POST['venue_link']) ? $_POST['venue_link'] : null;
    $community_link = isset($_POST['community_link']) ? $_POST['community_link'] : null;
    $follow_spotify_link = isset($_POST['follow_spotify_link']) ? $_POST['follow_spotify_link'] : null;
    $follow_apple_music_link = isset($_POST['follow_apple_music_link']) ? $_POST['follow_apple_music_link'] : null;

    if ($valid == 1) {
        try {
            // Insert data into the database
            $statement = $pdo->prepare("INSERT INTO event_detail (
                e_id, title, artist_name, date, time, age, duration, language, category, venue_address, venue_link, tickit_link, about_event, community_link, 
                follow_spotify_link, follow_apple_music_link, image
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
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
                $venue_link,                     // 11
                $_POST['tickit_link'],           // 12
                $_POST['about_event'],           // 13
                $community_link,                 // 14
                $follow_spotify_link,            // 15
                $follow_apple_music_link,        // 16
                $image                           // 17
            ]);

            $success_message = "Event has been added successfully.";
        } catch (PDOException $e) {
            $error_message .= "Database error: " . $e->getMessage() . "<br>";
        }
    }
}
?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if ($error_message): ?>
                <div class="callout callout-danger">
                    <p><?php echo $error_message; ?></p>
                </div>
            <?php endif; ?>
            <?php if ($success_message): ?>
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
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="e_id" placeholder="Unique Event ID" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title <span>*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" placeholder="Event Title" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="artist_name" class="col-sm-2 control-label">Artist Name <span>*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="artist_name" placeholder="Artist Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-sm-2 control-label">Date <span>*</span></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time" class="col-sm-2 control-label">Time <span>*</span></label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" name="time" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age" class="col-sm-2 control-label">Age <span>*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="age" placeholder="Age Restriction" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="duration" class="col-sm-2 control-label">Duration <span>*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="duration" placeholder="Event Duration" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="language" class="col-sm-2 control-label">Language <span>*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="language" placeholder="Event Language" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-sm-2 control-label">Category <span>*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="category" placeholder="Event Category" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="venue_address" class="col-sm-2 control-label">Venue Address <span>*</span></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="venue_address" rows="3" placeholder="Venue Address" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="venue_link" class="col-sm-2 control-label">Venue Link</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control" name="venue_link" placeholder="Venue Google Maps Link">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tickit_link" class="col-sm-2 control-label">Ticket Link <span>*</span></label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control" name="tickit_link" placeholder="Ticket Purchase Link" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about_event" class="col-sm-2 control-label">About Event <span>*</span></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="about_event" rows="5" placeholder="Event Description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="community_link" class="col-sm-2 control-label">Community Link</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control" name="community_link" placeholder="Community Chat Link">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="follow_spotify_link" class="col-sm-2 control-label">Spotify Follow Link</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control" name="follow_spotify_link" placeholder="Spotify Follow Link">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="follow_apple_music_link" class="col-sm-2 control-label">Apple Music Follow Link</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control" name="follow_apple_music_link" placeholder="Apple Music Follow Link">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Event Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="image" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success" name="form1">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>