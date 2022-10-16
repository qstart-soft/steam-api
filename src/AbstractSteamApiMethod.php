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
     * @var string Output format. json (default), xml or vdf.
     */
    #[SteamApiArgument('format')]
    protected string $format = SteamApiFormats::JSON;

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
                $value = $reflectionProperty->getValue($this);

                if ($value === null && $attributeInstance->isRequired()) {
                    throw new \InvalidArgumentException("Required parameter '{$reflectionProperty->getName()}' is missing");
                }

                $arguments[$attributeInstance->getName()] = $value;
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

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return AbstractSteamApiMethod
     */
    public function setFormat(string $format): AbstractSteamApiMethod
    {
        $this->format = $format;
        return $this;
    }
}
