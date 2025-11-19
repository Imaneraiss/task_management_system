<?php 
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])){ ?>
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
            Manage Users
            <table class="table">
                <thead>  <!-- Fixed from <thread> to <thead> -->
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                </tbody>
            </table>
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