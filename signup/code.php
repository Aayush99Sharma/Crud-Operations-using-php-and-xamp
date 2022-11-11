<?php
session_start();
include('dbcon.php');

if(isset($_POST['save_student_btn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
 

    $query = "INSERT INTO tbl_member (username, email, password) VALUES (:username, :email, :password)";
    $query_run = $conn->prepare($query);

    $data = [
        ':username' => $username,
        ':email' => $email,
        ':password' => $password,
        
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: student-add.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Inserted";
        header('Location: student-add.php');
        exit(0);
    }
}

?>