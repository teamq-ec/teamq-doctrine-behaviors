<?php

declare(strict_types=1);

namespace TeamQ\DoctrineBehaviors\Model\Uuidable;

use TeamQ\DoctrineBehaviors\Exception\ShouldNotHappenException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

trait UuidableMethodsTrait
{
    public function setUuid(UuidInterface $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getUuid(): ?UuidInterface
    {
        if (is_string($this->uuid)) {
            if ($this->uuid === '') {
                throw new ShouldNotHappenException();
            }

            return Uuid::fromString($this->uuid);
        }

        return $this->uuid;
    }

    public function generateUuid(): void
    {
        if ($this->uuid) {
            return;
        }

        $this->uuid = Uuid::uuid4();
    }
}