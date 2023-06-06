<?php

use PHPUnit\Framework\TestCase;

class TestInscriptionUtilisateur extends TestCase
{
    public function testInscriptionReussie()
    {
        // Code du test d'inscription réussie

        // Exemple d'assertion : vérifier si une valeur est non nulle
        $valeur = 'some value';
        $this->assertNotNull($valeur);
    }
    
    public function testEmailExistant()
    {
        // Code du test d'inscription avec un e-mail existant

        // Exemple d'assertion : vérifier si une chaîne de caractères contient un autre
        $email = 'zyrass';
        $contenuTest = 'zyrass';
        $this->assertStringContainsString($contenuTest, $email);
    }

    public function testMotsDePasseNonCorrespondants()
    {
        // Code du test d'inscription avec des mots de passe non correspondants

        // Exemple d'assertion : vérifier si un tableau contient une certaine clé
        $tableau = ['clé' => 'valeur'];
        $this->assertArrayHasKey('clé', $tableau);
    }
}
