<?php
namespace Crossover\Api\Controller\Adminhtml\Crossover;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;

class Post extends \Magento\Framework\App\Action\Action
{
    protected $uploaderFactory;
    protected $adapterFactory;
    protected $filesystem;
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;


    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        UploaderFactory $uploaderFactory,
        AdapterFactory $adapterFactory,
        Filesystem $filesystem
    )
    {
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;

    }

    /**
     * Default customer account page
     *
     * @return void
     */
    public function execute()
    {
        // 1. POST request : Get booking data
        $post = (array) $this->getRequest()->getPost();
        $resultRedirect = $this->resultRedirectFactory->create();



        if (!empty($post)) {
         
            // Retrieve your form data
            $rowData = $this->_objectManager->create('Crossover\Api\Model\Crossover');

            //$firstname = $post['hmu_name'];
            $rowData->setData($post);
            $rowData->save();
            $this->messageManager->addSuccess(__('Item has been successfully saved.'));
            return $resultRedirect->setPath('*/*/');

        }

        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
     /*   $resultRedirect = $this->resultRedirectFactory->create();

//var_dump($resultRedirect);
        try{

            $request = $this->getRequest()->getParams();
          echo  $email = $request['email'];
            $this->resultPageFactory->create();
            return $resultRedirect->setPath('crossover/crossover/form');

        }catch (\Exception $e){
            $this->messageManager->addExceptionMessage($e, __('We can\'t submit your request, Please try again.'));
            $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
            return $resultRedirect->setPath('crossover/crossover/form');
        }*/
// 2. GET request : Render the booking page
//        $resultPage = $this->resultPageFactory->create();
//        $resultPage->getConfig()->getTitle()->prepend((__('Posts')));
//
//        return $resultPage;
    }

}
?>