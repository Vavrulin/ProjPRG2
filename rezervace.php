<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Rezervace</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<main>
<h1 class="rezervace-header">Rezervace knihy</h1>

    <div class="stred-stranky">
        <form action="ulozeni-rezervace.php" method="POST" id="hlavni-formular">
            
        <input type="hidden" name="form_kniha" value="<?php echo $_GET['kniha']; ?>">

        <label for="jmeno">Celé jméno:</label>
            <input type="text" id="jmeno" name="form_jmeno" required>
    
            <label for="email">E-mailová adresa:</label>
            <input type="email" id="email" name="form_email" required>
    
            <label for="telefon">Telefonní číslo:</label>
            <input type="tel" id="telefon" name="form_tel">
    
            <button type="submit" class="potvrzovaci-tlacitko">Odeslat rezervaci</button>
        </form>
    </div>
        
    <a href="index.php">Zpět na výběr knih</a>

<?php 
    $vybrana_kniha = $_GET['kniha'] ?? 'Neznámá kniha'; 
?>

<h1>Rezervujete si knihu: <?php echo $vybrana_kniha; ?></h1>

        
</main>
</body>
</html>
