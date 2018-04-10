<?php

namespace LCB\GoogleMap\Controller\Map;

/**
 * Class Reviews
 *
 * @package LCB\GoogleMap\Controller\Map
 */
class Reviews extends \Magento\Framework\App\Action\Action
{

    CONST GOOGLE_MAP_PLACES_API_URL = 'https://maps.googleapis.com/maps/api/place/details/json';
    CONST GOOGLE_MAP_PLACES_API_USE_MODEL = false;

    /** @var \Magento\Framework\View\Result\PageFactory  */
    protected $resultPageFactory;
    /** @var \Magento\Framework\Json\Helper\Data  */
    protected $jsonHelper;

    /** @var \LCB\GoogleMap\Helper\Data  */
    protected $_mapHelper;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context  $context
     * @param \Magento\Framework\Json\Helper\Data $jsonHelper
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        \LCB\GoogleMap\Helper\Data $googleMapHelper
    ) {
        $this->_mapHelper = $googleMapHelper;
        $this->resultPageFactory = $resultPageFactory;
        $this->jsonHelper = $jsonHelper;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        if($this->_mapHelper->getPlacesConfig('place_enable')){
            if(!self::GOOGLE_MAP_PLACES_API_USE_MODEL){
                $key = $this->_mapHelper->getKey();
                $placeId = $this->_mapHelper->getPlacesConfig('place_id');
                $client = new \GuzzleHttp\Client();
                $result = $client->get(self::GOOGLE_MAP_PLACES_API_URL.'?placeid='.$placeId.'&key='.$key);
                return $this->jsonHelper->jsonDecode($result->getBody()->getContents());
            }else{
                //GetData from DB populated by cron
            }
        }
    }

    /**
     * Create json response
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function jsonResponse($response = '')
    {
        return $this->getResponse()->representJson(
            $this->jsonHelper->jsonEncode($response)
        );
    }
}