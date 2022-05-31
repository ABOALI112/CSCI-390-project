<?php

include '/xampp/htdocs/Practice/configuration.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['password']);
    $user_type = $_POST['user_type'];

    $select_users = mysqli_query($conn, ' SELECT * from `users`  WHERE email = `$email` AND password = `$pass`')
        or die('Query Failed');

    if (mysqli_num_rows($select_users) > 0) {
        $message[] = 'user already exist!';
    } else {
        if ($pass != $confirm_password) {
            $message[] = 'confirmed password is incorrect!';
        } else {
            mysqli_query($conn, "INSERT INTO `users`(name,email,password
            ,user_type)VALUES('$name','$email','$confirm_password','$user_type') ")
                or die('Query Failed');
            $message[] = 'Registered Successfully';
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet href="/css/style.css">
    </form>
    </div>

</head>

<body>

    <div class="form-container">
        <form action="" method="post">
            <h3>Register now</h3>
            <input type="text" name="name" placeholder="Enter your name" required class="box">
            <input type="email" name="email" placeholder="Enter your email" required class="box">
            <input type="password" name="password" placeholder="Enter your password" required class="box">
            <input type="password" name="password" placeholder="Confirm your password" required class="box">

            <select name="user_type" class="box">
                <option value="user">user</option>

            </select>

            <input type="submit" name="submit" value="register now" class="btn">
            <p>Already have an account?</p> <a href="login.php">Login now</a>

</body>

</html>