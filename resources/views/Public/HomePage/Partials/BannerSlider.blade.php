
<div class="d-flex">
<section class="container">

    <div class="list-unstyled" id="home-slider">
      @foreach($events->get() as $event)
        <div>
            <a href="{{$event->event_url}}" target="_self">
               @if(count($event->images))
                <img src="{{ asset($event->images->first()->banner_image_path()) }}"
                    alt="{{ $event->title}}" />
               @endif
            </a>
        </div>
      @endforeach
    </div>
</section>
</div>
