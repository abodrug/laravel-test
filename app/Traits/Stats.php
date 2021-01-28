<?php

namespace App\Traits;

use Cache;
use Illuminate\Support\Facades\Redis;

trait Stats
{
    private $cache = 'redis';

    public function getStats(int $userId)
    {
        return Cache::store($this->cache)->get("api:users:{$userId}", 0);
    }

    public function setStats(int $userId, int $value)
    {
        Cache::store($this->cache)->put("api:users:{$userId}", $value);
    }

    public function getStatsAll()
    {
        return Cache::store($this->cache)->get("api:total-request", 0);
    }

    public function setStatsAll(int $total)
    {
        Cache::store($this->cache)->put('api:total-request', $total);;
    }

    public function getUsers()
    {
        $redis = Redis::connection();
        $users = $redis->keys('*api:users:*');
        $total = 0;
        foreach ($users as $user) {
            $mas = explode(':', $user);
            $userId = $mas[3];
            $total += (int) Cache::store($this->cache)->get('api:users:'.$userId);
        }
        $this->setStatsAll($total);
    }

}

