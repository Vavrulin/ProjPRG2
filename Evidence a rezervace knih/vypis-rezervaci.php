<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Seznam rezervací</title>
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
        <h2 class="mainhead">Aktuální rezervace v systému</h2>

        <form method="GET" style="text-align:center; margin-bottom: 2rem;">
            <input 
                type="email" 
                name="email" 
                placeholder="Zadejte svůj email"
                required
                style="padding:10px; width:250px;"
    >

            <button type="submit" class="button-style">
            Zobrazit moje rezervace
            </button>
        </form>
        
        <table class="tabulka-rezervaci">
            <thead>
                <tr>
                    <th>Kniha</th>
                    <th>Jméno</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Akce</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'db.php';
                   $email = $_GET['email'] ?? '';

                    if ($email != '') {

                        $email_safe = mysqli_real_escape_string($spojeni, $email);

                        $vysledek = mysqli_query($spojeni, "
                            SELECT rezervace.*, seznam_knih.nazev
                            FROM rezervace
                            JOIN seznam_knih ON rezervace.kniha_id = seznam_knih.id
                            WHERE rezervace.email = '$email_safe'
                        ");

                    } else {

                        $vysledek = mysqli_query($spojeni, "
                            SELECT rezervace.*, seznam_knih.nazev
                            FROM rezervace
                            JOIN seznam_knih ON rezervace.kniha_id = seznam_knih.id
                            WHERE 1 = 0
                        ");
                    }
                    
                    while($radek = mysqli_fetch_assoc($vysledek)) {
                        echo "<tr>";
                        echo "<td>" . $radek['nazev'] . "</td>";
                        echo "<td>" . $radek['jmeno'] . "</td>";
                        echo "<td>" . $radek['email'] . "</td>";
                        echo "<td>" . $radek['telefon'] . "</td>";
                        echo "<td><a href='smazat-rezervaci.php?id=" . $radek['id'] . "' class='tlacitko-smazat' onclick='return confirm(\"Opravdu smazat?\")'>Zrušit</a></td>";
                        echo "</tr>";
                    }
                    mysqli_close($spojeni);
                ?>
            </tbody>
        </table>
        
        <p style="text-align: center; margin-top: 2.5rem;"><a href="index.php" class="button-style">Zpět na hlavní stránku</a></p>
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
