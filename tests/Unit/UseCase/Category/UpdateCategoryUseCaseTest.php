<?php

namespace Unit\UseCase\Category;

use stdClass;
use Mockery;
use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\TestCase;
use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\DTO\Category\CategoryUpdateInputDTO;
use Core\UseCase\DTO\Category\CategoryUpdateOutputDTO;
use Core\UseCase\Category\UpdateCategoryUseCase;

class UpdateCategoryUseCaseTest extends TestCase
{

    public function testRenameCategory() {
        $uuid = Uuid::uuid4()->toString();
        $categoryName = 'Name';
        $categoryDesc = 'Desc';

        $this->mockEntity = Mockery::mock(Category::class, [
            $uuid, $categoryName, $categoryDesc
        ]);

        $this->mockRepository->shouldReceive('update');

        $this->mockRepository = Mockery::mock(stdClass::class, CategoryRepositoryInterface::class);
        $this->mockRepository->shouldReceive('findById')->andReturn($this->mockEntity);
        $this->mockRepository->shouldReceive('update')->andReturn($this->mockEntity);

        $this->mockInputDTO = Mockery::mock(CategoryUpdateInputDTO::class, [
            $uuid,
            'New Name'
        ]);

        $useCase = new UpdateCategoryUseCase($this->mockRepository);
        $responseUseCase = $useCase->execute();

        self::assertInstanceOf(CategoryUpdateOutputDTO::class);
    }

}