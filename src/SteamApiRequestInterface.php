<?php

namespace Qstart\SteamApi;

use Psr\Http\Message\RequestInterface;

interface SteamApiRequestInterface
{
    /**
     * The PSR-7 request instance to send with the PSR-7 client
     * @return RequestInterface
     */
    public function getPsr7Request(): RequestInterface;

    /**
     * API request URI without query
     * @example http://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/
     * @return string
     */
    public function getUri(): string;

    /**
     * Array of arguments for the request including key, format and arguments
     * @return array
     */
    public function getPreparedArguments(): array;
}
