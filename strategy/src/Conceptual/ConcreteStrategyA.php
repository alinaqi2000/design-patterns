<?php

namespace Patterns\Strategy\Conceptual;


class ConcreteStrategyA implements Strategy
{
    public function doAlgorithm(array $data): array
    {
        sort($data);

        return $data;
    }
}
