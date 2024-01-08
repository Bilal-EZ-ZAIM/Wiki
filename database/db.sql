-- Table des rôles
CREATE TABLE RoleID (
    idRole INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255)
);
-- Table des utilisateurs
CREATE TABLE Utilisateur (
    idUtilisateur INT PRIMARY KEY AUTO_INCREMENT,
    prenom VARCHAR(255) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255),
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES Role(idRole)
);
-- Table des catégories
CREATE TABLE Categorie (
    idCategorie INT PRIMARY KEY AUTO_INCREMENT,
    idAdministrateur INT,
    nomCategorie VARCHAR(255) NOT NULL,
    FOREIGN KEY (idAdministrateur) REFERENCES Utilisateur(idUtilisateur)
);
-- Table des balises (tags)
CREATE TABLE Balise (
    idBalise INT PRIMARY KEY AUTO_INCREMENT,
    idAdministrateur INT,
    nomTag VARCHAR(255) NOT NULL,
    FOREIGN KEY (idAdministrateur) REFERENCES Utilisateur(idUtilisateur)
);
-- Table des wikis
CREATE TABLE Wiki (
    idWiki INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT,
    dateCreation DATE,
    auteurID INT,
    categorieID INT,
    FOREIGN KEY (auteurID) REFERENCES Utilisateur(idUtilisateur),
    FOREIGN KEY (categorieID) REFERENCES Categorie(idCategorie)
);
-- Table des articles
CREATE TABLE Article (
    idArticle INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    wikiID INT NOT NULL,
    contenu TEXT,
    dateCreation DATE,
    auteurID INT,
    baliseID INT,
    FOREIGN KEY (wikiID) REFERENCES Wikis(idWiki),
    FOREIGN KEY (auteurID) REFERENCES Utilisateur(idUtilisateur),
    FOREIGN KEY (baliseID) REFERENCES Balise(idBalise)
);



