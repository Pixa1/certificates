@extends('layouts.master')

@section('content')
@include('script')

<main role="main" class="col-sm-11 ml-sm-auto col-lg-11 pt-5 px-4">
	@include('flash-message')
	<div class="btn-group btn-group-sm">
		<input type="button" class="btn btn-secondary" value="Add new user">
	</div>
	<div class="table-responsive p-1">
	<table id="table" class="table table-bordered table-sm" cellspacing="0" width="100%">
	    <thead class="thead-light">
	        <tr>
	            <th>Username</th>
	            <th>Email</th>
	            <th>Created At</th>
	            <th>Updated At</th>
	            <th>Admin</th>
	        </tr>
	    </thead>
	    @foreach($data as $item)
	    <tr>
	        <!-- <td>{{$item->id}}</td> -->
	        <td>{{$item->name}}</td>
	        <td>{{$item->email}}</td>
	        <td>{{$item->created_at}}</td>
	        <td>{{$item->updated_at}}</td>


	        <td>
	            <div class="btn-group btn-group-sm border-1">
	                <a href="{!!'/edit/'. $item->id !!}" class="btn btn-info"><i class="far fa-edit"></i> Edit</a>
	                 <form method="POST" action="{!! action('AdminController@destroy', $item->id) !!}">
					    @csrf
					    <button class="btn btn-sm btn-danger" data-id="{{$item->id}}" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
					</form>
	            </div>
	        </td>

	    </tr>
	    @endforeach

	</table>

</main>
</div>
</div>
@endsection
