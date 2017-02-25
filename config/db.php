<?php
session_start();

// 1. database connection
if (!mysql_connect('localhost', 'root', '')) {
    die('connection error: '. mysql_error());
}
// 2. database selection
if (!mysql_select_db('db_college')) {
    die('selection error: '. mysql_error());
}