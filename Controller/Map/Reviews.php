<?php

namespace LCB\GoogleMap\Controller\Map;

/**
 * Class Reviews
 *
 * @package LCB\GoogleMap\Controller\Map
 */
class Reviews extends \Magento\Framework\App\Action\Action
{
    /** @var \Magento\Framework\View\Result\PageFactory */
    protected $resultPageFactory;
    /** @var \Magento\Framework\Json\Helper\Data */
    protected $jsonHelper;
    /** @var \LCB\GoogleMap\Helper\Data */
    protected $_mapHelper;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Json\Helper\Data   $jsonHelper
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        \LCB\GoogleMap\Helper\Data $googleMapHelper
    )
    {
        $this->_mapHelper = $googleMapHelper;
        $this->resultPageFactory = $resultPageFactory;
        $this->jsonHelper = $jsonHelper;
        parent::__construct($context);
    }

    public function execute()
    {
        if ($this->_mapHelper->getPlacesConfig('place_enable')) {
           return $this->_mapHelper->getGooglePlace();
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