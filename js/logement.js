/*
Description des fonctions:

- afficherHotel
Cette fonction affiche les hotels disponibles en fonction du rayon désiré.

- majPrixTotal
Cette fonction met a jour le prix total ainsi que sont affichage dans réservation.

- ajouterPanier
Cette fonction créé l'affichage pour l'hotel choisi (s'il n'est pas déjà affiché) et met à jour le nombre de chambre choisi ainsi que le prix total.

*/

var nbAjout = [0,0,0,0,0]; /* tableau qui stock le nombre de fois qu'un des 5 hotels est choisi */

var prixTotal=0;

function majPrixTotal(prix){
    prixTotal+=parseInt(prix);
    document.querySelector(".total").textContent=prixTotal;
}

function afficherHotel() {
    var i, fin=0;
    var datechoix = document.getElementById("date-choix").value;
    var rayon = document.getElementById("rayon").value;

    var classeHotel = document.getElementsByClassName("hotel-card");
    
    /* Conditions pour le rayon (pour afficher les hotels) */
    if (parseInt(rayon) < 10) fin=3;
    
    else if (parseInt(rayon)>10 && parseInt(rayon)<15) fin=4;

    else fin=6;
    
    /* on affiche en fonction du retour du rayon */
    for (i = 1; i < fin; i++) {
        card = document.querySelector(".hotel-" + i);
        card.style.display = 'flex';
    }

}

function ajouterPanier(id){
    var nom=document.querySelector(".hotel-"+parseInt(id)+" h2").textContent;
    var prix=document.querySelector(".hotel-"+parseInt(id)+" .prix").textContent;
    var n=document.createElement("p");
    var pr=document.createElement("p");
    var bloc = document.createElement("div");
    pr.textContent = prix;

    /* si l'hotel est séléctionné pour la première fois, on met à jour l'affichage */
    if (nbAjout[id-1]<1){
        n.textContent = nom;

        pr.textContent = prix + " x "+(nbAjout[id-1]+1)+ " chambre(s). ";
        pr.id = "pr-" + id;
        pr.setAttribute("data-chambres", 1);
        panier=document.querySelector(".liste-hotels");

        bloc.style.background = "rgb(255, 255, 255)";
        bloc.style.borderRadius = "10px";
        bloc.style.padding = "10px 15px";
        bloc.style.marginBottom = "10px";

        n.style.fontWeight = "bold";
        n.style.color = "rgb(5, 60, 100)";
        n.style.marginBottom = "4px";

        pr.style.color = "rgb(39, 122, 160)";
        pr.style.fontSize = "14px";

        bloc.appendChild(n);
        bloc.appendChild(pr);
        panier.appendChild(bloc);
        nbAjout[id-1]++;

        majPrixTotal(prix);
    } else {
        /* sinon on met simplement à jour le nombre de chambre et le prix total */
        majPrixTotal(prix);
        var prElement = document.getElementById("pr-" + id);
        prElement.textContent = prix + " x " + (nbAjout[id-1]+1) + " chambre(s). ";
        prElement.setAttribute("data-chambres", nbAjout[id-1]+1);
        nbAjout[id-1]++;
    }

    document.getElementById("input-date-visite").value = document.getElementById("date-choix").value;
    document.getElementById("input-nom-hotel").value = nom;
    document.getElementById("input-prix-chambre").value = parseInt(prix);
    document.getElementById("input-nombre-chambres").value = nbAjout[id - 1];
    document.getElementById("input-prix-total").value = prixTotal;
    document.getElementById("hotel-" + id).value = nbAjout[id - 1];
    document.getElementById("input-date-visite").value = document.getElementById("date-choix").value;
}
