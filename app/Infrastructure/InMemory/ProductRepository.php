<?php

declare(strict_types=1);

namespace App\Infrastructure\InMemory;

use App\Application\Repository\Products;
use App\Domain\Product;
use Ds\Map;

/**
 * @author Michał Mleczko <michal@mleczko.waw.pl>
 */
class ProductRepository implements Products
{
    /**
     * @var Map
     */
    private Map $storage;

    public function __construct(Map $storage)
    {
        $this->storage = $storage;
    }

    public function add(Product $product): void
    {
        $this->storage->put($product->getId(), $product);
    }
}
