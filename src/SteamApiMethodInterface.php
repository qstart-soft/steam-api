<?php

namespace Qstart\SteamApi;

interface SteamApiMethodInterface
{
    /**
     * An array of arguments for this method. Used to pass in the query string to api
     * @return array
     */
    public function getArguments(): array;

    /**
     * Api method name
     * @return string
     */
    public function getMethodName(): string;

    /**
     * Api version name
     * @return string
     */
    public function getVersion(): string;

    /**
     * Api interface name
     * @return string
     */
    public function getApiInterfaceName(): string;

    /**
     * Output format. json (default), xml or vdf.
     *
     * @return string
     */
    public function getFormat(): string;
}
