<?php
session_start();
/* démarre la session pour pouvoir la modifier/supprimer */

session_unset();
/* supprime toutes les variables stockées dans $_SESSION */

session_destroy();
/* détruit complètement la session */

header("Location: ../php/index.php");
/* redirige l’utilisateur vers la page d’accueil */

exit();
/* arrête immédiatement l’exécution du script */

?>
