<?php

session_start();
define('LOGGED_IN', true);
$not = new Notification();
$notify = $not->query();


class Notification
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'site');
    }

    public function query()
    {
        $userid = $_SESSION['user_id'];
        if (isset($_POST['method']) === true && empty($_POST['method']) === false) {
            $sql = "SELECT new_msg FROM chat WHERE new_msg='0' AND user_2='$_SESSION[user_id]'";
            $new_msg = mysqli_query($this->conn, $sql);
            $num_rows = mysqli_num_rows($new_msg);
            $method = trim($_POST['method']);

            $que = "UPDATE chat SET new_msg='1' WHERE user_2='$userid'";
            $dismiss = mysqli_query($this->conn, $que);

            if ($method == 'fetch') {

                if ($num_rows > 0) {
                    echo "($num_rows) new messages <a href='' onClick='$dismiss'>dismiss</a>";
                } else
                    echo "";

            }
        }
    }
}

?>