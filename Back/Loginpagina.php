<?php
session_start();

function authenticateUser($username, $password) {
    $adminUsername = 'boss';
    $adminPassword = 'boss123';
    $customerUsername = 'klant';
    $customerPassword = 'klant123';

    if ($username === $adminUsername && $password === $adminPassword) {
        $_SESSION['userRole'] = 'boss';
        return true;
    } elseif ($username === $customerUsername && $password === $customerPassword) {
        $_SESSION['userRole'] = 'klant';
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (authenticateUser($username, $password)) {
        if ($_SESSION['userRole'] === 'boss') {
            header('Location: Overzicht_a.php');
            exit();
        } elseif ($_SESSION['userRole'] === 'klant') {
            header('Location: Home.php');
            exit();
        }
    } else {
        $errorMessage = 'Invalid username or password';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/main.css">
</head>
<body>
    <?php if (isset($errorMessage)): ?>
        <p><?php echo $errorMessage; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
