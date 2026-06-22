<link rel="stylesheet" href="style.css">
<th>Edit</th>
<th>Delete</th>
<?php
include 'db.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
</head>
<body>

<h2>All Users</h2>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>City</th>
</tr>

<?php
while($row = $result->fetch_assoc())
{
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['NAME']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['city']; ?></td>

    <td>
        <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a>
    </td>

    <td>
        <a href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a>
    </td>
</tr>

<?php
}
?>

</table>

</body>
</html>