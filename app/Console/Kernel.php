<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use LaravelSalatNotifier\Models\SalatTime;
use LaravelSalatNotifier\Notifications\SalatNotification;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Schedule the task to run every minute
        $schedule->call(function () {
            $currentTime = Carbon::now('Asia/Dhaka');
            $notificationTime = $currentTime->format('H:i');

            // Retrieve Salat times that are exactly 10 minutes after the current time
            $salatTimes = SalatTime::whereTime('time', '=', $currentTime->copy()->addMinutes(10)->format('H:i'))
                ->get();

            foreach ($salatTimes as $salatTime) {
                // Send notification to Slack
                Notification::route('slack', config('salatnotifier.slack_webhook_url'))
                ->notify(new SalatNotification($salatTime->name));
            }
        })->everyMinute(); // Run the check every minute
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
