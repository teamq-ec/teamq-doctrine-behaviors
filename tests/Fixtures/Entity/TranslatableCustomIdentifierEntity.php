<?php

declare(strict_types=1);

namespace TeamQ\DoctrineBehaviors\Tests\Fixtures\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use TeamQ\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use TeamQ\DoctrineBehaviors\Model\Translatable\TranslatableTrait;

#[Entity]
class TranslatableCustomIdentifierEntity implements TranslatableInterface
{
    use TranslatableTrait;

    #[Id]
    #[Column(type: 'integer')]
    #[GeneratedValue(strategy: 'AUTO')]
    private int $idColumn;

    /**
     * @param mixed[] $arguments
     * @return mixed
     */
    public function __call(string $method, array $arguments)
    {
        return $this->proxyCurrentLocaleTranslation($method, $arguments);
    }

    public function getIdColumn(): int
    {
        return $this->idColumn;
    }
}
