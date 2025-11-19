<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Task Management System</title>
    <link rel="stylesheet" href="/task_management_system/css/style.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet"> 
    
</head>
<body class="login-page">
    <form class="login-form" action="app/login.php" method="POST">
        <h3 class="title">LOGIN</h3>
        <?php if (isset($_GET['error'])) {?>
            <div class="alert alert-danger" role="alert">
                <?php echo stripcslashes($_GET['error']);?> 
            </div>
        <?php } else if (isset($_GET['succes'])){?> 
            <div class="alert alert-success" role="alert">
                <?php echo stripcslashes($_GET['success']);?> 
            </div>
        <?php } ?>
        <div class="lab_input">
            <label class="form-label">User Name</label>
            <input type="text" name="user_name">
        </div>
        <div class="lab_input">
            <label class="form-label" >Password</label>
            <input type="password" name="password">
        </div>
        <button type="submit" class="btn-submit">Login</button>
    </form>
</body>
</html>