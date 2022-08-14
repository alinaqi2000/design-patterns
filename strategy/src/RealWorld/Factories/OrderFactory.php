<?php


namespace Patterns\Strategy\RealWorld\Factories;

use Patterns\Strategy\RealWorld\Models\Order;
use Patterns\Strategy\RealWorld\Models\Payment;

class OrderFactory
{
    private $storage_dir = "./src/RealWorld/orders_record/";
    private $products = [];
    private $selected_products = [];
    private $order = NULL;
    public function __construct()
    {
        if (!file_exists($this->storage_dir)) {
            mkdir($this->storage_dir, 0777, true);
        }
        $this->products = ProductFactory::generate(5);
    }
    public function shop(): OrderFactory
    {
        echo "Welcome to our shop!\n";
        echo "Please select the product below\n";
        do {
            $selected = TRUE;
            foreach ($this->products as $key => $product) {
                echo ($key + 1) . "- " . $product->name . " ($" . $product->price . ")\n";
            }
            $s_product = (int) readline();
            $s_count = readline("Quantity: ");
            $selected = readline("Do you want to select other product(s)? (y/n) ") === "y";
            $this->selected_products[$s_count] = $this->products[$s_product - 1];
        } while ($selected);
        $this->makeOrder();
        return $this;
    }
    public function payment(): OrderFactory
    {
        $payment_factory = new PaymentFactory();
        $payment_method = $payment_factory->selectPaymentMethod();
        $details = $payment_method->getPaymentDetails();
        $payment = new Payment($this->order->id, $payment_method->code(), $this->order->amount, $details);
        echo "Storing payment information...\n";
        $payment_method->storePaymentInfo($payment);
        echo "Storing order information...\n";
        echo "\nThank you for making a pruchase.\n";
        $this->storeOrder();
        echo "Order Id: " . $this->order->id;
        echo "\nPayment Id: " . $payment->id;
        return $this;
    }
    public function makeOrder(): OrderFactory
    {
        $amount = 0;
        foreach ($this->selected_products as $count => $product) {
            $amount += (int) $count * $product->price;
        }
        foreach ($this->selected_products as $count => $p) {
            $products[] = $p->name . " ($" . $p->price . "x" . $count . ")";
        }
        $this->order = new Order($amount, $products);
        return $this;
    }
    public function storeOrder()
    {
        file_put_contents($this->storage_dir . $this->order->id, serialize($this->order));
    }

    public function displayAllOrders()
    {
        $orders = array_diff(scandir($this->storage_dir), array(".", ".."));

        echo "    <--------- Orders List --------->\n";
        $mask = "|%-20s|%-20s|%-30s|%-40s| \n";
        printf($mask, "ID#", "Amount", "Date", "Products");
        foreach ($orders as $file) {
            $order = unserialize(file_get_contents($this->storage_dir . $file));
            $products = implode(", ", $order->products);
            printf($mask, $order->id, $order->amount, $order->date, $products);
        }
    }
}
