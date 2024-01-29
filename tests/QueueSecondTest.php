<?php

use PHPUnit\Framework\TestCase;
use App\queue;
use App\QueueException;
class QueueSecondTest extends TestCase
{
    protected $queue;    
    protected function setUp(): void 
    {
        $this->queue = new Queue;
    }
    
    protected function tearDown(): void
    {
        unset($this->queue);
    }
    
    public static function setUpBeforeClass():void 
    {
    }
    public static function tearDownAfterClass():void 
    {
    }



    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        $this->queue->push('green');
        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        $this->queue->push('green');
        $item = $this->queue->pop();
        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals('green', $item);
    }
    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < queue::MAX_ITEMS ; $i++) {
            $this->queue->push($i);
        }        
        $this->assertEquals(queue::MAX_ITEMS, $this->queue->getCount());        
    }
    
    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        for ($i = 0; $i < queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }     
        $this->expectException(QueueException::class);
        $this->expectExceptionMessage("Queue is full");
        $this->queue->push("wafer thin mint");           
    }    
}