<?php
declare(strict_types=1);

namespace Tests\Money\Doctrine;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\Tools\Setup;

class YamlMoneyMappingTest extends MoneyMappingTestCase
{
    /**
     * @return Configuration
     */
    protected function metadataConfiguration(): Configuration
    {
        return Setup::createYAMLMetadataConfiguration([
            dirname(__DIR__).'/src/yaml',
            __DIR__.'/stubs/mappings/yaml',
        ]);
    }
}
