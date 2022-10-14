<?php

namespace Qstart\SteamApi;

/**
 * Steam WEB API access key instance
 */
class SteamApiKey implements SteamApiKeyInterface
{
    public function __construct(
        private string $key
    ) {
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return SteamApiKey
     */
    public function setKey(string $key): SteamApiKeyInterface
    {
        $this->key = $key;
        return $this;
    }
}
