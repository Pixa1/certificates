@extends('layouts.master')
@section('content')
<main role="main" class="col-sm-9 ml-sm-auto col-lg-10 mt-5">
	<h1>Add new user</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
		<form enctype="multipart/form-data" id="form" method="post" action="{{route('admin.store')}}">
            @csrf
			<div class="form-group row">
                <label for="first name" class="col-sm-2 col-form-label">{{ __('First Name') }}</label>

                <div class="col-sm-5">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                </div>
            </div>

			<div class="form-group row">
                <label for="Email" class="col-sm-2 col-form-label">{{ __('Email') }}</label>

                <div class="col-sm-5">
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                </div>
            </div>

            <div class='form-group row'>
                 <label for="role" class="col-sm-2 col-form-label">{{ __('Roles') }}</label>
                 <div class="col-sm-5 ml-3">
                @foreach ($roles as $role)
                <input class="form-check-input" type="checkbox" id="roles" name="roles[]" value="{{$role->id}}">
                <label class="form-check-label" for="roles">{{ucfirst($role->name)}}</label>
                <br>
                @endforeach
                </div>
            </div>
        
			<div class="form-group row">
                <label for="Password" class="col-sm-2 col-form-label">{{ __('Password') }}</label>

                <div class="col-sm-5">
                    <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus>

                </div>
            </div> 
            <div class="form-group row">
                <label for="Password_confirmation" class="col-sm-2 col-form-label">{{ __('Confirm Password') }}</label>

                <div class="col-sm-5">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirm') }}" required autofocus>

                </div>
            </div> 

		
		<button type="submit" class="btn btn-primary">Add</button>
	</form>
</main>
@endsection