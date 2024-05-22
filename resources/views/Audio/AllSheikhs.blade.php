@extends('layouts.header_footer_navbar')
@section('content')
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
					<h4>All Sheikhs</h4>
				</div>
			</div>
			<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);">Books</a></li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);">All Sheikhs</a></li>
				</ol>
			</div>
		</div>
		
		<div class="row">
			
			<div class="col-lg-12">
				<div class="row tab-content">
					<div id="list-view" class="tab-pane fade active show col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">All Sheikhs Details  </h4>
								<a href="{{route('Add-Sheikh')}}" class="btn btn-primary">+ Add Sheikh</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example3" class="display" style="min-width: 845px">
										<thead>
											<tr>
												<th>Fullname</th>
												<th>Firstname</th>
												<th>Edit</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($data as $info)
											<tr>
												<td>{{$info->Firstname}}</td>
												<td>{{$info->Fullname}}</td>
												<td>
													<a href="{{'Edit-sheikh/'.$info->id}}" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure you want to edit this record ?')"><i class="la la-pencil"></i></a>
													<a href="{{'delete-sheikh/'.$info->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete a record ?')"><i class="la la-trash-o"></i></a>
												</td>												
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
</div>

@endsection