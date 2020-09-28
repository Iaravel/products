<?php

declare(strict_types=1);

namespace App\Application\Handler;

use App\Application\Command\AddProduct;
use App\Application\Repository\Products;
use App\Domain\Price;
use App\Domain\Product;
use App\Domain\ProductId;
use Ramsey\Uuid\Uuid;

/**
 * @author Michał Mleczko <michal@mleczko.waw.pl>
 */
class AddProductHandler
{
    /**
     * @var Products
     */
    private Products $products;

    public function __construct(Products $products)
    {
        $this->products = $products;
    }

    public function handle(AddProduct $command): void
    {
        $this->products->add(new Product(new ProductId(Uuid::uuid4()->toString()), $command->name, new Price($command->price)));
    }
}
