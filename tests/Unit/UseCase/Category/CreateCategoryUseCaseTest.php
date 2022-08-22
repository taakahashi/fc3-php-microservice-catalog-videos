<?php

namespace Tests\Unit\UseCase\Category;

use stdClass;
use Mockery;
use PHPUnit\Framework\TestCase;
use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\Category\CreateCategoryUseCase;

class CreateCategoryUseCaseTest extends TestCase
{

    public function testCreateNewCategory()
    {
        //$this->mockCategory = Mockery::mock(Category::class, [
        //    'Name Category'
        //]);

        $this->mockRepository = Mockery::mock(stdClass::class, CategoryRepositoryInterface::class);
        //$this->mockRepository->shouldReceive('insert')->andReturn($this->mockCategory);
        $this->mockRepository->shouldReceive('insert');

        $useCase = new CreateCategoryUseCase($this->mockRepository);
        $useCase->execute();

        self::assertTrue(true);

        Mockery::close();
    }
}