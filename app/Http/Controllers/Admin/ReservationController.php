<?php

namespace App\Http\Controllers\Admin;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorScheduleRequest;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\UpdateDoctorScheduleRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //translatedIn(app() -> getLocale())->
        $reservations = Appointment::paginate(PAGINATION_COUNT);
        return view('Admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Doctors = Doctor::get();

        return view('Admin.reservations.create', compact( 'Doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {

       try {
        //    return $request;
            DB::beginTransaction();

           $DoctorSchedule= DoctorSchedule::create([
                'doctor_id' => (int)$request->doctor_id,
                'scheduleDate' => $request->scheduleDate,
                'startTime' => $request->startTime,
                'endTime' => $request->endTime,
                'bookAvailable' => $request->bookAvailable,
            ]);

            Appointment::create([
                'doctor_id' => (int)$DoctorSchedule->id,
                'name' => $request->name,
                'phone' => $request->phone,
            ]);
            DB::commit();
            return redirect()->route('reservation.index')->with(['success' => 'تم ألاضافة بنجاح']);
       } catch (\Exception $ex) {
           DB::rollback();
           return redirect()->route('reservation.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Appointment::findOrFail($id);

        $Doctors = Doctor::get();

        return view('Admin.reservations.edit', compact('reservation', "Doctors"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationRequest $request, $id)
    {
       try {
           //return $request;

            DB::beginTransaction();
            $appointment =Appointment::findOrfail($request->id);

            $DoctorSchedule =DoctorSchedule::findOrfail($appointment->doctor_id);
           // return $DoctorSchedule;

             $DoctorSchedule->update([
                'doctor_id' => (int)$request->doctor_id,
                'scheduleDate' => $request->scheduleDate,
                'startTime' => $request->startTime,
                'endTime' => $request->endTime,
                'bookAvailable' => $request->bookAvailable,
            ]);

            $appointment->update([
                'doctor_id' => (int)$DoctorSchedule->id,
                'name' => $request->name,
                'phone' => $request->phone,
            ]);


            DB::commit();
            return redirect()->Back()->with(['success' => 'تم ألاضافة بنجاح']);

       } catch (\Exception $ex) {
           DB::rollback();
           return redirect()->route('DoctorSchedule.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
       }
    }


    public function destroy($id)
    {
        $Appointment = Appointment::find($id);
        $Appointment->doctor->bookAvailable =1;
        $Appointment->doctor->save();
        $Appointment->delete();
        return redirect()->route('reservation.index')->with(['success' => 'تم الحذف بنجاح']);
    }


}
