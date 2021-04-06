@extends('layouts.admin')
@section('title','DoctorSchedule Edit')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/forms/selects/select2.min.css">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">DoctorSchedule</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Admin</a>
            </li>
             <li class="breadcrumb-item"><a href="{{ route('DoctorSchedule.index') }}">DoctorSchedule</a>
            </li>
            <li class="breadcrumb-item active">DoctorSchedule Edit
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>


      <div class="card">
          <div class="container">
            <form class="form" method="POST" action="{{ route('DoctorSchedule.update',$DoctorSchedule->id) }}">
                @csrf
                @method('put')
                <div class="form-body">
                  <h4 class="form-section">DoctorSchedule Info</h4>
                  <input type="hidden"  name="id" value="{{ $DoctorSchedule->id }}">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput1">schedule Date</label>
                        <input type="date" id="projectinput1" class="form-control" placeholder="scheduleDate" name="scheduleDate" value="{{ $DoctorSchedule->scheduleDate }}">
                        @error('scheduleDate')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput2">doctor Name</label>
                          <select name="doctor_id" class="form-control" >
                              <optgroup label="من فضلك أختر الدكتور او اكثر من واحد ">

                                  @if($Doctors && $Doctors -> count() > 0)
                                      @foreach($Doctors as $Doctor)
                                          <option
                                          {{ $Doctor->id == $DoctorSchedule->doctor_id ? 'selected':'' }}
                                              value="{{$Doctor->id }}">{{$Doctor->name}}</option>
                                      @endforeach
                                  @endif
                              </optgroup>
                          </select>
                          @error('doctor_id')
                          <span class="text-danger"> {{$message}}</span>
                          @enderror
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">start Time Date</label>
                          <input type="time" id="projectinput1" class="form-control" placeholder="startTime" name="startTime" value="{{ $DoctorSchedule->startTime }}">
                          @error('startTime')
                          <span class="text-danger"> {{$message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">End Time Date</label>
                          <input type="time" id="projectinput1" class="form-control" placeholder="EndTime" name="endTime" value="{{ $DoctorSchedule->endTime }}">
                          @error('endTime')
                          <span class="text-danger"> {{$message}}</span>
                          @enderror
                        </div>
                      </div>
                </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="hidden" style="display: none">
                            <label for="switcheryColor4"
                                   class="card-title ">Status </label>
                            <input type="checkbox" value="1"
                                   name="bookAvailable"
                                    {{ $DoctorSchedule->bookAvailable == 1 ? 'checked': ""}}
                                   id="switcheryColor4"
                                   class="switchery" data-color="success"
                                   />
                            @error("bookAvailable")
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                         </div>

                        </div>


                  </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Save
                  </button>
                </div>
              </form>

          </div>
         </div>
         <h2> {{ $DoctorSchedule->bookAvailable == 1 ? 'ليس محجوزا': "(محجوز)"}}</h2>

         @endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<script>
    $(document).ready(function() {
        $(".select2").select2();
        });
</script>
@endsection
