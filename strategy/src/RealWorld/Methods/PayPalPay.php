<?php


namespace Patterns\Strategy\RealWorld\Methods;

use Patterns\Strategy\RealWorld\Factories\PaymentFactory;
use Patterns\Strategy\RealWorld\PaymentInterface;

class PayPalPay extends PaymentFactory implements PaymentInterface
{

    public function getPaymentDetails()
    {

        $details['email'] = readline("Enter PayPal Email: ");
        $details['password'] = readline("Enter PayPal Password: ");

        return $details;
    }
    public function code()
    {
        return "PP";
    }
}
