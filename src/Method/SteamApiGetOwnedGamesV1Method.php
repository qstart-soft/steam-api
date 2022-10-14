<?php

namespace Qstart\SteamApi\Method;

use Qstart\SteamApi\AbstractSteamApiMethod;
use Qstart\SteamApi\SteamApiArgument;

/**
 * GetOwnedGames (v0001)
 * GetOwnedGames returns a list of games a player owns along with some playtime information, if the profile is publicly visible.
 * Private, friends-only, and other privacy settings are not supported unless you are asking for your own personal details
 * (ie the WebAPI key you are using is linked to the steamid you are requesting).
 *
 * Example URL: http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=XXXXXXXXXXXXXXXXX&steamid=76561197960434622&format=json
 */
class SteamApiGetOwnedGamesV1Method extends AbstractSteamApiMethod
{
    /**
     * @var integer|string 64-bit Steam ID to return friend list for.
     */
    #[SteamApiArgument('steamid')]
    protected $steamId;

    /**
     * @var boolean Include game name and logo information in the output. The default is to return appids only.
     */
    #[SteamApiArgument('include_appinfo')]
    protected $includeAppInfo;

    /**
     * @var boolean By default, free games like Team Fortress 2 are excluded (as technically everyone owns them). If include_played_free_games is set, they will be returned if the player has played them at some point. This is the same behavior as the games list on the Steam Community.
     */
    #[SteamApiArgument('include_played_free_games')]
    protected $includePlayedFreeGames;

    /**
     * @var array You can optionally filter the list to a set of appids. Note that these cannot be passed as a URL parameter, instead you must use the JSON format described in Steam_Web_API#Calling_Service_interfaces. The expected input is an array of integers (in JSON: "appids_filter: [ 440, 500, 550 ]" )
     */
    #[SteamApiArgument('appids_filter')]
    protected $appIdsFilter;

    public function getMethodName(): string
    {
        return 'GetOwnedGames';
    }

    public function getVersion(): string
    {
        return 'v0001';
    }

    public function getApiInterfaceName(): string
    {
        return 'IPlayerService';
    }

    /**
     * @return int|string
     */
    public function getSteamId(): int|string
    {
        return $this->steamId;
    }

    /**
     * @param int|string $steamId
     * @return SteamApiGetOwnedGamesV1Method
     */
    public function setSteamId(int|string $steamId): SteamApiGetOwnedGamesV1Method
    {
        $this->steamId = $steamId;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIncludeAppInfo(): bool
    {
        return $this->includeAppInfo;
    }

    /**
     * @param bool $includeAppInfo
     * @return SteamApiGetOwnedGamesV1Method
     */
    public function setIncludeAppInfo(bool $includeAppInfo): SteamApiGetOwnedGamesV1Method
    {
        $this->includeAppInfo = $includeAppInfo;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIncludePlayedFreeGames(): bool
    {
        return $this->includePlayedFreeGames;
    }

    /**
     * @param bool $includePlayedFreeGames
     * @return SteamApiGetOwnedGamesV1Method
     */
    public function setIncludePlayedFreeGames(bool $includePlayedFreeGames): SteamApiGetOwnedGamesV1Method
    {
        $this->includePlayedFreeGames = $includePlayedFreeGames;
        return $this;
    }

    /**
     * @return array
     */
    public function getAppIdsFilter(): array
    {
        return $this->appIdsFilter;
    }

    /**
     * @param array $appIdsFilter
     * @return SteamApiGetOwnedGamesV1Method
     */
    public function setAppIdsFilter(array $appIdsFilter): SteamApiGetOwnedGamesV1Method
    {
        $this->appIdsFilter = $appIdsFilter;
        return $this;
    }
}
