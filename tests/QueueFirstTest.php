<?php

use PHPUnit\Framework\TestCase;
use App\queue;

class QueueFirstTest extends TestCase
{
    public function testNewQueueIsEmpty()
    {
        $queue = new queue; 
        
        $this->assertEquals(0, $queue->getCount());
        
        return $queue; 
    }
    /**
     * @depends testNewQueueIsEmpty
     */    
    public function testAnItemIsAddedToTheQueue(Queue $queue) 
    {
        $queue->push('green');
        
        $this->assertEquals(1, $queue->getCount());   
        
        return $queue; 
    }
    
    /**
     * @depends testAnItemIsAddedToTheQueue
     */      
    public function testAnItemIsRemovedFromTheQueue(Queue $queue)
    {
        $item = $queue->pop(); 
        
        $this->assertEquals(0, $queue->getCount());
        
        $this->assertEquals('green', $item);
    }     
}