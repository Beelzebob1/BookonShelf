<?php
    require 'Mains/registratie.inc.php';
?>
<?php
    if (isset($_POST["submit"])){
        $naam = $_POST["naam"];
        $gebruikersnaam = $_POST["gebruikersnaam"];
        $email = $_POST["email"];
        $wachtwoord = $_POST["wachtwoord"];
        $errors = array();
        if(empty($naam) || empty($email) || empty($gebruikersnaam) || empty($wachtwoord)){
            array_push($errors, "Vul alstublieft de lege plekken in.");
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($errors, "E-mail niet geldig.");
        }
        if(strlen($wachtwoord) < 8){
            array_push($errors, "Wachtwoord moet minimaal 8 karakters zijn.");
        }
        if(count($errors) > 0){
            foreach($errors as $error){
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {
            echo "<div class='alert alert-success'>Registratie succesvol!</div>";
        }
    }
?>