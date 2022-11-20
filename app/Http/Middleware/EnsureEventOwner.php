<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Event;
use Auth;
class EnsureEventOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
     if($request->route('event_id'))
      {
       $event = Event::FindOrFail($request->route('event_id'));
       $user = Auth::user();
      //Non Super admin users should only access routes of their events
      if($event->organiser_id == $user->organiser_id || $user->can('manage organisers'))
         {
          return $next($request);
        }
        //everyone go back!
        return redirect()->back();
    }
      //Routes without event_id param should go through
   return $next($request);

  }
}
