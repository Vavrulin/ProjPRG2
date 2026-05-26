<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Rezervace - Moje Knihovna</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header class="navbar-container">
        <h1>Moje Knihovna</h1>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php">Domů</a></li>
                <li><a href="vypis-rezervaci.php">Moje rezervace</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="rezervace-wrapper">
            <?php
                include 'db.php';

                $jmeno   = $_POST['form_jmeno'];
                $email   = $_POST['form_email'];
                $telefon = $_POST['form_tel'];
                $kniha   = $_POST['form_kniha'];

                $sql = "INSERT INTO rezervace (jmeno, email, telefon, kniha) VALUES ('$jmeno', '$email', '$telefon', '$kniha')";

                if (mysqli_query($spojeni, $sql)) {
                    echo '<h2>Hotovo</h2>';
                    echo '<h1>' . htmlspecialchars($kniha) . '</h1>';
                    echo '<p style="text-align:center; color:#6b6655; margin-bottom: 1.5rem;">Rezervace byla úspěšně uložena!</p>';
                } else {
                    echo '<p style="text-align:center; color:#b94040;">CHYBA DATABÁZE: ' . mysqli_error($spojeni) . '</p>';
                }

                mysqli_close($spojeni);
            ?>

            <div class="center-box">
                <a href="index.php" class="button-style">Zpět na hlavní stránku</a>
            </div>
        </div>
    </main>

</body>
</html>