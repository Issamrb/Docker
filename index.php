<?php
// Connexion à la base de données MySQL
$host = 'localhost'; // nom de l'hôte
$dbname = 'site_db'; // nom de la base de données
$username = 'votre_nom_utilisateur'; // utilisateur MySQL
$password = 'votre_mot_de_passe'; // mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des phrases depuis la base de données
$sql = "SELECT texte FROM phrases";
$stmt = $pdo->query($sql);
$phrases = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur mon site</title>
</head>
<body>
    <h1>Bienvenue sur mon site</h1>
    
    <h2>Messages de la base de données :</h2>
    <ul>
        <?php foreach ($phrases as $phrase): ?>
            <li><?php echo htmlspecialchars($phrase['texte']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
