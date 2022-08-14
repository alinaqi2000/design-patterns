<?php


namespace Patterns\Strategy\RealWorld;

use Patterns\Strategy\RealWorld\Models\Payment;

interface PaymentInterface
{
    public function code();
    public function getPaymentDetails();
    public function storePaymentInfo(Payment $payment);
}
