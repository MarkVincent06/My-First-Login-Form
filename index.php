<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Log in</title>
</head>
<body>
    <form action="index.php" method="post" class="form-wrapper">
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>

        <input type="submit" name="submit" value="Login">

        <p>
            Don't have an account? Click <a href="signup.php">here</a> to sign up.
        </p>
    </form>

    <?php
        if(isset($_POST['submit'])) {
            require_once 'database.php';

            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM ita212exercise WHERE username = '$username' AND password = '$password'"; 
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                if($row['username'] === $username && $row['password'] === $password) {
                    echo "<h2 class='s-message'>Login success!</h2>";
                } else {
                    echo "<h2 class='e-message'>Invalid username or password.</h2>";
                }
            } else {
                echo "<h2 class='e-message'>Invalid username or password.</h2>";
            }
        }

    ?>


</body>
</html>