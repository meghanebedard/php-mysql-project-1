<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter une auto</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
<?php
include "header.php";
?>
        <div class="boite">
        <h2>Ajouter une auto</h2>
        <form method="post" action="ajouter.php">
            <div class="champ">
                <label>Modèle : </label>
                <input class="field" type="text" name="modele" pattern="[A-Za-z0-9 -]{,30}" required/>
            </div>
            <div class="champ">
                <label>Marque : </label>
                <input class="field" type="text" name="marque" pattern="[A-Za-z 0-9-]{,30}" required/>
            </div>
            <div class="champ">
                <label>Année : </label>
                <input class="field" type="integer" name="annee" min="4" max="4" required/>
            </div>
            <div class="champ">
                <label>Kilométrage : </label>
                <input class="field" type="integer" name="kilometrage" required/>
            </div>
            <div class="champ">
                <label>Ville : </label>
                <input class="field" type="text" name="ville" pattern="[A-Za-z -]{,50}" required/>
            </div>
            <div class="champ center">
                <input class="btn" type="submit" name="ajouter" value="Ajouter" />
            </div>
        </form>
    </div>
    <?php
    include "connexionbd.php";
        if (isset($_POST["ajouter"])) {
            $modele = "'".$_POST["modele"]."'";
            $marque = "'".$_POST["marque"]."'";
            $annee = $_POST["annee"];
            $kilometrage = $_POST["kilometrage"];
            $ville = "'".$_POST["ville"]."'";

            try {
                $insert = "INSERT INTO auto(modele,marque,annee,kilometrage,ville)
                VALUES
                ($modele,$marque,$annee,$kilometrage,$ville)
                ";
                $dbco -> exec($insert);
                echo 'Auto ajoutée!';
            } catch (PDOException $e) {
                echo "Erreur : " . $e -> getMessage();
            } 
        }
?>
    </body>
</html> 