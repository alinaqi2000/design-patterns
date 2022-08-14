<?php

use Patterns\Strategy\RealWorld\Factories\OrderFactory;
use Patterns\Strategy\RealWorld\Factories\PaymentFactory;

$mode = (int) readline('1.Admin  2.Shop ');

switch ($mode) {

    case 1:
        $order_factory = new OrderFactory();
        $payment_factory = new PaymentFactory();
        $order_factory->displayAllOrders();
        $payment_factory->displayAllPayments();
        break;
    default:
        $order_factory = new OrderFactory();
        $order_factory->shop()
            ->makeOrder()
            ->payment();
        break;
}
