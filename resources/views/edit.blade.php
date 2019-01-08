@extends('layouts.master')
@section('title', 'Uredi detalje')
@section('content')

<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
        <i class="fa fa-align-justify"></i> @yield('title')
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="form" method="post" action="{{action('CertificatesController@update', $id)}}">
                    @csrf
                    <div class="form-group row">
                        <label for="first name" class="col-sm-3 col-form-label">{{ __('First Name') }}</label>
        
                        <div class="col-sm-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $id->name }}" required autofocus>
        
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label for="last name" class="col-sm-3 col-form-label">{{ __('Last Name') }}</label>
        
                        <div class="col-sm-6">
                            <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ $id->lastname }}" required autofocus>
        
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label for="Vendor" class="col-sm-3 col-form-label">{{ __('Vendor') }}</label>
        
                        <div class="col-sm-6">
                            <input id="vendor" type="text" class="form-control{{ $errors->has('vendor') ? ' is-invalid' : '' }}" name="vendor" value="{{ $id->vendor }}" required autofocus>
        
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label for="Short Title" class="col-sm-3 col-form-label">{{ __('Short Title') }}</label>
        
                        <div class="col-sm-6">
                            <input id="shorttitle" type="text" class="form-control{{ $errors->has('shorttitle') ? ' is-invalid' : '' }}" name="shorttitle" value="{{ $id->shorttitle }}" required autofocus>
        
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label for="Certification" class="col-sm-3 col-form-label">{{ __('Certification') }}</label>
        
                        <div class="col-sm-6">
                            <input id="certname" type="text" class="form-control{{ $errors->has('certname') ? ' is-invalid' : '' }}" name="certname" value="{{ $id->certname }}" required autofocus>
        
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label for="Certification/Version" class="col-sm-3 col-form-label">{{ __('Certification/Vesrion') }}</label>
        
                        <div class="col-sm-6">
                            <input id="certver" type="text" class="form-control{{ $errors->has('certver') ? ' is-invalid' : '' }}" name="certver" value="{{ $id->certver }}" required autofocus>
        
                        </div>
                    </div>    
        
                    <div class="form-group row">
                        <label for="Exam ID" class="col-sm-3 col-form-label">{{ __('Exam ID') }}</label>
        
                        <div class="col-sm-6">
                            <input id="examid" type="text" class="form-control{{ $errors->has('examid') ? ' is-invalid' : '' }}" name="examid" value="{{ $id->examid }}"  autofocus>
        
                        </div>
                    </div> 
        
                    <div class="form-group row">
                        <label for="Achieved On" class="col-sm-3 col-form-label">{{ __('Achieved On') }}</label>
        
                        <div class="col-sm-6">
                            <input id="dateofach" type="date" class="form-control{{ $errors->has('dateofach') ? ' is-invalid' : '' }}" name="dateofach" value="{{ $id->dateofach }}"  autofocus>
                                
                        </div>
                    </div>                                                                
        
                    <div class="form-group row">
                        <label for="Expires On" class="col-sm-3 col-form-label">{{ __('Expires On') }}</label>
        
                        <div class="col-sm-6">
                            <input id="datevalid" type="date" class="form-control{{ $errors->has('datevalid') ? ' is-invalid' : '' }}" name="datevalid" value="{{ $id->datevalid }}"  autofocus>
        
                        </div>
                    </div>
                      <div class="form-group row">
                        <div class="col-sm-3">Deprecated</div>
                        <div class="col-sm-6">
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

                <fieldset class="form-group">
                    <label for="exampleInputFile">Import Certificate</label>
                    <input type="file" class="form-control-file" id="exampleInputFile" name="file" onchange="setfilename(this.value);">
                </fieldset>

                
            </form>
        </div>
        <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="far fa-dot-circle"></i> Update</button>
        </div>
    </div>
</div> 
		
@endsection