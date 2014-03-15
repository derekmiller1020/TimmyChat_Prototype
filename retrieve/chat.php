<?php

require '../retrieve/retrieve.php';

if (isset($_POST['method']) && isset ($_SESSION['user_id']) === true && empty($_POST['method']) === false) {
    $userid = (int)$_SESSION['user_id'];
    $chat = new Chat();
    $method = trim($_POST['method']);

    if ($method == 'retrieve') {

        $messages = $chat->retrieveChat($userid);

        if (empty($messages) === true) {
            echo 'No messages to show';
        } else {

            foreach ($messages as $message) {
                ?>
                <div class="onscreen">
                    <a href="#"><?php echo $message['username']; ?></a>:
                    <p><?php echo $message['message']; ?><p>
                </div>

            <?php
            }
        }
    }
}

?>
