<?php

namespace Qstart\SteamApi\Method;

use Qstart\SteamApi\AbstractSteamApiMethod;
use Qstart\SteamApi\SteamApiArgument;

/**
 * GetPlayerAchievements (v0001)
 * Returns a list of achievements for this user by app id
 *
 * Example URL: http://api.steampowered.com/ISteamUserStats/GetPlayerAchievements/v0001/?appid=440&key=XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX&steamid=76561197972495328
 */
class SteamApiGetPlayerAchievementsV1Method extends AbstractSteamApiMethod
{
    /**
     * @var integer|string 64-bit Steam ID to return friend list for.
     */
    #[SteamApiArgument('steamid', true)]
    protected $steamId;

    /**
     * @var integer The ID for the game you're requesting
     */
    #[SteamApiArgument('appid', true)]
    protected $appId;

    /**
     * @var string Language. If specified, it will return language data for the requested language.
     */
    #[SteamApiArgument('l')]
    protected $language;

    public function getMethodName(): string
    {
        return 'GetPlayerAchievements';
    }

    public function getVersion(): string
    {
        return 'v0001';
    }

    public function getApiInterfaceName(): string
    {
        return 'ISteamUserStats';
    }

    /**
     * Get 64-bit Steam ID to return friend list for.
     * @return int|string
     */
    public function getSteamId(): int|string
    {
        return $this->steamId;
    }

    /**
     * Set 64-bit Steam ID to return friend list for.
     * @param int|string $steamId
     * @return SteamApiGetPlayerAchievementsV1Method
     */
    public function setSteamId(int|string $steamId): SteamApiGetPlayerAchievementsV1Method
    {
        $this->steamId = $steamId;
        return $this;
    }

    /**
     * Get the ID for the game you're requesting
     * @return int
     */
    public function getAppId(): int
    {
        return $this->appId;
    }

    /**
     * Set the ID for the game you're requesting
     * @param int $appId
     * @return SteamApiGetPlayerAchievementsV1Method
     */
    public function setAppId(int $appId): SteamApiGetPlayerAchievementsV1Method
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * Get language. If specified, it will return language data for the requested language.
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * Set language. If specified, it will return language data for the requested language.
     * @param string $language
     * @return SteamApiGetPlayerAchievementsV1Method
     */
    public function setLanguage(string $language): SteamApiGetPlayerAchievementsV1Method
    {
        $this->language = $language;
        return $this;
    }
}
