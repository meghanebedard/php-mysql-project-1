<!DOCTYPE html>
<html>
    <head>
        <title>Résultats</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
<?php
include "header.php";
?>
        <div class="boite">
        <h2>Résultats</h2>
        <table id="autos">
            <thead>
                <th>Modèle</th>
                <th>Marque</th>
                <th>Année</th>
                <th>Kilométrage</th>
                <th>Ville</th>
            </thead>
            <?php
            include "connexionbd.php";
            if (isset($_POST["afficherVille"])) {
                $rechercheVille = "'".$_POST["rechercheVille"]."'";
    
                $selectVille = $dbco->prepare(
                "SELECT * FROM auto
                WHERE ville = $rechercheVille
                ");
                $selectVille -> execute();
                $resultatVille = $selectVille->fetchAll(PDO::FETCH_ASSOC);
            }
                if (isset($_POST["afficherVille"])) {
                    if (count($resultatVille) == 0) {
                        echo "Aucune auto ne répond à ces critères.";
                    } else {
            ?>
                    <tbody>
                    <?php
                        foreach ($resultatVille as $ligne) {
                    ?>
                        <tr>
                            <td><?php echo $ligne['modele'];?></td>
                            <td><?php echo $ligne['marque'];?></td>
                            <td><?php echo $ligne['annee'];?></td>
                            <td><?php echo $ligne['kilometrage'];?></td>
                            <td><?php echo $ligne['ville'];?></td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    }
                }
            ?>
            <?php
            include "connexionbd.php";
            if (isset($_POST["afficherAnnee"])) {
                $rechercheAnnee = "'".$_POST["rechercheAnnee"]."'";
    
                $selectAnnee = $dbco->prepare(
                "SELECT * FROM auto
                WHERE annee = $rechercheAnnee
                ");
                $selectAnnee -> execute();
                $resultatAnnee = $selectAnnee->fetchAll(PDO::FETCH_ASSOC);
            }
                if (isset($_POST["afficherAnnee"])) {
                    if (count($resultatAnnee) == 0) {
                        echo "Aucune auto ne répond à ces critères.";
                    } else {
            ?>
                    <tbody>
                    <?php
                        foreach ($resultatAnnee as $ligne) {
                    ?>
                        <tr>
                            <td><?php echo $ligne['modele'];?></td>
                            <td><?php echo $ligne['marque'];?></td>
                            <td><?php echo $ligne['annee'];?></td>
                            <td><?php echo $ligne['kilometrage'];?></td>
                            <td><?php echo $ligne['ville'];?></td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    }
                }
            ?>
        </table>

        <h2>Trouver une auto basé sur la ville</h2>
        <form class="trouver" method="post" action="trouver.php">
            <div class="champ">
                <label>Ville</label>
                <input class="field" type="text" name="rechercheVille" pattern="[A-Za-z -]{,50}" required/>
            </div>
            <div class="champ center">
                <input class="btn" type="submit" name="afficherVille" value="Afficher les résultats" />
            </div>
        </form>

        <h2>Trouver une auto basé sur l'année</h2>
        <form class="trouver" method="post" action="trouver.php">
            <div class="champ">
                <label>Année</label>
                <input class="field" type="text" name="rechercheAnnee" min="4" max="4" required/>
            </div>
            <div class="champ center">
                <input class="btn" type="submit" name="afficherAnnee" value="Afficher les résultats" />
            </div>
        </form>
    </div>
    </body>
</html> 