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
                    @component('admin.categories.user_ewallet.pelengkap.modal_add')

                    @endcomponent      
                    @component('admin.categories.user_ewallet.pelengkap.ewallet_options')

                    @endcomponent
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection



@section('scripts')
    @extends('admin.components.js_dep')
@endsection