<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\front\ApprointmentRequest;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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

       $DoctorScheduleDAy =  DoctorSchedule::NotBookAvailable()->where('doctor_id', $doctor->id)->where('scheduleDate','=', Carbon::now()->format('Y-m-d'))->get();
       $DoctorScheduleDAy = $DoctorScheduleDAy->sortBy('scheduleDate');

       $DoctorScheduleTomorrow =  DoctorSchedule::NotBookAvailable()->where('doctor_id', $doctor->id)->where('scheduleDate','=', Carbon::now()->addDay()->format('Y-m-d'))->get();
       $DoctorScheduleTomorrow = $DoctorScheduleTomorrow->sortBy('scheduleDate');


        $doctor->viewed++;
        $doctor->save();
     //   return Carbon::now()->format('Y-m-d');
       // return $DoctorScheduleDAy;
        return view('front.doctors.show',compact("doctor",'DoctorScheduleDAy','DoctorScheduleTomorrow'));
    }

    public function appoinment(Request $request)
    {

        $categories =Category::active()->get();

        return view('front.appoinment', compact('categories'));
    }


    public function appoinmentshow(Request $request,$id)
    {

       $DoctorSchedule= DoctorSchedule::NotBookAvailable()->findOrfail($id);
        if(!$DoctorSchedule)
             return redirect()->back()->with(['error' => 'لا يوجد صفحه بهذا الاسم']);

        return view('front.doctors.appointment', compact('id','DoctorSchedule'));
    }

    public function appoinmentupdate(ApprointmentRequest $request,$id)
    {

       $DoctorSchedule = DoctorSchedule::NotBookAvailable()->findOrfail($id);
        if(!$DoctorSchedule)
          return redirect()->back()->with(['error' => 'لا يوجد حجز بهذا الاسم']);

          $DoctorSchedule->bookAvailable =0;  //تم الحجز
          $DoctorSchedule->save();

          Appointment::create($request->all());

          return redirect()->route('home')->with(['success' => 'تم الحجز بنجاح']);

    }

}
