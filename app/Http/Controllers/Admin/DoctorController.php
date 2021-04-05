<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorImageRequest;
use App\Http\Requests\DoctorSpecialPriceRequest;
use App\Http\Requests\DoctorRequest;
use App\Models\Category;
use App\Models\ImageDoctor;
use App\Models\Tag;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::paginate(PAGINATION_COUNT);
        return view('Admin.doctors.index', compact('doctors'));
    }


    public function create()
    {
        // where('name','!=', null)->
        $categories = Category::get();
        $tags = Tag::get();
        // return $categories ;
        return view('Admin.doctors.create', compact('categories', 'tags'));
    }

    public function store(DoctorRequest $request)
    {
       // try {

            DB::beginTransaction();


            if (isset($request->is_active) && $request->is_active == 1)
                $request->request->add(['is_active' => 1]);
            else
                $request->request->add(['is_active' => 0]);

            $request->request->add(['slug' => \Str::slug($request->slug)]);

            // return $request->except('_token','type');
            $doctor =  Doctor::create($request->except('_token', 'avatar'));

            // Relations
            $doctor->tags()->attach($request->tags);


            $fileName = uploadImage('doctors', $request->avatar);
            $doctor->avatar = $fileName;
            $doctor->save();

            // return $Doctor;
            DB::commit();
            return redirect()->route('Doctors.edit', $doctor->id)->with(['success' => ' تم ألاضافة بنجاح يجب اضافه باقى الخصائص']);
     //   } catch (\Exception $ex) {
     //       DB::rollback();
      //      return redirect()->route('Doctors.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
      //  }
    }


    public function edit($id)
    {
        $doctor = Doctor::with('tags:id')->findOrFail($id);
        $categories = Category::get();
        $tags = Tag::get();

        //   return date_format($Doctors->special_price_start ,'Y-m-d') ;
        return view('Admin.doctors.edit', compact('categories', 'tags', "doctor"));
    }


    public function update(DoctorRequest $request, $id)
    {
        try {
           // return $request;
            DB::beginTransaction();
            $doctor = Doctor::find($id);
            if (isset($request->is_active) && $request->is_active == 1)
                $request->request->add(['is_active' => 1]);
            else
                $request->request->add(['is_active' => 0]);

            $request->request->add(['slug' => \Str::slug($request->slug)]);

            //  return $request->except('_token');
            $doctor->update($request->except('_token','avatar'));

            if ($request->has('avatar') && $request->avatar !=null) {

                $fileName = uploadImage('doctors', $request->photo);
                Doctor::where('id', $id)
                    ->update([
                        'avatar' => $fileName,
                    ]);
            }

            // Relations
            $doctor->tags()->sync($request->tags);

            DB::commit();
            return redirect()->route('Doctors.edit', $doctor->id)->with(['success' => 'تم التعديل بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('Doctors.edit', $doctor->id)->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function imageupdate(Request $request)
    {

        $file = $request->file('dzfile');
        $filename = uploadImage('doctorsclinic', $file);

        return response()->json([
            'name' => $filename,
            // 'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function imageupdateDB(DoctorImageRequest $request, $id)
    {

        try {
            $Doctor = Doctor::find($id);

            // save dropzone images
            if ($request->has('document') && count($request->document) > 0) {
                foreach ($request->document as $image) {
                    ImageDoctor::create([
                        'doctor_id' => $request->doctor_id,
                        'photo' => $image,
                    ]);
                }
            }

            return redirect()->route('Doctors.edit', $Doctor->id)->with(['success' => 'تم التعديل بنجاح']);
        } catch (\Exception $ex) {
        }
    }


    public function imagedeleteId(Request $request, $id)
    {

        $ImageDoctor = ImageDoctor::find($id);
        $photo = replaceurl($ImageDoctor->photo);
        if (File::exists($photo)) {
            File::delete($photo);
        }

        $ImageDoctor->delete();
        return redirect()->route('Doctors.edit', $ImageDoctor->doctor_id)->with(['success' => 'تم التعديل بنجاح']);
    }

    public function destroy($id)
    {
        $Doctor = Doctor::find($id);
        if (!$Doctor)
        return redirect()->route('Doctors.index')->with(['error' => 'هذا الماركة غير موجود ']);
        $ImageDoctors = ImageDoctor::where('doctor_id', $id)->get();
        foreach ($ImageDoctors as $ImageDoctor) {
            $photo = replaceurl($ImageDoctor->photo);
            if (File::exists($photo)) {
                File::delete($photo);
            }
            $ImageDoctor->delete();
        }

        $photo = replaceurl($Doctor->avatar);
        if (File::exists($photo)) {
            File::delete($photo);
        }
        $Doctor->delete();
        return redirect()->route('Doctors.index')->with(['success' => 'تم الحذف بنجاح']);
    }
}
