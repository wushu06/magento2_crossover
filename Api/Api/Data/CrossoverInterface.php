<?php
/**
 * Webkul Software.
 *
 * @category  Webkul
 * @package   Webkul_UiForm
 * @author    Webkul
 * @copyright Copyright (c) 2010-2016 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
namespace Crossover\Api\Api\Data;

interface CrossoverInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ENTITY_ID    = 'id';
    /**#@-*/

    /**
    * Get ID
    *
    * @return int|null
    */
    public function getId();

    /**
    * Set ID
    *
    * @param int $id
    *
    * @return
    */
    public function setId($id);
}
