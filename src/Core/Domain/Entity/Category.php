<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTrait;
use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;
use Core\Domain\ValueObject\Uuid;

class Category
{
    use MethodsMagicsTrait;

    /**
     * @throws EntityValidationException
     */
    public function __construct(
        protected Uuid|string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected bool $isActive = true,
    )
    {
        $this->id = $this->id ? new Uuid($this->id) : Uuid::random();
        $this->validate();
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function disable(): void
    {
        $this->isActive = false;
    }

    /**
     * @throws EntityValidationException
     */
    public function update(string $name, string $description = ''): void
    {
        $this->name = $name;
        $this->description = $description;

        $this->validate();
    }

    /**
     * @throws EntityValidationException
     */
    public function validate(): void
    {
        DomainValidation::strMinLength($this->name);
        DomainValidation::strMinLength($this->name);

        DomainValidation::strCanNullAndMaxLength($this->description);
    }

}