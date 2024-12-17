# Projet-Management

### **Étape 1 : Installer PHPUnit**
Si PHPUnit n'est pas encore installé, utilisez **Composer** pour l'ajouter à votre projet :

```bash
composer install
```

### **Étape 2 : Lancer les tests**
1. **Lancer tous les tests** : Exécutez tous les fichiers de tests dans le dossier `tests/` (par défaut) :
   ```bash
   ./vendor/bin/phpunit
   ```

**Ou alors Tester un fichier spécifique** : Pour exécuter les tests d'un seul fichier, précisez le chemin du fichier :
   ```bash
   ./vendor/bin/phpunit tests/StockManagerTest.php
   ```

2. **Générer un rapport de couverture de code** (si activé) :
   ```bash
   ./vendor/bin/phpunit --coverage-html coverage/
   ```
   Cela génère un rapport HTML de couverture de code dans le dossier `coverage/`.
