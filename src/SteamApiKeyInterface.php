<?php

namespace Qstart\SteamApi;

/**
 * Steam WEB API access key interface
 */
interface SteamApiKeyInterface
{
    /**
     * Get access key
     * @return string
     */
    public function getKey(): string;

    /**
     * Set access key
     * @param string $key
     * @return SteamApiKeyInterface
     */
    public function setKey(string $key): SteamApiKeyInterface;
}