<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>HollaCine</title>
</head>




<body>
    <header>
        <div id="navbar">
            <h2 href="#default" id="logo">Holla Ciné</h2>
        </div>
        <div id="navbar_info">
            <a href="#SERIE">SERIE</a>
            <a href="#FILM">FILM</a>
            <a href="#DESSIN ANIME">DESSIN ANIME</a>
            <a href="#ENFANTS">ENFANTS</a>
            <a href="#DOCUMENTAIRE">DOCUMENTAIRE</a>
            <a href="administration.php">&#x2659;</a>

        </div>
    </header>
    <div class="filtres">
        <!-- <a><input type="text" placeholder="Search..."></a>-->
        <form action="" method="post">
            <input type="text" placeholder="Filtrer par genre" name="filter-genre">
            <input type="submit" value="Filtrer">
        </form>
        <form action="" method="post">
            <input type="text" Placeholder="Filtrer par realisateur" name="filter-realisateur">
            <input type="submit" value="Filtrer">
        </form>
        <?php
        if (isset($_POST['filter-genre'])) {
            echo '<h3> Films du genre ' . $_POST['filter-genre'] . '</h3>';
            echo '<div class="container2">';

            $bdd = new PDO('mysql:host=localhost;dbname=id15850098_hollacine;charset=utf8', 'id15850098_root', 'e4HTr8qe974!', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $reponse = $bdd->query('SELECT * FROM films WHERE genre LIKE "' . '%' . $_POST['filter-genre'] . '%' . '"');
            while ($donnees = $reponse->fetch()) {

                echo '<div class="film">';
            echo '<div class="titre">' . $donnees['titre'] . '</div>';
            echo '<div class="miniature"><img class="img" src="' . $donnees['miniature'] . '"></div>';
            echo '<div class="description">';
            echo '<span class="infos">' . $donnees['synopsis'] . '<span> </br>';
            echo '<span class="infos">Acteurs: ' . $donnees['acteur'] . '<span> </br>';
            echo '<span class="infos">Réalisé par ' . $donnees['realisateur'] . '<span> </br>';
            echo '<span class="infos">Genre: ' . $donnees['genre'] . '<span>';
            echo '</div>';
            echo '</div>';
            }
            echo '</div>';
        }
        ?>
        <?php
        if (isset($_POST['filter-realisateur'])) {
            echo '<h3>Films réalisés par ' . $_POST['filter-realisateur'] . '</h3>';
            echo '<div class="container2">';

            $bdd = new PDO('mysql:host=localhost;dbname=id15850098_hollacine;charset=utf8', 'id15850098_root', 'e4HTr8qe974!', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $reponse = $bdd->query('SELECT * FROM films WHERE realisateur LIKE "' . '%' . $_POST['filter-realisateur'] . '%' . '"');
            while ($donnees = $reponse->fetch()) {

                echo '<div class="film">';
            echo '<div class="titre">' . $donnees['titre'] . '</div>';
            echo '<div class="miniature"><img class="img" src="' . $donnees['miniature'] . '"></div>';
            echo '<div class="description">';
            echo '<span class="infos">' . $donnees['synopsis'] . '<span> </br>';
            echo '<span class="infos">Acteurs: ' . $donnees['acteur'] . '<span> </br>';
            echo '<span class="infos">Réalisé par ' . $donnees['realisateur'] . '<span> </br>';
            echo '<span class="infos">Genre: ' . $donnees['genre'] . '<span>';
            echo '</div>';
            echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </div>


    <div class="container">
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=id15850098_hollacine;charset=utf8', 'id15850098_root', 'e4HTr8qe974!', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT * FROM films');
        while ($donnees = $reponse->fetch()) {
            echo '<div class="film">';
            echo '<div class="titre">' . $donnees['titre'] . '</div>';
            echo '<div class="miniature"><img class="img" src="' . $donnees['miniature'] . '"></div>';
            echo '<div class="description">';
            echo '<span class="infos">' . $donnees['synopsis'] . '<span> </br>';
            echo '<span class="infos">Acteurs: ' . $donnees['acteur'] . '<span> </br>';
            echo '<span class="infos">Réalisé par ' . $donnees['realisateur'] . '<span> </br>';
            echo '<span class="infos">Genre: ' . $donnees['genre'] . '<span>';
            echo '</div>';
            echo '</div>';
        }

        ?>
    </div>
</body>

</html>
