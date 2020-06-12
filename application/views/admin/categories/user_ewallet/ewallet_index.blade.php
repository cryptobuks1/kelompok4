@extends('admin.master.master')

@section('head_dpc')
    @extends('admin.components.css_dep')
    <style>
        .font24{
            font-size: 48pt;
        }
    </style>
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
                    @component('admin.categories.user_ewallet.pelengkap.ewallet_form')

                    @endcomponent
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection



@section('scripts')
    @extends('admin.components.js_dep')

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?= base_url("assets/js/serializeJSON.js") ?>"></script>
    <script>
        $(document).ready(() => {
            
            $('#sendItem').on('click', (e) => {
                e.preventDefault();
                let dataSend = $('#topup-ewallet').serializeJSON();
                let btn = $('#sendItem');
                $('#bag').empty();
                btn.prop('disabled', true);
                btn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading, sedang menyimpan data...');
                axios({
                    method : 'POST',
                    url : '<?= route('ewallet_reload') ?>',
                    data : dataSend,
                    headers : {
                        'X-Requested-With' : 'XMLHttpRequest',
                        'Content-type' : 'multipart/form-data'
                    }
                }).then((result) => {
                    btn.prop('disabled', false);
                    btn.html('Kirim');
                    $('#bag').append('<div class="alert alert-success alert-dismissable">'+
                                    result.data.msg +
                                    '</div>');
                    console.log(result.data);
                }).catch((err) => {
                    btn.prop('disabled', false);
                    btn.html('Kirim');
                    $('#bag').append('<div class="alert alert-danger alert-dismissable">'+
                    err.response.data.msg +
                    '</div>');
                });
            });
        })
    </script>
@endsection