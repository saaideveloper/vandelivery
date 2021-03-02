<?php
/**
 * OGL.
 */

// @codingStandardsIgnoreFile

namespace Ogl\VanDelivery\Model;

use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Rate\Result;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Shipping\Model\Carrier\CarrierInterface;

/**
 * Carrier model
 */
class Carrier extends AbstractCarrier implements CarrierInterface
{
    /**
     * OGL eShop3 Rates Collector.
     *
     * @param RateRequest $request
     *
     * @return \Magento\Shipping\Model\Rate\Result|bool
     */
    public function collectRates(RateRequest $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }
    }

    /**
     * Get allowed shipping methods.
     *
     * @return array
     *
     * @api
     */
    public function getAllowedMethods()
    {
        return ['eshop' => $this->getConfigData('name')];
    }
}
