<?php 
session_start();

if(!isset($_SESSION['username'])){
	header('Location: form.php');
}
?>

This page is private. I am a private data. My name is in session. (<?= $_SESSION['username'] ?>)

<br>I was logged in at: <?= $_SESSION['last_logged_in'] ?><br>

<a href="logout.php">Logout</a>