<?php

declare(strict_types=1);

namespace Tests\ConnectTests;

use Illuminate\Support\Facades\Redis;
use Tests\TestCase;

class RedisConnectivityTest extends TestCase
{
    /**
     * Проверка подключения к БД.
     */
    public function testRedisConnectivity(): void
    {
        $key = 'test';
        $value = rand(1, 1000);
        $this->assertNull(Redis::get($key));
        Redis::set($key, $value);
        $this->assertEquals(Redis::get($key), $value);
        Redis::del($key);
        $this->assertNull(Redis::get($key));
    }
}
