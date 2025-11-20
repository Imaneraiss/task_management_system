<?php 
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])){
    include "DB_connection.php";
    include "app/Model/User.php";
    $users =get_all_users ($conn); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QwTKZyjpPfjI5v5NaRU9OFeRpok6YctnYmDr5pNlyT2bRjXhQJMhjY6hh+ALEwTH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    </head>
<body>
	<input type="checkbox" id="checkbox">
		<?php include("inc/header.php")?>

	<div class="body">
		<?php include("inc/nav.php")?>;
        <section class="section-1">
            <h4 class="title">Manage Users <a href="add-user.php" class="btn">Add User</a></h4>
            <?php if($users != 0){?> 
            <table class="main-table">
                <tr>
                    <th>id</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Role</th>
                    <th> Action</th>
                </tr>
                <?php foreach ($users as $user ){ ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['full_name'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td>
                        <a href="edit-user.php?id=<?=$user['id']?>" class="btn edit-btn">Edit</a>
                        <a href="delete-user.php?id=<?=$user['id']?>" class="btn delete-btn">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <?php }else{?>
                <h4>Empty</h4>
            <?php } ?>
        </section>
	</div>
    <script type="text/javascript">
        var active = document.querySelector("#navList li:nth-child(2)");
        active.classList.add("active");
    </script>
</body>
</html>
<?php }else{
	header("Location: login.php?error: First Login");
} ?>