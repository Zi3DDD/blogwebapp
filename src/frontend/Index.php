<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vakantie Blogs</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <header class="blog-header">
        <h1>Vakantie Blogs</h1>
        <p>De laatste artikelen en tips</p>
    </header>

        <div class="categorie-filters">
            <input class="filter-input" placeholder="Zoeken..." type="search" id="site-search" name="q" />
            <button class="filter-knop">Zoek</button>
            <a href="#" class="filter-knop actief">Alle Hotels</a>
            <a href="#" class="filter-knop">Avontuurlijk</a>
            <a href="#" class="filter-knop">Centrum</a>
            <a href="#" class="filter-knop">Rust</a>
        </div>

<main class="blog-lijst">

    <article class="blog-kaart">
        <div class="kaart-foto">
            <img src="images/Kamer 1.jpg" alt="Wandelen in de natuur">
        </div>
        
        <div class="kaart-inhoud">
            <h2>Hotel in Bali</h2>
            <p class="meta-tekst">10 maart 2026 | Natuur</p>
            <p class="beschrijving">Ontdek de mooiste Hotel in Bali en geniet van de rust en schoonheid van de natuur.</p>
            <a href="blog.php" class="lees-meer-knop">Lees meer</a>
        </div>
    </article>

    <article class="blog-kaart">
        <div class="kaart-foto">
            <img src="images/Kamer 2.jpg" alt="Gezonde Ontbijtrecepten">
        </div>
        
        <div class="kaart-inhoud">
            <h2>De ultieme rust plek in Vietnam</h2>
            <p class="meta-tekst">15 februari 2026 | Gezondheid</p>
            <p class="beschrijving">Start je dag met deze mooie uitzicht!</p>
            <a href="blog.php" class="lees-meer-knop">Lees meer</a>
        </div>
    </article>

    <div class="categorie-filters">
            <input class="filter-input" type="text" placeholder="Naam" name="Naam" required>
            <input class="filter-input" type="text" placeholder="E-mail adres" name="mail" required>
            <button class="filter-knop">Submit</button>
    </div>

</main>

</body>
</html>