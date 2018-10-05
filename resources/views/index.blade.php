@extends('layouts.master')

@section('content')
@include('script')
<main role="main" class="col-sm-11 ml-sm-auto col-lg-11 pt-5 px-4">
	@include('flash-message')
	<div class="table-responsive p-1">
	<table id="table" class="table table-bordered table-sm" cellspacing="0" width="100%">
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
	        <!-- <td>{{$item->id}}</td> -->
	        <td>{{$item->name}}</td>
	        <td>{{$item->lastname}}</td>
	        <td>{{$item->vendor}}</td>
	        <td>{{$item->shorttitle}}</td>
	        <td>{{$item->certname}}</td>
	        <td>{{$item->certver}}</td>
	        <td>{{$item->examid}}</td>
	        <td>{{ $item->dateofach}}</td>
	        <td><a href="{{($item->certpath)}}">Download</a> </td>
	        {{-- <td><a href="{{($item->certpath)}}">{{str_replace('/storage/', '', ($item->certpath))}}</a> </td> --}}
	        <!-- <td>{{$item->datevalid}}</td> -->
	        <!-- <td>{{$item->deprecated}}</td> -->
	        <!-- <td>{{$item->created_at}}</td> -->
	        <!-- <td>{{$item->updated_at}}</td> -->
	        @auth

	        <td>
	            <div class="btn-group btn-group-sm border-1">
	                <a href="{!!'/edit/'. $item->id !!}" class="btn btn-info"><i class="far fa-edit"></i> Edit</a>
	                 <form method="POST" action="{!! action('CertificatesController@destroy', $item->id) !!}">
					    @csrf
					    <button class="btn btn-sm btn-danger" id="delete_btn" type="submit" onclick="return confirm('Are you sure you want to delete record?');"><i class="fas fa-trash-alt"></i> Delete</button>
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
</main>
</div>
</div>


@endsection
