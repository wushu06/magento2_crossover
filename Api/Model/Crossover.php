<?php

namespace Crossover\Api\Model;

use Crossover\Api\Api\Data\CrossoverInterface;
use Magento\Framework\DataObject\IdentityInterface;

class Crossover extends \Magento\Framework\Model\AbstractModel implements CrossoverInterface, IdentityInterface
{
    /**
     * No route page id
     */
    const NOROUTE_ENTITY_ID = 'no-route';

    /**
     * UiForm Crossover cache tag
     */
    const CACHE_TAG = 'crossover_api';

    /**
     * @var string
     */
    protected $_cacheTag = 'crossover_api';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'crossover_api';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Crossover\Api\Model\ResourceModel\Crossover');
    }

    /**
     * Load object data
     *
     * @param int|null $id
     * @param string $field
     * @return $this
     */
    public function load($id, $field = null)
    {
        if ($id === null) {
            return $this->noRouteCrossover();
        }
        return parent::load($id, $field);
    }

    /**
     * Load No-Route Crossover
     *
     * @return \Crossover\Api\Model\Crossover
     */
    public function noRouteCrossover()
    {
        return $this->load(self::NOROUTE_ENTITY_ID, $this->getIdFieldName());
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get ID
     *
     * @return int
     */
    public function getId()
    {
        return parent::getData(self::ENTITY_ID);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return \Crossover\Api\Api\Data\CrossoverInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
