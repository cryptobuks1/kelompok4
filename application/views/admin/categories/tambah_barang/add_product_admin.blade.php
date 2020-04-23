@extends('admin.master.master')

@section('head_dpc')
    @extends('admin.components.css_dep')
    <style>
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
        table {border-collapse:collapse; table-layout:fixed; border-spacing: 50px 10rem;}
           table td {word-wrap:break-word;}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/select2-bootstrap4.min.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/js/jquery.dynatable.js") ?>">
@endsection

@section('content')
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Tambah Produk</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li>Admin</li>
                                    <li><a href="#">Produk</a></li>
                                    <li class="active">Tambah Produk</li>
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
                    @component('admin.categories.tambah_barang.pelengkap.tambah_produk', ["name" => $name, "key" => $key, "kode_barang" => $kode_barang])

                    @endcomponent
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection



@section('scripts')
    @extends('admin.components.js_dep')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="<?= base_url("assets/js/jquery.dynatable.js") ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?= base_url("assets/js/serializeJSON.js") ?>"></script>
    <script>

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

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

        $('.btnDel').on('click', function(){
            $(this).parent().parent().find('.formDel').val("");
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

        $('#formProductAdd').on('submit', function(e){
            e.preventDefault();
        });


        $('#btnLoader').on('click', function(e){
            e.preventDefault();
            var ythis = $(this);
            var msgAl = $('#errorMsg');
            var tyhis = {};
            ythis.prop('disabled', true);
            msgAl.addClass('d-none');
            $('#eMessg').empty();
            ythis.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading, sedang menyimpan data...');
            let dataForm = $('#formProductAdd').serializeJSON();
            console.log(dataForm);
            axios({
                method: 'post',
                url: '<?= route('addProductAPI') ?>',
                data: dataForm,
                headers: {'Content-Type': 'multipart/form-data',
                          'X-Requested-With': 'XMLHttpRequest'}
                })
                .then(function (response) {
                    location.href = "<?= route('admin_add_products') ?>";
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
                        $('html, body').animate({scrollTop:(0)}, 750);
                    }
                });

        });


    </script>
@endsection