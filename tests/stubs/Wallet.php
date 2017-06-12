<?php
declare(strict_types=1);

namespace Tests\Money\Doctrine\stubs;

use Money\Money;

class Wallet
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Money
     */
    private $content;

    /**
     * @param $id
     * @param $content
     */
    public function __construct(int $id, Money $content)
    {
        $this->id = $id;
        $this->content = $content;
    }

    public function getContent(): Money
    {
        return $this->content;
    }
}
