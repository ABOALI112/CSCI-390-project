<?php

include '/xampp/htdocs/Practice/configuration.php';

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);


    $select_users = mysqli_query($conn, ' SELECT * from `users`  WHERE email = `$email` AND password = `$pass`')
        or die('Query Failed');

    if (mysqli_num_rows($select_users) > 0) {
        $message[] = 'user already exist!';
    } else {
        if ($pass != $confirm_password) {
            $row = mysqli_fetch_assoc($select_users);

            if ($row['user_type'] == 'user') {
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                header('Location:home.php');
            }
        } else {
            $message[] = 'incorrect email or password!';
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
    <title>Login </title>
    <link rel="stylesheet href="/css/style.css">
    </form>
    </div>

</head>

<body>
    

    <div class="form-container">
        <form action="" method="post">
            <h3>login now</h3>
            <input type="email" name="email" placeholder="Enter your email" required class="box">
            <input type="password" name="password" placeholder="Enter your password" required class="box">

            <input type="submit" name="submit" value="login now" class="btn">
            <p>don't have an account?</p> <a href="registration.php">Register</a> now</a>

</body>

</html>