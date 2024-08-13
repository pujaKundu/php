<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO `crud` (name, email, mobile, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $mobile, $password);

    if ($stmt->execute()) {
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }

    $stmt->close();
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
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mobile">Mobile:</label>
            <input type="tel" id="mobile" name="mobile" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="submit">Register</button>
        </form>
    </div>
</body>
</html>
