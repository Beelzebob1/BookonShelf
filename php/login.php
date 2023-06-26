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
    if($_SESSION['userRole'] = 'boss'){
        include 'Mains/nav_1.inc.php';
    } elseif($_SESSION['userRole'] = 'klant'){
        include 'Mains/nav_1.inc.php';
    }
    else{
        include 'Mains/nav.inc.php';
    }

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (authenticateUser($username, $password)) {
        if ($_SESSION['userRole'] === 'boss') {
            header('Location: index.php?page=overzicht_a');
            exit();
        } elseif ($_SESSION['userRole'] === 'klant') {
            header('Location: index.php?page=home');
            exit();
        }
    } else {
        $errorMessage = 'Invalid username or password';
    }
}



?>