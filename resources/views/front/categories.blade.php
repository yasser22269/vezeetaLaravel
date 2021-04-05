@extends('layouts.app')
@section('title','categories')

@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <h1 class="text-capitalize mb-5 text-lg">الاقسام</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section department-single">
	<div class="container">

		<div class="row">
			<div class="col-lg-4">
            </div>

			<div class="col-lg-8">
				<div class="department-content mt-5">

					<h3 class="mt-5 mb-4">(اضغط على اى قسم وقم باختيار الدكتور المناسب)الاقسام</h3>
					<ul class="list-unstyled department-service">
                        @foreach ($categories as $category)
					    <a href="{{ route('search.doctors',$category->id) }}"><li style="font-size: 20px;">{{ $category->name }} <i class="icofont-check mr-2"></i></li></a>

                        @endforeach

					</ul>
				</div>
			</div>

		</div>
	</div>
</section>
@endsection
