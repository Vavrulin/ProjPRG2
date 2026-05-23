<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidence a rezervace knih</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header class="navbar-container">
        <h1>Moje Knihovna</h1>
        <nav>
            <ul class="nav-links">
                <li><a href="#">Domů</a></li>
                <li><a href="#">Knihy</a></li>
                <li><a href="#">Moje rezervace</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2 class="mainhead">Knihy k vypůjčení</h2>
            <div class="knihovna">
                <div class="knihovna">
                    <?php
                        include 'db.php';
                        $vysledek = mysqli_query($spojeni, "SELECT * FROM seznam_knih");

                        while($kniha = mysqli_fetch_assoc($vysledek)) {
                        echo '<div class="kniha">';
                        echo '    <h2>' . $kniha['nazev'] . '</h2>';
                        echo '    <p>Autor: ' . $kniha['autor'] . '</p>';
                        echo '    <a href="rezervace.php?kniha=' . urlencode($kniha['nazev']) . '">Rezervovat</a>';
                        echo '</div>';
                        }
                    ?>
</div>

        </div>
    </main>
    
        <script src="script.js"></script>
</body>
</html>
