@extends('layouts.app')
@section('title','search doctors')

@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <h1 class="text-capitalize mb-5 text-lg">ابحث عن دكتورك</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section department-single">
	<div class="container">

		<div class="row">
			<div class="col-lg-12 col-md-10 ">
				<div class="appoinment-wrap mt-5 mt-lg-0">
					<h2 class="mb-2 title-color"> ابحث عن موعد للحجز </h2>
					<p class="mb-4">دعا الصمود لحسن الحظ مقبول ولكن عندما يريد أن يصبح أسوأ. هذا واحد من الأحزان ، وفي مثل الحاضر تفكك.</p>
					     <form  class="appoinment-form" method="get" action="{{ route('search.doctors') }}">
                            {{-- @csrf --}}

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

                    <input class="btn btn-main btn-round-full"  type="submit" value="ابحث عن حجز ">

                </form>
            </div>
		</div>
	</div>
</section>
@endsection
