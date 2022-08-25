<?php

namespace Tests\Unit\UseCase\Category;

use stdClass;
use Ramsey\Uuid\Uuid;
use Mockery;
use PHPUnit\Framework\TestCase;
use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\DTO\Category\CategoryCreateInputDTO;
use Core\UseCase\DTO\Category\CategoryCreateOutputDTO;
use Core\UseCase\Category\CreateCategoryUseCase;

class CreateCategoryUseCaseTest extends TestCase
{

    public function testCreateNewCategory()
    {
        $categoryName = 'Name Category Test';

        $this->mockEntity = Mockery::mock(Category::class, [
            '',
            $categoryName
        ]);

        $this->mockRepository = Mockery::mock(stdClass::class, CategoryRepositoryInterface::class);
        $this->mockRepository->shouldReceive('insert')->andReturn($this->mockEntity);

        $this->mockInputDTO = Mockery::mock(CategoryCreateInputDTO::class, [
            $categoryName,
        ]);

        $useCase = new CreateCategoryUseCase($this->mockRepository);
        $responseUseCase = $useCase->execute($this->mockInputDTO);

        $this->assertInstanceOf(CategoryCreateOutputDTO::class, $responseUseCase);
        $this->assertEquals($categoryName, $responseUseCase->name);
        $this->assertEquals('', $responseUseCase->description);

        Mockery::close();
    }
}