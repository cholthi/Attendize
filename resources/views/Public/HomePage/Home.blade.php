@extends('Public.HomePage.Layouts.Master')

@section('head')
    {!! Html::style('/vendor/slick-carousel/slick/slick.css') !!}
@stop

@section('content')
    @include('Public.HomePage.Partials.BannerSlider')
    <section class="container py-4 py-sm-5">
        <div class="row">
            <aside class="col-md-3">
              {!! Form::open(['url' => route('showCreateEvent'),'method'=>'get']) !!}
                <div class="filter-wrap border p-4">
                    <div class="d-flex align-items-start mb-3">
                        <div class="text-uppercase text-light">
                            Filters
                        </div>
                        <button class="btn btn-link btn-sm text-black p-0 ms-auto text-decoration-none">
                            Clear All
                        </button>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label text-black">Start Date</label>
                        <input id="date-filter" type="date" class="form-control form-control-sm" name="start_date"/>
                    </div>

                    <div class="form-group">
                      <label class="form-label text-black">End Date</label>
                      <input id="date-filter" type="date" class="form-control form-control-sm" name="end_date" />
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

            $('#date-filter').on('blur, change', function() {
                const $date = $(this);
                changeDate($date.val());
            });


            $('#date-filter').on('keypress', function(e) {
                const $date = $(this);
                if (e.keyCode === 13) {
                    changeDate($date.val());
                }
            });

            $('#location-filter').on('change', function() {
                const $location = $(this);
                query.remove('date');
                query.add({
                    key: 'date',
                    value: $location.val()
                });
            });

            function changeDate(val) {
               query.remove('date');
                query.add({
                    key: 'date',
                    value: val
                });
            }

        });
    </script>
@stop
