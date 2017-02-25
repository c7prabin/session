<?php
session_start() ?>
<?php 
if(isset($_SESSION['flash_msg'])){
    echo $_SESSION['flash_msg'];
    unset($_SESSION['flash_msg']);
} 
?>
<form action="act-login.php" method="post">

    <label>Username</label><br>
    <input type="text" name="username"><br>

    <label>Password</label><br>
    <input type="password" name="password"><br>

    <button type="submit">Login</button>	
</form>