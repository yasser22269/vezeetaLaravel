@extends('layouts.admin')
@section('title','products  Edit')
@section('style')

<link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/forms/selects/select2.min.css">


   <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/'. getFolder() .'/plugins/file-uploaders/dropzone.css')}}">


@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">products </h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Admin</a>
            </li>
             <li class="breadcrumb-item"><a href="{{ route('Products.index') }}">products </a>
            </li>
            <li class="breadcrumb-item active">products  Edit
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="card-content">
    <div class="card-body">
      <ul class="nav nav-tabs nav-top-border no-hover-bg">
        <li class="nav-item">
          <a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#tab11" aria-expanded="true">General</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab12" href="#tab12" aria-expanded="false">Special Price</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="base-tab13" data-toggle="tab" aria-controls="tab13" href="#tab13" aria-expanded="false">Image</a>
        </li>

      </ul>
      <div class="tab-content px-1 pt-1">
        <div role="tabpanel" class="tab-pane active" id="tab11" aria-expanded="true" aria-labelledby="base-tab11">
            <form class="form" method="POST" action="{{ route('Products.update',$Products->id) }}">
                @csrf
                @method('put')
                <div class="form-body">
                  <h4 class="form-section">General Product Info</h4>
                  <input type="hidden"  name="id" value="{{ $Products->id }}">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput1">Slug</label>
                        <input type="text" id="projectinput1" class="form-control" placeholder="slug" name="slug" value="{{ $Products->slug }}">
                        @error('slug')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput2">Name:</label>
                          <input type="text" id="projectinput2" class="form-control" placeholder="Name" name="name" value="{{  $Products->name }}">
                        </div>
                          @error("name")
                          <span class="text-danger"> {{$message}}</span>
                          @enderror
                      </div>
                  </div>


                  <div class="row">



                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="projectinput2">description:</label>

                          <textarea  name="description" id="description"
                            class="form-control" rows="10"
                            placeholder=" description"
                                >{{  $Products->description }}</textarea>
                        </div>
                          @error("description")
                          <span class="text-danger"> {{$message}}</span>
                          @enderror
                      </div>



                  </div>
                  <div class="row">



                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="projectinput2">short description:</label>

                          <textarea  name="short_description" id="short_description"
                          class="form-control" rows="10"
                          placeholder="short description"
                              >{{  $Products->short_description }}</textarea>
                        </div>
                          @error("short_description")
                          <span class="text-danger"> {{$message}}</span>
                          @enderror
                      </div>



                  </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="projectinput1"> Price
                            </label>
                            <input type="number" id="price"
                                   class="form-control"
                                   placeholder="price"
                                   value="{{ $Products->price }}"
                                   name="price">
                            @error("price")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"> ???????? ??????????
                            </label>
                            <select name="categories[]" class="select2 form-control" multiple>
                                <optgroup label="???? ???????? ???????? ?????????? ">

                                    @if($categories && $categories -> count() > 0)
                                        @foreach($categories as $category)
                                            <option
                                            @foreach($Products->category as $Productcategory)
                                            {{ ($category->id == $Productcategory->id) ? "selected" : ''}}
                                             @endforeach
                                                value="{{$category->id }}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </optgroup>
                            </select>
                            @error('categories.0')
                            <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"> ???????? ???????????????? ????????????????
                            </label>
                            <select name="tags[]" class="select2 form-control" multiple>
                                <optgroup label=" ???????? ???????????????? ???????????????? ">

                                    @if($tags && $tags -> count() > 0)
                                        @foreach($tags as $tag)
                                            <option
                                            @foreach($Products->tags as $Producttags)
                                            {{ ($tag->id == $Producttags->id) ? "selected" : ''}}
                                            @endforeach

                                                value="{{$tag->id }}">{{$tag->name}}</option>
                                        @endforeach
                                    @endif
                                </optgroup>
                            </select>
                            @error('tags')
                            <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                    </div>

                </div>


                  <div class="row">
                    <div class="col-md-12">
                            <label for="switcheryColor4"
                                   class="card-title ">Status </label>
                            <input type="checkbox" value="1"
                                   name="is_active"
                                    {{ $Products ->is_active == 1 ? 'checked': ""}}
                                   id="switcheryColor4"
                                   class="switchery" data-color="success"
                                   />

                            @error("is_active")
                            <span class="text-danger">{{$message }}</span>
                            @enderror
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
        <div class="tab-pane" id="tab12" aria-labelledby="base-tab12">
            <form class="form" method="POST" action="{{ route('Products.Priceupdate',$Products->id) }}">
                @csrf
                @method('put')
                <div class="form-body">
                  <h4 class="form-section">Price Product Info</h4>
                  <input type="hidden"  name="product_id" value="{{ $Products->id }}">

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"> ??????  ????????????
                            </label>
                            <input type="number" id="price"
                                   class="form-control"
                                   placeholder="  "
                                   value="{{ $Products->price }}"
                                   name="price" disabled>
                            @error("price")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                {{-- <hr> --}}
                <h1 class="form-section"> ?????? ??????</h1>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"> ?????? ??????
                            </label>
                            <input type="number"
                                   class="form-control"
                                   value="{{ $offer->special_price  ?? old('special_price') }}"
                                   name="special_price">
                            @error("special_price")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1">?????? ??????????
                            </label>
                            <select name="special_price_type" class=" form-control" >
                                <optgroup label="???? ???????? ???????? ?????????? ">
                                    <option></option>
                                    <option value="percent" {{ $offer->special_price_type =="percent" ? "Selected" : '' }}>precent</option>
                                    <option value="fixed"  {{ $offer->special_price_type =="fixed" ? "Selected" : '' }}>fixed</option>
                                </optgroup>
                            </select>
                            @error('special_price_type')
                            <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                    </div> --}}


                </div>


                <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"> ?????????? ??????????????
                            </label>

                            <input type="date"
                                   class="form-control"
                                   value="{{ $offer->special_price_start ??
                                   $offer->special_price_start  }}"
                                   name="special_price_start"
                                   >
                           {{-- {{ $offer->special_price_start ?? date_format($offer->special_price_start ,'Y-m-d') }} --}}
                            @error('special_price_start')
                            <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"> ?????????? ??????????????
                            </label>
                            <input type="date"
                                   class="form-control"
                                   value="{{ $offer->special_price_end ??
                                    $offer->special_price_end }}"
                                   name="special_price_end">
                                   {{-- {{ $offer->special_price_end ??
                                    date_format($offer->special_price_end ,'Y-m-d' )  }} --}}
                            @error('special_price_end')
                            <span class="text-danger"> {{$message}}</span>
                            @enderror
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
        <div class="tab-pane" id="tab13" aria-labelledby="base-tab13">
            <form
            action="{{route('Products.imageupdate.db',$Products->id)}}"
            method="POST" enctype="multipart/form-data" >
          @csrf
{{-- class="form" --}}
          <input type="hidden" name="product_id" value="{{$Products->id}}">


                        <h4 class="form-section"><i class="ft-image"></i> ?????????? ??????????   </h4>


                            <div class="form-body">

                                <div class="form-group form">
                                    <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                        <div class="dz-message" style="position: sticky;">?????????? ?????? ???????? ???? ???????? ??????</div>
                                    </div>
                                    <br><br>
                                </div>


                            </div>



                    <div class="form-actions">

                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> ??????????
                        </button>
                    </div>
        </form>







        <div class="row">
            @foreach ($Products->Images as  $Product)
            <div class="col-md-3" style="margin-bottom: 20px">

            <form action="{{route('admin.products.imagedeleteId',$Product->id)}}"
            method="POST" enctype="multipart/form-data" >
              @csrf

          <input type="hidden" name="id" value="{{$Product->id}}">
{{-- asset('images/products/'.$Product->photo )  --}}
                    <img src="{{ $Product->photo}}" alt="" width="150px" style="border-style: dashed;" >

                    <input type="hidden" name="photo" value="{{ $Product->photo }}">

                <button type="submit" class="btn btn-danger" style="width: 150px;">
                   ??????
                </button>
            </form>
           </div>
            @endforeach

        </div>


        </div>


      </div>
    </div>
  </div>


      {{-- <div class="card">
          <div class="container">
            </div>
         </div> --}}


         @endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="{{asset('/')}}app-assets/js/scripts/navs/navs.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $(".select2").select2();
        });
