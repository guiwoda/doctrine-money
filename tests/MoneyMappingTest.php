<?php
namespace Tests\Money\Doctrine;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\Setup;
use Money\Money;
use PHPUnit\Framework\TestCase;
use Tests\Money\Doctrine\stubs\Wallet;

final class MoneyMappingTest extends TestCase
{
    public function test_it_maps_money_objects_as_embeddables()
    {
        $configuration = Setup::createXMLMetadataConfiguration([
            dirname(__DIR__).'/src/xml',
            __DIR__.'/stubs/mappings/xml',
        ]);

        $conn = [
            'driver' => 'pdo_sqlite',
            'memory' => true,
        ];

        $entityManager = EntityManager::create($conn, $configuration);
        $schema = new SchemaTool($entityManager);
        $schema->createSchema([$entityManager->getClassMetadata(Wallet::class)]);

        $entityManager->persist(new Wallet(1, Money::USD(100)));
        $entityManager->flush();
        $entityManager->clear();

        /** @var Wallet $wallet */
        $wallet = $entityManager->find(Wallet::class, 1);

        $this->assertTrue($wallet->getContent()->equals(Money::USD(100)));
    }
}
