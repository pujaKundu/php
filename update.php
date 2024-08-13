<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="select * from `crud` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql="update `crud` set id=$id,name='$name',email='$email',mobile='$mobile',password='$password' where id=$id";

    $result=mysqli_query($con,$sql);

    if ($result) {
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Template</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="form-container">
        <h2>Registration Form</h2>
        <form action="#" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value=<?php echo $name ?> required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value=<?php echo $email ?> required>

            <label for="mobile">Mobile:</label>
            <input type="tel" id="mobile" name="mobile" value=<?php echo $mobile ?> required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value=<?php echo $password ?> required>

            <button type="submit" name="submit">Update</button>
        </form>
    </div>
</body>
</html>
