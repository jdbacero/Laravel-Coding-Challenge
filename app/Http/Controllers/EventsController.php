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

    public function getEventsMonth(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $events = Event::whereYear('date', '=', $year)->whereMonth('date', '=', $month)->orderBy('date', 'asc')->get();
        echo json_encode($events);
    }
}
