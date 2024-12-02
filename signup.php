<?php
session_start();

$firstNameErrorMsg = $lastNameErrorMsg = $emailErrorMsg = $passwordErrorMsg = $confirmPasswordErrorMsg = "";
$firstNameValue = $lastNameValue = $emailValue = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstNameValue = $_POST["firstName"];
    $lastNameValue = $_POST["lastName"];
    $emailValue = $_POST["emailName"];
    $passwordValue = $_POST["passwordName"];
    $confirmPasswordValue = $_POST["confirmPassword"];
    $isValid = true;

    // Validation
    if ($firstNameValue == "") {
        $firstNameErrorMsg = "Please enter your first name.";
        $isValid = false;
    }

    if ($lastNameValue == "") {
        $lastNameErrorMsg = "Please enter your last name.";
        $isValid = false;
    }

    if ($emailValue == "") {
        $emailErrorMsg = "Please enter your email.";
        $isValid = false;
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@emsi\.ma$/", $emailValue)) {
        $emailErrorMsg = "Please enter a valid EMSI email.";
        $isValid = false;
    }

    if ($passwordValue == "") {
        $passwordErrorMsg = "Please enter your password.";
        $isValid = false;
    } elseif (strlen($passwordValue) < 8) {
        $passwordErrorMsg = "Password must be at least 8 characters.";
        $isValid = false;
    }

    if ($confirmPasswordValue == "") {
        $confirmPasswordErrorMsg = "Please confirm your password.";
        $isValid = false;
    } elseif ($passwordValue !== $confirmPasswordValue) {
        $confirmPasswordErrorMsg = "Passwords do not match.";
        $isValid = false;
    }

    if ($isValid) {
        $_SESSION["firstName"] = $firstNameValue;
        $_SESSION["lastName"] = $lastNameValue;
        $_SESSION["emailS"] = $emailValue;
        $_SESSION["passS"] = $passwordValue;
        header("Location: home.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .error { color: red; }
        form { max-width: 400px; margin: auto; }
        input, button { display: block; width: 100%; margin: 10px 0; padding: 10px; }
        button { background: blue; color: white; border: none; }
    </style>
</head>
<body>
    <h2>Signup</h2>
    <form method="post" action="">
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstNameValue); ?>" placeholder="First Name">
        <span class="error"><?php echo $firstNameErrorMsg; ?></span>

        <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastNameValue); ?>" placeholder="Last Name">
        <span class="error"><?php echo $lastNameErrorMsg; ?></span>

        <input type="text" name="emailName" value="<?php echo htmlspecialchars($emailValue); ?>" placeholder="Email">
        <span class="error"><?php echo $emailErrorMsg; ?></span>

        <input type="password" name="passwordName" placeholder="Password">
        <span class="error"><?php echo $passwordErrorMsg; ?></span>

        <input type="password" name="confirmPassword" placeholder="Confirm Password">
        <span class="error"><?php echo $confirmPasswordErrorMsg; ?></span>

        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
