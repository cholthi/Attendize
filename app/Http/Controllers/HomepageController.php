<?php

namespace App\Http\Controllers;

use App\Attendize\Utils;
use App\Models\Event;
use Auth;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Show the public home page with events list
     *
     * @return View
     */
    public function showEventsHomePage(Request $request)
    {
       $searchQuery = $request->get('q');
       $start_date_query = $request->get('start_date'); //Carbon::createFromFormat('Y-m-d',  $request->get('start_date'));
       $end_date_query = $request->get('end_date');

       if($searchQuery) {
        $upcoming_events = Event::with(['organiser', 'currency'])->where([
            ['end_date', '>=', now()],
            ['is_live', 1]
        ])->where(function ($query) use ($searchQuery) {
                    $query->where('title', 'like', $searchQuery . '%')
                        ->orWhere('description', 'like', $searchQuery . '%')
                        ->orWhere('location', 'like', $searchQuery . '%');
                })->paginate();
       }elseif($start_date_query) {
              $upcoming_events = Event::with(['organiser', 'currency'])->where([
            ['start_date', '>=', Carbon::createFromFormat('Y-m-d',  $request->get('start_date'))],
            ['is_live', 1]
        ])->paginate();

           }elseif($end_date_query) {
              $upcoming_events = Event::with(['organiser', 'currency'])->where([
            ['end_date', '<=', Carbon::createFromFormat('Y-m-d',  $request->get('end_date'))],
            ['is_live', 1]
        ])->paginate();
        } else{
               $upcoming_events = Event::with(['organiser', 'currency'])->where([
            ['end_date', '>=', now()],
            ['is_live', 1]])->paginate();
         }

     

      if($searchQuery) {
        $past_events = Event::with(['organiser', 'currency'])->where([
            ['end_date', '<', now()],
            ['is_live', 1]
        ])->limit(10)->where(function ($query) use ($searchQuery) {
                    $query->where('title', 'like', $searchQuery . '%')
                        ->orWhere('description', 'like', $searchQuery . '%')
                        ->orWhere('location', 'like', $searchQuery . '%');
                })->paginate();
        } else {
             $past_events = Event::with(['organiser', 'currency'])->where([
            ['end_date', '<=', now()],
            ['is_live', 1]])->paginate();
         }
 // Get popular events according to the EventStat model
 $popular_events = Event::where([['end_date', '>', now()],['is_live', 1]])->whereHas('stats',
                               function ($query) {
                               $query->orderByDesc('views');
                    })->take(5);

        $data = [
            'is_embedded'     => 0,
            'upcoming_events' => $upcoming_events,
            'past_events'     => $past_events,
            'popular_events'  => $popular_events,
        ];


        return view('Public.HomePage.Home', $data);
    }

}
