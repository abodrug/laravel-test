<?php

namespace App\Console\Commands;

use App\Models\User;
use Cache;
use Illuminate\Console\Command;

class Stats extends Command
{
    use \App\Traits\Stats;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sum all request';

    public function handle(): void
    {
        $this->getUsers();
    }

    public function getUser(): ?\Generator
    {
        foreach (User::all() as $user) {
            yield $this->getStats($user->id);
        }
    }
}
