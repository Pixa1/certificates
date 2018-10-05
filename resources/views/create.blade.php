@extends('layouts.master')
@section('content')
<main role="main" class="col-sm-9 ml-sm-auto col-lg-10 pt-5 px-4">
	<h1>Import new certificate</h1>
        
		<form enctype="multipart/form-data" id="form" method="post" action="/create">
            @csrf
			<div class="form-group row">
                <label for="first name" class="col-sm-2 col-form-label">{{ __('First Name') }}</label>

                <div class="col-sm-5">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                </div>
            </div>

			<div class="form-group row">
                <label for="last name" class="col-sm-2 col-form-label">{{ __('Last Name') }}</label>

                <div class="col-sm-5">
                    <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

                </div>
            </div>

			<div class="form-group row">
                <label for="Vendor" class="col-sm-2 col-form-label">{{ __('Vendor') }}</label>

                <div class="col-sm-5">
                    <input id="vendor" type="text" class="form-control{{ $errors->has('vendor') ? ' is-invalid' : '' }}" name="vendor" value="{{ old('vendor') }}" required autofocus>

                </div>
            </div>

			<div class="form-group row">
                <label for="Short Title" class="col-sm-2 col-form-label">{{ __('Short Title') }}</label>

                <div class="col-sm-5">
                    <input id="shorttitle" type="text" class="form-control{{ $errors->has('shorttitle') ? ' is-invalid' : '' }}" name="shorttitle" value="{{ old('shorttitle') }}" required autofocus>

                </div>
            </div>

			<div class="form-group row">
                <label for="Certification" class="col-sm-2 col-form-label">{{ __('Certification') }}</label>

                <div class="col-sm-5">
                    <input id="certname" type="text" class="form-control{{ $errors->has('certname') ? ' is-invalid' : '' }}" name="certname" value="{{ old('certname') }}" required autofocus>

                </div>
            </div>

			<div class="form-group row">
                <label for="Certification/Version" class="col-sm-2 col-form-label">{{ __('Certification/Vesion') }}</label>

                <div class="col-sm-5">
                    <input id="certver" type="text" class="form-control{{ $errors->has('certver') ? ' is-invalid' : '' }}" name="certver" value="{{ old('certver') }}"  autofocus>

                </div>
            </div>    

			<div class="form-group row">
                <label for="Exam ID" class="col-sm-2 col-form-label">{{ __('Exam ID') }}</label>

                <div class="col-sm-5">
                    <input id="examid" type="text" class="form-control{{ $errors->has('examid') ? ' is-invalid' : '' }}" name="examid" value="{{ old('examid') }}"  autofocus>

                </div>
            </div> 

			<div class="form-group row">
                <label for="Achieved On" class="col-sm-2 col-form-label">{{ __('Achieved On') }}</label>

                <div class="col-sm-5">
                    <input id="dateofach" type="date" class="form-control{{ $errors->has('dateofach') ? ' is-invalid' : '' }}" name="dateofach" value="{{ old('dateofach') }}"  autofocus>

                </div>
            </div>                                                                

			<div class="form-group row">
                <label for="Expires On" class="col-sm-2 col-form-label">{{ __('Expires On') }}</label>

                <div class="col-sm-5">
                    <input id="datevalid" type="date" class="form-control{{ $errors->has('datevalid') ? ' is-invalid' : '' }}" name="datevalid" value="{{ old('datevalid') }}"  autofocus>

                </div>
            </div>              
                          

		<fieldset class="form-group">
			<label for="exampleInputFile">Select Certificate</label>
			<input type="file" class="form-control-file" id="exampleInputFile" name="file" onchange="setfilename(this.value);" required>
		</fieldset>
		
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</main>
@endsection