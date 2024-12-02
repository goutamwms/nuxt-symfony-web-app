<?php

namespace Symfony\Config\NelmioSecurity\Csp;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Enforce'.\DIRECTORY_SEPARATOR.'BrowserAdaptiveConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class EnforceConfig 
{
    private $level1Fallback;
    private $browserAdaptive;
    private $defaultsrc;
    private $baseuri;
    private $blockallmixedcontent;
    private $childsrc;
    private $connectsrc;
    private $fontsrc;
    private $formaction;
    private $frameancestors;
    private $framesrc;
    private $imgsrc;
    private $manifestsrc;
    private $mediasrc;
    private $objectsrc;
    private $plugintypes;
    private $scriptsrc;
    private $stylesrc;
    private $upgradeinsecurerequests;
    private $reporturi;
    private $workersrc;
    private $prefetchsrc;
    private $_usedProperties = [];

    /**
     * Provides CSP Level 1 fallback when using hash or nonce (CSP level 2) by adding 'unsafe-inline' source. See https://www.w3.org/TR/CSP2/#directive-script-src and https://www.w3.org/TR/CSP2/#directive-style-src
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function level1Fallback($value): static
    {
        $this->_usedProperties['level1Fallback'] = true;
        $this->level1Fallback = $value;

        return $this;
    }

    /**
     * @template TValue
     * @param TValue $value
     * Do not send directives that browser do not support
     * @default {"enabled":false,"parser":"nelmio_security.ua_parser.ua_php"}
     * @return \Symfony\Config\NelmioSecurity\Csp\Enforce\BrowserAdaptiveConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\NelmioSecurity\Csp\Enforce\BrowserAdaptiveConfig : static)
     */
    public function browserAdaptive(array $value = []): \Symfony\Config\NelmioSecurity\Csp\Enforce\BrowserAdaptiveConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['browserAdaptive'] = true;
            $this->browserAdaptive = $value;

