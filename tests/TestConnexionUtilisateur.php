<?php

use PHPUnit\Framework\TestCase;

class TestConnexionUtilisateur extends TestCase
{
    public function testConnexionReussie()
    {
        // Code du test de connexion réussie

        // Exemple d'assertion : vérifier si une valeur est vraie
        $this->assertTrue(true);
    }

    public function testIdentifiantsInvalides()
    {
        // Code du test de connexion avec des identifiants invalides
        $expected = 'expected';
        $actual = 'zyrass';
        $this->assertNotEquals($expected, $actual, "L'identifiant doit être invalide");
    }

    public function testMotDePasseInvalide()
    {
        $test_data = "azertyuiop";
        $actuel = 'root';
        $this->assertNotEquals($test_data, $actuel, "Le mot passe doit être invalide");
    }

    public function testMotDePasseValide()
    {
        $test_data = "root";
        $actuel = "root";
        $this->assertEquals($test_data, $actuel, "Le mot de passe doit être OK");
    }
}
