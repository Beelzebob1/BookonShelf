<?php $page . 'inc.php';?>
<?php include 'Mains/nav_2.inc.php';?>

<div class="tvgn">
<form action="php/toevoeg.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="img" required>
  <input type="text" name="name_book" placeholder="Naam Book" required>
  <input type="text" name="name_author" placeholder="Naam Author" required>
  <input type="text" name="name_genre" placeholder="Genre" required>
  <input type="text" name="ISBN" placeholder="ISBN" required>
  <input type="text" name="taal" placeholder="Taal" required>
  <input type="text" name="paginas" placeholder="Aantal Pagina's" required>
  <input type="text" name="examplaren" placeholder="Examplaren" required>
  <button type="submit" class="insert">Insert</button>
</form>
</div>
