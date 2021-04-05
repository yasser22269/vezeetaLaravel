@extends('layouts.app')
@section('title','doctors')

@section('content')

  <section class="section doctors">
    <div class="container">
          <div class="row justify-content-center">
               <div class="col-lg-6 text-center">
                  <div class="section-title">
                      <h2>Doctors</h2>
                      <div class="divider mx-auto my-4"></div>
                      <p>نحن نقدم مجموعة واسعة من حسومات الخدمات الإبداعية.</p>
                  </div>
              </div>
          </div>

        @if (count($doctors) > 0)

          {{-- position: relative; overflow: hidden; height: 1113px; transition: height 250ms cubic-bezier(0.4, 0, 0.2, 1) 0s; --}}
      <div class="row shuffle-wrapper portfolio-gallery shuffle" style="">
        {{-- style="position: absolute; top: 0px; left: 0px; visibility: visible; will-change: transform; opacity: 1; transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;" --}}

        @foreach ($doctors as $doctor)

            <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item shuffle-item--visible">
                <div class="position-relative doctor-inner-box">
                  <div class="doctor-profile">
                     <div class="doctor-img">
                             <img src="{{ $doctor->avatar }}" alt="doctor-image" class="img-fluid w-100">
                     </div>
                  </div>
                  <div class="content mt-3">
                      <h4 class="mb-0"><a href="{{ route('site.doctor.show', $doctor->slug) }}">{{ $doctor->name }}</a></h4>
                      <p>{{ $doctor->short_description }}</p>
                      <hr>

                      <a href="{{ route('site.doctor.show', $doctor->slug) }}" class="btn btn-main-2 btn-round-full">التفاصيل</a>
                  </div>
                </div>
            </div>

        @endforeach


      </div>

      @else

      <button type="text" class="btn btn-lg btn-block "
              id="type-error">لا يوجد دكاترة متاحه بهذا القسم حاليا
      </button>
     @endif
    </div>
</section>


@endsection