</script>
{{-- stock --}}
<script>
    $(document).on('change','#manageStock',function(){
       if($(this).val() == 1 ){
            $('#qtyDiv').show();
       }else{
           $('#qtyDiv').hide();
       }
    });
</script>

{{-- image --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.js"defer></script> --}}
<script src="{{asset('/')}}app-assets/js/scripts/extensions/dropzone.js" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/extensions/dropzone.min.js')}}" type="text/javascript"></script>
<script>
    var uploadedDocumentMap = {}
   Dropzone.options.dpzMultipleFiles = {
       paramName: "dzfile", // The name that will be used to transfer the file
       //autoProcessQueue: false,
       maxFilesize: 5, // MB
       clickable: true,
       addRemoveLinks: true,
       acceptedFiles: 'image/*',
       dictFallbackMessage: " ?????????????? ?????????? ?????? ???? ???????? ?????????? ???????? ???????????? ???????????? ???????????????? ",
       dictInvalidFileType: "?????????????? ?????? ?????? ?????????? ???? ?????????????? ",
       dictCancelUpload: "?????????? ?????????? ",
       dictCancelUploadConfirmation: " ???? ?????? ?????????? ???? ?????????? ?????? ?????????????? ?? ",
       dictRemoveFile: "?????? ????????????",
       dictMaxFilesExceeded: "?????????????? ?????? ?????? ???????? ???? ?????? ",
       headers: {
           'X-CSRF-TOKEN':
               "{{ csrf_token() }}"
       }

       ,
       url: "{{ route('Products.imageupdate') }}", // Set the url
       success:
           function (file, response) {
               $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
               uploadedDocumentMap[file.name] = response.name
           }
       ,
       removedfile: function (file) {
        file.previewElement.remove();
        var name = '';
        if (typeof file.file_name !== 'undefined') {
            name = file.file_name;
        } else {
            name = uploadedDocumentMap[file.name];
        }
        $('form').find('input[name="document[]"][value="' + name + '"]').remove();
        // Add this code in removedfile dropzone
        $.ajax({
            type: 'POST',
            url: '{{ route('admin.products.images.delete') }}',
            data: {
                fileName: name
            },
            dataType: 'html',
            headers: {
                'X-CSRF-TOKEN':
                    "{{ csrf_token() }}"
            },
            success: function(data){
                var rep = JSON.parse(data);
            }
        });
    },
       // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
       init: function () {

               @if(isset($event) && $event->document)
           var files =
           {!! json_encode($event->document) !!}
               for (var i in files) {
               var file = files[i]
               this.options.addedfile.call(this, file)
               file.previewElement.classList.add('dz-complete')
               $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
           }
           @endif
       }
   }


</script>

@endsection
