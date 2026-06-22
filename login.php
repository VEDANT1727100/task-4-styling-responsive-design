<link rel="stylesheet" href="style.css">
<?php
session_start();
include 'db.php';

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();
    echo "<pre>";
    print_r($user);
    echo "</pre>";
        if(password_verify($password, $user['PASSWORD']))
        {
            $_SESSION['user'] = $user['NAME'];
            header("Location: dashboard.php");
            exit();
        }
        else
        {
            echo "Incorrect Password!";
        }
    }
    else
    {
        echo "User Not Found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>User Login</h2>

<form method="POST">

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <input type="submit" name="login" value="Login">

</form>

</body>
</html>