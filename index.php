<?php $page= $_GET ['page'];
?>
<?php
    include_once 'php/config.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/main.css">
    <link rel="shortcut icon" href="Pictures/Logo/favicon.png" type="image/x-icon">
    <title>BookOnShelf</title>
</head>
<body>

    <?php
    include 'Mains/' . $page . '.inc.php';
    ?>
    
</body>
</html>