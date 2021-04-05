@extends('layouts.app')
@section('title','doctor')
@section('style')

@endsection
@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">Doctor details</span>
            <h1 class="text-capitalize mb-5 text-lg">{{ $doctor->name }}</h1>

          </div>
        </div>
      </div>
    </div>
  </section>
{{--  --}}
<section class="section blog-wrap">
    <div class="container">
        <div class="row">

            <div class="col-lg-4">
                <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">


	<div class="sidebar-widget schedule-widget mb-3">
		<h5 class="mb-4">الكشف من هنا</h5>
        <div class="sidebar-widget tags mb-3">
            <h5 class="mb-4">اليوم</h5>
            @if ($DoctorScheduleDAy->count() > 0)

            <div class="dates" style="overflow-y: scroll;width: 100%;height: 147px;">
            @foreach ($DoctorScheduleDAy as $Day)
            <a href="#">{{ date('h:i a', strtotime($Day->startTime))  }}</a>
            @endforeach
          </div>
             @else
             تم حجز جميع مواعيد
            @endif
        </div>

        <div class="sidebar-widget tags mb-3">
            <h5 class="mb-4">غدا</h5>
            @if ($DoctorScheduleTomorrow->count() > 0)
            <div class="dates" style="overflow-y: scroll;width: 100%;height: 147px;">
            @foreach ($DoctorScheduleTomorrow as $Tomorrow)
            <a href="#">{{ date('h:i a', strtotime($Tomorrow->startTime))  }}</a>
            @endforeach
             </div>
        @else
        تم حجز جميع مواعيد
        @endif

        </div>
		{{-- <ul class="list-unstyled">
		  <li class="d-flex justify-content-between align-items-center">
		    <a href="#">Monday - Friday</a>
		    <span>9:00 - 17:00</span>
		  </li>
		  <li class="d-flex justify-content-between align-items-center">
		    <a href="#">Saturday</a>
		    <span>9:00 - 16:00</span>
		  </li>
		  <li class="d-flex justify-content-between align-items-center">
		    <a href="#">Sunday</a>
		    <span>Closed</span>
		  </li>
		</ul> --}}

	</div>
	<div class="sidebar-widget latest-post mb-3">
		<h5>تفاصيل اكثر</h5>

        <div class="py-2">
        	<span class="text-sm text-muted">(بالجنية المصرى) سعر الكشف</span>
            <h6 class="my-2">  {{ round($doctor->price) }} </h6>
        </div>

        <div class="py-2">
       		<span class="text-sm text-muted">القسم</span>
            <h6 class="my-2">{{  $doctor->category->name }}</h6>
        </div>
	</div>


	<div class="sidebar-widget tags mb-3">
		<h5 class="mb-4">تاجات</h5>
        @foreach ($doctor->tags as $tag)

		<a href="#">{{ $tag->name }}</a>
        @endforeach

	</div>
    @if ($doctor->Images->count() >0)

    <div class="sidebar-widget tags mb-3">
		<h5 class="mb-4">صور للعياده</h5>

        @foreach ($doctor->Images as $Image)
         <img class="Imagedoctor"src="{{ $Image->photo }}" alt="" class="img-fluid" style="    width: 150px;">
        @endforeach

	</div>

    @endif


</div>
            </div>


            <div class="col-lg-8">
                <div class="row">
    	<div class="col-lg-12 mb-5">
		<div class="single-blog-item">
			<img src="{{ $doctor->avatar }}" alt="" class="img-fluid" style="border-radius: 50%;">

			<div class="blog-item-content mt-5">
				<div class="blog-item-meta mb-3" style="margin-right: -26px;">
                    <span class="text-muted text-capitalize mr-3"><i class="icofont-eye mr-2"></i>{{ $doctor->viewed }} Viewed</span>
					<span class="text-muted text-capitalize mr-3"><i class="icofont-comment mr-2"></i>{{ $doctor->comments->count() }} Comments</span>
                    <span class="text-muted text-capitalize mr-3">{{ $doctor->address }}<i class="icofont-location-pin mr-2"></i></span>
				</div>

				<h2 class="mb-4 text-md">{{ $doctor->name }}</h2>

				<p class="lead mb-4">{{ $doctor->short_description }}</p>

				<p>{{ $doctor->description }}</p>





				{{-- <div class="mt-5 clearfix">
				    <ul class="float-left list-inline tag-option">
				    	<li class="list-inline-item"><a href="#">Advancher</a></li>
				    	<li class="list-inline-item"><a href="#">Landscape</a></li>
				    	<li class="list-inline-item"><a href="#">Travel</a></li>
				   	</ul>

				    <ul class="float-right list-inline">
				        <li class="list-inline-item"> Share: </li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="icofont-facebook" aria-hidden="true"></i></a></li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="icofont-twitter" aria-hidden="true"></i></a></li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="icofont-pinterest" aria-hidden="true"></i></a></li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="icofont-linkedin" aria-hidden="true"></i></a></li>
				    </ul>
			    </div> --}}
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="comment-area mt-4 mb-5">
			<h4 class="mb-4">({{ $doctor->comments->count() }} )تعليق </h4>
			<ul class="comment-tree list-unstyled">

                @foreach ($doctor->comments as $comment)

				<li>
                    <div class="comment-area-box">

						<div class="comment-info">
							<h5 class="mb-1">{{ $comment->name }}</h5>
							<span>{{ $comment->email }}</span>  |
							<span class="date-comm">{{ $comment->created_at }}</span>
						</div>

						<div class="comment-content mt-3">
							<p>{{ $comment->comment }}</p>
						</div>
					</div>

				</li>
                @endforeach

			</ul>
		</div>
	</div>


	<div class="col-lg-12">
		<form class="comment-form my-5" id="comment-form" action="{{ route('Feedback') }}" method="POST">
            @csrf
            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
			<h4 class="mb-4">اكتب تعليقا</h4>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" id="name" placeholder="Name:"name='name' type="text">
                        @error('name')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" id="mail" placeholder="Email:" name='email' type="email">
                        @error('email')
                        <sppan class="text-danger"> {{$message}}</span>
                        @enderror

					</div>
				</div>
			</div>


			<textarea class="form-control mb-4" name="comment" id="comment" cols="30" rows="5" placeholder="Comment"></textarea>
            @error('comment')
            <span class="text-danger"> {{$message}}</span>
            @enderror

			<input class="btn btn-main-2 btn-round-full" type="submit"  id="submit_contact" value="Submit Message">
		</form>
	</div>
</div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
</script>
@endsection
