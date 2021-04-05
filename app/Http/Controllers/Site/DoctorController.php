<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Doctor;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{

    public function index(Request $request)
    {
        $doctors = Doctor::Active()->where('category_id',$request->id)->inRandomOrder()->get();
        $categoryName = Category::where('id',$request->id)->first();

        //   if(!$doctors);
        //     return redirect()->back()->with(['error' => 'لا يوجد صفحه بهذا الاسم']);


         return view('front.doctors.index', compact('doctors','categoryName'));


    }

    public function show($slug)
    {
        $doctor =Doctor::Active()->where('slug',$slug)->first();

        $doctor->viewed++;
        $doctor->save();

       // return $doctor->comments;
        return view('front.doctors.show',compact("doctor"));
    }

    public function appoinment(Request $request)
    {

        $categories =Category::active()->get();

        return view('front.appoinment', compact('categories'));
    }





}
