<?php

namespace Crossover\Api\Controller\Adminhtml\Crossover;
 
use Magento\Framework\Controller\ResultFactory;
 
class Index extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Crossover_Api::data');
        $resultPage->getConfig()->getTitle()->prepend(__('View Api Details'));
        return $resultPage;
    }
}