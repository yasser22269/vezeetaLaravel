<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SliderImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $data = [];
    public function __construct()
    {
        //  $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $SliderImage = SliderImages::first();


        //start FEATURED ITEMS;
        $categories = Category::select('name','id')->get();
        //End FEATURED ITEMS;

      //   return $SliderImage;

        return view('home', compact('SliderImage', 'categories'));
    }


    public function about_me()
    {
        return view('front.about_me');
    }

    public function categoriesHome()
    {
        $categories =Category::active()->get();

        return view('front.categories', compact('categories'));
    }
}
