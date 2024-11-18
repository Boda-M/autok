<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class valamiControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */

    public function test_user_can_view_makers_index(){

        Maker::factory()->count(3)->create();

    }

    public function test_example(): void
    {
        $this->assertTrue(true);
    }
}
