<!-- reply_page.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply to Student</title>
    <!-- Include necessary CSS and JS files -->
    <?php require('../../php/links.php'); ?>
    <!-- Add your custom styles if needed -->
</head>
<body>

    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include("../../components/mentorNavbar.php"); ?>
            <div class="col min-vh-100">
                <?php
                // Check if the recipient email is set
                if (isset($_GET['receiver'])) {
                    $receiverEmail = urldecode($_GET['receiver']);
                    
                    // Display the recipient's email
                    echo '<p>Replying to: ' . $receiverEmail . '</p>';
                    
                    // Add a form to submit the reply
                    echo '<form action="send_reply.php" method="post">';
                    echo '<input type="hidden" name="recipient" value="' . $receiverEmail . '">';
                    echo '<div class="mb-4">';
                    echo '<label for="replyContent" class="form-label">Your Reply:</label>';
                    echo '<textarea class="form-control" id="replyContent" name="replyContent" rows="5" required></textarea>';
                    echo '</div>';
                    echo '<button type="submit" class="btn btn-primary">Submit</button>';
                    echo '</form>';
                } else {
                    echo '<p>Error: Receiver email not specified.</p>';
                }
                ?>
            </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
