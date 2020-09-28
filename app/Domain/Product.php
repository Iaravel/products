<?php

declare(strict_types=1);

namespace App\Domain;

/**
 * @author Michał Mleczko <michal@mleczko.waw.pl>
 */
class Product
{
    private ProductId $id;
    private string $name;
    private Price $price;

    public function __construct(ProductId $id, string $name, Price $price)
    {

        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return ProductId
     */
    public function getId(): ProductId
    {
        return $this->id;
    }
}
