<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Person;
use App\Jobs\Myjob;
use App\Console\ScheduleObj;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $count = Person::all()->count();
        $id = rand(0, $count) + 1;

        /**インスタンス実行 */
        // $schedule->call(new Myjob($id));

        /**ディスパッチする */
        // $schedule->call(function() use($id)
        // {
        //     Myjob::dispatch($id);
        // });
        $schedule->job(new MyJob($id));
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
