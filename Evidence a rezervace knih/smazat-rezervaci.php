<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM rezervace WHERE id = $id";

if (mysqli_query($spojeni, $sql)) {
    header("Location: vypis-rezervaci.php");
} else {
    echo "Chyba: " . mysqli_error($spojeni);
}

mysqli_close($spojeni);
?>
