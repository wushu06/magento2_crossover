<?php

namespace Crossover\Api\Model;
 
use Crossover\Api\Model\ResourceModel\Crossover\CollectionFactory;;
 
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $crossoverCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $crossoverCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $crossoverCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $crossover) {
            $this->_loadedData[$crossover->getId()] = $crossover->getData();
        }
        return $this->_loadedData;
    }
}