<?php

namespace Symfony\Config\NelmioSecurity\Csp\ReportEndpoint;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FiltersConfig 
{
    private $domains;
    private $schemes;
    private $browserBugs;
    private $injectedScripts;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function domains($value): static
    {
        $this->_usedProperties['domains'] = true;
        $this->domains = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function schemes($value): static
    {
        $this->_usedProperties['schemes'] = true;
        $this->schemes = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function browserBugs($value): static
    {
        $this->_usedProperties['browserBugs'] = true;
        $this->browserBugs = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function injectedScripts($value): static
    {
        $this->_usedProperties['injectedScripts'] = true;
        $this->injectedScripts = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('domains', $value)) {
            $this->_usedProperties['domains'] = true;
            $this->domains = $value['domains'];
            unset($value['domains']);
        }

        if (array_key_exists('schemes', $value)) {
            $this->_usedProperties['schemes'] = true;
            $this->schemes = $value['schemes'];
            unset($value['schemes']);
        }

        if (array_key_exists('browser_bugs', $value)) {
            $this->_usedProperties['browserBugs'] = true;
            $this->browserBugs = $value['browser_bugs'];
            unset($value['browser_bugs']);
        }

        if (array_key_exists('injected_scripts', $value)) {
            $this->_usedProperties['injectedScripts'] = true;
            $this->injectedScripts = $value['injected_scripts'];
            unset($value['injected_scripts']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['domains'])) {
            $output['domains'] = $this->domains;
        }
        if (isset($this->_usedProperties['schemes'])) {
            $output['schemes'] = $this->schemes;
        }
        if (isset($this->_usedProperties['browserBugs'])) {
            $output['browser_bugs'] = $this->browserBugs;
        }
        if (isset($this->_usedProperties['injectedScripts'])) {
            $output['injected_scripts'] = $this->injectedScripts;
        }

        return $output;
    }

}
