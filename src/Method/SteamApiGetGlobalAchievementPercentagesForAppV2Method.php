<?php

namespace Qstart\SteamApi\Method;

use Qstart\SteamApi\AbstractSteamApiMethod;
use Qstart\SteamApi\SteamApiArgument;

/**
 * GetGlobalAchievementPercentagesForApp (v0002)
 * Returns on global achievements overview of a specific game in percentages.
 *
 * Example: http://api.steampowered.com/ISteamUserStats/GetGlobalAchievementPercentagesForApp/v0002/?gameid=440&format=xml
 */
class SteamApiGetGlobalAchievementPercentagesForAppV2Method extends AbstractSteamApiMethod
{
    /**
     * @var integer AppID of the game you want the news of.
     */
    #[SteamApiArgument('gameid', true)]
    protected $gameId;

    public function getMethodName(): string
    {
        return 'GetGlobalAchievementPercentagesForApp';
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
     * Get AppID of the game you want the news of.
     * @return int
     */
    public function getGameId(): int
    {
        return $this->gameId;
    }

    /**
     * Set AppID of the game you want the news of.
     * @param int $gameId
     * @return SteamApiGetGlobalAchievementPercentagesForAppV2Method
     */
    public function setGameId(int $gameId): SteamApiGetGlobalAchievementPercentagesForAppV2Method
    {
        $this->gameId = $gameId;
        return $this;
    }
}
