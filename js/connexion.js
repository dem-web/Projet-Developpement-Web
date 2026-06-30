/*
Description des fonctions:

afficheMotdepasse
- Cette fonction affiche ou masque le mot de passe 
*/

function afficheMotdepasse() {
    /* fonction appelée lors du clic sur l’œil */

    var input = document.getElementById("mdp");
    /* récupère l’élément ayant id="mdp" */

    var oeil = document.getElementById("oeil");
    /* récupère l’image de l’œil */

    if (input.getAttribute("type") === "password") {
        /* vérifie si le champ est actuellement en mode mot de passe */

        input.setAttribute("type", "text");
        /* transforme le champ en texte visible */

        oeil.setAttribute("src", "../images/oeil_barre.png");
        /* change l’image affichée */

    } else {

        input.setAttribute("type", "password");
        /* remet le champ caché */

        oeil.setAttribute("src", "../images/oeil_ouvert.png");
        /* remet l’image normale */
    }
}