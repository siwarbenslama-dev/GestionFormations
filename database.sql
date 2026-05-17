CREATE DATABASE IF NOT EXISTS gestion_formations
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE gestion_formations;

CREATE TABLE formations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titre VARCHAR(150) NOT NULL,
  description TEXT NOT NULL,
  prix DECIMAL(8,2) NOT NULL DEFAULT 0,
  duree VARCHAR(30) DEFAULT '20h',
  niveau VARCHAR(50) DEFAULT 'Tous niveaux',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE inscriptions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(80) NOT NULL,
  prenom VARCHAR(80) NOT NULL,
  email VARCHAR(150) NOT NULL,
  formation_id INT NOT NULL,
  statut_paiement ENUM('en_attente','paye','echec') DEFAULT 'en_attente',
  date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (formation_id) REFERENCES formations(id) ON DELETE CASCADE
);