<?php

namespace Symfony\Config\NelmioSecurity\Csp;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class HashConfig 
{
    private $algorithm;
    private $_usedProperties = [];

    /**
     * The algorithm to use for hashes
     * @default 'sha256'
     * @param ParamConfigurator|'sha256'|'sha384'|'sha512' $value
     * @return $this
     */
    public function algorithm($value): static
    {
        $this->_usedProperties['algorithm'] = true;
        $this->algorithm = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('algorithm', $value)) {
            $this->_usedProperties['algorithm'] = true;
            $this->algorithm = $value['algorithm'];
            unset($value['algorithm']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['algorithm'])) {
            $output['algorithm'] = $this->algorithm;
        }

        return $output;
    }

}
