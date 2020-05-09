@extends('admin.master.master')

@section('head_dpc')
    @extends('admin.components.css_dep')
    <style>
        .font24{
            font-size: 48pt;
            color: #28aeb0;
        }
        td.details-control {
            background: url('<?= base_url('assets/icons/details_open.png') ?>') no-repeat center center;
            cursor: pointer;
        }
        tr.details td.details-control {
            color : white;
            background: url('<?= base_url('assets/icons/details_close.png') ?>') no-repeat center center;
        }

        .the-legend {
            border-style: none;
            border-width: 0;
            font-size: 14px;
            line-height: 20px;
            margin-bottom: 0;
            width: auto;
            padding: 0 10px;
            border: 1px solid #e0e0e0;
        }
        .the-fieldset {
            border: 1px solid #e0e0e0;
            padding: 10px;
        }

    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/select2-bootstrap4.min.css") ?>">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://raw.githubusercontent.com/lipis/bootstrap-sweetalert/master/dist/sweetalert.css">


@endsection

@section('content')


<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>E-Wallet</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li>Admin</li>
                                    <li class="active">E-Wallet</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">        
                    @component('admin.categories.list_barang.pelengkap.table_components')

                    @endcomponent
                </div>
            </div><!-- .animated -->
            @component('admin.categories.list_barang.pelengkap.modal_components' , ["name" => $name, "key" => $key])

            @endcomponent
        </div><!-- .content -->
@endsection



