<?php

use App\users;

class UserTest extends \PHPUnit\Framework\TestCase{
    public function testgetFullname(){ 
        $instance = new users('John', 'Doe');
        $this->assertEquals('John Doe', $instance->getFullName());
    }
    public function testSpaces(){ 
        $instance = new users('','');
        $this->assertEquals('', $instance->getFullName()); 
    }

    public function testNotificationsIsSent(){
       
        $user = new users('John', 'Doe');
        $user->email = 'test@test.com';
        $mock = $this->createMock(App\Mailer::class);
        $mock->expects($this->once()) 
            ->method('sendMessage')
            ->with($this->equalTo('test@test.com'), $this->equalTo('Hello'))
            ->willReturn(true);
        $user->setMailer($mock);
        $this->assertTrue($user->notify('Hello')); 
    }
}