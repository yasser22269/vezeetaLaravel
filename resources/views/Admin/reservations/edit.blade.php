@extends('layouts.admin')
@section('title','reservation Edit')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/forms/selects/select2.min.css">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">reservation</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Admin</a>
            </li>
             <li class="breadcrumb-item"><a href="{{ route('reservation.index') }}">reservation</a>
            </li>
            <li class="breadcrumb-item active">reservation Edit
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>


      <div class="card">
          <div class="container">
            <form class="form" method="POST" action="{{ route('reservation.update',$reservation->id) }}">
                @csrf
                @method('put')

                <input type="hidden" name="bookAvailable"value='0'>

                <div class="form-body">
                  <h4 class="form-section">reservation Info</h4>
                  <input type="hidden"  name="id" value="{{ $reservation->id }}">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput1">schedule Date</label>
                        <input type="date" id="projectinput1" class="form-control" placeholder="scheduleDate" name="scheduleDate" value="{{ $reservation->doctor->scheduleDate }}">
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
                                          {{ $Doctor->id == $reservation->doctor->doctor_id ? 'selected':'' }}
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
                          <input type="time" id="projectinput1" class="form-control" placeholder="startTime" name="startTime" value="{{ $reservation->doctor->startTime }}">
                          @error('startTime')
                          <span class="text-danger"> {{$message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">End Time Date</label>
                          <input type="time" id="projectinput1" class="form-control" placeholder="EndTime" name="endTime" value="{{ $reservation->doctor->endTime }}">
                          @error('endTime')
                          <span class="text-danger"> {{$message}}</span>
                          @enderror
                        </div>
                      </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput2">patient Name</label>
                          <input type="text" id="projectinput1" class="form-control" placeholder="name" name="name" value="{{ $reservation->name }}">
                          @error('name')
                          <span class="text-danger"> {{$message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput2">patient phone</label>
                          <input type="text" id="projectinput1" class="form-control" placeholder="phone" name="phone" value="{{ $reservation->phone }}">
                          @error('phone')
                          <span class="text-danger"> {{$message}}</span>
                          @enderror
                        </div>
                      </div>

                  </div>

                  <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="projectinput2">price</label>
                          <input type="text" class="form-control" disabled  value="{{ $reservation->doctor->doctors->price }}">

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
         <h2> {{ $reservation->doctor->bookAvailable == 1 ? 'ليس محجوزا': "(محجوز)"}}</h2>

         @endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<script>
    $(document).ready(function() {
        $(".select2").select2();
        });
</script>
@endsection
