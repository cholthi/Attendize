<section id="events" class="container">
    <div class="bg-lighter mb-4 p-4">
        @include('Public.ViewOrganiser.Partials.EventListingPanel',
        [
        'panel_title' => trans("Public_ViewOrganiser.upcoming_events"),
        'events' => $upcoming_events
        ]
        )
        <div class="row"></div>
    </div>
    
    <div class="bg-lighter p-4">
        @include('Public.ViewOrganiser.Partials.EventListingPanel',
        [
        'panel_title' => trans("Public_ViewOrganiser.past_events"),
        'events' => $past_events
        ]
        )
        <div class="row"></div>
    </div>
    <div class="row">
        
        <div class="col-xs-12 col-md-4">
            @if ($organiser->facebook)
                @include('Shared.Partials.FacebookTimelinePanel',
                    [
                        'facebook_account' => $organiser->facebook
                    ]
                )
            @endif
            @if ($organiser->twitter)
                @include('Shared.Partials.TwitterTimelinePanel',
                    [
                        'twitter_account' => $organiser->twitter
                    ]
                )
            @endif
        </div>
    </div>
</section>