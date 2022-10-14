<?php

namespace Qstart\SteamApi\Method;

use Qstart\SteamApi\AbstractSteamApiMethod;
use Qstart\SteamApi\SteamApiArgument;

/**
 * GetUserStatsForGame (v0002)
 * Returns a list of achievements for this user by app id
 *
 * Example URL: http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=440&key=XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX&steamid=76561197972495328
 */
class SteamApiGetUserStatsForGameV2Method extends AbstractSteamApiMethod
{
    /**
     * @var integer|string 64-bit Steam ID to return friend list for.
     */
    #[SteamApiArgument('steamid')]
    protected $steamId;

    /**
     * @var integer The ID for the game you're requesting
     */
    #[SteamApiArgument('appid')]
    protected $appid;

    /**
     * @var string Language. If specified, it will return language data for the requested language.
     */
    #[SteamApiArgument('l')]
    protected $language;

    public function getMethodName(): string
    {
        return 'GetUserStatsForGame';
    }

    public function getVersion(): string
    {
        return 'v0002';
    }

    public function getApiInterfaceName(): string
    {
        return 'ISteamUserStats';
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
     * @return SteamApiGetPlayerAchievementsV1Method
     */
    public function setSteamId(int|string $steamId): SteamApiGetPlayerAchievementsV1Method
    {
        $this->steamId = $steamId;
        return $this;
    }

    /**
     * @return int
     */
    public function getAppid(): int
    {
        return $this->appid;
    }

    /**
     * @param int $appid
     * @return SteamApiGetPlayerAchievementsV1Method
     */
    public function setAppid(int $appid): SteamApiGetPlayerAchievementsV1Method
    {
        $this->appid = $appid;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return SteamApiGetPlayerAchievementsV1Method
     */
    public function setLanguage(string $language): SteamApiGetPlayerAchievementsV1Method
    {
        $this->language = $language;
        return $this;
    }
}
