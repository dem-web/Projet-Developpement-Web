<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/navbar.css">
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

    <div class="image-principale">
        <p class="titre-sur-image">SPACELAND</p>
        <p class="description">Le parc de vos rêves. </p>
        <img class="fond" src="../images/principale.png" alt="Image principale de SpaceLand">
    </div>

    <div class="informations">
        <h1 class="informations-titre">Informations</h1>

        <div class="important">
            <p class="desc-important"><em>SpaceCoaster</em> arrive à <em>SpaceLand</em> ! Découvrez notre toute nouvelle attraction <em>SpaceCoaster</em>, pour un maximum de sensations !
                Avec son looping et sa descente à plus de 85km/h, ainsi que sa décoration hors norme, vous n'allez pas être déçu !
                <b>Age minimum :</b> 10 ans
                <b>Taille minimum :</b> 120cm</p>
        </div>

        <div class="infos-secondaires">
            <h2 class="infos-titre">Infos</h2>
            <p class="info-item">Travaux à l'attraction <em>Meteor Coaster</em>. Suite à un contrôle technique l'été dernier, l'attraction est momentanément fermée et en réparation. Sa boutique, elle reste ouverte ! <br> <b>NOUVEAU HORAIRE : de 9h à 17h30 du lundi au samedi !</b></p>
            <p class="info-item">Nouveau restaurant Le <em>Supreme Burger</em>. La chaîne Supreme Burger s'installe à SpaceLand ! Découvrez-y une large gamme de sandwichs pour votre repas du midi et du sucré pour vos enfants !</p>
            <p class="info-item">Officiel, une nouvelle extension du parc est prévue pour octobre 2026 ! Avec une superficie de plus de 2000 m², cette extension incluera 3 nouvelles attractions et 2 nouveaux restaurants ! Rendez-vous sur nos réseaux sociaux pour l'annonce des attractions.</p>
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
</body>

</html>