<?php

namespace {
    \setlocale(\LC_ALL, 'C');
    \error_reporting(\E_ALL);

    $steamApiKey = $_SERVER['STEAM_API_KEY'] ?? null;

    if (!$steamApiKey) {
        fwrite(
            STDERR,
            "\033[01;0;41mRequired server argument 'STEAM_API_KEY' is missing.\033[0m" . PHP_EOL
            . "----------------------------------------------------------------------------------------" . PHP_EOL
            . "Please add a server variable STEAM_API_KEY to the phpunit configuration file 'phpunit.xml'" . PHP_EOL
            . "Must be added on this line: <server name=\"STEAM_API_KEY\" value=\"\" />" . PHP_EOL
            . "----------------------------------------------------------------------------------------" . PHP_EOL
        );
        die(1);
    }

    define('STEAM_API_KEY', $steamApiKey);
}
