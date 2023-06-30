<?php include 'config.php';?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = !empty($_POST['name_book']) ? trim($_POST['name_book']) : null;
    $author = !empty($_POST['name_author']) ? trim($_POST['name_author']) : null;
    $genre = !empty($_POST['name_genre']) ? trim($_POST['name_genre']) : null;
    $ISBN = !empty($_POST['ISBN']) ? trim($_POST['ISBN']) : null;
    $taal = !empty($_POST['taal']) ? trim($_POST['taal']) : null;
    $paginas = !empty($_POST['paginas']) ? trim($_POST['paginas']) : null;
    $examplaren = !empty($_POST['examplaren']) ? trim($_POST['examplaren']) : null;
    $image = !empty($_FILES['img']['name']) ? $_FILES['img']['name'] : null;

    $targetDir = "../Pictures/";
    $targetFile = $targetDir . basename($_FILES["img"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile);

    $sql = "INSERT INTO books (name, author, genre, ISBN, taal, paginas, examplaren, image) VALUES (:name_book, :name_author, :name_genre, :ISBN, :taal, :paginas, :examplaren, :image)";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':name_book', $name);
    $stmt->bindValue(':name_author', $author);
    $stmt->bindValue(':name_genre', $genre);
    $stmt->bindValue(':ISBN', $ISBN);
    $stmt->bindValue(':taal', $taal);
    $stmt->bindValue(':paginas', $paginas);
    $stmt->bindValue(':examplaren', $examplaren);
    $stmt->bindValue(':image', $image);

    if ($stmt->execute()) {
        echo "<div class=\"boek\">";
        echo "<img src=\"$targetFile\" alt=\"book\">";
        echo "<h2>'" . $name . "'</h2>";
        echo "<h3>'By: " . $author . "'</h3>";
        echo "<button class='bekijken' value='Click'>Bekijken</button>";
        echo "</div>";

        header('location: ../index.php?page=boeken');
        exit(); // Add this line to stop further execution
    } else {
        header('location: ../index.php?page=toevoegen');
        echo 'Informatie klopt niet!';
        exit(); // Add this line to stop further execution
    }
}
?>
