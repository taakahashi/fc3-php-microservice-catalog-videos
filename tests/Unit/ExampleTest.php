<?php

namespace Tests\Unit;

use Core\Example;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{

    public function testCallMethodFoo()
    {
        $example = new Example();
        $response = $example->foo();

        self::assertEquals('bar', $response);
    }

}