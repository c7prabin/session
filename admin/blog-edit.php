<?php 
require_once '../config/db.php';
require_once '../config/functions.php';

if(!isset($_SESSION['username'])){
	header('Location: ../login.php');
}

$blog_id = $_GET['blog_id'];
$sql = "SELECT * FROM tbl_blogs WHERE blog_id = $blog_id";
$result = mysql_query($sql);

if(!$result){
    die('Invalid blog id.');
}

$blog = mysql_fetch_assoc($result);

?>
<a href="../logout.php">Logout User</a>


<h1>Blog Edit</h1>
<form action="act-blog-edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="blog_id" value="<?= $blog['blog_id'] ?>">
    <table>
        <tr>
            <th>Title</th>
            <td><input type="text" name="title" value="<?= $blog['title'] ?>" required></td>
        </tr>
        <tr>
            <th>Short description</th>
            <td><textarea name="short_desc" required><?= $blog['short_desc'] ?></textarea></td>
        </tr>
        <tr>
            <th>Long description</th>
            <td><textarea name="long_desc" required><?= $blog['long_desc'] ?></textarea></td>
        </tr>
        <tr>
            <th>Featured Image</th>
            <td>
                <input type="file" name="featured_image">
                <img src="../uploads/<?= $blog['featured_img'] ?>" width="200">
            </td>
        </tr>
    </table>
    <button type="submit">Save Data</button>
</form>
