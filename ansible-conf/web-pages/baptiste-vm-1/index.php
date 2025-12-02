<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Les pensées de Baptiste 1</title>
    </head>
    <body>
        <p>Vous êtes curieux de savoir ce que je pense sur une personne ? Tentez votre chance ci-dessous.</p>

        <h2>Rechercher les adjectifs d'une personne</h2>
        <form method="post">
            <label for="person_name">Prénom :</label>
            <input type="text" id="person_name" name="person_name" required>
            <button type="submit">Rechercher</button>
        </form>

        <?php
        // Paramètres de connexion à la base de données
        $host = "192.168.22.67";
        $dbname = "cyril_db";
        $user = "cyril";
        $password = "lopez";

        // Connexion à la base de données
        try {
            $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        // Traitement de la requête
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $person_name = $_POST["person_name"];

            try {
                $stmt = $pdo->prepare("SELECT adjective FROM adjectives WHERE person_name ILIKE :person_name AND is_positive = TRUE");
                $like_person_name = "%$person_name%";
                $stmt->bindParam(':person_name', $like_person_name);
                $stmt->execute();

                $adjectives = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

                if (count($adjectives) > 0) {
                    echo "<h3>Adjectifs pour $person_name :</h3>";
                    echo "<ul>";
                    foreach ($adjectives as $adjective) {
                        echo "<li>$adjective</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Aucun adjectif trouvé pour $person_name.</p>";
                }
            } catch (PDOException $e) {
                echo "<p>Erreur lors de la récupération des adjectifs : " . $e->getMessage() . "</p>";
            }
        }
        ?>
    </body>
</html>
