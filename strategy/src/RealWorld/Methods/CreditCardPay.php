<?php


namespace Patterns\Strategy\RealWorld\Methods;

use Patterns\Strategy\RealWorld\Factories\PaymentFactory;
use Patterns\Strategy\RealWorld\PaymentInterface;

class CreditCardPay extends PaymentFactory implements PaymentInterface
{

    public function getPaymentDetails()
    {

        $details['card'] = readline("Enter Credit Card Number: ");
        $details['exp'] = readline("Enter Exp Date: ");
        $details['cvc'] = readline("Enter CVC: ");

        return $details;
    }
    public function code()
    {
        return "CC";
    }
}
