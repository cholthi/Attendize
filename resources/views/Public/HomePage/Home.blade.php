@extends('Shared.Layouts.MasterFront')

@section('head')
    {!! Html::style('/vendor/slick-carousel/slick/slick.css') !!}
@stop

@section('title')
 Buy and Sell Events tickets in South Sudan
 @parent
@stop

@section('content')
    @include('Public.HomePage.Partials.BannerSlider',['events' => $popular_events])
    <section class="container py-4 py-sm-5">
        <div class="row">
            <aside class="col-md-3">
              {!! Form::open(['url' => route('home'),'method'=>'get']) !!}
                <div class="filter-wrap rounded p-4 bg-white shadow-sm">
                    <div class="d-flex align-items-start mb-3">
                        <div class="text-uppercase text-light">
                            Filters
                        </div>
                        <button type="button" id="btn-clear"
                            class="btn btn-link btn-sm text-black p-0 ms-auto text-decoration-none">
                            Clear All
                        </button>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label text-black">Event Start Date</label>
                        <input id="start-date" type="date" class="form-control form-control-sm" name="start_date" />
                    </div>

                    <div class="form-group">
                        <label class="form-label text-black">Event End Date</label>
                        <input id="end-date" type="date" class="form-control form-control-sm" name="end_date" />
                    </div>
                </div>
                {!! Form::token() !!}
                {!! Form::close() !!}
            </aside>
            <div class="col-md-9">
                @include('Public.HomePage.Partials.EventsList')
            </div>

        </div>
    </section>

@stop

@section('footer')

    {!! Html::script('/vendor/slick-carousel/slick/slick.min.js') !!}
    {!! Html::script('/assets/javascript/push-to-url.js?' . time()) !!}
    <script>
        $(document).ready(function() {
            $('#home-slider').slick({
                prevArrow: '<button type="button" class="slick-prev ico-angle-left"></button>',
                nextArrow: '<button type="button" class="slick-next ico-angle-right"></button>',
            });

            let query = new pushToUrl();

            $('#start-date').on('blur, change', function() {
                const $date = $(this);
                let opt = {key: 'start_date', value: $date.val() }
                changeDate(opt);
            });


            $('#end-date').on('blur change', function(e) {
                const $date = $(this);
                let opt = {key: 'end_date', value: $date.val() }
                changeDate(opt);
            });

            // clear filters
            $('#btn-clear').on('click', function(e) {
                query.removeAll();
            })

            function changeDate(opt) {
                query.remove('start_date');
                query.remove('end_date');
                query.add(opt);
            // Reload page to pickup the filter params
              location.reload(true)
            }

        });
    </script>
@stop
