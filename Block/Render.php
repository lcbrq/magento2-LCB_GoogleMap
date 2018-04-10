<?php

/**
 * Google Maps usage for Magento2 store
 *
 * @category   LCB
 * @package    LCB_GoogleMap
 * @author     Silpion Tomasz Gregorczyk <tomasz@silpion.com.pl>
 */

namespace LCB\GoogleMap\Block;

class Render extends \Magento\Framework\View\Element\Template {

    const DEFAULT_LATITUDE = 50.157158;
    const DEFAULT_LONGITUDE = 17.978438;
    const DEFAULT_ZOOM = 17;
    
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * Store manager
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /** @var \LCB\GoogleMap\Helper\Data  */
    protected $_helper;

    /**
     * Render constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \LCB\GoogleMap\Helper\Data                       $helper
     * @param array                                            $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \LCB\GoogleMap\Helper\Data $helper,
        array $data = []
    )
    {
        $this->_helper = $helper;
        $this->_scopeConfig = $context->getScopeConfig();
        $this->_storeManager = $context->getStoreManager();
        parent::__construct($context, $data);
    }

    /**
     * Get configuration value
     * 
     * @param string $path
     * @return string
     */
    public function getConfig($path)
    {
        return $this->_helper->getConfig($path);
    }

    /**
     * Get longitude
     * 
     * @return float
     */
    public function getLongitude()
    {
        $longitude = (float) $this->getConfig('longitude');
        
        if(!$longitude){
            return self::DEFAULT_LONGITUDE;
        }
        
        return $longitude;
                
    }
    
    /**
     * Get latitude
     * 
     * @return float
     */
    public function getLatitude()
    {
        $latitude = (float) $this->getConfig('latitude');
        
        if(!$latitude){
            return self::DEFAULT_LATITUDE;
        }
        
        return $latitude;
                
    }
    
    /**
     * Get zoom level
     * 
     * @return int
     */
    public function getZoom()
    {
        $zoom = (int) $this->getConfig('zoom');
        
        if(!$zoom){
            return self::DEFAULT_ZOOM;
        }
        
        return $zoom;
                
    }

    /**
     * @return bool
     */
    public function isSnazzyMapsEnabled(){
        if($this->getConfig('snazzymap_enable')){
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getSnazzyMapIframe(){
       return $this->getConfig('snazzymap');
    }

    /**
     * Get Google Map marker icon url
     *
     * @return string
     */
    public function getMarker()
    {
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'google/map/marker/' . $this->getConfig('marker');
    }

}
