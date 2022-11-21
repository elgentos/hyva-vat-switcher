<?php

namespace Hyva\VatSwitcher\Plugin\ViewModel;

use Hyva\Theme\ViewModel\ProductPrice;

class ProductPricePlugin
{
    /**
     * @param ProductPrice $subject
     * @param bool         $result
     *
     * @return bool
     */
    public function afterDisplayPriceIncludingTax(ProductPrice $subject, bool $result): bool
    {
        return true;
    }
}
