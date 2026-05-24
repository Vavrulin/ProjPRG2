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
            <?php $vybrana_kniha = $_GET['kniha'] ?? 'Neznámá kniha'; ?>
            
            <h2>Rezervace knihy</h2>
            <h1 style="text-align:center; color:#004488;"><?php echo htmlspecialchars($vybrana_kniha); ?></h1>

            <form action="ulozeni-rezervace.php" method="POST" id="hlavni-formular">
                <input type="hidden" name="form_kniha" value="<?php echo htmlspecialchars($vybrana_kniha); ?>">

                <label for="jmeno">Celé jméno:</label>
                <input type="text" id="jmeno" name="form_jmeno" required>
        
                <label for="email">E-mailová adresa:</label>
                <input type="email" id="email" name="form_email" required>
        
                <label for="telefon">Telefonní číslo:</label>
                <input type="tel" id="telefon" name="form_tel">
        
                <button type="submit" class="potvrzovaci-tlacitko">Odeslat rezervaci</button>
            </form>

            <div class="center-box">
                <a href="index.php" class="button-style">Zpět na výběr knih</a>
            </div>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>
