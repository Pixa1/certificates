@extends('layouts.master')

@section('content')
@include('script')
<main class="col-sm-11 ml-sm-auto col-lg-11 mt-5 pt-3">
	
    @include('flash-message')
	
    <h1><i class="fa fa-key"></i>Available Permissions

    <a href="{{ route('admin.index') }}" class="btn btn-light float-right">Users</a>
    <a href="{{ route('roles.index') }}" class="btn btn-light float-right">Roles</a></h1>

    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-sm" cellspacing="0" width="100%"">

            <thead class="thead-light">
                <tr>
                    <th >Permissions</th>
                    <th width="10%">Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>
                    	<div class="btn-group btn-group-sm border-1">
		                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info float-left" style="margin-right: 3px;">Edit</a>
			                 <form method="POST" action="{!! route('permissions.destroy', $permission->id) !!}">
							    @csrf
							     @method('DELETE')
							    <button class="btn btn-sm btn-danger" data-id="{{$permission->id}}" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
							</form>
                    	</div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>


</main>
</div>
</div>


@endsection
