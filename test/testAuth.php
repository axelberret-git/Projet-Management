<?php

use PHPUnit\Framework\TestCase;

require_once 'AuthManager.php';  ## changer le nom du fichier si nécessaire

class AuthManagerTest extends TestCase
{
    private $authManager;

    protected function setUp(): void
    {
        $this->authManager = new AuthManager();
    }

    public function testLoginSuccess()
    {
        $role = $this->authManager->login('admin', 'admin123'); ## changer nom de fonction et de classe et aussi les arguments si la méthode connection n'est pas celle ci
        $this->assertEquals('admin', $role, "L'utilisateur admin devrait se connecter avec succès.");
    }

    public function testLoginFailure()
    {
        $role = $this->authManager->login('admin', 'wrongpassword'); ## changer nom de fonction et de classe et aussi les arguments si la méthode connection n'est pas celle ci
        $this->assertFalse($role, "La connexion devrait échouer avec un mot de passe incorrect.");
    }

    Public function testHasRoleSucces()
    {
        $role = $this->authManager->hasRole('admin', 'admin'); ## changer nom de fonction et de classe et aussi les arguments si la méthode connection n'est pas celle ci
        $this->assertTrue($role, "L'utilisateur devrait avoir le rôle admin normalement");
    }

    Public function testHasRoleFailure()
    {
        $role = $this->authManager->hasRole('bob', 'admin'); ## changer nom de fonction et de classe et aussi les arguments si la méthode connection n'est pas celle ci
        $this->assertFalse($role, "L'utilisateur ne devrait pas être admin");
    }
}
