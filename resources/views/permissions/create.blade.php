@extends('layouts.master')
@section('content')
<main class="col-sm-9 ml-sm-auto col-lg-10 mt-5 pt-3">
        <h1><i class='fa fa-key'></i> Add Permission</h1>
        <br>

        <form enctype="multipart/form-data" id="form" method="post" action="{{url('permissions')}}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">{{ __('Name') }}</label>
                    <div class="col-sm-5">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                </div>
                <h5><b>Assign Permission to Roles</b></h5>

                <div class='form-group ml-4'>
                    @if(!$roles->isEmpty())
                    @foreach ($roles as $role)
                        <input class="form-check-input" type="checkbox" id="roles" name="roles[]" value="{{$role->id}}">
                        <label class="form-check-label" for="roles">{{ucfirst($role->name)}}</label>
                        <br>
                    @endforeach
                    @endif
                    
                </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
</main>
@endsection