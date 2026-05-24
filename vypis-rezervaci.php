<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Seznam rezervací</title>
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
        <h2 class="mainhead">Aktuální rezervace v systému</h2>
        
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
                    $vysledek = mysqli_query($spojeni, "SELECT * FROM rezervace");
                    
                    while($radek = mysqli_fetch_assoc($vysledek)) {
                        echo "<tr>";
                        echo "<td>" . $radek['kniha'] . "</td>";
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
        
        <p style="text-align: center;"><a href="index.php">Zpět na hlavní stránku</a></p>
    </main>
</body>
</html>
