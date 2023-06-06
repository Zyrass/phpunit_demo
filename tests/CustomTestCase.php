<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class CustomTestCase extends TestCase
{
    protected static $pdo;

    public static function setUpBeforeClass(): void
    {
        $dsn = 'mysql:host=localhost;dbname=connexion_phpunit;charset=utf8';
        $username = 'root';
        $dbPassword = 'root';

        self::$pdo = new PDO($dsn, $username, $dbPassword);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function tearDownAfterClass(): void
    {
        self::$pdo = null;
    }

    protected function setUp(): void
    {
        self::$pdo->exec("TRUNCATE TABLE user");
    }

    protected function assertRedirectionVers($emplacementAttendu, $enTetesActuels)
    {
        $emplacementTrouve = false;

        foreach ($enTetesActuels as $enTete) {
            if (strpos($enTete, 'Location: ') === 0) {
                $emplacementTrouve = true;
                $emplacementActuel = substr($enTete, 10);
                $this->assertEquals($emplacementAttendu, $emplacementActuel);
                break;
            }
        }

        $this->assertTrue($emplacementTrouve, 'Aucun en-tête "Location" trouvé dans la réponse');
    }

    protected function assertContientParametreQuery($parametreAttendu, $valeurAttendue, $emplacementActuel)
    {
        $partiesUrl = parse_url($emplacementActuel);
        parse_str($partiesUrl['query'], $parametresQuery);

        $this->assertArrayHasKey($parametreAttendu, $parametresQuery);
        $this->assertEquals($valeurAttendue, $parametresQuery[$parametreAttendu]);
    }

    public function testQuelqueChose()
    {
        // Code du test
        $this->assertTrue(true); // Assertion
    }
}
