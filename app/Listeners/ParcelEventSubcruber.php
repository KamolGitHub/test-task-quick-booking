<?php

namespace App\Listeners;

use App\Events\ParcelProhibitedItemWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ParcelEventSubcruber
{

    public function onParcelProhibitedItemWasCreated(ParcelProhibitedItemWasCreated $event)
    {
        Log::info("Отправка информации на почту {$event->parcel->client->email}");
        Log::info("вызов Api printNode для печати стикера: 
                                                            ID={$event->parcel->client->id}, 
                                                            FULL NAME={$event->parcel->client->full_name}, 
                                                            NUMBER PARCEL={$event->parcel->number}, 
                                                            BAR CODE={$event->parcel->bar_code},
                                                            PARTNER ID={$event->parcel->client->partner_id},
                                                            ");
    }

    /**
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\ParcelProhibitedItemWasCreated',
            'App\Listeners\ParcelEventSubcruber@onParcelProhibitedItemWasCreated'
        );

    }
}
