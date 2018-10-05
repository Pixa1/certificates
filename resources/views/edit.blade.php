@extends('layouts.master')
@section('content')
<main role="main" class="col-sm-9 ml-sm-auto col-lg-10 pt-5 px-4">
	<h1>Edit certificate</h1>
        
		<form enctype="multipart/form-data" id="form" method="post" action="{{action('CertificatesController@update', $id)}}">
            @csrf
			<div class="form-group row">
                <label for="first name" class="col-sm-2 col-form-label">{{ __('First Name') }}</label>

                <div class="col-sm-5">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $id->name }}" required autofocus>

                </div>
            </div>

			<div class="form-group row">
                <label for="last name" class="col-sm-2 col-form-label">{{ __('Last Name') }}</label>

                <div class="col-sm-5">
                    <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ $id->lastname }}" required autofocus>

                </div>
            </div>

			<div class="form-group row">
                <label for="Vendor" class="col-sm-2 col-form-label">{{ __('Vendor') }}</label>

                <div class="col-sm-5">
                    <input id="vendor" type="text" class="form-control{{ $errors->has('vendor') ? ' is-invalid' : '' }}" name="vendor" value="{{ $id->vendor }}" required autofocus>

                </div>
            </div>

			<div class="form-group row">
                <label for="Short Title" class="col-sm-2 col-form-label">{{ __('Short Title') }}</label>

                <div class="col-sm-5">
                    <input id="shorttitle" type="text" class="form-control{{ $errors->has('shorttitle') ? ' is-invalid' : '' }}" name="shorttitle" value="{{ $id->shorttitle }}" required autofocus>

                </div>
            </div>

			<div class="form-group row">
                <label for="Certification" class="col-sm-2 col-form-label">{{ __('Certification') }}</label>

                <div class="col-sm-5">
                    <input id="certname" type="text" class="form-control{{ $errors->has('certname') ? ' is-invalid' : '' }}" name="certname" value="{{ $id->certname }}" required autofocus>

                </div>
            </div>

			<div class="form-group row">
                <label for="Certification/Version" class="col-sm-2 col-form-label">{{ __('Certification/Vesion') }}</label>

                <div class="col-sm-5">
                    <input id="certver" type="text" class="form-control{{ $errors->has('certver') ? ' is-invalid' : '' }}" name="certver" value="{{ $id->certver }}" required autofocus>

                </div>
            </div>    

			<div class="form-group row">
                <label for="Exam ID" class="col-sm-2 col-form-label">{{ __('Exam ID') }}</label>

                <div class="col-sm-5">
                    <input id="examid" type="text" class="form-control{{ $errors->has('examid') ? ' is-invalid' : '' }}" name="examid" value="{{ $id->examid }}"  autofocus>

                </div>
            </div> 

			<div class="form-group row">
                <label for="Achieved On" class="col-sm-2 col-form-label">{{ __('Achieved On') }}</label>

                <div class="col-sm-5">
                    <input id="dateofach" type="date" class="form-control{{ $errors->has('dateofach') ? ' is-invalid' : '' }}" name="dateofach" value="{{ $id->dateofach }}"  autofocus>
                        
                </div>
            </div>                                                                

			<div class="form-group row">
                <label for="Expires On" class="col-sm-2 col-form-label">{{ __('Expires On') }}</label>

                <div class="col-sm-5">
                    <input id="datevalid" type="date" class="form-control{{ $errors->has('datevalid') ? ' is-invalid' : '' }}" name="datevalid" value="{{ $id->datevalid }}"  autofocus>

                </div>
            </div>
              <div class="form-group row">
                <div class="col-sm-2">Deprecated</div>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input type="hidden" name="deprecated" value="0">
                    <input class="form-check-input" type="checkbox" id="deprecated" name="deprecated" value="{{ $id->deprecated === 'deprecated' ? 'checked' : '1' }}"
                    @if ($id->deprecated === 1) checked="checked" @endif
                    >
                    <label class="form-check-label" for="deprecated">
                      Certificate is deprecated
                    </label>
                  </div>
                </div>
              </div>
                <!-- <p><input type="submit" name="submit" value="Send" /></p> -->
                {{-- <input type="hidden" name="MAX_FILE_SIZE" value="2000000"> --}}
                <!-- <input name="file" type="file" id="attach" value="test">  -->

<!--                 <p>Select Certificate</p>
                <input type="button" value="Insert Attachment" onclick="document.getElementById('file').click();" />
                <input type="file" style="display:none;" id="file" name="file" onchange="setfilename(this.value);"/>
                <textarea id="filepath" readonly disabled wrap="hard" ></textarea>
                <input name="upload" type="submit" id="upload" value="upload"> -->
                


{{-- 		<fieldset class="form-group">
			<label for="exampleTextarea">Example textarea</label>
			<textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
		</fieldset> --}}
		<fieldset class="form-group">
			<label for="exampleInputFile">File input</label>
			<input type="file" class="form-control-file" id="exampleInputFile" name="file" onchange="setfilename(this.value);">
		</fieldset>
		
		<button type="submit" class="btn btn-primary">Update</button>
	</form>

</main>
@endsection