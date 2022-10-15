<?php

namespace Qstart\SteamApi\Method;

use Qstart\SteamApi\AbstractSteamApiMethod;
use Qstart\SteamApi\SteamApiArgument;

/**
 * GetNewsForApp (v0002)
 * GetNewsForApp returns the latest of a game specified by its appID.
 *
 * Example URL: http://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid=440&count=3&maxlength=300&format=json
 */
class SteamApiGetNewsForAppV2Method extends AbstractSteamApiMethod
{
    /**
     * @var integer AppID of the game you want the news of.
     */
    #[SteamApiArgument('appid', true)]
    protected $appId;
    /**
     * @var integer How much news enties you want to get returned.
     */
    #[SteamApiArgument('count', true)]
    protected $count;
    /**
     * @var integer Maximum length of each news entry.
     */
    #[SteamApiArgument('maxlength', true)]
    protected $maxlength;

    public function getMethodName(): string
    {
        return 'GetNewsForApp';
    }

    public function getVersion(): string
    {
        return 'v0002';
    }

    public function getApiInterfaceName(): string
    {
        return 'ISteamNews';
    }

    /**
     * Get AppID of the game you want the news of.
     * @return int
     */
    public function getAppId(): int
    {
        return $this->appId;
    }

    /**
     * Set AppID of the game you want the news of.
     * @param int $appId
     * @return SteamApiGetNewsForAppV2Method
     */
    public function setAppId(int $appId): SteamApiGetNewsForAppV2Method
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * Get How much news enties you want to get returned.
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * Set How much news enties you want to get returned.
     * @param int $count
     * @return SteamApiGetNewsForAppV2Method
     */
    public function setCount(int $count): SteamApiGetNewsForAppV2Method
    {
        $this->count = $count;
        return $this;
    }

    /**
     * Get Maximum length of each news entry.
     * @return int
     */
    public function getMaxlength(): int
    {
        return $this->maxlength;
    }

    /**
     * Set Maximum length of each news entry.
     * @param int $maxlength
     * @return SteamApiGetNewsForAppV2Method
     */
    public function setMaxlength(int $maxlength): SteamApiGetNewsForAppV2Method
    {
        $this->maxlength = $maxlength;
        return $this;
    }
}
