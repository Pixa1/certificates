@extends('layouts.master')
@section('content')
<main role="main" class="col-sm-9 ml-sm-auto col-lg-10 mt-5 pt-3">
	<h1>Edit User</h1>
        
		<form enctype="multipart/form-data" id="form" method="post" action="{{route('admin.update', $user->id)}}">
            @csrf
            @method('PUT')
			<div class="form-group row">
                <label for="first name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>

                <div class="col-sm-5">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                </div>
            </div>

			<div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">{{ __('email') }}</label>

                <div class="col-sm-5">
                    <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required autofocus>

                </div>
            </div>

            <div class="form-group row">
                <label for="roles" class="col-sm-2 col-form-label">{{ __('Roles') }}</label>

                <div class="col-sm-5">
                    <input id="roles" type="text" class="form-control" name="roles" value="{{ $user->roles()->pluck('name')->implode(', ') }}" disabled autofocus>

                </div>
            </div>

            <div class='form-group row'>
                 <label for="email" class="col-sm-2 col-form-label">{{ __('Role') }}</label>
                 <div class="col-sm-5 ml-3">
                @foreach ($roles as $role)
                <input class="form-check-input" type="checkbox" id="roles" name="roles[]" value="{{$role->id}}" 
                        @if(in_array($role->id, $user->roles()->pluck('id')->toarray())) checked @endif >
                <label class="form-check-label" for="roles">{{ucfirst($role->name)}}</label>
                <br>
                @endforeach
                </div>
            </div>
		
		<button type="submit" class="btn btn-primary">Update</button>
	</form>

</main>
@endsection