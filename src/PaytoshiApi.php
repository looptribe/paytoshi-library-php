<?php

namespace Looptribe\Paytoshi\Api;

use Buzz\Browser;

class PaytoshiApi implements PaytoshiApiInterface
{
    /** @var Browser */
    private $browser;

    /** @var string */
    private $baseUrl;

    /** @var array */
    private $headers;

    public function __construct(Browser $browser, $baseUrl)
    {
        $this->browser = $browser;
        $this->baseUrl = $baseUrl;
        $this->headers = array(
            'Connection' => 'close',
        );
    }

    /**
     * @inheritdoc
     */
    public function send($apikey, $address, $amount, $ip, $referral = false)
    {
        $url = $this->buildUrl('faucet/send', $apikey);
        $data = http_build_query(array(
            'address' => $address,
            'amount' => $amount,
            'referral' => $referral,
            'ip' => $ip
        ));

        $response = $this->browser->post($url, $this->headers, $data);

        return new Response\FaucetSendResponse($response);
    }

    /**
     * @inheritdoc
     */
    public function getBalance($apikey)
    {
        $url = $this->buildUrl('faucet/balance', $apikey);

        $response = $this->browser->get($url, $this->headers);

        return new Response\FaucetBalanceResponse($response);
    }

    private function buildUrl($action, $apikey)
    {
        return $this->baseUrl . $action . '?' . http_build_query(array('apikey' => $apikey));
    }
}
