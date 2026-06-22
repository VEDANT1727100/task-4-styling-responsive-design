<link rel="stylesheet" href="style.css">
<?php
include 'db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $result->fetch_assoc();

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];

    $conn->query("UPDATE users
    SET NAME='$name',
    email='$email',
    phone='$phone',
    city='$city'
    WHERE id=$id");

    header("Location: manage_users.php");
}
?>

<form method="POST">

Name:
<input type="text" name="name"
value="<?php echo $row['NAME']; ?>"><br><br>

Email:
<input type="email" name="email"
value="<?php echo $row['email']; ?>"><br><br>

Phone:
<input type="text" name="phone"
value="<?php echo $row['phone']; ?>"><br><br>

City:
<input type="text" name="city"
value="<?php echo $row['city']; ?>"><br><br>

<input type="submit" name="update"
value="Update User">

</form>