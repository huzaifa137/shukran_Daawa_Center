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
					<h4>User Information</h4>
				</div>
			</div>
			<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);">Users</a></li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);">User Information</a></li>
				</ol>
			</div>
		</div>
		
		<div class="row">
			
			<div class="col-lg-12">
				<div class="row tab-content">
					<div id="list-view" class="tab-pane fade active show col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">All User Information  </h4>
								<a href="{{route('auth.register')}}" class="btn btn-primary">+ Add User</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example3" class="display" style="min-width: 845px">
										<thead>
											<tr>
												<th>No</th>
												<th>Username</th>
												<th>Email</th>
												<th>Phonenumber</th>
												<th style="padding-left:4rem;">Status</th>
                                                <th colspan="3" style="padding-left: 3rem;">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($users as $key => $user)
											<tr>
                                                <td>{{$key+1}}</td>
												<td>{{$user->fname}}</td>
												<td>{{$user->email}}</td>
												<td>{{$user->phonenumber}}</td>                                                
                                                @if ($user->status == 'invalid')
                                                <td> <a class="btn btn-danger btn-sm disabled">Pending Activation</a></td>
                                                @else
                                                <td style="text-align: center"> <a class="btn btn-success btn-sm disabled">Active</a></td>
                                                @endif
												<td>
                                                    @if ($user->status == 'invalid')
                                                    <a href="{{'activateUser/'.$user->id}}" class="btn btn-sm btn-success mdi mdi-alert"onclick = "return confirm('Please confirm you want to activate this user ?')"></i></a>
                                                    @else
                                                    <a href="{{'editUser/'.$user->id}}" class="btn btn-sm btn-success mdi mdi-alert disabled"onclick = "return confirm('Please confirm you want to edit this user ?')"></i></a>
                                                    @endif
													<a href="{{'editUser/'.$user->id}}" class="btn btn-sm btn-primary"onclick = "return confirm('Please confirm you want to edit this user ?')"><i class="la la-pencil"></i></a>
													<a href="{{'deleterUser/'.$user->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete a record ?')"><i class="la la-trash-o"></i></a>
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