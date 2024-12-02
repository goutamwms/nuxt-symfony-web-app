<?php

namespace Symfony\Config\NelmioSecurity;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ExternalRedirectsConfig 
{
    private $abort;
    private $override;
    private $forwardAs;
    private $log;
    private $allowList;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function abort($value): static
    {
        $this->_usedProperties['abort'] = true;
        $this->abort = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function override($value): static
    {
        $this->_usedProperties['override'] = true;
        $this->override = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function forwardAs($value): static
    {
        $this->_usedProperties['forwardAs'] = true;
        $this->forwardAs = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function log($value): static
    {
        $this->_usedProperties['log'] = true;
        $this->log = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function allowList(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['allowList'] = true;
        $this->allowList = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('abort', $value)) {
            $this->_usedProperties['abort'] = true;
            $this->abort = $value['abort'];
            unset($value['abort']);
        }

        if (array_key_exists('override', $value)) {
            $this->_usedProperties['override'] = true;
            $this->override = $value['override'];
            unset($value['override']);
        }

        if (array_key_exists('forward_as', $value)) {
            $this->_usedProperties['forwardAs'] = true;
            $this->forwardAs = $value['forward_as'];
            unset($value['forward_as']);
        }

        if (array_key_exists('log', $value)) {
            $this->_usedProperties['log'] = true;
            $this->log = $value['log'];
            unset($value['log']);
        }

        if (array_key_exists('allow_list', $value)) {
            $this->_usedProperties['allowList'] = true;
            $this->allowList = $value['allow_list'];
            unset($value['allow_list']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['abort'])) {
            $output['abort'] = $this->abort;
        }
        if (isset($this->_usedProperties['override'])) {
            $output['override'] = $this->override;
        }
        if (isset($this->_usedProperties['forwardAs'])) {
            $output['forward_as'] = $this->forwardAs;
        }
        if (isset($this->_usedProperties['log'])) {
            $output['log'] = $this->log;
        }
        if (isset($this->_usedProperties['allowList'])) {
            $output['allow_list'] = $this->allowList;
        }

        return $output;
    }

}
