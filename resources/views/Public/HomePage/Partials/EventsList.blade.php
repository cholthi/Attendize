<div class="bg-lighter mb-4 shadow-sm rounded p-4">
    @include('Public.ViewOrganiser.Partials.EventListingPanel',
    [
    'panel_title' => trans("Public_ViewOrganiser.upcoming_events"),
    'events' => $upcoming_events
    ]
    )
    <div class="row"></div>
</div>

<div class="bg-lighter p-4 shadow-sm rounded">
    @include('Public.ViewOrganiser.Partials.EventListingPanel',
    [
    'panel_title' => trans("Public_ViewOrganiser.past_events"),
    'events' => $past_events
    ]
    )
    <div class="row"></div>
</div>