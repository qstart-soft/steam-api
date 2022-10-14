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
    #[SteamApiArgument('appid')]
    protected $appid;
    /**
     * @var integer How much news enties you want to get returned.
     */
    #[SteamApiArgument('count')]
    protected $count;
    /**
     * @var integer Maximum length of each news entry.
     */
    #[SteamApiArgument('maxlength')]
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
     * @return int
     */
    public function getAppid(): int
    {
        return $this->appid;
    }

    /**
     * @param int $appid
     * @return SteamApiGetNewsForAppV2Method
     */
    public function setAppid(int $appid): SteamApiGetNewsForAppV2Method
    {
        $this->appid = $appid;
        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     * @return SteamApiGetNewsForAppV2Method
     */
    public function setCount(int $count): SteamApiGetNewsForAppV2Method
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxlength(): int
    {
        return $this->maxlength;
    }

    /**
     * @param int $maxlength
     * @return SteamApiGetNewsForAppV2Method
     */
    public function setMaxlength(int $maxlength): SteamApiGetNewsForAppV2Method
    {
        $this->maxlength = $maxlength;
        return $this;
    }

}
