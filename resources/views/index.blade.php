@extends('layouts.master')
@section('title', 'S&T Certifikati')
@section('content')
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
							<th>Action</th>
							@endauth
						</tr>
					</thead>
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
							<th>Action</th>
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
@include('script')
@endsection
