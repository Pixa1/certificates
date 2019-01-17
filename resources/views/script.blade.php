

<script>

$(document).ready(function() {
    
	//Initialize Datatable
	$('#select_btn').prop('disabled',true);
    $.fn.dataTable.moment( 'DD-MM-YYYY' );

    
    if(!"{{Auth::guest()}}"){
	var table = $('#table').DataTable({
        
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'lastname', name: 'lastname' },
            { data: 'vendor', name: 'vendor' },
            { data: 'shorttitle', name: 'shorttitle' },
            { data: 'certname', name: 'certname' },
            { data: 'certver', name: 'certver' },
            { data: 'examid', name: 'examid' },
            { data: 'dateofach', name: 'dateofach' },
            { data: 'certpath', name: 'certpath' },
            { data: 'action', name: 'action',searchable:false,orderable:false}
            
        ] 
    });
    }else{
        var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'lastname', name: 'lastname' },
            { data: 'vendor', name: 'vendor' },
            { data: 'shorttitle', name: 'shorttitle' },
            { data: 'certname', name: 'certname' },
            { data: 'certver', name: 'certver' },
            { data: 'examid', name: 'examid' },
            { data: 'dateofach', name: 'dateofach' },
            { data: 'certpath', name: 'certpath' },
        ] 
    });
    }
    // Setup - add a text input to each footer cell

    $('#table tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" id="tsearch" class="form-control form-control-sm" placeholder="Search '+title+'" />' );
    } );
    //Select row
    $('#table tbody').on( 'click', 'tr', function () {
	    $(this).toggleClass('table-info');
	    //disable download button if nothing is selected
	    var selectedRows= table.rows('.table-info').count();
	    if (selectedRows !== 0){
	        $('#select_btn').prop('disabled',false);
	    }else{$('#select_btn').prop('disabled',true);
	    };
    } );
    // Apply the search
     table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        });
    }); 

    //select all filtered
    $('#select_all_existent').on('click',function(){
        var data = table.rows( ).nodes();
        $(data).toggleClass('table-info');
        var selectedRows= table.rows('.table-info').count();
        if (selectedRows !== 0){
            $('#select_btn').prop('disabled',false);
        }else{$('#select_btn').prop('disabled',true);
        };
    });

    //Download Files
    $('#select_btn').click( function () {
        $('#overlay').show();
        $('#loader').show();

        var data=table.rows('.table-info').data();
        var newarray=[];       
        for (var i=0; i < data.length ;i++){
        	var newurl = data[i]['certpath'];
        	newurl = newurl.substring(newurl.indexOf("/") + 1, newurl.indexOf(">") -1);
            newarray.push(newurl);
        }
        var urls = newarray;

    //Download files as ZIP
    var zip = new JSZip();
        function request(url) {
            return new Promise(function(resolve) {
                var httpRequest = new XMLHttpRequest();

                httpRequest.open("GET", url);
                httpRequest.onload = function() {
                    JSZipUtils.getBinaryContent(url,function (err, data) {
                    if(err) {
                        throw err; // or handle the error
                    }
                    var newurl = url.substr(url.indexOf("/")+1);
                    zip.file(newurl, data, {binary:true});
                    resolve()
                    });
                }   
                httpRequest.send()
            });
        }

        Promise.all(urls.map(function(url) {
            return request(url)
            }))
            .then(function() {
            zip.generateAsync({
                type: "blob"
                })
                .then(function(content) {
                    saveAs(content, "certificates.zip");
                    $('#overlay').hide();
                    $('#loader').hide();
                });
            }) 
            
            
    
    } ); 

    // Reset Form Button
    $('#reset_btn').on('click', function(){
	table.search( '' ).columns().search( '' ).draw();
        var data = table.rows('.table-info' ).nodes();
        $(data).removeClass('table-info');
        $('#select_btn').prop('disabled',true);
        $('input[id=tsearch]').val('');
    });

    //Success div fadeout
    setTimeout(function() {
    $('.alert').fadeOut('400');
    }, 3000);


    //delete
    $('#table').on('click', '.btn-danger', function (e) {
    var _this = this;

    var name = $(this).data('name');
    e.preventDefault();
    swal({
        title: 'Are you sure you want to delete certificate?',
        text: "You won't be able to revert this!",
        type: 'error',
        showCancelButton: true,
        confirmButtonColor: '#63c2de',
        cancelButtonColor: '#f86c6b',
        confirmButtonText: 'Yes, delete it!'
    }).then(function (result) {
        if (result.value) {
            $(_this).closest("form").submit();
        } else {
            result.dismiss === swal.DismissReason.cancel;
        }
    });
    });
} );
</script>