<?php

session_start();

if (isset($_SESSION['username']) || isset($_SESSION['user_id']) === true) {
    header('Location: chat.php');
}
?>
<html>
<body>
<form action='login/login.php' method='POST'>
    Username: <input type='text' name='username'><br>
    Password: <input type='password' name='password'><br>
    <input type='submit' value='Log in'>
</form>

<br> <br>
<a href="registration/registration.php">Click Here to Register </a>

</body>
</html>