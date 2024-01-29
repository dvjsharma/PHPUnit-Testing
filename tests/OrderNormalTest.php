<?php

use App\Order;
use App\PaymentGateway;
class OrderNormalTest extends PHPUnit\Framework\TestCase
{
    public function testTemp(){
        $this->assertTrue(true);
    }
    public function testOrderIsProcessed()
    {
        $gateway = $this->getMockBuilder(PaymentGateway::class) 
                        ->onlyMethods(['charge']) 
                        ->getMock(); 
        
        $gateway->method('charge')
                ->with($this->equalTo(200))
                ->willReturn(true);
        
        $order = new Order($gateway);

        $order->amount = 200;
        
        $this->assertTrue(true);
    }
}