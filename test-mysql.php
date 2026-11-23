<?php
// Étape 1: connexion à la BD MySQL
$cnx = new mysqli('db', 'teetim', 'teetim', 'teetim');

// Étape 2: écrire une requête SQL
$sql = "SELECT theme.nom, SUM(ventes) 
    FROM produit 
    JOIN theme ON thm_id=theme.id
    WHERE cat_id=1
    GROUP BY thm_id
    ORDER BY ventes_totales DESC";

// Étape 3: Soumettre la requête SQL au serveur MySQL
$resultat = $cnx->query($sql);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test intégration PHP/MySQL</title>
</head>
<body>
    <h2>Ventes totales par nom de thème</h2>
    <ul>
<!-- Utiliser le résultat de la requête obtenu en haut de la page pour afficher les LI dans la liste...-->

    <?php while($ligne = $resultat->fetch_object()) : ?>
        <li><?= $ligne['nom']; ?> : <?= $ligne->ventes_totales; ?></li>
        <?php endwhile; ?>
    </ul>
    
    
</body>
</html>