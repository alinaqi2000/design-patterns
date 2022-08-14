<?php

namespace Patterns\Strategy\RealWorld\Factories;

use Faker\Factory;
use Patterns\Strategy\RealWorld\Models\Product;

class ProductFactory extends Factory
{

    /**
     * return Product[]
     */
    public static function generate($quantity = 5): array
    {
        $PF = static::create();
        $products = [];
        for ($i = 0; $i < $quantity; $i++) {
            $products[] = new Product(uniqid(), $PF->company, $PF->sentence, rand(11, 99));
        }
        return $products;
    }
}
