<?php
namespace Tests\Money\Doctrine;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\Setup;
use Money\Money;
use PHPUnit\Framework\TestCase;
use Tests\Money\Doctrine\stubs\Wallet;

abstract class MoneyMappingTestCase extends TestCase
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function test_it_maps_money_objects_as_embeddables()
    {
        /** @var Wallet $wallet */
        $wallet = $this->entityManager->find(Wallet::class, 1);

        $this->assertTrue($wallet->getContent()->equals(Money::USD(100)));
    }

    /**
     * @return EntityManager
     */
    protected function setUp()
    {
        $configuration = $this->metadataConfiguration();

        $conn = [
            'driver' => 'pdo_sqlite',
            'memory' => true,
        ];

        $this->entityManager = EntityManager::create($conn, $configuration);
        $schema = new SchemaTool($this->entityManager);
        $schema->createSchema([
            $this->entityManager->getClassMetadata(Wallet::class)
        ]);

        $this->entityManager->persist(new Wallet(1, Money::USD(100)));
        $this->entityManager->flush();
        $this->entityManager->clear();
    }

    /**
     * @return Configuration
     */
    abstract protected function metadataConfiguration(): Configuration;
}
