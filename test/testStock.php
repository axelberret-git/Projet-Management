<?php

## faire les require fichier php avec les fonctions pour stock + require fichier php connection

use PHPUnit\Framework\TestCase;

class StockManagerTest extends TestCase {

    protected function setUp(): void {
        $pdo = Database::connect(); ## voir le nom de la fonction de connection
        $pdo->exec("TRUNCATE TABLE Produits");
    }

    public function testAddProduct() {
        $result = StockManager::addProduct('Tomates', 50); ## voir le nom de la fonction addProduct à changer selon ce qui sera définit et aussi les argument de la fonction
        $this->assertTrue($result, "L'ajout d'un produit devrait retourner true");

        $stmt = $pdo->query("SELECT * FROM Produits");
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->assertCount(1, $products, "Il devrait y avoir 1 produit dans la base");
        $this->assertEquals('Tomates', $products[0]['nom']);
        $this->assertEquals(50, $products[0]['quantite']);
    }

    public function testUpdateProductQuantity() {
        StockManager::addProduct('Tomates', 50);
        $result = StockManager::updateProductQuantity('Tomates', 30); ## encore une fois voir pour le nom de la fonction et les arguments
        $this->assertTrue($result, "La mise à jour devrait retourner true");

        $products = StockManager::getAllProducts();
        $this->assertEquals(30, $products[0]['quantite'], "La quantité de Tomates devrait être mise à jour à 30");
    }

    public function testDeleteProduct() {
        StockManager::addProduct('Tomates', 50);
        $result = StockManager::deleteProduct('Tomates'); ## nom de fonction à changer si probleme
        $this->assertTrue($result, "La suppression d'un produit devrait retourner true");

        $products = StockManager::getAllProducts();
        $this->assertCount(0, $products, "Il ne devrait plus y avoir de produits dans la base");
    }

    public function testGetLowStockProducts() {
        StockManager::addProduct('Tomates', 10);
        StockManager::addProduct('Farine', 50);
        StockManager::addProduct('Lait', 5);

        $lowStock = StockManager::getLowStockProducts(20); ## nom de fonctionner à chager si probleme
        $this->assertCount(2, $lowStock, "Il devrait y avoir 2 produits avec un stock inférieur à 20");

        $this->assertEquals('Tomates', $lowStock[0]['nom']);
        $this->assertEquals('Lait', $lowStock[1]['nom']);
    }

}
?>