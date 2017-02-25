<?php
require_once '../config/db.php';
require_once '../config/functions.php';

$featured_image = $_FILES['featured_image'];

if(move_uploaded_file($featured_image['tmp_name'], 'D:\xampp\htdocs\session\uploads\\'.$featured_image['name'])){
    $featured_image = $featured_image['name'];
}

$title = $_POST['title'];
$short_desc = $_POST['short_desc'];
$long_desc = $_POST['long_desc'];

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


