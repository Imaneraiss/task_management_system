<?php 
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "employee") {
    include "DB_connection.php";
    include "app/Model/User.php";
    $user = get_user_by_id($conn, $_SESSION['id']);
    
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<input type="checkbox" id="checkbox">
	<?php include "inc/header.php" ?>
	<div class="body">
		<?php include "inc/nav.php" ?>
		<section class="section-1">
			<h4 class="title">Profile <a href="edit_profile.php" class="btn">Edit Profile</a></h4>
         <table class="main-table" style="max-width: 300px;">
				<tr>
					<td><b>Full Name </b> </td>
					<td><?=$user['full_name']?></td>
					<br>
				</tr>
				<tr>
					<td><b>User name</b></td>
					<td><?=$user['username']?></td>
					<br>
				</tr>
				<tr>
					<td><b>Joined At</b></td>
					<td><?=$user['created_at']?></td>
					<br>
				</tr>
			</table>

		</section>
	</div>

<script type="text/javascript">
	var active = document.querySelector("#navList li:nth-child(3)");
	active.classList.add("active");
</script>
</body>
</html>
<?php }else{ 
   $em = "First login";
   header("Location: login.php?error=$em");
   exit();
}
 ?>