<?php

namespace Qstart\SteamApi;

interface SteamApiRequestInterface
{
    /**
     * API request url without query
     * @example http://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/
     * @return string
     */
    public function getUrl(): string;

    /**
     * Array of arguments for the request including key, format and arguments
     * @return array
     */
    public function getArguments(): array;

    /**
     * There is a new style of WebAPI which we refer to as "Services".
     * They function in many ways like the WebAPIs you are used to, the main difference being that all service APIs
     * will accept their arguments as a single JSON blob in addition to taking them as GET or POST parameters.
     *
     * To pass in data as JSON, invoke the webapi with a parameter set like:
     * ```
     * ?key=XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX&format=json&input_json={steamid: 76561197972495328}
     * ```
     *
     * Note that the JSON will need to be URL-encoded. The "key" and "format" fields should still be passed as separate parameters, as before.
     * POST requests are supported as well.
     *
     * You can identify if a WebAPI is a "Service" by the name of the interface;
     * if it ends in "Service" like "IPlayerService", then it supports this additional method of passing parameter data.
     * Some Service methods have parameters that are more complex structures and require this different input format.
     *
     * @return array
     */
    public function getArgumentsForJsonApiRequest(): array;
}
