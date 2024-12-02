<?php

namespace Symfony\Config\NelmioSecurity;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Csp'.\DIRECTORY_SEPARATOR.'ReportEndpointConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Csp'.\DIRECTORY_SEPARATOR.'HashConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Csp'.\DIRECTORY_SEPARATOR.'ReportConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Csp'.\DIRECTORY_SEPARATOR.'EnforceConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CspConfig 
{
    private $enabled;
    private $hosts;
    private $contentTypes;
    private $reportEndpoint;
    private $compatHeaders;
    private $reportLoggerService;
    private $hash;
    private $report;
    private $enforce;
    private $_usedProperties = [];

    /**
     * @default true
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

    /**
     * @default {"log_channel":null,"log_formatter":"nelmio_security.csp_report.log_formatter","log_level":"notice","filters":{"domains":true,"schemes":true,"browser_bugs":true,"injected_scripts":true},"dismiss":[]}
    */
    public function reportEndpoint(array $value = []): \Symfony\Config\NelmioSecurity\Csp\ReportEndpointConfig
    {
        if (null === $this->reportEndpoint) {
            $this->_usedProperties['reportEndpoint'] = true;
            $this->reportEndpoint = new \Symfony\Config\NelmioSecurity\Csp\ReportEndpointConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "reportEndpoint()" has already been initialized. You cannot pass values the second time you call reportEndpoint().');
        }

        return $this->reportEndpoint;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function compatHeaders($value): static
    {
        $this->_usedProperties['compatHeaders'] = true;
        $this->compatHeaders = $value;

        return $this;
    }

    /**
     * @default 'logger'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function reportLoggerService($value): static
    {
        $this->_usedProperties['reportLoggerService'] = true;
        $this->reportLoggerService = $value;

        return $this;
    }

    /**
     * @default {"algorithm":"sha256"}
    */
    public function hash(array $value = []): \Symfony\Config\NelmioSecurity\Csp\HashConfig
    {
        if (null === $this->hash) {
            $this->_usedProperties['hash'] = true;
            $this->hash = new \Symfony\Config\NelmioSecurity\Csp\HashConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "hash()" has already been initialized. You cannot pass values the second time you call hash().');
        }

        return $this->hash;
    }

    public function report(array $value = []): \Symfony\Config\NelmioSecurity\Csp\ReportConfig
    {
        if (null === $this->report) {
            $this->_usedProperties['report'] = true;
            $this->report = new \Symfony\Config\NelmioSecurity\Csp\ReportConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "report()" has already been initialized. You cannot pass values the second time you call report().');
        }

        return $this->report;
    }

    public function enforce(array $value = []): \Symfony\Config\NelmioSecurity\Csp\EnforceConfig
    {
        if (null === $this->enforce) {
            $this->_usedProperties['enforce'] = true;
            $this->enforce = new \Symfony\Config\NelmioSecurity\Csp\EnforceConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "enforce()" has already been initialized. You cannot pass values the second time you call enforce().');
        }

        return $this->enforce;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('hosts', $value)) {
            $this->_usedProperties['hosts'] = true;
            $this->hosts = $value['hosts'];
            unset($value['hosts']);
        }

        if (array_key_exists('content_types', $value)) {
            $this->_usedProperties['contentTypes'] = true;
            $this->contentTypes = $value['content_types'];
            unset($value['content_types']);
        }

        if (array_key_exists('report_endpoint', $value)) {
            $this->_usedProperties['reportEndpoint'] = true;
            $this->reportEndpoint = new \Symfony\Config\NelmioSecurity\Csp\ReportEndpointConfig($value['report_endpoint']);
            unset($value['report_endpoint']);
        }

        if (array_key_exists('compat_headers', $value)) {
            $this->_usedProperties['compatHeaders'] = true;
            $this->compatHeaders = $value['compat_headers'];
            unset($value['compat_headers']);
        }

        if (array_key_exists('report_logger_service', $value)) {
            $this->_usedProperties['reportLoggerService'] = true;
            $this->reportLoggerService = $value['report_logger_service'];
            unset($value['report_logger_service']);
        }

        if (array_key_exists('hash', $value)) {
            $this->_usedProperties['hash'] = true;
            $this->hash = new \Symfony\Config\NelmioSecurity\Csp\HashConfig($value['hash']);
            unset($value['hash']);
        }

        if (array_key_exists('report', $value)) {
            $this->_usedProperties['report'] = true;
            $this->report = new \Symfony\Config\NelmioSecurity\Csp\ReportConfig($value['report']);
            unset($value['report']);
        }

        if (array_key_exists('enforce', $value)) {
            $this->_usedProperties['enforce'] = true;
            $this->enforce = new \Symfony\Config\NelmioSecurity\Csp\EnforceConfig($value['enforce']);
            unset($value['enforce']);
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
        if (isset($this->_usedProperties['hosts'])) {
            $output['hosts'] = $this->hosts;
        }
        if (isset($this->_usedProperties['contentTypes'])) {
            $output['content_types'] = $this->contentTypes;
        }
        if (isset($this->_usedProperties['reportEndpoint'])) {
            $output['report_endpoint'] = $this->reportEndpoint->toArray();
        }
        if (isset($this->_usedProperties['compatHeaders'])) {
            $output['compat_headers'] = $this->compatHeaders;
        }
        if (isset($this->_usedProperties['reportLoggerService'])) {
            $output['report_logger_service'] = $this->reportLoggerService;
        }
        if (isset($this->_usedProperties['hash'])) {
            $output['hash'] = $this->hash->toArray();
        }
        if (isset($this->_usedProperties['report'])) {
            $output['report'] = $this->report->toArray();
        }
        if (isset($this->_usedProperties['enforce'])) {
            $output['enforce'] = $this->enforce->toArray();
        }

        return $output;
    }

}
