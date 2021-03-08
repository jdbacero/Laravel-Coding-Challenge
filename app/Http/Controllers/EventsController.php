<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventModel as Event;

class EventsController extends Controller
{
    //
    public function create(Request $request)
    {
        // echo count($request->dates);
        $dates = $request->dates;
        $event = $request->event;

        for ($ctr = 0; $ctr < count($dates); $ctr++) {
            $newevent = new Event;
            $newevent->date = $dates[$ctr];
            $newevent->event = $event;
            $newevent->save();

            if (!$newevent) {
                abort(500);
            }
        }
        echo "success";
    }
}
