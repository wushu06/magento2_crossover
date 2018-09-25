<?php

namespace Crossover\Api\Controller\Adminhtml\Crossover;
 
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;
 
class Save extends Action
{
    /**
     * @param Action\Context $context
     * @param \Crossover\Api\Model\CrossoverFactory $crossover
     */
    public function __construct(
        Action\Context $context,
        \Crossover\Api\Model\CrossoverFactory $crossover
    ) {
        $this->_crossover = $crossover;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        if (!$this->getRequest()->isPost()) {
            $this->messageManager->addError(__("Something went wrong"));
            return $resultRedirect->setPath('*/*/');
        }
        $data = $this->getRequest()->getPostValue();
        $id = (int) $this->getRequest()->getParam("id");
        if ($id > 0) {
            $this->_crossover->create()->addData($data)->setId($id)->save();
        } else {
            $this->_crossover->create()->setData($data)->save();
        }
        $this->messageManager->addSuccess(__('Data saved successfully'));
        return $resultRedirect->setPath('*/*/');
    }
}