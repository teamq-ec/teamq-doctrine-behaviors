<?php

declare(strict_types=1);

namespace TeamQ\DoctrineBehaviors\Tests\Fixtures\Repository;

use Doctrine\ORM\EntityRepository;
use TeamQ\DoctrineBehaviors\ORM\Tree\TreeTrait;

final class TreeNodeRepository extends EntityRepository
{
    use TreeTrait;
}
