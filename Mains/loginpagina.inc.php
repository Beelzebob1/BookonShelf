
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

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (authenticateUser($username, $password)) {
        if ($_SESSION['userRole'] === 'boss') {
            header('Location: ../index.php?page=overzicht_a');
            exit();
        } elseif ($_SESSION['userRole'] === 'klant') {
            header('Location: ../index.php?page=home');
            exit();
        }
    } else {
        $errorMessage = 'Invalid username or password';
    }
}



?>



    <?php if (isset($errorMessage)): ?>
        <p><?php echo $errorMessage; ?></p>
    <?php endif; ?>
    <form method="POST" action="loginpagina.inc.php">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
