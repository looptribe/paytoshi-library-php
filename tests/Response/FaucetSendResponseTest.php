<?php

namespace Looptribe\Paytoshi\Tests\Api\Response;

use Looptribe\Paytoshi\Api\Response\FaucetSendResponse;

class FaucetSendResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testParseSuccessful()
    {
        $response = $this->getMock('Buzz\Message\Response');

        $response
            ->expects($this->any())
            ->method('isSuccessful')
            ->willReturn(true);

        $response
            ->expects($this->any())
            ->method('getContent')
            ->willReturn('{"recipient":"mipcBbFg9gMiCh81Kj8tqqdgoZub1ZJRfn","amount":100}');

        $sut = new FaucetSendResponse($response);

        $this->assertTrue($sut->isSuccessful());
        $this->assertNull($sut->getError());
        $this->assertNull($sut->getErrorCode());
        $this->assertSame('mipcBbFg9gMiCh81Kj8tqqdgoZub1ZJRfn', $sut->getRecipient());
        $this->assertSame(100, $sut->getAmount());
    }
}
