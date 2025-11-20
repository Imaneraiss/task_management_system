<?php 
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])){
    include "DB_connection.php";
    include "app/Model/Task.php";
    $tasks =get_all_tasks ($conn); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>All Tasks</title>
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
            <h4 class="title">All Tasks <a href="create_task.php" class="btn">Add Task</a></h4>
            <?php if($tasks != 0){?> 
            <table class="main-table">
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Assigned to</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($tasks as $task ){ ?>
                <tr>
                    <td><?= $task['id'] ?></td>
                    <td><?= $task['title'] ?></td>
                    <td><?= $task['description'] ?></td>
                    <td><?= $task['assigned_to'] ?></td>
                    <td>
                        <a href="edit-task.php?id=<?=$task['id']?>" class="btn edit-btn">Edit</a>
                        <a href="delete-task.php?id=<?=$task['id']?>" class="btn delete-btn">Delete</a>
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
        var active = document.querySelector("#navList li:nth-child(4)");
        active.classList.add("active");
    </script>
</body>
</html>
<?php }else{
	header("Location: login.php?error: First Login");
} ?>