<?php
session_start();
if (!isset($_SESSION["emailS"])) {
    header("Location: signup.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Welcome to Home Page</h2>
    <p>Your Information:</p>
    <p>Email: <?php echo htmlspecialchars($_SESSION["emailS"]); ?></p>
    <p>Password: <?php echo htmlspecialchars($_SESSION["passS"]); ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
