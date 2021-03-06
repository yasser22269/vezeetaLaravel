@extends('layouts.app')
@section('title','Contact Us')

@section('content')


















<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">تواصل معنا</span>
          <h1 class="text-capitalize mb-5 text-lg">ابقى على تواصل</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Contact Us</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- contact form start -->

<section class="section contact-info pb-0">
    <div class="container">
         <div class="row">
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-live-support"></i>
                    <h5>Call Us</h5>
                     {{$setting->phone}}
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-support-faq"></i>
                    <h5>Email Us</h5>
                    {{$setting->email}}

                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-location-pin"></i>
                    <h5>Location</h5>
                    {{$setting->address}}

                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-form-wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="text-md mb-2">Contact us</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p class="mb-5">Laboriosam exercitationem molestias beatae eos pariatur, similique, excepturi mollitia sit perferendis maiores ratione aliquam?</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form id="contact-form" method="POST" action="{{ route('UpdatepContacts') }}" >
                        @csrf

                    <div class="row">
                        <div class="col-md-6 col-12 mb-25">
                            <div class="form-group">

                            <label for="first_name">الاسم</label>
                            <input type="text" class="form-control"name="Name" value="{{ $user->name ?? old('Name') }}"  autocomplete="Name" autofocus required>
                            @error('Name')
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

                    <div class="form-group-2 mb-4">
                        <textarea  id="message" name="massage" class="form-control" rows="8" placeholder="Your Message">{{old('massage')  }}</textarea>

                        @error('massage')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                    <div class="text-center">
                        <input class="btn btn-main btn-round-full" name="submit" type="submit" value="Send Messege"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection
