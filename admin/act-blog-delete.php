<?php
require_once '../config/db.php';
require_once '../config/functions.php';

//debug($_POST);

$blog_id = $_GET['blog_id'];

// get image name to delete
$sql = "SELECT featured_img FROM tbl_blogs WHERE blog_id = $blog_id";
$result = mysql_query($sql);
$blog = mysql_fetch_assoc($result);

// delete file using full path
unlink('D:\xampp\htdocs\session\uploads\\'.$blog['featured_img']);

// delete record from table
$sql = "DELETE FROM tbl_blogs WHERE blog_id = $blog_id";

$result = mysql_query($sql);

if($result){
    $_SESSION['flash_msg'] = 'Data deleted.';
    header('Location: blog.php');
} else {
    die('SQL Error: '. mysql_error());
}


