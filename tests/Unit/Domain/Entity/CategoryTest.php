<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Throwable;

class CategoryTest extends TestCase
{

    public function testAttributes()
    {
        $category = new Category(
            name: 'Terror',
            description: 'Desc',
            isActive: true
        );

        self::assertEquals('Terror', $category->name);
        self::assertEquals('Desc', $category->description);
        self::assertTrue($category->isActive);
    }

    public function testActivated()
    {
        $category = new Category(
            name: 'Terror',
            isActive: false
        );

        self::assertFalse($category->isActive);

        $category->activate();

        self::assertTrue($category->isActive);
    }

    public function testDisabled()
    {
        $category = new Category(
            name: 'Terror',
            isActive: true
        );

        self::assertTrue($category->isActive);

        $category->disable();

        self::assertFalse($category->isActive);
    }

    public function testUpdate()
    {
        $uuid = 'uuid.value';

        $category = new Category(
            id: $uuid,
            name: 'Terror',
            description: 'Desc Terror',
            isActive: true
        );

        $category->update(
            name: 'new_name',
            description: 'new_desc'
        );

        static::assertEquals('new_name', $category->name);
        static::assertEquals('new_desc', $category->description);
    }

    public function testExceptionName()
    {
        try {
            $category = new Category(
                name: 'Te',
                description: 'Desc Terror'
            );

            static::fail();
        } catch (Throwable $throwable) {
            static::assertInstanceOf(EntityValidationException::class, $throwable);
        }


    }

}
