<?php

declare(strict_types=1);

namespace Tests\ConnectTests;

use Illuminate\Database\Connection;
use Tests\TestCase;

class DbConnectivityTest extends TestCase
{
    /**
     * Проверка подключения к БД.
     */
    public function testDbConnectivity(): void
    {
        /** @var Connection $db */
        $db = $this->app->make("db");
        $row = $db->selectOne("SELECT 1 AS one");
        $this->assertEquals(1, $row->one);
    }
}
