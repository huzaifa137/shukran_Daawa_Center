@extends('layouts.header_footer_navbar')
@section('content')
@include('include.message')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
    @if (Session::get('success'))
        <div class="alert alert-primary">
            {{Session::get('success')}}
        </div>
    @endif
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Edit Sheikh</h4>
                </div>

            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Audio</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Sheikh Info</a></li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Basic Info</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update-sheikh-info')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <input type="hidden" name="record_id" value="{{$info->id}}">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="First_name" class="form-control" value="{{$info->Firstname}}" placeholder="Enter Firstname" required>
                                        <span style="color: red"> @error('First_name'){{$message}} @enderror</span>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="full_name" class="form-control" value="{{$info->Fullname}}" placeholder="Enter Fullname " required>
                                        <span style="color: red"> @error('full_name'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">Update Information</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection