@extends('layouts.admin')
@section('title','DoctorSchedules index')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}app-assets/vendors/css/tables/extensions/autoFill.dataTables.min.css">
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">DoctorSchedules create</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Admin</a>
            </li>
            {{--  <li class="breadcrumb-item"><a href="#">Tables</a>
            </li>  --}}
            <li class="breadcrumb-item active">Doctor Schedules index
            </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" >
        <a href="{{ route('DoctorSchedule.create') }}">
            <button class="btn btn-info round  box-shadow-2 px-2"type="button" > Add DoctorSchedule</button>
        </a>

      </div>
    </div>
  </div>




<div class="card-content collapse show">
    <div class="card-body card-dashboard">
        <table
            class="table display nowrap table-striped table-bordered scroll-horizontal">
            <thead class="bg-success white">
                <tr>
                    <th> id</th>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>start Time</th>
                    <th>End Time</th>
                    <th>bookAvailable</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($DoctorSchedules as $index => $DoctorSchedule)


                  <tr>
                    <td>{{ ($index++)+1 }}</td>
                    <td>{{ $DoctorSchedule->doctors->name }}</td>
                    <td>
                        {{  $DoctorSchedule->scheduleDate}}
                      </td>
                    <td>{{ $DoctorSchedule->startTime  }}</td>
                    <td>{{ $DoctorSchedule->endTime  }}</td>
                    <td>{{ $DoctorSchedule->getBookAvailable() }}</td>
                    <td>
                    <a href="{{ route('DoctorSchedule.edit',$DoctorSchedule->id) }}">
                          <button class="btn btn-info btn-sm round  box-shadow-2 px-1"type="button" > <i class="la la-edit la-sm"></i> Edit </button>
                     </a>
                    </td>
                    <td>

                       <form class="form" method="POST" action="{{ route('DoctorSchedule.destroy',$DoctorSchedule->id) }}">
                        @csrf
                        @method('DELETE')

                            <button class="btn btn-danger btn-sm  round  box-shadow-2 px-1"type="submit" ><i class="la la-remove la-sm"></i> DELETE </button>

                        </form>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
        </table>
        <div class="justify-content-center d-flex">

        </div>
    </div>
</div>
@endsection

@section('js')
<!-- BEGIN VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"
        type="text/javascript"></script>


@endsection

