<p align="center"><a href="https://teamq.biz" target="_blank">
<img src="https://teamq.biz/wp-content/uploads/2020/03/teamq2.png" width="400"/></a></p>

<h1 style="text-align: center">Developing Dreams</h1>

# Doctrine Behaviors

This PHP library is a collection of traits and interfaces that add behaviors translataions to Doctrine entities and repositories, 
project based in package *[knplabs/doctrine-behaviors](https://github.com/KnpLabs/DoctrineBehaviors)*

It currently handles:

* [Translatable](/docs/translatable.md)

## Install

```bash
composer teamq-ec/teamq-doctrine-behaviors
```

## Usage

All you have to do is to define a Doctrine entity:

- implemented interface
- add a trait

Voilà!

You now have a working `Category` that behaves like.

## PHPStan

A PHPStan extension is available and provides the following features:
- Provides correct return type for `TranslatableInterface::getTranslations()` and `TranslatableInterface::getNewTranslations()`
- Provides correct return type for `TranslatableInterface::translate()`
- Provides correct return type for `TranslationInterface::getTranslatable()`

Include `phpstan-extension.neon` in your project's PHPStan config:
```yaml
# phpstan.neon
includes:
    - vendor/teamq-ec/teamq-doctrine-behaviors/phpstan-extension.neon
```

## 3 Steps to Contribute

- **1 feature per pull-request**
- **New feature needs tests**
- Tests and static analysis **must pass**:

    ```bash
    vendor/bin/phpunit
    composer fix-cs
    composer phpstan
    ```

## Upgrade 1.x to 2

There have been many changes between 1 and 2, but don't worry.
This package uses [Rector](https://github.com/rectorphp/rector), that handles upgrade for you.

```bash
composer require rector/rector --dev
```

Create `rector.php` config:

```bash
vendor/bin/rector init
```

Add Doctrine Behaviors upgrade set to `rector.php`:

```php
use Rector\Core\Configuration\Option;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Rector\Doctrine\Set\DoctrineSetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(DoctrineSetList::DOCTRINE_BEHAVIORS_20);
};
```

Run Rector:

```bash
vendor/bin/rector process src
```