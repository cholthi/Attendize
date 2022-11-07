@extends('Public.HomePage.Layouts.Master')

@section('head')
{!!Html::style('/vendor/slick-carousel/slick/slick.css') !!}
@stop

@section('content')
@include('Public.HomePage.Partials.BannerSlider')
<section class="container py-4 py-sm-5">
     <div class="row">
          <aside class="col-md-3">
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
                         <label class="form-label text-black">Date</label>
                         <input type="date" class="form-control form-control-sm" />
                    </div>
                    <div class="form-group mb-4">
                         <label class="form-label text-black">Category</label>
                         <select class="form-select form-select-sm">
                              <option>Cat 1</option>
                         </select>
                    </div>
                    <div class="form-group">
                         <label class="form-label text-black">Location</label>
                         <select class="form-select form-select-sm">
                              <option>Location 1</option>
                         </select>
                    </div>
               </div>
          </aside>
          <div class="col-md-9">
               @include('Public.HomePage.Partials.EventsList')
          </div>

     </div>
</section>
@stop

@section('footer')
{!! Html::script('/vendor/slick-carousel/slick/slick.min.js') !!}
<script type="text/javascript">
     $(document).ready(function(){
      $('#home-slider').slick({
  prevArrow: '<button type="button" class="slick-prev ico-angle-left"></button>',
  nextArrow: '<button type="button" class="slick-next ico-angle-right"></button>',
      });
    });
</script>
@stop