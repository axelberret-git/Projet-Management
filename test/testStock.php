<?php

## faire les require fichier php avec les fonctions pour stock + require fichier php connection

use PHPUnit\Framework\TestCase;

class StockManagerTest extends TestCase {

    protected function setUp(): void {
        $pdo = Database::connect(); ## voir le nom de la fonction de connection
        $pdo->exec("TRUNCATE TABLE Produits");
    }

    public function testAddProduct() {
        $result = StockManager::addProduct('Tomatestest', 50); ## voir le nom de la fonction addProduct à changer selon ce qui sera définit et aussi les argument de la fonction
        $this->assertTrue($result, "L'ajout d'un produit devrait retourner true");

        $stmt = $pdo->query("SELECT * FROM Produits WHERE nom = 'Tomatestest");
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->assertCount(1, $products, "Il devrait y avoir 1 produit Tomatestest dans la base");
        $this->assertEquals('Tomatestest', $products[0]['nom']);
        $this->assertEquals(50, $products[0]['quantite']);
    }

    public function testUpdateProductQuantity() {
        StockManager::addProduct('Tomatestest', 50);
        $result = StockManager::updateProductQuantity('Tomatestest', 30); ## encore une fois voir pour le nom de la fonction et les arguments
        $this->assertTrue($result, "La mise à jour devrait retourner true");

        $products = StockManager::getAllProducts();
        $this->assertEquals(30, $products[0]['quantite'], "La quantité de Tomates devrait être mise à jour à 30");
    }

    public function testDeleteProduct()
    {
        $result = StockManager::deleteProduct('Tomatestest');
        $this->assertTrue($result, "La suppression d'un produit existant devrait retourner true");

        $stmt = $this->pdo->query("SELECT * FROM Produits WHERE nom = 'Tomatestest'");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->assertCount(0, $products, "Le produit 'Tomatestest' ne devrait plus exister dans la base après suppression.");
    }

    public function testGetLowStockProducts() {
        StockManager::addProduct('Tomatestest', 10);
        StockManager::addProduct('Farinetest', 50);
        StockManager::addProduct('Laittest', 5);

        $lowStock = StockManager::getLowStockProducts(20); ## nom de fonctionner à chager si probleme
        $this->assertCount(2, $lowStock, "Il devrait y avoir 2 produits avec un stock inférieur à 20");

        $this->assertEquals('Tomatestest', $lowStock[0]['nom']);
        $this->assertEquals('Laittest', $lowStock[1]['nom']);
    }

}
?>