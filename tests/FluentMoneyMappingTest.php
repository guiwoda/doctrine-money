<?php
declare(strict_types=1);

namespace Tests\Money\Doctrine;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\Tools\Setup;
use LaravelDoctrine\Fluent\FluentDriver;
use Money\Doctrine\Fluent\CurrencyMapping;
use Money\Doctrine\Fluent\MoneyMapping;
use Tests\Money\Doctrine\stubs\mappings\fluent\WalletMapping;

class FluentMoneyMappingTest extends MoneyMappingTestCase
{
    /**
     * @return Configuration
     */
    protected function metadataConfiguration(): Configuration
    {
        $config = Setup::createConfiguration();
        $config->setMetadataDriverImpl(new FluentDriver([
            MoneyMapping::class,
            CurrencyMapping::class,
            WalletMapping::class,
        ]));

        return $config;
    }
}
