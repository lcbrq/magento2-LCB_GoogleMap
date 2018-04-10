<?php

/**
 * Created by Marcin Gierus.
 * Date: 10.04.18
 * Time: 10:58
 */

namespace LCB\GoogleMap\Helper;
use Magento\Framework\App\Helper\Context;

/**
 * Class Data
 *
 * @package LCB\GoogleMap\Helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper{

    /**
     * Data constructor.
     *
     * @param Context $context
     */
    public function __construct(
        Context $context
    )
    {
        parent::__construct($context);
    }

    /**
     * @return string
     */
    public function getKey(){
        return $this->getConfig('key');
    }

    /**
     * @param $path
     * @return mixed
     */
    public function getPlacesConfig($path)
    {
        return $this->scopeConfig->getValue('google/place/' . (string) $path, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get configuration value
     *
     * @param string $path
     * @return string
     */
    public function getConfig($path)
    {
        return $this->scopeConfig->getValue('google/map/' . (string) $path, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

}