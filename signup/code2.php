<?php
session_start();
include('dbcon.php');

if(isset($_POST['update_student_btn']))
{
    $student_id = $_POST['student_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
  

    try {

        $query = "UPDATE tbl_member SET username=:username, email=:email, password=:password WHERE id=:stud_id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':stud_id' => $student_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: fetch2.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
            header('Location: fetch2.php');
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>