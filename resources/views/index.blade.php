@extends('layouts.master')
@section('title', 'S&T Certifikati')
@section('content')
@include('script')
@include('flash-message')
<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<i class="fa fa-align-justify"></i> @yield('title')
		</div>
		<div class="card-body">
			<div class="table-responsive p-1">
				<table id="table" class="table table-bordered table-sm table-striped" cellspacing="0" width="100%">
					<thead class="thead-light">
						<tr>
							<th>First name</th>
							<th>Last name</th>
							<th>Vendor</th>
							<th>Short Title</th>
							<th>Certificate Name</th>  
							<th>Certification/Version</th>
							<th>Exam ID</th>
							<th>Achieved On</th>
							<th>Certificate</th>
							@auth
							<th>Admin</th>
							@endauth
						</tr>
					</thead>
					@foreach($data as $item)
					<tr>
						<td>{{$item->name}}</td>
						<td>{{$item->lastname}}</td>
						<td>{{$item->vendor}}</td>
						<td>{{$item->shorttitle}}</td>
						<td>{{$item->certname}}</td>
						<td>{{$item->certver}}</td>
						<td>{{$item->examid}}</td>
						<td>{{ $item->dateofach}}</td>
						<td><a href="{{($item->certpath)}}">Download</a> </td>

						@auth

						<td>
							<div class="btn-group btn-group-sm border-1">
								<a href="{!!'/edit/'. $item->id !!}" class="btn btn-info"><i class="far fa-edit"></i> Edit</a>
								<form method="POST" action="{!! action('CertificatesController@destroy', $item->id) !!}">
									@csrf
									<button class="btn btn-sm btn-danger" id="delete_btn" data-name="{{$item->certname}}" type="submit" ><i class="fas fa-trash-alt"></i> Delete</button>
								</form>
							</div>
						</td>
						@endauth
					</tr>
					@endforeach
					<tfoot>
					<tr>
						<th>First name</th>
						<th>Last name</th>
						<th>Vendor</th>
						<th>ShortTitle</th>
						<th>Certificate Name</th>
						<th>Certification/Version</th>  
						<th>Exam ID</th>
						<th>Achieved On</th>
						<th>Certificate</th>
						@auth
						<th>Admin</th>
						@endauth
					</tr>
					</tfoot>
				</table>
			</div>
			<div class="btn-group btn-group-sm">
			<input type="button" class="btn btn-secondary" id="select_all_existent" value="Select All">
			<input type="button" class="btn btn-secondary" id="reset_btn" value="Reset Filter">
			<input type="button" class="btn btn-secondary" id="select_btn" Value="Download Selected">
			</div>
		</div>
	</div>
</div>
<div id="overlay"></div>
<div id="loader"></div>
@endsection
