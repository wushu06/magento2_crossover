<?php

namespace Crossover\Api\Controller\Adminhtml\Crossover;

use Crossover\Api\Controller\Adminhtml\Crossover;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use \Magento\Backend\App\Action;

class Delete extends Action
{
    /**
     * Delete the data entity
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */


    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
         $dataId = $this->getRequest()->getParam('id');
        if ($dataId) {
            try {
                $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
                    ->get('Magento\Framework\App\ResourceConnection');
                $connection= $this->_resources->getConnection();

                $themeTable = $this->_resources->getTableName('crossover_api');
                $sql = "DELETE FROM $themeTable WHERE id={$dataId}";
                // exit;
                $connection->query($sql);
                $this->messageManager->addSuccessMessage(__('The data has been deleted.'));
                $resultRedirect->setPath('crossover/crossover/index');
                return $resultRedirect;
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage(__('The data no longer exists.'));
                return $resultRedirect->setPath('crossover/crossover/index');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('crossover/crossover/index', ['id' => $dataId]);
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('There was a problem deleting the data'));
                return $resultRedirect->setPath('crossover/crossover/edit', ['id' => $dataId]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find the data to delete.'));
        $resultRedirect->setPath('crossover/crossover/index');
        return $resultRedirect;
    }
}
