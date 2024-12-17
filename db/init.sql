CREATE DATABASE IF NOT EXISTS restaurant;
USE restaurant;

-- Table Personnel
CREATE TABLE IF NOT EXISTS Personnel (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(50),
    nom VARCHAR(100),
    prenom VARCHAR(100),
    salaire DECIMAL(10,2)
);

-- Table Service
CREATE TABLE IF NOT EXISTS Service (
    ID_com INT AUTO_INCREMENT,
    ID_table INT,
    ID_plat INT,
    PRIMARY KEY (ID_com, ID_table, ID_plat),
    FOREIGN KEY (ID_table) REFERENCES Table(ID),
    FOREIGN KEY (ID_com) REFERENCES Commande(ID),
    FOREIGN KEY (ID_plat) REFERENCES Plat(ID)
);
-- Table Commande
CREATE TABLE IF NOT EXISTS Commande (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    prix_finale DECIMAL(10,2),
    statut ENUM('en cours', 'terminée', 'annulée') NOT NULL
);

-- Table Plat
CREATE TABLE IF NOT EXISTS Plat (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    nom_plat VARCHAR(100),
    prix DECIMAL(10,2),
    categorie VARCHAR(50)
);

-- Table Table
CREATE TABLE IF NOT EXISTS Table (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    statut ENUM('occupée', 'libre', 'débarrassée', 'réservée') NOT NULL
);

-- Table Attribution_table
CREATE TABLE IF NOT EXISTS Attribution_table (
    ID_table INT,
    ID_personnel INT,
    date DATETIME,
    PRIMARY KEY (ID_table, ID_personnel),
    FOREIGN KEY (ID_table) REFERENCES Table(ID),
    FOREIGN KEY (ID_personnel) REFERENCES Personnel(ID)
);

-- Table Produits
CREATE TABLE IF NOT EXISTS Produits (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    quantite INT
);

-- Table Reservation
CREATE TABLE IF NOT EXISTS Reservation (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    ID_table INT,
    nom_client VARCHAR(100),
    date_horraire DATETIME,
    FOREIGN KEY (ID_table) REFERENCES Table(ID)
);
