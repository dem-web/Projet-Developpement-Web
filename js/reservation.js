/*
mettreAJourPanier
- Cette fonction met à jour le contenu du panier en fonction des quantités sélectionnées.

resetPanier
- Cette fonction remet à zéro les quantités de billets sélectionnées et met à jour le panier en conséquence.
*/

/* Boutons + */
var boutonsPlus = document.querySelectorAll(".plus");
/* récupère tous les éléments ayant la classe "plus" */

for (var i = 0; i < boutonsPlus.length; i++) {
  /* boucle sur tous les boutons plus */

  boutonsPlus[i].onclick = function () {
    /* fonction exécutée lors du clic */

    var compteur = this.parentNode;
    /* récupère le parent du bouton cliqué */

    var spanNombre = compteur.querySelector("span");
    /* récupère le span contenant la quantité */

    var valeur = parseInt(spanNombre.textContent);
    /* transforme le texte du span en nombre entier */

    valeur = valeur + 1;
    /* ajoute 1 à la quantité */

    spanNombre.textContent = valeur;
    /* met à jour l’affichage du nombre */

    mettreAJourPanier();
    /* met à jour le panier */
  };
}

/* Boutons - */
var boutonsMoins = document.querySelectorAll(".moins");
/* récupère tous les éléments ayant la classe "moins" */

for (var j = 0; j < boutonsMoins.length; j++) {
  /* boucle sur tous les boutons moins */

  boutonsMoins[j].onclick = function () {
    /* fonction exécutée lors du clic */

    var compteur = this.parentNode;
    /* récupère le parent du bouton */

    var spanNombre = compteur.querySelector("span");
    /* récupère le span contenant la quantité */

    var valeur = parseInt(spanNombre.textContent);
    /* transforme le texte en nombre */

    if (valeur > 0) {
      /* vérifie que la quantité est supérieure à 0 */

      valeur = valeur - 1;
      /* enlève 1 */

      spanNombre.textContent = valeur;
      /* met à jour le texte affiché */
    }

    mettreAJourPanier();
    /* actualise le panier */
  };
}

/* Récupération des éléments */
var dateVisite = document.getElementById("date-visite");
/* récupère l’input de date */

var datePanier = document.getElementById("date-panier");
/* récupère la zone d’affichage de la date */

var billetsChoisis = document.getElementById("billets-choisis");
/* récupère la zone d’affichage des billets */

var prixTotal = document.getElementById("prix-total");
/* récupère la zone d’affichage du prix total */

var boutonViderPanier = document.getElementById("vider-panier");
/* récupère le bouton vider le panier */

var boutonValiderPanier = document.getElementById("valider-panier");
/* récupère le bouton valider le panier */

/* Tableau des prix */
var prix = [10, 15, 20, 25, 20];
/* tableau contenant les prix des billets */

/* Initialisation de la date minimale : réservation le lendemain */
var today = new Date();
/* crée un objet date correspondant à aujourd’hui */

var demain = new Date();
/* crée une seconde date */

demain.setDate(today.getDate() + 1);
/* ajoute 1 jour à la date actuelle */

var yyyy = demain.getFullYear();
/* récupère l’année */

var mm = demain.getMonth() + 1;
/* récupère le mois */
/* +1 car JavaScript commence les mois à 0 */

if (mm < 10) {
  /* si le mois est inférieur à 10 */

  mm = "0" + mm;
  /* ajoute un zéro devant */
}

var dd = demain.getDate();
/* récupère le jour */

if (dd < 10) {
  /* si le jour est inférieur à 10 */

  dd = "0" + dd;
  /* ajoute un zéro devant */
}

var dateMin = yyyy + "-" + mm + "-" + dd;
/* crée une date au format YYYY-MM-DD */

dateVisite.min = dateMin;
/* définit la date minimale sélectionnable */

dateVisite.value = dateMin;
/* met cette date par défaut */

datePanier.textContent = "Date réservée : " + dateMin;
/* affiche la date dans le panier */

/* Fonction de mise à jour du panier */
function mettreAJourPanier() {

  var billets = document.querySelectorAll(".ticket-ligne");
  /* récupère toutes les lignes de billets */

  var total = 0;
  /* initialise le total */

  var i;
  /* variable de boucle */

  billetsChoisis.innerHTML = "";      /* innerHTML permet de modifier le contenu HTML d’un élément */
  /* vide le contenu du panier */

  for (i = 0; i < billets.length; i++) {
    /* boucle sur tous les billets */

    var nom = billets[i].querySelector("p").textContent;
    /* récupère le nom du billet */

    var quantite = parseInt(billets[i].querySelector("span").textContent);
    /* récupère la quantité */

    if (quantite > 0) {
      /* vérifie qu’il y a au moins un billet */

      billetsChoisis.innerHTML += "<p>" + nom + " x " + quantite + "</p>";
      /* ajoute le billet dans le panier */

      total = total + quantite * prix[i];
      /* ajoute le prix correspondant au total */
    }
  }

  if (total == 0) {
    /* si aucun billet n’est sélectionné */

    billetsChoisis.innerHTML = "<p>Aucun billet sélectionné.</p>";
    /* affiche un message */
  }

  prixTotal.textContent = "Prix total : " + total + " €";
  /* affiche le prix total */

  /* Mise à jour des inputs cachés */

  document.getElementById("input-nb1").value = document.getElementById("nb1").textContent;
  /* copie la quantité du billet 1 dans un input caché */

  document.getElementById("input-nb2").value = document.getElementById("nb2").textContent;
  /* copie la quantité du billet 2 */

  document.getElementById("input-nb3").value = document.getElementById("nb3").textContent;
  /* copie la quantité du billet 3 */

  document.getElementById("input-nb4").value = document.getElementById("nb4").textContent;
  /* copie la quantité du billet 4 */

  document.getElementById("input-nb5").value = document.getElementById("nb5").textContent;
  /* copie la quantité du billet 5 */

  document.getElementById("input-prix-total").value = total;
  /* copie le total dans un input caché */
}

/* Changement de date */
dateVisite.onchange = function () {

  /* onchange se déclenche quand la valeur change */

  if (dateVisite.value == "") {
    /* si aucune date n’est choisie */

    datePanier.textContent = "Date : aucune date choisie";
    /* affiche un message */

  } else {

    datePanier.textContent = "Date réservée : " + dateVisite.value;
    /* affiche la nouvelle date */
  }
};

/* Fonction de remise à zéro */
function resetPanier() {

  var quantites = document.querySelectorAll(".ticket-ligne span");
  /* récupère tous les spans contenant les quantités */

  var i;
  /* variable de boucle */

  for (i = 0; i < quantites.length; i++) {
    /* boucle sur toutes les quantités */

    quantites[i].textContent = "0";
    /* remet chaque quantité à zéro */
  }

  mettreAJourPanier();
  /* met à jour le panier */
}

/* Bouton vider le panier */
boutonViderPanier.onclick = function () {

  var confirmation = confirm("Voulez-vous vraiment vider tout le panier ?");
  /* ouvre une fenêtre de confirmation */

  if (confirmation) {
    /* si l’utilisateur clique sur OK */

    resetPanier();
    /* vide le panier */
  }
};