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
                        <h4>Upload Audio</h4>
                    </div>

                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Audio</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Upload Audio</a></li>
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
                            <form id="myForm" action="{{ route('Audio-Upload') }}" method="POST"
                                enctype="multipart/form-data" onsubmit="disableButton()">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Full Name</label>
                                            <select class="form-control" name="sheikh_name" id="sheikh_name" value="{{ old('sheikh_name') }}"
                                                required>
                                                <option value="">---Select Sheikh----</option>
                                                @foreach ($all_sheikhs as $all_sheikh)
                                                    <option value="{{ $all_sheikh->Fullname }}">{{ $all_sheikh->Fullname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span style="color: red">
                                                @error('sheikh_name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Topic </label>
                                            <input type="text" name="topic" class="form-control"
                                                value="{{ old('topic') }}" required>
                                            <span style="color: red"> @error('topic')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Series</label>
                                            <select class="form-control" name="serie_name" id="serie_name" value="{{ old('serie_name') }}"
                                                required>
                                                <option value="">---Select Serie ---</option>
                                                <option value="default_0">0. Lectures without series </option>
                                                @foreach ($all_series as $key => $serie_name)
                                                    <option value="{{ $serie_name->serieId }}">{{$key+1}}. {{ $serie_name->serieName }}</option>
                                                 @endforeach
                                            </select>
                                            <span style="color: red">
                                                @error('sheikh_name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group" style="margin-top: 2.5rem;">
                                            <strong>Upload Audio :</strong> <input type="file" name="audio"
                                                class="dropify" data-default-file="" value="{{ old('audio') }}" required>
                                            <span style="color: red">
                                                @error('audio')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
