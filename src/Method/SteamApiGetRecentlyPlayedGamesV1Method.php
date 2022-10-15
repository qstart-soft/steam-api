<?php

namespace Qstart\SteamApi\Method;

use Qstart\SteamApi\AbstractSteamApiMethod;
use Qstart\SteamApi\SteamApiArgument;

/**
 * GetRecentlyPlayedGames (v0001)
 * GetRecentlyPlayedGames returns a list of games a player has played in the last two weeks, if the profile is publicly visible.
 * Private, friends-only, and other privacy settings are not supported unless you are asking for your own personal details
 * (ie the WebAPI key you are using is linked to the steamid you are requesting).
 *
 * Example URL: http://api.steampowered.com/IPlayerService/GetRecentlyPlayedGames/v0001/?key=XXXXXXXXXXXXXXXXX&steamid=76561197960434622&format=json
 */
class SteamApiGetRecentlyPlayedGamesV1Method extends AbstractSteamApiMethod
{
    /**
     * @var integer|string The SteamID of the account.
     */
    #[SteamApiArgument('steamid', true)]
    protected $steamId;

    /**
     * @var integer Optionally limit to a certain number of games (the number of games a person has played in the last 2 weeks is typically very small)
     */
    #[SteamApiArgument('count')]
    protected $count;

    public function getMethodName(): string
    {
        return 'GetRecentlyPlayedGames';
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
     * Get the SteamID of the account.
     * @return int|string
     */
    public function getSteamId(): int|string
    {
        return $this->steamId;
    }

    /**
     * Set the SteamID of the account.
     * @param int|string $steamId
     * @return SteamApiGetRecentlyPlayedGamesV1Method
     */
    public function setSteamId(int|string $steamId): SteamApiGetRecentlyPlayedGamesV1Method
    {
        $this->steamId = $steamId;
        return $this;
    }

    /**
     * Optionally limit to a certain number of games (the number of games a person has played in the last 2 weeks is typically very small)
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * Optionally limit to a certain number of games (the number of games a person has played in the last 2 weeks is typically very small)
     * @param int $count
     * @return SteamApiGetRecentlyPlayedGamesV1Method
     */
    public function setCount(int $count): SteamApiGetRecentlyPlayedGamesV1Method
    {
        $this->count = $count;
        return $this;
    }
}
