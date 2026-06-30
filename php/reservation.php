<?php
session_start();
include 'bdd.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_SESSION["id"])) {

        $message = "Vous devez être connecté pour réserver.";
    } else {

        $utilisateur_id = $_SESSION["id"];

        $date_visite = $_POST["date_visite"];

        $ticket_moins_6 = $_POST["ticket_moins_6"];
        $ticket_6_11 = $_POST["ticket_6_11"];
        $ticket_11_18 = $_POST["ticket_11_18"];
        $ticket_plus_18 = $_POST["ticket_plus_18"];
        $ticket_handicap = $_POST["ticket_handicap"];

        $prix_total = $_POST["prix_total"];

        $sql = "INSERT INTO reservations (
            utilisateur_id,
            date_visite,
            ticket_moins_6,
            ticket_6_11,
            ticket_11_18,
            ticket_plus_18,
            ticket_handicap,
            prix_total
        ) VALUES (
            :utilisateur_id,
            :date_visite,
            :ticket_moins_6,
            :ticket_6_11,
            :ticket_11_18,
            :ticket_plus_18,
            :ticket_handicap,
            :prix_total
        )";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":utilisateur_id", $utilisateur_id);
        $stmt->bindParam(":date_visite", $date_visite);

        $stmt->bindParam(":ticket_moins_6", $ticket_moins_6);
        $stmt->bindParam(":ticket_6_11", $ticket_6_11);
        $stmt->bindParam(":ticket_11_18", $ticket_11_18);
        $stmt->bindParam(":ticket_plus_18", $ticket_plus_18);
        $stmt->bindParam(":ticket_handicap", $ticket_handicap);

        $stmt->bindParam(":prix_total", $prix_total);

        $stmt->execute();

        $message = "Votre réservation a bien été enregistrée.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reservation.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
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

                    <?php if (isset($_SESSION['pseudo'])) { ?>
                        <li>
                            <a class="separation" href="../php/donnees.php">
                                <?php echo htmlspecialchars($_SESSION['pseudo']); ?>
                            </a>
                        </li>
                        <li>
                            <a href="../php/deconnexion.php">déconnexion</a>
                        </li>
                    <?php } else { ?>
                        <li><a href="../php/connexion.php"><i class="ti ti-login"></i>Connexion</a></li>
                        <div class="separateur"></div>
                        <li><a href="../php/creation.php"><i class="ti ti-user-plus"></i>Inscription</a></li>
                    <?php } ?>

                </ul>
            </div>
        </nav>
    </header>

    <section class="titre">
        <h2>Sélectionner votre billet</h2>
    </section>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="reservation-contenu">

            <section class="ticket">

                <h2>Billets</h2>

                <div class="date-visite">
                    <label for="date-visite">Date de visite</label>
                    <input type="date" id="date-visite" name="date_visite">
                </div>

                <div class="liste-tickets">

                    <div class="ticket-ligne">
                        <p>Ticket -6 ans : 10€</p>
                        <div class="compteur">
                            <button type="button" class="moins" id="decremente1">-</button>
                            <span id="nb1">0</span>
                            <button type="button" class="plus" id="incremente1">+</button>
                        </div>
                    </div>

                    <div class="ticket-ligne">
                        <p>Ticket 6-11 ans : 15€</p>
                        <div class="compteur">
                            <button type="button" class="moins" id="decremente2">-</button>
                            <span id="nb2">0</span>
                            <button type="button" class="plus" id="incremente2">+</button>
                        </div>
                    </div>

                    <div class="ticket-ligne">
                        <p>Ticket 11-18 ans : 20€</p>
                        <div class="compteur">
                            <button type="button" class="moins" id="decremente3">-</button>
                            <span id="nb3">0</span>
                            <button type="button" class="plus" id="incremente3">+</button>
                        </div>
                    </div>

                    <div class="ticket-ligne">
                        <p>Ticket +18 ans : 25€</p>
                        <div class="compteur">
                            <button type="button" class="moins" id="decremente4">-</button>
                            <span id="nb4">0</span>
                            <button type="button" class="plus" id="incremente4">+</button>
                        </div>
                    </div>

                    <div class="ticket-ligne">
                        <p>Handicap ticket électronique : 20€</p>
                        <div class="compteur">
                            <button type="button" class="moins" id="decremente5">-</button>
                            <span id="nb5">0</span>
                            <button type="button" class="plus" id="incremente5">+</button>
                        </div>
                    </div>

                </div>

            </section>

            <div class="colonne-droite">

                <section class="panier">

                    <div class="panier-tete">
                        <h2>Mon panier</h2>
                    </div>

                    <br>

                    <p id="date-panier">Date : aucune date choisie</p>

                    <br>

                    <div id="billets-choisis">
                        <p>Aucun billet sélectionné.</p>
                    </div>

                    <hr>

                    <div class="panier-bas">
                        <p id="prix-total">Prix total : 0 €</p>
                    </div>

                    <hr>

                    <button type="button" id="vider-panier">Vider mon panier</button>

                </section>

                <div class="validation-panier">
                    <input type="hidden" name="ticket_moins_6" id="input-nb1">
                    <input type="hidden" name="ticket_6_11" id="input-nb2">
                    <input type="hidden" name="ticket_11_18" id="input-nb3">
                    <input type="hidden" name="ticket_plus_18" id="input-nb4">
                    <input type="hidden" name="ticket_handicap" id="input-nb5">
                    <input type="hidden" name="prix_total" id="input-prix-total">
                    <button type="submit" id="valider-panier">Valider</button>
                    <p id="message"><?php echo htmlspecialchars($message); ?></p>
                </div>
            </div>
        </div>

    </form>

    <footer class="footer">
        <div class="footer-conteneur">
            <div class="footer-ligne">
                <div class="footer-colonne">
                    <h4>Le parc</h4>
                    <ul class="footer-liste">
                        <li><a href="../php/index.php">À propos</a></li>
                        <li><a href="../php/index.php">Nos attractions</a></li>
                        <li><a href="../php/index.php">Horaires</a></li>
                        <li><a href="../php/carte.php">Plan du parc</a></li>
                    </ul>
                </div>
                <div class="footer-colonne">
                    <h4>Visiteurs</h4>
                    <ul class="footer-liste">
                        <li><a href="../php/reservation.php">Réservations</a></li>
                        <li><a href="../php/reservation.php">Tarifs</a></li>
                        <li><a href="../php/logement.php">Logements</a></li>
                        <li><a href="../php/recrutement.php">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-colonne">
                    <h4>Informations</h4>

                    <ul class="footer-liste">
                        <li><a href="../php/index.php">Mentions légales</a></li>
                        <li><a href="../php/politique.php">Politique de confidentialité</a></li>
                        <li><a href="../php/recrutement.php">Recrutement</a></li>
                        <li><a href="../php/index.php">Partenaires</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="../js/reservation.js"></script>
</body>

</html>