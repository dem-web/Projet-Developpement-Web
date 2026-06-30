/*
Description des fonctions:

afficheMotdepasse
- Cette fonction affiche ou masque le mot de passe 
*/

function afficheMotdepasse(oeil) {
    /* fonction appelée lors du clic sur l’image de l’œil */
    /* oeil correspond à l’image cliquée */

    var input = oeil.previousElementSibling;
    /* previousElementSibling récupère l’élément HTML juste avant */
    /* ici : le champ input mot de passe */

    if (input.getAttribute("type") === "password") {
        /* getAttribute récupère la valeur d’un attribut HTML */
        /* ici on vérifie si type="password" */

        input.setAttribute("type", "text");
        /* setAttribute modifie un attribut HTML */
        /* remplace type=password par type=text */
        /* le mot de passe devient visible */

        oeil.setAttribute("src", "../images/oeil_barre.png");
        /* change l’image affichée */

    } else {

        input.setAttribute("type", "password");
        /* remet le champ en mode mot de passe */

        oeil.setAttribute("src", "../images/oeil_ouvert.png");
        /* remet l’image de l’œil ouvert */
    }
}