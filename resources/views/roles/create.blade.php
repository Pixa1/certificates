@extends('layouts.master')
@section('content')
<main class="col-sm-9 ml-sm-auto col-lg-10 mt-5 pt-3">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1><i class='fa fa-key'></i> Add Role</h1>
        <hr>

        <form enctype="multipart/form-data" id="form" method="post" action="{{route('roles.store')}}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-1 col-form-label">{{ __('Name') }}</label>
                <div class="col-sm-5">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                </div>
            </div>

            <h5><b>Assign Permissions</b></h5>

            <div class='form-group ml-4'>
                @foreach ($permissions as $permission)
                    <input class="form-check-input" type="checkbox" id="permissions" name="permissions[]" value="{{$permission->id}}">
                    <label class="form-check-label" for="permissions">{{ucfirst($permission->name)}}</label>
                    <br>
                @endforeach
            </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</main>
@endsection