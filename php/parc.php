<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/politique.css">
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

    <div class="politique">
        <h1>SpaceLand, De la Terre aux Étoiles</h1>
        <section>
            <h2>La Genèse : "The Riverside Gardens" (1927 - 1945)</h2>
            <p>
                Quand le parc a ouvert ses portes en 1927, personne n'imaginait qu'un jour il parlerait aux étoiles.
                À l'époque, on l'appelait Riverside Gardens, un simple parc d'attractions typique des années folles.
                Les riches citadins venaient s'y promener au bord de l'eau pour profiter de la fraîcheur.
                Les stars du parc ? Un carrousel en bois sculpté à la main et de grands pavillons de danse.
                L'ambiance était aux orchestres de jazz en plein air et aux promenades fleuries, le tout dans un pur style Art Déco.
            </p><br>
            <h2>L'Entre-deux-guerres et le Déclin (1945 - 1957)</h2>
            <p>
                Après la guerre, le parc a eu du mal à suivre le rythme.
                Les "jardins tranquilles" ne faisaient plus rêver une jeunesse qui voulait du sensationnel.
                Le site a failli mettre la clé sous la porte.
                Et puis, en 1957, un petit satellite russe a tout changé : Spoutnik.
            </p><br>
            <h2>La Métamorphose : L'Ère "SpaceLand" (1961)</h2>
            <p>
                En pleine course à l'espace, les propriétaires ont pris une décision radicale.
                En 1961, Riverside Gardens est devenu SpaceLand.
                Pas question de tout raser, on a transformé sur place.
                Le pavillon de danse s'est mué en "Base Alpha".
                Les structures en acier de 1927 ont été repeintes en blanc et argent pour ressembler à des fusées.
                La grande innovation ? La première montagne russe "orbitale", construite sur les fondations d'un ancien chemin de fer scénique.
            </p><br>
            <h2>L'Héritage Anachronique</h2>
            <p>
                Aujourd'hui, ce qui fait le charme de SpaceLand, c'est ce drôle de mélange : des robots futuristes qui se baladent sous des arcades des années 20.
                C'est du rétrofuturisme à l'état pur, où la vision du futur des années 60 s'est construite sur les ruines d'un passé élégant.
            </p>
        </section>
    </div>
    <div class="politique">
        <h1>Le SpaceLand Contemporain : Un Équilibre Rétrofuturiste</h1>
        <p>Aujourd'hui, SpaceLand ne prétend plus être "le futur" pour de vrai. Il assume son rôle de monument historique de l'imaginaire, un fascinant mélange de technologie de pointe et de nostalgie.</p><br>
        <section>
            <h2>L'Entrée Royale</h2>
            <p>Les colonnes Art Déco de 1927 sont toujours là, mais maintenant elles brillent sous des néons fluorescents bleus, surmontées de monorails silencieux.</p>
            <br>
            <h2>Le Contraste Visuel</h2>
            <p>Vous pouvez manger une glace sous une tonnelle fleurie d'époque tout en regardant une navette spatiale en métal brossé décoller vers le ciel. C'est ce genre de décalage qui fait tout le charme.</p>
            <br>
            <h2>Réalité Augmentée</h2>
            <p>Des bornes permettent de pointer son téléphone vers une attraction pour voir, en transparence, à quoi elle ressemblait du temps des Riverside Gardens. Comme un voyage dans le temps.</p>
            <br>
            <h2>La "Nostalgie Galactique"</h2>
            <p>Les attractions les plus populaires ne sont pas forcément les plus rapides. Non, ce sont celles qui célèbrent la vision de l'espace des années 60, avec cette esthétique qui rappelle Star Trek ou 2001, l'Odyssée de l'espace.</p>
            <br>
            <h2>Un Modèle de Conservation</h2>
            <p>Pour un étudiant, SpaceLand est un cas d'école. Il prouve qu'un parc peut survivre à l'obsolescence en transformant ses faiblesses – son âge – en une force thématique unique. Ce n'est plus juste un lieu de divertissement, c'est un musée vivant de l'évolution des loisirs.</p>
        </section>
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