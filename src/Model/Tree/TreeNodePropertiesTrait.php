<?php

declare(strict_types=1);

namespace TeamQ\DoctrineBehaviors\Model\Tree;

use Doctrine\Common\Collections\Collection;
use TeamQ\DoctrineBehaviors\Contract\Entity\TreeNodeInterface;

trait TreeNodePropertiesTrait
{
    /**
     * @var string
     */
    protected $materializedPath = '';

    /**
     * @var Collection|TreeNodeInterface[]
     */
    private $childNodes;

    /**
     * @var TreeNodeInterface|null
     */
    private $parentNode;
}
