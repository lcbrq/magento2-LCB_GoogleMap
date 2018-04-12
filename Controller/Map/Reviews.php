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
    /** @var \Magento\Framework\Controller\Result\JsonFactory  */
    protected $_jsonFactory;

    /**
     * Reviews constructor.
     *
     * @param \Magento\Framework\App\Action\Context            $context
     * @param \Magento\Framework\View\Result\PageFactory       $resultPageFactory
     * @param \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
     * @param \Magento\Framework\Json\Helper\Data              $jsonHelper
     * @param \LCB\GoogleMap\Helper\Data                       $googleMapHelper
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        \LCB\GoogleMap\Helper\Data $googleMapHelper
    )
    {
        $this->_jsonFactory = $jsonFactory;
        $this->_mapHelper = $googleMapHelper;
        $this->resultPageFactory = $resultPageFactory;
        $this->jsonHelper = $jsonHelper;
        parent::__construct($context);
    }

    public function execute()
    {
        if ($this->_mapHelper->getPlacesConfig('place_enable')) {
           return $this->_jsonFactory->create()->setData($this->_mapHelper->getGooglePlace());
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