@extends('layouts.admin')
@section('title','Slider Images Create')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">Slider Images</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Admin</a>
            </li>
             <li class="breadcrumb-item"><a href="{{ route('Slider.index') }}">Slider Images</a>
            </li>
            <li class="breadcrumb-item active">Slider Create
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>


      <div class="card">
          <div class="container">
            <form class="form" method="POST" action="{{ route('Slider.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                  <h4 class="form-section">Slider Info</h4>


                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput2">Photo</label>
                          <input type="file" id="projectinput2" class="form-control" placeholder="Photo" name="photo">
                          @error('photo')
                          <span class="text-danger"> {{$message}}</span>
                          @enderror
                        </div>
                      </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput2">title</label>
                        <input type="text" id="projectinput2" class="form-control" placeholder="title" name="title">
                        @error('title')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>


                    {{-- <div class="col-md-12">
                        <div class="form-group">
                            <label for="projectinput1"> ???????? ??????????
                            </label>
                            <select name="category_id" class=" form-control" >
                                    @if($categories && $categories -> count() > 0)

                                                value="{{$category->id }}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </optgroup>
                            </select>
                            @error('categories.0')
                            <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                    </div> --}}
                  </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Save
                  </button>
                </div>
              </form>

          </div>
         </div>


         @endsection

@section('js')

@endsection
