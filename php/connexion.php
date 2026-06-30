<?php
session_start();
include("bdd.php");

function afficheFormulaire($p)
{
?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="connexion-carre">

        <label class="nom">SE CONNECTER</label>
        <input class="champ1" type="text" name="pseudo">

        <label class="mot-de-passe">MOT DE PASSE</label>
        <div class="mdp-affiche">
            <input class="champ2" type="password" name="mdp" id="mdp">
            <img src="../images/oeil_ouvert.png" id="oeil" class="oeil" onclick="afficheMotdepasse()" alt="Afficher le mot de passe">
        </div>

        <?php if ($p != null) { ?>
            <p class="erreur"><?php echo htmlspecialchars($p); ?></p>
        <?php } ?>

        <button type="submit" class="co">Se Connecter</button>

    </form>
<?php
}

$afficherFormulaire = true;
$rediriger = false;
$messageErreur = null;

if (isset($_SESSION['pseudo'])) {
    $messageErreur = "Vous êtes déjà connecté.";
    $afficherFormulaire = false;
}

if (isset($_POST['pseudo']) && isset($_POST['mdp']) && !isset($_SESSION['pseudo'])) {
    $pseudo = trim($_POST['pseudo']);
    $mdp = $_POST['mdp'];

    if ($pseudo === "" || $mdp === "") {
        $messageErreur = "Veuillez remplir tous les champs.";
    } else {
        $sql = "SELECT * FROM utilisateurs
                WHERE pseudo = :pseudo
                AND mot_de_passe = :mot_de_passe";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":pseudo", $pseudo);
        $stmt->bindParam(":mot_de_passe", $mdp);
        $stmt->execute();

        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur) {
            $_SESSION['id'] = $utilisateur['id'];
            $_SESSION['pseudo'] = $utilisateur['pseudo'];
            $_SESSION['nom'] = $utilisateur['pseudo'];
            $_SESSION['acces'] = true;
            $_SESSION['admin'] = false;

            $rediriger = true;
            $afficherFormulaire = false;
        } else {
            $messageErreur = "Erreur de pseudo ou de mot de passe";
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
    <link rel="stylesheet" href="../css/connexion.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <title>SpaceLand - Le parc de vos rêves</title>
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

    <h1>Connexion</h1>

    <?php
    if ($messageErreur != null && !$afficherFormulaire) {
        echo "<p class='erreur'>" . htmlspecialchars($messageErreur) . "</p>";
    }

    if ($afficherFormulaire) {
        afficheFormulaire($messageErreur);
    }
    ?>

    <script src="../js/connexion.js"></script>
</body>

</html>