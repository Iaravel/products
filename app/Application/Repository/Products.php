<?php

declare(strict_types=1);

namespace App\Application\Repository;

use App\Domain\Product;

/**
 * @author Michał Mleczko <michal@mleczko.waw.pl>
 */
interface Products
{
    public function add(Product $product): void;
}
