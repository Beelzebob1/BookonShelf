<?php $page . 'inc.php'?>
<?php include 'Mains/nav.inc.php'?>
<?php include 'php/toevoeg.php'?>
<div class="boeken">

<?php
$sql = "SELECT * FROM books";
$stmt = $conn->query($sql);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($books as $book) {
    echo '<div class="boek">';
    echo '<img src="Pictures/' . $book['image'] . '" alt="book">';
    echo '<h2>' . $book['name'] . '</h2>';
    echo '<h3>By: ' . $book['author'] . '</h3>';
    echo '<button class="bekijken" value="Click"> Bekijken</button>';
    echo '</div>';
}
    ?>
    </div>