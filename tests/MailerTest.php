<?php

use PHPUnit\Framework\TestCase;
use App\Mailer;
class MailerTest extends TestCase
{
    public function testMock(){
        $mock=$this->createMock(App\Mailer::class);
        $mock->method('sendMessage')->willReturn(true); 
        $result = $mock->sendMessage('test@test.com','Hello');
        $this->assertTrue($result);
    }

    public function testSendMessageReturnsTrue()
    {
        $this->assertTrue(Mailer::send('dave@example.com', 'Hello!'));
    }
    
    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
            
        Mailer::send('', '');
    }      
}
