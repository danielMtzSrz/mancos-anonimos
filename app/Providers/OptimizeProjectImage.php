<?php

namespace App\Providers;

use App\Providers\ProjectSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OptimizeProjectImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\ProjectSaved  $event
     * @return void
     */
    public function handle(ProjectSaved $event)
    {
        //
    }
}
