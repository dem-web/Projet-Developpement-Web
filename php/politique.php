<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/politique.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <title>SpaceLand - Politique de confidentialité</title>
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

    <main class="politique">

        <h1>Politique de confidentialité</h1>

        <section>
            <h2>1. Présentation générale</h2>

            <p>
                La présente politique de confidentialité a pour objectif d’expliquer de manière simple
                et claire comment le site SpaceLand utilise les informations fournies par ses visiteurs
                et ses utilisateurs.
            </p>

            <p>
                SpaceLand est un site fictif de parc d’attractions réalisé dans le cadre d’un projet
                de développement web. Même s’il s’agit d’un projet universitaire, nous avons choisi
                de présenter une politique de confidentialité afin de montrer comment les données
                peuvent être gérées sur un site web.
            </p>

            <p>
                Cette page est accessible à tous les visiteurs, qu’ils soient connectés ou non.
                Elle permet de mieux comprendre les informations qui peuvent être utilisées lors
                de la navigation, de la création d’un compte ou de l’utilisation des services proposés.
            </p>
        </section>

        <section>
            <h2>2. Données collectées</h2>

            <p>
                Lors de la navigation sur le site SpaceLand, certaines données peuvent être utilisées
                afin de permettre le bon fonctionnement des pages et des fonctionnalités.
            </p>

            <p>
                Lorsqu’un utilisateur crée un compte, le site peut enregistrer le pseudo choisi
                ainsi que le mot de passe associé. Ces informations permettent ensuite à l’utilisateur
                de se connecter à son compte personnel.
            </p>

            <p>
                Dans le cadre des fonctionnalités de réservation, le site peut également être amené
                à gérer des informations liées aux billets sélectionnés, à la date de visite ou aux
                choix effectués par l’utilisateur sur la page de réservation.
            </p>

            <p>
                Les informations collectées sont limitées aux données nécessaires au fonctionnement
                du site. SpaceLand ne demande pas d’informations inutiles pour l’utilisation normale
                de ses services.
            </p>
        </section>

        <section>
            <h2>3. Utilisation des données</h2>

            <p>
                Les données enregistrées sont utilisées principalement pour permettre la création
                et la gestion des comptes utilisateurs. Elles permettent également de reconnaître
                un utilisateur lorsqu’il se connecte au site.
            </p>

            <p>
                Elles peuvent aussi servir à améliorer l’expérience de navigation, par exemple
                en affichant le pseudo de l’utilisateur connecté dans le menu du site.
            </p>

            <p>
                Les données liées aux réservations permettent de gérer les choix de l’utilisateur,
                comme les billets sélectionnés ou les informations nécessaires à la préparation
                d’une visite au parc.
            </p>

            <p>
                Les données collectées ne sont pas vendues, échangées ou transmises à des entreprises
                extérieures. Elles sont utilisées uniquement dans le cadre du fonctionnement du site
                SpaceLand.
            </p>
        </section>

        <section>
            <h2>4. Comptes utilisateurs</h2>

            <p>
                La création d’un compte permet à l’utilisateur d’accéder à certaines fonctionnalités
                du site, comme la connexion à un espace personnel ou la gestion de certaines actions
                liées à son profil.
            </p>

            <p>
                Lors de l’inscription, l’utilisateur doit choisir un pseudo et un mot de passe.
                Le pseudo permet d’identifier l’utilisateur sur le site, tandis que le mot de passe
                permet de protéger l’accès au compte.
            </p>

            <p>
                L’utilisateur est responsable des informations qu’il saisit lors de la création de
                son compte. Il est recommandé de choisir un mot de passe suffisamment personnel
                et de ne pas le partager avec d’autres personnes.
            </p>

            <p>
                Si un utilisateur est connecté, le site peut afficher son pseudo dans la barre
                de navigation afin d’indiquer que la session est active.
            </p>
        </section>

        <section>
            <h2>5. Sessions PHP</h2>

            <p>
                Le site SpaceLand utilise des sessions PHP afin de maintenir la connexion
                de l’utilisateur pendant sa navigation.
            </p>

            <p>
                Une session permet au site de savoir qu’un utilisateur est connecté sans lui demander
                de saisir son pseudo et son mot de passe à chaque changement de page.
            </p>

            <p>
                Les sessions sont utilisées uniquement pour le fonctionnement du compte utilisateur.
                Elles permettent par exemple d’afficher un message de bienvenue ou de proposer
                un lien de déconnexion.
            </p>

            <p>
                Lorsqu’un utilisateur clique sur le lien de déconnexion, la session est supprimée.
                L’utilisateur redevient alors un visiteur non connecté.
            </p>
        </section>

        <section>
            <h2>6. Base de données</h2>

            <p>
                Les informations nécessaires au fonctionnement des comptes utilisateurs sont stockées
                dans une base de données utilisée par le site.
            </p>

            <p>
                Cette base de données permet d’enregistrer les comptes créés et de vérifier les
                informations saisies lors de la connexion.
            </p>

            <p>
                L’utilisation d’une base de données permet d’organiser les informations de manière
                plus propre et plus efficace qu’un simple fichier texte.
            </p>

            <p>
                Les données stockées dans la base sont utilisées uniquement par le site SpaceLand
                pour assurer le fonctionnement des fonctionnalités prévues.
            </p>
        </section>

        <section>
            <h2>7. Protection des informations</h2>

            <p>
                SpaceLand accorde de l’importance à la protection des informations enregistrées
                sur le site.
            </p>

            <p>
                Les données ne sont pas rendues publiques et ne sont pas volontairement partagées
                avec des personnes ou organisations extérieures au projet.
            </p>

            <p>
                Des précautions sont prises dans le code afin d’éviter certains problèmes classiques,
                comme l’affichage direct de données non protégées.
            </p>

            <p>
                Par exemple, certaines informations affichées sur les pages peuvent être protégées
                avec des fonctions PHP adaptées afin de limiter les risques liés à l’affichage
                de contenu saisi par un utilisateur.
            </p>
        </section>

        <section>
            <h2>8. Conservation des données</h2>

            <p>
                Les données sont conservées tant qu’elles sont nécessaires au fonctionnement du site.
            </p>

            <p>
                Les comptes utilisateurs restent enregistrés dans la base de données afin de permettre
                aux utilisateurs de se reconnecter ultérieurement.
            </p>

            <p>
                Dans le cadre d’un projet universitaire, ces données ont uniquement une finalité
                de démonstration technique et ne sont pas destinées à être utilisées dans un cadre
                commercial réel.
            </p>

            <p>
                Si le site devait être supprimé ou réinitialisé, les données associées pourraient
                également être supprimées.
            </p>
        </section>

        <section>
            <h2>9. Accès à la politique de confidentialité</h2>

            <p>
                Cette politique de confidentialité est disponible depuis le site SpaceLand.
                Elle peut être consultée librement par tous les visiteurs.
            </p>

            <p>
                Il n’est pas nécessaire d’être connecté pour accéder à cette page.
                Les visiteurs peuvent donc prendre connaissance des règles générales avant même
                de créer un compte.
            </p>

            <p>
                Cette transparence permet aux utilisateurs de mieux comprendre l’utilisation
                de leurs informations sur le site.
            </p>
        </section>

        <section>
            <h2>10. Contact</h2>

            <p>
                Pour toute question concernant cette politique de confidentialité ou le fonctionnement
                du site, les visiteurs peuvent contacter l’équipe SpaceLand via les informations
                présentes sur le site.
            </p>

            <p>
                L’équipe SpaceLand reste disponible pour répondre aux questions concernant
                l’utilisation des données, la création de compte ou la gestion des sessions.
            </p>

            <p>
                Cette politique peut être modifiée si de nouvelles fonctionnalités sont ajoutées
                au site, notamment si la gestion des réservations ou des comptes utilisateurs évolue.
            </p>
        </section>

    </main>
</body>

</html>