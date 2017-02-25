<?php
require_once '../config/db.php';

$sql = "SELECT b.*, u.username FROM tbl_blogs AS b"
        . " JOIN tbl_users AS u ON b.user_id = u.user_id"
        . " WHERE u.user_id = {$_SESSION['user_id']}";

$result = mysql_query($sql);
?>

<p>
    <a href="blog-add.php">Add New</a> / 
    <a href="../logout.php">Logout</a>
</p>
<?php
if (isset($_SESSION['flash_msg'])) {
    echo $_SESSION['flash_msg'];
    unset($_SESSION['flash_msg']);
}
?>

<table width="100%" border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Title</th>
            <th>Written By</th>
            <th>Posted At </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result) {
            $count = 1;
            while ($blog = mysql_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td><img src="../uploads/<?= $blog['featured_img'] ?>" width="100"></td>
                    <td><?= $blog['title'] ?></td>
                    <td><?= $blog['username'] ?></td>
                    <td><?= $blog['created_at'] ?></td>
                    <td>
                        <a href="blog-edit.php?blog_id=<?= $blog['blog_id'] ?>">Edit</a>
                        /
                        <a href="act-blog-delete.php?blog_id=<?= $blog['blog_id'] ?>" onclick="return confirm('Confirm delete?')">Delete</a></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="4">No data in blog table.</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
