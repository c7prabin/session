<?php 
session_start();

if(!isset($_SESSION['username'])){
	header('Location: ../login.php');
}
?>
<a href="../logout.php">Logout User</a>
<form action="act-blog-add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <th>Title</th>
            <td><input type="text" name="title" required></td>
        </tr>
        <tr>
            <th>Short description</th>
            <td><textarea name="short_desc" required></textarea></td>
        </tr>
        <tr>
            <th>Long description</th>
            <td><textarea name="long_desc" required></textarea></td>
        </tr>
        <tr>
            <th>Featured Image</th>
            <td><input type="file" name="featured_image"></td>
        </tr>
    </table>
    <button type="submit">Save Data</button>
</form>
