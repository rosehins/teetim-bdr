<?php
$thm = $_GET['thm'] ?? 1;
$nb = intval($_GET['nb']) ?? 10;

// Étape 1: connexion à la BD MySQL (avec le librairie PDO)
// Mini étape 0: définir le DSN (Data Source Name)
$dsn = "mysql:host=db;dbname=teetim;charset=utf8mb4"; // chaîne spécifique à MySQL
$cnx = new PDO($dsn, 'teetim', 'teetim', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

// Étape 2: écrire et préparer une requête **** paramétrée**** SQL
$sql = "SELECT nom, prix, ventes FROM produit WHERE thm_id=? LIMIT 10";
$reqParametree = $cnx->prepare($sql);

// Étape 3: Soumettre la requête SQL au serveur MySQL
$resultat = $reqParametree->execute([$thm]);
$enregistrements = $reqParametree->fetchAll(PDO::FETCH_OBJ);
// Déboguer
// print_r($enregistrements);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test intégration PHP/MySQL</title>
</head>
<body>
    <h2><?= $nb; ?> produits par thème (<?= $thm; ?>) </h2>

    <?php foreach($enregistrements as $ligne) : ?>
        <div>
            <span><?= $ligne->nom; ?></span> /
            <span><?= $ligne->prix; ?></span> /
            <span><?= $ligne->ventes; ?></span>

        </div>
        <?php endforeach; ?>
    
    
</body>
</html>