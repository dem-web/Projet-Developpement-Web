<?php
session_start();
include 'bdd.php';

if (!isset($_SESSION["id"])) {
    header("Location: connexion.php");
    exit();
}

$utilisateur_id = $_SESSION["id"];

/* Candidatures */
$sql = "SELECT * FROM candidatures WHERE utilisateur_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $utilisateur_id);
$stmt->execute();
$candidatures = $stmt->fetchAll();

/* Réservations */
$sql = "SELECT * FROM reservations WHERE utilisateur_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $utilisateur_id);
$stmt->execute();
$reservations = $stmt->fetchAll();

/* Logements */
$sql = "SELECT * FROM logements WHERE utilisateur_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $utilisateur_id);
$stmt->execute();
$logements = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/donnees.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">


    <title>SpaceLand - Le parc de vos rêves</title>
</head>

<body>

    <header>
        <nav>
            <a href="../php/index.php">
                <img class="logo" src="../images/logo.png" alt="Logo de SpaceLand">
            </a>

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
                    <li>
                        <a class="separation" href="../php/donnees.php">
                            <?php echo htmlspecialchars($_SESSION['pseudo']); ?>
                        </a>
                    </li>
                    <li>
                        <a href="../php/deconnexion.php">déconnexion</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="donnees">
        <h1>Mes informations</h1>
        <section>
            <h2>Mes candidatures</h2>
            <?php
            if (count($candidatures) == 0) {

                echo "<p>Aucune candidature.</p>";
            } else {

                foreach ($candidatures as $candidature) {

                    echo "<p>";
                    echo "<strong>Nom :</strong> " . htmlspecialchars($candidature["nom"]) . "<br>";
                    echo "<strong>Prénom :</strong> " . htmlspecialchars($candidature["prenom"]) . "<br>";
                    echo "<strong>Date de naissance :</strong> " . htmlspecialchars($candidature["date_naissance"]) . "<br>";
                    echo "<strong>Adresse :</strong> " . htmlspecialchars($candidature["adresse"]) . "<br>";
                    echo "<strong>Téléphone :</strong> " . htmlspecialchars($candidature["telephone"]) . "<br>";
                    echo "<strong>Contrat :</strong> " . htmlspecialchars($candidature["contrat"]) . "<br>";
                    echo "<strong>Poste :</strong> " . htmlspecialchars($candidature["poste"]) . "<br>";
                    echo "<strong>Disponibilités :</strong> " . htmlspecialchars($candidature["disponibilites"]) . "<br>";
                    echo "<strong>Expérience :</strong> " . htmlspecialchars($candidature["experience"]) . "<br>";
                    echo "<strong>Motivation :</strong> " . htmlspecialchars($candidature["motivation"]);
                    echo "</p>";
                }
            }
            ?>

        </section>

        <section>

            <h2>Mes réservations</h2>

            <?php
            if (count($reservations) == 0) {
                echo "<p>Aucune réservation.</p>";
            } else {
                foreach ($reservations as $reservation) {

                    echo "<p>";
                    echo "<strong>Date de visite :</strong> " . htmlspecialchars($reservation["date_visite"]) . "<br>";
                    echo "<strong>Ticket -6 ans :</strong> " . htmlspecialchars($reservation["ticket_moins_6"]) . "<br>";
                    echo "<strong>Ticket 6-11 ans :</strong> " . htmlspecialchars($reservation["ticket_6_11"]) . "<br>";
                    echo "<strong>Ticket 11-18 ans :</strong> " . htmlspecialchars($reservation["ticket_11_18"]) . "<br>";
                    echo "<strong>Ticket +18 ans :</strong> " . htmlspecialchars($reservation["ticket_plus_18"]) . "<br>";
                    echo "<strong>Ticket handicap :</strong> " . htmlspecialchars($reservation["ticket_handicap"]) . "<br>";
                    echo "<strong>Prix total :</strong> " . htmlspecialchars($reservation["prix_total"]) . " €";
                    echo "</p>";
                }
            }
            ?>

        </section>
        <section>
            <h2>Mes logements</h2>
            <?php
            if (count($logements) == 0) {
                echo "<p>Aucun logement réservé.</p>";
            } else {
                foreach ($logements as $logement) {

                    echo "<p>";
                    echo "<strong>Hôtel :</strong> " . htmlspecialchars($logement["nom_hotel"]) . "<br>";
                    echo "<strong>Date de visite :</strong> " . htmlspecialchars($logement["date_visite"]) . "<br>";
                    echo "<strong>Prix chambre :</strong> " . htmlspecialchars($logement["prix_chambre"]) . " €<br>";
                    echo "<strong>Nombre de chambres :</strong> " . htmlspecialchars($logement["nombre_chambres"]) . "<br>";
                    echo "<strong>Prix total :</strong> " . htmlspecialchars($logement["prix_total"]) . " €";
                    echo "</p>";
                }
            }
            ?>

        </section>

    </div>

</body>

</html>