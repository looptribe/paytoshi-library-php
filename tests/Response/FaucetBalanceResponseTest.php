<?php

namespace Looptribe\Paytoshi\Tests\Api\Response;

use Looptribe\Paytoshi\Api\Response\FaucetBalanceResponse;

class FaucetBalanceResponseTest extends \PHPUnit_Framework_TestCase
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
            ->willReturn('{"available_balance":15000}');

        $sut = new FaucetBalanceResponse($response);

        $this->assertTrue($sut->isSuccessful());
        $this->assertNull($sut->getError());
        $this->assertNull($sut->getErrorCode());
        $this->assertSame(15000, $sut->getAvailableBalance());
    }
}
