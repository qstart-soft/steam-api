<?php

namespace Qstart\SteamApi;

/**
 * The class allows you to get an array of arguments and a link for a request to api
 *
 * Example:
 * ```
 * $request = new SteamApiRequest(
 *     $method,
 *     new SteamApiKey('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
 *     SteamApiFormats::JSON,
 * );
 * ```
 */
class SteamApiRequest implements SteamApiRequestInterface
{
    /** Base link for request */
    public const BASE_URL = 'http://api.steampowered.com';

    public function __construct(
        protected SteamApiMethodInterface $method,
        protected SteamApiKeyInterface $key,
        protected string $format = SteamApiFormats::JSON,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function getUrl(): string
    {
        return sprintf(
            '%s/%s/%s/%s/',
            rtrim(self::BASE_URL, '/'),
            $this->method->getApiInterfaceName(),
            $this->method->getMethodName(),
            $this->method->getVersion(),
        );
    }

    /**
     * @inheritDoc
     */
    public function getArguments(): array
    {
        $arguments = $this->method->getArguments();
        $arguments['format'] = $this->format;
        $arguments['key'] = $this->key->getKey();

        return $arguments;
    }

    /**
     * @inheritDoc
     */
    public function getArgumentsForJsonApiRequest(): array
    {
        $arguments = ['input_json' => json_encode($this->method->getArguments())];
        $arguments['format'] = $this->format;
        $arguments['key'] = $this->key->getKey();

        return $arguments;
    }

    /**
     * @return SteamApiMethodInterface
     */
    public function getMethod(): SteamApiMethodInterface
    {
        return $this->method;
    }

    /**
     * @return SteamApiKeyInterface
     */
    public function getKey(): SteamApiKeyInterface
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }
}
