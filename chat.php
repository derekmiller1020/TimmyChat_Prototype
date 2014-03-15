<?php
session_start();
if (isset($_SESSION['user_id']))
    echo "<a href='login/logout.php'>Logout</a>";
else
    header('Location: password.gif');

include 'login/connect.php';
require 'retrieve/select.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>chat</title>

    <link rel="stylesheet" href="css/styles.css">

    <meta charset="UTF-8">
</head>

<body>

<div id="window">
    <div id="title">
        <div id="open">
        </div>
        TimmyChat
    </div>
    <div id="notification">
    </div>
    <div id="box">
        <div class="chat">
            <div class="messages"></div>

        </div>
        <br><br>

        <div class="test">

            <form name="form" method="post">
                <?php
                $sel = new Select();
                $select = $sel->query();
                ?>
                </select>
                <input name="read" type="hidden" value="1" id="read">
                <input name="user_1" type="hidden" Value="<?php echo $_SESSION['user_id']; ?>" id="user_1">
                <input name="user_id" type="hidden" value="<?php echo $_SESSION['user_id']; ?>" id="user_id">

                <p>
                    <textarea name="message" class="message" cols="3" rows="4.8"
                              onkeydown="if (event.keyCode == 13) document.getElementById('submit').click()">
                    </textarea>
                    <input type="submit" name="Submit" id="submit" value="">
            </form>

        </div>
    </div>
</div>

<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.titlealert.js"></script>
<script src="js/chat.js"></script>

</body>

</html>
