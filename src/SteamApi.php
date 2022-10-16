<?php

namespace Qstart\SteamApi;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class for sending a request for the required method to the Steam Web API, using a PSR-18 client.
 *
 * Usage example:
 *
 * ```php
 *
 * $key = new SteamApiKey('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
 * $client = new \GuzzleHttp\Client();
 * $steamApi = new SteamApi($key, $client);
 *
 * $method = new SteamApiGetOwnedGamesV1Method();
 * $method
 *     ->setSteamId(76561198072113884)
 *     ->setIncludeAppInfo(true)
 *     ->setIncludePlayedFreeGames(true)
 *     ->setAppIdsFilter([552990]);
 *
 * $response = $steamApi->send($method);
 *
 * // Json response from API
 * $json = $response->getBody()->getContents()
 *
 * ```
 */
class SteamApi
{
    /**
     * @param SteamApiKeyInterface $steamApiKey Steam Web API access key
     * @param ClientInterface $client PSR-18 Client with which the request will be sent
     */
    public function __construct(
        private readonly SteamApiKeyInterface $steamApiKey,
        private readonly ClientInterface $client,
    ) {
    }

    /**
     * Send a request to get data using the passed method.
     *
     * The PSR-7 response instance is returned
     *
     * @param SteamApiMethodInterface $steamApiMethod
     * @return ResponseInterface
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function send(SteamApiMethodInterface $steamApiMethod): ResponseInterface
    {
        $steamApiRequest = new SteamApiRequest($steamApiMethod, $this->getSteamApiKey());
        $psr7Request = $steamApiRequest->getPsr7Request();

        return $this->getClient()->sendRequest($psr7Request);
    }

    /**
     * @return SteamApiKeyInterface
     */
    public function getSteamApiKey(): SteamApiKeyInterface
    {
        return $this->steamApiKey;
    }

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }
}
