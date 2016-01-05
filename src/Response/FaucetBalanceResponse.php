<?php

namespace Looptribe\Paytoshi\Api\Response;

use Buzz\Message\Response;
use Looptribe\Paytoshi\Api\ApiResponse;

class FaucetBalanceResponse extends ApiResponse
{
    /** @var int */
    private $availableBalance = null;

    /**
     * @return int
     */
    public function getAvailableBalance()
    {
        return $this->availableBalance;
    }

    protected function parseContent(Response $response, $content)
    {
        parent::parseContent($response, $content);

        if ($response->isSuccessful()) {
            $this->availableBalance = $content['available_balance'];
        }
    }
}
