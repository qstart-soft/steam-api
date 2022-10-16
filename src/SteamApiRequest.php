<?php

namespace Qstart\SteamApi;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;

/**
 * The class allows you to get an array of arguments and a link for a request to api
 *
 * Example:
 * ```php
 *
 * $key = new SteamApiKey('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
 * $method = new SteamApiGetOwnedGamesV1Method();
 * $method
 *     ->setSteamId(76561198072113884)
 *     ->setIncludeAppInfo(true)
 *     ->setIncludePlayedFreeGames(true)
 *     ->setAppIdsFilter([552990]);
 *
 * $request = new SteamApiRequest($method, $key);
 *
 * $link = $request->getUri();
 * $arguments = $request->getPreparedArguments();
 * $psr7Request = $request->getPsr7Request();
 *
 * ```
 */
class SteamApiRequest implements SteamApiRequestInterface
{
    /** Base link for request */
    public const BASE_URL = 'http://api.steampowered.com';

    protected RequestInterface $request;

    /**
     * @param SteamApiMethodInterface $steamApiMethod Instance of the method to api
     * @param SteamApiKeyInterface $steamApiKey Steam Web API access key
     * @param string $baseUrl
     */
    public function __construct(
        protected SteamApiMethodInterface $steamApiMethod,
        protected SteamApiKeyInterface $steamApiKey,
        protected string $baseUrl = self::BASE_URL,
    ) {
        $uri = new Uri($this->getUri());
        $uri = $uri->withQuery(http_build_query($this->getPreparedArguments()));

        $this->request = new Request(
            method: 'GET',
            uri: $uri,
            version: '3',
        );
    }

    /**
     * @inheritDoc
     */
    public function getPsr7Request(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return sprintf(
            '%s/%s/%s/%s/',
            rtrim($this->baseUrl, '/'),
            $this->steamApiMethod->getApiInterfaceName(),
            $this->steamApiMethod->getMethodName(),
            $this->steamApiMethod->getVersion(),
        );
    }

    /**
     * @inheritDoc
     */
    public function getPreparedArguments(): array
    {
        $arguments = [];
        $arguments['key'] = $this->steamApiKey->getKey();
        $arguments['format'] = $this->steamApiMethod->getFormat();

        if (str_contains($this->steamApiMethod->getApiInterfaceName(), 'Service')) {
            $arguments['input_json'] = json_encode($this->steamApiMethod->getArguments());
        } else {
            $arguments = array_merge($arguments, $this->steamApiMethod->getArguments());
        }

        return $arguments;
    }

    /**
     * @return SteamApiMethodInterface
     */
    public function getSteamApiMethod(): SteamApiMethodInterface
    {
        return $this->steamApiMethod;
    }

    /**
     * @return SteamApiKeyInterface
     */
    public function getSteamApiKey(): SteamApiKeyInterface
    {
        return $this->steamApiKey;
    }
}
