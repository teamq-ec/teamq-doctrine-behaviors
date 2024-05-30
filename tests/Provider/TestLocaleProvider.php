<?php

declare(strict_types=1);

namespace TeamQ\DoctrineBehaviors\Tests\Provider;

use TeamQ\DoctrineBehaviors\Contract\Provider\LocaleProviderInterface;

final class TestLocaleProvider implements LocaleProviderInterface
{
    public function provideCurrentLocale(): ?string
    {
        return 'en';
    }

    public function provideFallbackLocale(): ?string
    {
        return 'en';
    }
}
