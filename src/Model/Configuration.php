<?php

declare(strict_types=1);

namespace Hyva\VatSwitcher\Model;

use Hyva\VatSwitcher\Api\ConfigurationInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Api\Data\StoreInterface;
use Magento\Store\Model\ScopeInterface;

class Configuration implements ConfigurationInterface
{
    /** @var ScopeConfigInterface */
    protected ScopeConfigInterface $scopeConfig;

    /**
     * Constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param StoreInterface $store
     *
     * @return int
     */
    public function getInitialDisplayMode(StoreInterface $store): int
    {
        return (int) $this->scopeConfig->getValue(
            static::XML_PATH_INITIAL_DISPLAY_MODE,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }
}
