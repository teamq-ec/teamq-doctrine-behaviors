<?php

namespace TeamQ\DoctrineBehaviors\Tests\Logger;

use Psr\Log\AbstractLogger;

final class ArrayQueryLogger extends AbstractLogger
{
    public array $queries = [];

    public function log($level, mixed $message, array $context = []): void
    {
        $this->queries[] = (string) $message;
    }
}