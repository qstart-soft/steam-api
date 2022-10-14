<?php

namespace Qstart\SteamApi\Method;

use Qstart\SteamApi\AbstractSteamApiMethod;
use Qstart\SteamApi\SteamApiArgument;

/**
 * GetFriendList (v0001)
 * Returns the friend list of any Steam user, provided their Steam Community profile visibility is set to "Public".
 *
 * Example URL: http://api.steampowered.com/ISteamUser/GetFriendList/v0001/?key=XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX&steamid=76561197960435530&relationship=friend
 */
class SteamApiGetFriendListV1Method extends AbstractSteamApiMethod
{
    public const RELATIONSHIP_ALL = 'all';
    public const RELATIONSHIP_FRIEND = 'friend';

    /**
     * @var integer|string 64-bit Steam ID to return friend list for.
     */
    #[SteamApiArgument('steamid')]
    protected $steamId;

    /**
     * @var string Relationship filter. Possibles values: all, friend.
     */
    #[SteamApiArgument('relationship')]
    protected $relationship;

    public function getMethodName(): string
    {
        return 'GetFriendList';
    }

    public function getVersion(): string
    {
        return 'v0001';
    }

    public function getApiInterfaceName(): string
    {
        return 'ISteamUser';
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
     * @return SteamApiGetFriendListV1Method
     */
    public function setSteamId(int|string $steamId): SteamApiGetFriendListV1Method
    {
        $this->steamId = $steamId;
        return $this;
    }

    /**
     * @return string
     */
    public function getRelationship(): string
    {
        return $this->relationship;
    }

    /**
     * @param string $relationship
     * @return SteamApiGetFriendListV1Method
     */
    public function setRelationship(string $relationship): SteamApiGetFriendListV1Method
    {
        $this->relationship = $relationship;
        return $this;
    }
}
