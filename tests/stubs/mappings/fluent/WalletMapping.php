<?php
declare(strict_types=1);

namespace Tests\Money\Doctrine\stubs\mappings\fluent;

use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;
use Money\Money;
use Tests\Money\Doctrine\stubs\Wallet;

class WalletMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return Wallet::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        $builder->integer('id')->primary();
        $builder->embed(Money::class, 'content');
    }
}
