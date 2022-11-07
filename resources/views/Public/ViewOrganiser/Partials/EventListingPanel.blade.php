<div class="">
    <h3 class="section-title mb-3">{{ $panel_title }}</h3>
    <ul class="event-grid list-unstyled d-grid mb-0">

        @if(count($events))

        @foreach($events as $event)
        <li class="event-item">
            <a href="{{$event->event_url }}" class="text-decoration-none d-flex flex-column h-100">
                <div class="event-img">
                    @if(count($event->images))
                    <img class="hide" alt="{{ $event->title }}"
                        src="{{ asset($event->images->first()['image_path']) }}" />
                    @endif
                    <div class="event-time lh-1">
                        <time datetime="{{ $event->start_date }}" class="d-flex font-sm align-items-center">
                            <div class="me-3 d-flex align-items-center">
                                <i class="ico-calendar2 me-2"></i>
                                <span class="day me-1">{{ $event->start_date->format('d') }}</span>
                                <span class="month me-1">{{ explode("|",
                                    trans("basic.months_short"))[$event->start_date->format('n')]
                                    }},</span>
                                <span class="year">{{ $event->start_date->format('Y') }}</span>
                            </div>
                            <span class="time"><i class="ico-clock6 me-2"></i>{{ $event->start_date->format('h:i')
                                }}</span>
                        </time>

                    </div>
                </div>
                <div class="p-3 bg-white d-flex flex-column flex-grow-1">
                    <h6 class="event-title">
                        {{ $event->title }}
                    </h6>

                    <p class="event-description">{{Str::words($event->description,10)}}</p>

                    <div class="event-meta d-flex align-items-center gap-2 mt-auto">
                        <span class="event-location"><i class="icon ico-location6 me-1"></i>{{ $event->venue_name
                            }}</span>
                        <span class="text-secondary ms-auto"><i
                                class="icon ico-ticket me-1"></i>@lang("Public_ViewOrganiser.tickets")</span>
                    </div>

                </div>
            </a>
        </li>
        @endforeach
        @else
        <div class="alert alert-info">
            @lang("Public_ViewOrganiser.no_events", ["panel_title"=>$panel_title])
        </div>
        @endif

    </ul>
</div>