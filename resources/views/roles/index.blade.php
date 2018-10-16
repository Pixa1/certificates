@extends('layouts.master')

@section('content')
@include('script')
<main class="col-sm-11 ml-sm-auto col-lg-11 mt-5 pt-3">
	@include('flash-message')
    
        <h1><i class="fa fa-key"></i> Roles

        <a href="{{ route('admin.index') }}" class="btn btn-light float-right">Users</a>
        <a href="{{ route('permissions.index') }}" class="btn btn-light float-right">Permissions</a></h1>
        <hr>
        <div class="table-responsive">
           <table class="table table-bordered table-sm" cellspacing="0" width="100%"">
                <thead class="thead-light">
                    <tr>
                        <th>Role</th>
                        <th>Permissions</th>
                        <th width="10%">Operation</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                    <tr>

                        <td>{{ $role->name }}</td>

                        <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')->implode(', ')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                        <td>
                            <div class="btn-group btn-group-sm border-1">
                                <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                                <form method="POST" action="{!! route('roles.destroy', $role->id) !!}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" data-id="{{$role->id}}" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>

    
</main>
</div>
</div>


@endsection
