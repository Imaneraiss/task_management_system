<?php 
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])){
    if (isset($_POST['full_name']) && isset($_POST['user_name']) && isset($_POST['password'])){
        include("../DB_connection.php");
        function validate_input ($data){
            $data =trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $full_name = validate_input(($_POST['full_name']));
        $user_name = validate_input($_POST['user_name']);
        $password  = validate_input(($_POST['password']));
        $id        = validate_input(($_POST['id']));
        if (empty($user_name)){
            $err = "User name is required";
            header("Location:../edit-user.php?error=$err");
            exit();
        }else if (empty($password)){
            $err = "Password is required";
            header("Location:../edit-user.php?error=$err");
            exit();
        }else if (empty($full_name)){
            $err = "Full name is required";
            header("Location:../edit-user.php?error=$err");
            exit();
        }else{
            try {
                include "Model/User.php";
                $hashpass =password_hash($password,PASSWORD_DEFAULT);
                $data = array($full_name,$user_name,$hashpass,"employee",$id,"employee");
                update_user($conn,$data);
                header("Location:../edit-user.php?success=User updated successfully");

            } catch (PDOException $e) {
                // Database error
                $em = "Database error: " . $e->getMessage();
                header("Location: ../edit-user.php?error=$em");
                exit();
            }
        }
    }else {
        header("Location:../edit-user.php?error=Unknown error");
        exit();
    }
}else{ 
   $em = "First login";
   header("Location: ../edit-user.php?error=$em");
   exit();
}
?> 