<?php
declare(strict_types=1);

namespace Money\Doctrine\Fluent;

use LaravelDoctrine\Fluent\EmbeddableMapping;
use LaravelDoctrine\Fluent\Fluent;
use Money\Currency;

class CurrencyMapping extends EmbeddableMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return Currency::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        $builder->string('code')->length(3);
    }
}
