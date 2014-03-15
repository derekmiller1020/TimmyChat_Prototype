<?php

class Select
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'site');
    }

    public function query()
    {
        echo "<select id='select' select name='select'>";
        $sql = "SELECT user_id, username FROM users";
        $user_list = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_array($user_list)) {
            $user = $row['user_id'];
            $username = $row['username'];
            echo "<option value='$user'>$username<br></option></a>";
        }
        echo "</select>";
    }

    public function __destruct()
    {
        mysqli_close($this->conn);
    }


}

?>

