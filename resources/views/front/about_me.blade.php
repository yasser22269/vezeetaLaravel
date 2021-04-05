@extends('layouts.app')
@section('title','about_me')

@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">من نحن</span>
            <h1 class="text-capitalize mb-5 text-lg">من نحن</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
<section class="section about-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h2 class="title-color">العناية الشخصية لحياتك الصحية</h2>
			</div>
			<div class="col-lg-8">
				<p>{{ $setting->about_me }}</p>
			</div>
		</div>
	</div>
</section>
@endsection
