Paytoshi PHP Library
========================================================

PHP Library for [Paytoshi's API](https://paytoshi.org/api). 


## Requirements
* PHP >= 5.3
* PHP cURL extension (recommended) OR
* [allow_fopen_url](http://php.net/manual/en/filesystem.configuration.php#ini.allow-url-fopen) enabled in your PHP config.

## Usage
### Faucet Send API
Create a new faucet payout.
``` php
<?php

require 'Paytoshi.php';

$paytoshi = new Paytoshi();

// Create a new payout
$result = $paytoshi->faucetSend(
    'a8p9uevhfgx7ewt1kf09v2n3kfhzkeyxi8ywcehfqnl9is30gq', //Faucet Api key
    '1EhNaUFaVW99in6drLeD8ygrLicAcf8rAc', //Bitcoin address
    100, //Amount
    '127.0.0.1' //Recipient ip
);

// Create a referral payout
$result = $paytoshi->faucetSend(
    'a8p9uevhfgx7ewt1kf09v2n3kfhzkeyxi8ywcehfqnl9is30gq',  //Faucet Api key
    '18aWoXRJRTfK8ZdxH9Y8qW3Q3AKPqra2DlyO',  //Bitcoin address
    100, //Amount
    '127.0.0.1', //Recipient ip
    true //Referral flag
);
```

Check balance.
``` php
// Check balance
$result = $paytoshi->faucetBalance(
    'a8p9uevhfgx7ewt1kf09v2n3kfhzkeyxi8ywcehfqnl9is30gq'  //Faucet Api key
);
```

Those methods return an array corresponding to the API response or `NULL` if there's a connection error.

You can use the PHP native `file_get_contents` instead of the cUrl extension
``` php
$paytoshi = new Paytoshi(false);
```

You can also control the timeout by passing it as 3rd argument
``` php
$paytoshi = new Paytoshi(true, true, 20); // 20 seconds
```

By default, half of script execution time is used. To disable timeout, pass `0`.
