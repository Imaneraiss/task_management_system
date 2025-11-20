<?php 
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])){
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['assigned_to'])){
        include("../DB_connection.php");
        function validate_input ($data){
            $data =trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $title  = validate_input(($_POST['title']));
        $description = validate_input($_POST['description']);
        $assigned_to  = validate_input(($_POST['assigned_to']));
        if (empty($title)){
            $err = "Title is required";
            header("Location:../create_task.php?error=$err");
            exit();
        }else if (empty($description)){
            $err = "Description is required";
            header("Location:../create_task.php?error=$err");
            exit();
        }else{
            try {
                include "Model/Task.php";
                $data = array($title,$description,$assigned_to);
                insert_task($conn,$data);
                header("Location:../create_task.php?success=Task created successfully");

            } catch (PDOException $e) {
                // Database error
                $em = "Database error: " . $e->getMessage();
                header("Location: ../create_task.php?error=$em");
                exit();
            }
        }
    }else {
        header("Location:../create_task.php?error=Unknown error");
        exit();
    }
}else{ 
   $em = "First login";
   header("Location: ../create_task.php?error=$em");
   exit();
}
?>