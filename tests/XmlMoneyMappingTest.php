<?php
declare(strict_types=1);

namespace Tests\Money\Doctrine;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\Tools\Setup;

class XmlMoneyMappingTest extends MoneyMappingTestCase
{
    /**
     * @return Configuration
     */
    protected function metadataConfiguration(): Configuration
    {
        $configuration = Setup::createXMLMetadataConfiguration([
            dirname(__DIR__).'/src/xml',
            __DIR__.'/stubs/mappings/xml',
        ]);

        return $configuration;
    }
}
