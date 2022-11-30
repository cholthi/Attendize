<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Event;
use Illuminate\Http\Request;
use Auth;

class EventDeleteController extends MyBaseController
{

  public function getDeleteEvent(Request $request, $event_id)
    {
      $event = Event::scope()->findOrFail($event_id);

     //Events with orders can only be deleted by super admin
     if((count($event->orders) >= 1) && !Auth::user()->can('manage organisers'))
      {
       \Session::flash('message', "Event with orders can not be deleted");
        return redirect()->back();
     }
      $event->delete();

      \Session::flash('message', "Event Deleted Successfully");

      /*return redirect()->action(
          'OrganiserEventsController@showEvents', ['organizer_id' => auth()->user()->organiser_id]
      );*/
      return redirect()->back();
    }
}
