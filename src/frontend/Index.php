<?php 
require_once 'classblog.php'; 

// functie blog aanroepen
$blogs = $_Blog->readBlog();

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vakantie Blogs</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <header class="blog-header">
        <h1><a href="index.php" style="text-decoration: none; color: inherit;">Vakantie Blogs</a></h1>
        <p>De laatste artikelen en tips</p>
    </header>

    <div class="categorie-filters">
        <input class="filter-input" placeholder="Zoeken..." type="search" id="site-search" name="q" />
        <button class="filter-knop">Zoek</button>
        <a href="#" class="filter-knop actief">Alle Hotels</a>
        <a href="#" class="filter-knop">Bergen</a>
        <a href="#" class="filter-knop">Zee</a>
        <a href="#" class="filter-knop">Stad</a>
        <a href="#" class="filter-knop">Bossen</a>
    </div>

    <main class="blog-lijst">

        <?php if (count($blogs) > 0): ?>
            <?php foreach ($blogs as $blog): ?>
                <article class="blog-kaart">
                    <div class="kaart-foto">

                    <img src="uploads/<?php echo $blog['filename']; ?>">
                    </div>
                    
                    <div class="kaart-inhoud">
                        <h2><?= htmlspecialchars($blog['titel']) ?></h2>
                        <p class="meta-tekst">
                            <?= date('d-m-Y', strtotime($blog['created_at'])) ?> | <?= htmlspecialchars($blog['categorie']) ?>
                        </p>
                        <p class="beschrijving">
                            <?php 
                            $korte_tekst = substr(strip_tags($blog['text']), 0, 150); 
                            echo htmlspecialchars($korte_tekst) . '...'; 
                            ?>
                        </p>
                        <a href="blog.php?id=<?= $blog['id'] ?>" class="lees-meer-knop">Lees meer</a>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Er zijn op dit moment nog geen blogs gevonden.</p>
        <?php endif; ?>

        <div class="categorie-filters" style="margin-top: 40px;">
            <input class="filter-input" type="text" placeholder="Naam" name="Naam">
            <input class="filter-input" type="email" placeholder="E-mail adres" name="mail">
            <button class="filter-knop">Submit</button>
        </div>

    </main>

</body>
</html>