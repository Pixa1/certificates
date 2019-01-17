@auth
<div class="btn-group btn-group-sm border-1">
        <a href="{!!'/edit/'. $id !!}" class="btn btn-info"><i class="far fa-edit"></i> Edit</a>
         <form method="POST" action="{!! action('CertificatesController@destroy', $id) !!}">
            @csrf
            <button class="btn btn-sm btn-danger" id="delete_btn" data-name="{{$certname}}" type="submit" ><i class="fas fa-trash-alt"></i> Delete</button>
        </form>
</div>
@endauth