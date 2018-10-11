@extends('layouts.master')
@section('content')
<main class="col-sm-9 ml-sm-auto col-lg-10 mt-5 pt-3">
	   <div class='col'>

        <h1><i class='fa fa-key'></i> Edit Permission</h1>
        <br>

        <form enctype="multipart/form-data" id="form" method="post" action="{{route('permissions.update',$permission->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                    <div class="col-sm-8 col-lg-7">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$permission->name) }}" required autofocus>
                    </div>
                </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</main>
@endsection