<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Event;
use Illuminate\Http\Request;

class EventDeleteController extends MyBaseController
{

  public function getDeleteEvent(Request $request, $event_id)
    {
      $event = Event::scope()->findOrFail($event_id);
      $event->delete();

      \Session::flash('message', "Event Deleted Successfully");

      /*return redirect()->action(
          'OrganiserEventsController@showEvents', ['organizer_id' => auth()->user()->organiser_id]
      );*/

      return redirect()->back();
    }
}
