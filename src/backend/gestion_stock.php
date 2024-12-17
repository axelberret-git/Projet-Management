<?php
// gestion_stock.php - Classe pour gérer les produits du stock

class GestionStock {
    private $conn;

    // Constructeur, initialisation de la connexion à la base de données
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Ajouter un produit au stock
    public function ajouter_produit($nom, $quantite) {
        try {
            $query = "INSERT INTO Produits (nom, quantite) VALUES (:nom, :quantite)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':quantite', $quantite);
            $stmt->execute();
            echo "Produit '$nom' ajouté avec succès.<br>";
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout du produit : " . $e->getMessage() . "<br>";
        }
    }

    // Récupérer tous les produits du stock
    public function recuperer_produits() {
        try {
            $query = "SELECT * FROM Produits";
            $stmt = $this->conn->query($query);
            $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($produits as $produit) {
                echo "ID: " . $produit['ID'] . ", Nom: " . $produit['nom'] . ", Quantité: " . $produit['quantite'] . "<br>";
            }
            return $produits;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des produits : " . $e->getMessage() . "<br>";
        }
    }

    // Supprimer un produit du stock
    public function supprimer_produit($produit_id) {
        try {
            $query = "DELETE FROM Produits WHERE ID = :ID";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':ID', $produit_id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Produit avec ID $produit_id supprimé avec succès.<br>";
            } else {
                echo "Aucun produit trouvé avec l'ID $produit_id.<br>";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression du produit : " . $e->getMessage() . "<br>";
        }
    }
}
?>
