<?php
require_once '../config/db.php';
require_once '../config/functions.php';

//debug($_POST);

$featured_image = $_FILES['featured_image'];

if(move_uploaded_file($featured_image['tmp_name'], 'D:\xampp\htdocs\session\uploads\\'.$featured_image['name'])){
    $featured_image = $featured_image['name'];
}

$blog_id = $_POST['blog_id'];
$title = $_POST['title'];
$short_desc = $_POST['short_desc'];
$long_desc = $_POST['long_desc'];

$sql = "UPDATE tbl_blogs"
    . " SET title = '$title', short_desc = '$short_desc', long_desc = '$long_desc', featured_img = '$featured_image'"
    . " WHERE blog_id = $blog_id";

$result = mysql_query($sql);

if($result){
    $_SESSION['flash_msg'] = 'Data updated.';
    header('Location: blog.php');
} else {
    die('SQL Error: '. mysql_error());
}


