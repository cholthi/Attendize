<footer id="footer" class="container-fluid" style="margin-top:20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('Shared.Partials.PoweredBy')

                @if(Utils::userOwns($event))
                &bull;
                <a class="adminLink " href="{{route('showEventDashboard' , ['event_id' => $event->id])}}">@lang("Public_ViewEvent.event_dashboard")</a>
                &bull;
                <a class="adminLink "
                   href="{{route('showOrganiserDashboard' , ['organiser_id' => $event->organiser->id])}}">@lang("Public_ViewEvent.organiser_dashboard")</a>
                @endif
            </div>
        </div>
    </div>
</footer>
{{--Admin Links--}}
