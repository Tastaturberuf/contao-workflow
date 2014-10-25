<?php

/**
 * @package    dev
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2014 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\Contao\Workflow\Flow\Transition;


use Netzmacht\Contao\Workflow\Data\Data;
use Netzmacht\Contao\Workflow\Entity\Entity;
use Netzmacht\Contao\Workflow\ErrorCollection;
use Netzmacht\Contao\Workflow\Flow\Context;


interface Condition
{
    /**
     * @param Entity $entity
     * @param Context $context
     * @param ErrorCollection $errorCollection
     * @return bool
     */
    public function match(Entity $entity, Context $context, ErrorCollection $errorCollection);
} 