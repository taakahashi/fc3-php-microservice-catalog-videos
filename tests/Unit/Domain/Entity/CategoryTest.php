<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{

    public function testAttributes()
    {
        $category = new Category(
            id: '',
            name: 'Terror',
            description: 'Desc',
            isActive: true
        );

        self::assertEquals('Terror', $category->name);
        self::assertEquals('Desc', $category->description);
        self::assertEquals(true, $category->isActive);

    }

}
