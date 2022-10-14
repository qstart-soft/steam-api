<?php

namespace Qstart\SteamApi;

/**
 * Steam Web Api Formats.
 *
 * Every method can return its results in 3 different formats: JSON, XML, and VDF. Each format represents the data described herein differently:
 *
 * JSON
 * - The API returns an object containing the named object with the result data.
 * - Arrays are represented as an array with the name of the type of the objects in the array (ie. an object named "items" containing an array of objects of type "item" would be represented as an object named "items" containing an array named "item" containing several objects following the "item" structure).
 * - Null is represented as JSON's null.
 *
 * XML
 * - XML Attributes are not used.
 * - Arrays are represented as a series of sub-elements in the containing element of the type of the array.
 * - Null is represented by the word "null" between the element's tags.
 *
 * VDF (Valve Data Format)
 * - This is Valve's internal data format, as seen in uses like TF2's "scripts" folder (available in "team fortress 2 client content.gcf"). TF2's GetSchema returns data similar to "items/items_game.txt" (although qualities are not expanded into objects with a "value" field).
 * - Documentation of the format is in progress in https://developer.valvesoftware.com/wiki/KeyValues.
 * - Arrays in the data are represented as a VDF array with the name of the type of the objects in the array, with a VDF array being an object with each item being prefixed with its numeric key as a quoted string.
 * - Null is represented as an empty string.
 *
 * If no format is specified, the API will default to JSON.
 *
 * @link https://developer.valvesoftware.com/wiki/Steam_Web_API#Formats
 */
enum SteamApiFormats
{
    public const JSON = 'json';
    public const XML = 'xml';
    public const VDF = 'vdf';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
