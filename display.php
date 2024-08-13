<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div class="container">
        <h2>User Management</h2>

        <!-- Add User Form -->
        <div>
            <h3>Add User</h3>
            <button type="submit" name="submit">
                <a href="user.php" target="_blank">Add User</a>
            </button>
        </div>

        <!-- Users Table -->
        <div class="table-container">
            <h3>Existing Users</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "Select * from `crud`";
                        $result = mysqli_query($con,$sql);
                        if($result){
                           
                            while($row=mysqli_fetch_assoc($result)){
                                $id=$row['id'];
                                $name=$row['name'];
                                $email=$row['email'];
                                $mobile=$row['mobile'];
                                $password=$row['password'];
                                echo ' <tr>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$email.'</td>
                        <td>'.$mobile.'</td>
                        <td>'.$password.'</td>
                        <td>
                            <a href="update.php?updateid='.$id.'" class="btn-update">Update</a>
                            <a href="delete.php?deleteid='.$id.'" class="btn-delete"
                                onclick="return confirm("Are you sure you want to delete this user?");">Delete</a>
                        </td>
                    </tr>';
                            }
                        }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</body>

</html>