<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HollaCine</title>
    <link rel="stylesheet" href="administration.css">
</head>

<body>
    <div class="container">
        <div class="ajouter_film">
            <h2>Ajouter un film</h2>
            <form action="" method="post">
                <input type="text" name="titre" placeholder="Entrez le titre">
                <input type="text" name="synopsis" placeholder="Entrez le synopsis">
                <input type="text" name="genre" placeholder="Entrez le genre">
                <input type="text" name="realisateur" placeholder="Entrez le realisateur">
                <input type="text" name="acteur" placeholder="Entrez l'acteur">
                <input type="text" name="miniature" placeholder="Entrez le lien de la miniature">
                <input type="submit" value="Ajouter un film">
            </form>
            <?php
            if (isset($_POST['titre']) & isset($_POST['synopsis']) & isset($_POST['genre']) & isset($_POST['realisateur']) & isset($_POST['acteur']) & isset($_POST['miniature'])) {
                $bdd = new PDO('mysql:host=127.0.0.1;dbname=hollacine;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $reponse = $bdd->query('SELECT * FROM films');

                $requete = 'INSERT INTO films VALUES(NULL, "' . $_POST['titre'] . '", "' . $_POST['synopsis'] . '", "' . $_POST['genre'] . '", "' . $_POST['realisateur'] . '", "' . $_POST['acteur'] . '", "' . $_POST['miniature'] . '")';
                $resultat = $bdd->query($requete);
            }
            ?>
        </div>

        <div class="modifier_film">
            <h2>Modifier un film</h2>
            <form action="" method="post">
                <input type="text" name="initial-titre" placeholder="Entrez le titre initial">
                <input type="text" name="new-titre" placeholder="Choisissez un  nouveau titre">
                <input type="text" name="new-synopsis" placeholder="Choisissez un  nouveau synopsis">
                <input type="text" name="new-genre" placeholder="Choisissez un  nouveau genre">
                <input type="text" name="new-realisateur" placeholder="Choisissez un  nouveau realisateur">
                <input type="text" name="new-acteur" placeholder="Choisissez un  nouvel acteur">
                <input type="text" name="new-miniature" placeholder="Choisissez une nouvelle minature">
                <input type="submit" value="Modifier un film">
            </form>
            <?php
            if (isset($_POST['initial-titre'])) {
                $bdd = new PDO('mysql:host=127.0.0.1;dbname=hollacine;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $reponse = $bdd->query('SELECT * FROM films');
                
                $requete = "UPDATE films SET titre='" . $_POST['new-titre'] . "',
        synopsis='" . $_POST['new-synopsis'] . "', genre='" . $_POST['new-genre'] . "',
        realisateur='" . $_POST['new-realisateur'] . "', acteur='" . $_POST['new-acteur'] . "',
        miniature='" . $_POST['new-miniature'] . "'WHERE titre='" . $_POST['initial-titre'] . "'";
                $resultat = $bdd->query($requete);
            }
            ?>
        </div>

        <?php
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=hollacine;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT * FROM films');
        // while ($donnees= $reponse->fetch()) {
        //     echo ' <img src="' . $donnees['miniature'] .'">';
        // }
        ?>

        <div class="supprimer_film">
            <h2>Supprimer un film</h2>
            <form action="" method="post">
                <input type="text" name="remove-titre" placeholder="Entrez le titre du film">
                <input type="submit" value="Supprimer un film">
            </form>
            <?php
            if (isset($_POST['remove-titre'])) {
                $bdd = new PDO('mysql:host=127.0.0.1;dbname=hollacine;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $reponse = $bdd->query('SELECT * FROM films');
                $requete = 'DELETE from films WHERE titre="' . $_POST['remove-titre'] . '"';
                $resultat = $bdd->query($requete);
            }
            ?>
        </div>

    </div>

</body>

</html>