<?php

declare(strict_types=1);

namespace App\Domain;

/**
 * @author Michał Mleczko <michal@mleczko.waw.pl>
 */
class ProductId
{
    /**
     * @var string
     */
    private $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function id(): string
    {
        return $this->uuid;
    }
}
