<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\ContactUS;
use App\Models\Doctor;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\DoctorSchedule;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        $reservationcount = Appointment::count();
        $CategoryCount = Category::count();
        $ContactUSCount = ContactUS::count();
        $DoctorCount = Doctor::count();

        $DoctorSchedules = DoctorSchedule::BookAvailable()->Join('appointments', 'appointments.doctor_id', '=', 'doctor_schedules.id')->select('*')->get();

        //return  $DoctorSchedules ;
        foreach ($DoctorSchedules as $DoctorSchedule) {

            $events[] = [
                'title' => $DoctorSchedule->name . " " .date('g:i a', strtotime($DoctorSchedule->startTime))  . "To" .  date('g:i a', strtotime($DoctorSchedule->endTime))  ,
                'start' => $DoctorSchedule->scheduleDate,
                'url'   => route('reservation.edit', $DoctorSchedule->id),
            ];
        }



        return view('Admin.index', compact('reservationcount', 'CategoryCount', 'DoctorCount', 'ContactUSCount','events'));
    }


    public function profile()
    {
        $admin = auth('admin')->user();
        // Auth()->guard('admin')->user()
        return view('Admin.profile.index', compact('admin'));
    }


    public function updateprofile(AdminProfileRequest $request, $id)
    {

        $admin = Admin::findOrfail($id);
        // return $request;
        $admin->name = $request->name;
        $admin->email = $request->email;
        if (isset($request['password']) && $request['password'] != '') {
            $admin->password = bcrypt($request['password']);
        }
        $admin->save();

        // DB::commit();
        return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);
    }
}
