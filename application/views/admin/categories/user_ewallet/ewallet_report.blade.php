@extends('admin.master.master')

@section('head_dpc')
    @extends('admin.components.css_dep')
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
                                    <li>E-Wallet</li>
                                    <li class="active">Laporan E-Wallet</li>
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

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection



@section('scripts')
    @extends('admin.components.js_dep')
@endsection