<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\User;
use App\Jobs\InsertHistoriesLogedIn;
use Illuminate\Support\Facades\Auth;

class RedisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Test Redis.
     */
    public function testRedis()
    {
        Redis::set('name', 'Taylor');
        return Redis::get('name');
    }

    public function testQueueJob()
    {
        $user = Auth::user();
        InsertHistoriesLogedIn::dispatch($user)->delay(now()->addMinutes(1));
        return 'Success!';
    }
}