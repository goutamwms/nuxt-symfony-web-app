<?php

namespace Symfony\Config\NelmioSecurity\Clickjacking;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PathConfig 
{
    private $header;
    private $_usedProperties = [];

    /**
     * @default 'DENY'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function header($value): static
    {
        $this->_usedProperties['header'] = true;
        $this->header = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('header', $value)) {
            $this->_usedProperties['header'] = true;
            $this->header = $value['header'];
            unset($value['header']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['header'])) {
            $output['header'] = $this->header;
        }

        return $output;
    }

}
