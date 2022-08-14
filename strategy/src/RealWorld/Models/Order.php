<?php

namespace Patterns\Strategy\RealWorld\Models;


class Order
{
    public $id;
    public $date;
    public $amount;
    public $products;

    public function __construct($amount, $products)
    {
        $this->id = uniqid();
        $this->date = date("Y-m-d h:i:sa", time());
        $this->amount = $amount;
        $this->products = $products;
    }
}
