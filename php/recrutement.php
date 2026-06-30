<?php
session_start();
/* démarre la session */

include 'bdd.php';
/* importe la connexion à la base de données */

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* vérifie si le formulaire a été envoyé */

    if (!isset($_SESSION["id"])) {
        /* vérifie si l’utilisateur est connecté */

        $message = "Vous devez être connecté pour envoyer une candidature.";

    } else {

        $utilisateur_id = $_SESSION["id"];

        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $date_naissance = $_POST["date_naissance"];
        $adresse = $_POST["adresse"];
        $telephone = $_POST["telephone"];
        $contrat = $_POST["contrat"];
        $poste = $_POST["poste"];
        $disponibilites = $_POST["disponibilites"];
        $experience = $_POST["experience"];
        $motivation = $_POST["motivation"];

        $sql = "INSERT INTO candidatures (
            utilisateur_id,
            nom,
            prenom,
            date_naissance,
            adresse,
            telephone,
            contrat,
            poste,
            disponibilites,
            experience,
            motivation
        ) VALUES (
            :utilisateur_id,
            :nom,
            :prenom,
            :date_naissance,
            :adresse,
            :telephone,
            :contrat,
            :poste,
            :disponibilites,
            :experience,
            :motivation
        )";
        /* requête SQL d’ajout d’une candidature */

        $stmt = $pdo->prepare($sql);
        /* prépare la requête SQL */

        $stmt->bindParam(":utilisateur_id", $utilisateur_id);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":date_naissance", $date_naissance);
        $stmt->bindParam(":adresse", $adresse);
        $stmt->bindParam(":telephone", $telephone);
        $stmt->bindParam(":contrat", $contrat);
        $stmt->bindParam(":poste", $poste);
        $stmt->bindParam(":disponibilites", $disponibilites);
        $stmt->bindParam(":experience", $experience);
        $stmt->bindParam(":motivation", $motivation);
        /* associe les paramètres SQL */

        $stmt->execute();
        /* exécute la requête */

        $message = "Votre candidature a bien été envoyée.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>SpaceLand - Le parc de vos rêves</title>

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/recrutement.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

</head>

<body>

<header>
    <nav>

        <a href="../php/index.php">
            <img class="logo" src="../images/logo.png" alt="Logo SpaceLand">
        </a>

        <div class="nav-liens">
            <a href="../php/parc.php">Le parc</a>
            <a href="../php/reservation.php">Réservation</a>
            <a href="../php/logement.php">Logement</a>
            <a href="../php/recrutement.php">Notre parc recrute !</a>
        </div>

        <a class="nav-bouton" href="../php/carte.php">Carte interactive</a>

        <div class="connexion">

            <div class="titre-connexion">
                <img class="imgcompte" src="../images/fleche.png" alt="Icône de compte">
                <span class="mon-compte">Mon compte</span>
            </div>

            <ul class="deroulant">
                <br>

                <?php if (isset($_SESSION['pseudo'])) { ?>
                <!-- vérifie si l’utilisateur est connecté -->

                    <li>
                        <a class="separation" href="../php/donnees.php">
                            <?php echo htmlspecialchars($_SESSION['pseudo']); ?>
                            <!-- affiche le pseudo connecté -->
                        </a>
                    </li>

                    <li>
                        <a href="../php/deconnexion.php">déconnexion</a>
                    </li>

                <?php } else { ?>
                <!-- sinon affiche connexion / inscription -->

                    <li>
                        <a href="../php/connexion.php">
                            <i class="ti ti-login"></i>Connexion
                        </a>
                    </li>

                    <div class="separateur"></div>

                    <li>
                        <a href="../php/creation.php">
                            <i class="ti ti-user-plus"></i>Inscription
                        </a>
                    </li>

                <?php } ?>

            </ul>

        </div>
    </nav>
</header>

<h1>Changer votre futur en 1 minute</h1>

<div class="image">
    <div class="recrutement">

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- envoie le formulaire vers la page actuelle -->

            <fieldset>

                <legend>Informations</legend>

                <label>Nom
                    <input type="text" name="nom" id="nom">
                </label><br>

                <label>Prénom
                    <input type="text" name="prenom" id="prenom">
                </label><br>

                <label>Date de naissance
                    <input type="text" name="date_naissance" placeholder="JJ/MM/AAAA" min="1950-01-01" max="2008-12-31">
                </label><br>

                <label>Adresse
                    <input type="text" name="adresse" id="adresse">
                </label><br>

                <label>Numéro de téléphone
                    <input type="tel" name="telephone" maxlength="10" pattern="[0-9]{10}">
                    <!-- pattern impose uniquement 10 chiffres -->
                </label><br>

            </fieldset>

            <fieldset>

                <legend>Contrat</legend>

                <label>Type de contrat :</label>

                <label>
                    <input type="radio" name="contrat" value="CDI" checked>
                    <!-- checked coche cette option par défaut -->
                    CDI
                </label>

                <label>
                    <input type="radio" name="contrat" value="CDD">
                    CDD
                </label>

                <label>
                    <input type="radio" name="contrat" value="Saisonnier">
                    Saisonnier
                </label>

            </fieldset>

            <fieldset>

                <legend>Poste</legend>

                <label>Choisissez un poste

                    <select name="poste" required>
                    <!-- required rend le champ obligatoire -->

                        <option value="Agent d'accueil">Agent d'accueil</option>
                        <option value="Animateur">Animateur</option>
                        <option value="Opérateur d'attraction">Opérateur d'attraction</option>
                        <option value="Employé de restauration">Employé de restauration</option>
                        <option value="Agent de sécurité">Agent de sécurité</option>
                        <option value="Technicien de maintenance">Technicien de maintenance</option>

                    </select>

                </label>

            </fieldset>

            <fieldset>

                <legend>Votre profil</legend>

                <div class="profil">

                    <label>
                        Disponibilités

                        <textarea 
                            name="disponibilites"
                            rows="3"
                            placeholder="Disponible les week-ends, vacances, temps plein...">
                        </textarea>

                    </label><br>

                    <label>
                        Expérience professionnelle

                        <textarea
                            name="experience"
                            rows="3"
                            placeholder="Décrivez vos expériences précédentes">
                        </textarea>

                    </label><br>

                    <label>
                        Motivation

                        <textarea
                            name="motivation"
                            rows="3"
                            placeholder="Pourquoi souhaitez-vous rejoindre SpaceLand ?">
                        </textarea>

                    </label>

                </div>

            </fieldset>

            <button type="submit">
                Envoyer ma candidature
            </button>

            <?php
            if ($message != "") {
                /* vérifie si un message existe */

                echo "<p class='message'>" . htmlspecialchars($message) . "</p>";
                /* affiche le message */
            }
            ?>

        </form>

        <div class="avantages">

            <h2>Profitez des avantages</h2>

            <ul>
                <li>Tickets restaurant</li>
                <li>Primes saisonnières</li>
                <li>Horaires flexibles</li>
                <li>Parking gratuit</li>
                <li>Tenue fournie</li>
            </ul>

        </div>

    </div>
</div>

</body>

</html>