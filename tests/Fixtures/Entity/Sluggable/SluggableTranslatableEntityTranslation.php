<?php

declare(strict_types=1);

namespace TeamQ\DoctrineBehaviors\Tests\Fixtures\Entity\Sluggable;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use TeamQ\DoctrineBehaviors\Contract\Entity\SluggableInterface;
use TeamQ\DoctrineBehaviors\Contract\Entity\TranslationInterface;
use TeamQ\DoctrineBehaviors\Model\Sluggable\SluggableTrait;
use TeamQ\DoctrineBehaviors\Model\Translatable\TranslationTrait;

#[Entity]
class SluggableTranslatableEntityTranslation implements TranslationInterface, SluggableInterface
{
    use SluggableTrait;
    use TranslationTrait;

    #[Id]
    #[Column(type: 'integer')]
    #[GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[Column(type: 'string')]
    private ?string $title = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string[]
     */
    public function getSluggableFields(): array
    {
        return ['title'];
    }

    public function shouldGenerateUniqueSlugs(): bool
    {
        return true;
    }
}
