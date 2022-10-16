<?php

namespace Qstart\SteamApi\Method;

use Qstart\SteamApi\AbstractSteamApiMethod;
use Qstart\SteamApi\SteamApiArgument;

/**
 * GetPlayerSummaries (v0002)
 * Returns basic profile information for a list of 64-bit Steam IDs.
 *
 * Example URL: http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=XXXXXXXXXXXXXXXXXXXXXXX&steamids=76561197960435530
 * (This will show Robin Walker's profile information.)
 */
class SteamApiGetPlayerSummariesV2Method extends AbstractSteamApiMethod
{
    /**
     * @var string Comma-delimited list of 64-bit Steam IDs to return profile information for. Up to 100 Steam IDs can be requested.
     */
    #[SteamApiArgument('steamids', true)]
    protected $steamIds;

    public function getMethodName(): string
    {
        return 'GetPlayerSummaries';
    }

    public function getVersion(): string
    {
        return 'v0002';
    }

    public function getApiInterfaceName(): string
    {
        return 'ISteamUser';
    }

    /**
     * Get comma-delimited list of 64-bit Steam IDs to return profile information for. Up to 100 Steam IDs can be requested.
     * @return string
     */
    public function getSteamIds(): string
    {
        return $this->steamIds;
    }

    /**
     * Set list of 64-bit Steam IDs to return profile information for. Up to 100 Steam IDs can be requested.
     * @param array $steamIds
     * @return SteamApiGetPlayerSummariesV2Method
     */
    public function setSteamIds(array $steamIds): SteamApiGetPlayerSummariesV2Method
    {
        $steamIds = is_array($steamIds) ? implode(',', $steamIds) : $steamIds;
        $this->steamIds = $steamIds;
        return $this;
    }
}
