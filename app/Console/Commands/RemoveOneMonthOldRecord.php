<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;


class RemoveOneMonthOldRecord extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete 30 days old records each hour';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = now()->subDays(30);
        $users = User::whereDate('created_at','<',$date)->get();
        foreach($users as $user)
        {
            $user->delete();
        }
        $this->info('Data has been removed successfully');
    }
}
