<?php
session_start();
include 'config.php';

if (isset($_POST['submit'])) {
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT id, username, password, userRole FROM login WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['userRole'] == 'admin') {
        $_SESSION['userRole'] = 'admin';
        header('Location: ../index.php?page=overzicht_a');
        exit();
    } elseif ($user && $user['userRole'] == 'user') {
        $_SESSION['userRole'] = 'user';
        header('Location: ../index.php?page=home');
        exit();
    } else {
        echo 'Informatie klopt niet!';
    }
}
?>