@section('scripts')
    @extends('admin.components.js_dep')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="<?= base_url("assets/js/serializeJSON.js") ?>"></script>
    <script>

        function format ( d ) {

            var datas = "";

            if(d.grosir === []){
                datas += "<tr><td colspan='2'>Tidak ada data grosir</td></tr>";
                console.log(d.grosir);
            }else{
                d.grosir.forEach(function(i, e){
                    datas += "<tr>"
                            + "<td>" + i.minimum_pembelian + "</td>"
                            + "<td>" + i.harga + "</td>"
                            + "</tr>";
                });
            }


            return '<table class="table">'
            +'<thead>'
            +'<tr>'
            +'<td>Minimum Pembelian</td>'
            +'<td>Harga Pergrosir</td>'
            +'</tr>'
            +'</thead>'
            +'<tbody>'
            + datas 
            +'</tbody>'
            +'</table>';
        }


        $(document).ready(function(){

            $('.btnDel').on('click', function(e){
                e.preventDefault();
                $(this).parent().parent().find('.formDel').val("");
            });

            var dt = $('#dtDisplay').DataTable({
                'ajax': {
                    'url': "<?= route('listProductAPI') ?>",
                    'type': 'GET',
                    beforeSend : function (request) {
                        request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                    }
                },
                "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                    { "data": "kodeBarang" },
                    { "data": "namaBarang" },
                    { "data": "kodeKategori" },
                    { "data": "stok" },
                    { "data": "hargaSatuan" },
                {
                    'defaultContent' : '<button class="btn btn-info mr-2 pr-2 editBtn"><i class="fa fa-edit"></i> Edit</button><button class="btn btn-danger hapusProduk"><i class="fa fa-trash"></i> Hapus</button>',
                    'orderable' : false
                }
                ],

            });


            // Array to track the ids of the details displayed rows
            var detailRows = [];
            
            $('#dtDisplay tbody').on( 'click', 'tr td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = dt.row( tr );
                var idx = $.inArray( tr.attr('id'), detailRows );
            
                if ( row.child.isShown() ) {
                    tr.removeClass( 'details' );
                    row.child.hide();
            
                    // Remove from the 'open' array
                    detailRows.splice( idx, 1 );
                }
                else {
                    tr.addClass( 'details' );
                    row.child( format( row.data() ) ).show();
            
                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                }
            } );
            
            // On each draw, loop over the `detailRows` array and show any child rows
            dt.on( 'draw', function () {
                $.each( detailRows, function ( i, id ) {
                    $('#'+id+' td.details-control').trigger( 'click' );
                } );
                $('.editBtn').on('click', function(){
                    $('#errorMsg').find('#eMessg').empty();
                    $('#eMessg').empty();
                    var tr = $(this).closest('tr');
                    var row = dt.row( tr ).data();
                    $('#editKodeProduk').val(row.kodeBarang);
                    $('#editNamaProduk').val(row.namaBarang);
                    $('#hargaSatuan').val(row.hargaSatuan);
                    $('#stok').val(row.stok);
                    $('input[name="grosirInput[]"]').each(function(i, e){
                        $(this).val("");
                    });
                    $('input[name="grosirPrice[]"]').each(function(i, e){
                        $(this).val("");
                    });
                    for(var i = 0; i < row.grosir.length; i++){
                        $($('input[name="grosirInput[]"]')[i]).val(row.grosir[i].minimum_pembelian);
                        $($('input[name="grosirPrice[]"]')[i]).val(row.grosir[i].harga);
                    }
                    
                    $('#modalEdit').modal('toggle');
                });

                $('.hapusProduk').on('click', function(){
                    var trdel = $(this).parent().parent();
                    var tr = $(this).closest('tr');
                    var rowd = dt.row( tr );
                    var row = dt.row( tr ).data();
                    swal({
                      title: "Hapus Barang",
                      text: "Apakah anda yakin menghapus produk : "+row.namaBarang+" ("+row.kodeBarang+")",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true

                    }).then(function(willDelete){
                        if(willDelete){
                            axios({
                                method : 'POST',
                                url : '<?= route('deleteProductAPI') ?>',
                                data : {idBarang : row.kodeBarang},
                                headers: {'Content-Type': 'multipart/form-data',
                                          'X-Requested-With': 'XMLHttpRequest'}
                            }).then(function(response){
                                if(response.status == 200){
                                    toastr.success('Data : '+row.kodeBarang+" Berhasil dihapus", 'Info', {timeOut: 3000});
                                    trdel.remove();
                                }else{
                                    toastr.warning('Data : '+row.kodeBarang+" Gagal dihapus", 'Info', {timeOut: 3000});
                                }
                            }).catch(function(err){
                                if(err.status == 400){
                                    toastr.warning('Data : '+row.kodeBarang+" Gagal dihapus", 'Info', {timeOut: 3000});
                                }
                            });
                        }
                    });
                });

                $('#submitEdit').on('click', function(e){
                    e.preventDefault();
                    var ythis = $(this);
                    var msgAl = $('#errorMsg');
                    var tyhis = {};
                    ythis.prop('disabled', true);
                    msgAl.addClass('d-none');
                    msgAl.find('#eMessg').empty();
                    $('#eMessg').empty();
                    ythis.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading, sedang menyimpan data...');
                    let dataForm = $('#formProductAdd').serializeJSON();

                    axios({
                        method: 'post',
                        url: '<?= route('editProductAPI') ?>',
                        data: dataForm,
                        headers: {'Content-Type': 'multipart/form-data',
                                  'X-Requested-With': 'XMLHttpRequest'}
                        })
                        .then(function (response) {

                            if(response.status == 200){
                                ythis.html('Simpan');
                                $('#modalEdit').modal('hide');
                                ythis.prop('disabled', false);
                                dt.ajax.reload();
                                toastr.success("Data : Berhasil diubah", 'Info', {timeOut: 3000});
                                return;

                            }else{
                                toastr.warning("Data : Gagal diubah", 'Info', {timeOut: 3000});
                            }
                            return;
                        })
                        .catch(function (error) {
                            //handle error
                            console.log(error.response.status);
                            if(error.response.status === 400){
                                ythis.prop('disabled', false);
                                ythis.html('Simpan');

                                if(error.response.data.msg.length >= 1){
                                    $('#eMessg').append("<li>"+error.response.data.msg+"</li>");
                                }else{
                                    error.response.data.msg.forEach(function(i,e){
                                        $('#eMessg').append("<li>"+i+"</li>");
                                    });    
                                }
                                msgAl.removeClass('d-none');
                                $('#modalEdit').animate({scrollTop: 0},400);
                                return;
                            }
                        });
                        return;
                });
            });
        });


        

        $('.kategoriSearch').select2({
            theme: 'bootstrap4',
            data: [{
                    id: 0,
                    text: " "
                }, {
                    id: 1,
                    text: "test02"
                }, {
                    id: 2,
                    text: "test03"
                }, {
                    id: 3,
                    text: "test04"
                }, {
                    id: 4,
                    text: "test05"
                }],
        });

        $('.formDel, .stockIn, .hargaIn').on('paste', function(e){
            var dT = e.originalEvent.clipboardData || window.clipboardData;
              var text = dT.getData('text');
              if(parseInt(text) !== +text) { // allow only Ints
                e.preventDefault(); //prevent the default behaviour 
              }
        }).on('keypress', function(e){
            if (e.charCode > 31 && (e.charCode < 48 || e.charCode > 57)) {
                e.preventDefault();
            }
        });




    </script>
@endsection