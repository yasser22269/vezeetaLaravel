@extends('layouts.app')
@section('title','appointment')

@section('content')




<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <h1 class="text-capitalize mb-5 text-lg">تاكيد الحجز</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- contact form start -->

<section class="contact-form-wrap section">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form id="contact-form" method="POST" action="{{ route('appoinmentupdate',$id) }}" >
                        @csrf

                    <div class="row">
                        <div class="col-md-6 col-12 mb-25">
                            <div class="form-group">

                            <label for="first_name">الاسم</label>
                            <input type="text" class="form-control"name="name" value="{{ $user->name ?? old('name') }}"  autocomplete="Name" autofocus required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                     </div>

                     <div class="col-md-6 col-12 mb-25">
                        <div class="form-group">

                        <label for="phone">رقم الموبايل</label>
                        <input type="tel" class="form-control"name="phone" value="{{ $user->phone ?? old('phone') }}"  autocomplete="phone" autofocus required>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                         </div>
                     </div>
                     <div class="col-md-6 col-12 mb-25">
                        <div class="form-group">

                        </div>
                    </div>

                     <div class="col-md-6 col-12 mb-25">
                        <div class="form-group">

                        <label for="email">الايميل</label>
                        <input type="email" class="form-control"name="email" value="{{ $user->email ?? old('email') }}"  autocomplete="email" autofocus required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                         </div>
                     </div>

                    </div>
                    <input type="hidden" name="doctor_id"value="{{ $id }}">
                    @error('doctor_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    <h2> {{$DoctorSchedule->scheduleDate }} : المعاد </h2>
                    <h2> {{ date('h:i a', strtotime($DoctorSchedule->startTime))  }} : الساعه </h2>
                    <div class="text-center">
                        <input class="btn btn-main btn-round-full" type="submit" value="حجز المعاد "></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection
