<?php
require_once '../config/db.php';

$title = $_POST['title'];
$short_desc = $_POST['short_desc'];
$long_desc = $_POST['long_desc'];
$featured_image = null;
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO tbl_blogs"
    . " (title, short_desc, long_desc, featured_img, user_id)"
    . " VALUES ('$title', '$short_desc', '$long_desc', '$featured_image', $user_id)";

$result = mysql_query($sql);

if($result){
    $_SESSION['flash_msg'] = 'Data inserted.';
    header('Location: blog.php');
} else {
    die('SQL Error: '. mysql_error());
}


