<?php

declare(strict_types=1);

namespace TeamQ\DoctrineBehaviors\Model\Translatable;

use TeamQ\DoctrineBehaviors\Contract\Entity\TranslatableInterface;

trait TranslationPropertiesTrait
{
    /**
     * @var string
     */
    protected $locale;

    /**
     * Will be mapped to translatable entity by TranslatableSubscriber
     *
     * @var TranslatableInterface
     */
    protected $translatable;
}
