<?php

namespace Symfony\Config\NelmioSecurity;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ContentTypeConfig 
{
    private $nosniff;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function nosniff($value): static
    {
        $this->_usedProperties['nosniff'] = true;
        $this->nosniff = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('nosniff', $value)) {
            $this->_usedProperties['nosniff'] = true;
            $this->nosniff = $value['nosniff'];
            unset($value['nosniff']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['nosniff'])) {
            $output['nosniff'] = $this->nosniff;
        }

        return $output;
    }

}
