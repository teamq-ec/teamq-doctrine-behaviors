<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set('doctrine_behaviors_translatable_fetch_mode', 'LAZY');
    $parameters->set('doctrine_behaviors_translation_fetch_mode', 'LAZY');

    $services = $containerConfigurator->services();

    $services->defaults()
        ->public()
        ->autowire()
        ->autoconfigure()
        ->bind('$translatableFetchMode', '%doctrine_behaviors_translatable_fetch_mode%')
        ->bind('$translationFetchMode', '%doctrine_behaviors_translation_fetch_mode%');

    $services->load('TeamQ\DoctrineBehaviors\\', __DIR__ . '/../src')
        ->exclude([
            __DIR__ . '/../src/Bundle',
            __DIR__ . '/../src/DoctrineBehaviorsBundle.php',
            __DIR__ . '/../src/Exception',
        ]);
};
