<?php
try {
        $pdo = new PDO('sqlite:' . __DIR__ . '/../sqlite/bdd.sqlite');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /* Création de compte d'un utilisateur */

        $sql = "CREATE TABLE IF NOT EXISTS utilisateurs (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        pseudo TEXT NOT NULL UNIQUE,
        mot_de_passe TEXT NOT NULL
        )";
        $pdo->exec($sql);

        /* Demande de recrutements */

        $sql = "CREATE TABLE IF NOT EXISTS candidatures (
        id INTEGER PRIMARY KEY AUTOINCREMENT, /* identifier la candidature elle-même */
        utilisateur_id INTEGER NOT NULL, /* quel utilisateur connecté a envoyé cette candidature */
        nom TEXT NOT NULL,
        prenom TEXT NOT NULL,
        date_naissance TEXT NOT NULL,
        adresse TEXT NOT NULL,
        telephone TEXT NOT NULL,
        contrat TEXT NOT NULL,
        poste TEXT NOT NULL,
        disponibilites TEXT NOT NULL,
        experience TEXT NOT NULL,
        motivation TEXT NOT NULL,

        FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id)
 )";
        $pdo->exec($sql);

        /* Réservations */

        $sql = "CREATE TABLE IF NOT EXISTS reservations (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        utilisateur_id INTEGER NOT NULL,
        date_visite TEXT NOT NULL,
        ticket_moins_6 INTEGER NOT NULL,
        ticket_6_11 INTEGER NOT NULL,
        ticket_11_18 INTEGER NOT NULL,
        ticket_plus_18 INTEGER NOT NULL,
        ticket_handicap INTEGER NOT NULL,
        prix_total INTEGER NOT NULL,

        FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id)
        )";
        $pdo->exec($sql);

        /* Logements */

        $sql = "CREATE TABLE IF NOT EXISTS logements (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        utilisateur_id INTEGER NOT NULL,
        date_visite TEXT NOT NULL,
        nom_hotel TEXT NOT NULL,
        prix_chambre INTEGER NOT NULL,
        nombre_chambres INTEGER NOT NULL,
        prix_total INTEGER NOT NULL,

        FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id)
        )";
        $pdo->exec($sql);
} catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
}
