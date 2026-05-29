<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Rezervace - Moje Knihovna</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header class="navbar-container">
        <h1>Evidence a rezervace knih</h1>
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

                $jmeno = $_POST['form_jmeno'];
                $email = $_POST['form_email'];
                $telefon = $_POST['form_tel'];
                $kniha_id = $_POST['form_kniha_id'];

                $sql = "INSERT INTO rezervace (jmeno, email, telefon, kniha_id) VALUES ('$jmeno', '$email', '$telefon', '$kniha_id')";

                if (mysqli_query($spojeni, $sql)) {
                    echo '<h2>Hotovo</h2>';
                    echo '<h1>Rezervace byla vytvořena</h1>';
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

    <footer class="footer">
        <div class="footer-inner">
            <span class="footer-logo">Evidence a rezervace knih</span>
            <span class="footer-text">Jednoduchá správa výpůjček knih</span>
            <span class="footer-year">© <?php echo date('Y'); ?></span>
        </div>
    </footer>

</body>
</html>