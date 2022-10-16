PHP library for working with Steam Web API
==========================================

Qstart Steam Api library contains all the necessary set of methods for requesting Steam Web API

Installation
------------

```
$ composer require qstart-soft/steam-api
```

Getting Started
---------------

There are two ways to submit a request.
1. Using a PSR-18 client instance
2. On your own using your favorite library to send HTTP requests


**First** of all, we need to define the method for the request and create an instance of the method.

Each method for the api in the library is a class with properties-arguments.

### First way
**Let's send a request using the PSR-18 client:**
```php

use Qstart\SteamApi\SteamApiKey;
use Qstart\SteamApi\SteamApi;
use Qstart\SteamApi\Method\SteamApiGetOwnedGamesV1Method;

/** @var Psr\Http\Client\ClientInterface $client */

$key = new SteamApiKey('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');

$steamApi = new SteamApi($key, $client);

$method = new SteamApiGetOwnedGamesV1Method();
$method
    ->setSteamId(76561198072113884)
    ->setIncludeAppInfo(true)
    ->setIncludePlayedFreeGames(true)
    ->setAppIdsFilter([552990]);

/** @var \Psr\Http\Message\ResponseInterface $response */
$response = $steamApi->send($method);

// Json response from API
$json = $response->getBody()->getContents();
$data = json_encode($json, true);

```

### Second way
**Now consider the option with self-sending, without using PHP Standards Recommendations (PSR)**
```php

use Qstart\SteamApi\SteamApiKey;
use Qstart\SteamApi\SteamApiRequest;
use Qstart\SteamApi\Method\SteamApiGetOwnedGamesV1Method;

$key = new SteamApiKey('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
$method = new SteamApiGetOwnedGamesV1Method();
$method
    ->setSteamId(76561198072113884)
    ->setIncludeAppInfo(true)
    ->setIncludePlayedFreeGames(true)
    ->setAppIdsFilter([552990]);

$request = new SteamApiRequest($method, $key);

$link = $request->getUri();
$arguments = $request->getPreparedArguments();
$psr7Request = $request->getPsr7Request();

// Further, for example, if you want to get a link for a get request
$uri = $link . '?' . http_build_query($arguments);

```

### Formats
In order to change the format of the response, you must call the setter of the method instance
```php

use Qstart\SteamApi\SteamApiFormats;
use Qstart\SteamApi\Method\SteamApiGetOwnedGamesV1Method;

$method = new SteamApiGetOwnedGamesV1Method();
$method->setFormat(SteamApiFormats::VDF);

```

___Wonderful!___


Resources
---------

* [Steam Web API](https://developer.valvesoftware.com/wiki/Steam_Web_API)
* [PSR-7: HTTP message interfaces](https://www.php-fig.org/psr/psr-7/)
* [PSR-18: HTTP Client](https://www.php-fig.org/psr/psr-18/)