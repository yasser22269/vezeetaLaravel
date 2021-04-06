@extends('layouts.app')
@section('title','Home')

@section('content')


<!-- Slider Start -->
<section class="banner" style='background:url("{{$SliderImage->photo}}") no-repeat;background-size:cover'>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block" style="">
					<div class="divider mb-3"></div>
					{{-- <span class="text-uppercase text-sm letter-spacing ">Total Health care solution</span> --}}
					<h1 class="mb-3 mt-3">{{$SliderImage->title}}</h1>

					{{-- <p class="mb-4 pr-5">احجز أونلاين أو كلم 01468486484</p> --}}
					<div class="btn-container ">
						<a href="{{ route('appoinment') }}" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">احجز أونلاين من هنا أو كلم 01468486484 <i class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-surgeon-alt"></i>
						</div>
						<span>خدمة 24 ساعة

                            احصل على دعم الوقت للطوارئ. لقد أدخلنا مبدأ طب الأسرة.</span>
						<h4 class="mb-3">حجز موعد عبر الإنترنت</h4>
						<p class="mb-4">احصل على دعم الوقت للطوارئ. لقد أدخلنا مبدأ طب الأسرة.</p>
						<a href="{{ route('appoinment') }}" class="btn btn-main btn-round-full">إحجز موعد</a>
					</div>

					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-ui-clock"></i>
						</div>
						<span>الجدول الزمني</span>
						<h4 class="mb-3"> ساعات العمل</h4>
						<ul class="w-hours list-unstyled">
		                    <li class="d-flex justify-content-between">السبت - التلات : <span>8:00 - 17:00</span></li>
                            <li class="d-flex justify-content-between">التلات - الخميس : <span>8:00 - 17:00</span></li>
		                    <li class="d-flex justify-content-between">الجمعة : <span>8:00 - 17:00</span></li>
		                </ul>
					</div>

					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-support"></i>
						</div>
						<span>حالات الطوارئ</span>
						<h4 class="mb-3">{{$setting->phone}}</h4>
						<p>احصل على دعم ALl في حالات الطوارئ ، لقد أدخلنا مبدأ طب الأسرة ، تواصل معنا في أي حالة طارئة.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>





