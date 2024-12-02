<?php

namespace Symfony\Config\NelmioSecurity;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Clickjacking'.\DIRECTORY_SEPARATOR.'PathConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ClickjackingConfig 
{
    private $hosts;
    private $paths;
    private $contentTypes;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function hosts(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['hosts'] = true;
        $this->hosts = $value;

        return $this;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @default {"^\/.*":{"header":"DENY"}}
     * @return \Symfony\Config\NelmioSecurity\Clickjacking\PathConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\NelmioSecurity\Clickjacking\PathConfig : static)
     */
    public function path(string $pattern, mixed $value = []): \Symfony\Config\NelmioSecurity\Clickjacking\PathConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['paths'] = true;
            $this->paths[$pattern] = $value;

            return $this;
        }

        if (!isset($this->paths[$pattern]) || !$this->paths[$pattern] instanceof \Symfony\Config\NelmioSecurity\Clickjacking\PathConfig) {
            $this->_usedProperties['paths'] = true;
            $this->paths[$pattern] = new \Symfony\Config\NelmioSecurity\Clickjacking\PathConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "path()" has already been initialized. You cannot pass values the second time you call path().');
        }

        return $this->paths[$pattern];
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function contentTypes(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['contentTypes'] = true;
        $this->contentTypes = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('hosts', $value)) {
            $this->_usedProperties['hosts'] = true;
            $this->hosts = $value['hosts'];
            unset($value['hosts']);
        }

        if (array_key_exists('paths', $value)) {
            $this->_usedProperties['paths'] = true;
            $this->paths = array_map(fn ($v) => \is_array($v) ? new \Symfony\Config\NelmioSecurity\Clickjacking\PathConfig($v) : $v, $value['paths']);
            unset($value['paths']);
        }

        if (array_key_exists('content_types', $value)) {
            $this->_usedProperties['contentTypes'] = true;
            $this->contentTypes = $value['content_types'];
            unset($value['content_types']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['hosts'])) {
            $output['hosts'] = $this->hosts;
        }
        if (isset($this->_usedProperties['paths'])) {
            $output['paths'] = array_map(fn ($v) => $v instanceof \Symfony\Config\NelmioSecurity\Clickjacking\PathConfig ? $v->toArray() : $v, $this->paths);
        }
        if (isset($this->_usedProperties['contentTypes'])) {
            $output['content_types'] = $this->contentTypes;
        }

        return $output;
    }

}
