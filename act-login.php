<?php

require_once 'config/db.php';

$username = $_POST['username'];
$password = $_POST['password'];


// 3. query prepare
$sql = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'";
// 4. run query
$result = mysql_query($sql);
// 5. check resource/result
if ($result) {
    // 6. check rows
    if (mysql_num_rows($result) > 0) {
        $user = mysql_fetch_assoc($result);
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $username;
        $_SESSION['last_logged_in'] = date('Y-m-d h:i A');
        header('Location: admin/blog.php');
    } else {
        $_SESSION['flash_msg'] = 'Email/Password incorrect.';
        header('Location: login.php');
    }
} else {
    die('error:' . mysql_error());
}
?>