<?php
session_start();
include('bdd.php');

function afficheFormulaire($pseudo, $messageErreur)
{
?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="connexion-carre">

        <label class="nom">ENTRER UN NOM DE COMPTE</label>
        <input class="champ1" type="text" name="pseudo" value="<?php echo htmlspecialchars($pseudo); ?>">

        <label class="mot-de-passe">VOTRE MOT DE PASSE</label>
        <div class="mdp-affiche1">
            <input class="champ2" type="password" name="mdp" id="mdp">
            <img src="../images/oeil_ouvert.png" id="oeil" class="oeil" onclick="afficheMotdepasse(this)" alt="Afficher le mot de passe">
        </div>

        <label class="confirmer-mot-de-passe">CONFIRMER VOTRE MOT DE PASSE</label>
        <div class="mdp-affiche2">
            <input class="champ3" type="password" name="confirmation_mdp" id="confirmation">
            <img src="../images/oeil_ouvert.png" class="oeil" onclick="afficheMotdepasse(this)" alt="Afficher le mot de passe">
        </div>

        <?php if ($messageErreur != null) { ?>
            <p class="erreur"><?php echo htmlspecialchars($messageErreur); ?></p>
        <?php } ?>

        <button type="submit" class="co">S'inscrire</button>
    </form>
<?php
}

$afficherFormulaire = true;
$rediriger = false;
$messageErreur = null;
$pseudoValeur = "";

if (isset($_SESSION['pseudo'])) {
    $messageErreur = "Vous êtes déjà connecté, vous ne pouvez pas vous inscrire.";
    $afficherFormulaire = false;
}

if (
    isset($_POST['pseudo']) &&
    isset($_POST['mdp']) &&
    isset($_POST['confirmation_mdp']) &&
    !isset($_SESSION['pseudo'])
) {
    $pseudo = trim($_POST['pseudo']); /* trim supprime les espaces avant et après le pseudo */
    $mdp = $_POST['mdp'];
    $confirmation_mdp = $_POST['confirmation_mdp'];

    $pseudoValeur = $pseudo;

    if ($pseudo === "" || $mdp === "" || $confirmation_mdp === "") {
        $messageErreur = "Veuillez remplir tous les champs.";
    } elseif ($mdp !== $confirmation_mdp) {
        $messageErreur = "Les mots de passe ne correspondent pas.";
    } else {
        try {
            $sql = "INSERT INTO utilisateurs (pseudo, mot_de_passe)
                    VALUES (:pseudo, :mot_de_passe)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":pseudo", $pseudo);
            $stmt->bindParam(":mot_de_passe", $mdp);
            $stmt->execute();

            $_SESSION["id"] = $pdo->lastInsertId();
            $_SESSION["pseudo"] = $pseudo;
            $_SESSION["nom"] = $pseudo;
            $_SESSION["acces"] = true;
            
            $rediriger = true;
            $afficherFormulaire = false;
        } catch (PDOException $e) {
            $messageErreur = "Ce pseudo est déjà utilisé.";
        }
    }
}

if ($rediriger) {
    header('Location: ../php/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/creation.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <title>SpaceLand - Inscription</title>
</head>

<body>
    <header>
        <nav>
            <a href="../php/index.php"><img class="logo" src="../images/logo.png" alt="Logo SpaceLand"></a>
            <ul class="nav-liens">
                <li><a href="../php/parc.php">Le parc</a></li>
                <li><a href="../php/reservation.php">Réservation</a></li>
                <li><a href="../php/logement.php">Logement</a></li>
                <li><a href="../php/recrutement.php">Notre parc recrute !</a></li>
            </ul>
            <a class="nav-bouton" href="../php/carte.php">Carte interactive</a>
            <div class="connexion">
                <div class="titre-connexion">
                    <img class="imgcompte" src="../images/fleche.png" alt="Icône de compte">
                    <span class="mon-compte">Mon compte</span>
                </div>
                <ul class="deroulant">
                    <br>
                    <li><a class="separation" href="../php/connexion.php">connexion</a></li>
                    <li><a href="../php/creation.php">inscription</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <h1>Inscription</h1>

    <?php
    if ($messageErreur != null && !$afficherFormulaire) {
        echo "<p class='erreur'>" . htmlspecialchars($messageErreur) . "</p>";
    }

    if ($afficherFormulaire) {
        afficheFormulaire($pseudoValeur, $messageErreur);
    }
    ?>

    <script src="../js/creation.js"></script>
</body>

</html>