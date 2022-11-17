<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class StaticPageController extends Controller
{
    public function showTermsAndConditions() {
      $date = new Carbon("2022-10-22");
      return view("Public.StaticPage.TermsAndConditions", compact('date'));
    }

    public function showHelloWorld() {
      return view("Public.StaticPage.HelloWorld");
    }

   public function showFaqCOntactUs() {
      return view("Public.StaticPage.FaqContactUs");
    }

}
