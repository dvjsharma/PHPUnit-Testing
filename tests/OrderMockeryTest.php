<?php
use App\Order;
use App\PaymentGateway;

// class MockeryTest extends PHPUnit\Framework\TestCase {
//     public function tearDown(){
//         Mockery::close();
//     }
// }

//!or use the mockery ectended class
class OrderMockeryTest extends Mockery\Adapter\Phpunit\MockeryTestCase {
    public function testOrderIsProcessed(){
        $gateway = Mockery::mock(PaymentGateway::class);
        $gateway->shouldReceive('charge')
            ->once()
            ->with(200)
            ->andReturn(true);
        $order = new Order($gateway);
        $order->amount = 200;
        $this->assertTrue($order->process());
    }
}
