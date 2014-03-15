<?php

session_start();
$log = new Login();
$login = $log->logs();

class Login
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'site');
    }

    public function logs()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if ($username && $password) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE username= ?");
            $stmt->bind_param('s', $username);

            $stmt->execute();
            $result = $stmt->get_result();
            $numrows = mysqli_num_rows($result);

            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $dbusername = $row['username'];
                    $dbpassword = $row['password'];
                    $dbuserid = $row['user_id'];
                }

                if ($username == $dbusername && $password == $dbpassword) {
                    echo "You are in. <a href='../chat.php'>Click</a> here to enter the member page.";
                    $_SESSION['username'] = $dbusername;
                    $_SESSION['user_id'] = $dbuserid;
                } else "Incorrect password";
            } else
                die("that user isn't real");

        } else
            die("please enter a username and a password");
    }
}

?>