            return $this;
        }

        if (!$this->browserAdaptive instanceof \Symfony\Config\NelmioSecurity\Csp\Enforce\BrowserAdaptiveConfig) {
            $this->_usedProperties['browserAdaptive'] = true;
            $this->browserAdaptive = new \Symfony\Config\NelmioSecurity\Csp\Enforce\BrowserAdaptiveConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "browserAdaptive()" has already been initialized. You cannot pass values the second time you call browserAdaptive().');
        }

        return $this->browserAdaptive;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function defaultsrc(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['defaultsrc'] = true;
        $this->defaultsrc = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function baseuri(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['baseuri'] = true;
        $this->baseuri = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function blockallmixedcontent($value): static
    {
        $this->_usedProperties['blockallmixedcontent'] = true;
        $this->blockallmixedcontent = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function childsrc(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['childsrc'] = true;
        $this->childsrc = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function connectsrc(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['connectsrc'] = true;
        $this->connectsrc = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function fontsrc(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['fontsrc'] = true;
        $this->fontsrc = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function formaction(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['formaction'] = true;
        $this->formaction = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function frameancestors(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['frameancestors'] = true;
        $this->frameancestors = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function framesrc(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['framesrc'] = true;
        $this->framesrc = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function imgsrc(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['imgsrc'] = true;
        $this->imgsrc = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function manifestsrc(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['manifestsrc'] = true;
        $this->manifestsrc = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function mediasrc(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['mediasrc'] = true;
        $this->mediasrc = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function objectsrc(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['objectsrc'] = true;
        $this->objectsrc = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function plugintypes(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['plugintypes'] = true;
        $this->plugintypes = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function scriptsrc(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['scriptsrc'] = true;
        $this->scriptsrc = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function stylesrc(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['stylesrc'] = true;
        $this->stylesrc = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function upgradeinsecurerequests($value): static
    {
        $this->_usedProperties['upgradeinsecurerequests'] = true;
        $this->upgradeinsecurerequests = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed>|string $value
     *
     * @return $this
     */
    public function reporturi(ParamConfigurator|string|array $value): static
    {
        $this->_usedProperties['reporturi'] = true;
        $this->reporturi = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function workersrc(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['workersrc'] = true;
        $this->workersrc = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function prefetchsrc(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['prefetchsrc'] = true;
        $this->prefetchsrc = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('level1_fallback', $value)) {
            $this->_usedProperties['level1Fallback'] = true;
            $this->level1Fallback = $value['level1_fallback'];
            unset($value['level1_fallback']);
        }

        if (array_key_exists('browser_adaptive', $value)) {
            $this->_usedProperties['browserAdaptive'] = true;
            $this->browserAdaptive = \is_array($value['browser_adaptive']) ? new \Symfony\Config\NelmioSecurity\Csp\Enforce\BrowserAdaptiveConfig($value['browser_adaptive']) : $value['browser_adaptive'];
            unset($value['browser_adaptive']);
        }

        if (array_key_exists('default-src', $value)) {
            $this->_usedProperties['defaultsrc'] = true;
            $this->defaultsrc = $value['default-src'];
            unset($value['default-src']);
        }

        if (array_key_exists('base-uri', $value)) {
            $this->_usedProperties['baseuri'] = true;
            $this->baseuri = $value['base-uri'];
            unset($value['base-uri']);
        }

        if (array_key_exists('block-all-mixed-content', $value)) {
            $this->_usedProperties['blockallmixedcontent'] = true;
            $this->blockallmixedcontent = $value['block-all-mixed-content'];
            unset($value['block-all-mixed-content']);
        }

        if (array_key_exists('child-src', $value)) {
            $this->_usedProperties['childsrc'] = true;
            $this->childsrc = $value['child-src'];
            unset($value['child-src']);
        }

        if (array_key_exists('connect-src', $value)) {
            $this->_usedProperties['connectsrc'] = true;
            $this->connectsrc = $value['connect-src'];
            unset($value['connect-src']);
        }

        if (array_key_exists('font-src', $value)) {
            $this->_usedProperties['fontsrc'] = true;
            $this->fontsrc = $value['font-src'];
            unset($value['font-src']);
        }

        if (array_key_exists('form-action', $value)) {
            $this->_usedProperties['formaction'] = true;
            $this->formaction = $value['form-action'];
            unset($value['form-action']);
        }

        if (array_key_exists('frame-ancestors', $value)) {
            $this->_usedProperties['frameancestors'] = true;
            $this->frameancestors = $value['frame-ancestors'];
            unset($value['frame-ancestors']);
        }

        if (array_key_exists('frame-src', $value)) {
            $this->_usedProperties['framesrc'] = true;
            $this->framesrc = $value['frame-src'];
            unset($value['frame-src']);
        }

        if (array_key_exists('img-src', $value)) {
            $this->_usedProperties['imgsrc'] = true;
            $this->imgsrc = $value['img-src'];
            unset($value['img-src']);
        }

        if (array_key_exists('manifest-src', $value)) {
            $this->_usedProperties['manifestsrc'] = true;
            $this->manifestsrc = $value['manifest-src'];
            unset($value['manifest-src']);
        }

        if (array_key_exists('media-src', $value)) {
            $this->_usedProperties['mediasrc'] = true;
            $this->mediasrc = $value['media-src'];
            unset($value['media-src']);
        }

        if (array_key_exists('object-src', $value)) {
            $this->_usedProperties['objectsrc'] = true;
            $this->objectsrc = $value['object-src'];
            unset($value['object-src']);
        }

        if (array_key_exists('plugin-types', $value)) {
            $this->_usedProperties['plugintypes'] = true;
            $this->plugintypes = $value['plugin-types'];
            unset($value['plugin-types']);
        }

        if (array_key_exists('script-src', $value)) {
            $this->_usedProperties['scriptsrc'] = true;
            $this->scriptsrc = $value['script-src'];
            unset($value['script-src']);
        }

        if (array_key_exists('style-src', $value)) {
            $this->_usedProperties['stylesrc'] = true;
            $this->stylesrc = $value['style-src'];
            unset($value['style-src']);
        }

        if (array_key_exists('upgrade-insecure-requests', $value)) {
            $this->_usedProperties['upgradeinsecurerequests'] = true;
            $this->upgradeinsecurerequests = $value['upgrade-insecure-requests'];
            unset($value['upgrade-insecure-requests']);
        }

        if (array_key_exists('report-uri', $value)) {
            $this->_usedProperties['reporturi'] = true;
            $this->reporturi = $value['report-uri'];
            unset($value['report-uri']);
        }

        if (array_key_exists('worker-src', $value)) {
            $this->_usedProperties['workersrc'] = true;
            $this->workersrc = $value['worker-src'];
            unset($value['worker-src']);
        }

        if (array_key_exists('prefetch-src', $value)) {
            $this->_usedProperties['prefetchsrc'] = true;
            $this->prefetchsrc = $value['prefetch-src'];
            unset($value['prefetch-src']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['level1Fallback'])) {
            $output['level1_fallback'] = $this->level1Fallback;
        }
        if (isset($this->_usedProperties['browserAdaptive'])) {
            $output['browser_adaptive'] = $this->browserAdaptive instanceof \Symfony\Config\NelmioSecurity\Csp\Enforce\BrowserAdaptiveConfig ? $this->browserAdaptive->toArray() : $this->browserAdaptive;
        }
        if (isset($this->_usedProperties['defaultsrc'])) {
            $output['default-src'] = $this->defaultsrc;
        }
        if (isset($this->_usedProperties['baseuri'])) {
            $output['base-uri'] = $this->baseuri;
        }
        if (isset($this->_usedProperties['blockallmixedcontent'])) {
            $output['block-all-mixed-content'] = $this->blockallmixedcontent;
        }
        if (isset($this->_usedProperties['childsrc'])) {
            $output['child-src'] = $this->childsrc;
        }
        if (isset($this->_usedProperties['connectsrc'])) {
            $output['connect-src'] = $this->connectsrc;
        }
        if (isset($this->_usedProperties['fontsrc'])) {
            $output['font-src'] = $this->fontsrc;
        }
        if (isset($this->_usedProperties['formaction'])) {
            $output['form-action'] = $this->formaction;
        }
        if (isset($this->_usedProperties['frameancestors'])) {
            $output['frame-ancestors'] = $this->frameancestors;
        }
        if (isset($this->_usedProperties['framesrc'])) {
            $output['frame-src'] = $this->framesrc;
        }
        if (isset($this->_usedProperties['imgsrc'])) {
            $output['img-src'] = $this->imgsrc;
        }
        if (isset($this->_usedProperties['manifestsrc'])) {
            $output['manifest-src'] = $this->manifestsrc;
        }
        if (isset($this->_usedProperties['mediasrc'])) {
            $output['media-src'] = $this->mediasrc;
        }
        if (isset($this->_usedProperties['objectsrc'])) {
            $output['object-src'] = $this->objectsrc;
        }
        if (isset($this->_usedProperties['plugintypes'])) {
            $output['plugin-types'] = $this->plugintypes;
        }
        if (isset($this->_usedProperties['scriptsrc'])) {
            $output['script-src'] = $this->scriptsrc;
        }
        if (isset($this->_usedProperties['stylesrc'])) {
            $output['style-src'] = $this->stylesrc;
        }
        if (isset($this->_usedProperties['upgradeinsecurerequests'])) {
            $output['upgrade-insecure-requests'] = $this->upgradeinsecurerequests;
        }
        if (isset($this->_usedProperties['reporturi'])) {
            $output['report-uri'] = $this->reporturi;
        }
        if (isset($this->_usedProperties['workersrc'])) {
            $output['worker-src'] = $this->workersrc;
        }
        if (isset($this->_usedProperties['prefetchsrc'])) {
            $output['prefetch-src'] = $this->prefetchsrc;
        }

        return $output;
    }

}
