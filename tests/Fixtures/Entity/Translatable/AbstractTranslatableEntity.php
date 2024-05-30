<?php

declare(strict_types=1);

namespace TeamQ\DoctrineBehaviors\Tests\Fixtures\Entity\Translatable;

use Doctrine\ORM\Mapping\MappedSuperclass;
use TeamQ\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use TeamQ\DoctrineBehaviors\Model\Translatable\TranslatableTrait;

#[MappedSuperclass]
abstract class AbstractTranslatableEntity implements TranslatableInterface
{
    use TranslatableTrait;

    /**
     * @return mixed
     */
    public function __call(string $method, array $arguments)
    {
        return $this->proxyCurrentLocaleTranslation($method, $arguments);
    }
}
