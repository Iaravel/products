<?php

declare(strict_types=1);

namespace App\Presentation\Http\Api;

use App\Application\Handler\AddProductHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Money\Currency;
use Money\Money;

/**
 * @author Michał Mleczko <michal@mleczko.waw.pl>
 */
class AddProduct extends Controller
{
    /**
     * It should be command bus instead
     */
    private AddProductHandler $commandBus;

    public function __construct(AddProductHandler $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(string $name, string $price, string $currency)
    {
        $this->commandBus->handle(new \App\Application\Command\AddProduct($name, new Money($price, new Currency($currency))));

        return new JsonResponse(null, 201);
    }
}
