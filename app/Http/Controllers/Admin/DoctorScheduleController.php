<?php

namespace App\Http\Controllers\Admin;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorScheduleRequest;
use App\Http\Requests\UpdateDoctorScheduleRequest;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //translatedIn(app() -> getLocale())->
        $DoctorSchedules = DoctorSchedule::orderBy('id', 'desc')->paginate(PAGINATION_COUNT);
        return view('Admin.doctorSchedules.index', compact('DoctorSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Doctors = Doctor::get();

        return view('Admin.doctorSchedules.create', compact( 'Doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorScheduleRequest $request)
    {
     //   try {
        //    return $request;
            DB::beginTransaction();
            if (isset($request->bookAvailable) && $request->bookAvailable == 1){
                $request->request->add(['bookAvailable' => 1]);
            }
            else{
                $request->request->add(['bookAvailable' => 0]);

            }
           // return $request;
        foreach ($request->Doctors as  $Doctor) {
            DoctorSchedule::create([
                'doctor_id' => (int)$Doctor,
                'scheduleDate' => $request->scheduleDate,
                'startTime' => $request->startTime,
                'endTime' => $request->endTime,
                 'bookAvailable' => $request->bookAvailable,
            ]);

         }

            DB::commit();
            return redirect()->route('DoctorSchedule.index')->with(['success' => 'تم ألاضافة بنجاح']);
     //   } catch (\Exception $ex) {
      //      DB::rollback();
       //     return redirect()->route('DoctorSchedule.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
      //  }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $DoctorSchedule = DoctorSchedule::findOrFail($id);

        $Doctors = Doctor::get();

        return view('Admin.doctorSchedules.edit', compact('DoctorSchedule', "Doctors"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorScheduleRequest $request, $id)
    {
      //  try {

            DB::beginTransaction();
            $DoctorSchedule = DoctorSchedule::find($id);
            if (isset($request->bookAvailable) && $request->bookAvailable == 1)
                $request->request->add(['bookAvailable' => 1]);
            else
                $request->request->add(['bookAvailable' => 0]);
                // return $request->all();

             $DoctorSchedule->update($request->all());

            DB::commit();
            return redirect()->route('DoctorSchedule.index')->with(['success' => 'تم التعديل بنجاح']);
      //  } catch (\Exception $ex) {
      //      DB::rollback();
       //     return redirect()->route('DoctorSchedule.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
      //  }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DoctorSchedule = DoctorSchedule::find($id);

        $DoctorSchedule->delete();
        return redirect()->route('DoctorSchedule.index')->with(['success' => 'تم الحذف بنجاح']);
    }


}
