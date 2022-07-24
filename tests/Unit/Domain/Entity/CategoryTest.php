<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use PHPUnit\Framework\TestCase;

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

}
