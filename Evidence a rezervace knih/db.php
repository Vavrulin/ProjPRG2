<?php
$server = "localhost";
$uzivatel = "root";
$heslo = "";
$databaze = "knihovna";

$spojeni = mysqli_connect($server, $uzivatel, $heslo, $databaze);
mysqli_set_charset($spojeni, "utf8");


if (!$spojeni) {
    die("Chyba pripojeni: " . mysqli_connect_error());
}
?>
