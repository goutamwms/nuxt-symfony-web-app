<?php

namespace Symfony\Config\NelmioSecurity\Csp;

require_once __DIR__.\DIRECTORY_SEPARATOR.'ReportEndpoint'.\DIRECTORY_SEPARATOR.'FiltersConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ReportEndpointConfig 
{
    private $logChannel;
    private $logFormatter;
    private $logLevel;
    private $filters;
    private $dismiss;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function logChannel($value): static
    {
        $this->_usedProperties['logChannel'] = true;
        $this->logChannel = $value;

        return $this;
    }

    /**
     * @default 'nelmio_security.csp_report.log_formatter'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function logFormatter($value): static
    {
        $this->_usedProperties['logFormatter'] = true;
        $this->logFormatter = $value;

        return $this;
    }

    /**
     * @default 'notice'
     * @param ParamConfigurator|'alert'|'critical'|'debug'|'emergency'|'error'|'info'|'notice'|'warning' $value
     * @return $this
     */
    public function logLevel($value): static
    {
        $this->_usedProperties['logLevel'] = true;
        $this->logLevel = $value;

        return $this;
    }

    /**
     * @default {"domains":true,"schemes":true,"browser_bugs":true,"injected_scripts":true}
    */
    public function filters(array $value = []): \Symfony\Config\NelmioSecurity\Csp\ReportEndpoint\FiltersConfig
    {
        if (null === $this->filters) {
            $this->_usedProperties['filters'] = true;
            $this->filters = new \Symfony\Config\NelmioSecurity\Csp\ReportEndpoint\FiltersConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "filters()" has already been initialized. You cannot pass values the second time you call filters().');
        }

        return $this->filters;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed|array> $value
     *
     * @return $this
     */
    public function dismiss(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['dismiss'] = true;
        $this->dismiss = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('log_channel', $value)) {
            $this->_usedProperties['logChannel'] = true;
            $this->logChannel = $value['log_channel'];
            unset($value['log_channel']);
        }

        if (array_key_exists('log_formatter', $value)) {
            $this->_usedProperties['logFormatter'] = true;
            $this->logFormatter = $value['log_formatter'];
            unset($value['log_formatter']);
        }

        if (array_key_exists('log_level', $value)) {
            $this->_usedProperties['logLevel'] = true;
            $this->logLevel = $value['log_level'];
            unset($value['log_level']);
        }

        if (array_key_exists('filters', $value)) {
            $this->_usedProperties['filters'] = true;
            $this->filters = new \Symfony\Config\NelmioSecurity\Csp\ReportEndpoint\FiltersConfig($value['filters']);
            unset($value['filters']);
        }

        if (array_key_exists('dismiss', $value)) {
            $this->_usedProperties['dismiss'] = true;
            $this->dismiss = $value['dismiss'];
            unset($value['dismiss']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['logChannel'])) {
            $output['log_channel'] = $this->logChannel;
        }
        if (isset($this->_usedProperties['logFormatter'])) {
            $output['log_formatter'] = $this->logFormatter;
        }
        if (isset($this->_usedProperties['logLevel'])) {
            $output['log_level'] = $this->logLevel;
        }
        if (isset($this->_usedProperties['filters'])) {
            $output['filters'] = $this->filters->toArray();
        }
        if (isset($this->_usedProperties['dismiss'])) {
            $output['dismiss'] = $this->dismiss;
        }

        return $output;
    }

}
