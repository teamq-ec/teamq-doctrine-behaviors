<?php

declare(strict_types=1);

namespace TeamQ\DoctrineBehaviors\Model\SoftDeletable;

trait SoftDeletableTrait
{
    use SoftDeletablePropertiesTrait;
    use SoftDeletableMethodsTrait;
}
