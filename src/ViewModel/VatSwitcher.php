<?php

declare(strict_types=1);

namespace Hyva\VatSwitcher\ViewModel;

use Hyva\VatSwitcher\Api\ConfigurationInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\StoreManagerInterface;

class VatSwitcher implements ArgumentInterface
{
    /** @var ConfigurationInterface */
    protected ConfigurationInterface $configuration;

    /** @var StoreManagerInterface */
    protected StoreManagerInterface $storeManager;

    /**
     * Constructor.
     *
     * @param ConfigurationInterface $configuration
     * @param StoreManagerInterface  $storeManager
     */
    public function __construct(
        ConfigurationInterface $configuration,
        StoreManagerInterface $storeManager
    ) {
        $this->configuration = $configuration;
        $this->storeManager  = $storeManager;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getDefaultValue(): string
    {
        $displayMode = $this->configuration->getInitialDisplayMode(
            $this->storeManager->getStore()
        );

        return $displayMode === ConfigurationInterface::DISPLAY_MODE_EXCLUDING_VAT ? 'excluding' : 'including';
    }
}
