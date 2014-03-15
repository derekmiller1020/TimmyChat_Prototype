<?php
session_start();
define('LOGGED_IN', true);


class Chat
{

    protected $database, $info, $rows;

    public function __construct()
    {
        $this->database = new mysqli('localhost', 'root', '', 'site');

        if (mysqli_connect_errno()) {
            die('error with chat connection');
        }
    }

    public function rows()
    {
        for ($i = 1; $i <= $this->database->affected_rows; $i++) {
            $this->rows[] = $this->info->fetch_assoc();
        }
        return $this->rows;
    }

    public function retrieveChat($userid)
    {
        $this->info = $this->database->query("
			SELECT     chat.message, users.username, users.user_id						
			FROM       chat
			JOIN       users
			ON         chat.user_id = users.user_id
			WHERE      user_2='$userid' OR user_1='$userid' OR user_2='1'
			ORDER BY   chat.message_id
			ASC

		");
        //the user_2=1 represents everyone in the database. Make sure the mysql user_id is set to 1

        return $this->rows();
    }

}


?>
