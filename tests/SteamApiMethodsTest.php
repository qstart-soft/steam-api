<?php

namespace Qstart\SteamApi\Tests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Qstart\SteamApi\Method\SteamApiGetFriendListV1Method;
use Qstart\SteamApi\Method\SteamApiGetGlobalAchievementPercentagesForAppV2Method;
use Qstart\SteamApi\Method\SteamApiGetNewsForAppV2Method;
use Qstart\SteamApi\Method\SteamApiGetOwnedGamesV1Method;
use Qstart\SteamApi\Method\SteamApiGetPlayerAchievementsV1Method;
use Qstart\SteamApi\Method\SteamApiGetPlayerSummariesV2Method;
use Qstart\SteamApi\Method\SteamApiGetRecentlyPlayedGamesV1Method;
use Qstart\SteamApi\Method\SteamApiGetUserStatsForGameV2Method;
use Qstart\SteamApi\SteamApi;
use Qstart\SteamApi\SteamApiKey;

class SteamApiMethodsTest extends TestCase
{
    public const STEAM_IDS = [
        76561198072113884,
    ];
    public const GAME_IDS = [
        552990, 252490, 730
    ];

    public static $client;
    public static $steamApi;

    public static function setUpBeforeClass(): void
    {
        self::$client = new Client();
        self::$steamApi = new SteamApi(
            new SteamApiKey(STEAM_API_KEY),
            self::$client,
        );
        parent::setUpBeforeClass();
    }

    public function testGetFriendListV1Method()
    {
        $method = new SteamApiGetFriendListV1Method();
        $method->setSteamId(self::STEAM_IDS[0])->setRelationship(SteamApiGetFriendListV1Method::RELATIONSHIP_ALL);

        $response = self::$steamApi->send($method);
        $this->assertBaseJsonResponseStructure($response);
    }

    public function testGetGlobalAchievementPercentagesForAppV2Method()
    {
        $method = new SteamApiGetGlobalAchievementPercentagesForAppV2Method();
        $method->setGameId(self::GAME_IDS[0]);

        $response = self::$steamApi->send($method);
        $this->assertBaseJsonResponseStructure($response);
    }

    public function testGetNewsForAppV2Method()
    {
        $method = new SteamApiGetNewsForAppV2Method();
        $method->setAppId(self::GAME_IDS[0])->setCount(2)->setMaxlength(1024);

        $response = self::$steamApi->send($method);
        $this->assertBaseJsonResponseStructure($response);
    }

    public function testGetOwnedGamesV1Method()
    {
        $method = new SteamApiGetOwnedGamesV1Method();
        $method
            ->setSteamId(self::STEAM_IDS[0])
            ->setIncludeAppInfo(true)
            ->setIncludePlayedFreeGames(true)
            ->setAppIdsFilter(self::GAME_IDS);

        $response = self::$steamApi->send($method);
        $this->assertBaseJsonResponseStructure($response);
    }

    public function testGetPlayerAchievementsV1Method()
    {
        $method = new SteamApiGetPlayerAchievementsV1Method();
        $method->setAppId(self::GAME_IDS[0])->setSteamId(self::STEAM_IDS[0]);

        $response = self::$steamApi->send($method);
        $this->assertBaseJsonResponseStructure($response);
    }

    public function testGetPlayerSummariesV2Method()
    {
        $method = new SteamApiGetPlayerSummariesV2Method();
        $method->setSteamIds(self::STEAM_IDS);

        $response = self::$steamApi->send($method);
        $this->assertBaseJsonResponseStructure($response);
    }

    public function testGetRecentlyPlayedGamesV1Method()
    {
        $method = new SteamApiGetRecentlyPlayedGamesV1Method();
        $method->setSteamId(self::STEAM_IDS[0])->setCount(10);

        $response = self::$steamApi->send($method);
        $this->assertBaseJsonResponseStructure($response);
    }

    public function testGetUserStatsForGameV2Method()
    {
        $method = new SteamApiGetUserStatsForGameV2Method();
        $method->setSteamId(self::STEAM_IDS[0])->setAppId(self::GAME_IDS[0]);

        $response = self::$steamApi->send($method);
        $this->assertBaseJsonResponseStructure($response);
    }

    protected function assertBaseJsonResponseStructure($response)
    {
        $this->assertEquals($response->getStatusCode(), 200);
        $content = $response->getBody()->getContents();
        $this->assertIsString($content);
        $this->assertIsArray(json_decode($content, true));
    }
}
