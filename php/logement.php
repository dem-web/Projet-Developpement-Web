<?php
session_start();
include 'bdd.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION["id"])) {
        $message = "Vous devez être connecté pour réserver un logement.";
    } else {
        $utilisateur_id = $_SESSION["id"];
        $date_visite = $_POST["date_visite"];

        $hotels = [
            1 => ["SpaceHotel", 185],
            2 => ["Chromatic Hotel", 140],
            3 => ["Le Pavlova", 125],
            4 => ["Pierogi Hotel", 95],
            5 => ["Hotel Khachapuri", 110]
        ];

        foreach ($hotels as $id => $hotel) {
            $nombre_chambres = $_POST["hotel_" . $id];

            if ($nombre_chambres > 0) {
                $nom_hotel = $hotel[0];
                $prix_chambre = $hotel[1];
                $prix_total = $prix_chambre * $nombre_chambres;

                $sql = "INSERT INTO logements (
                utilisateur_id,
                date_visite,
                nom_hotel,
                prix_chambre,
                nombre_chambres,
                prix_total
                ) VALUES (
                :utilisateur_id,
                :date_visite,
                :nom_hotel,
                :prix_chambre,
                :nombre_chambres,
                :prix_total
                )";

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":utilisateur_id", $utilisateur_id);
                $stmt->bindParam(":date_visite", $date_visite);
                $stmt->bindParam(":nom_hotel", $nom_hotel);
                $stmt->bindParam(":prix_chambre", $prix_chambre);
                $stmt->bindParam(":nombre_chambres", $nombre_chambres);
                $stmt->bindParam(":prix_total", $prix_total);
                $stmt->execute();
            }
        }

        $message = "Votre logement a bien été réservé.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/logement.css">
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
        <h1>Réservez votre séjour !</h1>
    </section>

    <div class="logement-contenu">
        <div class="gauche">
            <div class="bloc-recherche">
                <h2>Rechercher un hôtel</h2>

                <div class="champ-recherche">
                    <p>Rayon de préférence (en kilomètres)</p>
                    <input type="text" id="rayon" placeholder="exemple : 5">
                </div>

                <div class="champ-recherche">
                    <label>Date de visite</label>
                    <input type="date" id="date-choix">
                </div>

                <button type="button" id="rechercher" onclick="afficherHotel()">Valider</button>
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="panier">
                    <h2>Mon panier</h2>

                    <div class="liste-hotels"></div>

                    <p>Total : <span class="total">0</span> €</p>

                    <input type="hidden" name="date_visite" id="input-date-visite">
                    <input type="hidden" name="nom_hotel" id="input-nom-hotel">
                    <input type="hidden" name="prix_chambre" id="input-prix-chambre">
                    <input type="hidden" name="nombre_chambres" id="input-nombre-chambres">
                    <input type="hidden" name="prix_total" id="input-prix-total">

                    <input type="hidden" name="hotel_1" id="hotel-1" value="0">
                    <input type="hidden" name="hotel_2" id="hotel-2" value="0">
                    <input type="hidden" name="hotel_3" id="hotel-3" value="0">
                    <input type="hidden" name="hotel_4" id="hotel-4" value="0">
                    <input type="hidden" name="hotel_5" id="hotel-5" value="0">

                    <button type="submit" id="payer">Payer</button>

                    <p class="message"><?php echo htmlspecialchars($message); ?></p>
                </div>
            </form>

        </div>


        <div class="hotels">

            <div class="hotel-card hotel-1">
                <h2>SpaceHotel</h2>
                <p class="desc">Un séjour la tête dans les étoiles avec une vue imprenable sur la Voie lactée.</p>
                <p class="prix">185 €</p>
                <p class="adresse">42 Allée des Étoiles, Crakivitsi</p>
                <!--<p>Nombre de chambre : <input type="text" class="barre" placeholder="ex: 2"></p>-->
                <input type="button" value="Choisir" id="1" onclick="ajouterPanier(this.id)">
            </div>

            <div class="hotel-card hotel-2">
                <h2>Chromatic Hotel</h2>
                <p class="desc">Une explosion de couleurs et un design moderne pour stimuler votre créativité.</p>
                <p class="prix">140 €</p>
                <p class="adresse">12 Rue du Prisme, Crakivitsi</p>
                <input type="button" value="Choisir" id="2" onclick="ajouterPanier(this.id)">

            </div>

            <div class="hotel-card hotel-3">
                <h2>Le Pavlova</h2>
                <p class="desc">Un établissement tout en douceur, aussi raffiné que le célèbre dessert.</p>
                <p class="prix">125 €</p>
                <p class="adresse">7 Boulevard des Douceurs, Crakivitsi</p>
                <input type="button" value="Choisir" id="3" onclick="ajouterPanier(this.id)">

            </div>

            <div class="hotel-card hotel-4">
                <h2>Pierogi Hotel</h2>
                <p class="desc">L'authenticité polonaise au cœur de la ville, avec spécialités maison incluses.</p>
                <p class="prix">95 €</p>
                <p class="adresse">24 Rue de la Forêt, Crakivitsi</p>
                <input type="button" value="Choisir" id="4" onclick="ajouterPanier(this.id)">

            </div>

            <div class="hotel-card hotel-5">
                <h2>Hotel Khachapuri</h2>
                <p class="desc">Une escale gourmande inspirée par les saveurs chaleureuses de la Géorgie.</p>
                <p class="prix">110 €</p>
                <p class="adresse">9 Place de Géorgie, Crakivitsi</p>
                <input type="button" value="Choisir" id="5" onclick="ajouterPanier(this.id)">

            </div>

        </div>
    </div>
    <footer class="footer">
        <div class="footer-conteneur">
            <div class="footer-ligne">
                <div class="footer-colonne">
                    <h4>Le parc</h4>
                    <ul class="footer-liste">
                        <li><a href="../php/parc.php">À propos</a></li>
                        <li><a href="../php/carte.php">Nos attractions</a></li>
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
                        <li><a href="../php/politique.php">Mentions légales</a></li>
                        <li><a href="../php/politique.php">Politique de confidentialité</a></li>
                        <li><a href="../php/recrutement.php">Recrutement</a></li>
                        <li><a href="../php/index.php">Partenaires</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="../js/logement.js"></script>

</body>

</html>