@extends('layouts.master')
@section('content')
<main class="col-sm-9 ml-sm-auto col-lg-10 mt-5 pt-3">
	   <div class='col-lg-4 col-lg-offset-4'>

        <h1><i class='fa fa-key'></i> Edit Role</h1>
        <br>

        <form enctype="multipart/form-data" id="form" method="post" action="{{route('roles.update',$role->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                    <div class="col-sm-5">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$role->name) }}" required autofocus>
                    </div>
                </div>
                 <div class="form-group row">
                <label for="roles" class="col-sm-2 col-form-label">{{ __('Permissions') }}</label>

                <div class="col-sm-5">
                    <input id="roles" type="text" class="form-control" name="permissions" value="{{ $role->permissions()->pluck('name')->implode(', ') }}" disabled autofocus>

                </div>
            </div>
                <div class='form-group'>
                   
                     <h5><b>Assign Permission</b></h5>
                    @foreach ($permissions as $permission)
                        <input class="form-check-input" type="checkbox" id="roles" name="permissions[]" value="{{$permission->id}}"
                        @if(in_array($permission->id, $role->permissions()->pluck('id')->toarray())) checked @endif>
                        <label class="form-check-label" for="permissions">{{ucfirst($permission->name)}}</label>
                        <br>
                    @endforeach
                
                    
                </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</main>
@endsection