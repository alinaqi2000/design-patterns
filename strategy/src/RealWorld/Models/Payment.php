<?php

namespace Patterns\Strategy\RealWorld\Models;


class Payment
{
    public $id;
    public $orderId;
    public $date;
    public $method;
    public $amount;
    public $details;

    public function __construct($orderId, $method, $amount, $details)
    {
        $this->id = uniqid();
        $this->orderId = $orderId;
        $this->date = date("Y-m-d h:i:sa", time());
        $this->method = $method;
        $this->amount = $amount;
        $this->details = $details;
    }
}
