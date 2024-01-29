<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php'; 

class UnitTest extends TestCase{
    public function testAddition_nocall(){
        $this->assertEquals(2, 1+1); 
    }
    public function testAddition_call(){
        $instance = new App\methods();
        $this->assertEquals(2, $instance->addition(1,1));
        $this->assertEquals(8, $instance->addition(3,5));

        $this->assertNotEquals(2, $instance->addition(1,0));
        $this->assertNotEquals(8, $instance->addition(3,3));
    }
}