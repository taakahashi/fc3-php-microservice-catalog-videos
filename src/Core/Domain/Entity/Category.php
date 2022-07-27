<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTrait;
use Core\Domain\Exception\EntityValidationException;

class Category
{
    use MethodsMagicsTrait;

    /**
     * @throws EntityValidationException
     */
    public function __construct(
        protected string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected bool $isActive = true,
    )
    {
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

    //Inicialmente será public mas será necessário mudar posteriormente pois terá problemas ao criar mocks
    /**
     * @throws EntityValidationException
     */
    public function validate(): void
    {
        if (empty($this->name)) {
            throw new EntityValidationException("Nome vazio inválido");
        }

        if (strlen($this->name) > 255 || strlen($this->name) <= 2) {
            throw new EntityValidationException("Nome com quantidade de caractéres inválido");
        }

        if ($this->description != '' && (strlen($this->description) > 255 || strlen($this->description) <= 2)) {
            throw new EntityValidationException("Descrição inválida");
        }
    }

}