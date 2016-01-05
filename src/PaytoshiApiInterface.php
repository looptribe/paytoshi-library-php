<?php

namespace Looptribe\Paytoshi\Api;

interface PaytoshiApiInterface
{
    /**
     * @param string $apikey
     * @param string $address
     * @param int $amount
     * @param string $ip
     * @param bool|false $referral
     * @return Response\FaucetSendResponse
     */
    public function send($apikey, $address, $amount, $ip, $referral = false);

    /**
     * @param string $apikey
     * @return Response\FaucetBalanceResponse
     */
    public function getBalance($apikey);
}
