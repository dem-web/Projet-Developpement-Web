/*
- afficher
cette fonction s'occupe de l'affichage des panneaux lors du clique de l'utilisateur
*/


var attractions = {
    fusee: {
        titre: "Première Fusée Orbitale",
        desc: "Le monument central du parc. Cette réplique grandeur nature d'une fusée orbitale est visible depuis toute l'enceinte. Une expérience de simulation de lancement est disponible à sa base.",
        tag: "Tout public"
    },
    spinner: {
        titre: "Star Spinner",
        desc: "Manège rotatif à sensations, inspiré des stations spatiales. Les passagers tournent à grande vitesse tout en étant projetés vers le haut. Convient aux plus de 12 ans.",
        tag: "Sensations fortes — 12 ans et +"
    },
    carrousel: {
        titre: "Carrousel Sculpté",
        desc: "Un carrousel classique aux décors soigneusement peints à la main. Idéal pour les familles et les plus petits visiteurs. Ouvert toute la journée.",
        tag: "Familles & petits"
    },
    base: {
        titre: "Base Alpha",
        desc: "Zone de simulation spatiale avec dôme d'observation et hangar de vaisseaux. Plongez dans l'univers des astronautes à travers des activités interactives.",
        tag: "Interactif — Tout public"
    },
    riverside: {
        titre: "Riverside Gardens",
        desc: "Un espace de détente au bord de l'eau avec jardins paysagers, fontaines et bancs. Parfait pour une pause au calme entre deux attractions.",
        tag: "Espace de repos"
    },
    coaster: {
        titre: "Meteor Coaster",
        desc: "Les montagnes russes les plus rapides du parc. Des virages serrés et des descentes vertigineuses vous attendent. Réservé aux plus de 140 cm.",
        tag: "Sensations — 140 cm min."
    }
};

var zoneActive = null;

function afficher(id) {
    var panneau = document.getElementById("panneau");
    var zones = document.querySelectorAll(".zone");

    if (zoneActive === id) {
        panneau.classList.remove("visible");
        zones.forEach(function (z) { z.classList.remove("active"); });
        zoneActive = null;
        return;
    }

    var a = attractions[id];
    document.getElementById("panneau-titre").textContent=a.titre;
    document.getElementById("panneau-desc").textContent=a.desc;
    document.getElementById("panneau-tag").textContent=a.tag;

    panneau.classList.remove("visible");

    /* permet l'affichage des panneaux */
    setTimeout(function () { panneau.classList.add("visible"); }, 10);

    /* lorsqu'on clique sur une nouvelle attraction, on enlève la case bleue de l'autre */
    zones.forEach(function (z) { z.classList.remove("active"); });

    var map = {
        fusee: "zone-fusee",
        spinner: "zone-spinner",
        carrousel: "zone-carrousel",
        base: "zone-base",
        riverside: "zone-riverside",
        coaster: "zone-coaster"
    };
    document.querySelector("." + map[id]).classList.add("active");

    zoneActive = id;
}