<?php
session_start();
include 'bdd.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/carte.css">
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
                    <img class="imgcompte" src="../images/fleche.png"><p class="mon-compte">Mon compte</p>
                </div>
                <ul class="deroulant">
                    
                    <?php if (isset($_SESSION['pseudo'])) { ?>
                        <li>
                            <a class="separation" href="../php/donnees.php">
                                <?php echo htmlspecialchars($_SESSION['pseudo']); ?> <!-- transforme les caractères HTML spéciaux pour empêcher l'exécution de code HTML ou JavaScript -->
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

    <h1>Carte interactive</h1>

    <div class="conteneur">
        <div class="carte-wrapper">
            <img src="../images/carte.png" alt="Carte du parc">

            <div class="zone zone-fusee" onclick="afficher('fusee')" title="Première Fusée Orbitale"></div>
            <div class="zone zone-spinner" onclick="afficher('spinner')" title="Star Spinner"></div>
            <div class="zone zone-carrousel" onclick="afficher('carrousel')" title="Carrousel Sculpté"></div>
            <div class="zone zone-base" onclick="afficher('base')" title="Base Alpha"></div>
            <div class="zone zone-riverside" onclick="afficher('riverside')" title="Riverside Gardens"></div>
            <div class="zone zone-coaster" onclick="afficher('coaster')" title="Meteor Coaster"></div>
        </div>

        <!-- Panneau description — nouvelle structure avec bandeau gris -->
        <div class="panneau" id="panneau">
            <div class="panneau-tete">
                <span class="emoji" id="panneau-emoji"></span>
                <h2 id="panneau-titre"></h2>
            </div>
            <div class="panneau-corps">
                <p id="panneau-desc"></p>
            </div>
            <div class="panneau-info">
                <span id="panneau-tag"></span>
            </div>
        </div>
    </div>

    <p class="indice">Cliquez sur une attraction pour en savoir plus</p>

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

    <script src="../js/carte.js"></script>
</body>

</html>