<?php

namespace App\Listeners;

use App\Events\AddOddsToLogEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Log;

class AddOddsToLog {

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AddOddsToLog  $event
     * @return void
     */
    public function handle(AddOddsToLogEvent $event) {
        Log::create(['user_id' => $event->userId, 'fraction' => $event->fraction, 'decimal' => $event->decimal, 'american' => $event->american]);
    }

}
