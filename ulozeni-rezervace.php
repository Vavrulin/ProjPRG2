<?php

include 'db.php';

$jmeno = $_POST['form_jmeno'];
$email = $_POST['form_email'];
$telefon = $_POST['form_tel'];
$kniha = $_POST['form_kniha'];

$sql = "INSERT INTO rezervace (jmeno, email, telefon, kniha) VALUES ('$jmeno', '$email', '$telefon', '$kniha')";

if (mysqli_query($spojeni, $sql)) {
    echo "Rezervace ulozena!";
    echo '<p><a href="index.php" style="text-decoration: none; background-color: #3498db; color: white; padding: 10px 20px; border-radius: 5px;">Zpět na hlavní stránku</a></p>';
} else {
    
    echo "CHYBA DATABÁZE: " . mysqli_error($spojeni);
}


mysqli_close($spojeni);
?>
