<?php

declare(strict_types=1);

namespace TeamQ\DoctrineBehaviors\Tests;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Logging\Middleware;
use Doctrine\DBAL\Platforms\PostgreSQLPlatform;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Clock\NativeClock;
use Symfony\Component\DependencyInjection\ContainerInterface;
use TeamQ\DoctrineBehaviors\Tests\HttpKernel\DoctrineBehaviorsKernel;
use TeamQ\DoctrineBehaviors\Tests\Logger\ArrayQueryLogger;

abstract class AbstractBehaviorTestCase extends TestCase
{
    protected EntityManagerInterface $entityManager;

    private ContainerInterface $container;

    protected function setUp(): void
    {
        $doctrineBehaviorsKernel = new DoctrineBehaviorsKernel($this->provideCustomConfigs());
        $doctrineBehaviorsKernel->boot();

        $this->container = $doctrineBehaviorsKernel->getContainer();

        $this->entityManager = $this->getService('doctrine.orm.entity_manager');
        $this->loadDatabaseFixtures();
    }

    protected function loadDatabaseFixtures(): void
    {
        $databaseLoader = $this->getService(DatabaseLoader::class);
        $databaseLoader->reload();
    }

    protected function isPostgreSql(): bool
    {
        $connection = $this->entityManager->getConnection();
        return $connection->getDatabasePlatform() instanceof PostgreSQLPlatform;
    }

    /**
     * @return string[]
     */
    protected function provideCustomConfigs(): array
    {
        return [];
    }

    protected function createAndRegisterQueryLogger(): ArrayQueryLogger
    {
        $queryLogger = new ArrayQueryLogger();
        $middleware = new Middleware($queryLogger, new NativeClock());

        $this->entityManager->getConnection()
            ->getConfiguration()
            ->setMiddlewares([$middleware]);

        return $queryLogger;
    }

    /**
     * @template T as object
     * @param class-string<T> $type
     * @return T
     */
    protected function getService(string $type): object
    {
        return $this->container->get($type);
    }
}
