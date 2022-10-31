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
    <title>Sign up</title>
</head>
<body>
    <form action="signup.php" method="post" class="form-wrapper">
        <h1>Sign up</h1>
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="text" name="phone" placeholder="Phone Number"><br><br>

        <input type="submit" name="submit" value="Sign up">

        <p>
            Already have an account? Click <a href="index.php">here</a> to log in.
        </p>
    </form>

    <?php
        if(isset($_POST['submit'])) {
            require_once 'database.php';

            $username = $_POST['username'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];

            if(empty($username) || empty($password) || empty($phone)) {
                echo "<h2 class='e-message'>All fields must be filled.</h2>" ;
            } else {
                $sql = "SELECT * FROM ita212exercise WHERE username = '$username'";
                $unique = mysqli_query($conn, $sql);
                if(mysqli_num_rows($unique)) {
                    echo "<h2 class='e-message'>Username already exists.</h2>";
                } else {
                    $sql = "INSERT INTO ita212exercise (username, password, phone)
                            VALUES ('$username', '$password', '$phone')";
                    mysqli_query($conn, $sql);

                    echo "<h2 class='s-message'>Registration succesful.</h2>";
                }
            }
            
        }
    ?>
</body>
</html>