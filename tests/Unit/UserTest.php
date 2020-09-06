<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Database\DatabaseExecutor;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $executor = new DatabaseExecutor();
        echo $executor->executeQuery("Select * from migrations;");
    }
}
