<?php

namespace Symfony\Config\NelmioSecurity;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class XssProtectionConfig 
{
    private $enabled;
    private $modeBlock;
    private $reportUri;
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
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function modeBlock($value): static
    {
        $this->_usedProperties['modeBlock'] = true;
        $this->modeBlock = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function reportUri($value): static
    {
        $this->_usedProperties['reportUri'] = true;
        $this->reportUri = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('mode_block', $value)) {
            $this->_usedProperties['modeBlock'] = true;
            $this->modeBlock = $value['mode_block'];
            unset($value['mode_block']);
        }

        if (array_key_exists('report_uri', $value)) {
            $this->_usedProperties['reportUri'] = true;
            $this->reportUri = $value['report_uri'];
            unset($value['report_uri']);
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
        if (isset($this->_usedProperties['modeBlock'])) {
            $output['mode_block'] = $this->modeBlock;
        }
        if (isset($this->_usedProperties['reportUri'])) {
            $output['report_uri'] = $this->reportUri;
        }

        return $output;
    }

}
