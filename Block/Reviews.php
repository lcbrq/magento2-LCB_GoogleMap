<?php

/**
 * Created by Marcin Gierus.
 * Date: 10.04.18
 * Time: 10:56
 */

namespace LCB\GoogleMap\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class Reviews
 *
 * @package LCB\GoogleMap\Block
 */
class Reviews  extends \Magento\Framework\View\Element\Template{

    /**
     * Reviews constructor.
     *
     * @param Template\Context $context
     * @param array            $data
     */
    public function __construct(
        Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
    }

}