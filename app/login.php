<?php 
session_start();
if (isset($_POST['user_name']) && isset($_POST['password'])){
    include("../DB_connection.php");
    function validate_input ($data){
        $data =trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $user_name = validate_input($_POST['user_name']);
    $password  = validate_input(($_POST['password']));
    if (empty($user_name)){
        $err = "User name is required";
        header("Location:../login.php?error=$err");
        exit();
    }
    else if (empty($password)){
        $err = "Password is required";
        header("Location:../login.php?error=$err");
        exit();
    }else{
         try {
            // Prepare SQL statement
            $sql = "SELECT * FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$user_name]);

            // Check if user exists
            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch();
                $usernameDb = $user['username'];
                $passwordDb = $user['password'];
                $role = $user['role'];
                $id = $user['id']; 

                // Verify password
                if (password_verify($password, $passwordDb)) {
                    // Password is correct, set session variables
                    $_SESSION['role'] = $role;
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $usernameDb;
                    $_SESSION['loggedin'] = true;

                    // Redirect based on role
                    if ($role == "admin") {
                        header("Location: ../index.php");
                        exit();
                    } else if ($role == 'employee') {
                        header("Location: ../index.php");
                        exit();
                    } else {
                        $em = "Unknown user role";
                        header("Location: ../login.php?error=$em");
                        exit();
                    }
                } else {
                    // Incorrect password
                    $em = "Incorrect username or password";
                    header("Location: ../login.php?error=$em");
                    exit();
                }
            } else {
                // User not found
                $em = "Incorrect username or password";
                header("Location: ../login.php?error=$em");
                exit();
            }
        } catch (PDOException $e) {
            // Database error
            $em = "Database error: " . $e->getMessage();
            header("Location: ../login.php?error=$em");
            exit();
        }
    }
}else {
    header("Location:../login.php?error=Unknown error");
    exit();
}

?>