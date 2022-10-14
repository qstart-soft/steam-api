<?php

namespace Qstart\SteamApi;

use Attribute;

/**
 * An attribute points to a class property that contains the value for the specified attribute.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class SteamApiArgument
{
    /**
     * @param string $name Attribute name
     */
    public function __construct(
        private string $name
    ) {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return SteamApiArgument
     */
    public function setName(string $name): SteamApiArgument
    {
        $this->name = $name;
        return $this;
    }
}
