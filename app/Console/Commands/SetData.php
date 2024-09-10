<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DashboardData;

class SetData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set-data:dashboard';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = new DashboardData;
        $data->current_users = 0;
        $data->active_users = 0;
        $data->suspended_users = 0;
        $data->users_access = 0;
        $data->client_id = null;
        $data->save();
    }
}
