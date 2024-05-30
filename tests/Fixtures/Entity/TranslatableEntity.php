<?php

declare(strict_types=1);

namespace TeamQ\DoctrineBehaviors\Tests\Fixtures\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use TeamQ\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use TeamQ\DoctrineBehaviors\Model\Translatable\TranslatableTrait;

/**
 * @method string|null getTitle()
 * @method void setTitle(string $title)
 */
#[Entity]
class TranslatableEntity implements TranslatableInterface
{
    use TranslatableTrait;

    #[Id]
    #[Column(type: 'integer')]
    #[GeneratedValue(strategy: 'AUTO')]
    private int $id;

    /**
     * @return mixed
     */
    public function __call(string $method, array $arguments)
    {
        return $this->proxyCurrentLocaleTranslation($method, $arguments);
    }

    public function getId(): int
    {
        return $this->id;
    }
}
