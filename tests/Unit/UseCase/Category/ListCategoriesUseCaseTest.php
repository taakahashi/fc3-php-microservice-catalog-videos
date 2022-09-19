<?php

namespace Tests\Unit\UseCase\Category;

use Core\UseCase\DTO\Category\PaginationInterface;
use stdClass;
use Mockery;
use PHPUnit\Framework\TestCase;
use Core\UseCase\Category\ListCategoriesUseCase;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\DTO\Category\ListCategories\ListCategoriesInputDTO;
use Core\UseCase\DTO\Category\ListCategories\ListCategoriesOutputDTO;


class ListCategoriesUseCaseTest extends TestCase
{
    public function testListCategoriesEmpty()
    {
        $this->mockPagination = Mockery::mock(stdClass::class, PaginationInterface::class);
        $this->mockPagination->shouldReceive('items')->andReturn([]);
        $this->mockPagination->shouldReceive('total')->andReturn(0);

        $this->mockRepo = Mockery::mock(stdClass::class, CategoryRepositoryInterface::class);
        $this->mockRepo->shouldReceive('paginate')->andReturn($this->mockPagination);

        $this->mockInputDTO = Mockery::mock(ListCategoriesInputDTO::class, ['filter', 'order']);

        $useCase = new ListCategoriesUseCase($this->mockRepo);
        $responseUseCase = $useCase->execute($this->mockInputDTO);

        self::assertCount(0, $responseUseCase->items);
        self::assertInstanceOf(ListCategoriesOutputDTO::class, $responseUseCase);
    }
}