<section class="section about">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4 col-sm-6">
				<div class="about-img">
					<img src="{{asset('/front/')}}/images/about/img-1.jpg" alt="" class="img-fluid">
					<img src="{{asset('/front/')}}/images/about/img-2.jpg" alt="" class="img-fluid mt-4">
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="about-img mt-4 mt-lg-0">
					<img src="{{asset('/front/')}}/images/about/img-3.jpg" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="about-content pl-4 mt-4 mt-lg-0">
					<h2 class="title-color">رعاية شخصية
                        <br>&  وحياة صحية</h2>
					<p class="mt-4 mb-5">نحن نقدم أفضل الخدمات الطبية الرائدة التي لا تحمل المسؤوليات التي تأتي مع الآلام ، وآلام الثناء أو العمى.</p>

					<a href="{{ route('categoriesHome') }}" class="btn btn-main-2 btn-round-full btn-icon">الخدمات<i class="icofont-simple-right ml-3"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="cta-section ">
	<div class="container">
		<div class="cta position-relative">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-doctor"></i>
						<span class="h3">58</span>k
						<p>الناس السعداء</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-flag"></i>
						<span class="h3">700</span>+
						<p>اكتملت الجراحة</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-badge"></i>
						<span class="h3">40</span>+
						<p>أطباء خبراء</p>
					</div>
				</div>
				{{-- <div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-globe"></i>
						<span class="h3">20</span>
						<p>Worldwide Branch</p>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
</section>
{{-- <section class="section service gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2>Award winning patient care</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-laboratory text-lg"></i>
						<h4 class="mt-3 mb-3">Laboratory services</h4>
					</div>

					<div class="content">
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-heart-beat-alt text-lg"></i>
						<h4 class="mt-3 mb-3">Heart Disease</h4>
					</div>
					<div class="content">
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-tooth text-lg"></i>
						<h4 class="mt-3 mb-3">Dental Care</h4>
					</div>
					<div class="content">
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</div>


			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-crutch text-lg"></i>
						<h4 class="mt-3 mb-3">Body Surgery</h4>
					</div>

					<div class="content">
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-brain-alt text-lg"></i>
						<h4 class="mt-3 mb-3">Neurology Sargery</h4>
					</div>
					<div class="content">
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-dna-alt-1 text-lg"></i>
						<h4 class="mt-3 mb-3">Gynecology</h4>
					</div>
					<div class="content">
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}
<section class="section appoinment">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 ">
				<div class="appoinment-content">
					<img src="{{asset('/front/')}}/images/about/img-3.jpg" alt="" class="img-fluid">
					<div class="emergency">
						<h2 class="text-lg"><i class="icofont-phone-circle text-lg"></i>
                            {{ $setting->phone }}
                        </h2>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-10 ">
				<div class="appoinment-wrap mt-5 mt-lg-0">
					<h2 class="mb-2 title-color"> ابحث عن موعد للحجز </h2>
					<p class="mb-4">دعا الصمود لحسن الحظ مقبول ولكن عندما يريد أن يصبح أسوأ. هذا واحد من الأحزان ، وفي مثل الحاضر تفكك.</p>
					     <form  class="appoinment-form" method="get" action="{{ route('search.doctors') }}">
                            @csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="id">
                                    @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name  }}</option>
                                  @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                    <input class="btn btn-main btn-round-full" name="submit" type="submit" value="ابحث عن حجز ">

                </form>
            </div>
			</div>
		</div>
	</div>
</section>
{{-- <section class="section appoinment">
		<div class="row align-items-center">
			<div class="col-lg-12">
                <img src="{{asset('/front/')}}/images/photo1.jpeg" alt="">
            </div>
        </div>
</section> --}}

<section class="section testimonial-2 gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>لقد خدمنا أكثر من 5000 مريض</h2>
					<div class="divider mx-auto my-4"></div>
					<p>دعنا نعرف أن المزيد من احتياجات المستهلك ورغباته أسوأ حتى نتمكن من مواجهة مشاكلنا. بينما مزيد من التحقيقات.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 testimonial-wrap-2">
			@foreach ($feedbacks as $feedback)
				
				<div class="testimonial-block style-2  gray-bg">
					<i class="icofont-quote-right"></i>

					<div class="testimonial-thumb">
						<img src="{{ $feedback->doctor->avatar }}" alt="" class="img-fluid">
					</div>

					<div class="client-info ">
						<h4>{{ $feedback->doctor->name }}</h4>
						<span>   {{ $feedback->name }} :  المريض</span>
						<p>
							{{ $feedback->comment }}
						</p>
					</div>
				</div>
			@endforeach

				
			</div>
		</div>
	</div>
</section>
{{-- <section class="section clients">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>Partners who support us</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row clients-logo">
			<div class="col-lg-2">
				<div class="client-thumb">
					<img src="{{asset('/front/')}}/images/about/1.png" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-2">
				<div class="client-thumb">
					<img src="{{asset('/front/')}}/images/about/2.png" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-2">
				<div class="client-thumb">
					<img src="{{asset('/front/')}}/images/about/3.png" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-2">
				<div class="client-thumb">
					<img src="{{asset('/front/')}}/images/about/4.png" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-2">
				<div class="client-thumb">
					<img src="{{asset('/front/')}}/images/about/5.png" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-2">
				<div class="client-thumb">
					<img src="{{asset('/front/')}}/images/about/6.png" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-2">
				<div class="client-thumb">
					<img src="{{asset('/front/')}}/images/about/3.png" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-2">
				<div class="client-thumb">
					<img src="{{asset('/front/')}}/images/about/4.png" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-2">
				<div class="client-thumb">
					<img src="{{asset('/front/')}}/images/about/5.png" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-2">
				<div class="client-thumb">
					<img src="{{asset('/front/')}}/images/about/6.png" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</section> --}}


@endsection
