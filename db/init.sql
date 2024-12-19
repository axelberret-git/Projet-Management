CREATE DATABASE IF NOT EXISTS restaurant;
USE restaurant;

-- Table Personnel
CREATE TABLE IF NOT EXISTS Personnel (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(50),
    username VARCHAR(100),
    pwd VARCHAR(100),
    nom VARCHAR(100),
    prenom VARCHAR(100),
    salaire DECIMAL(10,2)
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

-- Table Restaurant_Table (renamed from 'Table')
CREATE TABLE IF NOT EXISTS r_Table (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    statut ENUM('occupée', 'libre', 'débarrassée', 'réservée') NOT NULL
);

-- Table Service
CREATE TABLE IF NOT EXISTS Services (
    ID_com INT,
    ID_table INT,
    ID_plat INT,
    PRIMARY KEY (ID_com, ID_table, ID_plat),
    FOREIGN KEY (ID_table) REFERENCES r_Table(ID),
    FOREIGN KEY (ID_com) REFERENCES Commande(ID),
    FOREIGN KEY (ID_plat) REFERENCES Plat(ID)
);

-- Table Attribution_table
CREATE TABLE IF NOT EXISTS Attribution_table (
    ID_table INT,
    ID_personnel INT,
    date DATETIME,
    PRIMARY KEY (ID_table, ID_personnel),
    FOREIGN KEY (ID_table) REFERENCES r_Table(ID),
    FOREIGN KEY (ID_personnel) REFERENCES Personnel(ID)
);


-- Table Produits
CREATE TABLE IF NOT EXISTS Produits (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    quantite INT,
    categorie VARCHAR(50)
);

-- Table Reservation
CREATE TABLE IF NOT EXISTS Reservation (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    ID_table INT,
    nom_client VARCHAR(100),
    date_horraire DATETIME,
    FOREIGN KEY (ID_table) REFERENCES r_Table(ID)
);
