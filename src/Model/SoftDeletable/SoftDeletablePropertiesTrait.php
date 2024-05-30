<?php

declare(strict_types=1);

namespace TeamQ\DoctrineBehaviors\Model\SoftDeletable;

use DateTimeInterface;

trait SoftDeletablePropertiesTrait
{
    /**
     * @var DateTimeInterface|null
     */
    protected $deletedAt;
}
