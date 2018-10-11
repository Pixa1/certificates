
<script>
$(document).ready(function() {

	//Initialize Datatable
	$('#select_btn').prop('disabled',true);
	$('#table').DataTable({
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }]
    });
    $('#table tbody').on( 'click', 'tr', function () {
	    $(this).toggleClass('table-info');
	    //disable download button if nothing is selected
	    var selectedRows= table.rows('.table-info').count();
	    if (selectedRows !== 0){
	        $('#select_btn').prop('disabled',false);
	    }else{$('#select_btn').prop('disabled',true);
	    };
    } );

	var table = $('#table').DataTable();
    // Setup - add a text input to each footer cell

    $('#table tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" id="tsearch" class="form-control form-control-sm" placeholder="Search '+title+'" />' );
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
        var data=table.rows('.table-info').data();
        var newarray=[];       
        for (var i=0; i < data.length ;i++){
        	var newurl = data[i][8];
        	newurl = newurl.substring(newurl.indexOf("/") + 1, newurl.indexOf(">") -1);
            newarray.push(newurl);
            // newarray.push(data[i][8]);
        }
        var urls = newarray;
       
    //Download files as ZIP
    var zip = new JSZip();
        function request(url) {
            return new Promise(function(resolve) {
                var httpRequest = new XMLHttpRequest();
                httpRequest.open("GET", url);
                httpRequest.onload = function() {
                    //var newurl = url.substr(url.indexOf("/")+1);
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
    $('.btn-danger').on('click', function(e){
        var name = $(this).data('name');
        e.preventDefault();
        swal({
            title: 'Are you sure you want to delete user '+name+ '?',
            text: "You won't be able to revert this!",
            type: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })
        .then ((result) => {
            if (result.value) {
                $(this).closest("form").submit();
            }else{
                result.dismiss === swal.DismissReason.cancel
            }

        });
    });
} );
</script>