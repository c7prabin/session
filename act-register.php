<?php
session_start();

//ini_set('display_errors', false);
//error_reporting(E_ALL);

$post = $_POST;

if(!empty($post)){
    
    $first_name = $post['first_name'];
    $last_name = $post['last_name'];
    $email = $post['email'];
    $password = $post['password'];
    $cell_no = $post['cell_no'];
    $date_of_birth = $post['date_of_birth'];
    $created_at = date('Y-m-d H:i:s');
    
    $conn = mysqli_connect('localhost', 'root', '');
        
    if($conn){
        
        if(mysqli_select_db($conn, 'db_college')){
           
            $sql = "INSERT INTO `tbl_students` "
            . "(first_name, last_name, email, password, cell_no, date_of_birth, created_at) "
              . "VALUES ('$first_name', '$last_name', '$email', '$password', '$cell_no', '$date_of_birth', '$created_at')";
            
            
            if(mysqli_query($conn, $sql)){
                $_SESSION['flash_msg'] = 'Registration successful.';
                header('Location: login.php');
            } else {
                die('insert error.'. mysqli_error($conn));
            }
            
        } else {
            die('selection error'.mysqli_error($conn));
        }
        
        mysqli_close($conn);
    } else {
        die('connection error:'.  mysqli_connect_error());
    }
    
}