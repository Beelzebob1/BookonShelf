<?php
include 'config.php';
session_start();
    if(ISSET($_POST['submit'])){
        $naam = !empty($_POST['naam']) ? trim($_POST['naam']) : null;
        $email = !empty($_POST['email']) ? trim($_POST['email']) : null;    
        $gebruikersnaam = !empty($_POST['gebruikersnaam']) ? trim($_POST['gebruikersnaam']) : null;
        $wachtwoord = !empty($_POST['wachtwoord']) ? trim($_POST['wachtwoord']) : null;

        if($_POST['naam']!= "" || $_POST['email'] != "" || $_POST['gebruikersnaam'] != "" || $_POST['wachtwoord'] != ""){
            try{
                $naam = $_POST['naam'];
                $email = $_POST['email'];
                $gebruikersnaam = $_POST['gebruikersnaam'];
                $wachtwoord = $_POST['wachtwoord'];
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO `users` VALUES ('', '$naam', '$email', '$gebruikersnaam')";
				$conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
			$conn = null;
			header('location: ../index.php?page=home');
		}else{
			echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'Mains/registratie.inc.php'</script>
			";
            }
        }
?>
