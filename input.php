<?php

class Input
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'site');
    }

    public function query()
    {
        $messageid = $_POST['message_id'];
        $userid = $_POST['user_id'];
        $message = $_POST['message'];
        $timestamp = $_POST['timestamp'];
        $user_one = $_POST['user_1'];
        $user_two = $_POST['select'];
        $read = $_POST['read'];

        $stmt = $this->conn->prepare("INSERT INTO chat (message_id, user_id, message, user_1, user_2) VALUES(?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $messageid, $userid, $message, $user_one, $user_two);
        $stmt->execute();
        $stmt->close();

        $quer = "UPDATE chat SET new_msg='1' WHERE user_2='$userid'";
        $answer = mysqli_query($this->conn, $quer);
    }

    public function __deconstruct()
    {
        mysqli_close($this->conn);
    }
}

?>

<?php
$insert = new Input();
$data = $insert->query();
?>