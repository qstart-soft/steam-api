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

**First** of all, we need to define the method for the request and create an instance of the method.

Each method for the api in the library is a class with properties-arguments.

In the **second** step, we create an instance of the API request with the previously created method

Here is an example of creating a request:
```php

use Qstart\SteamApi\SteamApiKey;
use Qstart\SteamApi\SteamApiFormats;
use Qstart\SteamApi\SteamApiRequest;
use Qstart\SteamApi\Method\SteamApiGetFriendListV1Method;

$method = new SteamApiGetFriendListV1Method();
$method
    ->setSteamId(76561197960435530)
    ->setRelationship(SteamApiGetFriendListV1Method::RELATIONSHIP_FRIEND);

$request = new SteamApiRequest(
    $method,
    new SteamApiKey('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
    SteamApiFormats::JSON,
);
```

Then using your favorite library to send HTTP requests you can send a request to the api.
Arguments can be passed as GET or POST parameters

```php
$url = $request->getUrl();

$arguments = $request->getArguments();
# Or you can use the argument format for a special JSON request to the steam service
$arguments = $request->getArgumentsForJsonApiRequest();
```



___Wonderful!___


Resources
---------

* [Steam Web API](https://developer.valvesoftware.com/wiki/Steam_Web_API)