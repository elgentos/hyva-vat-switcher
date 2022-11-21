<?php

declare(strict_types=1);

namespace Hyva\VatSwitcher\Api;

use Magento\Store\Api\Data\StoreInterface;

interface ConfigurationInterface
{
    public const XML_PATH_INITIAL_DISPLAY_MODE = 'tax/calculation/price_includes_tax';

    public const DISPLAY_MODE_EXCLUDING_VAT = 0;
    public const DISPLAY_MODE_INCLUDING_VAT = 1;

    /**
     * @param StoreInterface $store
     *
     * @return int
     */
    public function getInitialDisplayMode(StoreInterface $store): int;
}
