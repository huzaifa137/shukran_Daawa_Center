@extends('layouts.header_footer_navbar')
@section('content')
    @include('include.message')

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            @if (Session::get('success'))
                <div class="alert alert-primary">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Islamic Series and Episodes</h4>
                    </div>

                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Series</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Islamic Series</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">

                        <div class="card-body">
                            <form id="myForm" action="{{ route('update-serie-data') }}" method="POST"
                                enctype="multipart/form-data" onsubmit="disableButton()">
                                @csrf
                                <div class="row">

                                    <input type="hidden" name="record_id" value="{{$serieRecord->id}}">

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Edit Serie </label>
                                            <input type="text" name="serie_name" class="form-control" placeholder="Enter the name of the serie being created"
                                                value="{{ $serieRecord->serieName }}" required>
                                            <span style="color: red"> @error('serie_name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Please confirm you want to create a new serie !')">Submit</button>
                                        <button type="reset" class="btn btn-light">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function disableButton()
        {
            document.getElementById('myForm').submit();
            document.querySelector('button[type="submit"]').disabled = true;
        }
    
    </script>

@endsection
