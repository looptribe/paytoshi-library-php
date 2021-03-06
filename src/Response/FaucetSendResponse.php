<?php

namespace Looptribe\Paytoshi\Api\Response;

use Buzz\Message\Response;
use Looptribe\Paytoshi\Api\ApiResponse;

class FaucetSendResponse extends ApiResponse
{
    /** @var int */
    private $amount = null;

    /** @var string */
    private $recipient = null;

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    protected function parseContent(Response $response, $content)
    {
        parent::parseContent($response, $content);

        if ($response->isSuccessful()) {
            $this->amount = $content['amount'];
            $this->recipient = $content['recipient'];
        }
    }
}