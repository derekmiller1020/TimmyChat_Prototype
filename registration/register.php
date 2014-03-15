<?php

$reg = new Register();
$register = $reg->registration();

class Register
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'site');
    }

    public function registration()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if (empty($username)) {
            die("Please Enter A Username<br>");
        }
        if (empty($password)) {
            die("Please Enter a Password <br>");
        }

        $stmt = $this->conn->prepare("SELECT username FROM users WHERE username= ?");
        $stmt->bind_param('s', $username);

        $stmt->execute();
        $result = $stmt->get_result();
        $do_user_check = mysqli_num_rows($result);

        if ($do_user_check > 0) {
            die("Username is already in use!<br>");
        }

        if (isset($username) && isset($password)) {

            $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param('ss', $username, $password);

            $stmt->execute();
            $stmt->close();
            echo "Cool stuff. You have been registered. <a href='../index.php'>Click to login</a>";
        }
        mysqli_close($this->conn);
    }
}

