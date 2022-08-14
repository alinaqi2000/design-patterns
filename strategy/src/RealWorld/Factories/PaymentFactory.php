<?php


namespace Patterns\Strategy\RealWorld\Factories;

use Patterns\Strategy\RealWorld\Methods\CreditCardPay;
use Patterns\Strategy\RealWorld\Methods\PayPalPay;
use Patterns\Strategy\RealWorld\Models\Payment;
use Patterns\Strategy\RealWorld\PaymentInterface;

class PaymentFactory
{
    private $storage_dir = "./src/RealWorld/payments_record/";
    public function __construct()
    {
        if (!file_exists($this->storage_dir)) {
            mkdir($this->storage_dir, 0777, true);
        }
    }
    public function storePaymentInfo(Payment $payment)
    {
        file_put_contents($this->storage_dir . $payment->id, serialize($payment));
    }

    public function selectPaymentMethod(): PaymentInterface
    {
        $method = NULL;
        echo "Select payment method\n";
        echo "1- PayPal\n";
        echo "2- Credit Card\n";
        $option = (int) readline();
        switch ($option) {
            case 1:
                $method = new PayPalPay();
                break;

            default:
                $method = new CreditCardPay();
                break;
        }
        return $method;
    }

    public function displayAllPayments()
    {
        $payments = array_diff(scandir($this->storage_dir), array(".", ".."));

        echo "    <--------- Payments List --------->\n";
        $mask = "|%-20s|%-20s|%-30s|%-10s|%-20s| \n";
        printf($mask, "ID#", "OrderID#", "Date", "Method", "Amount");
        foreach ($payments as $file) {
            $payment = unserialize(file_get_contents($this->storage_dir . $file));
            printf($mask, $payment->id, $payment->orderId, $payment->date, $payment->method, $payment->amount);
        }
    }
}
