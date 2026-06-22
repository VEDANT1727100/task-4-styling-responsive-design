<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<link rel="stylesheet" href="style.css">
<script>
function validateForm()
{
    let name = document.forms["regForm"]["name"].value;
    let email = document.forms["regForm"]["email"].value;
    let phone = document.forms["regForm"]["phone"].value;
    let password = document.forms["regForm"]["password"].value;

    if(name == "")
    {
        alert("Name is required");
        return false;
    }

    if(email == "")
    {
        alert("Email is required");
        return false;
    }

    if(phone.length != 10)
    {
        alert("Phone number must be 10 digits");
        return false;
    }

    if(password.length < 6)
    {
        alert("Password must be at least 6 characters");
        return false;
    }

    return true;
}
</script>
<link rel="stylesheet" href="style.css">
<?php
include 'db.php';

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    echo "<h3 style='color:red'>
    Please enter a valid email address.
    </h3>";
    exit();
}
}
{
    echo "<h3 style='color:red'>
Please enter a valid email address.
</h3>";
exit();
}
    if(empty($name))
{
    die("Name is required");
}

if(empty($email))
{
    die("Email is required");
}

if(strlen($phone) != 10)
{
    echo "<h3 style='color:red'>
Phone number must contain 10 digits.
</h3>";
exit();
}

if(strlen($_POST['password']) < 6)
{
   echo "<h3 style='color:red'>
Password must be at least 6 characters.
</h3>";
exit();
}

   $stmt = $conn->prepare(
"INSERT INTO users(NAME,email,PASSWORD,phone,city)
VALUES(?,?,?,?,?)"
);

$stmt->bind_param(
"sssss",
$name,
$email,
$password,
$phone,
$city
);

if($stmt->execute())
{
    echo "Registration Successful!";
}
else
{
    echo "Error: " . $stmt->error;
}

    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>

<div class="container">

<h2>User Registration</h2>

<form name="regForm" method="POST" onsubmit="return validateForm()">

    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" required><br><br>

    <label>City:</label><br>
    <input type="text" name="city" required><br><br>
    
    
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <input type="submit" name="register" value="Register">

</form>

</body>
</html>