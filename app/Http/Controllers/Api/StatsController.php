<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\Stats;
use Auth;
use Flugg\Responder\Http\Responses\SuccessResponseBuilder;

class StatsController extends Controller
{
    use Stats;

    public function statsMy(): SuccessResponseBuilder
    {
        return $this->response($this->getStats(Auth::id()) , 'my-stats');
    }

    public function stats(): SuccessResponseBuilder
    {
        $statsAll = $this->getStatsAll();

        return $this->response($statsAll, 'stats');
    }

    public function response(int $count, string $name): SuccessResponseBuilder
    {
        return responder()->success(['name' => $name, 'count' => $count]);
    }
}
