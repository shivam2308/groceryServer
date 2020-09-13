<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Database\DatabaseExecutor;
use App\BaseCode\IntegerToAlphaConvertor;
use App\EntityModule\EntityService;


class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $service = new EntityService();
        echo $service->get();
        
    }
}
