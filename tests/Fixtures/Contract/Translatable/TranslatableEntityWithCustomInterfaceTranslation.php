<?php

declare(strict_types=1);

namespace TeamQ\DoctrineBehaviors\Tests\Fixtures\Contract\Translatable;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use TeamQ\DoctrineBehaviors\Tests\Fixtures\Entity\Translatable\AbstractTranslatableEntityTranslation;

#[Entity]
class TranslatableEntityWithCustomInterfaceTranslation extends AbstractTranslatableEntityTranslation
{
    #[Id]
    #[Column(type: 'integer')]
    #[GeneratedValue(strategy: 'AUTO')]
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }
}
