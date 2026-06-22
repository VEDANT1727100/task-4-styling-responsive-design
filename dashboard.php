<link rel="stylesheet" href="style.css">
<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome <?php echo $_SESSION['user']; ?></h2>

<p>Login Successful!</p>

<a href="logout.php">Logout</a>

</body>
</html>
<h2>Welcome to Dashboard</h2>

<div class="menu">
    <a href="manage_users.php">Manage Users</a>
    <a href="logout.php">Logout</a>
</div>