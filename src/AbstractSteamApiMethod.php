<?php

namespace Qstart\SteamApi;

use ReflectionClass;
use ReflectionProperty;

/**
 * This abstract class allows you to use special arguments to define request arguments in api
 */
abstract class AbstractSteamApiMethod implements SteamApiMethodInterface
{
    /**
     * Array of arguments
     * @return array
     */
    public function getArguments(): array
    {
        $arguments = [];
        $reflection = new ReflectionClass($this);

        foreach ($reflection->getProperties() as $reflectionProperty) {
            $attributes = $reflectionProperty->getAttributes(SteamApiArgument::class);
            foreach ($attributes as $attribute) {
                /** @var SteamApiArgument $attributeInstance */
                $attributeInstance = $attribute->newInstance();
                $arguments[$attributeInstance->getName()] = $reflectionProperty->getValue($this);
            }
        }

        return array_filter($arguments, fn ($value) => $value !== null);
    }

    /** @inheritDoc */
    abstract public function getMethodName(): string;

    /** @inheritDoc */
    abstract public function getVersion(): string;

    /** @inheritDoc */
    abstract public function getApiInterfaceName(): string;
}

