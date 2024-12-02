<?php

namespace Symfony\Config\NelmioSecurity;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ForcedSslConfig 
{
    private $enabled;
    private $hstsMaxAge;
    private $hstsSubdomains;
    private $hstsPreload;
    private $allowList;
    private $hosts;
    private $redirectStatusCode;
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
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function hstsMaxAge($value): static
    {
        $this->_usedProperties['hstsMaxAge'] = true;
        $this->hstsMaxAge = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function hstsSubdomains($value): static
    {
        $this->_usedProperties['hstsSubdomains'] = true;
        $this->hstsSubdomains = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function hstsPreload($value): static
    {
        $this->_usedProperties['hstsPreload'] = true;
        $this->hstsPreload = $value;

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
     * @default 302
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function redirectStatusCode($value): static
    {
        $this->_usedProperties['redirectStatusCode'] = true;
        $this->redirectStatusCode = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('hsts_max_age', $value)) {
            $this->_usedProperties['hstsMaxAge'] = true;
            $this->hstsMaxAge = $value['hsts_max_age'];
            unset($value['hsts_max_age']);
        }

        if (array_key_exists('hsts_subdomains', $value)) {
            $this->_usedProperties['hstsSubdomains'] = true;
            $this->hstsSubdomains = $value['hsts_subdomains'];
            unset($value['hsts_subdomains']);
        }

        if (array_key_exists('hsts_preload', $value)) {
            $this->_usedProperties['hstsPreload'] = true;
            $this->hstsPreload = $value['hsts_preload'];
            unset($value['hsts_preload']);
        }

        if (array_key_exists('allow_list', $value)) {
            $this->_usedProperties['allowList'] = true;
            $this->allowList = $value['allow_list'];
            unset($value['allow_list']);
        }

        if (array_key_exists('hosts', $value)) {
            $this->_usedProperties['hosts'] = true;
            $this->hosts = $value['hosts'];
            unset($value['hosts']);
        }

        if (array_key_exists('redirect_status_code', $value)) {
            $this->_usedProperties['redirectStatusCode'] = true;
            $this->redirectStatusCode = $value['redirect_status_code'];
            unset($value['redirect_status_code']);
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
        if (isset($this->_usedProperties['hstsMaxAge'])) {
            $output['hsts_max_age'] = $this->hstsMaxAge;
        }
        if (isset($this->_usedProperties['hstsSubdomains'])) {
            $output['hsts_subdomains'] = $this->hstsSubdomains;
        }
        if (isset($this->_usedProperties['hstsPreload'])) {
            $output['hsts_preload'] = $this->hstsPreload;
        }
        if (isset($this->_usedProperties['allowList'])) {
            $output['allow_list'] = $this->allowList;
        }
        if (isset($this->_usedProperties['hosts'])) {
            $output['hosts'] = $this->hosts;
        }
        if (isset($this->_usedProperties['redirectStatusCode'])) {
            $output['redirect_status_code'] = $this->redirectStatusCode;
        }

        return $output;
    }

}
