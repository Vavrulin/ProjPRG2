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
        <h1>Evidence a rezervace knih</h1>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php">Domů</a></li>
                <li><a href="vypis-rezervaci.php">Moje rezervace</a></li>
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

                        $kniha_id = $kniha['id'];

                        $kniha_id = (int)$kniha['id'];

                        $kontrola = mysqli_query(
                            $spojeni,
                            "SELECT id FROM rezervace WHERE kniha_id = $kniha_id LIMIT 1"
                        );

                        $dostupna = mysqli_num_rows($kontrola) == 0;

                        $card_class = $dostupna ? 'kniha' : 'kniha nedostupna';
                        $btn_class = $dostupna ? 'button-style' : 'button-style disabled';
                        $href = $dostupna ? 'href="rezervace.php?id=' . $kniha['id'] . '"' : '';

                        echo '<div class="' . $card_class . '">';

                        if (!empty($kniha['obrazek'])) {
                            echo '<img src="' . htmlspecialchars($kniha['obrazek']) . '" alt="' . htmlspecialchars($kniha['nazev']) . '" class="kniha-cover">';
                        }

                        echo '<h2>' . htmlspecialchars($kniha['nazev']) . '</h2>';
                        echo '<p>Autor: ' . htmlspecialchars($kniha['autor']) . '</p>';

                        if (!$dostupna) {
                            echo '<span class="status-label">Nedostupné</span>';
                        }

                        echo '<a ' . $href . ' class="' . $btn_class . '">Rezervovat</a>';
                        echo '</div>';
                    }
                ?>
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

    <script src="script.js"></script>
</body>
</html>