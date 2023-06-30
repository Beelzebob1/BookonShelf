<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "INSERT INTO users (name, email, username, password, userRole) VALUES (:name, :email, :username, :password, :userRole)";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':userRole', 'user');

    if ($stmt->execute()) {
        header('location: ../index.php?page=loginpagina');
    } else {
        header('location: ../index.php?page=registratie');
        echo'Infromatie klopt niet!';
    }
}
?>

