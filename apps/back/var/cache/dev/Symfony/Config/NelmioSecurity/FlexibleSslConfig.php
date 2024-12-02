<?php

namespace Symfony\Config\NelmioSecurity;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FlexibleSslConfig 
{
    private $enabled;
    private $cookieName;
    private $unsecuredLogout;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * @default 'auth'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cookieName($value): static
    {
        $this->_usedProperties['cookieName'] = true;
        $this->cookieName = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function unsecuredLogout($value): static
    {
        $this->_usedProperties['unsecuredLogout'] = true;
        $this->unsecuredLogout = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('cookie_name', $value)) {
            $this->_usedProperties['cookieName'] = true;
            $this->cookieName = $value['cookie_name'];
            unset($value['cookie_name']);
        }

        if (array_key_exists('unsecured_logout', $value)) {
            $this->_usedProperties['unsecuredLogout'] = true;
            $this->unsecuredLogout = $value['unsecured_logout'];
            unset($value['unsecured_logout']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['cookieName'])) {
            $output['cookie_name'] = $this->cookieName;
        }
        if (isset($this->_usedProperties['unsecuredLogout'])) {
            $output['unsecured_logout'] = $this->unsecuredLogout;
        }

        return $output;
    }

}
