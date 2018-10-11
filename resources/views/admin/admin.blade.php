@extends('layouts.master')

@section('content')
@include('script')

<main class="col-sm-11 ml-sm-auto col-lg-11 mt-5 pt-3">
	@include('flash-message')
    <h1><i class="fa fa-users"></i> User Administration <a href="{{ route('roles.index') }}" class="btn btn-light float-right">Roles</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-light float-right">Permissions</a></h1>
    <hr>
	<div class="table-responsive p-1">
	<table  class="table table-bordered table-sm" cellspacing="0" width="100%">
	    <thead class="thead-light">
	        <tr>
	            <th>Username</th>
	            <th>Email</th>
	            <th>Created At</th>
	            <th>Roles</th>
	            <th width="10%">Admin</th>
	        </tr>
	    </thead>
	    @foreach($users as $user)
	    <tr>
	        <!-- <td>{{$user->id}}</td> -->
	        <td>{{$user->name}}</td>
	        <td>{{$user->email}}</td>
	        <td>{{$user->created_at}}</td>
	        <td>{{$user->roles()->pluck('name')->implode(', ')}}</td>


	        <td>
	            <div class="btn-group btn-group-sm border-1">
	                <a href="{!!route('admin.edit', $user->id) !!}" class="btn btn-info"><i class="far fa-edit"></i> Edit</a>
	                 <form id="delete" method="POST" action="{!! route('admin.destroy', $user->id) !!}">
					    @csrf
					    @method('DELETE')
					    <button class="btn btn-sm btn-danger" data-id="{{$user->id}}" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
					</form>
	            </div>
	        </td>

	    </tr>
	    @endforeach

	</table>

		<h5>Create new user</h5>
		<a href="{!!route('admin.create')!!}" class="btn btn-info"> Create new</a>

</main>
</div>
</div>
@endsection
