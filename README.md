Paytoshi PHP Library
========================================================

[![Build Status](https://img.shields.io/travis/looptribe/paytoshi-library-php/master.svg)](https://travis-ci.org/looptribe/paytoshi-library-php)
[![Coverage Status](https://img.shields.io/coveralls/looptribe/paytoshi-library-php/master.svg)](https://coveralls.io/github/looptribe/paytoshi-library-php)
[![Packagist](https://img.shields.io/packagist/vpre/looptribe/paytoshi-php-library.svg)](https://packagist.org/packages/looptribe/paytoshi-library-php)

PHP Library for [Paytoshi's API](https://paytoshi.org/api). 


## Requirements
* PHP >= 5.3
* PHP cURL extension (recommended) OR
* [allow_fopen_url](http://php.net/manual/en/filesystem.configuration.php#ini.allow-url-fopen) enabled in your PHP config.

## Installation
The recommended way to install Paytoshi PHP Library is through [composer](https://getcomposer.org/).
```
composer.phar require looptribe/paytoshi-library-php
```

## Usage
Paytoshi PHP Library uses the [Buzz library](https://github.com/kriswallsmith/Buzz).

### Create the API wrapper object

#### Using FileGetContents

``` php
<?php

$browser = new \Buzz\Browser();
$paytoshi = new \Looptribe\Paytoshi\Api\PaytoshiApi($browser, 'http://paytoshi.org/api/v1/');
```

#### Using cUrl

``` php
<?php

$browser = new \Buzz\Browser(new \Buzz\Client\Curl());
$paytoshi = new Looptribe\Paytoshi\Api\PaytoshiApi($browser, 'http://paytoshi.org/api/v1/');
```

### Setup the client
If you wish you can set a timeout on the requests (default 5 seconds):
``` php
<?php

// Set 10 seconds of timeout
$browser->getClient()->setTimeout(10);
```

### Faucet API

#### Create a new faucet payout
``` php
<?php
// Create the $paytoshi object as explained in the previous section
...

// Create a new payout
$result = $paytoshi->send(
    'a8p9uevhfgx7ewt1kf09v2n3kfhzkeyxi8ywcehfqnl9is30gq', //Faucet Api key
    '1EhNaUFaVW99in6drLeD8ygrLicAcf8rAc', //Bitcoin address
    100, //Amount
    '127.0.0.1' //Recipient ip
);

// Create a referral payout
$result = $paytoshi->send(
    'a8p9uevhfgx7ewt1kf09v2n3kfhzkeyxi8ywcehfqnl9is30gq',  //Faucet Api key
    '18aWoXRJRTfK8ZdxH9Y8qW3Q3AKPqra2DlyO',  //Bitcoin address
    100, //Amount
    '127.0.0.1', //Recipient ip
    true //Referral flag
);
```

#### Check balance
``` php
// Check balance
$result = $paytoshi->getBalance(
    'a8p9uevhfgx7ewt1kf09v2n3kfhzkeyxi8ywcehfqnl9is30gq'  //Faucet Api key
);

// Your balance in satoshi
$balance = $result->getAvailableBalance();
```

## License
Paytoshi PHP Library is [BSD licensed](./LICENSE).
